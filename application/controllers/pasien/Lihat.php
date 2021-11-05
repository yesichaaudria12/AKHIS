<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
		
    }
    public function resep($id = null)
	{
        $data['title'] = "Resep Anda | Pasien";
		$this->load->view('pasien/template/head', $data);
		$this->load->view('pasien/template/header');
        $this->load->view('pasien/template/sidebar');
		$this->load->view('pasien/v_data_resep');
		$this->load->view('pasien/template/footer');
		$this->session->set_userdata('kembali', current_url());
	}
    public function obat($id_pasien)
	{
		$data['id_pasien'] = $id_pasien;
		$data['resep'] = $this->db->get_where('resep',['id_pasien' => $id_pasien])->result_array();
		$data['panggilan'] = $this->Model_read->buat_panggilan($id_pasien, 'pasien');
		$data['obat'] = $this->Model_read->ambilData('obat');
        $data['title'] = "Daftar Obat | Admin";
		$this->load->view('pasien/template/head', $data);
		$this->load->view('pasien/template/header');
        $this->load->view('pasien/template/sidebar');
		$this->load->view('pasien/v_obat');
		$this->load->view('pasien/template/footer');
		$this->session->set_userdata('kembali', current_url());
	}
}