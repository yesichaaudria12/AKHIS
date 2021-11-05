<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Model_auth extends CI_Model
{
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();
        $dokter = $this->db->get_where('dokter', ['email' => $email])->row_array();
        $pasien = $this->db->get_where('pasien', ['email' => $email])->row_array();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                online($admin['id_admin'], 'admin');
                $this->session->set_userdata([
                    'role' => 'admin',
                    'id' => $admin['id_admin'],
                    'foto' => $admin['foto'],
                    'nama' => $admin['nama_lengkap'],
                    'status' => $admin['status_online'],
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Login Berhasil!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('admin/home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Password salah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('auth/login');
            }
        } elseif ($dokter) {
            if (password_verify($password, $dokter['password'])) {
                online($dokter['id_dokter'], 'dokter');
                $this->session->set_userdata([
                    'role' => 'dokter',
                    'id' => $dokter['id_dokter'],
                    'foto' => $dokter['foto'],
                    'nama' => $dokter['nama_lengkap'],
                    'status' => $dokter['status_online'],
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Login Berhasil!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('dokter/home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Password salah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('auth/login');
            }
        } elseif ($pasien) {
            if (password_verify($password, $pasien['password'])) {
                online($pasien['id_pasien'], 'pasien');
                $this->session->set_userdata([
                    'role' => 'pasien',
                    'id' => $pasien['id_pasien'],
                    'foto' => $pasien['foto'],
                    'nama' => $pasien['nama_lengkap'],
                    'status' => $pasien['status_online'],
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Login Berhasil!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('pasien/home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Password salah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Email belum terdaftar!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth/login');
        }
    }
    public function daftar()
    {
        $data = [
            'id_pasien' => generate_idUser('pasien', 'id_pasien'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'foto' => "default-" . $this->input->post('jenis_kelamin') . '.png',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->db->insert('pasien', $data);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Daftar Berhasil Silahkan Login!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Daftar Gagal!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(current_url());
        }
    }
}
