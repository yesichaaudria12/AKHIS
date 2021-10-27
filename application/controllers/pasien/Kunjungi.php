<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungi extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
		$this->session->set_userdata('kembali', current_url());
    }
    public function konsultasi(){
        $data['dokter'] = $this->Model_read->ambilData('dokter');
        $data['title'] = "Dashboard | Admin";
        $this->load->view('template/head', $data);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('cari_dokter');
        $this->load->view('template/footer');
    }
}
