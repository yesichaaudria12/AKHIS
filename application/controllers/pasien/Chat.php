<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
		$this->session->set_userdata('kembali', current_url());
    }
    public function index($id = null){
        if ($id){
            $live_chat = $this->db->get_where('live_chat', ['id_LC' => $id])->row_array();
            if($live_chat){
                $data['id_dokter'] = $live_chat['id_dokter'];
                $data['id_pasien'] = $live_chat['id_pasien'];
                $data['semua_chat'] = $this->db->get_where('chat',['id_LC' => $id])->result_array();
            }else{
                $data['id_dokter'] = $id; 
            }
        }
		$data['chat'] = $this->Model_read->live_chat();
        $data['title'] = "Chat Dokter | ". nama_web();
		$this->load->view('pasien/template/head', $data);
		$this->load->view('pasien/template/header');
		$this->load->view('pasien/template/sidebar');
		$this->load->view('pasien/v_chat');
		$this->load->view('pasien/template/footer');
    }
}