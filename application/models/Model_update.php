<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_update extends CI_Model
{
    public function obat(){
        
        $_POST += [
            'gambar' => upload_foto('gambar', './assets/img/obat'),
            'created_at' => date('Y-m-d'),
            'id_admin' => $this->session->userdata('id')
        ];
        $this->db->insert('obat', $_POST);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Obat berhasil ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect($this->session->userdata('kembali'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Obat gagal ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
}