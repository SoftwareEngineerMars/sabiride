<?php
//'tes' => number_format(200 / 100, 2, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Investmentapi extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Investment_model');
        $this->load->helper('date');

        date_default_timezone_set(time_zone);
    }

    function index_get()
    {
        $this->response("Api for Investment!", 200);
    }

public function Get_all_investment_plan_get()
{
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    return false;
    }

 $all_investment_plan = $this->Investment_model->all_investment_plan();
 
 if(!empty($all_investment_plan)){
     
       $message = array(
            'code' => '200',
            'message' => 'Plan Found',
            'data' => $all_investment_plan
        );
     
     
 }else{
     
    $message = array(
            'code' => '201',
            'message' => 'Plan Found',
            'data' => array(),
        );   
     
     
 }

      
 $this->response($message, 200);

}


public function Get_User_all_investment_list_post()
{
    $user_id=$this->input->post('user_id');
    $user_type=$this->input->post('user_type');
    
    if(!empty($user_id))
    {
       $all_investment_user_plan = $this->Investment_model->all_investment_user_plan_taken($user_id);
          if(!empty($all_investment_user_plan))
         {
            $data_all=$this->get_all_user_invest_plan($all_investment_user_plan,$user_id);
            $message = array(
                    'code' => '200',
                    'message' => 'Investment Plan Found',
                    'data' => $data_all,
                );
         }else{
           $message = array(
                    'code' => '201',
                    'message' => 'No any Investment Plan Found',
                    'data' => array(),
                );
         }
  }else{
    $message = array(
            'code' => '201',
            'message' => 'Please Provide Required Key',
            'data' => array(),
        );
 }
   
  $this->response($message, 201);       
}


public function get_all_user_invest_plan($all_investment_user_plan,$user_id)
{
 $all_investment_plan = $this->Investment_model->all_investment_plan_user($user_id); 
 $all_investment_amount = $this->Investment_model->investment_amount($user_id); 
 $data['investment_amount']= $all_investment_amount[0]->ilu_plan_amount;  
 $data['current_balance']= $all_investment_amount[0]->ilu_plan_amount; 
 $per = $this->Investment_model->investment_amount_profit($user_id);
 $percentage = $per;
$totalWidth = $all_investment_amount[0]->ilu_plan_amount;

$new_width = ($percentage / 100) * $totalWidth;
 $data['available_to_withdraw']= $new_width;  
 $dys = $this->Investment_model->investment_amount_dte($user_id);
 $now = time();
$your_date = strtotime($dys);
$datediff1 = $now - $your_date;

$datediff2= round($datediff1 / (60 * 60 * 24));
$datediff3 = 180 - $datediff2;
if($datediff3 <=0)
{
    $datediff3 = 0;
}
 $data['Remaining_days_to_withdraw']= $datediff3;  
 $data['commission_period']= "180";  
 $data['List_of_amount_options_to_invest']=  $all_investment_plan;
 return $data;
    
}

 


public function investment_paymet_method_process_post()
{
  $user_id=$this->input->post('user_id');
  $user_type=$this->input->post('user_type');
  $package_id=$this->input->post('package_id');
  $payment_amount=$this->input->post('payment_amount');
  $payment_mode = $this->input->post('payment_mode');
    
  if(!empty($user_id) && !empty($package_id))
    {
        $current_date= Date('Y-m-d');
        $investment_plan_detail = $this->Investment_model->investment_plan_type_byID($package_id);
        
           
        if(empty($investment_plan_detail))
        {
           $message = array(
            'code' => '201',
            'message' => 'No Investment Plan Data Found',
            );  
           $this->response($message, 201); 
        }

        // if($investment_plan_detail->ipt_amount == $payment_amount)
        // {
        
         if($user_type == 'customer')
          {
 
             $user_detail =  $this->Investment_model->Get_customer_detail_by_id($user_id); 
             $wallet_detail =  $this->Investment_model->get_wallet_amount($user_id);
             $user_name = $user_detail->customer_fullname; 
             $balance = $wallet_detail->balance;
             
          }else if($user_type == 'driver'){
                
             $user_detail =  $this->Investment_model->Get_driver_detail_by_id($user_id); 
             $wallet_detail =  $this->Investment_model->get_wallet_amount($user_id);
             $user_name = $user_detail->driver_name; 
             $balance = $wallet_detail->balance;
             
          }else if($user_type == 'merchant'){
             $user_detail =  $this->Investment_model->Get_merchant_detail_by_id($user_id); 
             $wallet_detail =  $this->Investment_model->get_wallet_amount($user_id);
             $balance = $wallet_detail->balance;
             $user_name = $user_detail->merchant_name; 
         }

         if(empty($user_detail))
         {
           $message = array(
                            'code' => '201',
                            'message' => 'Please send correct User ID and User Type',
                        );  
           $this->response($message, 201); 
        }
        
        $payment_amount_data = $payment_amount*100;
   
        if($balance < $payment_amount_data )
        {
         $message = array(
                    'code' => '201',
                    'message' => 'Please Reacharge Your Wallet First',
                );  
         $this->response($message, 201); 
        }
        
    /////////////////////////////////////////////////////////////////////////////////
    
     $data_insert_data = array(
        'ilu_user_id' => $user_id, 
        'ilu_user_type' => $user_type, 
        'ilu_plan_id' => $investment_plan_detail->ipt_id, 
        'ilu_plan_name' => $investment_plan_detail->ipt_name, 
        'ilu_plan_amount' => $investment_plan_detail->ipt_amount, 
        'ilu_plan_currency' => $investment_plan_detail->ipt_currency, 
        'ilu_plan_profit' => $investment_plan_detail->ipt_profit, 
        'ilu_detail' => $investment_plan_detail->ipt_detail, 
        'ilu_plan_get_profit_days' => $investment_plan_detail->ipt_get_profit_days, 
        'ilu_plan_min_withdraw_days' => $investment_plan_detail->ipt_min_withdraw_days, 
        'ilu_status' => '1', 
        'ilu_created_date' => $current_date, 
        'ilu_update_date' => $current_date,
    
    );
    
      $query = $this->db->insert('investment_list_user',$data_insert_data); // table name
      $insert_id = $this->db->insert_id();

   // $save_data =  $this->Investment_model->investment_package_allcustomer_insert($data_insert);
    //   echo $this->db->last_query(); die;
//   print_r($insert_id);die;
         if(!empty($insert_id))
          {
            $update_balance = $balance - $payment_amount_data;
            $update_balance_data = array(
                    'balance' => $update_balance, 
                );   
            $update_balance_data_success =  $this->Investment_model->update_balance_model($user_id,$update_balance_data);
        
            $update_balance_history = array(
            'id_user' => $user_id,
            'wallet_amount' => $payment_amount_data, 
            'holder_name' => $user_name, 
            'bank' => 'Wallet', 
            'wallet_account' => 'Investment Package Purchage', 
            'type' => 'deduction', 
            'status' => '1', 
             );    
             
             
             $save_data_history =  $this->Investment_model->update_trans_amountinwallet($update_balance_history);   
             $message = array(
                    'code' => '200',
                    'message' => 'Investment Package Purchage Successfully',
                );
            }else{
                
               $message = array(
                        'code' => '201',
                        'message' => 'Something Went Wrong.PLease Try Again',
                    );
                
            }
            
        // }else{
            
        //   $message = array(
        //     'code' => '201',
        //     'message' => 'Amount Not Match With Investment Plan Package',
        //     );  
        // }
        
    }else{
     $message = array(
      'code' => '201',
      'message' => 'Please Provide Required Key',
    );    
   }
    $this->response($message, 201);    
}


public function get_all_user_invest_plan_info_detail($aiup,$user_id){
    
    $ilu_plan_get_profit_days= $aiup->ilu_plan_get_profit_days;
    $ilu_plan_get_profit_days = $aiup->ilu_plan_get_profit_days;
    $current_date = Date('Y-m-d');
    $created_date = $aiup->ilu_created_date;
    $diff = strtotime($current_date) - strtotime($created_date);
   $final_date = abs(round($diff / 86400));
//   print_r($final_date);die;
if($final_date >= $ilu_plan_get_profit_days){
    
$amount_available_to_withdraw = "10"; 
 $Remaining_days_to_receive_commission = $final_date - $ilu_plan_get_profit_days;
    
}else{
 
$amount_available_to_withdraw = "0";

  $Remaining_days_to_receive_commission = $ilu_plan_get_profit_days - $final_date; 
    
}    
    
  $data['days_remaining']= $Remaining_days_to_receive_commission;    
  return $data;
    
    
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////


}
