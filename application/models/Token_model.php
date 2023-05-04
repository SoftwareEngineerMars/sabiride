<?php

class Token_model extends CI_model
{
    //token price

    public function get_token_data()
    {
        return $this->db->query('select * from driver')->row_array();
    }

    public function get_token_log_data()
    {
        $query = $this->db->query('select a.price,a.order_time,b.*, c.driver_job from transaction as a left join driver as b on a.driver_id = b.id left join driver_job as c on b.job = c.id where a.service_order = ?', array('37'))->result_array();
        return $query;
    }

    public function sel_token_data($id)
    {
        $query = $this->db->query('select token_price, id from driver where id = ?', array($id))->row_array();

        $res = array("token_price" => $query['token_price'], "id" => $id);

        return json_encode($res);
    }

    public function save_data($data)
    {
        $query = $this->db->query("update driver set token_price = ?, token_date = now()", array($data['price']));
        
        return json_encode($query);
    }

    public function remove_token_data($data)
    {
        $query = $this->db->query("update driver set token_price = ?, token_date = ?", array('0','0000-00-00 00:00:00'));
        
        return json_encode($query);
    }

    //setting free date 
    public function get_date_data($id)
    {
        $query = $this->db->query('select * from driver where id = ?', array($id))->row_array();
        return json_encode($query);
    }

    public function get_free_data()
    {
        $query = $this->db->query("SELECT * from driver")->row_array();
        return $query;
    }

    public function update_free_data($data)
    {
        $query = $this->db->query("update driver set free_date = ?, create_date = now() ", array($data['f_date']));
        
        return json_encode($query);
    }
    public function remove_free_data($data)
    {
        $query = $this->db->query("update driver set free_date = ?, create_date = ?", array(null,null));
        
        return json_encode($query);
    }
    
}
