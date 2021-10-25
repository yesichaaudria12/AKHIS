<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_read extends CI_Model
{
    public function ambilData($table = null){
        return $this->db->get($table)->result_array();
    }
    public function cariData($table = null, $where = null){
        return $this->db->get_where($table, $where)->row_array();
    }
    public function ambilfield($table = null){
        return $this->db->field_data($table);
    }
}