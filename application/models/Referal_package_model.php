<?php
class Referal_package_model extends CI_model
{
    public function all_referal_package()
    {
       $query = $this->db->get('referal_package'); // table name
       $result = $query->result();
       return $result;
    }
    
      public function referal_package_id_row($id)
    {
        
        $query = $this->db->where('pp_id',$id);
        $query = $this->db->get('referal_package');
        $result = $query->row();
       return $result;
       
    }
    
    
    
    public function Get_used_name_referal_code($referal_code){
        
       $this->db->where('rpc_referal_code', $referal_code);
       $query = $this->db->get('referal_package_customer'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
 
    public function referal_package_comissionCEOPackage(){
        
       $this->db->where('rpc_id', '1');
       $query = $this->db->get('referal_package_comission'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
    public function referal_package_comissionManagerPackage(){
        
       $this->db->where('rpc_id', '2');
       $query = $this->db->get('referal_package_comission'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
    public function referal_package_comissionEmployeePackage(){
        
       $this->db->where('rpc_id', '3');
       $query = $this->db->get('referal_package_comission'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
    
    
    
    
    public function get_wallet_amount($user_id){
        $this->db->where('id_user', $user_id);
       $query = $this->db->get('balance'); // table name
       $result = $query->row();
       return $result;
        
    }
    
     public function Get_used_name_userid_data($user_id){
        
       $this->db->where('rpc_user_id', $user_id);
       $query = $this->db->get('referal_package_customer'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
        public function Get_used_name_referal_code_result($referal_code){
        
       $this->db->where('rpuj_referal_code', $referal_code);
       $query = $this->db->get('referal_package_user_join'); // table name
       $result = $query->result();
       return $result;    
        
    }
    
    
      public function all_referal_package_status()
    {   
        $this->db->where('pp_status', '1');
       $query = $this->db->get('referal_package'); // table name
       $result = $query->result();
       return $result;
    }

 public function referal_package_model_edit($id)
    {
        return $this->db->get_where('referal_package', ['pp_id' => $id])->row_array();
    }
   

     public function referal_package_deletebyId($id)
    {
        $this->db->where('pp_id', $id);
        return $this->db->delete('referal_package');
    }
    
     public function referal_trans_deletebyId($id)
    {
        $this->db->where('rpc_user_id', $id);
        return $this->db->delete('referal_package_customer');
    }


 public function addreferal_package($data)
    {
        return $this->db->insert('referal_package', $data);
    }

     public function editreferal_package($data,$id)
    {
        $this->db->where('pp_id', $id);
        return $this->db->update('referal_package', $data);
    }
    
    public function updateReferralPackage($id, $data) {
        $this->db->where('rpc_user_id', $id);
        return $this->db->update('referal_package_customer', $data);
    }
    
    
     public function editreferal_packagecommission($data,$id)
    {
        $this->db->where('rpc_id', $id);
        return $this->db->update('referal_package_comission', $data);
    }

     public function referal_package_deletebyId_customer($id)
    {
        $this->db->where('rpc_id', $id);
        return $this->db->delete('referal_package_customer');
    }

     public function referal_package_user_data_edit($id)
    {
        return $this->db->get_where('referal_package_customer', ['rpc_id' => $id])->row_array();
    }
    
     public function referal_package_user_id($id)
    {
        return $this->db->get_where('referal_package_customer', ['rpc_user_id' => $id])->row();
    }
    
    public function get_all_referal_balance($user_id){
         
    
        $query = $this->db->select_sum('rpuj_invitation_amount');
        $query = $this->db->where('rpuj_referal_code_user_id',$user_id);
        $query = $this->db->get('referal_package_user_join');
        $result = $query->row();
        return $result; 
        
        
    }
    
    
     public function get_all_referal_all_info($user_id){
         
    
        // $query = $this->db->select_sum('rpuj_invitation_amount');
        $query = $this->db->where('rpuj_referal_code_user_id',$user_id);
        $query = $this->db->get('referal_package_user_join');
        $result = $query->result();
        return $result; 
        
        
    }


    public function referal_package_customer_data_join($referal_code){

        $this->db->select('referal_package_user_join.*,customer.*');
        $query = $this->db->where('referal_package_user_join.rpuj_user_type','customer');
        $query = $this->db->where('referal_package_user_join.rpuj_referal_code',$referal_code);
        $this->db ->join('customer', 'customer.id=referal_package_user_join.rpuj_user_id');
        $query = $this->db->order_by('referal_package_user_join.rpuj_id','DESC');
        $query = $this->db->get('referal_package_user_join');
        $result = $query->result_array();
        return $result; 



    }

        public function referal_package_driver_data_join($referal_code){

        $this->db->select('referal_package_user_join.*,driver.*');
        $query = $this->db->where('referal_package_user_join.rpuj_user_type','driver');
        $query = $this->db->where('referal_package_user_join.rpuj_referal_code',$referal_code);
        $this->db ->join('driver', 'driver.id=referal_package_user_join.rpuj_user_id');
        $query = $this->db->order_by('referal_package_user_join.rpuj_id','DESC');
        $query = $this->db->get('referal_package_user_join');
        $result = $query->result_array();
        return $result; 



    }

        public function referal_package_mercent_data_join($referal_code){

        $this->db->select('referal_package_user_join.*,merchant.*');
        $query = $this->db->where('referal_package_user_join.rpuj_user_type','merchant');
        $query = $this->db->where('referal_package_user_join.rpuj_referal_code',$referal_code);
        $this->db ->join('merchant', 'merchant.merchant_id=referal_package_user_join.rpuj_user_id');
        $query = $this->db->order_by('referal_package_user_join.rpuj_id','DESC');
        $query = $this->db->get('referal_package_user_join');
        $result = $query->result_array();
        return $result; 



    }

    public function getAllcustomer_referal_package(){

        $this->db->select('referal_package_customer.*,customer.*');
        $query = $this->db->where('referal_package_customer.rpc_user_type','customer');
        $this->db ->join('customer', 'customer.id=referal_package_customer.rpc_user_id');
        $query = $this->db->order_by('referal_package_customer.rpc_id','DESC');
        $query = $this->db->get('referal_package_customer');
        $result = $query->result_array();
        return $result;


    }

        public function getAlldriver_referal_package(){

        $this->db->select('referal_package_customer.*,driver.*');
        $this->db ->join('driver', 'driver.id=referal_package_customer.rpc_user_id');
        $query = $this->db->where('referal_package_customer.rpc_user_type','driver');
        $query = $this->db->order_by('referal_package_customer.rpc_id','DESC');
        $query = $this->db->get('referal_package_customer');
        $result = $query->result_array();
        return $result;


    }


    public function getAllmerchant_referal_package(){

        $this->db->select('referal_package_customer.*,merchant.*');
        $query = $this->db->where('referal_package_customer.rpc_user_type','merchant');
        $this->db ->join('merchant', 'merchant.merchant_id=referal_package_customer.rpc_user_id');
        $query = $this->db->order_by('referal_package_customer.rpc_id','DESC');
        $query = $this->db->get('referal_package_customer');
        $result = $query->result_array();
        return $result;


    }
    
    
      public function Get_customer_detail_by_id($user_id){
        
       $this->db->where('id', $user_id);
       $query = $this->db->get('customer'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
    
      public function Get_driver_detail_by_id($user_id){
        
       $this->db->where('id', $user_id);
       $query = $this->db->get('driver'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
      public function Get_merchant_detail_by_id($user_id){
        
       $this->db->where('merchant_id', $user_id);
       $query = $this->db->get('merchant'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
    
     public function insert_referal_package_customer($data){
        
       
       $query = $this->db->insert('referal_package_customer',$data); // table name
       $insert_id = $this->db->insert_id();
       return  $insert_id; 
        
    }
    
     public function insert_referal_package_user_join($data){
        
     
       $query = $this->db->insert('referal_package_user_join',$data); // table name
       $insert_id = $this->db->insert_id();
       return  $insert_id;    
        
    }

/////////////////////////////////////////////////// 3 module  //////////////////////////////////////////////////////////////////

  public function getAllcustomer_bid_data(){

        $this->db->select('all_ride_request_list.*,customer.*');
        $query = $this->db->where('all_ride_request_list.rr_user_type','customer');
        $this->db ->join('customer', 'customer.id=all_ride_request_list.rr_customer_id');
        $query = $this->db->order_by('all_ride_request_list.ride_req_id','DESC');
        $query = $this->db->get('all_ride_request_list');
        $result = $query->result_array();
        return $result;


    }   
    
     public function deletebyId_customer_bid($id)
    {
        $this->db->where('ride_req_id', $id);
        return $this->db->delete('all_ride_request_list');
    }
    
    
     public function getAllcustomer_bid_data_of_driver($bid_req_id){
        
         $this->db->select('ride_bid_request_driver.*,driver.*');
        $this->db ->join('driver', 'driver.id=ride_bid_request_driver.rbr_driver_id');
        $query = $this->db->where('ride_bid_request_driver.bid_id',$bid_req_id);
        $query = $this->db->order_by('ride_bid_request_driver.rbr_id','DESC');
        $query = $this->db->get('ride_bid_request_driver');
        $result = $query->result_array();
        return $result;

    } 
    
    
    
    /////////////////////////////////////////////////////
    
     public function getAllcustomer_money_on_hold(){

        $this->db->select('money_on_hold.*,customer.*');
        $query = $this->db->where('money_on_hold.moh_user_type','customer');
        $this->db ->join('customer', 'customer.id=money_on_hold.moh_user_id');
        $query = $this->db->order_by('money_on_hold.moh_id','DESC');
        $query = $this->db->get('money_on_hold');
        $result = $query->result_array();
        return $result;


    }

     public function getAlldriver_money_on_hold(){

        $this->db->select('money_on_hold.*,driver.*');
        $this->db ->join('driver', 'driver.id=money_on_hold.moh_user_id');
        $query = $this->db->where('money_on_hold.moh_user_type','driver');
        $query = $this->db->order_by('money_on_hold.moh_id','DESC');
        $query = $this->db->get('money_on_hold');
        $result = $query->result_array();
        return $result;


    }


    public function getAllmerchant_money_on_hold(){

        $this->db->select('money_on_hold.*,merchant.*');
        $query = $this->db->where('money_on_hold.moh_user_type','merchant');
        $this->db ->join('merchant', 'merchant.merchant_id=money_on_hold.moh_user_id');
        $query = $this->db->order_by('money_on_hold.moh_id','DESC');
        $query = $this->db->get('money_on_hold');
        $result = $query->result_array();
        return $result;


    }
   
   
   public function update_balance_model($user_id,$data)
    {
        $this->db->where('id_user', $user_id);
        return $this->db->update('balance', $data);
    } 
    
      public function update_trans_amountinwallet($data)
    {
        $this->db->insert('wallet', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }  


}
