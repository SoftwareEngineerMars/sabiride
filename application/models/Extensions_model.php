<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Extensions_model extends CI_model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_data_product()
    {
        $curl = curl_init();
        $this->db->select('*');
        $this->db->from('ext_setting');
        $this->db->where('name', 'item_id');
        $itemid = $this->db->get();

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $end_point = urlExtensions . "allproduct";
        $data['main_id'] = $itemid->row('value');
        $payload = json_encode($data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        return $responseObject;
    }

    function get_install($pcode, $username, $itemid, $version)
    {
        $curl = curl_init();

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $end_point = urlExtensions . "install";
        $data['pcode'] = $pcode;
        $data['username'] = $username;
        $data['id'] = $itemid;
        $data['version'] = $version;
        $payload = json_encode($data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        return $responseObject;
    }

    function get_detail_product($id)
    {
        $this->db->select('*');
        $this->db->from('extensions');
        $this->db->where('product_id', $id);
        $version = $this->db->get();

        $this->db->select('*');
        $this->db->from('ext_setting');
        $this->db->where('name', 'item_id');
        $itemid = $this->db->get();

        $this->db->select('*');
        $this->db->from('ext_setting');
        $itemid = $this->db->get();
        $curl = curl_init();

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $end_point = urlExtensions . "detailproduct";

        $data['id'] = $id;
        if ($version->row('set_version') != null) {
            $data['version'] = $version->row('set_version');
        } else {
            $data['version'] = 0;
        }
        $data['main_id'] = $itemid->row('value');
        $payload = json_encode($data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        $res = [
            'response' => $responseObject,
            'version' => $data['version'],
            'itemid' => $id
        ];
        return $res;
    }

    function update_version_ext($data, $datainsert, $id)
    {
        $get = $this->db->get_where('extensions', ['product_id' => $id]);
        if ($get->num_rows() > 0) {
            $this->db->where('product_id', $id);
            return $this->db->update('extensions', $data);
        } else {

            $insert = $this->db->insert('extensions', $datainsert);

            if ($insert) {
                return true;
            }
        }
    }
}
