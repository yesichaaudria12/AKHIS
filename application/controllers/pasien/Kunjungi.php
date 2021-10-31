<?php

use Google\Service\Transcoder\Output;

defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungi extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
    }
    public function konsultasi(){
        $data['kembali'] = $this->session->userdata('kembali');
        $data['dokter'] = $this->Model_read->ambilData('dokter');
        $data['title'] = "Konsultasi | Pasien";
        $this->load->view('template/head', $data);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('cari_dokter');
        $this->load->view('template/footer');
    }
    public function pembayaran($id_pasien, $id_resep)
    {
        $cek = $this->db->get_where('pasien', ['id_pasien' => $id_pasien])->row_array();
        if (!$cek['alamat']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>masukan alamat dulu sebelum lanjut pembayaran!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('profile/lihat/');
        }
        $data['total'] = 0;
        $data['jumlah_obat'] = 0;
        $data['ongkir'] = 15000;
        if(!$_POST){
            $data['m_payment'] = $this->db->get('digital_payment')->result_array();
            $data['kembali'] = $this->session->userdata('kembali');
            $data['id_resep'] = $id_resep;
            $data['id_pasien'] = $id_pasien;
            $data['detail_resep'] = $this->db->get_where('v_detail_resep',['id_resep' => $id_resep])->result_array();
            $data['dokter'] = $this->Model_read->ambilData('dokter');
            $data['title'] = "Pembayaran | Pasien";
            $this->load->view('template/head', $data);
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pasien/pembayaran');
            $this->load->view('template/footer');
        }else{
            $ada_bukti = $this->db->get_where('pembayaran', ['invoice' => get_invoice($id_resep)])->row_array();
            if ($ada_bukti){
                $this->Model_update->upload_bukti();
            }else{
                $this->Model_create->upload_bukti();
            }
        }
    }
    public function pilih_metode(){
        $id_dp = $this->input->post('id_dp');
        $dp = $this->db->get_where('digital_payment',['id_dp' => $id_dp])->row_array();
        $nama_platform = $dp['nama_platform'];
        $no_akun = $dp['no_akun'];
        $atas_nama = $dp['atas_nama'];
        $output = <<<HTML
        <div class="akun">
            <h5>Silahkan Melakuakan Pembayaran Ke</h5>
            <div class="row row-cols-2 rounded border mx-5">
                <div class="col text-start">
                    <h6 class="my-3">Payment</h6>
                    <h6 class="my-3">Nomer Akun</h6>
                    <h6 class="my-3">Atas Nama</h6>
                </div>
                <div class="col text-end">
                    <h6 class="my-3" id="nama_platform">$nama_platform</h6>
                    <h6 class="my-3" id="no_akun">$no_akun</h6>
                    <h6 class="my-3" id="atas_nama">$atas_nama</h6>
                </div>
            </div>
        </div>
        HTML;
        echo $output;
    }
}
