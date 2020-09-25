<?php 

class ormawa extends CI_Controller{ 
  function do_keluhan(){
    $kd_ormawa=$this->input->post('kd_jrsn',true);
    $kd_fklts=$this->input->post('kd_fklts',true);
    $tanggal=date("Y-m-d",strtotime($this->input->post('tanggal')));
    $isikeluhan=$this->input->post('isikeluhan', true);
    $data1=array(
      'kd_ormawa'=>$kd_ormawa,
      'kd_fakultas' => $kd_fklts,
      'tanggal' => $tanggal,
      'isikeluhan' => $isikeluhan,
    );
    $this->M_ormawa->tambah_keluhan($data1);
    if($data1){ // Jika sukses
      redirect('c_user/Keluhan');
      }else{ // Jika gagal
            echo "<script>alert('Keluhan gagal dikirim, silahkan input keluhan maksimal 250kata ');window.location = '".base_url('c_user/Keluhan')."';</script>";
      }
  }
  function hapuskeluhan($kd_ormawa){
    $kd_ormawa=$this->input->post('kd_ormawa',true);
    $data=$this->M_ormawa->getDataByID($kd_ormawa)->row();
    $delete=$this->M_ormawa->hapuskeluhannya($kd_ormawa);
    redirect('c_admin/keluhan');
  }

}
