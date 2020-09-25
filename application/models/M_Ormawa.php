<?php 

class M_ormawa extends CI_Model{

  function tampil_data_ormawa_login($jurusan){
    $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE kd_jrsn = "'.$jurusan.'"');
    return $query;
  }
  function tambah_keluhan($data1){
    $this->db->insert('tb_keluhan',$data1);
    return TRUE;
  }
  function tampil_keluhan(){
    return $query=$this->db->query("SELECT * FROM tb_keluhan");
  }
  function getDataByID($kd_ormawa){
    return $this->db->get_where('tb_keluhan', array('kd_ormawa'=>$kd_ormawa));
  }
  function hapuskeluhannya($kd_ormawa){
    $this->db->delete('tb_keluhan', array('kd_ormawa' => $kd_ormawa));
  }
}
