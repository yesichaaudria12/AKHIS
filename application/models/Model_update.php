<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_update extends CI_Model
{
    public function obat($id_obat = null){
        if ($_FILES['gambar']['name']){
            $_POST += [
                'gambar' => upload_foto('gambar', './assets/img/obat'),
            ];
        }
        $_POST['harga'] = str_replace('.','',$this->input->post('harga'));
        $this->db->where('id_obat', $id_obat);
        $this->db->update('obat', array_slice($_POST,1));
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Obat berhasil dirubah!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect($this->session->userdata('kembali'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Obat gagal dirubah!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
}