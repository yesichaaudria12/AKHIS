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
    public function baca_pesan($id = null){
        $id_user = $this->session->userdata('id');
        $this->db->query("UPDATE chat SET status = 'dibaca' WHERE dari = '$id' AND kepada = '$id_user'");
    }
    public function resep_obat($id_pasien = null, $id = null){
        $id_resep = $this->input->post('id_resep');
        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'Qty' => $this->input->post('Qty'),
            'aturan_minum' => $this->input->post('aturan_minum'),
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('detail_resep');
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Resep Obat berhasil dirubah!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect("dokter/ubah/detail_resep/$id_pasien/$id_resep");
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Resep Obat gagal dirubah!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect("dokter/ubah/detail_resep/$id_pasien/$id_resep");
        }
    }
    public function upload_bukti(){
        if ($_FILES['bukti_bayar']['name']){
            if ($this->input->post('id_dp')){
                $_POST += [
                    'bukti_bayar' => upload_foto('bukti_bayar', './assets/img/bukti_pembayaran'),
                ];
                $data = [
                    'bukti_bayar' => $this->input->post('bukti_bayar'),
                    'dibayar_pada' => date('Y-m-d'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'status_lunas' => 'belum lunas',
                    'id_dp' => $this->input->post('id_dp'),
                ];
                $this->db->update('pembayaran', $data);
                $result = $this->db->affected_rows();
                if ($result > 0){
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Berhasil Upload Bukti pembayaran, tunggu konfirmasi admin yah!!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect(current_url());
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>gagal Upload Bukti pembayaran!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect(current_url());
                    }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>anda belum memilih Metode Pembayaran!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect(current_url());
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>anda belum upload bukti!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
}