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
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE statususer = "2"');
		  return $query;
      

      // // $this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas ORDER BY kd_fklts");
      // // $query = $this->db->query("SELECT * FROM tb_detailuser WHERE statususer=2 ");
      // // return $query;
      // return $this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE ('tb_detailuser.kd_fklts = fakultas.kode_fakultas' AND 'statususer = 2' )ORDER BY kd_fklts");
      // // $this->db->select('*');
      // $query = $this->db->get('tb_detailuser, fakultas');    
      // return $query;
    }
    
    function tampil_data_dana_login($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE kd_jrsn = "'.$jurusan.'"');
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
    function update_dana_awal($kd_jrsn,$tahunakademik,$danaawal,$danasisa,$nPengajuan){
      $query_update_dana_awal =$this->db->query("UPDATE tb_detailuser SET tahunakademik = '$tahunakademik', danaawal = '$danaawal', danasisa = '$danasisa', nPengajuan = '$nPengajuan' WHERE kd_jrsn ='$kd_jrsn'");
  	// var_dump($kode_bidang);
  	// exit();
    return $query_update_dana_awal;
    }
    function edit_accpengajuan($where,$table){		
      return $this->db->get_where($table,$where);
    }



    
    // untuk user
    function update_pengajuan($kd_jrsn,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya,$nPengajuan,$namaKegiatan,$statususer6){
      $query_update_surat_pengajuan =$this->db->query("UPDATE tb_detailuser SET suratpengajuan = '$suratpengajuannya', rinciankegiatan = '$rinciankegiatannya', rkakl = '$rkaklnya', tor = '$tornya', namaKegiatan = '$namaKegiatan', statususer='$statususer6', nPengajuan='$nPengajuan' WHERE kd_jrsn ='$kd_jrsn'");
      return $query_update_surat_pengajuan;
    }


}
