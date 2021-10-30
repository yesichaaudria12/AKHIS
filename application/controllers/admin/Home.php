<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
    }
	public function index()
	{
		$fileds = $this->db->list_fields('dokter');
		$data['columns'] = array_slice($fileds, 1, 4);
		$data['width'] = ['width: 10%','width: 50%','width: 5%','width: 45%'];
		$data['dokter'] = $this->Model_read->ambilData('dokter');
        $data['title'] = "Dashboard | Admin";
		$this->load->view('admin/template/head', $data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/v_home');
		$this->load->view('admin/template/footer');
		$this->session->set_userdata('kembali', current_url());
	}
}
