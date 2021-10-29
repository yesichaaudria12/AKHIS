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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect($this->session->userdata('kembali'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Data gagal dihapus!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect($this->session->userdata('kembali'));
        }
    }
}