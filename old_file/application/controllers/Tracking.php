<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (install == false) {
            if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
                redirect(base_url() . "login");
            } else {
                redirect(base_url() . "extensions");
            }
        } else {
            if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
                redirect(base_url() . "login");
            }
        }
        $this->load->model('Appsettings_model', 'appset');
        $this->load->model('Dashboard_model', 'dasb');
    }

    public function trackingdriver()
    {
        $dataview['view'] = 'drivermap';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('tracking/trackingdriver');
        $this->load->view('includes/footer', $dataview);
    }

    public function trackingmerchant()
    {
        $dataview['view'] = 'merchantmap';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('tracking/trackingmerchant');
        $this->load->view('includes/footer', $dataview);
    }
}
