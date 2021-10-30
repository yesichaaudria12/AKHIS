<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{ 
		$data['obat'] = $this->Model_read->ambilData('obat');
		$data['title'] = "Home | ". nama_web();
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('home');
		$this->load->view('template/footer');
	}
	public function cari_dokter()
	{ 
		$data['title'] = "Cari Dokter | ". nama_web();
		$data['dokter'] = $this->Model_read->ambilData('dokter');
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('cari_dokter');
		$this->load->view('template/footer');
	}
}
