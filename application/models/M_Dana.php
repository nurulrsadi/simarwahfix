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
    function update_user_awal1($kd_ukmukk, $statususer){
      $query_update_user_awal =$this->db->query("UPDATE user SET statususer = '$statususer' WHERE kode_himp ='$kd_ukmukk'");
    }
    function cek_datadana($where){
      $query =  $this->db->query('SELECT * FROM tb_pengajuan WHERE kd_jrsn = "'.$where.'"');
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
    function delete_datauserukmukk($kode_ukmukk){
      $this->db->delete('tb_detailuserukmukk', array('kd_ukmukk' => $kode_ukmukk));
    }
    function edit_datauser($kode_himpunan,$parent_fakultas){
      $query_update_himpunan = $this->db->query("UPDATE tb_detailuser SET kd_fklts = '$parent_fakultas' WHERE kd_jrsn = '$kode_himpunan'");
  	 return $query_update_himpunan;
    }
    // untuk tabel nama fakultas
    // function edit_namafakultas($kode_fakultas, $nama_fakultas){
    //   return $query_update_fakultas = $this->db->query("UPDATE tb_namafakultas SET nama_fakultas = '$nama_fakultas' WHERE kode_namafakultas = '$kode_fakultas'");
    // }
    function delete_namafakultas($kode_fakultas){
      $this->db->delete('fakultas', array('kode_fakultas' => $kode_fakultas));
    }
    

    // UNTUK EDIT DANA PAGU
    function tampil_list_user_dana(){
      $query =$this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas ORDER BY kd_fklts");
      return $query;
    }
    function tampil_list_user_danauniv(){
      $query =$this->db->query("SELECT * FROM tb_detailuser WHERE kd_fklts is NULL ORDER BY kd_jrsn");
      return $query;
    }
    function tampil_list_user_dana_ormawa(){
      $this->db->select('*');
      $this->db->from('tb_detailuserukmukk');
      $this->db->join('ukm_ukk', 'ukm_ukk.kode_ukmukk = tb_detailuserukmukk.kd_ukmukk');
      return $query = $this->db->get();
    }
    function tampil_list_user_anggota(){
      $this->db->select('*');
      $this->db->from('tb_detailuser');
      $this->db->join('anggota_himpunan', 'anggota_himpunan.parent_himpunan=tb_detailuser.kd_jrsn');
      $this->db->group_by('kd_jrsn');
      $this->db->select('kd_jrsn');
      $this->db->order_by('kd_fklts');
      return $this->db->select("count(*) as count_ahimp")
      ->get()
      ->result();
    }
    // END EDIT DANA PAGU
    
    // UNTUK CEK KALAU ADA YANG MAU NGAJUIN DANA
    function tampil_list_user_pengajuan(){
      $query =$this->db->query("SELECT * FROM tb_pengajuan, fakultas WHERE tb_pengajuan.kd_fakultas = fakultas.kode_fakultas AND statususer=3 ORDER BY kd_fakultas");
      return $query;
    }
    function tampil_list_user_pengajuanukm(){
      return $query=$this->db->query("SELECT * FROM tb_pengajuan_ukmukk WHERE statususer=3 ORDER BY kd_ukmkk");
    }
    function tampil_list_user_pengajuan_univ(){
      $query =$this->db->query("SELECT * FROM tb_pengajuan WHERE statususer=3 AND kd_fakultas is NULL ORDER BY kd_jrsn");
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
    function tampil_list_user_laporanbelumdikirim_ukmukk(){
      return $query=$this->db->query("SELECT * FROM tb_pengajuan_ukmukk WHERE statususer=4 ORDER BY kd_ukmkk");
      return $query =$this->db->query("SELECT DISTINCT DATE_FORMAT(akhirkegiatan, '%d %M %Y') AS akhirkegiatan FROM $query ORDER BY akhirkegiatan ASC ");
    }

    function update_danayangdiacc($kd_jrsn,$x,$danaacc){
      $query_acc = $this->db->query("UPDATE tb_pengajuan SET danasisa = '$x', danaacc = '$danaacc' WHERE kd_jrsn = '$kd_jrsn'");
      return $query_acc;
    }
    function update_danayangdiacc_ukmukk($kd_ukmukk,$x,$danaacc){
      $query_acc = $this->db->query("UPDATE tb_pengajuan_ukmukk SET danasisa = '$x', danaacc = '$danaacc' WHERE kd_ukmkk = '$kd_ukmukk'");
      return $query_acc;
    }
    function update_danayangdiaccdetail($kd_jrsn,$x){
      $query_acc = $this->db->query("UPDATE tb_detailuser SET danasisa = '$x' WHERE kd_jrsn = '$kd_jrsn'");
      return $query_acc;
    }
    function update_danayangdiaccdetail_ukmukk($kd_ukmukk,$x){
      $query_acc = $this->db->query("UPDATE tb_detailuserukmukk SET danasisa = '$x' WHERE kd_ukmukk = '$kd_ukmukk'");
      return $query_acc;
    }
    // end acc belum ngirim laporan

    // ngambil data untuk pengajuan jurusan
    function tampil_data_dana_login($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE kd_jrsn = "'.$jurusan.'"');
		  return $query;
    }
    function tampil_data_dana_maupengajuan($jurusan){
      $query =$this->db->query('SELECT * FROM tb_pengajuan, fakultas WHERE tb_pengajuan.kd_fakultas = fakultas.kode_fakultas AND kd_jrsn = "'.$jurusan.'" ');
		  return $query;
    }
    function tampil_data_dana_maupengajuanukmukk($kd_ukmukk){
      $query =$this->db->query('SELECT * FROM tb_pengajuan_ukmukk WHERE kd_ukmkk = "'.$kd_ukmukk.'" ');
		  return $query;
    }
    function tampil_data_laporan_login($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_pengajuan WHERE kd_jrsn = "'.$jurusan.'"');
		  return $query;
    }
    function tampil_data_laporan_login_ukmukk($kd_ukmukk){
      $query =  $this->db->query('SELECT * FROM tb_pengajuan_ukmukk WHERE kd_ukmkk = "'.$kd_ukmukk.'"');
		  return $query;
    }
    // ngambil data untuk pengajuan ukmukk
    function tampil_data_dana_loginukm($kode_ukmukk){
      $query =  $this->db->query('SELECT * FROM tb_detailuserukmukk WHERE kd_ukmukk = "'.$kode_ukmukk.'" ');
		  return $query;
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

    function update_dana_awal($kd_jrsn,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer){
      $query_update_dana_awal =$this->db->query("UPDATE tb_detailuser SET tahunakademik = '$tahunakademik', danaawal = '$danaawal', danasisa = '$danasisa', nPengajuan = '$nPengajuan', statususer = '$statususer' WHERE kd_jrsn ='$kd_jrsn'");
  	// var_dump($kode_bidang);
  	// exit();
    return $query_update_dana_awal;
    }
    function update_dana_awal_ukmukk($kd_ukmukk,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer)
    {
      return $query_update_dana_awal =$this->db->query("UPDATE tb_detailuserukmukk SET tahunakademik = '$tahunakademik', danaawal = '$danaawal', danasisa = '$danasisa', nPengajuan = '$nPengajuan', statususer = '$statususer' WHERE kd_ukmukk ='$kd_ukmukk'");
    }

    
    function update_dana_awal1($kd_ukmukk,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer){
      $query_update_dana_awal =$this->db->query("UPDATE tb_detailuserukmukk SET tahunakademik = '$tahunakademik', danaawal = '$danaawal', danasisa = '$danasisa', nPengajuan = '$nPengajuan', statususer = '$statususer' WHERE kd_jrsn ='$kd_ukmukk'");
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
      $query_update_pengajuannya=$this->db->query("UPDATE tb_pengajuan SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$x', danaacc='$c' WHERE kd_jrsn ='$kd_jrsn' ");
      return $query_update_pengajuannya;
    }
    function pengajuandiaccupdatedb($kd_jrsn, $statususer6, $danaupdate, $nPengajuan6){
      return $query=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$danaupdate' WHERE kd_jrsn ='$kd_jrsn' ");
    }
    function pengajuandiaccupdatedbuser($kd_jrsn, $statususer6){
      return $query=$this->db->query("UPDATE user SET statususer='$statususer6' WHERE kode_himp= '$kd_jrsn' ");
    }
    function pengajuandiacc_ukmukk($kd_ukmkk, $statususer6, $x, $nPengajuan6,$c){
      $query_update_pengajuannya=$this->db->query("UPDATE tb_pengajuan_ukmukk SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$x', danaacc='$c' WHERE kd_ukmkk ='$kd_ukmkk' ");
      return $query_update_pengajuannya;
    }
    function pengajuandiaccupdatedb_ukmukk($kd_ukmkk, $statususer6, $danaupdate,$nPengajuan6){
      return $query=$this->db->query("UPDATE tb_detailuserukmukk SET statususer='$statususer6', nPengajuan='$nPengajuan6', danasisa='$danaupdate' WHERE kd_ukmukk ='$kd_ukmkk' ");
    }
    function pengajuandiaccupdatedbuser_ukmukk($kd_ukmkk, $statususer6){
      return $query=$this->db->query("UPDATE user SET statususer='$statususer6' WHERE kode_himp= '$kd_ukmkk' ");
    }
    // end pengajuan di acc

    // Pengajuan ditolak
    function pengajuantidakdiaccupdate($kd_jrsn, $statususer7){
      return $query = $this->db->query("UPDATE user SET statususer='$statususer7' WHERE kode_himp= '$kd_jrsn'");
    }
    function pengajuanditolaktbpengajuan($kd_jrsn, $statususer7){
      return $query = $this->db->query("UPDATE tb_pengajuan SET statususer='$statususer7' WHERE kode_himp= '$kd_jrsn'");
    }
    function alasantidakdiacc($kd_jrsn, $statususer7, $danasisa, $nPengajuan7,$pesangagal){
      return $query=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer7', nPengajuan='$nPengajuan7', pesangagal='$pesangagal', danasisa='$danasisa' WHERE kd_jrsn ='$kd_jrsn' ");
    }
    function pengajuanditolaktbdetailuser($kd_jrsn, $statususer7, $nPengajuan7){
      return $query=$this->db->query("UPDATE tb_detailuser SET statususer='$statususer7', nPengajuan='$nPengajuan7' WHERE kd_jrsn ='$kd_jrsn' ");
    }
    function pengajuantidakdiaccupdate_ukmukk($kd_ukmkk, $statususer7){
      return $query = $this->db->query("UPDATE user SET statususer='$statususer7' WHERE kode_himp= '$kd_ukmkk'");
    }
    function pengajuanditolaktbpengajuan_ukmukk($kd_ukmkk, $statususer7){
      return $query = $this->db->query("UPDATE tb_pengajuan_ukmukk SET statususer='$statususer7' WHERE kode_himp= '$kd_ukmkk'");
    }
    function alasantidakdiacc_ukmukk($kd_ukmkk, $statususer7, $danasisa, $nPengajuan7,$pesangagal){
      return $query=$this->db->query("UPDATE tb_detailuserukmukk SET statususer='$statususer7', nPengajuan='$nPengajuan7', pesangagal='$pesangagal', danasisa='$danasisa' WHERE kd_ukmukk ='$kd_ukmkk' ");
    }
    function pengajuanditolaktbdetailuser_ukmukk($kd_ukmkk, $statususer7, $nPengajuan7){
      return $query=$this->db->query("UPDATE tb_detailuserukmukk SET statususer='$statususer7', nPengajuan='$nPengajuan7' WHERE kd_ukmukk ='$kd_ukmkk' ");
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
    function tambah_pengajuan_ukmukk($datadana1){
      $this->db->insert('tb_pengajuan_ukmukk',$datadana1);
      return TRUE;
    }
    function pengajuanfile($kd_jrsn,$statususer){
      return $query=$this->db->query("UPDATE tb_detailuser set statususer='$statususer' WHERE kd_jrsn='$kd_jrsn'");
    }
    function pengajuanfileuser($kd_jrsn,$statususer){
      return $query=$this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_jrsn'");
    }
    function pengajuanfile_ukmukk($kd_ukmukk,$statususer){
      return $query=$this->db->query("UPDATE tb_detailuserukmukk set statususer='$statususer' WHERE kd_ukmukk='$kd_ukmukk'");
    }
    function pengajuanfileuser_ukmukk($kd_ukmukk,$statususer){
      return $query=$this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_ukmukk'");
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
    function update_laporan_ukmukk($kd_ukmkk, $statususer, $tgluploadlpj, $tglmakslaporan, $laporankegiatannya, $rincianbiayanya){
      $query = $this->db->query("UPDATE tb_pengajuan_ukmukk set statususer='$statususer', laporankegiatan='$laporankegiatannya', laporanrincianbiaya='$rincianbiayanya', tgluploadlpj='$tgluploadlpj', tglmakslaporan='$tglmakslaporan' WHERE kd_ukmkk='$kd_ukmkk'");
      return $query;
    }
    function update_laporandetail_ukmukk($kd_ukmkk, $statususer){
      return $query= $this->db->query("UPDATE tb_detailuserukmukk set statususer='$statususer' WHERE kd_ukmukk='$kd_ukmkk'");
    }
    function update_laporanuser_ukmukk($kd_ukmkk, $statususer){
      return $query = $this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_ukmkk'");
    }
    // end upload laporan
    // cek laporan kegiatan
    function tampil_list_lpjuniv(){
      $query =$this->db->query("SELECT * FROM tb_pengajuan WHERE kd_fakultas is null AND statususer=5 ORDER BY kd_jrsn");
      return $query;
    }
    function tampil_list_lpjjrsn(){
      $query =$this->db->query("SELECT * FROM tb_pengajuan, fakultas WHERE tb_pengajuan.kd_fakultas = fakultas.kode_fakultas AND statususer=5 ORDER BY kd_fakultas");
      return $query;
    }
    function tampil_list_lpjukmukk(){
      $query =$this->db->query("SELECT * FROM tb_pengajuan_ukmukk WHERE statususer=5 ORDER BY kd_ukmkk");
      return $query;
    }
    // untuk hapus satu baru tb_pengajuan
    function getDataByID($kd_jrsn){
      return $this->db->get_where('tb_pengajuan', array('kd_jrsn'=>$kd_jrsn));
    }
    function getDataByID_ukmukk($kd_ukmkk){
      return $this->db->get_where('tb_pengajuan_ukmukk', array('kd_ukmkk'=>$kd_ukmkk));
    }
    // update jumlah pengajuan saat laporan diterima
    function update_nPengajuan($statususer,$newnPengajuan,$kd_jrsn){
      return $query=$this->db->query("UPDATE tb_detailuser set statususer='$statususer', nPengajuan='$newnPengajuan' WHERE kd_jrsn='$kd_jrsn' ");
    }
    function update_nPengajuan_ukmukk($statususer,$newnPengajuan,$kd_ukmkk){
      return $query=$this->db->query("UPDATE tb_detailuser_ukmukk set statususer='$statususer', nPengajuan='$newnPengajuan' WHERE kd_ukmukk='$kd_ukmkk' ");
    }
    function update_nPengajuanuser($statususer,$kd_jrsn){
      return $query=$this->db->query("UPDATE user set statususer='$statususer' WHERE kode_himp='$kd_jrsn' ");
    }
    // untuk hapus semua file di tb_pengajuan
    public function hapusFile($kd_jrsn){
      $this->db->delete('tb_pengajuan', array('kd_jrsn' => $kd_jrsn));
    }
    public function hapusFile_ukmukk($kd_ukmkk){
      $this->db->delete('tb_pengajuan_ukmukk', array('kd_ukmkk' => $kd_ukmkk));
    }

    // UNTUK NOTIFIKASI
    // CEK PENGAJUAN (tb_detailuser, tb_detailuserukmukk)
      // P. UNIV
        // 
        function count_puniv(){
          $where="statususer='3'";
          $this->db->select('*');
          $this->db->from('tb_pengajuan');
          $this->db->where('kd_fakultas is NULL', NULL, TRUE);
          $this->db->where($where);
          $query=$this->db->count_all_results();
        }
      // P. FKLTS
        function count_pfklts(){
          $where="statususer='3'";
          $this->db->select('*');
          $this->db->from('tb_pengajuan');
          $this->db->where($where);
          $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
          $query = $this->db->count_all_results();
          }
      // P. UKMUKK
        function count_pukmukk(){
          $where="statususer='3'";
          $this->db->select('*');
          $this->db->from('tb_pengajuan_ukmukk');
          $this->db->where($where);
          $query=$this->db->count_all_results();
        }
    // CEK LAPORAN (tb_pengajuan, tb_pengajuan_ukmukk, kd_jrsn dan kd_ukmkk)
      // L. UNIV
        function count_luniv(){
          $where="statususer='5'";
          $this->db->select('*');
          $this->db->from('tb_pengajuan');
          $this->db->where('kd_fakultas is NULL', NULL, TRUE);
          $this->db->where($where);
          $query=$this->db->count_all_results();
        }
      // L. FKLTS
        function count_lfklts(){
          $where="statususer='5'";
          $this->db->select('*');
          $this->db->from('tb_pengajuan');
          $this->db->where('kd_fakultas is not NULL', NULL, FALSE);
          $this->db->where($where);
          $query=$this->db->count_all_results();
        }
      // L. UKMUKK
        function count_lukmukk(){
          $where="statususer='5'";
          $this->db->select('*');
          $this->db->from('tb_pengajuan_ukmukk');
          $this->db->where($where);
          $query=$this->db->count_all_results();
        } 
      // function reset akun
      function get_bidang_fakultas($id_sewa){
        return $this->db->get_where('nama_bidang', array('parent_himpunan'=>$id_sewa));
      }
      function hapus_anggota_fakultas($id_sewa){
        $this->db->delete('anggota_himpunan', array('parent_himpunan' => $id_sewa));
      }
      function hapus_bidang_fakultas($id_sewa){
        $this->db->delete('nama_bidang', array('parent_himpunan' => $id_sewa));
      }
      function hapus_proker_fakultas($id_sewa){
        $this->db->delete('daftar_kegiatan', array('parent_himpunan' => $id_sewa));
      }
      function do_reset_akun_fakultas_user($id_reset,$statususer){
        $query_update_user_awal =$this->db->query("UPDATE user SET statususer = '$statususer' WHERE kode_himp ='$id_reset'");
      }
      function do_reset_akun_fakultas_tbdetail($id_reset,$statususer,$tahunakademik,$dana_awal,$dana_sisa,$nPengajuan){
        $query_update_user_awal =$this->db->query("UPDATE tb_detailuser SET statususer = '$statususer', tahunakademik='$tahunakademik', danaawal='$dana_awal', danasisa='$dana_sisa', nPengajuan='$nPengajuan' WHERE kd_jrsn ='$id_reset'");
      }

      function get_bidang_ukmukk($id_sewa){
        return $this->db->get_where('bidang_ukmukk', array('parent_ukmukk'=>$id_sewa));
      }
      function hapus_anggota_ukmukk($id_sewa){
        $this->db->delete('anggota_ukmukk', array('parent_ukmukk' => $id_sewa));
      }
      function hapus_bidang_ukmukk($id_sewa){
        $this->db->delete('bidang_ukmukk', array('parent_ukmukk' => $id_sewa));
      }
      function hapus_proker_ukmukk($id_sewa){
        $this->db->delete('kegiatan_ukmukk', array('parent_ukmukk' => $id_sewa));
      }
      function do_reset_akun_ukmukk_user($id_reset,$statususer){
        $query_update_user_awal =$this->db->query("UPDATE user SET statususer = '$statususer' WHERE kode_himp ='$id_reset'");
      }
      function do_reset_akun_ukmukk_tbdetail($id_reset,$statususer,$tahunakademik,$dana_awal,$dana_sisa,$nPengajuan){
        $query_update_user_awal =$this->db->query("UPDATE tb_detailuserukmukk SET statususer = '$statususer', tahunakademik='$tahunakademik', danaawal='$dana_awal', danasisa='$dana_sisa', nPengajuan='$nPengajuan' WHERE kd_ukmukk ='$id_reset'");
      }
}
