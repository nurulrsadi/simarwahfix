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
  // function tambah_fakultas($fakultasdata){
  //   $this->db->insert('tb_sumtotalanggotafak',$fakultasdata);
  //   return TRUE;
  // }

  function update_fakultas($kode_fakultas,$nama_fakultas){
  	$query_update_fakultas =$this->db->query("UPDATE tb_sumtotalanggotafak SET nama_fakultas = '$nama_fakultas' WHERE kd_faklutas ='$kode_fakultas'");
  	return $query_update_fakultas;
  }
  
  function delete_fakultas($kode_fakultas){
    $this->db->delete('tb_sumtotalanggotafak', array('kd_fakultas' => $kode_fakultas));
}



  function getTotalAnggotafak(){
    $this->db->select('*');
    $this->db->from('anggota_himpunan');
    $this->db->join('jurusan','jurusan.kode_himpunan=anggota_himpunan.parent_himpunan');
    $this->db->group_by('parent_fakultas');
    $this->db->select('parent_fakultas');
    return $this->db->select("count(*) as total_anggotafak")
    ->get()
    ->result();
  }

  function getAnggotaAktiffak(){
    $this->db->select('*');
    $this->db->select('SUM(jml_mhsaktif) as total_amount');
    $this->db->from('jurusan');
    $this->db->where('parent_fakultas is NOT NULL', NULL, FALSE);
    $this->db->group_by('parent_fakultas');
    $res = $this->db->get();
    if($res->num_rows() > 0)
    {
        return $res->result();
    }else{
        return false;
    }
  }
  
  function getAnggotaAktifUKMUKK(){
    $this->db->select('*');
    return $this->db->from('UKM_UKK')
    ->get()
    ->result();
  }
}
