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
    
    
    
    ///////////////////////////////////////////////////
    
    public function addinvestmentCustomer()
    {
        $getview['view'] = 'Add Investment Customer';
        
        $data['customerlist'] = $this->Investment_model->Get_customer_detail();
        $data['investmentlist'] = $this->Investment_model->all_investment_plan();
        $data['customer'] = $this->Investment_model->getAllcustomer_invest();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/addinvestmentcustomer', $data);
        $this->load->view('includes/footer', $getview);
    }
    
    
    
    public function addInvestmentforcustomer()
{

    $this->form_validation->set_rules('investment_plan', 'investment_plan', 'trim|prep_for_form');
    $this->form_validation->set_rules('customer_id', 'customer_id', 'trim|prep_for_form');
    $this->form_validation->set_rules('starting_date', 'starting_date', 'trim|prep_for_form');
    $this->form_validation->set_rules('note_detail', 'note_detail', 'trim|prep_for_form');
    if ($this->form_validation->run() == TRUE) {
        
        $investment_plan = $this->input->post('investment_plan', TRUE);
        $customer_id =  $this->input->post('customer_id', TRUE);
        $current_date= Date('Y-m-d');
        $investment_plan_detail = $this->Investment_model->investment_plan_type_byID($investment_plan);
        $user_detail =  $this->Investment_model->Get_customer_detail_by_id($customer_id); 
        
        
        if(empty($user_detail))
        {
           $this->session->set_flashdata('danger', 'Error, User Detail Not Found!');
           redirect('Investment/addinvestmentCustomer'); 
        }
        
         if(empty($investment_plan_detail))
        {
           $this->session->set_flashdata('danger', 'Error, Plan Not FOund');
           redirect('Investment/addinvestmentCustomer'); 
        }
        
        $wallet_detail =  $this->Investment_model->get_wallet_amount($customer_id);
        $user_name = $user_detail->customer_fullname; 
        $balance = $wallet_detail->balance;
        //////
        $ipt_id = $investment_plan_detail->ipt_id;
        $ipt_name = $investment_plan_detail->ipt_name;
        $ipt_amount = $investment_plan_detail->ipt_amount;
        $ipt_currency = $investment_plan_detail->ipt_currency;
        $ipt_detail = $investment_plan_detail->ipt_detail;
        $ipt_profit = $investment_plan_detail->ipt_profit;
        $ipt_get_profit_days = $investment_plan_detail->ipt_get_profit_days;
        $ipt_min_withdraw_days = $investment_plan_detail->ipt_min_withdraw_days;
        
        $payment_amount_data = $ipt_amount*100;
        
        if($balance < $payment_amount_data )
        {
           $this->session->set_flashdata('danger', 'Error, Please Reacharge Your Wallet First');
           redirect('Investment/addinvestmentCustomer');   
            
        }
        
    
        $data_insert_data = [
            'ilu_user_id'                    => $this->input->post('customer_id', TRUE),
            'ilu_user_type'                  => 'customer',
            'ilu_plan_id'                    => $this->input->post('investment_plan', TRUE),
            'ilu_adminNote'                  => $this->input->post('note_detail', TRUE),
            'ilu_plan_name'                  => $ipt_name,
            'ilu_plan_amount'                => $ipt_amount,
            'ilu_plan_currency'              => $ipt_currency,
            'ilu_plan_profit'                => $ipt_profit,
            'ilu_detail'                     => $ipt_detail,
            'ilu_plan_get_profit_days'       => $ipt_get_profit_days,
            'ilu_plan_min_withdraw_days'     => $ipt_min_withdraw_days,
            'ilu_status'                     => '1',
            'ilu_created_date'               => $current_date,
        ];
        
        $query = $this->db->insert('investment_list_user',$data_insert_data); // table name
        $insert_id = $this->db->insert_id();
          if(!empty($insert_id))
          {
            $update_balance = $balance - $payment_amount_data;
            $update_balance_data = array(
                    'balance' => $update_balance, 
                );   
            $update_balance_data_success =  $this->Investment_model->update_balance_model($customer_id,$update_balance_data);
        
            $update_balance_history = array(
            'id_user' => $customer_id,
            'wallet_amount' => $payment_amount_data, 
            'holder_name' => $user_name, 
            'bank' => 'Wallet', 
            'wallet_account' => 'Investment Package Purchage By Admin', 
            'type' => 'deduction', 
            'status' => '1', 
             );    
             
             
             $save_data_history =  $this->Investment_model->update_trans_amountinwallet($update_balance_history);   
             
            }else{
                
              $this->session->set_flashdata('danger', 'Error, Please try again');
              redirect('Investment/addinvestmentCustomer');  
                
                
            }
      

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/addinvestmentCustomer');
        } else {

            if ($insert_id) {
                $this->session->set_flashdata('success', 'Investment Plan  Has Been Added');
                redirect('Investment/addinvestmentCustomer');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again');
                redirect('Investment/addinvestmentCustomer');
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again');
        redirect('Investment/addinvestmentCustomer');
    }
}


    public function addinvestmentdriver()
    {
        $getview['view'] = 'Add Investment Driver';
        
        $data['driverlist'] = $this->Investment_model->Get_Alldriver_detail();
        $data['investmentlist'] = $this->Investment_model->all_investment_plan();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/addinvestmentdriver', $data);
        $this->load->view('includes/footer', $getview);
    }
    
    
    
    public function addInvestmentfordriver()
{

    $this->form_validation->set_rules('investment_plan', 'investment_plan', 'trim|prep_for_form');
    $this->form_validation->set_rules('customer_id', 'customer_id', 'trim|prep_for_form');
    $this->form_validation->set_rules('starting_date', 'starting_date', 'trim|prep_for_form');
    $this->form_validation->set_rules('note_detail', 'note_detail', 'trim|prep_for_form');
    if ($this->form_validation->run() == TRUE) {
        
        $investment_plan = $this->input->post('investment_plan', TRUE);
        $customer_id =  $this->input->post('customer_id', TRUE);
        $current_date= Date('Y-m-d');
        $investment_plan_detail = $this->Investment_model->investment_plan_type_byID($investment_plan);
        $user_detail =  $this->Investment_model->Get_driver_detail_by_id($customer_id);
        
        
        
        if(empty($user_detail))
        {
           $this->session->set_flashdata('danger', 'Error, User Detail Not Found!');
           redirect('Investment/addinvestmentdriver'); 
        }
        
         if(empty($investment_plan_detail))
        {
           $this->session->set_flashdata('danger', 'Error, Plan Not FOund');
           redirect('Investment/addinvestmentdriver'); 
        }
        
        $wallet_detail =  $this->Investment_model->get_wallet_amount($customer_id);
        $user_name = $user_detail->driver_name; 
        $balance = $wallet_detail->balance;
        //////
        $ipt_id = $investment_plan_detail->ipt_id;
        $ipt_name = $investment_plan_detail->ipt_name;
        $ipt_amount = $investment_plan_detail->ipt_amount;
        $ipt_currency = $investment_plan_detail->ipt_currency;
        $ipt_detail = $investment_plan_detail->ipt_detail;
        $ipt_profit = $investment_plan_detail->ipt_profit;
        $ipt_get_profit_days = $investment_plan_detail->ipt_get_profit_days;
        $ipt_min_withdraw_days = $investment_plan_detail->ipt_min_withdraw_days;
        
        $payment_amount_data = $ipt_amount*100;
        
        if($balance < $payment_amount_data )
        {
           $this->session->set_flashdata('danger', 'Error, Please Reacharge Your Wallet First');
           redirect('Investment/addinvestmentdriver');   
            
        }
        
    
        $data_insert_data = [
            'ilu_user_id'                    => $this->input->post('customer_id', TRUE),
            'ilu_user_type'                  => 'customer',
            'ilu_plan_id'                    => $this->input->post('investment_plan', TRUE),
            'ilu_adminNote'                  => $this->input->post('note_detail', TRUE),
            'ilu_plan_name'                  => $ipt_name,
            'ilu_plan_amount'                => $ipt_amount,
            'ilu_plan_currency'              => $ipt_currency,
            'ilu_plan_profit'                => $ipt_profit,
            'ilu_detail'                     => $ipt_detail,
            'ilu_plan_get_profit_days'       => $ipt_get_profit_days,
            'ilu_plan_min_withdraw_days'     => $ipt_min_withdraw_days,
            'ilu_status'                     => '1',
            'ilu_created_date'               => $current_date,
        ];
        
        $query = $this->db->insert('investment_list_user',$data_insert_data); // table name
        $insert_id = $this->db->insert_id();
          if(!empty($insert_id))
          {
            $update_balance = $balance - $payment_amount_data;
            $update_balance_data = array(
                    'balance' => $update_balance, 
                );   
            $update_balance_data_success =  $this->Investment_model->update_balance_model($customer_id,$update_balance_data);
        
            $update_balance_history = array(
            'id_user' => $customer_id,
            'wallet_amount' => $payment_amount_data, 
            'holder_name' => $user_name, 
            'bank' => 'Wallet', 
            'wallet_account' => 'Investment Package Purchage By Admin', 
            'type' => 'deduction', 
            'status' => '1', 
             );    
             
             
             $save_data_history =  $this->Investment_model->update_trans_amountinwallet($update_balance_history);   
             
            }else{
                
              $this->session->set_flashdata('danger', 'Error, Please try again');
              redirect('Investment/addinvestmentdriver');  
                
                
            }
      

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/addinvestmentdriver');
        } else {

            if ($insert_id) {
                $this->session->set_flashdata('success', 'Investment Plan  Has Been Added');
                redirect('Investment/addinvestmentdriver');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again');
                redirect('Investment/addinvestmentdriver');
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again');
        redirect('Investment/addinvestmentdriver');
    }
}


    public function addinvestmentmercent()
    {
        $getview['view'] = 'Add Investment Customer';
        
        $data['mercentlist'] = $this->Investment_model->Get_Allmerchant_detail();
        $data['investmentlist'] = $this->Investment_model->all_investment_plan();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Investment/addinvestmentmercent', $data);
        $this->load->view('includes/footer', $getview);
    }
    
    
    
    public function addInvestmentformercent()
{

    $this->form_validation->set_rules('investment_plan', 'investment_plan', 'trim|prep_for_form');
    $this->form_validation->set_rules('customer_id', 'customer_id', 'trim|prep_for_form');
    $this->form_validation->set_rules('starting_date', 'starting_date', 'trim|prep_for_form');
    $this->form_validation->set_rules('note_detail', 'note_detail', 'trim|prep_for_form');
    if ($this->form_validation->run() == TRUE) {
        
        $investment_plan = $this->input->post('investment_plan', TRUE);
        $customer_id =  $this->input->post('customer_id', TRUE);
        $current_date= Date('Y-m-d');
        $investment_plan_detail = $this->Investment_model->investment_plan_type_byID($investment_plan);
        $user_detail =  $this->Investment_model->Get_merchant_detail_by_id($customer_id); 
        
        
        if(empty($user_detail))
        {
           $this->session->set_flashdata('danger', 'Error, User Detail Not Found!');
           redirect('Investment/addinvestmentmercent'); 
        }
        
         if(empty($investment_plan_detail))
        {
           $this->session->set_flashdata('danger', 'Error, Plan Not FOund');
           redirect('Investment/addinvestmentmercent'); 
        }
        
        $wallet_detail =  $this->Investment_model->get_wallet_amount($customer_id);
        $user_name = $user_detail->merchant_name; 
        $balance = $wallet_detail->balance;
        //////
        $ipt_id = $investment_plan_detail->ipt_id;
        $ipt_name = $investment_plan_detail->ipt_name;
        $ipt_amount = $investment_plan_detail->ipt_amount;
        $ipt_currency = $investment_plan_detail->ipt_currency;
        $ipt_detail = $investment_plan_detail->ipt_detail;
        $ipt_profit = $investment_plan_detail->ipt_profit;
        $ipt_get_profit_days = $investment_plan_detail->ipt_get_profit_days;
        $ipt_min_withdraw_days = $investment_plan_detail->ipt_min_withdraw_days;
        
        $payment_amount_data = $ipt_amount*100;
        
        if($balance < $payment_amount_data )
        {
           $this->session->set_flashdata('danger', 'Error, Please Reacharge Your Wallet First');
           redirect('Investment/addinvestmentmercent');   
            
        }
        
    
        $data_insert_data = [
            'ilu_user_id'                    => $this->input->post('customer_id', TRUE),
            'ilu_user_type'                  => 'customer',
            'ilu_plan_id'                    => $this->input->post('investment_plan', TRUE),
            'ilu_adminNote'                  => $this->input->post('note_detail', TRUE),
            'ilu_plan_name'                  => $ipt_name,
            'ilu_plan_amount'                => $ipt_amount,
            'ilu_plan_currency'              => $ipt_currency,
            'ilu_plan_profit'                => $ipt_profit,
            'ilu_detail'                     => $ipt_detail,
            'ilu_plan_get_profit_days'       => $ipt_get_profit_days,
            'ilu_plan_min_withdraw_days'     => $ipt_min_withdraw_days,
            'ilu_status'                     => '1',
            'ilu_created_date'               => $current_date,
        ];
        
        $query = $this->db->insert('investment_list_user',$data_insert_data); // table name
        $insert_id = $this->db->insert_id();
          if(!empty($insert_id))
          {
            $update_balance = $balance - $payment_amount_data;
            $update_balance_data = array(
                    'balance' => $update_balance, 
                );   
            $update_balance_data_success =  $this->Investment_model->update_balance_model($customer_id,$update_balance_data);
        
            $update_balance_history = array(
            'id_user' => $customer_id,
            'wallet_amount' => $payment_amount_data, 
            'holder_name' => $user_name, 
            'bank' => 'Wallet', 
            'wallet_account' => 'Investment Package Purchage By Admin', 
            'type' => 'deduction', 
            'status' => '1', 
             );    
             
             
             $save_data_history =  $this->Investment_model->update_trans_amountinwallet($update_balance_history);   
             
            }else{
                
              $this->session->set_flashdata('danger', 'Error, Please try again');
              redirect('Investment/addinvestmentmercent');  
                
                
            }
      

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Investment/addinvestmentmercent');
        } else {

            if ($insert_id) {
                $this->session->set_flashdata('success', 'Investment Plan  Has Been Added');
                redirect('Investment/addinvestmentmercent');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again');
                redirect('Investment/addinvestmentmercent');
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again');
        redirect('Investment/addinvestmentmercent');
    }
}


   
}?>
