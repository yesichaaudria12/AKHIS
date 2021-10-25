<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {
    public function index(){
        if (!$_FILES){
            $this->load->view('coba');
        }else{
            var_dump($_FILES);
        }
    }
    public function upload(){
        var_dump($_FILES);
    }
}