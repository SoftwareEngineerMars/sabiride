<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Investment extends CI_Controller
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
        $this->load->model('Investment_model', 'Investment_model');
        $this->load->model('Appsettings_model', 'appset');
        $this->load->library('form_validation');
        $this->load->model('Dashboard_model', 'dasb');

          $this->load->library('session');
        $this->load->model('Driverdata_model', 'drv');
        $this->load->model('Merchantdata_model', 'mrc');
        $this->load->model('Customerdata_model', 'cstm');
        $this->load->model('Customer_model');
        $this->load->model('Email_model');
        // $this->load->model('Appsettings_model', 'app');

        date_default_timezone_set(time_zone);
    }

    public function index()
    {
        
        $getview['view'] = 'All Investment';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();

        $data['all_plan'] = $this->Investment_model->all_investment_plan();

        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/Investmentdata', $data);
        $this->load->view('includes/footer', $getview);
    }

        public function addInvestment()
    {
        $getview['view'] = 'Investment Add';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();

        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/addInvestment');
        $this->load->view('includes/footer', $getview);
    }


       public function editInvestment($id)
    {
        $getview['view'] = 'Investment Edit';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['news'] = $this->Investment_model->Investment_model_edit($id);
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/editInvestment', $data);
        $this->load->view('includes/footer', $getview);
    }



    
 public function deleteInvestment($id)
{
    if (demo == TRUE) {
        $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
        redirect('news/newsdata');
    } else {
        
        $success = $this->Investment_model->deleteberitaById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'News Has Been deleted');
            redirect('Investment');
        } else {
            $this->session->set_flashdata('danger', 'Error, Please try again!');
            redirect('Investment');
        }
    }
}



public function addInvestment_submit()
{

    $this->form_validation->set_rules('ipt_name', 'name', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_currency', 'currency', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_amount', 'amount', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_profit', 'profit(%)', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_get_profit_days', 'Min profit days', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_min_withdraw_days', 'Min withdraw days', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_status', 'status', 'trim|prep_for_form');
   


    if ($this->form_validation->run() == TRUE) {
       
        $data = [
            'ipt_name'                => $this->input->post('ipt_name', TRUE),
            'ipt_currency'                      => html_escape($this->input->post('ipt_currency', TRUE)),
            'ipt_amount'                    => $this->input->post('ipt_amount', TRUE),
            'ipt_profit'                => html_escape($this->input->post('ipt_profit', TRUE)),
            'ipt_get_profit_days'              => html_escape($this->input->post('ipt_get_profit_days', TRUE)),
            'ipt_min_withdraw_days'              => html_escape($this->input->post('ipt_min_withdraw_days', TRUE)),
            'ipt_status'              => html_escape($this->input->post('ipt_status', TRUE)),
            'ipt_detail'              => html_escape($this->input->post('ipt_detail', TRUE)),
        ];

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment');
        } else {

            $success = $this->Investment_model->addinvestment($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Investment Plan  Has Been Added');
                redirect('Investment');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Investment');
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again!');
        redirect('Investment');
    }
}

public function editInvestment_submit()
{
    $this->form_validation->set_rules('ipt_name', 'name', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_currency', 'currency', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_amount', 'amount', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_profit', 'profit(%)', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_get_profit_days', 'Min profit days', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_min_withdraw_days', 'Min withdraw days', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_status', 'status', 'trim|prep_for_form');
    $this->form_validation->set_rules('ipt_id', 'id', 'trim|prep_for_form');

    $id  = html_escape($this->input->post('ipt_id', TRUE));

    $data['news'] = $this->Investment_model->Investment_model_edit($id);


    if ($this->form_validation->run() == TRUE) {

        $data = [
            'ipt_name'                => $this->input->post('ipt_name', TRUE),
            'ipt_currency'                      => html_escape($this->input->post('ipt_currency', TRUE)),
            'ipt_amount'                    => $this->input->post('ipt_amount', TRUE),
            'ipt_profit'                => html_escape($this->input->post('ipt_profit', TRUE)),
            'ipt_get_profit_days'              => html_escape($this->input->post('ipt_get_profit_days', TRUE)),
            'ipt_min_withdraw_days'              => html_escape($this->input->post('ipt_min_withdraw_days', TRUE)),
            'ipt_status'              => html_escape($this->input->post('ipt_status', TRUE)),
            'ipt_detail'              => html_escape($this->input->post('ipt_detail', TRUE)),
        ];

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/editInvestment/' . $id);
        } else {

            $success = $this->Investment_model->editinvestment($data,$id);
            if ($success) {
                $this->session->set_flashdata('success', 'Investment Plan Has Been changed');
                redirect('Investment');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Investment/editInvestment/' . $id);
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again!');
        redirect('Investment/editInvestment/' . $id);
    }
}



    ////////////////////////////////////////////////////////////////////

        public function Investment_merchant_list()
    {
        $getview['view'] = 'customerdata';
        $data['merchant'] = $this->Investment_model->getAllmerchant_invest();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/merchantdata', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function Investment_merchant_list_Detail($id)
    {

        $getview['view'] = 'detailmerchant';
        $data['partner'] = $this->mrc->getpartnerbyid($id);
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['item'] = $this->mrc->getitembyid($data['partner']['merchant_id']);
        $data['itemcategory'] = $this->mrc->getcatitembyid($data['partner']['merchant_id']);
        $data['currency'] = $this->appset->getcurrency();
        $data['decimal'] = $this->appset->getdecimal();
        $data['countorder'] = $this->mrc->countorder($data['partner']['merchant_id']);
        $data['wallet'] = $this->mrc->wallet($id);
        $data['wallet_amount'] = count($data['item']);
        $data['merchantcategory'] = $this->mrc->getmerchantcat();
        $data['transaction'] = $this->mrc->gettranshistory($data['partner']['merchant_id']);
        $data['service'] = $this->mrc->get_service_merchant();
        $getview['countnotification'] = $this->dasb->countnotif();

        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/detailmerchant', $data);
        $this->load->view('includes/footer', $getview);
        
    }

     public function deletemerchant($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/Investment_merchant_list');
        } else {
            $success = $this->mrc->deletemitrabyid($id);
            if ($success) {
                $berkas = $this->mrc->getfilebyid($id);
                $fotoktp = $berkas['idcard_images'];
                unlink('images/photofile/ktp/' . $fotoktp);
                $this->session->set_flashdata('success', 'Owner Merchant Has Been Deleted');
                redirect('Investment/Investment_merchant_list');
            } else {
                $this->session->set_flashdata('danger', 'Error, please try again!');
                redirect('Investment/Investment_merchant_list');
            }
        }
    }


     public function blockmerchant($id)
    {
        $success = $this->mrc->blockmitrabyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'blocked');
            redirect('Investment/Investment_merchant_list');
        } else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('Investment/Investment_merchant_list');
        }
    }

    public function unblockmerchant($id)
    {
        $success = $this->mrc->unblockmitrabyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'unblocked');
            redirect('Investment/Investment_merchant_list');
        } else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('Investment/Investment_merchant_list');
        }
    }


    //////////////////////////////////////////////////////////////


     public function Investment_driver_list()
    {
        $getview['view'] = 'Driverdata';
         $data['driver'] = $this->Investment_model->getAlldriver_invest();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/driverdata', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function Investment_driver_list_detail($id)
    {

        $getview['view'] = 'detaildriver';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['driver'] = $this->drv->getdriverbyid($id);
        $data['currency'] = $this->appset->getcurrency();
        $data['decimal'] = $this->appset->getdecimal();
        $data['countorder'] = $this->drv->countorder($id);
        $data['transaction'] = $this->drv->transaction($id);
        $data['wallet'] = $this->drv->wallet($id);
        $data['driverjob'] = $this->drv->driverjob();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/detaildriver', $data);
        $this->load->view('includes/footer', $getview);
        
    }

    public function deletedriver($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/driverdata');
        } else {
            $data = $this->drv->getdriverbyid($id);
            $gambar = $data['photo'];
            $gambarsim = $data['driver_license_images'];
            $gambarktp = $data['idcard_images'];
            unlink('images/driverphoto/' . $gambar);
            unlink('images/photofile/ktp/' . $gambarktp);
            unlink('images/photofile/sim/' . $gambarsim);

            $success = $this->drv->deletedriverbyid($id);
            if ($success) {
                $this->session->set_flashdata('success', 'Driver Has Been Deleted');
                redirect('Investment/Investment_driver_list');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('Investment/Investment_driver_list');
            }
        }
    }


     public function blockdriver($id)
    {
        $success = $this->drv->blockdriverbyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'blocked');
            redirect('Investment/Investment_driver_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Investment/Investment_driver_list');
        }
    }

    public function unblockdriver($id)
    {
        $success = $this->drv->unblockdriverbyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'unblocked');
            redirect('Investment/Investment_driver_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Investment/Investment_driver_list');
        }
    }


    

//////////////////////////////////////////////////////////////////////////

     public function Investment_customer_list()
    {
        $getview['view'] = 'customerdata';

        $data['customer'] = $this->Investment_model->getAllcustomer_invest();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/customerdata', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function Investment_customer_list_detail($id)
    {

        $getview['view'] = 'detailcustomer';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['customer'] = $this->cstm->getcustomerbyid($id);
        $data['currency'] = $this->appset->getcurrency();
        $data['decimal'] = $this->appset->getdecimal();
        $data['countorder'] = $this->cstm->countorder($id);
        $data['wallet'] = $this->cstm->wallet($id);
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/detailcustomer', $data);
        $this->load->view('includes/footer', $getview);
        
    }


    public function block($id)
    {
        $success = $this->cstm->blockusersById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'blocked');
            redirect('Investment/Investment_customer_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Investment/Investment_customer_list');
        }
    }

    public function unblock($id)
    {
        $success = $this->cstm->unblockusersById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'unblocked');
            redirect('Investment/Investment_customer_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Investment/Investment_customer_list');
        }
    }


        public function deleteusers($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/Investment_customer_list');
        } else {
            $data = $this->cstm->getusersbyid($id);
            $gambar = $data['customer_image'];
            unlink('images/customer/' . $gambar);

            $success = $this->cstm->deletedatauserbyid($id);
            if ($success) {
                $this->session->set_flashdata('success', 'User Has Been Deleted');
                redirect('Investment/Investment_customer_list');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('Investment/Investment_customer_list');
            }
        }
    }

   
}
