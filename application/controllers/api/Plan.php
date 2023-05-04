<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan extends CI_Controller
{
  private $error = [];
  const PAYMENT_TYPES = [
    'wallet',
    'card',
    'paypal',
    'stripe',
    'paystack',
    'payumoney'
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Plan_Model', 'plan');
    $this->load->library('form_validation');
  }

  public function index($id = 0)
  {
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        return false;
    }

    $plans = $this->plan->get_active_plans($id);

    if ($id && $plans) {
      $plans = $plans;
      $plans['logo'] = base_url($plans['logo']);
    } else if ($plans) {
      foreach ($plans as $key => $plan) {
        $plans[$key]['logo'] = base_url($plan['logo']);
      }
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($plans));
  }

  public function subscribe($payment_type = 'wallet')
  {
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        return false;
    }

    $json = [];
    if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->validate_subscribe($payment_type)) {
      $plan = $this->plan->get_active_plans($this->input->post('plan_id'));
      if ($payment_type == 'wallet') {
        $balance = $this->plan->get_balance($this->input->post('driver_id'));
        $update_balance = (float)($balance['balance'] - ($plan['price'] * 100));
        $this->plan->update_balance($balance['number'], $update_balance);
      }

      $datetime = new \DateTime();
      $current_date = $datetime->format('Y-m-d H:i:s');
      $validity = 'P' . $plan['valid_days'] . 'D';
      $datetime->add(new DateInterval($validity));

      $expiry_date = $datetime->format('Y-m-d H:i:s');

      $subscription_data = [
        'plan_id' => $this->input->post('plan_id'),
        'driver_id' => $this->input->post('driver_id'),
        'amount' => $plan['price'],
        'start_date' => $current_date,
        'end_date' => $expiry_date,
        'payment_type' => $payment_type,
        'transaction_id' => $this->input->post('transaction_id'),
        'status' => 1
      ];

      $this->db->insert('subscription', $subscription_data);
      // update driver config
      $this->db->query("UPDATE config_driver SET subscribed = 1, subscription_expiry_date = '" . $expiry_date . "' WHERE driver_id = '" . $this->input->post('driver_id') . "'");

      $json['message'] = 'Plan ' . $plan['name'] . ' was subscribed successfully!';
      $json['error'] = false;
      $json['success'] = true;
      $json['status'] = 200;
    } else {
      $json['status'] = 401;
      $json['success'] = false;
      $json['message'] = 'Bad Request';
      $json['error'] = $this->error;
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
  }

  private function validate_subscribe($payment_type = 'wallet')
  {
    $payment_type = strtolower($payment_type);
    if (!$this->input->post('driver_id')) {
      $this->error['driver_id'] = 'Driver ID is required!';
    }


    if (!$this->input->post('plan_id')) {
      $this->error['plan_id'] = 'Plan ID is required!';
    }

    if (!$this->error) {
      $plan = $this->plan->get_active_plans($this->input->post('plan_id'));
      if (!$plan) {
        $this->error['plan'] = 'Plan doesn\'t exist!';
      }

      $driver = $this->plan->get_driver_by_id($this->input->post('driver_id'));

      if (!$driver) {
        $this->error['driver'] = 'Driver not found!';
      }

      // check balance sufficiency
      if ($plan && $driver && $payment_type = 'wallet') {
        $balance = $this->plan->get_balance($this->input->post('driver_id'));

        if (!$balance || (float)$balance['balance'] < (float)($plan['price'] * 100)) {
          $this->error['balance'] = 'Insufficient balance!';
        }
      }

      if (!in_array($payment_type, self::PAYMENT_TYPES)) {
        $this->error['payment_type'] = 'Invalid Payment Type!';
      }
    }

    return !$this->error;
  }
}
