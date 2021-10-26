<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function dokter(){
        $fields = $this->Model_read->ambilfield('dokter');
        $data['columns'] = array_slice($fields,1, 4);
        foreach ($data['columns'] as $column) {
            if ($column->name != 'foto'){
                $this->form_validation->set_rules($column->name, $column->name, 'required|trim', [
                    'required' => str_replace("_", " ", $column->name) . ' wajib di isi',
                ]);
            }
        }
        if ($this->form_validation->run() == false){
            $data['type'] = ['file', 'text', 'text', 'email'];
            $data['input'] = ['', '', 'options','',''];
            $data['options'] = jenis_kelamin();
            $data['value'] = 'jenis_kelamin';
            $data['list'] = 'name';
            $data['kembali'] = $this->session->userdata('kembali');
            $data['title'] = "Tambah Dokter AKHIS";
            $this->load->view('admin/template/head', $data);
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/tambah');
            $this->load->view('admin/template/footer');
        }else{
            $this->Model_create->dokter();
        }
    }
    public function obat(){
        $fields = $this->Model_read->ambilfield('obat');
        $data['columns'] = array_slice($fields,1, 8);
        foreach ($data['columns'] as $column) {
            if ($column->name != 'keterangan' AND $column->name != 'gambar'){
                $this->form_validation->set_rules($column->name, $column->name, 'required|trim', [
                    'required' => str_replace("_", " ", $column->name) . ' wajib di isi',
                ]);
            }
        }
        if ($this->form_validation->run() == false) {
            $data['type'] = ['text', 'text', 'text', 'text', 'text','text','text','file'];
            $data['input'] = ['', 'options', 'textarea','textarea','textarea','','textarea',''];
            $data['options'] = $this->db->get('jenis_obat')->result_array();
            $data['value'] = 'jenis';
            $data['list'] = 'jenis';
            $data['kembali'] = $this->session->userdata('kembali');
            $data['title'] = "Tambah Obat AKHIS";
            $this->load->view('admin/template/head', $data);
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/tambah');
            $this->load->view('admin/template/footer');
        }else{
            $this->Model_create->obat();
        }
    }
}