<?php
class Investment_model extends CI_model
{
    public function all_investment_plan()
    {
       $query = $this->db->get('investment_plan_type'); // table name
       $result = $query->result();
       return $result;
    }

 public function Investment_model_edit($id)
    {
        return $this->db->get_where('investment_plan_type', ['ipt_id' => $id])->row_array();
    }
   

     public function deleteberitabyId($id)
    {
        $this->db->where('ipt_id', $id);
        return $this->db->delete('investment_plan_type');
    }


 public function addinvestment($data)
    {
        return $this->db->insert('investment_plan_type', $data);
    }

     public function editinvestment($data,$id)
    {
        $this->db->where('ipt_id', $id);
        return $this->db->update('investment_plan_type', $data);
    }

    public function getAllcustomer_invest(){

        $this->db->select('investment_list_user.*,customer.*');
        $query = $this->db->where('investment_list_user.ilu_user_type','customer');
        $this->db ->join('customer', 'customer.id=investment_list_user.ilu_user_id');
        $query = $this->db->order_by('investment_list_user.ilu_id','DESC');
        $query = $this->db->get('investment_list_user');
        $result = $query->result_array();
        return $result;


    }

        public function getAlldriver_invest(){

        $this->db->select('investment_list_user.*,driver.*');
        $query = $this->db->where('investment_list_user.ilu_user_type','driver');
        $this->db ->join('driver', 'driver.id=investment_list_user.ilu_user_id');
        $query = $this->db->order_by('investment_list_user.ilu_id','DESC');
        $query = $this->db->get('investment_list_user');
        $result = $query->result_array();
        return $result;


    }


    public function getAllmerchant_invest(){

       $this->db->select('investment_list_user.*,merchant.*');
       $query = $this->db->where('investment_list_user.ilu_user_type','merchant');
       $this->db ->join('merchant', 'merchant.merchant_id=investment_list_user.ilu_user_id');
        $query = $this->db->order_by('investment_list_user.ilu_id','DESC');
        $query = $this->db->get('investment_list_user');
        $result = $query->result_array();
        return $result;


    }


/////////////////////////////////////////////////// API  //////////////////////////////////////////////////////////////////

    public function update_trans_amountinwallet($data)
    {
        $this->db->insert('wallet', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }  
    
    public function update_balance_model($user_id, $data)
    {
        $this->db->where('id_user', $user_id);
        return $this->db->update('balance', $data);
    }  
    
    
    public function investment_package_allcustomer_update($data)
    {
        return $this->db->update('investment_list_user', $data);
    }
    

    public function investment_package_allcustomer_insert($data){
    
      $query = $this->db->insert('investment_list_user', $data); // table name
      $insert_id = $this->db->insert_id();
      return  $insert_id; 
        
    }
    

    public function get_wallet_amount($user_id){
        $this->db->where('id_user', $user_id);
        $query = $this->db->get('balance'); // table name
        $result = $query->row();
        return $result;
    }
    
    

      public function Get_customer_detail_by_id($user_id){
        
       $this->db->where('id', $user_id);
       $query = $this->db->get('customer'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
      public function Get_customer_detail(){

       $query = $this->db->get('customer'); // table name
       $result = $query->result();
       return $result;    
        
    }
    
      public function Get_driver_detail_by_id($user_id){
        
       $this->db->where('id', $user_id);
       $query = $this->db->get('driver'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
        public function Get_Alldriver_detail(){
        
       $query = $this->db->get('driver'); // table name
       $result = $query->result();
       return $result;    
        
    }
    
      public function Get_merchant_detail_by_id($user_id){
        
       $this->db->where('merchant_id', $user_id);
       $query = $this->db->get('merchant'); // table name
       $result = $query->row();
       return $result;    
        
    }
    
          public function Get_Allmerchant_detail(){
       $query = $this->db->get('merchant'); // table name
       $result = $query->result();
       return $result;    
        
    }
    

public function investment_plan_type_byID($package_id){
    
        $query = $this->db->where('ipt_id',$package_id);
        $query = $this->db->get('investment_plan_type');
        $result = $query->row();
        return $result;     
    
}

public function all_investment_user_plan_taken($user_id){
  
        $query = $this->db->where('ilu_user_id',$user_id);
        $query = $this->db->order_by('ilu_id','DESC');
        $query = $this->db->get('investment_list_user');
        $result = $query->result();
        return $result;  
    
    
}

 public function all_investment_plan_user($user_id)
    {    $query = $this->db->where('ilu_user_id',$user_id);
         $query = $this->db->get('investment_list_user');
         $result1 = $query->result();
         return $result1;
    }
    
     public function investment_amount($user_id)
    {  
          $query = $this->db->select_sum('ilu_plan_amount');
         $query = $this->db->where('ilu_user_id',$user_id);
         $query = $this->db->get('investment_list_user');
         $result1 = $query->result();
         return $result1;
    }
    
    
     
     public function investment_amount_dte($user_id)
    {  
          $query = $this->db->select('ilu_created_date');
         $query = $this->db->where('ilu_user_id',$user_id);
         $this->db->order_by("ilu_id", "desc");
         $query = $this->db->get('investment_list_user');
         $result1 = $query->row()->ilu_created_date;
         return $result1;
    }
    
    public function investment_amount_profit($user_id)
    {
            $query = $this->db->select('ilu_plan_profit');
         $query = $this->db->where('ilu_user_id',$user_id);
         $this->db->order_by("ilu_id", "desc");
         $query = $this->db->get('investment_list_user');
         $result1 = $query->row()->ilu_plan_profit;
         return $result1;
    }
    
    
    public function min_date_investment_withdrawl($user_id){
        
        
        $this->db->select_min("DATEDIFF(ilu_created_date,now())");
        $query = $this->db->where('ilu_user_id',$user_id);
         $query = $this->db->get('investment_list_user');
         $result1 = $query->result();
         return $result1;
//      $this->db->select("*", FALSE);
//      $query = $this->db->where('ilu_user_id',$user_id);
// $this->db->from('investment_list_user');
// $this->db->where("DATEDIFF(ilu_created_date,now())");
// $query = $this->db->get();
// return $query->result();   
        
        
        
    }


}
