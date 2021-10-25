<?php 
function generate_idUser($table, $fieldID){
    $ci = get_instance();
    $akses = $ci->db->get_where('hak_akses', ['role' => $table])->row_array();
    $id = $akses['id'].date('y').date('m')."001";
    $ci->db->order_by($fieldID, 'DESC');
    $ci->db->limit(1);
    $data = $ci->db->get($table)->row_array();
    if ($data){
        $id = $data[$fieldID] + 1;
    }
    return $id;
}

?>