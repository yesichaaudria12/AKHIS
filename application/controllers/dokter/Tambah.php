<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
    }
    public function resep(){
        $data['obat'] = $this->Model_read->ambilData('obat');
        $data['title'] = "Dashboard | Admin";
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
		$this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_tambah_resep');
		$this->load->view('dokter/template/footer');
    }
}