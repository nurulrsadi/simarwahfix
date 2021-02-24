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
  function getDataByID($id_keluhan){
    return $this->db->get_where('tb_keluhan', array('id_keluhan'=>id_keluhan));
  }
  function hapuskeluhannya($id){
    $this->db->delete('tb_keluhan', array('id' => $id));
    //  $this->db->delete('fakultas', array('kode_fakultas' => $kode_fakultas));
  }

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
    $this->db->from('jurusan');
    $this->db->where('parent_fakultas is NOT NULL', NULL, FALSE);
    $this->db->select('SUM(jml_mhsaktif) as total_amount');
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
    return $this->db->from('ukm_ukk')
    ->get()
    ->result();
  }

  function get_login($jurusan){
    $query =  $this->db->query('SELECT * FROM user WHERE kode_himp = "'.$jurusan.'"');
		  return $query;
  }
  function sewa_aula($data){
    $this->db->insert('tb_sewaaula',$data);
    return TRUE;
  }
  
  function check_aula($jenisAula,$tanggalAwal,$tanggalAkhir){
      $query = $this->db->query("SELECT * FROM tb_sewaaula WHERE jenisaula='$jenisAula' AND dari >= '$tanggalAwal' AND dari <='$tanggalAkhir' OR hingga >='$tanggalAwal' AND hingga <= '$tanggalAkhir' ");
      return $query;
  }
  
  function update_status_sewa($statussewa,$id_user){
    return $query= $this->db->query("UPDATE user SET statussewa='$statussewa' WHERE id_user='$id_user'");
  }
  function get_data_sewa($jurusan){
    $this->db->select('*');
    $this->db->from('tb_sewaaula');
    $this->db->where('penyewa', $jurusan);
    $this->db->join('tb_ket_aula', 'tb_ket_aula.warna_id=tb_sewaaula.jenisaula');
    return $query = $this->db->get();
  }
  function get_belum_tanggalnya(){
    return $query=$this->db->query("SELECT * FROM tb_sewaaula, tb_ket_aula WHERE tb_sewaaula.jenisaula=tb_ket_aula.warna_id order by dari");
  }
  function get_saat_tanggalnya($date_minus,$date_now)
  {
    // SELECT * FROM `tb_sewaaula` WHERE `hingga` >= "2020-10-24" AND `hingga` <= "2020-10-31"
    $array=array('hingga >=' => $date_minus, 'hingga <=' =>$date_now);
    $this->db->select('*');
    $this->db->from('tb_sewaaula');
    $this->db->join('tb_ket_aula', 'tb_ket_aula.warna_id=tb_sewaaula.jenisaula');
    $this->db->where($array);
    return $this->db->get();
    //  return $query=$this->db->query('SELECT * FROM tb_sewaaula, tb_ket_aula WHERE tb_sewaaula.jenisaula=tb_ket_aula.warna_id AND hingga >= "'.$date_minus.'" AND hingga <= "'.$date_minus.'" ');
    // var_dump($query); die();
  }

  function hapus_data_sewa_user($id_sewa){
    $this->db->delete('tb_sewaaula', array('id_sewa' => $id_sewa));
  }
  function getDataSewaByID($id_sewa){
    return $this->db->get_where('tb_sewaaula', array('id_sewa'=>$id_sewa));
  }
  function get_detail_sewa_surat($id_sewa){
    $this->db->select('*');
    $this->db->from('tb_sewaaula');
    $this->db->where('id_sewa', $id_sewa);
    $this->db->join('tb_ket_aula', 'tb_ket_aula.warna_id=tb_sewaaula.jenisaula');
    return $query = $this->db->get();
    // return $this->db->get_where('tb_sewaaula', array('id_sewa'=>$id_sewa));
  }
  function get_data_sewaAll(){
    $this->db->select('*');
    $this->db->from('tb_sewaaula');
    $this->db->join('tb_ket_aula', 'tb_ket_aula.warna_id=tb_sewaaula.jenisaula');
    return $query = $this->db->get();
  }
  public function getAllEvents(){
    $this->db->order_by('id_sewa');
    return $this->db->get('tb_sewaaula');
  }
}
