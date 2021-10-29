<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Jakarta');

class Chat extends CI_Controller {
    public function __construct() {
		parent::__construct();
        cek_status_login();
    }
    public function index($id = null){
        if ($id){
            $data['id_tujuan'] = $id; 
            $this->Model_update->baca_pesan($id);
        }
		$data['chat'] = $this->Model_read->live_chat_pasien();
        $data['title'] = "Chat Dokter | ". nama_web();
		$this->load->view('pasien/template/head', $data);
		$this->load->view('pasien/template/header');
		$this->load->view('pasien/template/sidebar');
		$this->load->view('pasien/v_chat');
		$this->load->view('pasien/template/footer');
    }
    public function kirim(){
        $dari = $this->input->post('dari');
        $kepada = $this->input->post('kepada');
        $pesan = $this->input->post('pesan');
        $lc = $this->Model_read->pilih_live_chat($dari, $kepada);
        if (!$lc){
            $data = [
                'id_dokter' => $kepada,
                'id_pasien' => $this->session->userdata('id')
            ];
            $this->db->insert('live_chat', $data);
            $lc = $this->Model_read->pilih_live_chat($kepada, $dari);
        }
        $data = [
            'id_LC' => $lc['id_LC'],
            'dari' => $dari,
            'kepada' => $kepada,
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
        $dari = $this->input->post('dari');
        $kepada = $this->input->post('kepada');
        $data = $this->db->query("SELECT * FROM `chat` WHERE dari = $dari AND kepada = $kepada OR dari = $kepada AND kepada = $dari")->result_array();
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
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time text-end">Anda, $waktu</p>
                            <p class="chat-right-msg">$pesan</p>
                        </div>
                    </div>
                </div>
                HTML;
            }else{
                $pesan_dari = ambil_nama_byID($data['dari'], 'dokter');
                $output .= <<<HTML
                <div class="chat-content-leftside" id="dokter">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">$pesan_dari, $waktu</p>
                            <p class="chat-left-msg">$pesan</p>
                        </div>
                    </div>
                </div>
                HTML;
            }
        }
        echo $output;
    } public function belum_dibaca(){
        $output = "";
        $data = $this->Model_read->belum_dibaca();
        if ($data > 0 ){
            $output .= '<span class="alert-count">'.$data.'</span>';
            echo $output;
        }
    }












    public function test(){
        $data = $this->Model_read->belum_dibaca();
        var_dump($data);
    }
}