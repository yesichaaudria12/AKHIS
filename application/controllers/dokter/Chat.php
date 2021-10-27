<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
		$this->session->set_userdata('kembali', current_url());
    }
    public function index(){
        $id_dokter = $this->session->userdata('id');
        // $this->db->where_not_in('pengirim', $id_dokter);
        $this->db->where('penerima', $id_dokter);
		$data['chat'] = $this->Model_read->ambilData('chat');
        $data['title'] = "Dashboard | Admin";
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
		$this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_chat');
		$this->load->view('dokter/template/footer');
    }
}