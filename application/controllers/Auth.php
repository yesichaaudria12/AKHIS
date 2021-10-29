<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->nama_web = nama_web();
	}
	public function login()
	{
		if ($this->session->userdata('id')){
            $role = $this->session->userdata('role');
            redirect($this->session->userdata($role.'/home'));
        }
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Email NIP wajib di isi',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'required' => 'Password wajib di isi',
            'min_length' => 'Password Minimal 6 Character'
        ]);
        if ($this->form_validation->run() === false) {
            $data['title'] = "Login | $this->nama_web";
            $this->load->view('auth/template/head', $data);
			$this->load->view('auth/template/header');
			$this->load->view('auth/login');
			$this->load->view('auth/template/footer');
        } else {
            echo "berhasil";
            $this->_login();
        }
	}
	private function _login(){
        $this->Model_auth->login();
	}
	
	public function daftar(){
		if ($this->session->userdata('id')){
            $role = $this->session->userdata('role');
            redirect($this->session->userdata($role.'/home'));
        }
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap wajib di isi',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis kelamin wajib di isi',
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[pasien.email]', [
            'required' => 'Email wajib di isi',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password_konfirmasi]', [
            'required' => 'Password wajib di isi',
            'min_length' => 'Password Minimal 6 Character',
            'matches' => ''
        ]);
        $this->form_validation->set_rules('password_konfirmasi', 'Password_konfirmasi', 'trim|required|matches[password]', [
            'required' => 'Password konfirmasi wajib di isi',
            'matches' => 'Password konfirmasi tidak sama!'
        ]);
        if ($this->form_validation->run() == false) {
			$data['title'] = "Daftar | " . $this->nama_web;
			$this->load->view('auth/template/head', $data);
			$this->load->view('auth/template/header');
			$this->load->view('auth/daftar');
			$this->load->view('auth/template/footer');
        } else {
            $this->Model_auth->daftar();
        }
	}
    public function logout()
    {
        $id_user = $this->session->userdata('id');
        $role = $this->session->userdata('role');
        offline($id_user, $role);
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Logout Berhasil!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
        redirect('home');
    }
}
