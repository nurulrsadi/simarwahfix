<?php 

class model_ukmukk extends CI_Model{

  
  function cek_mhs($table,$where){
    return $this->db->get_where($table,$where);
  }
  function tambah_calon($data)
  {
    $this->db->insert('tb_calon_anggota',$data);
      return TRUE;
  }
  function get_all($kode_himpunan){
    $this->db->select('*');
    $this->db->from('tb_calon_anggota');
    $this->db->join('tb_statuspendaftar', 'tb_statuspendaftar.id_s_pendaftar = tb_calon_anggota.status_calon');
    $this->db->where('ukmukk', $kode_himpunan);
    $this->db->order_by('status_calon', 'ASC');
    return $this->db->get();
    // $query = $this->db->query('SELECT * FROM tb_calon_anggota WHERE ukmukk = "'.$kode_himpunan.'" '); 
    // return $query;
  }

  function count_all($kode_ukmukk){
    $this->db->select('*');
    $this->db->from('tb_calon_anggota');
    $this->db->where('ukmukk', $kode_ukmukk);
    return $this->db->count_all_results();
  }
  function count_terima($kode_ukmukk){
    $where = 1;
    $this->db->select('*');
    $this->db->from('tb_calon_anggota');
    $this->db->where_in('status_calon', $where);
    $this->db->where('ukmukk', $kode_ukmukk);
    return $this->db->count_all_results();
  }
  function count_tolak($kode_ukmukk){
    $where = 0;
    $this->db->select('*');
    $this->db->from('tb_calon_anggota');
    $this->db->where_in('status_calon', $where);
    $this->db->where('ukmukk', $kode_ukmukk);
    return $this->db->count_all_results();
  }

  function update_terima($id_calon,$status_baru)
  {
    $query_update=$this->db->query("UPDATE tb_calon_anggota SET status_calon='$status_baru' WHERE id_calon_anggota='$id_calon' ");
    return $query_update;
  }
  function getDataByID($id_calon){
    return $this->db->get_where('tb_calon_anggota', array('id_calon_anggota'=>$id_calon));
  }
  function hapusData($id_calon){
    $this->db->delete('tb_calon_anggota', array('id_calon_anggota' => $id_calon));
  }

  function get_all_ukmukk()
  {
    $query = $this->db->get('ukm_ukk'); 
    return $query;
  }
}