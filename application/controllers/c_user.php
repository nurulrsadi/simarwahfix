<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\CssConverter;
class c_user extends CI_Controller
{
function __construct(){
    parent::__construct();
    $this->load->helper('tanggal_indo');
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
    }
    if($this->session->userdata('role')==1 ){
      redirect(base_url("c_admin/index"));
    }
    $kode_himp_sess=$this->session->userdata('kode_himp_sess');
}
    public function Cetak_Sewa_Aula($id_sewa){
      $penyewa=$this->uri->segment(5);
      
      if (isset($_POST['test'])) {
        echo '<pre>';
        echo htmlentities(print_r($_POST, true));
        echo '</pre>';
        exit;
    }
    
    try {
        ob_start();
        $data['detail_sewa']=$this->M_ormawa->get_detail_sewa_surat($id_sewa);
        $this->load->view('user/Print_Sewa_Aula',$data);
        $html = ob_get_contents();
        $content = ob_get_clean();
      
        $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', array(5, 5,5, 5));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->writeHTML($content);
        $html2pdf->output('forms.pdf');
    }   catch (Html2PdfException $e) {
        $html2pdf->clean();
    
        $formatter = new ExceptionFormatter($e);
        echo $formatter->getHtmlMessage();
    }
    
    }
    public function index()
    {
    if($this->session->userdata('status') != "login"){
    redirect(base_url("c_home/login"));
    }else{
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
    $data['anggota'] = $this->Model_View->tampil_all_anggota($kode_himp_sess);
    $data['datahimpunan'] = $this->Model_View->tampil_himpunan($kode_himp_sess);
    $data['bidangbidang'] = $this->Model_View->tampil_bidang($kode_himp_sess);
    $data['dataukmukk'] = $this->Model_View->tampil_ukmukk($kode_himp_sess);
    $data['bidang_ukmukk'] = $this->Model_View->tampil_bidang_ukmukk($kode_himp_sess);
    $data['anggota_ukmukk'] = $this->Model_View->tampil_anggota_ukmukk($kode_himp_sess);
    
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
          // $data['datauser'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
          $kode_himp_sess = $this->session->userdata('kode_himp_sess');
          $data = array(
              'title' =>'Pagu Anggaran',
              'dana' => $this->M_dana->tampil_data_dana_login($kode_himp_sess),
              'danauniv' => $this->M_dana->tampil_data_dana_univ($kode_himp_sess),
              'danaukmukk' => $this->M_dana->tampil_data_dana_loginukm($kode_himp_sess),
              'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
              'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(),
              'msg'=>$this->session->flashdata('msg'),
          );
          if($data['user']['statususer']==2||$data['user']['statususer']==11){
          $this->load->view('templates/header', $data);
          $this->load->view('user/pengajuanuang', $data);
          $this->load->view('templates/sidebaruser', $data);
          $this->load->view('templates/footer', $data); 
          }else{
            redirect(base_url("c_user"));
          }
        }
    }
    public function Verifikasi_Data()
    {
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
        }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data=array(
            'title' => 'Verifikasi Pencairan Dana',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
            'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
        );
        if($data['user']['statususer']==3){
        $this->load->view('templates/header', $data);
        $this->load->view('user/dicekadmindulu',$data);
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
      }else{
        redirect(base_url("c_user"));
      }
    }
  }
  public function Laporan_Kegiatan(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Laporan Kegiatan';
      $data['laporan']=$this->M_dana->tampil_data_laporan_login($kode_himp_sess);
      $data['laporan_ukmukk']=$this->M_dana->tampil_data_laporan_login_ukmukk($kode_himp_sess);
      $data['user'] =  $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      if($data['user']['statususer']==4){
        $this->load->view('templates/header',$data);
        $this->load->view('user/laporankegiatan',$data);
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
      }else{
        redirect(base_url("c_user/index"));
      }
    }
  }
  public function Verifikasi_Laporan(){
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Verifikasi Laporan Kegiatan';
      $data['laporan']=$this->M_dana->tampil_data_laporan_login($kode_himp_sess);
      $data['user']= $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      if($data['user']['statususer']==5){
      $this->load->view('templates/header',$data);
      $this->load->view('user/diceklaporandulu',$data);
      $this->load->view('templates/sidebaruser',$data);
      $this->load->view('templates/footer');
      }else{
        redirect(base_url("c_user"));
      }
    }
  }
  public function Program_Kerja()
    {
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
      }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
        $data['title'] = 'Daftar Kegiatan';
        $data['proker'] = $this->Model_View->tampil_kegiatan_himp($kode_himp_sess);
        $data['uproker'] = $this->Model_View->tampil_ukegiatan($kode_himp_sess);
        $this->load->view('templates/header', $data);
        $this->load->view('user/programkerja', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/footer');
      }

    }
   public function Prestasi_organisasi()
    {
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
      }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
        $data['title'] = 'Prestasi Organisasi';
        $data['prestasi'] = $this->Model_View->tampil_prestasi_himpunan($kode_himp_sess);
        $data['uprestasi'] = $this->Model_View->tampil_prestasi_ukmukk($kode_himp_sess);
        $this->load->view('templates/header', $data);
        $this->load->view('user/prestasi', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/footer');
      }
    }
  public function Data_Anggota()
  {
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
    }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Data Anggota';
      $data['list_anggota'] = $this->Model_View->tampil_list_anggota_himpunan($kode_himp_sess);
      $data['ulist_anggota'] = $this->Model_View->tampil_list_anggota_ukmukk($kode_himp_sess);
      $this->load->view('templates/header', $data);
      $this->load->view('user/dataanggota', $data);
      $this->load->view('templates/sidebaruser', $data);
      $this->load->view('templates/footer');
    }
  }
  public function Riwayat_Pengajuan($kode_himp_sess)
  {
    if($this->session->userdata('status') != "login")
    {
      redirect(base_url("c_home/login"));
    }else
      {
        $kode_himp=$this->session->userdata('kode_himp_sess');
        $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
        $data['title'] = 'Riwayat Pengajuan Anggaran Dana '.$kode_himp_sess;
        $data['fklts']=$this->M_history->get_riwayat_tbpengajuan($kode_himp);
        $data['ukmukk']=$this->M_history->get_riwayat_tbpengajuan_ukmukk($kode_himp);
        $data['jrsn']= $this->db->get_where('tb_detailuser', ['kd_jrsn'=>$this->session->userdata('kode_himp')])->row_array();
        $data['user']= $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('user/riwayat',$data);
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
      }
  }
    public function Failed_Anggaran()
    {
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
        }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
        $data['title'] = 'Gagal Melakukan Pengajuan Anggaran';
        $data['alasan_ditolak_fklts']=$this->M_dana->get_pengajuan_fklts($kode_himp_sess);
        $data['alasan_ditolak_ukmukk']=$this->M_dana->get_pengajuan_ukmukk($kode_himp_sess);
        $data['user']= $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
          $this->load->view('templates/header',$data);
          $this->load->view('user/gagal_pengajuan',$data);
          $this->load->view('templates/sidebaruser',$data);
          $this->load->view('templates/footer');
      }
    }
  public function Failed_Laporan()
    {
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
        }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
        $data['title'] = 'Gagal Melakukan Laporan Kegiatan';
        $data['alasan_ditolak_fklts']=$this->M_dana->get_laporan_fklts($kode_himp_sess);
        $data['alasan_ditolak_ukmukk']=$this->M_dana->get_laporan_ukmukk($kode_himp_sess);
        $data['user']= $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['jrsn']= $this->db->get_where('tb_pengajuan', ['kd_jrsn'=>$this->session->userdata('username')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('user/gagal_laporan',$data);
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
      }
    }
    public function Pinjam_Aula()
    {if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $data=array(
        'title' => 'Peminjaman Aula SC',
        'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
        'userlogin' => $this->M_ormawa->get_login($kode_himp_sess),
        'userpdf' => $this->M_ormawa->get_data_sewa($kode_himp_sess),
        'usersewa' => $this->M_ormawa->get_data_sewaAll(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/pinjamaula');
        $this->load->view('templates/sidebaruser',$data);
        $this->load->view('templates/footer');
      }
    }
    public function ChangePassword()
    {
      if($this->session->userdata('status')!="login"){
        redirect(base_url("c_home/login"));
      }
      else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data=array(
        'title' => 'Ubah Password',
        'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess),
        'msg' => $this->session->flashdata('msg'),
        );
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confrim New Password', 'required|trim|min_length[6]|matches[new_password1]');
        if($this->form_validation->run()==false){
          $this->load->view('templates/header', $data);
          $this->load->view('user/changePassword', $data);
          $this->load->view('templates/sidebaruser',$data);
          $this->load->view('templates/footer');
        }else
          {
          $current_password=$this->input->post('current_password');
          $new_password=$this->input->post('new_password1');
          // var_dump($new_password, $current_password, $md5_crpassword, $data['user']['password']);die();
          // var_dump($user->password); die();
          if($data['user']['password']!=md5($current_password)){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
            redirect('c_user/changePassword');
          }else{
            if($current_password==$new_password){
              $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
              redirect('c_user/changePassword');
            }else{
                $this->db->set('password', md5($new_password));
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('user');

                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password has been changed!</div>');
                redirect('c_user/changePassword');
              }
          }
        }
      }
    }
    public function PanduanSimarwah()
    {
      if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
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
    {
      if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
      }else{
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data=array(
            'title' => 'Keluhan',
            // 'ormawa' => $this->M_ormawa->tampil_data_ormawa_login($kode_himp_sess),
            'useruser'=>$this->Model_View->tampil_statususer($kode_himp_sess), 
            'userlogin' => $this->M_ormawa->get_login($kode_himp_sess),
            'msg' => $this->session->flashdata('msg'),
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
      $ceknim=$this->Model_View->ceknim_anggota($nim);
      if ($ceknim->num_rows()>0) {
        $this->session->set_flashdata('error', 'NIM sudah terdaftar!');
        redirect('c_user/index');
      }
      else{
        $datastatus = $this->Model_View->tambah_statususer($parent_himpunan,$statususer);
      $databarang = $this->Model_View->simpan_anggota_baru($nim,$nama,$jenis_kelamin,$alamat,$kontak,$email,$jabatan,$parent_himpunan,$parent_bidang);
      if($databarang){ // Jika sukses
        echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
       }else{ // Jika gagal
          echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
      }
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
  public function update_data_bidang(){
  $kode_bidang = $this->input->post('kode_bidang');
  $label_bidang = $this->input->post('label_bidang');
  $nama_bidang = $this->input->post('nama_bidang');
  $parent_himpunan = $this->input->post('parent_himpunan');
  $image = $this->input->post('image'); 
  $imageold = $this->input->post('imageold');  

      if (!empty($_FILES["image"]["name"])){
        $config['upload_path']='./assets/img/bidang';
        $config['allowed_types']='jpg|gif|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        // var_dump($this->upload->do_upload('image'));
        // exit();
        if(!$this->upload->do_upload('image')){
          echo "Gagal Menambahkan Foto"; die();
        }
        else{
          $image=$this->upload->data('file_name');
          $newimage= $image;
          // var_dump($imageold);
          // exit();
          if($image!=NULL){
            $path = './assets/img/bidang/'.$imageold.'';
            unlink($path);
          }
        }
         $databidang = $this->Model_View->update_bidang($label_bidang,$nama_bidang,$kode_bidang,$parent_himpunan,$newimage);
      }else{
         $databidang = $this->Model_View->update_bidang($label_bidang,$nama_bidang,$kode_bidang,$parent_himpunan,$imageold);
      }     
      redirect('c_user');  
}  

  public function delete_data_bidang(){
  $kode_bidang = $this->input->get('var1');
  $image = $this->input->get('var2');  
  $path='./assets/img/bidang/'.$image.'';
  unlink($path);
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
  if($data){ // Jika sukses
    echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/index')."';</script>";
    }else{ // Jika gagal
    echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/index')."';</script>";
    }
  }

  // tambah jumlah mhs aktif dan ukmukk
  public function simpan_jml_mhsaktif(){
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $jml_mhsaktif=$this->input->post('jml_mhsaktif');
    // var_dump($kode_himp_sess);
    // var_dump($jml_mhsaktif);
    // exit();
    $datamhs = $this->Model_View->update_jml_mhsaktif($jml_mhsaktif,$kode_himp_sess);
    $this->session->set_flashdata('msg','<div class="alert alert-success">Jumlah Mahasiswa Aktif Berhasil Diupdate</div>');
    if($datamhs){ // Jika sukses
    echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
    }else{ // Jika gagal
    echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
    }
  }

    
    public function add_kegiatan(){
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $nama_kegiatan = $this->input->post('nama_kegiatan');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $image = $this->input->post('image');
      // var_dump($image);
      // exit();
      if ($_FILES['image']['size'] <= 0){
        $data =  array(
          'Parent_himpunan' => $kode_himp_sess,
          'nama_kegiatan'=> $nama_kegiatan,
          'start_date' => $start_date,
          'end_date' => $end_date
        );
        $this->Model_View->tambah_kegiatan($data);
        if($data){ // Jika sukses
          echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }else{ // Jika gagal
            echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }


        } else{
          $config['upload_path']='./assets/img/kegiatan';
          $config['allowed_types']='jpg|gif|png|jpeg';
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload',$config);
          if(!$this->upload->do_upload('image')){
            echo "Gagal Menambah Kegiatan"; die();
          }else{
            $image=$this->upload->data('file_name');
          }

          $data =  array(
            'Parent_himpunan' => $kode_himp_sess,
            'nama_kegiatan'=> $nama_kegiatan,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'image' => $image
          );

          $this->Model_View->tambah_kegiatan($data);
        if($data){ // Jika sukses
          echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }else{ // Jika gagal
            echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }
        }    
      }

  public function delete_kegiatan(){
    $id_kegiatan = $this->uri->segment(3);
    $this->Model_View->delete_kegiatan($id_kegiatan);
    $this->session->set_flashdata('msg','<div class="alert alert-success">Kegiatan Berhasil Dihapus</div>');
    redirect('c_user/Program_Kerja');
    }

    public function simpan_visimisi_ukmukk(){
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $visi_ukmukk=$this->input->post('visi_ukmukk');
    $misi_ukmukk=$this->input->post('misi_ukmukk');

    $data = $this->Model_View->update_visimisi_ukmukk($visi_ukmukk,$misi_ukmukk,$kode_himp_sess);
    if($data){ // Jika sukses
      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
     }else{ // Jika gagal
        echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
    }
    }

    public function tambah_bidang_ukmukk()
    {
    $kode_ubidang = $this->input->post('kode_ubidang');
    $label_ubidang = $this->input->post('label_ubidang');
    $desc_ubidang = $this->input->post('desc_ubidang');
    $parent_ukmukk = $this->input->post('parent_ukmukk');
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
            'kode_ubidang' => $kode_ubidang,
            'label_ubidang'=> $label_ubidang,
            'desc_ubidang' => $desc_ubidang,
            'parent_ukmukk' => $parent_ukmukk,
            'image' => $image
        );
        // var_dump($data);
        // exit();
        $this->Model_View->tambah_ubidang($data);
        if($data){ // Jika sukses
      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
     }else{ // Jika gagal
        echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
    }
    }
    }

    public function update_bidang_ukmukk(){
    $kode_ubidang = $this->input->post('kode_ubidang');
    $label_ubidang = $this->input->post('label_ubidang');
    $nama_ubidang = $this->input->post('nama_ubidang');
    $parent_ukmukk = $this->input->post('parent_ukmukk');
    $image = $this->input->post('image'); 
    $imageold = $this->input->post('imageold');

    if (!empty($_FILES["image"]["name"])){
        $config['upload_path']='./assets/img/bidang';
        $config['allowed_types']='jpg|gif|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('image')){
          echo "Gagal Menambahkan Foto"; die();
        }
        else{
          $image=$this->upload->data('file_name');
          $newimage= $image;
          if($image!=NULL){
            $path = './assets/img/bidang/'.$imageold.'';
            unlink($path);
          }
        }
      $databidang = $this->Model_View->update_ukmbidang($label_ubidang,$nama_ubidang,$kode_ubidang,$parent_ukmukk,$newimage);
      }else{
      $databidang = $this->Model_View->update_ukmbidang($label_ubidang,$nama_ubidang,$kode_ubidang,$parent_ukmukk,$imageold);
      }      
        if($databidang){ // Jika sukses
          echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
         }else{ // Jika gagal
            echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
        }
        
    }

    public function simpan_anggota_ukmukk(){
        $u_nim=$this->input->post('u_nim');
        $u_nama=$this->input->post('u_nama');
        $u_jeniskelamin=$this->input->post('u_jeniskelamin');
        $u_alamat=$this->input->post('u_alamat');
        $u_kontak=$this->input->post('u_kontak');
        $u_email=$this->input->post('u_email');
        $u_jabatan=$this->input->post('u_jabatan');
        $parent_ukmukk=$this->input->post('parent_ukmukk');
        $parent_ubidang=$this->input->post('parent_ubidang');
        $statususer=2;
        $datastatus = $this->Model_View->tambah_statususerukmukk($parent_ukmukk,$statususer);
        $databarang = $this->Model_View->simpan_ukmanggota($u_nim,$u_nama,$u_jeniskelamin,$u_alamat,$u_kontak,$u_email,$u_jabatan,$parent_ukmukk,$parent_ubidang);
     if($databarang){ // Jika sukses
      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
     }else{ // Jika gagal
        echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
    }
    }

    
    public function add_kegiatan_ukmukk(){ 
      $kode_himp_sess = $this->session->userdata('kode_himp_sess');
      $nama_ukegiatan = $this->input->post('nama_ukegiatan');
      $ustart_date = $this->input->post('ustart_date');
      $uend_date = $this->input->post('uend_date');
      $image = $this->input->post('image');

      if ($_FILES['image']['size'] <= 0){
        $data =  array(
          'parent_ukmukk' => $kode_himp_sess,
          'nama_ukegiatan'=> $nama_ukegiatan,
          'ustart_date' => $ustart_date,
          'uend_date' => $uend_date,          
        );
        $this->Model_View->tambah_kegiatan_ukmukk($data);

          if($data){ // Jika sukses
            echo "<script>alert('Data berhasil ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }else{ // Jika gagal
            echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }
        }
       else{
        $config['upload_path']='./assets/img/kegiatan';
        $config['allowed_types']='jpg|gif|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('image')){
          echo "Gagal Menambahkan Bidang"; die();
        }else{
          $image=$this->upload->data('file_name');
        } 
        $data =  array(
          'parent_ukmukk' => $kode_himp_sess,
          'nama_ukegiatan'=> $nama_ukegiatan,
          'ustart_date' => $ustart_date,
          'uend_date' => $uend_date,
          'image' => $image
        );

        $this->Model_View->tambah_kegiatan_ukmukk($data);

          if($data){ // Jika sukses
            echo "<script>alert('Data berhasil ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }else{ // Jika gagal
            echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
          }
        }
      }

    public function update_anggota_ukmukk(){
        $u_nim=$this->input->post('u_nim');
        $u_nama=$this->input->post('u_nama');
        $u_jeniskelamin=$this->input->post('u_jeniskelamin');
        $u_alamat=$this->input->post('u_alamat');
        $u_kontak=$this->input->post('u_kontak');
        $u_email=$this->input->post('u_email');
        $u_jabatan=$this->input->post('u_jabatan');
        $parent_ukmukk=$this->input->post('parent_ukmukk');
        $parent_ubidang=$this->input->post('parent_ubidang');

        $databarang = $this->Model_View->update_ukmanggota($u_nim,$u_nama,$u_jeniskelamin,$u_alamat,$u_kontak,$u_email,$u_jabatan,$parent_ukmukk,$parent_ubidang);
         if($databarang){ // Jika sukses
                 echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/index')."';</script>";
          }else{ // Jika gagal
                echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/index')."';</script>";
    }

    }

    public function delete_bidang_ukmukk(){
    $kode_ubidang = $this->uri->segment(3);
    $data = $this->Model_View->delete_ukmbidang($kode_ubidang);
    if($data){ // Jika sukses
      echo "<script>alert('Data berhasil dihapus');window.location = '".base_url('c_user/index')."';</script>";
      }else{ // Jika gagal
      echo "<script>alert('Data gagal dihapus');window.location = '".base_url('c_user/index')."';</script>";
    }
    }

    public function delete_anggota_ukmukk(){
    $u_nim = $this->uri->segment(3);
    $this->Model_View->delete_ukmanggota($u_nim);
    $this->session->set_flashdata('msg','<div class="alert alert-success">Anggota Himpunan Dihapus</div>');
    redirect('c_user');
    }

   public function update_kegiatan(){
        $parent_himpunan = $this->session->userdata('Parent_himpunan');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $id_kegiatan = $this->input->post('id_kegiatan');
        $image = $this->input->post('image');
        $imageold = $this->input->post('imageold');  

        if (!empty($_FILES["image"]["name"])){
          $config['upload_path']='./assets/img/kegiatan';
          $config['allowed_types']='jpg|gif|png|jpeg';
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload',$config);
          // var_dump($this->upload->do_upload('image'));
          // exit();
          if(!$this->upload->do_upload('image')){
            echo "Gagal Menambahkan Foto"; die();
          }
          else{
            $image=$this->upload->data('file_name');
            $newimage= $image;
            // var_dump($imageold);
            // exit();
            if($_FILES['image']['size'] > 0 && $_POST['imageold'] != ""){
              $path = './assets/img/kegiatan/'.$imageold.'';
              unlink($path);
            }
          }
          $data = $this->Model_View->update_kegiatan($start_date,$end_date,$nama_kegiatan,$parent_himpunan,$id_kegiatan,$newimage);
        }else{
          $data = $this->Model_View->update_kegiatan($start_date,$end_date,$nama_kegiatan,$parent_himpunan,$id_kegiatan,$imageold);
        } 
          if($data){ // Jika sukses
            echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
            }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
            }    
          }

          public function update_kegiatan_ukmukk(){
            $parent_ukmukk = $this->session->userdata('parent_ukmukk');
            $ustart_date = $this->input->post('ustart_date');
            $uend_date = $this->input->post('uend_date');
            $nama_ukegiatan = $this->input->post('nama_ukegiatan');
            $id_ukegiatan = $this->input->post('id_ukegiatan');
            $image = $this->input->post('image');
            $imageold = $this->input->post('imageold');


            if (!empty($_FILES["image"]["name"])){
              $config['upload_path']='./assets/img/kegiatan';
              $config['allowed_types']='jpg|gif|png|jpeg';
              $config['encrypt_name'] = TRUE;

              $this->load->library('upload',$config);
          // var_dump($this->upload->do_upload('image'));
          // exit();
              if(!$this->upload->do_upload('image')){
                echo "Gagal Menambahkan Foto"; die();
              }
              else{
                $image=$this->upload->data('file_name');
                $newimage= $image;
            // var_dump($imageold);
            // exit();
                if($_FILES['image']['size'] > 0 && $_POST['imageold'] != ""){
                  $path = './assets/img/kegiatan/'.$imageold.'';
                  unlink($path);
                }
              }
              $data = $this->Model_View->update_ukegiatan($ustart_date,$uend_date,$nama_ukegiatan,$parent_ukmukk,$id_ukegiatan,$newimage);
            }else{
              $data = $this->Model_View->update_ukegiatan($ustart_date,$uend_date,$nama_ukegiatan,$parent_ukmukk,$id_ukegiatan,$imageold);
            }          
          if($data){ // Jika sukses
            echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
            }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
            }    
          }

    public function delete_kegiatan_ukmukk(){
    $id_ukegiatan = $this->uri->segment(3);
    $this->Model_View->delete_ukegiatan($id_ukegiatan);
    $this->session->set_flashdata('msg','<div class="alert alert-success">Kegiatan Berhasil Dihapus</div>');
    redirect('c_user/Program_Kerja');
    }

    public function simpan_jml_umhsaktif(){
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $jml_umhsaktif=$this->input->post('jml_umhsaktif');
        // var_dump($kode_himp_sess);
        // var_dump($jml_mhsaktif);
        // exit();
        $datamhs = $this->Model_View->update_jml_umhsaktif($jml_umhsaktif,$kode_himp_sess);
        $this->session->set_flashdata('msg','<div class="alert alert-success">Jumlah Mahasiswa Aktif Berhasil Diupdate</div>');
        if($datamhs){ // Jika sukses
        echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
        }else{ // Jika gagal
        echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
        }
    }
    // tambahan nisvy 
    public function updatefoto_ukmukk(){
          $kode_ukmukk = $this->input->post('kode_ukmukk');       
          $image = $this->input->post('image');
          $imageold = $this->input->post('imageold');  

          if (!empty($_FILES["image"]["name"])){
            $config['upload_path']='./assets/img/ukmukk';
            $config['allowed_types']='jpg|gif|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('image')){
              echo "Gagal Menambahkan Foto"; die();
            }
            else{
              $image=$this->upload->data('file_name');
              $newimage= $image;
              if($image!=NULL){
                $path = './assets/img/ukmukk/'.$imageold.'';
                unlink($path);
              }
            }
            $this->Model_View->update_fotoukm($kode_ukmukk,$newimage);
          }else{
            $this->Model_View->update_fotoukm($kode_ukmukk,$imageold);
          }    
          redirect('c_user');
        }


  public function updatefoto_hmj(){
      $kode_himpunan = $this->input->post('kode_himpunan');       
      $image = $this->input->post('image');
      $imageold = $this->input->post('imageold');  

      if (!empty($_FILES["image"]["name"])){
        $config['upload_path']='./assets/img/jurusan';
        $config['allowed_types']='jpg|gif|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        // var_dump($this->upload->do_upload('image'));
        // exit();
        if(!$this->upload->do_upload('image')){
          echo "Gagal Menambahkan Foto"; die();
        }
        else{
          $image=$this->upload->data('file_name');
          $newimage= $image;
          // var_dump($imageold);
          // exit();
          if($image!=NULL){
            $path = './assets/img/jurusan/'.$imageold.'';
            unlink($path);
          }
        }
         $this->Model_View->update_fotohmj($kode_himpunan,$newimage);
      }else{
         $this->Model_View->update_fotohmj($kode_himpunan,$imageold);
      }   
      redirect('c_user');
   
  }
  // tambah nurul
  public function tambah_list_anggota_himp(){
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $tahun_akademik= $this->input->post('tahun_akademik');

    $this->form_validation->set_rules('file_excel', 'tahun_akademik', 'required');
      $config['upload_path'] = './assets/uploads/list_anggota/';//path folder
      $config['allowed_types'] = 'xlsx'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'List Anggota_'.$kode_himp_sess.'_Tahun Akademik_'.$tahun_akademik;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'list_upload');
      $this->list_upload->initialize($config);

      if(!empty($_FILES['file_excel']['name']))
        {
            if(!$this->list_upload->do_upload('file_excel'))
            {
              echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Data_Anggota')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->list_upload->data();
                $list_anggota = $upload_data['file_name'];
            }
        }

      $list_anggotanya=$list_anggota;
      $data =  array(
        'parent_himpunan' => $kode_himp_sess,
        'tahun_akademik'=> $tahun_akademik,
        'file_excel'=> $list_anggotanya,
      );

      $this->Model_View->tambah_list_anggota_himp($data);
  if($data){ // Jika sukses
    echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Data_Anggota')."';</script>";
    }else{ // Jika gagal
      echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Data_Anggota')."';</script>";
    }
  }    
  
  public function tambah_list_anggota_ukmukk(){
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $tahun_akademik= $this->input->post('tahun_akademik');

    $this->form_validation->set_rules('file_excel', 'tahun_akademik', 'required');
      $config['upload_path'] = './assets/uploads/list_anggota/';//path folder
      $config['allowed_types'] = 'xlsx'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'List Anggota_'.$kode_himp_sess.'_Tahun Akademik_'.$tahun_akademik;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'list_upload');
      $this->list_upload->initialize($config);

      if(!empty($_FILES['file_excel']['name']))
        {
            if(!$this->list_upload->do_upload('file_excel'))
            {
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Data_Anggota')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->list_upload->data();
                $list_anggota = $upload_data['file_name'];
            }
        }

      $list_anggotanya=$list_anggota;
      $data =  array(
        'parent_ukmukk' => $kode_himp_sess,
        'tahun_akademik'=> $tahun_akademik,
        'file_excel'=> $list_anggotanya,
      );

      $this->Model_View->tambah_list_anggota_ukmukk($data);
  if($data){ // Jika sukses
    echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Data_Anggota')."';</script>";
    }else{ // Jika gagal
      echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Data_Anggota')."';</script>";
    }
  }

  public function update_list_anggota_himp()
  {
    $id_listanggota=$this->input->post('id_listanggota');
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $tahun_akademik=$this->input->post('tahun_akademik');
    $list = $this->Model_View->getDataByIDList($id_listanggota)->row();
    $old_excel = './assets/uploads/list_anggota/'.$list->file_excel;
    // var_dump($old_excel);die();
    if(is_readable($old_excel) && unlink($old_excel)){
      $config['upload_path']='./assets/uploads/list_anggota';
      $config['allowed_types']='xlsx';
      $config['file_name'] = 'List Anggota_'.$kode_himp_sess.'_Tahun Akademik_'.$tahun_akademik;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('file_new_excel'))
			{
				echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Data_Anggota')."'</script>";die();
			}
      else
        {
          $upload_data = $this->upload->data();
          $new_file = $upload_data['file_name'];
          $new_data = array(
            'tahun_akademik'	=> $this->input->post('tahun_akademik'),
            'file_excel'	=> $new_file,
            'parent_himpunan'=> $this->input->post('parent_himpunan')
          );
          // var_dump($data);die();
          $update = $this->Model_View->updateListAnggota($id_listanggota, $new_data);
          if($update){
            echo "<script>alert('Data berhasil diupdate !');window.location = '".base_url('c_user/Data_Anggota')."'</script>";
          }
          else{
            echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Data_Anggota')."'</script>";die();
          }
        }
      }
      else{
        echo "<script>alert('Silahkan upload file terbaru sebelum melakukan update !');window.location = '".base_url('c_user/Data_Anggota')."'</script>";
      }
  }

  public function update_list_anggota_ukmukk(){
    $id_ulistanggota=$this->input->post('id_ulistanggota');
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');
    $tahun_akademik=$this->input->post('tahun_akademik');
    $list = $this->Model_View->getDataByIDuList($id_ulistanggota)->row();
    $old_excel = './assets/uploads/list_anggota/'.$list->file_excel;
    // var_dump($id_ulistanggota);die();
    if(is_readable($old_excel) && unlink($old_excel)){
      $config['upload_path']='./assets/uploads/list_anggota';
      $config['allowed_types']='xlsx';
      $config['file_name'] = 'List Anggota_'.$kode_himp_sess.'_Tahun Akademik_'.$tahun_akademik;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('file_new_excel'))
			{
				echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Data_Anggota')."'</script>";die();
			}
      else
        {
          $upload_data = $this->upload->data();
          $new_file = $upload_data['file_name'];
          $new_data = array(
            'tahun_akademik'	=> $this->input->post('tahun_akademik'),
            'file_excel'	=> $new_file,
            'parent_ukmukk'=> $this->input->post('parent_ukmukk'),
          );
          // var_dump($data);die();
          $update = $this->Model_View->updateListUAnggota($id_ulistanggota, $new_data);
          if($update){
            echo "<script>alert('Data berhasil diupdate !');window.location = '".base_url('c_user/Data_Anggota')."'</script>";
          }
          else{
            echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Data_Anggota')."'</script>";die();
          }
        }
      }
      else{
        echo "<script>alert('Silahkan upload file terbaru sebelum melakukan update !');window.location = '".base_url('c_user/Data_Anggota')."'</script>";
      }
  }
  public function delete_list_anggota()
  {
    $id_listanggota=$this->uri->segment(3);
    $list = $this->Model_View->getDataByIDList($id_listanggota)->row();
    $old_excel = './assets/uploads/list_anggota/'.$list->file_excel;
    if(is_readable($old_excel) && unlink($old_excel)){
      $this->Model_View->delete_list_anggota($id_listanggota);
      redirect('c_user/Data_Anggota');
    }
  }
  public function delete_list_uanggota()
  {
    $id_ulistanggota=$this->uri->segment(3);
    $list = $this->Model_View->getDataByIDuList($id_ulistanggota)->row();
    $old_excel = './assets/uploads/list_anggota/'.$list->file_excel;
    if(is_readable($old_excel) && unlink($old_excel)){
      $this->Model_View->delete_list_uanggota($id_ulistanggota);
      echo "<script>alert('Data telah berhasil dihapus !');window.location = '".base_url('c_user/Data_Anggota')."'</script>";
      redirect('c_user/Data_Anggota');
    }
  }
  // end tambah nurul


  public function tambah_prestasi_himp(){
          $kode_himp_sess = $this->session->userdata('kode_himp_sess');
          $nama_prestasi = $this->input->post('nama_prestasi');
          $jenis_prestasi = $this->input->post('jenis_prestasi');
          $desc_prestasi = $this->input->post('desc_prestasi');
          $waktu = $this->input->post('waktu');        
          $image = $this->input->post('image');
          $lokasi = $this->input->post('lokasi');

          if ($image=''){} else{
            $config['upload_path']='./assets/img/prestasi';
            $config['allowed_types']='jpg|gif|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('image')){
              echo "Gagal Menambah Kegiatan"; die();
            }else{
              $image=$this->upload->data('file_name');
            }

            $data =  array(
              'parent_himpunan' => $kode_himp_sess,
              'nama_prestasi'=> $nama_prestasi,
              'jenis_prestasi'=> $jenis_prestasi,
              'desc_prestasi'=> $desc_prestasi,            
              'waktu' => $waktu,
              'lokasi' => $lokasi,
              'image' => $image
            );

            $this->Model_View->tambah_prestasi($data);
        if($data){ // Jika sukses
          echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
          }else{ // Jika gagal
            echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
          }
        }    
      }
      
    public function update_prestasi_himp(){
        $parent_himpunan = $this->session->userdata('parent_himpunan');
        $waktu = $this->input->post('waktu');          
        $nama_prestasi = $this->input->post('nama_prestasi');
        $jenis_prestasi = $this->input->post('jenis_prestasi');
        $desc_prestasi = $this->input->post('desc_prestasi');
        $lokasi = $this->input->post('lokasi');
        $id_prestasi = $this->input->post('id_prestasi');
        $image = $this->input->post('image');
        $imageold = $this->input->post('imageold');  

        if (!empty($_FILES["image"]["name"])){
          $config['upload_path']='./assets/img/prestasi';
          $config['allowed_types']='jpg|gif|png|jpeg';
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload',$config);
          // var_dump($this->upload->do_upload('image'));
          // exit();
          if(!$this->upload->do_upload('image')){
            echo "Gagal Menambahkan Foto"; die();
          }
          else{
            $image=$this->upload->data('file_name');
            $newimage= $image;
            // var_dump($imageold);
            // exit();
            if($image!=NULL){
              $path = './assets/img/prestasi/'.$imageold.'';
              unlink($path);
            }
          }
          $data = $this->Model_View->update_prestasi($waktu,$nama_prestasi,$jenis_prestasi,$desc_prestasi,$lokasi,$parent_himpunan,$id_prestasi,$newimage);
        }else{
          $data = $this->Model_View->update_prestasi($waktu,$nama_prestasi,$jenis_prestasi,$desc_prestasi,$lokasi,$parent_himpunan,$id_prestasi,$imageold);
        } 
          if($data){ // Jika sukses
            echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
            }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
            }    
          }

          public function delete_prestasi_himp(){
            $id_prestasi = $this->uri->segment(3);
            $this->Model_View->delete_prestasi($id_prestasi);
            $this->session->set_flashdata('msg','<div class="alert alert-success">Prestasi Berhasil Dihapus</div>');
            redirect('c_user/Prestasi_organisasi');
          }

          public function tambah_prestasi_ukmukk(){
            $kode_himp_sess = $this->session->userdata('kode_himp_sess');
            $nama_uprestasi = $this->input->post('nama_uprestasi');
            $jenis_uprestasi = $this->input->post('jenis_uprestasi');
            $desc_uprestasi = $this->input->post('desc_uprestasi');
            $waktu = $this->input->post('waktu');        
            $image = $this->input->post('image');
            $ulokasi = $this->input->post('ulokasi');

            if ($image=''){} else{
              $config['upload_path']='./assets/img/prestasi';
              $config['allowed_types']='jpg|gif|png|jpeg';
              $config['encrypt_name'] = TRUE;

              $this->load->library('upload',$config);
              if(!$this->upload->do_upload('image')){
                echo "Gagal Menambah Kegiatan"; die();
              }else{
                $image=$this->upload->data('file_name');
              }

              $data =  array(
                'parent_ukmukk' => $kode_himp_sess,
                'nama_uprestasi'=> $nama_uprestasi,
                'jenis_uprestasi'=> $jenis_uprestasi,
                'desc_uprestasi'=> $desc_uprestasi,
                'ulokasi' => $ulokasi,
                'waktu' => $waktu,
                'image' => $image
              );

              $this->Model_View->tambah_uprestasi($data);
        if($data){ // Jika sukses
          echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
          }else{ // Jika gagal
            echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
          }
        }    
      }

      public function update_prestasi_ukmukk(){
        $parent_ukmukk = $this->session->userdata('parent_ukmukk');
        $waktu = $this->input->post('waktu');          
        $nama_uprestasi = $this->input->post('nama_uprestasi');
        $jenis_uprestasi = $this->input->post('jenis_uprestasi');
        $desc_uprestasi = $this->input->post('desc_uprestasi');
        $ulokasi = $this->input->post('ulokasi');
        $id_uprestasi = $this->input->post('id_uprestasi');
        $image = $this->input->post('image');
        $imageold = $this->input->post('imageold');  

        if (!empty($_FILES["image"]["name"])){
          $config['upload_path']='./assets/img/prestasi';
          $config['allowed_types']='jpg|gif|png|jpeg';
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload',$config);
          // var_dump($this->upload->do_upload('image'));
          // exit();
          if(!$this->upload->do_upload('image')){
            echo "Gagal Menambahkan Foto"; die();
          }
          else{
            $image=$this->upload->data('file_name');
            $newimage= $image;
            // var_dump($imageold);
            // exit();
            if($image!=NULL){
              $path = './assets/img/prestasi/'.$imageold.'';
              unlink($path);
            }
          }
          $data = $this->Model_View->update_uprestasi($waktu,$nama_uprestasi,$jenis_uprestasi,$desc_uprestasi,$ulokasi,$parent_ukmukk,$id_uprestasi,$newimage);
        }else{
          $data = $this->Model_View->update_uprestasi($waktu,$nama_uprestasi,$jenis_uprestasi,$desc_uprestasi,$ulokasi,$parent_ukmukk,$id_uprestasi,$imageold);
        } 
          if($data){ // Jika sukses
            echo "<script>alert('Data berhasil diupdate');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
            }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate');window.location = '".base_url('c_user/Prestasi_organisasi')."';</script>";
            }    
          }

          public function delete_prestasi_ukmukk(){
            $id_uprestasi = $this->uri->segment(3);
            $this->Model_View->delete_uprestasi($id_uprestasi);
            $this->session->set_flashdata('msg','<div class="alert alert-success">Prestasi Berhasil Dihapus</div>');
            redirect('c_user/Prestasi_organisasi');
          }
  
  
  
}




