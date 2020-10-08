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
    // function edit_namafakultas($kode_fakultas, $nama_fakultas){
    //   return $query_update_fakultas = $this->db->query("UPDATE tb_namafakultas SET nama_fakultas = '$nama_fakultas' WHERE kode_namafakultas = '$kode_fakultas'");
    // }
    function delete_namafakultas($kode_himpunan){
      $this->db->delete('fakultas', array('kode_fakultas' => $kode_fakultas));
    }
    

    // UNTUK EDIT DANA PAGU
    function tampil_list_user_dana(){
      $query =$this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas AND kd_fklts != 'UKM' and kd_fklts!='UKK' ORDER BY kd_fklts");
      return $query;
    }
    function tampil_list_user_danauniv(){
      $query =$this->db->query("SELECT * FROM tb_detailuser WHERE kd_fklts is NULL ORDER BY kd_jrsn");
      return $query;
    }
    function tampil_list_user_dana_ormawa(){
      $kdjrsnnya=array('UKM', 'UKK');
      $this->db->select('*');
      $this->db->from('tb_detailuser');
      $this->db->join('fakultas', 'fakultas.kode_fakultas = tb_detailuser.kd_fklts');
      $this->db->where_in('kd_fklts', $kdjrsnnya );
      return $query = $this->db->get();
    }
    function tampil_list_user_ukm_ormawa(){
      $kdjrsnnya=array('UKM', 'UKK');
      $this->db->select('*');
      $this->db->from('jurusan');
      $this->db->join('fakultas', 'fakultas.kode_fakultas = jurusan.parent_fakultas');
      $this->db->where_in('kode_fakultas', $kdjrsnnya );
      return $query = $this->db->get();
    }
    // END EDIT DANA PAGU
    
    // UNTUK CEK KALAU ADA YANG MAU NGAJUIN DANA
    function tampil_list_user_pengajuan(){
      $query =$this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas AND statususer=3 ORDER BY kd_fklts");
      return $query;
    }
    function tampil_list_user_pengajuan_univ(){
      $query =$this->db->query("SELECT * FROM tb_detailuser WHERE statususer=3 AND kd_fklts is NULL ORDER BY kd_fklts");
      return $query;
    }
    // END CEK KALAU ADA YANG MAU NGAJUIN DANA

    //kalau udah diacc tapi belum ngirim laporan
    function tampil_list_user_laporanbelumdikirim(){
      return $query1 = $this->db->query("SELECT * FROM tb_pengajuan, fakultas WHERE tb_pengajuan.kd_fakultas = fakultas.kode_fakultas AND statususer = 4 ORDER BY kd_fakultas"  );
      return $query =$this->db->query("SELECT DISTINCT DATE_FORMAT(akhirkegiatan, '%d %M %Y') AS akhirkegiatan FROM $query1 ORDER BY akhirkegiatan ASC ");
      // return $query;
    }
    function tampil_list_user_laporanbelumdikirimuniv(){
      return $query=$this->db->query("SELECT * FROM tb_pengajuan WHERE statususer=4 AND kd_fakultas is null ORDER BY kd_jrsn");
    }

    function update_danayangdiacc($kd_jrsn,$x,$danaacc){
      $query_acc = $this->db->query("UPDATE tb_pengajuan SET danasisa = '$x', danaacc = '$danaacc' WHERE kd_jrsn = '$kd_jrsn'");
      return $query_acc;
    }
    function update_danayangdiaccdetail($kd_jrsn,$x){
      $query_acc = $this->db->query("UPDATE tb_detailuser SET danasisa = '$x' WHERE kd_jrsn = '$kd_jrsn'");
      return $query_acc;
    }
    // end acc belum ngirim laporan

    // ngambil data untuk pengajuan 
    function tampil_data_dana_login($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE kd_jrsn = "'.$jurusan.'"');
		  return $query;
    }
    function tampil_data_dana_maupengajuan($jurusan){
      $query =$this->db->query('SELECT * FROM tb_pengajuan, fakultas WHERE tb_pengajuan.kd_fakultas = fakultas.kode_fakultas AND kd_jrsn = "'.$jurusan.'" ');
      // $query =  $this->db->query('SELECT * FROM tb_pengajuan WHERE kd_jrsn = "'.$jurusan.'" ');
		  return $query;
    }
    function tampil_data_laporan_login($jurusan){
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
    function update_accpengajuan($kd_jrsn,$statususer6){
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
      $this->db->where($where);
      $this->db->update($table,$dataupdatedana);
    }
    //pengajuan diacc admin. melakukan update untuk di tabel pengajuan, detail user sama tabel user 
    function pengajuandiacc($kd_jrsn, $statususer6, $x, $nPengajuan6,$c){
      // $query = "INSERT INTO users(username, password,name,surname,email,role)VALUES('$username', '$password','$name','$lastname','$email','$role')";
      // var_

      $query_update_pengajuannya=$this->db->query("UPDATE tb_pengajuan SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$x', danaacc='$c' WHERE kd_jrsn ='$kd_jrsn' ");
      return $query_update_pengajuannya;
    }
    function pengajuandiaccupdatedb($kd_jrsn, $statususer6, $danaupdate, $nPengajuan6){
      return $query=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$danaupdate' WHERE kd_jrsn ='$kd_jrsn' ");
    }
    function pengajuandiaccupdatedbuser($kd_jrsn, $statususer6){
      return $query=$this->db->query("UPDATE user SET statususer='$statususer6' WHERE kode_himp= '$kd_jrsn' ");
    }
    // end pengajuan di acc

    // Pengajuan ditolak
    function pengajuantidakdiaccupdate($kd_jrsn, $statususer7){
      return $query = $this->db->query("UPDATE user SET statususer='$statususer7' WHERE kode_himp= '$kd_jrsn'");
    }
    function pengajuantidakdiaccdetil($kd_jrsn, $statususer7, $danasisa, $nPengajuan7,$pesangagal){
      return $query=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer7', nPengajuan='$nPengajuan7', pesangagal='$pesangagal', danasisa='$danasisa' WHERE kd_jrsn ='$kd_jrsn' ");
    }
    
    
    // untuk user
    function update_pengajuan($kd_jrsn, $statususer6,$nPengajuan){
      $query_update_surat_pengajuan =$this->db->query("UPDATE tb_detailuser SET statususer='$statususer6', nPengajuan='$nPengajuan' WHERE kd_jrsn ='$kd_jrsn'");
      return $query_update_surat_pengajuan;
    }

    function insert_pengajuan($kd_jrsn,$kd_fklts,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya,$nPengajuan, $namaKegiatan, $statususer6,$danaawal, $danasisa, $akhirkegiatan){
      $query_insert_surat_pengajuan =$this->db->query("INSERT INTO tb_pengajuan SET suratpengajuan = '$suratpengajuannya', rinciankegiatan = '$rinciankegiatannya', rkakl = '$rkaklnya', tor = '$tornya', namaKegiatan='$namaKegiatan' , statususer='$statususer6', nPengajuan='$nPengajuan', kd_fakultas='$kd_fklts', kd_jrsn ='$kd_jrsn', akhirkegiatan='$akhirkegiatan', danasisa='$danasisa' danaawal='$danaawal' ");
      return $query_insert_surat_pengajuan;
    }
    // berhasil upload file untuk pengajuan
    function tambah_pengajuan($datadana1){
      $this->db->insert('tb_pengajuan',$datadana1);
      return TRUE;
    }
    function pengajuanfile($kd_jrsn,$statususer){
      return $query=$this->db->query("UPDATE tb_detailuser set statususer='$statususer' WHERE kd_jrsn='$kd_jrsn'");
    }
    function pengajuanfileuser($kd_jrsn,$statususer){
      return $query=$this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_jrsn'");
    }
    // upload laporan
    function update_laporan($kd_jrsn, $statususer, $tgluploadlpj, $tglmakslaporan, $laporankegiatannya, $rincianbiayanya){
    $query = $this->db->query("UPDATE tb_pengajuan set statususer='$statususer', laporankegiatan='$laporankegiatannya', laporanrincianbiaya='$rincianbiayanya', tgluploadlpj='$tgluploadlpj', tglmakslaporan='$tglmakslaporan' WHERE kd_jrsn='$kd_jrsn'");
    return $query;
  }
  function update_laporandetail($kd_jrsn, $statususer){
    return $query= $this->db->query("UPDATE tb_detailuser set statususer='$statususer' WHERE kd_jrsn='$kd_jrsn'");
  }
    function update_laporanuser($kd_jrsn, $statususer){
      return $query = $this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_jrsn'");
    }
    // end upload laporan
    // cek laporan kegiatan
    function tampil_list_lpjjrsn(){
      $query =$this->db->query("SELECT * FROM tb_pengajuan, fakultas WHERE tb_pengajuan.kd_fakultas = fakultas.kode_fakultas AND statususer=5 ORDER BY kd_fakultas");
      return $query;
    }

    // untuk hapus satu baru tb_pengajuan
    function getDataByID($kd_jrsn){
      return $this->db->get_where('tb_pengajuan', array('kd_jrsn'=>$kd_jrsn));
    }
    // update jumlah pengajuan saat laporan diterima
    function update_nPengajuan($statususer,$newnPengajuan,$kd_jrsn){
      return $query=$this->db->query("UPDATE tb_detailuser set statususer='$statususer', nPengajuan='$newnPengajuan' WHERE kd_jrsn='$kd_jrsn' ");
    }
    function update_nPengajuanuser($statususer,$kd_jrsn){
      return $query=$this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_jrsn' ");
    }
    // untuk hapus semua file di tb_pengajuan
    public function hapusFile($kd_jrsn){
      $this->db->delete('tb_pengajuan', array('kd_jrsn' => $kd_jrsn));
      // $this->db->where('kd_jrsn', $kd_jrsn);
      // return $this->db->delete('tb_detailpengajuan');
  }
}
