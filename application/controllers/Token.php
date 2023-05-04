<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Token extends CI_Controller
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
        $this->load->model('Token_model', 'token');
        date_default_timezone_set(time_zone);
    }
    public function index()
    {
        $getview['view'] = 'token';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['all_data'] = $this->token->get_token_data();
        $data['free_data'] = $this->token->get_free_data();
        $data['log_data'] = $this->token->get_token_log_data();
        $getview['countnotification'] = $this->dasb->countnotif();


        $this->load->view('includes/header', $getview);
        $this->load->view('token/index', $data);
        $this->load->view('includes/footer', $getview);
    }
    //token generator
    public function sel_token_data()
    {
        $t_value = $this->input->post('t_value');
        $result = $this->token->sel_token_data($t_value);
        echo $result; 
    }

    public function save_data()
    {
        $result = $this->token->save_data($this->input->post());
        echo $result; 
    }

    public function remove_token_data()
    {
        $result = $this->token->remove_token_data($this->input->post());
        echo $result; 
    }
    //free date
    public function get_date_data()
    {
        $f_value = $this->input->post('f_value');
        $result = $this->token->get_date_data($f_value);
        echo $result; 
    }

    public function update_free_data()
    {
        $result = $this->token->update_free_data($this->input->post());
        echo $result; 
    }

    public function remove_free_data()
    {
        $result = $this->token->remove_free_data($this->input->post());
        echo $result; 
    }
}
