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
            redirect($ci->session->userdata($role.'/home'));
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
function status_online(){
    
}

function chat_terbaru($id_LC = null){
    $ci = get_instance();
    $ci->db->where('id_LC', $id_LC);
    $ci->db->order_by('id','DESC');
    $ci->db->limit(1);
    $data =$ci->db->get('chat')->row_array();
    return $data['pesan'];
}

?>