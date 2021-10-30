<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Model_read extends CI_Model
{
    public function ambilData($table){
        return $this->db->get($table)->result_array();
    }
    public function cariData($table, $where){
        return $this->db->get_where($table, $where)->row_array();
    }
    public function ambilfield($table){
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
    public function live_chat_pasien(){
        $id_user = $this->session->userdata('id');
        return $this->db->get_where('live_chat', ['id_pasien' => $id_user])->result_array();
    }
    public function live_chat_dokter(){
        $id_user = $this->session->userdata('id');
        return $this->db->get_where('live_chat', ['id_dokter' => $id_user])->result_array();
    }
    public function pilih_live_chat($id_pasien = null, $id_dokter = null){
        return $this->db->get_where('live_chat', ['id_pasien' => $id_pasien, 'id_dokter' => $id_dokter])->row_array();
    }
    public function belum_dibaca(){
        $id_user = $this->session->userdata('id');
        $this->db->where('kepada', $id_user);
        $this->db->where('status', 'terkirim');
        return $this->db->count_all_results('chat');
    }
    public function buat_panggilan($id, $role){
        $panggilan = "TN";
        $data = $this->db->get_where($role, ["id_$role" => $id])->row_array();
        if ($data['jenis_kelamin'] == 'P'){
            $panggilan = "NY";
        }
        return $panggilan;
    }
    public function jumlah_pesanan($status){
        $this->db->where('status', $status);
        return $this->db->count_all_results('pesanan');
    }
}