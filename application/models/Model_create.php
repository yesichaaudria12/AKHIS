<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Model_create extends CI_Model
{
    public function dokter()
    {
        $foto = "default-" . $this->input->post('jenis_kelamin') . '.png';
        var_dump($_FILES);
        if ($_FILES['foto']['name']) {
            $foto = upload_foto('foto', './assets/img/dokter');
        }
        $_POST += [
            'id_dokter' => generate_idUser('dokter', 'id_dokter'),
            'foto' => $foto,
            'password' => password_hash('akhis' . date('Y'), PASSWORD_DEFAULT)
        ];
        $this->db->insert('dokter', $_POST);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Dokter berhasil ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/home');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Dokter gagal ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
    public function obat()
    {
        if ($_FILES['gambar']['name']) {
            $_POST += [
                'gambar' => upload_foto('gambar', './assets/img/obat'),
                'created_at' => date('Y-m-d'),
                'id_admin' => $this->session->userdata('id')
            ];
            $_POST['harga'] = str_replace('.', '', $this->input->post('harga'));
            $this->db->insert('obat', $_POST);
            $result = $this->db->affected_rows();
            if ($result > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Obat berhasil ditambahkan!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('admin/lihat/obat');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Obat gagal ditambahkan!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect(current_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Anda harus upload gambar!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect(current_url());
        }
    }
    public function data_resep($id_pasien = null)
    {
        $cek_resep = $this->db->get_where('resep', [
            'nama_resep' => $this->input->post('nama_resep'),
            'id_dokter' => $this->session->userdata('id'),
            'id_pasien' => $id_pasien
        ])->result_array();
        if (!$cek_resep) {
            $data = [
                'nama_resep' => $this->input->post('nama_resep'),
                'created_at' => date('Y-m-d'),
                'id_dokter' => $this->session->userdata('id'),
                'id_pasien' => $id_pasien
            ];
            $this->db->insert('resep', $data);
            $resep = $this->db->get_where('resep', ['nama_resep' => $this->input->post('nama_resep')])->row_array();
            $id_resep = $resep['id_resep'];
            $pesanan = [
                'invoice' => date('ydmhmi'),
                'id_resep' => $id_resep,
                'status' => 'menunggu pembayaran',
            ];
            $this->db->insert('pesanan', $pesanan);
            redirect("dokter/tambah/detail_resep/$id_pasien/$id_resep");
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Nama Resep Sudah ada, tolong gunakan nama lain!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('dokter/tambah/resep/' . $id_pasien);
        }
    }
    public function detail_resep($id_resep = null)
    {
        $data = [
            'id_resep' => $id_resep,
            'id_obat' => $this->input->post('id_obat'),
            'Qty' => $this->input->post('Qty'),
            'aturan_minum' => $this->input->post('aturan_minum'),
        ];
        $this->db->insert('detail_resep', $data);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Obat berhasil ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Obat gagal ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
    public function upload_bukti()
    {
        if ($_FILES['bukti_bayar']['name']) {
            if ($this->input->post('id_dp')) {
                $_POST += [
                    'bukti_bayar' => upload_foto('bukti_bayar', './assets/img/bukti_pembayaran'),
                ];
                $data = [
                    'bukti_bayar' => $this->input->post('bukti_bayar'),
                    'dibayar_pada' => date('Y-m-d'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'status_lunas' => 'belum lunas',
                    'id_dp' => $this->input->post('id_dp'),
                    'invoice' => get_invoice($this->input->post('id_resep'))
                ];
                $this->db->insert('pembayaran', $data);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->db->set('status', 'menunggu konfirmasi');
                    $this->db->where('invoice', get_invoice($this->input->post('id_resep')));
                    $this->db->update('pesanan');
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
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>anda belum memilih Metode Pembayaran!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect(current_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>anda belum upload bukti!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
}
