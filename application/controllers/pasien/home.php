<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
		$this->session->set_userdata('kembali', current_url());
    }
	public function index()
	{
		$data['obat'] = $this->Model_read->ambilData('obat');
        $data['title'] = "Dashboard | Admin";
		$this->load->view('pasien/template/head', $data);
		$this->load->view('pasien/template/header');
		$this->load->view('pasien/template/sidebar');
		$this->load->view('pasien/v_home');
		$this->load->view('pasien/template/footer');
	}
}
