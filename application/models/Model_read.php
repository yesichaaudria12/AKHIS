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
    public function chat_terbaru(){
        $id_user = $this->session->userdata('id');
        $this->db->distinct();
        $this->db->where('kepada', $id_user);
        $this->db->or_where('dari', $id_user);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get('chat')->result_array();
    }
    public function live_chat(){
        $id_user = $this->session->userdata('id');
        return $this->db->get_where('live_chat', ['id_pasien' => $id_user])->result_array();
    }
}