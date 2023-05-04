<?php
//'tes' => number_format(200 / 100, 2, ",", "."),
defined('BASEPATH') or exit('No direct script access allowed');
class Withdraw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('Customer_model');
        $this->load->model('Appsettings_model');
        $this->load->model('Driver_model');
        date_default_timezone_set(time_zone);
          header('Content-Type: application/json');
       $this->output->set_content_type('application/json');
    }

    function index_get()
    {
       // $this->response("Api for ornids!", 200);
    }

   
 function withdraw_live()
    {
        
$balance = $_POST['balance'];
$user_id = $_POST['user_id'];
       
        $query = $this->db->select('*')->from('balance')->where('id_user', $user_id)->get();
        $response = $query->num_rows() > 0 ? $query->row()->balance : false;
        if($response)
        {
    //           $response = substr($response, 0, -2);
    //   $response = (int)$response;
    $balance = $balance."00";
            $bl = $response + $balance;
            $user = array('balance'=>$bl);
                    $this->db->where('id_user', $user_id)->update('balance', $user);
                    
                   $query = $this->db->select('rpuj_invitation_amount')->from('referal_package_user_join')->where('rpuj_referal_code_user_id', $user_id)->get();
        $response1 = $query->num_rows() > 0 ? $query->row()->rpuj_invitation_amount : 0; 
        
        if($response1 > 0 )
        {
               $blj = $response1 - $balance;
               if($blj <= 0)
               {
                   $blj = 0;
               }
            $user = array('rpuj_invitation_amount'=>$blj);
                    $this->db->where('rpuj_referal_code_user_id', $user_id)->update('referal_package_user_join', $user);
        }
                   
        }
      
       
            $message = array(
                'message' => 'withdrawn',
                'data' => []
            );
   
     echo json_encode($message, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
            exit();
         
    }

   
 function withdraw_admin()
    {
        
$balance = $_POST['amount'];
$user_id = $_POST['user_id'];
$name = $_POST['holder_name'];

$account = $_POST['account'];
       $acc = "";
       if($account == 1)
       {
          $acc = "Earning" ;
          
        // $this->db->where('ilu_user_id',$user_id)->delete('investment_list_user');
       }
       if($account == 2)
       {
          $acc = "Earning & Capital" ;
       }
       $chechdb=$this->db->get_where('wallet',array('id_user'=>$user_id,'status'=>0))->result();
       if(count($chechdb)>0){
           $message = array(
                 'message' => 'you have a pending transaction',
                 'data' => []
             );
    
      echo json_encode($message, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
       }else{ 
        $data = array(
           
            'wallet_amount'=>$balance."00",
            'holder_name'=>$name,
            'type'=>'withdraw',
            'bank'=>'Invest & earn',
            'wallet_account'=>$acc,
            'id_user'=>$user_id,
            'status'=>0
            );
            
           
                     $this->db->insert('wallet', $data); 
                     
                   
                    
         
       
        
             $message = array(
                 'message' => 'withdrawn',
                 'data' => []
             );
    
      echo json_encode($message, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
      } 
       
            exit();
         
    }
   

}
