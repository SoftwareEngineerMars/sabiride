<?php
//'tes' => number_format(200 / 100, 2, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Referal_packageapi extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Referal_package_model');

        date_default_timezone_set(time_zone);
    }

    function index_get()
    {
        $this->response("Api for Investment!", 200);
    }
    


public function Get_all_referalpackage_plan_get()
{
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    return false;
    }

 $referal_package = $this->Referal_package_model->all_referal_package_status();
 
 if(!empty($referal_package)){
     
       $message = array(
            'code' => '200',
            'message' => 'Referal Package  Found',
            'data' => $referal_package
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


public function Get_all_detail_referal_module_post()
{
$user_id=$this->input->post('user_id');
if(!empty($user_id)){
$all_investment_user_plan = $this->Referal_package_model->referal_package_user_id($user_id);
if(!empty($all_investment_user_plan)){
$data_all=$this->get_all_detail_refral_data($all_investment_user_plan,$user_id);  
$message = array(
        'code' => '200',
        'message' => 'Referal Package Plan Found',
        'data' => $data_all,
        );
}else{
   $message = array(
            'code' => '201',
            'message' => 'No any Referal Package Plan Found',
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


public function get_all_detail_refral_data($aiup,$user_id){
    
    
 

// My Balance in referral system (String)
// Amount Available to withdraw (String)

 $all_balance_total = $this->Referal_package_model->get_all_referal_balance($user_id);
 
if($all_balance_total->rpuj_invitation_amount == ''){
    
  $rpuj_invitation_amount  = '0';
}else{
    
     $rpuj_invitation_amount  = $all_balance_total->rpuj_invitation_amount;
    
}
//   print_r($all_balance_total); die;

 $data['referal_code']= $aiup->rpc_referal_code;  
 $data['my_package_id']= $aiup->rpc_package_id;  
 $data['my_packahe_name']= $aiup->rpc_package_name; 
 $data['my_package_currency']= $aiup->rpc_package_currency;  
 $data['my_package_amount']= $aiup->rpc_package_amount;  
 $data['Commission_Amount_to_be_received']= $rpuj_invitation_amount;  
 $data['available_amount_withdraw']= $rpuj_invitation_amount;
 $data['date_purchage']= $aiup->rpc_payment_date;
 
 return $data;    
    
    
    
}


////////////////////////////////////////////////////////////////////////

public function get_all_user_invest_plan($aiup,$user_id){
    
    $aiup->ilu_plan_name;
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
    
 $data['investment_amount']= $aiup->ilu_plan_amount;  
 $data['total_balance_investment']= $aiup->ilu_plan_amount;  
 $data['amount_available_to_withdraw']= "$amount_available_to_withdraw";  
 $data['Remaining_days_to_receive_commission']= "$Remaining_days_to_receive_commission";  
 $data['commission_duration']= "$Remaining_days_to_receive_commission";  
 $data['Commission_Amount_to_be_received']= "$Remaining_days_to_receive_commission";  
 $data['List_of_amount_options_to_invest']= $all_investment_plan = $this->Investment_model->all_investment_plan();
 return $data;
    
}

////////////////////////////////////////////////////////




// public function purchase_referal_package_post()
// {
//     $user_id=$this->input->post('user_id');
//     $user_type=$this->input->post('user_type');
//     $package_id=$this->input->post('package_id');
//     $payment_mode = $this->input->post('payment_mode');
//     $payment_amount =$this->input->post('payment_amount');
    
//     /////  optional 
//     $used_referal_code = $this->input->post('used_referal_code');
//     if(!empty($user_id) && !empty($package_id))
//     {
//         $current_date= Date('Y-m-d');
//         $length = 8;
//         $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//         $eight_dight = substr(str_shuffle($str), 0, $length);
//         $package_detail = $this->Referal_package_model->referal_package_id_row($package_id);
//         $user_referal_used_name_dataaa = $this->Referal_package_model->Get_used_name_userid_data($user_id);    
//         if(empty($package_detail))
//         {
//           $message = array(
//             'code' => '201',
//             'message' => 'No Package Data Found',
//             );  
//           $this->response($message, 201); 
//         }
        
//         if(!empty($user_referal_used_name_dataaa))
//         {
//           $message = array(
//             'code' => '201',
//             'message' => 'This User has Allready Taken Referal Package',
//             );  
//           $this->response($message, 201); 
//         }
     
        
//          if($user_type == 'customer')
//          {
 
//              $user_detail =  $this->Referal_package_model->Get_customer_detail_by_id($user_id); 
//              $wallet_detail =  $this->Referal_package_model->get_wallet_amount($user_id);
//              $user_name = $user_detail->customer_fullname; 
//              $balance = $wallet_detail->balance;
             
//          }else if($user_type == 'driver'){
                
//              $user_detail =  $this->Referal_package_model->Get_driver_detail_by_id($user_id); 
//              $wallet_detail =  $this->Referal_package_model->get_wallet_amount($user_id);
//              $user_name = $user_detail->driver_name; 
//              $balance = $wallet_detail->balance;
             
//          }else if($user_type == 'merchant'){
//              $user_detail =  $this->Referal_package_model->Get_merchant_detail_by_id($user_id); 
//              $wallet_detail =  $this->Referal_package_model->get_wallet_amount($user_id);
//              $balance = $wallet_detail->balance;
//              $user_name = $user_detail->merchant_name; 
//         }
        
//               if(empty($user_detail)){
//                  $message = array(
//                             'code' => '201',
//                             'message' => 'Please send correct User ID and User Type',
                            
//                         );  
//                  $this->response($message, 201); 
//                 }
                
                
                
//                 if($balance < $payment_amount){
//                  $message = array(
//                             'code' => '201',
//                             'message' => 'Please Reacharge Your Wallet First',
                            
//                         );  
//                  $this->response($message, 201); 
//                 }
        
//         // -----------------------------------------------------------------------
        
//         if(!empty($used_referal_code)){
            
//                   $user_referal_used_name = $this->Referal_package_model->Get_used_name_referal_code($used_referal_code);
//                   $package_detailreferal = $this->Referal_package_model->referal_package_id_row($package_id);
                  
                  
                  
                  
                  
//                  if(!empty($user_referal_used_name))
//                  {
//                       $rpc_user_id = $user_referal_used_name->rpc_user_id;
//                       $rpc_user_type = $user_referal_used_name->rpc_user_type;
//                       $rpc_referal_code = $user_referal_used_name->rpc_referal_code;
//                     // $rpc_used_referal_code = $user_referal_used_name->rpc_used_referal_code;
//                       $rpc_used_referal_code = $user_referal_used_name->rpc_referal_code;
//                       $rpc_package_id = $user_referal_used_name->rpc_package_id;
                      
                      
//                       if($rpc_package_id == '1'){
//                       $CEOPackage = $this->Referal_package_model->referal_package_comissionCEOPackage();   
//                       $percentage_datareferal = $CEOPackage->first_referal;
                      
                      
                      
                      
                      
                          
                          
                          
//                       }else if($rpc_package_id == '2'){
//                       $ManagerPackage = $this->Referal_package_model->referal_package_comissionManagerPackage();   
//                       $percentage_datareferal = $ManagerPackage->first_referal;
                      
                      
                      
                      
                      
                      
                      
                          
                          
                          
//                       }else if($rpc_package_id == '3'){
//                       $EmployeePackage = $this->Referal_package_model->referal_package_comissionEmployeePackage();
//                       $percentage_datareferal = $EmployeePackage->first_referal;
   
//                       }
  
//                         //   customer,driver,merchant	
//                         if($rpc_user_type == 'customer'){
                            
//                         $user_detail_referal =  $this->Referal_package_model->Get_customer_detail_by_id($user_id);   
//                         $referal_data_name = $user_detail_referal->customer_fullname; 

//                         }else if($rpc_user_type == 'driver'){
                            
//                         $user_detail_referal =  $this->Referal_package_model->Get_driver_detail_by_id($user_id); 
//                         $referal_data_name = $user_detail_referal->driver_name;

//                         }else if($rpc_user_type == 'merchant'){
                        
//                         $user_detail_referal =  $this->Referal_package_model->Get_merchant_detail_by_id($user_id); 
//                         $referal_data_name = $user_detail_referal->merchant_name; 
                        
//                         }

//                                 $percentage = $percentage_datareferal;
//                                 $totalWidth = $package_detail->pp_amount;
//                                 $new_width = ($percentage / 100) * $totalWidth;
                            
//                                 $rpc_referal_person_join_count = 1; 
//                                 $rpc_used_referal_user_id = $rpc_user_id; 
//                                 $rpc_used_referal_user_type = $rpc_user_type;
//                                 $rpc_used_referal_user_name = $referal_data_name;
                                
                            
                                
//                                 $another_data = array(
//                                 'rpuj_user_id' => $user_id, 
//                                 'rpuj_user_type' => $user_type, 
//                                 'rpuj_user_name' => $user_name, 
//                                 'rpuj_referal_package_name' => $package_detail->pp_name,  
//                                 'rpuj_referal_package_curency' => $package_detail->pp_currency, 
//                                 'rpuj_referal_package_amount' => $package_detail->pp_amount, 
//                                 'rpuj_referal_package_id' => $package_detail->pp_id, 
//                                 'rpuj_referal_code' => $rpc_referal_code, 
//                                 'rpuj_referal_code_user_name' => $referal_data_name, 
//                                 'rpuj_referal_code_user_id' => $rpc_user_id, 
//                                 'rpuj_join_date' => $current_date, 
//                                 'rpuj_package_level' => '0', 
//                                 'rpuj_invitation_amount' => $new_width, 
//                                 'rpuj_invitation_percentage' => '50%', 
                             
                            
//                             );
                            
                            
                            
//                         $save_data =  $this->Referal_package_model->insert_referal_package_user_join($another_data);

                    
//                  }else{
//                  $message = array(
//                         'code' => '201',
//                         'message' => 'Invlaid Referal Code',
//                  );  
//                  $this->response($message, 201);    
//                  }

//         }else{
            
//         $rpc_referal_person_join_count = 0; 
//         $rpc_used_referal_user_id = ''; 
//         $rpc_used_referal_user_type = '';
//         $rpc_used_referal_user_name = '';
//         $rpc_used_referal_code = '';
       
//         }
        
       
//       $data = array(
//         'rpc_user_id' => $user_id, 
//         'rpc_user_type' => $user_type, 
//         'rpc_package_name' => $package_detail->pp_name, 
//         'rpc_package_id' => $package_detail->pp_id, 
//         'rpc_package_currency' => $package_detail->pp_currency, 
//         'rpc_package_amount' => $payment_amount, 
//         'rpc_status' => '1', 
//         'rpc_ceated_date' => $current_date, 
//         'rpc_referal_code' => $eight_dight, 
//         'rpc_referal_person_join_count' => $rpc_referal_person_join_count, 
//         'rpc_used_referal_user_id' => $rpc_used_referal_user_id, 
//         'rpc_used_referal_user_type' => $rpc_used_referal_user_type, 
//         'rpc_used_referal_user_name' => $rpc_used_referal_user_name, 
//         'rpc_used_referal_code' => $rpc_used_referal_code, 
//         'rpc_level' => '0', 
//         'rpc_payment_status' => 'success', 
//         'rpc_payment_mode' => $payment_mode, 
//         'rpc_payment_date' => $current_date, 
//         'rpc_payment_amount' => $payment_amount, 
    
//     );

//  $save_data =  $this->Referal_package_model->insert_referal_package_customer($data);
 
 
//  if(!empty($save_data))
//  {
//         $update_balance = $balance - ($payment_amount*100);
//         $update_balance_data = array(
//             'balance' => $update_balance, 
//         );   
//     $update_balance_data_success =  $this->Referal_package_model->update_balance_model($user_id,$update_balance_data);

//     $update_balance_history = array(
//     'id_user' => $user_id,
//     'wallet_amount' => $payment_amount*100, 
//     'holder_name' => $user_name, 
//     'bank' => 'Wallet', 
//     'wallet_account' => 'Referal Package Purchage', 
//     'type' => 'deduction', 
//     'status' => '1', 
//      );    
     
     
//      $save_data_history =  $this->Referal_package_model->update_trans_amountinwallet($update_balance_history);   
//      $message = array(
//             'code' => '200',
//             'message' => 'Purchase Referal Package Successfully',
//         );
 


// }else{
    
//   $message = array(
//             'code' => '201',
//             'message' => 'Something Went Wrong',
//         );
    
// }
        
        
        
        
        
//     }else{
//     $message = array(
//       'code' => '201',
//       'message' => 'Please Provide Required Key',
//     );    
        
        
        
//     }
//     $this->response($message, 201);
// }




public function purchase_referal_package_post()
{
    $user_id=$this->input->post('user_id');
    $user_type=$this->input->post('user_type');
    $package_id=$this->input->post('package_id');
    $payment_mode = $this->input->post('payment_mode');
    $payment_amount =$this->input->post('payment_amount');
    $used_referal_code = $this->input->post('used_referal_code');    /////  optional 
    if(!empty($user_id) && !empty($package_id))
    {
        $current_date= Date('Y-m-d');
        $length = 8;
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $eight_dight = substr(str_shuffle($str), 0, $length);
        $package_detail = $this->Referal_package_model->referal_package_id_row($package_id);
        $user_referal_used_name_dataaa = $this->Referal_package_model->Get_used_name_userid_data($user_id);
        
        if(empty($package_detail))
        {
           $message = array(
            'code' => '201',
            'message' => 'No Package Data Found',
            );  
           $this->response($message, 201); 
        }
        
        if(!empty($user_referal_used_name_dataaa))
        {
          $message = array(
            'code' => '201',
            'message' => 'This User has Allready Taken Referal Package',
            );  
          $this->response($message, 201); 
        }
      
      ///////////////////////////////////////////////////
         if($user_type == 'customer')
         {
             $user_detail =  $this->Referal_package_model->Get_customer_detail_by_id($user_id); 
             $wallet_detail =  $this->Referal_package_model->get_wallet_amount($user_id);
             $user_name = $user_detail->customer_fullname; 
             $balance = $wallet_detail->balance;
             
         }else if($user_type == 'driver'){
                
             $user_detail =  $this->Referal_package_model->Get_driver_detail_by_id($user_id); 
             $wallet_detail =  $this->Referal_package_model->get_wallet_amount($user_id);
             $user_name = $user_detail->driver_name; 
             $balance = $wallet_detail->balance;
             
         }else if($user_type == 'merchant'){
             $user_detail =  $this->Referal_package_model->Get_merchant_detail_by_id($user_id); 
             $wallet_detail =  $this->Referal_package_model->get_wallet_amount($user_id);
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
                
        if($balance < $payment_amount){
         $message = array(
                    'code' => '201',
                    'message' => 'Please Reacharge Your Wallet First',
                    
                );  
         $this->response($message, 201); 
        }
      
     ////////////////////////////////////////////////////////////////// 
     if(!empty($used_referal_code))
     {
          $user_referal_used_name = $this->Referal_package_model->Get_used_name_referal_code($used_referal_code);
          $package_detailreferal = $this->Referal_package_model->referal_package_id_row($package_id);

          if($user_referal_used_name){
              $rpc_user_id = $user_referal_used_name->rpc_user_id;
              $rpc_user_type = $user_referal_used_name->rpc_user_type;
              $rpc_referal_code = $user_referal_used_name->rpc_referal_code;
              $rpc_used_referal_code = $user_referal_used_name->rpc_referal_code;
              $rpc_package_id = $user_referal_used_name->rpc_package_id;    ////   user By Pckage
              $user_referal_comission_data = $user_referal_used_name->rpc_used_referal_code;
              
               //   customer,driver,merchant    
                if($rpc_user_type == 'customer'){
                    
                $user_detail_referal =  $this->Referal_package_model->Get_customer_detail_by_id($rpc_user_id);   
                $referal_data_name = $user_detail_referal->customer_fullname; 

                }else if($rpc_user_type == 'driver'){
                    
                $user_detail_referal =  $this->Referal_package_model->Get_driver_detail_by_id($rpc_user_id); 
                $referal_data_name = $user_detail_referal->driver_name;

                }else if($rpc_user_type == 'merchant'){
                
                $user_detail_referal =  $this->Referal_package_model->Get_merchant_detail_by_id($rpc_user_id); 
                $referal_data_name = $user_detail_referal->merchant_name; 
                
                }

                if($rpc_package_id == '1'){
                $CEOPackage = $this->Referal_package_model->referal_package_comissionCEOPackage(); 
                $CEOPackageFIRST = $CEOPackage->first_referal;
                $CEOPackageSECOND = $CEOPackage->second_referal;
                $CEOPackageTHIRD= $CEOPackage->third_referal;
                $CEOPackageLEVEL = '3';

                $CEOPackageAMOUNT = $package_detail->pp_amount;
                $CEOPackageCOMMISSION = ($CEOPackageFIRST / 100) * $CEOPackageAMOUNT;
                    
                $rpc_referal_person_join_count = 1; 
                $rpc_used_referal_user_id = $rpc_user_id; 
                $rpc_used_referal_user_type = $rpc_user_type;
                $rpc_used_referal_user_name = $referal_data_name;
                
                $CEOPackageINSERTDATA = array(
                                            'rpuj_user_id' => $user_id, 
                                            'rpuj_user_type' => $user_type, 
                                            'rpuj_user_name' => $user_name, 
                                            'rpuj_referal_code_user_name' => $referal_data_name,   ////
                                            'rpuj_referal_code_user_id' => $rpc_user_id,  ///  which referal code userd
                                            'rpuj_referal_package_name' => $package_detail->pp_name,  
                                            'rpuj_referal_package_curency' => $package_detail->pp_currency, 
                                            'rpuj_referal_package_amount' => $package_detail->pp_amount, 
                                            'rpuj_referal_package_id' => $package_detail->pp_id, 
                                            'rpuj_referal_code' => $rpc_referal_code,  
                                            'rpuj_join_date' => $current_date, 
                                            'rpuj_package_level' => $CEOPackageLEVEL, 
                                            'rpuj_invitation_amount' => round($CEOPackageCOMMISSION), 
                                            'rpuj_invitation_percentage' => $CEOPackageFIRST, 
                                           );
                    
                    
                    
                   $CEOPackageSAVEDATA =  $this->Referal_package_model->insert_referal_package_user_join($CEOPackageINSERTDATA);


                    if(!empty($user_referal_comission_data)){

                  $CEOPUSERREFERALDETAIL = $this->Referal_package_model->Get_used_name_referal_code($user_referal_comission_data);
                  if(!empty($CEOPUSERREFERALDETAIL)){
                    $CEOPSrpc_user_id = $CEOPUSERREFERALDETAIL->rpc_user_id;
                    $CEOPSrpc_user_type = $CEOPUSERREFERALDETAIL->rpc_user_type;
                    $CEOPSrpc_referal_code = $CEOPUSERREFERALDETAIL->rpc_referal_code;
                    $CEOPSrpc_used_referal_code = $CEOPUSERREFERALDETAIL->rpc_referal_code;
                    $CEOPSrpc_package_id = $CEOPUSERREFERALDETAIL->rpc_package_id;    ////   user By Pckage
                    $CEOPSuser_referal_comission_data = $CEOPUSERREFERALDETAIL->rpc_used_referal_code;

                    if($CEOPSrpc_user_type == 'customer'){
                        
                    $CEOPuser_detail_referal =  $this->Referal_package_model->Get_customer_detail_by_id($CEOPSrpc_user_id);   
                    $CEOPreferal_data_name = $CEOPuser_detail_referal->customer_fullname; 

                    }else if($CEOPSrpc_user_type == 'driver'){
                        
                    $CEOPuser_detail_referal =  $this->Referal_package_model->Get_driver_detail_by_id($CEOPSrpc_user_id); 
                    $CEOPreferal_data_name = $CEOPuser_detail_referal->driver_name;

                    }else if($CEOPSrpc_user_type == 'merchant'){
                    
                    $CEOPuser_detail_referal =  $this->Referal_package_model->Get_merchant_detail_by_id($CEOPSrpc_user_id); 
                    $CEOPreferal_data_name = $CEOPuser_detail_referal->merchant_name; 
                    
                    }
                    

                        $CEOPStotalWidth = $package_detail->pp_amount;
                        $CEOPSAmount = ($CEOPackageSECOND / 100) * $CEOPStotalWidth;
                    
                        $another_dataCEOPSINSERT = array(
                        'rpuj_user_id' => $user_id, 
                        'rpuj_user_type' => $user_type, 
                        'rpuj_user_name' => $user_name, 
                        'rpuj_referal_package_name' => $package_detail->pp_name,  
                        'rpuj_referal_package_curency' => $package_detail->pp_currency, 
                        'rpuj_referal_package_amount' => $package_detail->pp_amount, 
                        'rpuj_referal_package_id' => $package_detail->pp_id, 
                        'rpuj_referal_code' => $rpc_referal_code, 
                        'rpuj_referal_code_user_name' => $CEOPreferal_data_name, 
                        'rpuj_referal_code_user_id' => $CEOPSrpc_user_id, 
                        'rpuj_join_date' => $current_date, 
                        'rpuj_package_level' => $CEOPSrpc_package_id, 
                        'rpuj_invitation_amount' => $CEOPSAmount, 
                        'rpuj_invitation_percentage' => $CEOPackageSECOND, 
                     
                    
                    );
                    
                    
                    
                $another_dataCEOPSSAVEDATA =  $this->Referal_package_model->insert_referal_package_user_join($another_dataCEOPSINSERT);



            }


            if(!empty($CEOPSuser_referal_comission_data)){

            $CEOPUSERREFERALDETAILTHIRD = $this->Referal_package_model->Get_used_name_referal_code($CEOPSuser_referal_comission_data);

            if(!empty($CEOPUSERREFERALDETAILTHIRD)){


                    $CEOPTrpc_user_id = $CEOPUSERREFERALDETAILTHIRD->rpc_user_id;
                    $CEOPTrpc_user_type = $CEOPUSERREFERALDETAILTHIRD->rpc_user_type;
                    $CEOPTrpc_referal_code = $CEOPUSERREFERALDETAILTHIRD->rpc_referal_code;
                    $CEOPTrpc_used_referal_code = $CEOPUSERREFERALDETAILTHIRD->rpc_referal_code;
                    $CEOPTrpc_package_id = $CEOPUSERREFERALDETAILTHIRD->rpc_package_id;    ////   user By Pckage
                    $CEOPTuser_referal_comission_data = $CEOPUSERREFERALDETAILTHIRD->rpc_used_referal_code;

                    if($CEOPTrpc_user_type == 'customer'){
                        
                    $CEOPTuser_detail_referal =  $this->Referal_package_model->Get_customer_detail_by_id($CEOPTrpc_user_id);   
                    $CEOPTreferal_data_name = $CEOPuser_detail_referal->customer_fullname; 

                    }else if($CEOPTrpc_user_type == 'driver'){
                        
                    $CEOPTuser_detail_referal =  $this->Referal_package_model->Get_driver_detail_by_id($CEOPTrpc_user_id); 
                    $CEOPTreferal_data_name = $CEOPuser_detail_referal->driver_name;

                    }else if($CEOPTrpc_user_type == 'merchant'){
                    
                    $CEOPTuser_detail_referal =  $this->Referal_package_model->Get_merchant_detail_by_id($CEOPTrpc_user_id); 
                    $CEOPTreferal_data_name = $CEOPuser_detail_referal->merchant_name; 
                    
                    }
                    

                        $CEOPTtotalWidth = $package_detail->pp_amount;
                        $CEOPTAmount = ($CEOPackageTHIRD / 100) * $CEOPTtotalWidth;
                    
                        $another_dataCEOPSINSERTTHIRS = array(
                        'rpuj_user_id' => $user_id, 
                        'rpuj_user_type' => $user_type, 
                        'rpuj_user_name' => $user_name, 
                        'rpuj_referal_package_name' => $package_detail->pp_name,  
                        'rpuj_referal_package_curency' => $package_detail->pp_currency, 
                        'rpuj_referal_package_amount' => $package_detail->pp_amount, 
                        'rpuj_referal_package_id' => $package_detail->pp_id, 
                        'rpuj_referal_code' => $rpc_referal_code, 
                        'rpuj_referal_code_user_name' => $CEOPTreferal_data_name, 
                        'rpuj_referal_code_user_id' => $CEOPTrpc_user_id, 
                        'rpuj_join_date' => $current_date, 
                        'rpuj_package_level' => $CEOPTrpc_package_id, 
                        'rpuj_invitation_amount' => $CEOPTAmount, 
                        'rpuj_invitation_percentage' => $CEOPackageTHIRD, 
                     
                    
                    );
                    
                    
                    
                $another_dataCEOPSSAVEDATATHIRD =  $this->Referal_package_model->insert_referal_package_user_join($another_dataCEOPSINSERTTHIRS);

            }


            }

   

              }


                }else if($rpc_package_id == '2'){
                $ManagerPackage = $this->Referal_package_model->referal_package_comissionManagerPackage();   
                $ManagerPackageFIRST = $ManagerPackage->first_referal;
                $ManagerPackageSECOND = $ManagerPackage->second_referal;
                $ManagerPackageLEVEL = '2';

                $EmployeePackageAMOUNT = $package_detail->pp_amount;
                $EmployeePackageCOMMISSION = ($EmployeePackageFIRST / 100) * $EmployeePackageAMOUNT;
                    
                $rpc_referal_person_join_count = 1; 
                $rpc_used_referal_user_id = $rpc_user_id; 
                $rpc_used_referal_user_type = $rpc_user_type;
                $rpc_used_referal_user_name = $referal_data_name;
                
                $EmployeePackageINSERTDATA = array(
                                            'rpuj_user_id' => $user_id, 
                                            'rpuj_user_type' => $user_type, 
                                            'rpuj_user_name' => $user_name, 
                                            'rpuj_referal_code_user_name' => $referal_data_name,   ////
                                            'rpuj_referal_code_user_id' => $rpc_user_id,  ///  which referal code userd
                                            'rpuj_referal_package_name' => $package_detail->pp_name,  
                                            'rpuj_referal_package_curency' => $package_detail->pp_currency, 
                                            'rpuj_referal_package_amount' => $package_detail->pp_amount, 
                                            'rpuj_referal_package_id' => $package_detail->pp_id, 
                                            'rpuj_referal_code' => $rpc_referal_code,  
                                            'rpuj_join_date' => $current_date, 
                                            'rpuj_package_level' => $EmployeePackageLEVEL, 
                                            'rpuj_invitation_amount' => round($EmployeePackageCOMMISSION), 
                                            'rpuj_invitation_percentage' => $EmployeePackageFIRST, 
                                           );
                    
                    
                    
        $EmployeePackageSAVEDATA =  $this->Referal_package_model->insert_referal_package_user_join($EmployeePackageINSERTDATA);
          if(!empty($user_referal_comission_data)){

            $EPUSERREFERALDETAIL = $this->Referal_package_model->Get_used_name_referal_code($user_referal_comission_data);

            if(!empty($EPUSERREFERALDETAIL)){

                $EPSrpc_user_id = $EPUSERREFERALDETAIL->rpc_user_id;
                $EPSrpc_user_type = $EPUSERREFERALDETAIL->rpc_user_type;
                $EPSrpc_referal_code = $EPUSERREFERALDETAIL->rpc_referal_code;
                $EPSrpc_used_referal_code = $EPUSERREFERALDETAIL->rpc_referal_code;
                $EPSrpc_package_id = $EPUSERREFERALDETAIL->rpc_package_id;    ////   user By Pckage
                $EPSuser_referal_comission_data = $EPUSERREFERALDETAIL->rpc_used_referal_code;

                if($EPSrpc_user_type == 'customer'){
                    
                $EPSuser_detail_referal =  $this->Referal_package_model->Get_customer_detail_by_id($EPSrpc_user_id);   
                $EPSreferal_data_name = $user_detail_referal->customer_fullname; 

                }else if($EPSrpc_user_type == 'driver'){
                    
                $EPSuser_detail_referal =  $this->Referal_package_model->Get_driver_detail_by_id($EPSrpc_user_id); 
                $EPSreferal_data_name = $user_detail_referal->driver_name;

                }else if($EPSrpc_user_type == 'merchant'){
                
                $EPSuser_detail_referal =  $this->Referal_package_model->Get_merchant_detail_by_id($EPSrpc_user_id); 
                $EPSreferal_data_name = $user_detail_referal->merchant_name; 
                
                }




                    $EPStotalWidth = $package_detail->pp_amount;
                    $EPSManagerPackageAmount = ($ManagerPackageSECOND / 100) * $EPStotalWidth;
                
                    $another_dataManagerPackage = array(
                    'rpuj_user_id' => $user_id, 
                    'rpuj_user_type' => $user_type, 
                    'rpuj_user_name' => $user_name, 
                    'rpuj_referal_package_name' => $package_detail->pp_name,  
                    'rpuj_referal_package_curency' => $package_detail->pp_currency, 
                    'rpuj_referal_package_amount' => $package_detail->pp_amount, 
                    'rpuj_referal_package_id' => $package_detail->pp_id, 
                    'rpuj_referal_code' => $rpc_referal_code, 
                    'rpuj_referal_code_user_name' => $EPSreferal_data_name, 
                    'rpuj_referal_code_user_id' => $EPSrpc_user_id, 
                    'rpuj_join_date' => $current_date, 
                    'rpuj_package_level' => $package_level, 
                    'rpuj_invitation_amount' => $EPSManagerPackageAmount, 
                    'rpuj_invitation_percentage' => $ManagerPackageSECOND, 
                 
                
                );
                
                
                
            $save_data2 =  $this->Referal_package_model->insert_referal_package_user_join($another_dataManagerPackage);



            }
                   

              }


                }else if($rpc_package_id == '3'){
                $EmployeePackage = $this->Referal_package_model->referal_package_comissionEmployeePackage();
                $EmployeePackageFIRST = $EmployeePackage->first_referal;
                $EmployeePackageLEVEL = '1';

                        $EmployeePackageAMOUNT = $package_detail->pp_amount;
                        $EmployeePackageCOMMISSION = ($EmployeePackageFIRST / 100) * $EmployeePackageAMOUNT;
                    
                        $rpc_referal_person_join_count = 1; 
                        $rpc_used_referal_user_id = $rpc_user_id; 
                        $rpc_used_referal_user_type = $rpc_user_type;
                        $rpc_used_referal_user_name = $referal_data_name;
                        
                        $EmployeePackageINSERTDATA = array(
                                                    'rpuj_user_id' => $user_id, 
                                                    'rpuj_user_type' => $user_type, 
                                                    'rpuj_user_name' => $user_name, 
                                                    'rpuj_referal_code_user_name' => $referal_data_name,   ////
                                                    'rpuj_referal_code_user_id' => $rpc_user_id,  ///  which referal code userd
                                                    'rpuj_referal_package_name' => $package_detail->pp_name,  
                                                    'rpuj_referal_package_curency' => $package_detail->pp_currency, 
                                                    'rpuj_referal_package_amount' => $package_detail->pp_amount, 
                                                    'rpuj_referal_package_id' => $package_detail->pp_id, 
                                                    'rpuj_referal_code' => $rpc_referal_code,  
                                                    'rpuj_join_date' => $current_date, 
                                                    'rpuj_package_level' => $EmployeePackageLEVEL, 
                                                    'rpuj_invitation_amount' => round($EmployeePackageCOMMISSION), 
                                                    'rpuj_invitation_percentage' => $EmployeePackageFIRST, 
                                                   );
                                                      
                      $EmployeePackageSAVEDATA =  $this->Referal_package_model->insert_referal_package_user_join($EmployeePackageINSERTDATA);

                }










          }else{
           $message = array(
                      'code' => '201',
                      'message' => 'Invlaid Referal Code',
                      );  
           $this->response($message, 201);
          }
        
      }else{
          
        $rpc_referal_person_join_count = 0; 
        $rpc_used_referal_user_id = ''; 
        $rpc_used_referal_user_type = '';
        $rpc_used_referal_user_name = '';
        $rpc_used_referal_code = '';
 
      }

     $data = array(
        'rpc_user_id' => $user_id, 
        'rpc_user_type' => $user_type, 
        'rpc_package_name' => $package_detail->pp_name, 
        'rpc_package_id' => $package_detail->pp_id, 
        'rpc_package_currency' => $package_detail->pp_currency, 
        'rpc_package_amount' => $payment_amount, 
        'rpc_status' => '1', 
        'rpc_ceated_date' => $current_date, 
        'rpc_referal_code' => $eight_dight, 
        'rpc_referal_person_join_count' => $rpc_referal_person_join_count, 
        'rpc_used_referal_user_id' => $rpc_used_referal_user_id, 
        'rpc_used_referal_user_type' => $rpc_used_referal_user_type, 
        'rpc_used_referal_user_name' => $rpc_used_referal_user_name, 
        'rpc_used_referal_code' => $rpc_used_referal_code, 
        'rpc_level' => '0', 
        'rpc_payment_status' => 'success', 
        'rpc_payment_mode' => $payment_mode, 
        'rpc_payment_date' => $current_date, 
        'rpc_payment_amount' => $payment_amount, 
    
    );

   $save_data =  $this->Referal_package_model->insert_referal_package_customer($data); 
    if(!empty($save_data))
    {
        $update_balance = $balance - ($payment_amount*100);
        $update_balance_data = array(
            'balance' => $update_balance, 
        );   
    $update_balance_data_success =  $this->Referal_package_model->update_balance_model($user_id,$update_balance_data);
    
    $update_balance_history = array(
    'id_user' => $user_id,
    'wallet_amount' => $payment_amount*100, 
    'holder_name' => $user_name, 
    'bank' => 'Wallet', 
    'wallet_account' => 'Referal Package Purchage', 
    'type' => 'deduction', 
    'status' => '1', 
     );    
     
     
     $save_data_history =  $this->Referal_package_model->update_trans_amountinwallet($update_balance_history);   
     $message = array(
            'code' => '200',
            'message' => 'Purchase Referal Package Successfully',
        );
    
    
    
    }else{
    
    $message = array(
            'code' => '201',
            'message' => 'Something Went Wrong',
        );
    
    }
      
    }else{
     $message = array(
      'code' => '201',
      'message' => 'Please Provide Required Key',
       );   
    }
  $this->response($message, 201);   
}






public function Get_all_user_referal_history_post()
{
$user_id=$this->input->post('user_id');
if(!empty($user_id)){
$all_investment_user_plan = $this->Referal_package_model->referal_package_user_id($user_id);
if(!empty($all_investment_user_plan)){
    
    $data_all=$this->get_all_detail_refral_datareferal_history($all_investment_user_plan,$user_id);  

    $message = array(
            'code' => '200',
            'message' => 'Referal Package Plan Found',
            'data' => $data_all,
        );
 
}else{
    
   $message = array(
            'code' => '201',
            'message' => 'No any Referal Package Plan Found',
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



public function get_all_detail_refral_datareferal_history($aiup,$user_id){

    $all_balance_total = $this->Referal_package_model->get_all_referal_balance($user_id);  ///all_total+sum amount
 if($all_balance_total->rpuj_invitation_amount == '')
 {
     $rpuj_invitation_amount  = '0';
}else{
     $rpuj_invitation_amount  = $all_balance_total->rpuj_invitation_amount;
}

 $get_all_referal_all_info = $this->Referal_package_model->get_all_referal_all_info($user_id);
 $data['referal_code']= $aiup->rpc_referal_code;  
 $data['my_package_id']= $aiup->rpc_package_id;  
 $data['my_packahe_name']= $aiup->rpc_package_name; 
 $data['my_package_currency']= $aiup->rpc_package_currency;  
 $data['my_package_amount']= $aiup->rpc_package_amount;  
 $data['Commission_Amount_to_be_received']= $rpuj_invitation_amount;  
 $data['available_amount_withdraw']= $rpuj_invitation_amount;
 $data['history_referal']= $get_all_referal_all_info;
 return $data;    
  
}



 
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////


}
