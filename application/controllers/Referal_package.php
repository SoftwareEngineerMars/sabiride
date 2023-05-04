<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referal_package extends CI_Controller
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
        $this->load->model('Referal_package_model', 'Referal_package_model');
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
        
        $getview['view'] = 'All Referal Package';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();

        $data['all_plan'] = $this->Referal_package_model->all_referal_package();
        
        $data['CEOPackage'] = $this->Referal_package_model->referal_package_comissionCEOPackage();
        $data['ManagerPackage'] = $this->Referal_package_model->referal_package_comissionManagerPackage();
        $data['EmployeePackage'] = $this->Referal_package_model->referal_package_comissionEmployeePackage();

        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/Referal_package_data', $data);
        $this->load->view('includes/footer', $getview);
    }

        public function addReferal_package()
    {
        $getview['view'] = 'Add Referal Package';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();

        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/addreferal_package');
        $this->load->view('includes/footer', $getview);
    }


       public function editReferal_package($id)
    {
        $getview['view'] = 'Referal Package Edit';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['news'] = $this->Referal_package_model->referal_package_model_edit($id);
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/editreferal_package', $data);
        $this->load->view('includes/footer', $getview);
    }



    
 public function deleteReferal_package($id)
{
    if (demo == TRUE) {
        $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
        redirect('news/newsdata');
    } else {
        
        $success = $this->Referal_package_model->referal_package_deletebyId($id);
        if ($success) {
            $this->session->set_flashdata('success', 'Referal Package Has Been deleted');
            redirect('Referal_package');
        } else {
            $this->session->set_flashdata('danger', 'Error, Please try again!');
            redirect('Referal_package');
        }
    }
}


public function UpdateEmployeePackage(){
    
 $data = [
            'first_referal'     => html_escape($this->input->post('first_referal', TRUE)),
            
        ];   
        
        $id = $this->input->post('rpc_id', TRUE);
    
    
    $success = $this->Referal_package_model->editreferal_packagecommission($data,$id);
            if ($success) {
                $this->session->set_flashdata('success', 'Referal Package Plan Has Been changed');
                redirect('Referal_package');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Referal_package');
            }
    
    
    
}


public function updateCEOPackage(){
    
 $data = [
            'first_referal'     => html_escape($this->input->post('first_referal', TRUE)),
            'second_referal'    => html_escape($this->input->post('second_referal', TRUE)),
            'third_referal'     => html_escape($this->input->post('third_referal', TRUE)),
            
        ];   
        
        $id = html_escape($this->input->post('rpc_id', TRUE));
    
    
    $success = $this->Referal_package_model->editreferal_packagecommission($data,$id);
            if ($success) {
                $this->session->set_flashdata('success', 'Referal Package Plan Has Been changed');
                redirect('Referal_package');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Referal_package');
            }
    
    
    
}


public function updateManagerPackage(){
    
 $data = [
            'first_referal'     => html_escape($this->input->post('first_referal', TRUE)),
            'second_referal'    => html_escape($this->input->post('second_referal', TRUE)),
            
        ];   
        
        $id = html_escape($this->input->post('rpc_id', TRUE));
    
    
    $success = $this->Referal_package_model->editreferal_packagecommission($data,$id);
            if ($success) {
                $this->session->set_flashdata('success', 'Referal Package Plan Has Been changed');
                redirect('Referal_package');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Referal_package');
            }
    
    
    
}




public function addReferal_Package_submit()
{

    $this->form_validation->set_rules('pp_name', 'Package Name', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_currency', 'Package Currency', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_amount', 'Package Amount', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_status', 'Package Status', 'trim|prep_for_form');
   


    if ($this->form_validation->run() == TRUE) {
       
        $data = [
            'pp_name'                      => html_escape($this->input->post('pp_name', TRUE)),
            'pp_currency'                    => $this->input->post('pp_currency', TRUE),
            'pp_amount'                => html_escape($this->input->post('pp_amount', TRUE)),
            'pp_status'              => html_escape($this->input->post('pp_status', TRUE)),
            
        ];

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Referal_package');
        } else {

            $success = $this->Referal_package_model->addreferal_package($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Referal Package  Has Been Added');
                redirect('Referal_package');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Referal_package');
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again!');
        redirect('Referal_package');
    }
}

public function editreferal_package_submit()
{
    $this->form_validation->set_rules('pp_id', 'Package Id', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_name', 'Package Name', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_currency', 'Package Currency', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_amount', 'Package Amount', 'trim|prep_for_form');
    $this->form_validation->set_rules('pp_status', 'Package Status', 'trim|prep_for_form');


    $id  = html_escape($this->input->post('pp_id', TRUE));

    $data['news'] = $this->Referal_package_model->referal_package_model_edit($id);


    if ($this->form_validation->run() == TRUE) {

        $data = [
            'pp_name'                => $this->input->post('pp_name', TRUE),
            'pp_currency'            => html_escape($this->input->post('pp_currency', TRUE)),
            'pp_amount'              => $this->input->post('pp_amount', TRUE),
            'pp_status'              => html_escape($this->input->post('pp_status', TRUE)),
        ];

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Referal_package/editReferal_package/' . $id);
        } else {

            $success = $this->Referal_package_model->editreferal_package($data,$id);
            if ($success) {
                $this->session->set_flashdata('success', 'Referal Package Plan Has Been changed');
                redirect('Referal_package');
            } else {
                $this->session->set_flashdata('danger', 'Error, Please try again!');
                redirect('Referal_package/editReferal_package/' . $id);
            }
        }
    } else {
        $this->session->set_flashdata('danger', 'Error, Please try again!');
        redirect('Referal_package/editReferal_package/' . $id);
    }
}



    ////////////////////////////////////////////////////////////////////

        public function Referal_package_merchant_list()
    {
        $getview['view'] = 'customerdata';
        $data['merchant'] = $this->Referal_package_model->getAllmerchant_referal_package();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/merchantdata', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function Referal_package_merchant_list_Detail($id,$referal_package_id,$referal_code)
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
         $getview['Packag_detail'] = $Packag_detail = $this->Referal_package_model->referal_package_user_data_edit($referal_package_id);
        $getview['Packag_referal_join'] = $this->Referal_package_model->referal_package_customer_data_join($referal_code);
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/detailmerchant', $data);
        $this->load->view('includes/footer', $getview);
        
    }

     public function deletemerchant($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Referal_package/Referal_package_merchant_list');
        } else {
            $success = $this->Referal_package_model->referal_package_deletebyId_customer($id);
            if ($success) {
               
                $this->session->set_flashdata('success', 'Owner Merchant Has Been Deleted');
                redirect('Referal_package/Referal_package_merchant_list');
            } else {
                $this->session->set_flashdata('danger', 'Error, please try again!');
                redirect('Referal_package/Referal_package_merchant_list');
            }
        }
    }


     public function blockmerchant($id)
    {
        $success = $this->mrc->blockmitrabyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'blocked');
            redirect('Referal_package/Referal_package_merchant_list');
        } else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('Referal_package/Referal_package_merchant_list');
        }
    }

    public function unblockmerchant($id)
    {
        $success = $this->mrc->unblockmitrabyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'unblocked');
            redirect('Referal_package/Referal_package_merchant_list');
        } else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('Referal_package/Referal_package_merchant_list');
        }
    }


    //////////////////////////////////////////////////////////////


     public function Referal_package_driver_list()
    {
        $getview['view'] = 'Driverdata';
         $data['driver'] = $this->Referal_package_model->getAlldriver_referal_package();

         // print_r($data);die;

        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();

        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/driverdata', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function Referal_package_driver_list_detail($id,$referal_package_id,$referal_code)
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
         $getview['Packag_detail'] = $Packag_detail = $this->Referal_package_model->referal_package_user_data_edit($referal_package_id);
        $getview['Packag_referal_join'] = $this->Referal_package_model->referal_package_customer_data_join($referal_code);
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/detaildriver', $data);
        $this->load->view('includes/footer', $getview);
        
    }

    public function deletedriver($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Referal_package/Referal_package_driver_list');
        } else {

            $success = $this->Referal_package_model->referal_package_deletebyId_customer($id);
            if ($success) {
                $this->session->set_flashdata('success', 'Driver Has Been Deleted');
                redirect('Referal_package/Referal_package_driver_list');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('Referal_package/Referal_package_driver_list');
            }
        }
    }


     public function blockdriver($id)
    {
        $success = $this->drv->blockdriverbyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'blocked');
            redirect('Referal_package/Referal_package_driver_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Referal_package/Referal_package_driver_list');
        }
    }

    public function unblockdriver($id)
    {
        $success = $this->drv->unblockdriverbyid($id);
        if ($success) {
            $this->session->set_flashdata('success', 'unblocked');
            redirect('Referal_package/Referal_package_driver_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Referal_package/Referal_package_driver_list');
        }
    }


    

//////////////////////////////////////////////////////////////////////////

     public function Referal_package_Customer_list()
    {
        $getview['view'] = 'customerdata';

        $data['customer'] = $this->Referal_package_model->getAllcustomer_referal_package();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/customerdata', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function Referal_package_customer_list_detail($id,$referal_package_id,$referal_code)
    {

        $getview['view'] = 'detailcustomer';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['customer'] = $this->cstm->getcustomerbyid($id);
        $data['currency'] = $this->appset->getcurrency();
        $data['decimal'] = $this->appset->getdecimal();
        $data['countorder'] = $this->cstm->countorder($id);
        $data['wallet'] = $this->cstm->wallet($id);
        $getview['countnotification'] = $this->dasb->countnotif();
        $getview['Packag_detail'] = $Packag_detail = $this->Referal_package_model->referal_package_user_data_edit($referal_package_id);
        $getview['Packag_referal_join'] = $this->Referal_package_model->referal_package_customer_data_join($referal_code);
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/detailcustomer', $data);
        $this->load->view('includes/footer', $getview);
        
    }


    public function block($id)
    {
        $success = $this->cstm->blockusersById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'blocked');
            redirect('Referal_package/Referal_package_Customer_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Referal_package/Referal_package_Customer_list');
        }
    }

    public function unblock($id)
    {
        $success = $this->cstm->unblockusersById($id);
        if ($success) {
            $this->session->set_flashdata('success', 'unblocked');
            redirect('Referal_package/Referal_package_Customer_list');
        } else {
            $this->session->set_flashdata('danger', 'error, please try again!');
            redirect('Referal_package/Referal_package_Customer_list');
        }
    }


        public function deleteusers($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Referal_package/Referal_package_Customer_list');
        } else {
            // $data = $this->cstm->getusersbyid($id);
            // $gambar = $data['customer_image'];
            // unlink('images/customer/' . $gambar);

            $success = $this->Referal_package_model->referal_package_deletebyId_customer($id);
            if ($success) {
                $this->session->set_flashdata('success', 'User Has Been Deleted');
                redirect('Referal_package/Referal_package_Customer_list');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('Referal_package/Referal_package_Customer_list');
            }
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////
      //                     3 . MODULE "Escrow System" 
/////////////////////////////////////////////////////////////////////////////////////////////////


 public function All_Customer_Ride_Request()
    {
        $getview['view'] = 'customer Bid Data';

        $data['customer'] = $this->Referal_package_model->getAllcustomer_bid_data();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/All_Customer_Ride_Request', $data);
        $this->load->view('includes/footer', $getview);
    }


        public function deleteusersbid($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('Referal_package/All_Customer_Ride_Request');
        } else {
           

            $success = $this->Referal_package_model->deletebyId_customer_bid($id);
            if ($success) {
                $this->session->set_flashdata('success', 'User Has Been Deleted');
                redirect('Referal_package/All_Customer_Ride_Request');
            } else {
                $this->session->set_flashdata('danger', 'error, please try again!');
                redirect('Referal_package/All_Customer_Ride_Request');
            }
        }
    }
    
    
    public function Bid_Customer_list_detail($bid_req_id)
    {
        $getview['view'] = 'Driver Bid Data';

        $data['customer'] = $this->Referal_package_model->getAllcustomer_bid_data_of_driver($bid_req_id);
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/All_bid_driver_request', $data);
        $this->load->view('includes/footer', $getview);
    }


// -----------------------------------------------------------------------------------------------------------------

  public function Money_On_Hold_Customer_list()
    {
        $getview['view'] = 'customerdata';

        $data['customer'] = $this->Referal_package_model->getAllcustomer_money_on_hold();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/money_hold_customer_data', $data);
        $this->load->view('includes/footer', $getview);
    }


 public function Money_On_Hold_driver_list()
    {
        $getview['view'] = 'Driverdata';
         $data['driver'] = $this->Referal_package_model->getAlldriver_money_on_hold();

         // print_r($data);die;

        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();

        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/money_hold_driver_data', $data);
        $this->load->view('includes/footer', $getview);
    }


 public function Money_On_Hold_merchant_list()
    {
        $getview['view'] = 'customerdata';
        $data['merchant'] = $this->Referal_package_model->getAllmerchant_money_on_hold();
        $getview['menu'] = $this->appset->getMenuAdmin();
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('Referal_Package/money_hold_mercent_data', $data);
        $this->load->view('includes/footer', $getview);
    }




/////////////////////////////////////////////////////////////////////   
}
