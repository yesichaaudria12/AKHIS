<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
        $this->belum_dibaca = $this->Model_read->belum_dibaca();
    }
    public function resep($id_pasien = null){
        $this->form_validation->set_rules('nama_resep', 'nama_resep', 'trim|required', [
            'required' => 'Nama Resep wajib di isi',
        ]);
        if ($this->form_validation->run() === false){
            $data['id_pasien'] = $id_pasien;
            $data['resep'] = $this->db->get_where('resep',['id_pasien' => $id_pasien])->result_array();
            $data['panggilan'] = $this->Model_read->buat_panggilan($id_pasien, 'pasien');
            $data['title'] = "Tambah Resep | " . $this->session->userdata('role');
            $this->load->view('dokter/template/head', $data);
            $this->load->view('dokter/template/header');
            $this->load->view('dokter/template/sidebar');
            $this->load->view('dokter/v_tambah_resep');
            $this->load->view('dokter/template/footer');
        }
        else{
            $this->Model_create->data_resep($id_pasien);
        }
    } 
    public function detail_resep($id_pasien = null, $id_resep = null){ 
        if ($id_pasien){
            $data['resep'] = $this->Model_read->cariData('resep',['id_resep' => $id_resep]);
            $data['detail_resep'] = $this->db->get_where('v_detail_resep',['id_resep' => $id_resep])->result_array();
        }
        $this->form_validation->set_rules('Qty', 'Qty', 'trim|required|integer', [
            'required' => 'Jumlah Obat wajib di isi',
            'integer' => "Jumlah Obat harus bilangan bulat"
        ]);
        $this->form_validation->set_rules('aturan_minum', 'aturan_minum', 'trim|required', [
            'required' => 'Aturan minum wajib di isi',
        ]);
        if ($this->form_validation->run() == false){
            $data['judul_resep'] = $data['resep']['nama_resep'];
            $data['id_pasien'] = $id_pasien;
            $data['panggilan'] = $this->Model_read->buat_panggilan($id_pasien, 'pasien');
            $data['obat'] = $this->Model_read->ambilData('obat');
            $data['title'] = "Tambah Detail resep | " . $this->session->userdata('role');
            $this->load->view('dokter/template/head', $data);
            $this->load->view('dokter/template/header');
            $this->load->view('dokter/template/sidebar');
            $this->load->view('dokter/v_detail_resep');
            $this->load->view('dokter/template/footer');
        }else{
            $this->Model_create->detail_resep($id_resep);
        }
    } 
}