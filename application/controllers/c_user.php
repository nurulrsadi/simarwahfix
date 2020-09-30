<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_user extends CI_Controller
{
function __construct(){
    parent::__construct();
    $this->load->model('M_data');
    $this->load->model('Model_View');
    $this->load->model('M_ormawa');
    if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
    }
        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url("login"));
        // }
}

public function index()
    {
    if($this->session->userdata('status') != "login"){
    redirect(base_url("c_home/login"));
    }else{
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    // $statususer = $this->session->userdata('statususer');
    $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
    if($cek -> num_rows() == 1){
    $sess_data['data_himpunan'] = "true";
    $this->session->set_userdata($sess_data);
    }else{
    $sess_data['data_himpunan'] = "false";
    $this->session->set_userdata($sess_data);
    }

    $ceksess = $this->session->userdata('data_himpunan');
    $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
    $data['anggota'] = $this->Model_View->tampil_all_anggota($kode_himp_sess);
    $data['datahimpunan'] = $this->Model_View->tampil_himpunan($kode_himp_sess);
    $data['bidangbidang'] = $this->Model_View->tampil_bidang($kode_himp_sess);

    
    $data['title'] = 'Edit Profile';
    $this->load->view('templates/header', $data);
    $this->load->view('user/index',$data);
    $this->load->view('templates/sidebaruser',$data);
    $this->load->view('templates/footer');
    }

}
    public function Pagu_Anggaran()
    { 
        if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
    }
        else{
          $kode_himp_sess = $this->session->userdata('kode_himp_sess');
          $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
          if($cek -> num_rows() == 1){
          $sess_data['data_himpunan'] = "true";
          $this->session->set_userdata($sess_data);
          }else{
          $sess_data['data_himpunan'] = "false";
          $this->session->set_userdata($sess_data);
          }
          
          $ceksess = $this->session->userdata('data_himpunan');
          // $data['anggota'] = $this->Model_View->tampil_all_anggota($kode_himp_sess);
            $data = array(
                'title' =>'Pagu Anggaran',
                'dana' => $this->M_dana->tampil_data_dana_login($kode_himp_sess),
                'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
            );
            $this->load->view('templates/header', $data);
            $this->load->view('user/pengajuanuang', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/footer', $data); 
          
        }
    }
    public function Verifikasi_Data()
    {
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
        }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
        if($cek -> num_rows() == 1){
        $sess_data['data_himpunan'] = "true";
        $this->session->set_userdata($sess_data);
        }else{
        $sess_data['data_himpunan'] = "false";
        $this->session->set_userdata($sess_data);
        }
    
        $ceksess = $this->session->userdata('data_himpunan');
        $data=array(
            'title' => 'Verifikasi Pencairan Dana',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
            'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/dicekadmindulu');
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
    }
  }
  public function Laporan_Kegiatan(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      if($cek -> num_rows() == 1){
      $sess_data['data_himpunan'] = "true";
      $this->session->set_userdata($sess_data);
      }else{
      $sess_data['data_himpunan'] = "false";
      $this->session->set_userdata($sess_data);
      }
  
      $ceksess = $this->session->userdata('data_himpunan');
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Laporan Kegiatan';
      $data['laporan']=$this->M_dana->tampil_data_laporan_login($kode_himp_sess);
      $this->load->view('templates/header',$data);
      $this->load->view('user/laporankegiatan',$data);
      $this->load->view('templates/sidebaruser',$data);
      $this->load->view('templates/footer');
    }
  }
  public function Verifikasi_Laporan(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      if($cek -> num_rows() == 1){
      $sess_data['data_himpunan'] = "true";
      $this->session->set_userdata($sess_data);
      }else{
      $sess_data['data_himpunan'] = "false";
      $this->session->set_userdata($sess_data);
      }
  
      $ceksess = $this->session->userdata('data_himpunan');
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Verifikasi Laporan Kegiatan';
      $data['laporan']=$this->M_dana->tampil_data_laporan_login($kode_himp_sess);
      $this->load->view('templates/header',$data);
      $this->load->view('user/diceklaporandulu',$data);
      $this->load->view('templates/sidebaruser',$data);
      $this->load->view('templates/footer');
    }
  }
  
    public function Pinjam_Aula()
    {if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      if($cek -> num_rows() == 1){
      $sess_data['data_himpunan'] = "true";
      $this->session->set_userdata($sess_data);
      }else{
      $sess_data['data_himpunan'] = "false";
      $this->session->set_userdata($sess_data);
      }
  
      $ceksess = $this->session->userdata('data_himpunan');
      $data=array(
        'title' => 'Peminjaman Aula SC',
        'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/pinjamaula');
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
      }
    }
    public function Guide_HMJ()
    {
      if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      if($cek -> num_rows() == 1){
      $sess_data['data_himpunan'] = "true";
      $this->session->set_userdata($sess_data);
      }else{
      $sess_data['data_himpunan'] = "false";
      $this->session->set_userdata($sess_data);
      }
  
      $ceksess = $this->session->userdata('data_himpunan');
        $data=array(
            'title' => 'Cara menggunakan Website SIMARWAH',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
            'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/userguide', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/footer');
    }
  }
    public function Keluhan()
    {     if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      if($cek -> num_rows() == 1){
      $sess_data['data_himpunan'] = "true";
      $this->session->set_userdata($sess_data);
      }else{
      $sess_data['data_himpunan'] = "false";
      $this->session->set_userdata($sess_data);
      }
  
      $ceksess = $this->session->userdata('data_himpunan');
        $data=array(
            'title' => 'Keluhan',
            'ormawa' => $this->M_ormawa->tampil_data_ormawa_login($kode_himp_sess),
            'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess), 
        );
        $data['title'] = 'Keluhan';
        $this->load->view('templates/header', $data);
        $this->load->view('user/keluhan', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/footer', $data);
    }
  }

    public function simpan_data_anggota(){
      $nim=$this->input->post('nim');
      $nama=$this->input->post('nama');
      $jenis_kelamin=$this->input->post('jenis_kelamin');
      $alamat=$this->input->post('alamat');
      $kontak=$this->input->post('kontak');
      $email=$this->input->post('email');
      $jabatan=$this->input->post('jabatan');
      $parent_himpunan=$this->input->post('parent_himpunan');
      $parent_bidang=$this->input->post('parent_bidang');
      $statususer=2;
      $datastatus = $this->Model_View->tambah_statususer($parent_himpunan,$statususer);
      $databarang = $this->Model_View->simpan_anggota_baru($nim,$nama,$jenis_kelamin,$alamat,$kontak,$email,$jabatan,$parent_himpunan,$parent_bidang);
   if($databarang){ // Jika sukses
    echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
   }else{ // Jika gagal
      echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
  }
  }

  public function update_data_anggota(){
      $nim=$this->input->post('nim');
      $nama=$this->input->post('nama');
      $jenis_kelamin=$this->input->post('jenis_kelamin');
      $alamat=$this->input->post('alamat');
      $kontak=$this->input->post('kontak');
      $email=$this->input->post('email');
      $jabatan=$this->input->post('jabatan');
      $parent_himpunan=$this->input->post('parent_himpunan');
      $parent_bidang=$this->input->post('parent_bidang');

        $databarang = $this->Model_View->update_anggota($nim,$nama,$jenis_kelamin,$alamat,$kontak,$email,$jabatan,$parent_himpunan,$parent_bidang);
       if($databarang){ // Jika sukses
               echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/index')."';</script>";
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/index')."';</script>";
  }

  }

  public function tambah_bidang()
  {
  $kode_bidang = $this->input->post('kode_bidang');
  $label_bidang = $this->input->post('label_bidang');
  $nama_bidang = $this->input->post('nama_bidang');
  $parent_himpunan = $this->input->post('parent_himpunan');
  $image = $this->input->post('image');
  // var_dump($image);
  // exit();
  if ($image=''){} else{
      $config['upload_path']='./assets/img/bidang';
      $config['allowed_types']='jpg|gif|png|jpeg';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('image')){
          echo "Gagal Menambahkan Bidang"; die();
      }else{
          $image=$this->upload->data('file_name');
      }

      $data =  array(
          'kode_bidang' => $kode_bidang,
          'label_bidang'=> $label_bidang,
          'desc_bidang' => $nama_bidang,
          'parent_himpunan' => $parent_himpunan,
          'image' => $image
      );
      // var_dump($data);
      // exit();
      $this->Model_View->tambah_bidang($data);
      redirect('c_user');
      // if($data){ // Jika sukses
      //      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
      // }else{ // Jika gagal
      //         echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
      //     }
  }
  }

  // public function update_jml_mhsaktif(){
  //     $kode_himp_sess = $this->session->userdata('kode_himp_sess');
  //     $jml_mhsaktif=$this->input->post('jml_mhsaktif');
  //     $data = $this->Model_View->update_jml_mhsaktif($jml_mhsaktif,$kode_himp_sess);
  //     $this->session->set_flashdata('msg','<div class="alert alert-success">Jumlah Mahasiswa Aktif Berhasil Diupdate</div>');
  //     redirect('c_user');
  // }

  public function update_data_bidang(){
  $kode_bidang = $this->input->post('kode_bidang');
  $label_bidang = $this->input->post('label_bidang');
  $nama_bidang = $this->input->post('nama_bidang');
  $parent_himpunan = $this->input->post('parent_himpunan');
  $image = $this->input->post('image'); 
  $imageold = $this->input->post('imageold'); 

      if ($image=''){} else{
      $config['upload_path']='./assets/img/bidang';
      $config['allowed_types']='jpg|gif|png|jpeg';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('image')){
          $image = $imageold;
      }else{
          $image=$this->upload->data('file_name');
      }
      $databidang = $this->Model_View->update_bidang($label_bidang,$nama_bidang,$kode_bidang,$parent_himpunan,$image);
      redirect('c_user');
  }
}

   public function delete_data_bidang(){
  $kode_bidang = $this->uri->segment(3);
  $this->Model_View->delete_bidang($kode_bidang);
  $this->session->set_flashdata('msg','<div class="alert alert-success">Anggota Himpunan Dihapus</div>');
  redirect('c_user');
  }

  public function delete_data_anggota(){
  $nim = $this->uri->segment(3);
  $this->Model_View->delete_anggota($nim);
  $this->session->set_flashdata('msg','<div class="alert alert-success">Anggota Himpunan Dihapus</div>');
  redirect('c_user');
  }

  public function simpan_visi_misi(){
  $kode_himp_sess = $this->session->userdata('kode_himp_sess');
  $visi=$this->input->post('visi');
  $misi=$this->input->post('misi');

  $data = $this->Model_View->update_visimisi($visi,$misi,$kode_himp_sess);
  $this->session->set_flashdata('msg','<div class="alert alert-success">Visi Misi Berhasil Diupdate</div>');
  // $this->session->set_flashdata('flashdatauser','Visi Misi anda berhasil diperbaharui!');
  redirect('c_user');
  }
    }
