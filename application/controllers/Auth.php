<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->nama_web = nama_web();
	}
	public function login()
	{
		if ($this->session->userdata('id_pasien')){
            redirect($this->session->userdata('home'));
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
            $this->load->view('auth/login', $data);
        } else {
            echo "berhasil";
            $this->_login();
        }
	}
	private function _login(){
        $this->Model_auth->login();
	}
	
	public function daftar(){
		if ($this->session->userdata('id_pasien')){
            redirect($this->session->userdata('home'));
        }
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Email NIP wajib di isi',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'required' => 'Password wajib di isi',
            'min_length' => 'Password Minimal 6 Character'
        ]);
        if ($this->form_validation->run() == false) {
			$data['title'] = "Daftar | " . $this->nama_web;
			$this->load->view('auth/daftar');
        } else {
            $this->Model_auth->daftar();
        }
	}
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Logout Berhasil!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
        redirect('auth/login');
    }
}
