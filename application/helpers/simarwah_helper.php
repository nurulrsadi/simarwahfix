<?php

function is_logged_in()
{
    $ci = get_instance();
    $sess_data=!$ci->session->userdata('username');
        redirect('c_home/login');
}
function get_userdata($username="")
{
    $ci=&get_instance();
    if(strlen($username)>1){
        $ret=$ci->session->userdata($username);
    }else{
        $ret=$ci->session->userdata();
    }
    return $ret;
}
// function check_not_login()
// {
//     $ci = get_instance();
//     $data = $ci->session->userdata('username');
//     if (!$data) {
//         $ci->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
//         <button type="button" class="close" data-dismiss="alert">&times;</button>Login Terlebih Dahulu</div>');
//         redirect('auth');
//     }
// }

// function kode_dana()
// {
//     $date=date("mdY");
//     $ci=&get_instance();
//     $chek=$CI->db->query("select id_user from user order by id_user DESC");
//     if($chek->num_rows()>0){        
//         $chek=$chek->row_array();
//         $lastKode=$chek['id_user'];
//         $ambil=  substr($lastKode, 3)+1;
//         $newCode=  "DANA".sprintf("%01s",$ambil)."-".$date;
//         return $newCode;
//     }
//     else{
//         return 'DANA1'."-".$date;
//     }
// }

?>