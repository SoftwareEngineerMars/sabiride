<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan extends CI_Controller
{
  private $error = [];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard_model', 'dasb');
    $this->load->model('Appsettings_model', 'appset');
    $this->load->model('Plan_Model', 'plan');
    $this->load->library('form_validation');
    if (!$this->session->has_userdata('id')) {
      redirect(base_url() . "login");
    }
  }

  public function index()
  {
    $data['plans'] = $this->plan->all();
    $getview['view'] = 'planlist';
    $getview['menu'] = $this->appset->getMenuAdmin();
    $getview['countnotification'] = $this->dasb->countnotif();

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->userdata('success');
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }

    $this->load->view('includes/header', $getview);
    $this->load->view('plan/list', $data);
    $this->load->view('includes/footer', $getview);
  }

  public function add()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->validate()) {
      $plan_data = $this->input->post();

      if (isset($_FILES['logo']) && $_FILES['logo']) {
        $destination = 'asset/app-assets/images/logo/' . $_FILES['logo']['name'];

        move_uploaded_file($_FILES['logo']['tmp_name'], FCPATH . $destination);
        $plan_data['logo'] = $destination;
      }

      $this->plan->add_plan($plan_data);
      $this->session->set_userdata('success', 'You have added plan successfully');
      redirect('plan');
    }

    $this->get_form();
  }

  public function edit($id = 0)
  {
    if ($id && $this->input->server('REQUEST_METHOD') == 'POST' && $this->validate()) {
      $plan_data = $this->input->post();

      if (isset($_FILES['logo']) && $_FILES['logo']) {
        $destination = 'asset/app-assets/images/logo/' . $_FILES['logo']['name'];

        move_uploaded_file($_FILES['logo']['tmp_name'], FCPATH . $destination);
        $plan_data['logo'] = $destination;
      }

      $this->plan->edit_plan($id, $plan_data);
      $this->session->set_userdata('success', 'You have updated plan successfully');
      redirect('plan');
    }

    $this->get_form($id);
  }

  protected function get_form($id = 0)
  {
    $data= [];

    if ($id) {
      $data['action'] = base_url('plan/edit/' . $id);
    } else {
      $data['action'] = base_url('plan/add');
    }

    $errors = ['name', 'price', 'valid_days'];
    foreach ($errors as $error) {
      if (isset($this->error[$error])) {
        $data['error_' . $error] = $this->error[$error];
      } else {
        $data['error_' . $error] = '';
      }
    }

    $plan_info = (array)$this->plan->get($id);

    $configs = ['name', 'price', 'description', 'valid_days', 'status'];

    foreach ($configs as $config) {
      if ($this->input->post($config)) {
        $data[$config] = $this->input->post($config);
      } else if (!empty($plan_info[$config])) {
        $data[$config] = $plan_info[$config];
      } else {
        $data[$config] = '';
      }
    }

    if (isset($_FILES['logo'])) {
      $data['logo'] = '';
      $data['logo_image'] = '';
    } elseif (!empty($plan_info['logo'])) {
      $data['logo_image'] = $plan_info['logo'];
      $data['logo'] = $plan_info['logo'];
    } else {
      $data['logo_image'] = '';
      $data['logo'] = '';
    }

    $getview['view'] = 'plandata';
    $getview['menu'] = $this->appset->getMenuAdmin();
    $getview['countnotification'] = $this->dasb->countnotif();
    ob_start();
    $this->load->view('includes/header', $getview);
    $this->load->view('plan/form', $data);
    $this->load->view('includes/footer', $getview);
    ob_flush();
  }

  public function delete($which = 'plan', $id = 0)
  {
    if ($which == 'plan' && $id) {
      $this->plan->delete_plan($id);
      $this->session->set_userdata('success', 'Subscription was deleted successfully');
    } else if ($which == 'subscription' && $id) {

      $this->plan->update_driver_subscription_status($id, 0, true);
      $this->db->query("DELETE FROM subscription WHERE id = " . (int)$id);
      $this->session->set_userdata('success', 'Plan was deleted successfully');
    }

    if ($which == 'subscription') {
      redirect(base_url() . "plan/subscriber");
    }

    redirect(base_url() . "plan");
  }

  public function subscriber($id = 0)
  {
    $data['subscribers'] = $this->plan->get_subscribed_drivers(0, true);

    if ($this->session->has_userdata('success')) {
      $data['success'] = $this->session->userdata('success');
      $this->session->unset_userdata('success');
    } else {
      $data['success'] = '';
    }

    $getview['view'] = 'subscriberdata';
    $getview['menu'] = $this->appset->getMenuAdmin();
    $getview['countnotification'] = $this->dasb->countnotif();
    $this->load->view('includes/header', $getview);
    $this->load->view('plan/subscriber', $data);
    $this->load->view('includes/footer', $getview);
    ob_flush();
  }

  public function update_subscription_status()
  {
    $json = [];

    if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->input->post('id')) {
        $this->plan->update_driver_subscription_status($this->input->post('id'), $this->input->post('status'));
        if ($this->input->post('status') == 1) {
          $json['success'] = 'Subscription was activated successfully';
        } else {
          $json['success'] = 'Subscription was deactivated successfully';
        }
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
  }

  protected function validate()
  {
    if (strlen(trim($this->input->post('name'))) < 3 || strlen(trim($this->input->post('name'))) > 64) {
      $this->error['name'] = 'Warning: Plan name should have length between 3 and 64!';
    }

    if ($this->input->post('valid_days') < 1) {
      $this->error['valid_days'] = 'Warning: Validity should be minimum 1 day!';
    }

    if ((int)$this->input->post('price') < 0) {
      $this->error['price'] = 'Warning: Plan price should not be negative!';
    }

    if (!isset($this->error['price']) && trim($this->input->post('price')) == '') {
      $this->error['price'] = 'Warning: Plan price should not be empty!';
    }

    return !$this->error;
  }
}
