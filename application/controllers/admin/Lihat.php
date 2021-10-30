<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
    }
	public function obat()
	{
		$fileds = $this->db->list_fields('obat');
		$data['columns'] = array_slice($fileds, 1, 4);
		$data['obat'] = $this->Model_read->ambilData('obat');
        $data['title'] = "Data Obat | Admin";
		$this->load->view('admin/template/head', $data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/v_obat');
		$this->load->view('admin/template/footer');
		$this->session->set_userdata('kembali', current_url());
	}
	public function pesanan($status)
	{
		$status = str_replace("_",' ', $status);
		$fileds = $this->db->list_fields('v_pesanan');
		$data['id_resep'] = $fileds[0];
		$data['columns'] = array_slice($fileds, 1, 4);
		$data['width'] = ['width: 10%','width: 50%','width: 5%','width: 45%'];
		if ($status == 'selsesai'){
			$this->db->order_by('id_resep', 'DESC');
		}
		$data['pesanan'] = $this->db->get_where('v_pesanan',['status' => $status])->result_array();
        $data['title'] = "Pesanan ".ucwords($status);
		$this->load->view('admin/template/head', $data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/v_pesanan');
		$this->load->view('admin/template/footer');
		$this->session->set_userdata('kembali', current_url());
	}
	public function jumlah_pesanan($status){
		$status = str_replace('_',' ', $status);
		$data = $this->Model_read->jumlah_pesanan($status);
		if ($data > 0 ){
            $output = '<span class="alert-count">'.$data.'</span>';
            echo $output;
        }
	}
}