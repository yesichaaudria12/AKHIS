<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
        $this->session->set_userdata('kembali', current_url());
    }
	public function profile(){
		$data['title'] = "Profile";
		$role = $this->session->userdata('role');
		$idUser = $this->session->userdata('id');
		$data['user'] = $this->Model_read->cariData($role,$idUser);
		$this->load->view('admin/template/head', $data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/profile');
		$this->load->view('admin/template/footer');
	}
	public function obat()
	{
		$fileds = $this->db->list_fields('obat');
		$data['columns'] = array_slice($fileds, 1, 4);
		$data['obat'] = $this->Model_read->ambilData('obat');
        $data['title'] = "Dashboard | Admin";
		$this->load->view('admin/template/head', $data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/obat');
		$this->load->view('admin/template/footer');
	}
}