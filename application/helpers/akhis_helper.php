<?php 

function cek_status_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role')) {
        redirect('auth/login');
    } else {
        $role = $ci->session->userdata('role');
        $controller = $ci->uri->segment(1);
        $akses = $ci->db->get_where('hak_akses', ['role' => $role, 'controller_access' => $controller])->row_array();
        if ($akses < 1) {
            redirect("$role/home");
        }
    }
}

function nama_web(){
    return "AKHIS";
}

function rubah_url($sebelum, $sesudah)
{
    return str_replace($sebelum, $sesudah, current_url());
}


function upload_foto($name, $path_penyimpanan){
    $ci = get_instance();
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']     = '5048';
    $config['upload_path'] = $path_penyimpanan;
    $config['file_name'] = time();
    $ci->upload->initialize($config);
    if ($ci->upload->do_upload($name)){
        $foto_lama = $ci->input->post('foto_lama', TRUE);
        if ($foto_lama){
            unlink(FCPATH . "$path_penyimpanan/" . $foto_lama);
        }
        return $ci->upload->data('file_name');
    }
}


function jenis_kelamin(){
    return [0 => [
            'jenis_kelamin' => 'L',
            'name' => 'Laki - Laki',
        ],
        1 => [
            'jenis_kelamin' => 'P',
            'name' => 'Perempuan'
        ]
        ];
}

function ambil_nama_byID($id, $table){
    $ci = get_instance();
    $data = $ci->db->get_where($table, ["id_$table" => $id])->row_array();
    return $data['nama_lengkap'];
}
function ambil_foto_byID($id, $table){
    $ci = get_instance();
    $data = $ci->db->get_where($table, ["id_$table" => $id])->row_array();
    return $data['foto'];
}

function chat_terbaru($id_LC = null){
    $ci = get_instance();
    $ci->db->where('id_LC', $id_LC);
    $ci->db->order_by('id','DESC');
    $ci->db->limit(1);
    $data =$ci->db->get('chat')->row_array();
    return $data;
}
function chat_belum_dibaca($id_LC = null){
    $ci = get_instance();
    $id_user = $ci->session->userdata('id');
    $ci->db->where('kepada', $id_user);
    $ci->db->where('id_LC', $id_LC);
    $ci->db->where('status', 'terkirim');
    $data = $ci->db->count_all_results('chat');
    if ($data) {
        return $data;
    }
}

function online($id, $role){
    $ci = get_instance();
    $ci->db->set('status_online', 'online');
    $ci->db->where("id_$role", $id);
    $ci->db->update($role);
}
function offline($id, $role){
    $ci = get_instance();
    $ci->db->set('status_online', 'offline');
    $ci->db->where("id_$role", $id);
    $ci->db->update($role);
}
function status_online($id, $role){
    $ci = get_instance();
    $ci->db->select('status_online');
    $data = $ci->db->get_where($role, ["id_$role" => $id])->row_array();
    return $data['status_online'];
}

function detail_resep($id_resep){
    $ci = get_instance();
    return $ci->db->get_where('v_detail_resep',['id_resep' => $id_resep])->result_array();
}
function terakhir_konsul($id_pasien){
    $ci = get_instance();
    $ci->db->order_by('id', 'DESC');
    $ci->db->limit(1);
    $data = $ci->db->get_where('chat', ['dari' => $id_pasien])->row_array();
    if ($data){
        return $data['tanggal_dikirim'];
    }
}
function umur($tanggal_lahir){
    if ($tanggal_lahir != '0000-00-00'){
        $umur = new DateTime($tanggal_lahir);
        $sekarang = new DateTime("today");
        if ($umur < $sekarang){
            return $sekarang->diff($umur)->y;
        }else{
            
        }
    }
}

function get_invoice($id_resep){
    $ci = get_instance();
    $data = $ci->db->get_where('pesanan', ['id_resep' => $id_resep])->row_array();
    return $data['invoice'];
}

function cek_bayar($id_resep){
    $ci = get_instance();
    $data = $ci->db->get_where('pesanan', ['id_resep' => $id_resep])->row_array();
    return $data['status'];
}
function lihat_bukti($id_resep){
    $ci = get_instance();
    $invoice = get_invoice($id_resep);
    $data = $ci->db->get_where('pembayaran', ['invoice' => $invoice])->row_array();
    return $data['bukti_bayar'];
}
?>
