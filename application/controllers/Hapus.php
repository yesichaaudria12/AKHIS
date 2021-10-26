<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function data($table = null, $field = null,$id = null, $path_penyimpanan = null){
        if ($this->input->post('gambar')){
            unlink(FCPATH . "$path_penyimpanan/" . $this->input->post('gambar', TRUE));
        }
        $this->db->delete($table, [$field => $id]);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-outline-success alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>Data Berhasil Dihapus</div>');
            redirect($this->session->userdata('kembali'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-outline-danger alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>Data Gagal Dihapus</div>');
            redirect($this->session->userdata('kembali'));
        }
    }
}