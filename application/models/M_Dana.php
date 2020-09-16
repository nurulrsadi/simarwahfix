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
      $query =  $this->db->query('SELECT * FROM tb_detailuser ORDER BY kd_fklts ASC');
      return $query;
    }
    function tampil_data_dana_login($jurusan){
      $query =  $this->db->query('SELECT * FROM tb_detailuser WHERE kd_jrsn = "'.$jurusan.'"');
		return $query;
    }
    public function tampil_danaormawa()
    {
      // $this->db->select('*');
      // $this->db->from('jurusan');
      // $this->db->join('user', 'user.kode_himp= jurusan.kode_himpunan', 'left');
      // $this->db->join('fakultas', 'fakultas.kode_fakultas= jurusan.parent_fakultas', 'left');
      // $this->db->where('role', 0);


      

      // $query = $this->db->get ();
      // return $query->result ();
      // $query=$this->db->query("select");
      
      // $this->db->select('*');
      // $this->db->from('jurusan');
      // $this->db->join('user', 'user.kode_himp= jurusan.kode_himpunan', 'left');
      // $this->db->join('fakultas', 'fakultas.kode_fakultas= jurusan.parent_fakultas', 'left');
      // $this->db->where('role', 0 );
      // $this->db->set('kd_jrsn', $kode_himp);
      // $this->db->set('kd_fklts', $parent_fakultas);
      // $this->db->set('tahunakademik', 0);
      // $this->db->set('danaawal', 0);
      // $this->db->set('danasisa', 0);
      // $data = array(
      //   'kd_jrsn' =>  $kode_himp,
      //   'kd_fklts'  => $parent_fakultas,
      //   'tahunakademik'  => 0,
      //   'danaawal'  => 0,
      //   'danasisa'  => 0,
      // );

      // $this->db->replace('tb_detailuser', $data);
      // $this->db->insert('tb_detailuser');
      // return $query_insert = ("UPDATE tb_detailuser SET kd_jrsn = '$kode_himp',kd_fklts = '$parent_fakultas', danaawal = '', danaawal = '0' WHERE kondisi");
      // $query = $this->db->get ();
      // return $query->result ();
    
      

      // $this->db->order_by('kode_himp', 'ASC');

      // return $this->db->from('user')
      //     ->join('jurusan', 'jurusan.kode_himpunan=user.kode_himp')
      //     ->join('fakultas', 'fakultas.kode_fakultas = jurusan.kode_himp' )
      //     ->get()
      //     ->result();
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
    
    // public function kirimPengajuan()
    // {
    //     $data = array(
    //         'nama' => $this->input->post('nama', true),
    //         'fakultas' => $this->input->post('ht', true),
            
    //         'keterangan' => $this->input->post('keterangan', true),
    //         'status' => 0,
    //     );
    //     $this->db->insert('tb_pengajuandana', $data);
    //     $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
    //     <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Dikirim</div>');
    //     redirect('surat');
    // }
}
