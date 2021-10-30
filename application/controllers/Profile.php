<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->nama_web = nama_web();
        cek_status_login();
	}
	public function lihat()
	{
        $role = $this->session->userdata('role');
        $id = $this->session->userdata('id');
        if ($this->input->post('password_lama')){
            $this->form_validation->set_rules('password_lama', 'password_lama', 'trim|required', [
                'required' => 'Pasword lama wajib di isi',
            ]);
            $this->form_validation->set_rules('password_baru', 'password_baru', 'trim|required|min_length[6]|matches[konfirmasi_password]', [
                'required' => 'Password baru wajib di isi',
                'min_length' => 'Password Minimal 6 Character',
                'matches' => ''
            ]);
            $this->form_validation->set_rules('konfirmasi_password', 'konfirmasi_password', 'trim|required|min_length[6]|matches[password_baru]', [
                'required' => 'Password baru wajib di isi',
                'matches' => 'Password konfirmasi tidak sama!',
                'min_length' => 'Password Minimal 6 Character'
            ]);
        }else {
            $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required', [
                'required' => 'Pasword lama wajib di isi',
            ]);
            $this->form_validation->set_rules('email', 'email', 'trim|required', [
                'required' => 'Email wajib di isi',
            ]);
            $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required', [
                'required' => 'Email wajib di isi',
            ]);
            if ($role == 'pasien'){
                $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
                    'required' => 'Alamat wajib di isi',
                ]);
            }
        }
        if($this->form_validation->run() == false){
            $data['role'] = $role;
            $data['profile'] = $this->Model_read->cariData($role, ["id_$role" => $id]);
            $data['title'] = "Home | $role";
            $this->load->view($role.'/template/head', $data);
            $this->load->view($role.'/template/header');
            $this->load->view($role.'/template/sidebar');
            $this->load->view('v_profile');
            $this->load->view($role.'/template/footer');
        }else{
            if ($this->input->post('password_lama')){
                $this->Model_update->password($role, $id);
            }else {
                $this->Model_update->profile($role, $id);
            }
        }
    }
}