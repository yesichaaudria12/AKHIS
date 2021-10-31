<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function obat($id = null){
        $fields = $this->Model_read->ambilfield('obat');
        $data['columns'] = array_slice($fields,1, 8);
        foreach ($data['columns'] as $column) {
            if ($column->name != 'gambar' AND $column->name != 'keterangan'){
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
            $data['obat'] = $this->Model_read->cariData('obat', ['id_obat' => $id]);
            $data['kembali'] = $this->session->userdata('kembali');
            $data['title'] = "Ubah Obat AKHIS";
            $this->load->view('admin/template/head', $data);
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/v_ubah');
            $this->load->view('admin/template/footer');
        }else{
            $this->Model_update->obat($id);
        }
    }
    public function pesanan($id_resep,$status)
	{
		$this->Model_update->rubah_pesanan($id_resep, $status);
	}
}