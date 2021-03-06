<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_status_login();
	}
	public function index()
	{
		$fileds = $this->db->list_fields('dokter');
		$data['columns'] = array_slice($fileds, 1, 4);
		$data['width'] = ['width: 10%', 'width: 50%', 'width: 5%', 'width: 45%'];
		$data['pasien'] = $this->Model_read->ambilData('v_cek_resep');
		$data['title'] = "Dashboard | Dokter";
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
		$this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_home');
		$this->load->view('dokter/template/footer');
		$this->session->set_userdata('kembali', current_url());
	}
}
