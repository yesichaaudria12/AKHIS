<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Chat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
    }
    public function index($id_tujuan = null){
        $data['chat'] = $this->Model_read->live_chat_dokter();
        if ($id_tujuan){
            $data['id_tujuan'] = $id_tujuan;
            $this->Model_update->baca_pesan($id_tujuan);
        }
        $data['chat'] = $this->Model_read->live_chat_dokter();
        $data['title'] = "Chat Dokter | ". nama_web();
		$this->load->view('dokter/template/head', $data);
		$this->load->view('dokter/template/header');
		$this->load->view('dokter/template/sidebar');
		$this->load->view('dokter/v_chat');
		$this->load->view('dokter/template/footer');
    }
    public function kirim(){
        $id_dokter = $this->input->post('dari');
        $id_pasien = $this->input->post('kepada');
        $pesan = $this->input->post('pesan');
        $lc = $this->Model_read->pilih_live_chat($id_pasien, $id_dokter);
        if (!$lc){
            $data = [
                'id_dokter' => $id_dokter,
                'id_pasien' => $id_pasien
            ];
            $this->db->insert('live_chat', $data);
            $lc = $this->Model_read->pilih_live_chat($id_pasien, $id_dokter);
        }
        $data = [
            'id_LC' => $lc['id_LC'],
            'dari' => $id_dokter,
            'kepada' => $id_pasien,
            'pesan' => $pesan,
            'tanggal_dikirim' => date('Y-m-d'),
            'jam_dikirim' => date('H:i:s'),
            'status' => 'terkirim'
        ];
        $this->db->insert('chat', $data);
        $result = $this->db->affected_rows();
        if ($result > 0){
            $this->db->set('terakhir_chat', date('Y-m-d H:i:s'));
            $this->db->where('id_LC', $lc['id_LC']);
            $this->db->update('live_chat');
        }
    }
    public function live_chat(){
        $output = '';
        $id_dokter = $this->input->post('dari');
        $id_pasien = $this->input->post('kepada');
        $data = $this->db->query("SELECT * FROM `chat` WHERE dari = $id_dokter AND kepada = $id_pasien OR dari = $id_pasien AND kepada = $id_dokter")->result_array();
        foreach($data as $data){
            $pesan = $data['pesan'];
            $waktu = $data['tanggal_dikirim'];
            if ($waktu = date('Y-m-d')){
                $waktu = str_replace(':','.', substr($data['jam_dikirim'],0,5));
            }
            if ($data['dari'] == $this->session->userdata('id')){
                $output .= <<<HTML
                <div class="chat-content-rightside" id="dokter">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-2" style="overflow-wrap: break-word;word-wrap: break-word;">
                            <p class="mb-0 chat-time text-end">Anda, $waktu</p>
                            <p class="chat-right-msg">$pesan</p>
                        </div>
                    </div>
                </div>
                HTML;
            }else{
                $pesan_dari = ambil_nama_byID($data['dari'], 'pasien');
                $output .= <<<HTML
                <div class="chat-content-leftside" id="pasien">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-2" style="overflow-wrap: break-word;word-wrap: break-word;">
                            <p class="mb-0 chat-time">$pesan_dari, $waktu</p>
                            <p class="chat-left-msg">$pesan</p>
                        </div>
                    </div>
                </div>
                HTML;
            }
        }
        echo $output;
    }
    public function belum_dibaca(){
        $output = "";
        $data = $this->Model_read->belum_dibaca();
        if ($data){
            $output .= '<span class="alert-count">'.$data.'</span>';
            echo $output;
        }
    }
}