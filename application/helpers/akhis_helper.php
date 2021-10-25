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
    $foto = $_FILES[$name]['name'];
    if ($foto){
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = '5048';
        $config['upload_path'] = $path_penyimpanan;
        $config['file_name'] = time();
        $ci->upload->initialize($config);
        if ($ci->upload->do_upload($name)){
            return $ci->upload->data('file_name');
        }
    }else{
        return "default-".$ci->input->post('jenis_kelamin').'.png';
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
?>