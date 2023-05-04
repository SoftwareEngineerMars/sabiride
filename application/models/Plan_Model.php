<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan_Model extends CI_Model
{
  public function add_plan($data)
  {
    $this->db->insert('subscription_plan', $data);
  }

  public function edit_plan($id, $data)
  {
    $this->db->update('subscription_plan', $data, ['id' => $id]);
  }

  public function delete_plan($id)
  {
    $this->db->query("DELETE FROM subscription WHERE plan_id = " . (int)$id);
    $this->db->query("DELETE FROM subscription_plan WHERE id = " . (int)$id);
  }

  public function get($id)
  {
    return $this->db->query("SELECT * FROM subscription_plan WHERE id=" . (int)$id)->row();
  }

  public function all()
  {
    $this->db->order_by('id DESC');
    return $this->db->get('subscription_plan')->result_array();
  }

  public function get_active_plans($id = 0)
  {
    $this->db->order_by('id DESC');
    $this->db->where('status', 1);
    if ($id) {
      $this->db->where('id', $id);
      return (array)$this->db->get('subscription_plan')->row();
    }
    return $this->db->get('subscription_plan')->result_array();
  }

  public function get_driver_by_id($id)
  {
    $this->db->where('status', 1);
    $this->db->where('id', $id);
    return (array)$this->db->get('driver')->row();
  }

  public function get_balance($user_id)
  {
      $this->db->select('*');
      $this->db->from('balance');
      $this->db->where('id_user', $user_id);
      $balance = $this->db->get()->row();
      return (array)$balance;
  }

  public function update_balance($id, $balance)
  {
    $this->db->query("UPDATE balance SET balance = " . (float)$balance . " WHERE number = " .  (int)$id);
  }

  public function get_subscribed_drivers($id = 0, $all = false)
  {
    $sql = "SELECT d.driver_name, s.id, s.amount, s.start_date, s.status, s.end_date, sp.name, sp.logo FROM subscription s LEFT JOIN driver d ON(d.id = s.driver_id) LEFT JOIN subscription_plan sp ON (s.plan_id = sp.id) WHERE 1";

    if (!$all) {
      $sql .= " AND s.start_date < NOW() AND s.end_date >NOW()";
    }

    $sql .= " ORDER BY s.id DESC";

    return $this->db->query($sql)->result_array();
  }

  public function update_driver_subscription_status($id, $status, $delete = false)
  {
    $driver = (array)$this->db->query("SELECT driver_id FROM subscription WHERE id = " . (int)$id)->row();
    if ($driver) {
      if ($delete) {
        $this->db->query("UPDATE config_driver SET subscribed = " . (int)$status . " WHERE driver_id = '" . $driver['driver_id'] . "'");
      } else {
        $this->db->query("UPDATE config_driver SET subscribed = " . (int)$status . ",  subscription_expiry_date = '0000-00-00 00:00:00' WHERE driver_id = '" . $driver['driver_id'] . "'");
      }
      $this->db->query("UPDATE subscription SET status = " . (int)$status . " WHERE id = " . (int)$id);
    }
  }
}
