<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
{
    function __construct(){
        parent::__construct();	
        $this->load->model('Model_View');
        $this->load->model('M_data');
        if($this->session->userdata('status') != "login"){
          redirect(base_url("c_home/login"));
          
        }
	}
    public function index()
    {       
            $data['title'] = 'Dashboard';
            
            $this->load->view('templates/headeradm', $data);
            $this->load->view('templates/sidebaradm', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footeradm',$data);
        
    }
    public function Edit_Pagu()
    {
        
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Edit Pagu Anggaran',
            // 'getuser'=>$this->M_dana->tampil_getuser(),
            // 'getfakultas' =>$this->M_dana->tampil_getfakultas(),
            'userdana'=> $this->M_dana->tampil_list_user_dana(),
            'fak' => $this->Model_View->tampil_list_fakultas(),
            // $data['fak'] = $this->Model_View->tampil_list_fakultas();
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editpagu', $data);
        $this->load->view('templates/footeradm');
    }
    public function Data_Pagu()
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Data Pagu Anggaran',
            'getpengajuandana'=> $this->M_dana->tampil_pengajuandana()->result()
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datapagu', $data);
        $this->load->view('templates/footeradm');
    }
    public function Cek_Pagu()
    {
        $data=array(
          'tittle' => 'Cek Pengajuan',
          'getpengajuandana'=> $this->M_dana->tampil_pengajuandana()->result()
        );
        $data['title'] = 'Cek Pengajuan';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cekpagu', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan()
    {
         
        $data['title'] = 'Cek Laporan Kegiatan';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footeradm');
    }
    public function Cek_Surat()
    {
         
        $data['title'] = 'Cek Surat Izin';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/suratizin', $data);
        $this->load->view('templates/footeradm');
    }
    public function Data_Pinjam()
    {
         
        $data['title'] = 'Data Peminjaman';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datapinjam', $data);
        $this->load->view('templates/footeradm');
    }
    public function Data_Ormawa()
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Tambah Pengguna',
            'getalluser'=>$this->M_data->tampil_ormawa()->result()
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataormawa', $data);
        $this->load->view('templates/footeradm');
    }
    
    public function tambahUser(){
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Tambah ORMAWA',
            'subtitle' => 'Tambah ORMAWA',
            // 'fakultas' => $this-> _fakultas(),
            // 'role' => $this-> _role(),
            'getalluser'=>$this->M_data->tampil_ormawa()->result()
            // 'jumlah_surat' => $this->_jumlah_surat()
        );
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required|trim|numeric');
    if ($this->form_validation->run() == false) {
    $this->load->view('templates/headeradm', $data);
    $this->load->view('templates/sidebaradm', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/tambahOrmawa', $data);
    $this->load->view('templates/footeradm');
    }
    else
    $this->c_admin->tambahUser();
    }
    
    

    public function Keluhan()
    {
        $data['title'] = 'Keluhan';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/keluhan', $data);
        $this->load->view('templates/footeradm');
    }
    public function Edit_Profil()
    {
        $data['title'] = 'Edit Profil';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editprofil', $data);
        $this->load->view('templates/footeradm');
    }
    public function Profil()
    {
    
        $data['title'] = 'Profil Admin';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('templates/footeradm');
    }
    public function Password()
    {
        
        $data['title'] = 'Edit Password';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editpass', $data);
        $this->load->view('templates/footeradm');
    }
    public function Cek_Data_Pengajuan(){
        $data['title'] = 'Cek Data';
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cekdatapagu', $data);
        $this->load->view('templates/footeradm');
    }

    // private function _fakultas()
    // {
    //     return $this->db->get('tb_fakultas')->result();
    // }
    // private function _role()
    // {
    //     return $this->db->get('tb_role')->result();
    // }
    // public function _jumlah_surat()
    // {
    //     return $this->db->count_all('tb_surat');
    // }
    public function update_dana_awal(){
        $kd_jrsn = $this->input->post('kd_jrsn');
        $tahunakademik = $this->input->post('tahunakademik',true);
        $danaawal = $this->input->post('danaawal', true);
        $nPengajuan = 0;
        $danasisa = $this->input->post('danaawal', true);

      $uangawal = $this->M_dana->update_dana_awal($kd_jrsn,$tahunakademik,$danaawal,$danasisa,$nPengajuan);
      redirect('c_admin/Edit_Pagu');
      // $tahunakademik = $this->input->post('tahunakademik');
      // $dana_awal=$this->input->post('tahunakademik');
      // $statususer=$this->input->post('statususer');
    }
    
    // function edit_data_pengajuan($id_user){
		// 	$where = array('id_user' => $id_user);
		// 	$data['reservasi'] = $this->M_sewa->edit_data($where,'reservasi')->result();
		// 	$this->load->view('edit_reservasi',$data);
    // }
      public function data_fakultas(){
      $data['title'] = 'Data Fakultas';
      $data['fakultas'] = $this->Model_View->tampil_list_fakultas();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/fakultas', $data);
      $this->load->view('templates/footeradm');
  }

  public function data_himpunan(){
      $data['title'] = 'Data Himpunan';
      $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
      $data['fak'] = $this->Model_View->tampil_list_fakultas();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/himpunan', $data);
      $this->load->view('templates/footeradm');
  }

   public function data_user_himpunan(){
      $data['title'] = 'Data User Himpunan';
      $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
      // $data['fak'] = $this->Model_View->tampil_list_fakultas();
      $data['users'] = $this->Model_View->tampil_user_himpunan();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/userhimpunan', $data);
      $this->load->view('templates/footeradm');
  }



  public function tambah_data_fakultas(){
      $kode_fakultas = $this->input->post('kode_fakultas');
      $nama_fakultas = $this->input->post('nama_fakultas');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');

      $data =  array(
          'kode_fakultas' => $kode_fakultas,
          'nama_fakultas'=> $nama_fakultas,
          'deskripsi' => $deskripsi,
          'visi' => $visi,
          'misi' => $misi
      );

      $this->Model_View->tambah_fakultas($data);
      redirect('c_admin/data_fakultas');
  }

   public function edit_data_fakultas(){
      $kode_fakultas = $this->input->post('kode_fakultas');
      $nama_fakultas = $this->input->post('nama_fakultas');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');
      $this->Model_View->update_fakultas($kode_fakultas,$nama_fakultas,$deskripsi,$visi,$misi);
      redirect('c_admin/data_fakultas');
  }


  public function delete_data_fakultas(){
  $kode_fakultas = $this->uri->segment(3);
  $this->Model_View->delete_fakultas($kode_fakultas);
  $this->session->set_flashdata('msg','<div class="alert alert-success">Anggota Himpunan Dihapus</div>');
  redirect('c_admin/data_fakultas');
  }


  public function tambah_data_himpunan(){
      $kode_himpunan = $this->input->post('kode_himpunan');
      $nama_himpunan = $this->input->post('nama_himpunan');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');
      $parent_fakultas = $this->input->post('parent_fakultas');
      $image = $this->input->post('image');


      if ($image=''){} else{
      $config['upload_path']='./assets/img/jurusan';
      $config['allowed_types']='jpg|gif|png|jpeg';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('image')){
          echo "Gagal Menambahkan Himpunan"; die();
      }else{
          $image=$this->upload->data('file_name');
      }

      if($parent_fakultas == ''){
           $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          'visi' => $visi,
          'misi' => $misi,
          'image' => $image,
      );
      $datadana = array(
          // 'kd_jrsn' => $kode_himpunan,
          'kd_jrsn'=> $kode_himpunan,
          'kd_fklts' => $parent_fakultas,
          'tahunakademik' => 0,
          'danaawal' => 0,
          'danasisa' =>0,
          'nPengajuan' =>0
      );
       }else{
           $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          'visi' => $visi,
          'misi' => $misi,
          'parent_fakultas' => $parent_fakultas,
          'image' => $image
      );
      $datadana = array(
        // 'kd_jrsn' => $kode_himpunan,
        'kd_jrsn'=> $kode_himpunan,
        'kd_fklts' => $parent_fakultas,
        'tahunakademik' => 0,
        'danaawal' => 0,
        'danasisa' =>0,
        'nPengajuan' =>0
    );
       }
      $this->M_dana->tambah_datauser($datadana);
      $this->Model_View->tambah_himpunan($data);
      redirect('c_admin/data_himpunan');
  }
}

public function edit_data_himpunan(){
      $kode_himpunan = $this->input->post('kode_himpunan');
      $nama_himpunan = $this->input->post('nama_himpunan');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');
      $parent_fakultas = $this->input->post('parent_fakultas');
      $image = $this->input->post('image');
      $imageold = $this->input->post('imageold');  

      if ($image=''){}else{
      $config['upload_path']='./assets/img/jurusan';
      $config['allowed_types']='jpg|gif|png|jpeg';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('image')){
          $image=$imageold;
      }else{
          $image=$this->upload->data('file_name');
      }
      $this->Model_View->edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$image);
      redirect('c_admin/data_himpunan');
  }
}

 public function delete_data_himpunan(){
  $kode_himpunan = $this->uri->segment(3);
  $this->Model_View->delete_himpunan($kode_himpunan);
  $this->session->set_flashdata('msg','<div class="alert alert-success">Data Himpunan Dihapus</div>');
  redirect('c_admin/data_himpunan');
  }

  public function tambah_data_user() {
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = 0;
      $is_active = 1;
      $kd_himp = $this->input->post('kode_himp');
      

      $data = array(
          'nama' => $nama,
          'email' => $email,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kd_himp,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
      );
      $this->Model_View->tambah_user_himpunan($data);
      redirect('c_admin/data_user_himpunan');
  }

  public function delete_data_user(){
      $id_user = $this->uri->segment(3);
      $this->Model_View->delete_user_himpunan($id_user);
      $this->session->set_flashdata('msg','<div class="alert alert-success">Data User Himpunan Dihapus</div>');
      redirect('c_admin/data_user_himpunan');
  }

  public function edit_user_himpunan(){
      $id_user = $this->input->post('id_user');
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = 0;
      $is_active = 1;
      $kd_himp = $this->input->post('kode_himp');

      $this->Model_View->edit_user_himpunan($id_user,$nama,$email,$username,md5($password));
      redirect('c_admin/data_user_himpunan');
  }
}
