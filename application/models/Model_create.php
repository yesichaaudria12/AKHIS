<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_create extends CI_Model
{
    public function dokter(){
        $_POST += [
            'id_dokter' => generate_idUser('dokter', 'id_dokter'),
            'foto' => upload_foto('foto', './assets/img/dokter'),
            'password' => password_hash('akhis'.date('Y'), PASSWORD_DEFAULT)
        ];
        $this->db->insert('dokter', $_POST);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Dokter berhasil ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect($this->session->userdata('kembali'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Dokter gagal ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
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