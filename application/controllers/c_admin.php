<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
{
    function __construct(){
        parent::__construct();	
        $this->load->model('Model_View');
        $this->load->model('M_data');
        // $this->load->model('M_data');
        if($this->session->userdata('status') != "login"){
          redirect(base_url("c_home/login"));
          
        }
	}
    public function index()
    {       
            $data['title'] = 'Dashboard';
            $data['totalFklts'] = $this->M_ormawa->getTotalAnggotafak();
            $data['sumAktifFklts'] = $this->M_ormawa->getAnggotaAktiffak();
            $data['sumAktifukmukk'] = $this->M_ormawa->getAnggotaAktifUKMUKK();
            
            $data['count_puniv']= $this->M_dana->count_puniv();
            $data['count_pfklst']= $this->M_dana->count_pfklts();
            $data['count_pukmukk']= $this->M_dana->count_pukmukk();
            // $data['count_puniv']= $this->M_dana->count_puniv();
            // $data['count_puniv']= $this->M_dana->count_puniv();
            // $data['count_puniv']= $this->M_dana->count_puniv();
            $this->load->view('templates/headeradm', $data);
            $this->load->view('templates/sidebaradm', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footeradm',$data);
        
    }
    public function Edit_Pagu_Fakultas()
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
      
      public function Edit_Pagu_UKMUKK()
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Edit Pagu Anggaran UKM UKK',
            'userdanaukmukk'=> $this->M_dana->tampil_list_user_dana_ormawa(),
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editpaguukmukk', $data);
        $this->load->view('templates/footeradm');
      }
      public function Edit_Pagu_Universitas(){
        $data = array(
          'title' => 'Edit Pagu Anggaran',
          // 'getuser'=>$this->M_dana->tampil_getuser(),
          // 'getfakultas' =>$this->M_dana->tampil_getfakultas(),
          'userdanauniv'=> $this->M_dana->tampil_list_user_danauniv(),
          'fak' => $this->Model_View->tampil_list_fakultas(),
          // $data['fak'] = $this->Model_View->tampil_list_fakultas();
      );
            $this->load->view('templates/headeradm', $data);
            $this->load->view('templates/sidebaradm', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editpaguuniv', $data);
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
    public function Cek_Pengajuan_Universitas()
    {
        $data=array(
          'title' => 'Cek Pengajuan ORMAWA Tingkat Universitas',
          'datapengaju_univ' => $this->M_dana->tampil_list_user_pengajuan_univ(),
          // 'getpengajuandana'=> $this->M_dana->tampil_pengajuandana()->result()
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cekpaguuniv', $data);
        $this->load->view('templates/footeradm');
    }
    public function Cek_Pengajuan_Fakultas()
    {
        $data=array(
          'title' => 'Cek Pengajuan ORMAWA Tingkat Fakultas',
          'datapengaju' => $this->M_dana->tampil_list_user_pengajuan(),
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cekpagu', $data);
        $this->load->view('templates/footeradm');
    }
    public function Cek_Pengajuan_UKMUKK()
    {
        $data=array(
          'title' => 'Cek Pengajuan ORMAWA Tingkat UKM UKK',
          'datapengajuukm' => $this->M_dana->tampil_list_user_pengajuanukm(),
        );
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cekpaguukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan_Universitas()
    {
         
        $data['title'] = 'Cek Laporan Kegiatan';
        $data['lpjuniv'] = $this->M_dana->tampil_list_lpjuniv();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanuniv', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan_Fakultas()
    {
         
        $data['title'] = 'Cek Laporan Kegiatan';
        $data['lpjjrsn'] = $this->M_dana->tampil_list_lpjjrsn();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan_UKMUKK()
    {
         
        $data['title'] = 'Cek Laporan Kegiatan';
        $data['lpjukmukk'] = $this->M_dana->tampil_list_lpjukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    public function List_Pengajuan_Universitas(){
      $data['title'] = 'List Pengajuan Berhasil';
      $data['datauserbelumuniv'] = $this->M_dana->tampil_list_user_laporanbelumdikirimuniv();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengajuanberhasiluniv', $data);
        $this->load->view('templates/footeradm');
    }
    public function List_Pengajuan_Fakultas(){
      $data['title'] = 'List Pengajuan Berhasil';
      $data['datauserbelum'] = $this->M_dana->tampil_list_user_laporanbelumdikirim();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengajuanberhasil', $data);
        $this->load->view('templates/footeradm');
    }
    public function List_Pengajuan_UKMUKK(){
      $data['title'] = 'List Pengajuan Berhasil';
      $data['datauserbelum_ukmukk'] = $this->M_dana->tampil_list_user_laporanbelumdikirim_ukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengajuanberhasil', $data);
        $this->load->view('templates/footeradm');
    }
    // function Cek_Data_Pengajuan/Tidak_ACC(){

    // }
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
        

    public function Keluhan()
    {
        $data['title'] = 'Keluhan';
        $data['userkeluhan']=$this->M_ormawa->tampil_keluhan();
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
    function Cek_Data_Pengajuan($kd_jrsn){
      // $cek = $this->Model_View->cek_datahimp($kd_jrsn);
      // $where = array('kd_jrsn' => $kd_jrsn);
      // $data['datadana'] = $this->M_dana->edit_accpengajuan($where,'tb_detailuser')->result();
      $data['dataacc'] = $this->M_dana->tampil_data_dana_maupengajuan($kd_jrsn);
      // $this->load->view('v_edit',$data);
      $data['title'] = 'Cek Data';
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/cekdatapagu', $data);
      $this->load->view('templates/footeradm');
    }
    function Cek_Data_Pengajuan_UKMUKK($kd_ukmukk){
      $data['dataacc'] = $this->M_dana->tampil_data_dana_maupengajuanukmukk($kd_ukmukk);
      $data['title'] = 'Cek Data';
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/cekdatapagu', $data);
      $this->load->view('templates/footeradm');
    }

    public function update_dana_awal(){
        $kd_jrsn = $this->input->post('kd_jrsn');
        $tahunakademik = $this->input->post('tahunakademik',true);
        $danaawal = $this->input->post('danaawal', true);
        $nPengajuan = 1;
        $statususer = 1;
        $danasisa = $this->input->post('danaawal', true);

      $uangawal = $this->M_dana->update_dana_awal($kd_jrsn,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer);
      $updateusernya = $this->M_dana->update_user_awal($kd_jrsn, $statususer);
      $this->session->set_flashdata('flashdana', 'Dana Ormawa berhasil diupdate');
      redirect('c_admin/Edit_Pagu_Fakultas');
    }
    public function update_dana_awal_univ(){
      $kd_jrsn = $this->input->post('kd_jrsn');
      $tahunakademik = $this->input->post('tahunakademik',true);
      $danaawal = $this->input->post('danaawal', true);
      $nPengajuan = 1;
      $statususer = 1;
      $danasisa = $this->input->post('danaawal', true);

    $uangawal = $this->M_dana->update_dana_awal($kd_jrsn,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer);
    $updateusernya = $this->M_dana->update_user_awal($kd_jrsn, $statususer);
    $this->session->set_flashdata('flashdana', 'Dana Ormawa berhasil diupdate');
    redirect('c_admin/Edit_Pagu_Universitas');
  }
    public function update_dana_awal_ormawa(){
      $kd_ukmukk = $this->input->post('kd_ukmukk');
      $tahunakademik = $this->input->post('tahunakademik',true);
      $danaawal = $this->input->post('danaawal', true);
      $nPengajuan = 1;
      $statususer = 1;
      $danasisa = $this->input->post('danaawal', true);

    $uangawal = $this->M_dana->update_dana_awal_ukmukk($kd_ukmukk,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer);
    $updateusernya = $this->M_dana->update_user_awal1($kd_ukmukk, $statususer);
    $this->session->set_flashdata('flashdana', 'Dana Ormawa berhasil diupdate');
    redirect('c_admin/Edit_Pagu_UKMUKK');
  }
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
      $datafakultas=array(
        'kode_namafakultas' => $kode_fakultas,
        'nama_fakultas'=> $nama_fakultas
      );
      // $fakultasdata=array(
      //   'kd_fakultas' => $kode_fakultas,
      //   'nama_fakultas' => $nama_fakultas
      // );

      $this->Model_View->tambah_fakultas($data,$datafakultas);
      // $this->M_ormawa->tambah_fakultas($fakultasdata);
      $this->session->set_flashdata('flashormawa','Data Ormawa berhasil ditambahkan!');
      redirect('c_admin/data_fakultas');
  }

   public function edit_data_fakultas(){
      $kode_fakultas = $this->input->post('kode_fakultas');
      $nama_fakultas = $this->input->post('nama_fakultas');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');
      // $this->M_dana->edit_namafakultas($kode_fakultas, $nama_fakultas);
      $this->M_ormawa->update_fakultas($kode_fakultas, $nama_fakultas);
      $this->Model_View->update_fakultas($kode_fakultas,$nama_fakultas,$deskripsi,$visi,$misi);
      $this->session->set_flashdata('flashormawa','Data Ormawa berhasil diperbaharui!');
      redirect('c_admin/data_fakultas');
  }


  public function delete_data_fakultas(){
  $kode_fakultas = $this->uri->segment(3);
  $this->Model_View->delete_fakultas($kode_fakultas);
  // $this->M_dana->delete_namafakultas($kode_himpunan);
  $this->M_ormawa->delete_fakultas($kode_fakultas);
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
          'kd_jrsn'=> $kode_himpunan,
      );
      }
      else{
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
        'kd_jrsn'=> $kode_himpunan,
        'kd_fklts' => $parent_fakultas,
    );
       }
      // $this->M_dana->tambah_datauser($datadana);
      $this->Model_View->tambah_himpunan($data,$datadana);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil ditambahkan!');
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
      // $this->M_dana->edit_datauser($kode_himpunan,$parent_fakultas);
      $this->Model_View->edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$image);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil diperbaharui!');
      redirect('c_admin/data_himpunan');
  }
}

  public function delete_data_himpunan(){
  $kode_himpunan = $this->uri->segment(3);
  $this->Model_View->delete_himpunan($kode_himpunan);
  $this->M_dana->delete_datauser($kode_himpunan);
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
      $statususer=1;
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
          'statususer' => $statususer,
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
  // 
  public function tolak_pengajuan(){
    $kd_jrsn=$this->input->post('kd_jrsn');
    $pesangagal=$this->input->post('pesangagal');
    $statususer7=2;
    $nPengajuan=$this->input->post('nPengajuan');
    $danasisa =$this->input->post('danasisa', true);
    if($data['nPengajuan'] = 1 )
    {
      $pengajuan1 = $data['nPengajuan'];
      $nPengajuan7 = $pengajuan1; 
    } else if ($data['nPengajuan'] = 2 )
    {
      $pengajuan2 = $data['nPengajuan']-$data['a'];
      $nPengajuan7 = $pengajuan2; 
    } else if ($data['nPengajuan'] = 3 )
    {
      $pengajuan3 = $data['nPengajuan']-$data['a'];
      $nPengajuan7 = $pengajuan3; 
    } else {
      $data['b'] = 1;
      $pengajuan4 = $data['b'];
      $nPengajuan7 = $pengajuan4;
    }
    $this->M_dana->pengajuantidakdiaccupdate($kd_jrsn, $statususer7);
    $this->M_dana->pengajuantidakdiaccdetil($kd_jrsn,$statususer7, $danasisa,$nPengajuan7,$pesangagal);
    redirect('c_admin/Cek_Pengajuan_Fakultas');
  }
  function update_danaacc_univ(){
    $kd_jrsn=$this->input->post('kd_jrsn');
    $danaawal=$this->input->post('danaawal');
    $danasisa=$this->input->post('danasisa');
    $a=$danaawal;
    $b=$danasisa;
    $x=$a-$b;
    $danaacc=$b;
    $this->M_dana->update_danayangdiacc($kd_jrsn,$x,$danaacc);
    $this->M_dana->update_danayangdiaccdetail($kd_jrsn,$x);
    $this->session->set_flashdata('flashdana','Dana ACC Ormawa telah diperbaharui');
    redirect('c_admin/List_Pengajuan_Universitas');
  }
  function update_danaacc(){
    $kd_jrsn=$this->input->post('kd_jrsn');
    $danaawal=$this->input->post('danaawal');
    $danasisa=$this->input->post('danasisa');
    $a=$danaawal;
    $b=$danasisa;
    $x=$a-$b;
    $danaacc=$b;
    $this->M_dana->update_danayangdiacc($kd_jrsn,$x,$danaacc);
    $this->M_dana->update_danayangdiaccdetail($kd_jrsn,$x);
    $this->session->set_flashdata('flashdana','Dana ACC Ormawa telah diperbaharui');
    redirect('c_admin/List_Pengajuan_Fakultas');
  }
  function update_danaacc_ukmukk(){
    $kd_ukmukk=$this->input->post('kd_ukmkk');
    $danaawal=$this->input->post('danaawal');
    $danasisa=$this->input->post('danasisa');
    $a=$danaawal;
    $b=$danasisa;
    $x=$a-$b;
    $danaacc=$b;
    $this->M_dana->update_danayangdiacc_ukmukk($kd_ukmukk,$x,$danaacc);
    $this->M_dana->update_danayangdiaccdetail_ukmukk($kd_ukmukk,$x);
    $this->session->set_flashdata('flashdana','Dana ACC Ormawa telah diperbaharui');
    redirect('c_admin/List_Pengajuan_UKMUKK');
  }
  public function data_ukmukk(){
        $data['title'] = 'Data UKM/UKK';
        $data['ukmukk'] = $this->Model_View->tampil_list_ukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    public function data_userukmukk(){
        $data['title'] = 'Data User UKM/UKK';
        $data['ukmukk'] = $this->Model_View->tampil_list_ukmukk();
        $data['userukmukk'] = $this->Model_View->tampil_user_ukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_ukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    public function tambahdata_ukmukk(){
        $kode_ukmukk = $this->input->post('kode_ukmukk');
        $nama_ukmukk = $this->input->post('nama_ukmukk');
        $desc_ukmukk = $this->input->post('desc_ukmukk');
        $visi_ukmukk = $this->input->post('visi_ukmukk');
        $misi_ukmukk = $this->input->post('misi_ukmukk');
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

        $data =  array(
            'kode_ukmukk' => $kode_ukmukk,
            'nama_ukmukk'=> $nama_ukmukk,
            'desc_ukmukk' => $desc_ukmukk,
            'visi_ukmukk' => $visi_ukmukk,
            'misi_ukmukk' => $misi_ukmukk,
            'image' => $image
        );
        $datadana=array(
          'kd_ukmukk' => $kode_ukmukk,
          'nama_ukmukk' => $nama_ukmukk
        );
        $this->Model_View->tambah_ukmukk($data,$datadana);
        redirect('c_admin/data_ukmukk');
    }
    }

    public function editdata_ukmukk(){
        $kode_ukmukk = $this->input->post('kode_ukmukk');
        $nama_ukmukk = $this->input->post('nama_ukmukk');
        $desc_ukmukk = $this->input->post('desc_ukmukk');
        $visi_ukmukk = $this->input->post('visi_ukmukk');
        $misi_ukmukk = $this->input->post('misi_ukmukk');
        $image = $this->input->post('image');
        $this->Model_View->update_ukmukk($kode_ukmukk,$nama_ukmukk,$desc_ukmukk,$visi_ukmukk,$misi_ukmukk,$image);
        redirect('c_admin/data_ukmukk');
    }

    public function delete_data_ukmukk(){
    $kode_ukmukk = $this->uri->segment(3);
    $this->Model_View->delete_ukmukk($kode_ukmukk);
    $this->M_dana->delete_datauserukmukk($kode_ukmukk);
    $this->session->set_flashdata('msg','<div class="alert alert-success">Data Himpunan Dihapus</div>');
    redirect('c_admin/data_ukmukk');
    }

    public function tambah_user_ukmukk() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $kode_himp=$this->input->post('kode_himp');
        $role = 2;
        $is_active = 1;
        $statususer=1;
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => md5($password),
            'role' => $role,
            'kode_himp'=>$kode_himp,
            'is_active' => $is_active,
            'statususer' =>$statususer,
            'insert_date' => date('Y-m-d H:i:s'),
        );
        $this->Model_View->tambah_userukmukk($data);
        redirect('c_admin/data_userukmukk');
    }
    public function edit_user_ukmukk(){
      $id_user = $this->input->post('id_user');
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = 0;
      $is_active = 1;
      $kd_himp = $this->input->post('kode_himp');

      $this->Model_View->edit_ukmuser($id_user,$nama,$email,$username,md5($password));
      redirect('c_admin/data_userukmukk');
  }
  public function delete_data_userukmukk(){
      $id_user = $this->uri->segment(3);
      $this->Model_View->delete_user_ukmukk($id_user);
      $this->session->set_flashdata('msg','<div class="alert alert-success">Data User UKM/UKK Dihapus</div>');
      redirect('c_admin/data_userukmukk');
  }
   



  

}