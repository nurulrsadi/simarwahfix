<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\CssConverter;
class c_user extends CI_Controller
{
function __construct(){
    parent::__construct();
    if($this->session->userdata('status') != "login"){
      redirect(base_url("c_home/login"));
    }
    if($this->session->userdata('role')==1 ){
      redirect(base_url("c_admin/index"));
    }
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
        $this->load->view('user/Print_Sewa_Aula');
        $html = ob_get_contents();
        $content = ob_get_clean();
      
        $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', array(5, 5,5, 5));
        // $html2pdf->setModeDebug();
        // $html2pdf->addaExtesion(new Spipu\Html2Pdf\Exception\HtmlParsingException());
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->output('forms.pdf');
    } catch (Html2PdfException $e) {
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
          $kode_himp_sess = $this->session->userdata('kode_himp_sess');
          $data = array(
              'title' =>'Pagu Anggaran',
              'dana' => $this->M_dana->tampil_data_dana_login($kode_himp_sess),
              'danaukmukk' => $this->M_dana->tampil_data_dana_loginukm($kode_himp_sess),
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
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Laporan Kegiatan';
      $data['laporan']=$this->M_dana->tampil_data_laporan_login($kode_himp_sess);
      $data['laporan_ukmukk']=$this->M_dana->tampil_data_laporan_login_ukmukk($kode_himp_sess);
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
      $data['useruser']=$this->Model_View->tampil_statususer($kode_himp_sess);
      $data['title'] = 'Verifikasi Laporan Kegiatan';
      $data['laporan']=$this->M_dana->tampil_data_laporan_login($kode_himp_sess);
      $this->load->view('templates/header',$data);
      $this->load->view('user/diceklaporandulu',$data);
      $this->load->view('templates/sidebaruser',$data);
      $this->load->view('templates/footer');
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
  $data['proker'] = $this->Model_View->tampil_kegiatan($kode_himp_sess);
  $data['uproker'] = $this->Model_View->tampil_kegiatan_ukmukk($kode_himp_sess);
  $this->load->view('templates/header', $data);
  $this->load->view('user/programkerja', $data);
  $this->load->view('templates/sidebaruser', $data);
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
      // $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      // if($cek -> num_rows() == 1){
      // $sess_data['data_himpunan'] = "true";
      // $this->session->set_userdata($sess_data);
      // }else{
      // $sess_data['data_himpunan'] = "false";
      // $this->session->set_userdata($sess_data);
      // }
  
      // $ceksess = $this->session->userdata('data_himpunan');
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
      // $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
      // if($cek -> num_rows() == 1){
      // $sess_data['data_himpunan'] = "true";
      // $this->session->set_userdata($sess_data);
      // }else{
      // $sess_data['data_himpunan'] = "false";
      // $this->session->set_userdata($sess_data);
      // }
  
      // $ceksess = $this->session->userdata('data_himpunan');
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
      


      $data =  array(
          'Parent_himpunan' => $kode_himp_sess,
          'nama_kegiatan'=> $nama_kegiatan,
          'start_date' => $start_date,
          'end_date' => $end_date
      );

      $this->Model_View->tambah_kegiatan($data);
       if($datakegiatan){ // Jika sukses
               echo "<script>alert('Data berhasil ditambah');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
        }else{ // Jika gagal
              echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/Program_Kerja')."';</script>";
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
    $desc_ubidang = $this->input->post('desc_ubidang');
    $parent_ukmukk = $this->input->post('parent_ukmukk');
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
        $databidang = $this->Model_View->update_ukmbidang($label_ubidang,$desc_ubidang,$kode_ubidang,$parent_ukmukk,$image);
        if($databidang){ // Jika sukses
          echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
         }else{ // Jika gagal
            echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
        }
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
        


        $data =  array(
            'parent_ukmukk' => $kode_himp_sess,
            'nama_ukegiatan'=> $nama_ukegiatan,
            'ustart_date' => $ustart_date,
            'uend_date' => $uend_date
        );

        $this->Model_View->tambah_kegiatan_ukmukk($data);
        redirect('c_user/Program_Kerja');
        if($data){ // Jika sukses
                 echo "<script>alert('Data berhasil ditambahkan');window.location = '".base_url('c_user/index')."';</script>";
        }else{ // Jika gagal
                echo "<script>alert('Data gagal ditambahkan');window.location = '".base_url('c_user/index')."';</script>";
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

    public function update_kegiatan_ukmukk(){
        $parent_ukmukk = $this->session->userdata('parent_ukmukk');
        $ustart_date = $this->input->post('ustart_date');
        $uend_date = $this->input->post('uend_date');
        $nama_ukegiatan = $this->input->post('nama_ukegiatan');
        $id_ukegiatan = $this->input->post('id_ukegiatan');

        $data = $this->Model_View->update_ukegiatan($ustart_date,$uend_date,$nama_ukegiatan,$parent_ukmukk,$id_ukegiatan);
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
}




