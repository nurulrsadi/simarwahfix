<?php 

class M_dana extends CI_Model{

    // public function detailuser(){
      
    // }
    function join(){
      $this->db->select('*');
      $this->db->from('jurusan');
      $this->db->join('user', 'user.kode_himp= jurusan.kode_himpunan', 'left');
      $this->db->join('fakultas', 'fakultas.kode_fakultas= jurusan.parent_fakultas', 'left');
      $this->db->where('role', 0 );
      $query = $this->db->get ();
      return $query->result ();
    }
    function update_user_awal($kd_jrsn, $statususer){
      $query_update_user_awal =$this->db->query("UPDATE user SET statususer = '$statususer' WHERE kode_himp ='$kd_jrsn'");
    }
    function cek_datadana($where){
      $query =  $this->db->query('SELECT * FROM tb_pengajuan WHERE kd_jrsn = "'.$where.'"');
      // print_r($query);
      // exit();
      return $query;
    } 
    function tambah_datauser($datadana){
      $this->db->insert('tb_detailuser',$datadana);
      // $this->session->set_flashdata('Sukses',"Data Jurusan Berhasil Ditambahkan");
      return TRUE;
    }
    function delete_datauser($kode_himpunan)
    {
      $this->db->delete('tb_detailuser', array('kd_jrsn' => $kode_himpunan));
    }
    function edit_datauser($kode_himpunan,$parent_fakultas){
      $query_update_himpunan = $this->db->query("UPDATE tb_detailuser SET kd_fklts = '$parent_fakultas' WHERE kd_jrsn = '$kode_himpunan'");
  	 return $query_update_himpunan;
    }
    // untuk tabel nama fakultas
    function edit_namafakultas($kode_fakultas, $nama_fakultas){
      return $query_update_fakultas = $this->db->query("UPDATE tb_namafakultas SET nama_fakultas = '$nama_fakultas' WHERE kode_namafakultas = '$kode_fakultas'");
    }
    function delete_namafakultas($kode_himpunan){
      $this->db->delete('fakultas', array('kode_fakultas' => $kode_fakultas));
    }
    

    
    function tampil_list_user_dana(){
      $query =$this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas ORDER BY kd_fklts");
      return $query;
    }


    function tampil_list_user_pengaju(){
      $query =  $this->db->query('SELECT * FROM tb_detailuser');
		  return $query;
      

      // // $this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas ORDER BY kd_fklts");
      // // $query = $this->db->query("SELECT * FROM tb_detailuser WHERE statususer=2 ");
      // // return $query;
      // return $this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE ('tb_detailuser.kd_fklts = fakultas.kode_fakultas' AND 'statususer = 2' )ORDER BY kd_fklts");
      // // $this->db->select('*');
      // $query = $this->db->get('tb_detailuser, fakultas');    
      // return $query;
    }
    function tampil_list_user_pengajuan(){
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE statususer=2');
      return $query;
    }
    
    function tampil_data_dana_login($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE kd_jrsn = "'.$jurusan.'"');
		  return $query;
    }
    function tampil_data_dana_maupengajuan($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_pengajuan WHERE kd_jrsn = "'.$jurusan.'"');
		  return $query;
    }
    public function tampil_danaormawa()
    {
      
    }             
    function edit_pengajuan($where,$table){		
      return $this->db->get_where($table,$where);
    }
    public function tampil_pengajuandana()
    {
      return $this->db->query("SELECT * FROM user WHERE role=2 AND statususer=1 ORDER BY fakultas ASC ");
        $this->db->select('id_user, nama, fakultas, tahunakademik, dana_awal, dana_sisa');
        $query = $this->db->get('user');    
        return $query;
    }

    public function lihatpengajuan($id_user){
      $this->db->select('*');
     $this->db->from('user');
     $this->db->where('id', $id);

     return $this->db->get();
    }

    public function editDana($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        return TRUE; 
    }
    // public function getAllDanaOrmawa()
    // {
    //     $this->db->select('*');
    //     return $this->db->from('user')
    //         ->join('tb_akses', 'tb_user.akses=tb_akses.akses_id')
    //         ->join('tb_kelas', 'tb_user.kelas=tb_kelas.id_kelas')
    //         ->get()
    //         ->result();
    // }

    function getUserId($username){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        return $this->db->get()->result_array();
    }

    function pengajuan($datakirim){
      $query_upload_pengajuan = $this->db->query("UPDATE user SET suratpengajuan_file = '$dataspj', rinciankegiatan_file = '$datarkg', rkakl_file = '$datarkakl', tor_file = '$datator', statususer = '$statususer', nPengajuan = '$nPengajuan' WHERE id_user = '$id_user'");
      return $query_upload_pengajuan;
    }
    function update_dana_awal($kd_jrsn,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer){
      $query_update_dana_awal =$this->db->query("UPDATE tb_detailuser SET tahunakademik = '$tahunakademik', danaawal = '$danaawal', danasisa = '$danasisa', nPengajuan = '$nPengajuan', statususer = '$statususer' WHERE kd_jrsn ='$kd_jrsn'");
  	// var_dump($kode_bidang);
  	// exit();
    return $query_update_dana_awal;
    }
    function edit_accpengajuan($where,$table){		
      return $this->db->get_where($table,$where);
    }
    function getDataByID($kd_jrsn){
      return $this->db->get_where('tb_detailuser', array('kd_jrsn'=>$kd_jrsn));
    }
    function update_accpengajuan($kd_jrsn,$statususer6){
      var_dump($kd_jrsn,$statususer6);
      die();
      $query_accpengajuan=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer6' WHERE kd_jrsn='$kd_jrsn");
      return $query_accpengajuan;
    }
    
    function update_hapuspengajuan($kd_jrsn,$statususer6){
      // var_dump($kd_jrsn,$statususer6,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya);
      // die();
      $query_hapusfilepengajuan =$this->db->query("UPDATE tb_detailuser SET statususer = '$statususer6' WHERE kd_jrsn ='$kd_jrsn'");
      return $query_hapusfilepengajuan;
    }
    function updatgagaleacc($where,$dataupdatedana,$table){
      $this->db->where($where);
      $this->db->update($table,$dataupdatedana);
  }
    function updateacc($where,$dataupdatedana,$table){
      var_dump($dataupdatedana);
      die();
      $this->db->where($where);
      $this->db->update($table,$dataupdatedana);
    }

    function pengajuandiacc($kd_jrsn, $statususer6, $x, $nPengajuan6){
      // var_dump($kd_jrsn, $statususer6, $x, $nPengajuan6);
      // die();
      // $query = "INSERT INTO users(username, password,name,surname,email,role)VALUES('$username', '$password','$name','$lastname','$email','$role')";
      // var_
      $query_update_pengajuannya=$this->db->query("UPDATE tb_pengajuan SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$x' WHERE kd_jrsn ='$kd_jrsn' ");
      return $query_update_pengajuannya;
    }

    function pengajuandiaccupdatedb($kd_jrsn, $statususer6, $danaupdate, $nPengajuan6){
      return $query=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$danaupdate' WHERE kd_jrsn ='$kd_jrsn' ");

    }

    
    // untuk user
    function update_pengajuan($kd_jrsn, $statususer6,$nPengajuan){
      $query_update_surat_pengajuan =$this->db->query("UPDATE tb_detailuser SET statususer='$statususer6', nPengajuan='$nPengajuan' WHERE kd_jrsn ='$kd_jrsn'");
      return $query_update_surat_pengajuan;
    }

    function insert_pengajuan($kd_jrsn,$kd_fklts,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya,$nPengajuan, $namaKegiatan, $statususer6, $danasisa, $akhirkegiatan){
      $query_insert_surat_pengajuan =$this->db->query("INSERT INTO tb_pengajuan SET suratpengajuan = '$suratpengajuannya', rinciankegiatan = '$rinciankegiatannya', rkakl = '$rkaklnya', tor = '$tornya', namaKegiatan='$namaKegiatan' , statususer='$statususer6', nPengajuan='$nPengajuan', kd_fakultas='$kd_fklts', kd_jrsn ='$kd_jrsn', akhirkegiatan='$akhirkegiatan', danasisa='$danasisa' ");
      return $query_insert_surat_pengajuan;
    }

    function tambah_pengajuan($datadana1){
      $this->db->insert('tb_pengajuan',$datadana1);
      return TRUE;
    }
}
