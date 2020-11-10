<?php 

class M_history extends CI_Model{
  function get_all_p_univ(){

  }
  function get_all_pengajuan_fak(){
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $query=$this->db->get();
    return $query;
  }
  function count_pengajuan_fklts()
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('fakultas', 'fakultas.kode_fakultas=tb_pengajuan.kd_fakultas');
    $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
    $this->db->where('statususer >=', '4');
    $this->db->where('statususer <=', '8');
    $this->db->group_by('kd_jrsn');
    $this->db->select('kd_jrsn');
    return $this->db->select("count(*) as n_pengajuan")
    ->get();
  }
  function get_all_pengajuan_ukmukk(){
    $this->db->select('*');
    $this->db->from('tb_pengajuan_ukmukk');
    $query=$this->db->get();
    return $query;
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
}