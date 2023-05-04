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

/////////////////////////////////////////////////////////////API  //////////////////


public function all_investment_user_plan_taken($user_id){
  
        $query = $this->db->where('ilu_user_id',$user_id);
        $query = $this->db->order_by('ilu_id','DESC');
        $query = $this->db->get('investment_list_user');
        $result = $query->result();
        return $result;  
    
    
}



}
