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
    function tampil_list_user_dana(){
      $query =$this->db->query("SELECT * FROM tb_detailuser, fakultas WHERE tb_detailuser.kd_fklts = fakultas.kode_fakultas ORDER BY kd_fklts");
      return $query;
      // $this->db->query($query)->result();
      // $this->db->order_by('kd_fklts', 'ASC');
      // return $this->db->from('tb_detailuser')
      //     ->join('fakultas', 'fakultas.kode_fakultas=tb_detailuser.kd_fklts')
      //     ->get()
      //     ->result();
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
    // untuk user
    function update_pengajuan($kd_jrsn,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya,$nPengajuan6,$namaKegiatan,$statususer1){
      $query_update_surat_pengajuan =$this->db->query("UPDATE tb_detailuser SET suratpengajuan = '$suratpengajuannya', rinciankegiatan = '$rinciankegiatannya', rkakl = '$rkaklnya', tor = '$tornya', namaKegiatan = '$namaKegiatan', statususer='$statususer1', nPengajuan='$nPengajuan6' WHERE kd_jrsn ='$kd_jrsn'");
      return $query_update_surat_pengajuan;
    }

}
