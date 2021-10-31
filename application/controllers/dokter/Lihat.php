<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
		$this->session->set_userdata('kembali', current_url());
    }
    public function resep($id = null)
	{
        $id_dokter = $this->session->userdata('id');
        // $this->db->where_not_in('pengirim', $id_dokter);
        $this->db->where('penerima', $id_dokter);
        $this->db->where('pengirim', $id);
		$data['chat'] = $this->Model_read->ambilData('chat');
        $data['title'] = "Resep Pasien | Dokter";
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
        $this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_data_resep');
		$this->load->view('dokter/template/footer');
	}
    public function obat()
	{
		$data['obat'] = $this->Model_read->ambilData('obat');
        $data['title'] = "Daftar Obat | Dokter";
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
        $this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_obat');
		$this->load->view('dokter/template/footer');
	}
	public function pasien(){
		$data['pasien'] = $this->Model_read->ambilData('pasien');
		$data['title'] = "Data Singkat Pasien | Dokter";
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
        $this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_pasien');
		$this->load->view('dokter/template/footer');
	}
}