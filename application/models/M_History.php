<?php

use phpDocumentor\Reflection\PseudoTypes\True_;

class M_history extends CI_Model{

  // all about pengajuan
  function get_all_pengajuan_fak(){
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $query=$this->db->get();
    return $query;
  }
  function count_pengajuan_univ()
  {
    $statususer=array('4','8','6','10'); 
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->where('kd_fakultas is NULL', NULL, TRUE);
    $this->db->where('statususer >=', '4');
    $this->db->where('statususer <=', '8');
    $this->db->group_by('kd_jrsn');
    $this->db->select('kd_jrsn');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function count_pengajuan_fklts()
  {
    $statususer=array('4','8','6','10'); 
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $this->db->where_in('statususer', $statususer);
    // $this->db->where('statususer >=', '4');
    // // $this->db->where('statususer', '6');
    // $this->db->where('statususer <=', '8');
    $this->db->group_by('kd_jrsn');
    $this->db->select('kd_jrsn');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function count_pengajuan_ukmukk()
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan_ukmukk');
    $this->db->where('statususer >=', '4');
    $this->db->where('statususer <=', '8');
    $this->db->group_by('kd_ukmkk');
    $this->db->select('kd_ukmkk');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function get_all_pengajuan_ukmukk(){
    $this->db->select('*');
    $this->db->from('tb_pengajuan_ukmukk');
    $query=$this->db->get();
    return $query;
  }
  function get_pengajuan_univ($kd_jrsn){
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_status', 'tb_status.id_status=tb_pengajuan.statususer', 'left');
    $this->db->where('kd_fakultas is NULL', NULL, TRUE);
    $this->db->where('kd_jrsn', $kd_jrsn);
    $this->db->order_by('insertdata', 'DESC');
    return $this->db->get();
  }
  function get_pengajuan_fklts($kd_jrsn){
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas','left');
    $this->db->join('tb_status', 'tb_status.id_status=tb_pengajuan.statususer', 'left');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $this->db->where('kd_jrsn', $kd_jrsn);
    $this->db->order_by('insertdata', 'DESC');
    return $this->db->get();
  }
  function get_pengajuan_ukmukk($kd_ukmkk)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan_ukmukk');
    $this->db->join('tb_status', 'tb_status.id_status=tb_pengajuan_ukmukk.statususer');
    $this->db->where('kd_ukmkk', $kd_ukmkk);
    $this->db->order_by('insertdata', 'DESC');
    return $this->db->get();
  }
  // end all about pengajuan

  // all about laporan
  function count_laporan_univ()
  {
    $statususer=array('5','6','7','9','10');  
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas');
    $this->db->where('kd_fakultas is NULL', NULL, TRUE);
    $this->db->where_in('statususer', $statususer);
    $this->db->group_by('kd_jrsn');
    $this->db->select('kd_jrsn');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function count_laporan_fklts()
  {
    $statususer=array('5','6','7','9','10');  
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $this->db->where_in('statususer', $statususer);
    $this->db->group_by('kd_jrsn');
    $this->db->select('kd_jrsn');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function count_laporan_ukmukk()
  {
    $statususer=array('5','6','7','9','10');  
    $this->db->select('*');
    $this->db->from('tb_pengajuan_ukmukk');
    $this->db->where_in('statususer', $statususer);
    $this->db->group_by('kd_ukmkk');
    $this->db->select('kd_ukmkk');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function get_laporan_univ($kd_jrsn)
  {
    $statususer=array('5','7','9','10');
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    // $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas','left');
    $this->db->join('tb_status', 'tb_status.id_status=tb_pengajuan.statususer', 'left');
    $this->db->where('kd_fakultas is NULL', NULL, TRUE);
    $this->db->where_in('statususer', $statususer);
    $this->db->where('kd_jrsn', $kd_jrsn);
    $this->db->order_by('insertdata', 'DESC');
    return $this->db->get();
  }
  function get_laporan_fklts($kd_jrsn)
  {
    $statususer=array('5','7','9','10');
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas','left');
    $this->db->join('tb_status', 'tb_status.id_status=tb_pengajuan.statususer', 'left');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $this->db->where_in('statususer', $statususer);
    $this->db->where('kd_jrsn', $kd_jrsn);
    $this->db->order_by('insertdata', 'DESC');
    return $this->db->get();
  }
  function get_laporan_ukmukk($kd_ukmkk)
  {
    $statususer=array('5','7','9','10');
    $this->db->select('*');
    $this->db->from('tb_pengajuan_ukmukk');
    $this->db->join('tb_status', 'tb_status.id_status=tb_pengajuan_ukmukk.statususer');
    $this->db->where('kd_ukmkk', $kd_ukmkk);
    $this->db->where_in('statususer', $statususer);
    $this->db->order_by('insertdata', 'DESC');
    return $this->db->get();
  }
}