<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\CssConverter;
class c_admin extends CI_Controller
{
    function __construct(){
      parent::__construct();	
      if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
      }
      if($this->session->userdata('role')!=1 ){
        redirect(base_url("c_user/index"));
      }
	}
	public function Cetak_Keluhan(){
      $penyewa=$this->uri->segment(5);
      
      if (isset($_POST['test'])) {
        echo '<pre>';
        echo htmlentities(print_r($_POST, true));
        echo '</pre>';
        exit;
        }
     
     try {
        ob_start();
        $data['all_keluhan']=$this->M_ormawa->tampil_keluhan();
        $this->load->view('admin/Print_All_Keluhan',$data);
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
      $date_today=date('Y-m-d');
      $date_now=date('Y-m-d', strtotime($date_today.'-1 day'));
      $date_minus=date('Y-m-d', strtotime($date_today.'-7 day'));      
      $data['title'] = 'Dashboard';
      $data['totalFklts'] = $this->M_ormawa->getTotalAnggotafak();
      $data['sumAktifFklts'] = $this->M_ormawa->getAnggotaAktiffak();
      $data['sumAktifukmukk'] = $this->M_ormawa->getAnggotaAktifUKMUKK();
      $data['aula_notyet']=$this->M_ormawa->get_saat_tanggalnya($date_minus,$date_now);
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footeradm',$data);
        
    }
    public function Edit_Pagu_Universitas(){
      $data = array(
        'title' => 'Edit Pagu Anggaran',
        'userdanauniv'=> $this->M_dana->tampil_list_user_danauniv(),
        'fak' => $this->Model_View->tampil_list_fakultas(),
    );
    $data['count_puniv']= $this->M_dana->count_puniv();
    $data['count_pfklts']= $this->M_dana->count_pfklts();
    $data['count_pukmukk']= $this->M_dana->count_pukmukk();
    $data['count_luniv']= $this->M_dana->count_luniv();
    $data['count_lfklts']= $this->M_dana->count_lfklts();
    $data['count_lukmukk']= $this->M_dana->count_lukmukk();
    $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
    $this->load->view('templates/headeradm', $data);
    $this->load->view('templates/sidebaradm', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/editpaguuniv', $data);
    $this->load->view('templates/footeradm');
    }
    public function Edit_Pagu_Fakultas()
    {
        $data = array(
            'title' => 'Edit Pagu Anggaran',
            'userdana'=> $this->M_dana->tampil_list_user_dana(),
            'usercekagt'=>$this->M_dana->tampil_list_user_anggota(),
            'fak' => $this->Model_View->tampil_list_fakultas(),
        );
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
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
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editpaguukmukk', $data);
        $this->load->view('templates/footeradm');
      }
    public function Data_Pagu()
    {
        $session = $this->session->userdata('id');
        $data = array(
            'title' => 'Data Pagu Anggaran',
            'getpengajuandana'=> $this->M_dana->tampil_pengajuandana()->result()
        );
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
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
        );
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
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
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
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
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cekpaguukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan_Universitas()
    {
         
        $data['title'] = 'Cek Laporan Kegiatan ORMAWA Tingkat Universitas';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['lpjuniv'] = $this->M_dana->tampil_list_lpjuniv();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanuniv', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan_Fakultas()
    {
        $data['title'] = 'Cek Laporan Kegiatan ORMAWA Tingkat Fakultas';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['lpjjrsn'] = $this->M_dana->tampil_list_lpjjrsn();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footeradm');
    }
    public function Laporan_Kegiatan_UKMUKK()
    {
        $data['title'] = 'Cek Laporan Kegiatan ORMAWA Tingkat UKM UKK';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['lpjukmukk'] = $this->M_dana->tampil_list_lpjukmukk();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    public function List_Pengajuan_Universitas(){
      $data['title'] = 'List Pengajuan Berhasil';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['datauserbelumuniv'] = $this->M_dana->tampil_list_user_laporanbelumdikirimuniv();
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/pengajuanberhasiluniv', $data);
      $this->load->view('templates/footeradm');
    }
    public function List_Pengajuan_Fakultas(){
      $data['title'] = 'List Pengajuan Berhasil';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['datauserbelum'] = $this->M_dana->tampil_list_user_laporanbelumdikirim();
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/pengajuanberhasil', $data);
      $this->load->view('templates/footeradm');
    }
    public function List_Pengajuan_UKMUKK(){
      $data['title'] = 'List Pengajuan Berhasil';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['datauserbelum_ukmukk'] = $this->M_dana->tampil_list_user_laporanbelumdikirim_ukmukk();
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/pengajuanberhasilukmukk', $data);
      $this->load->view('templates/footeradm');
    }
    // function Cek_Data_Pengajuan/Tidak_ACC(){

    // }
    public function Cek_Surat()
    {
        $data['title'] = 'Cek Surat Izin';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/suratizin', $data);
        $this->load->view('templates/footeradm');
    }
  // history pengajuan
      // pengajuan univ
      function History_Pengajuan_Universitas()
      {
        $data['title'] = 'Recap Data Pengajuan';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['npengajuan']=$this->M_history->count_pengajuan_univ();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/h_pengajuan_univ', $data);
        $this->load->view('templates/footeradm');
      }
      // pengajuan fakultas
      function History_Pengajuan_Fakultas()
      {
        $data['title'] = 'Recap Data Pengajuan';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['npengajuan']=$this->M_history->count_pengajuan_fklts();
        $data['pengaju_fklts']=$this->M_history->get_all_pengajuan_fak();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/h_pengajuan_fklts', $data);
        $this->load->view('templates/footeradm');
      }
      // pengajuan ukmukk
      function History_Pengajuan_UKMUKK()
      {
        $data['title'] = 'Recap Data Pengajuan';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['npengajuan']=$this->M_history->count_pengajuan_ukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/h_pengajuan_ukmukk', $data);
        $this->load->view('templates/footeradm');
      }
    // end history pengajuan

    // detail history pengajuan
    public function Detail_History_Pengajuan_Universitas($kd_jrsn)
    {
      $data['title']= 'Detail Recap Pengajuan '.$kd_jrsn.'';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['h_p_fklts']=$this->M_history->get_pengajuan_univ($kd_jrsn);
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/h_detail_p_univ', $data);
      $this->load->view('templates/footeradm');
    }
    public function Detail_History_Pengajuan_Fakultas($kd_jrsn)
    {
      $data['title']= 'Detail Recap Pengajuan '.$kd_jrsn.'';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['h_p_fklts']=$this->M_history->get_pengajuan_fklts($kd_jrsn);
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/h_detail_p_fklts', $data);
      $this->load->view('templates/footeradm');
    }
    public function Detail_History_Pengajuan_UKMUKK($kd_ukmkk)
    {
      $data['title']= 'Detail Recap Pengajuan '.$kd_ukmkk.'';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['h_p_ukmukk']=$this->M_history->get_pengajuan_ukmukk($kd_ukmkk);
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/h_detail_p_ukmukk', $data);
      $this->load->view('templates/footeradm');
    }
    // end detail pengajuan

  // history laporan
    // laporan univ
    public function History_Laporan_Universitas()
    {
      $data['title'] = 'Recap Data Laporan Kegiatan';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['nlaporan']= $this->M_history->count_laporan_univ();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/h_laporan_univ', $data);
      $this->load->view('templates/footeradm');
    }
    // laporan fakultas
    public function History_Laporan_Fakultas()
    {
      $data['title'] = 'Recap Data Laporan Kegiatan';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['nlaporan']= $this->M_history->count_laporan_fklts();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/h_laporan_fklts', $data);
      $this->load->view('templates/footeradm');
    }
    // laporan ukmukk
    public function History_Laporan_UKMUKK()
    {
      $data['title'] = 'Recap Data Laporan Kegiatan';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['nlaporan']= $this->M_history->count_laporan_ukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/h_laporan_ukmukk', $data);
      $this->load->view('templates/footeradm');
    }
  // end history laporan

  // detail laporan kegiatan
  public function Detail_History_Laporan_Kegiatan_Universitas($kd_jrsn)
  {
    $data['title']= 'Detail Recap Laporan Kegiatan '.$kd_jrsn.'';
    $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
    $data['h_l_univ']=$this->M_history->get_laporan_univ($kd_jrsn);
    $this->load->view('templates/headeradm', $data);
    $this->load->view('templates/sidebaradm', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/h_detail_l_univ', $data);
    $this->load->view('templates/footeradm');
  }
  public function Detail_History_Laporan_Kegiatan_Fakultas($kd_jrsn)
  {
    $data['title']= 'Detail Recap Laporan Kegiatan '.$kd_jrsn.'';
    $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
    $data['h_l_fklts']=$this->M_history->get_laporan_fklts($kd_jrsn);
    $this->load->view('templates/headeradm', $data);
    $this->load->view('templates/sidebaradm', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/h_detail_l_fklts', $data);
    $this->load->view('templates/footeradm');
  }
  public function Detail_History_Laporan_Kegiatan_UKMUKK($kd_ukmkk)
  {
    $data['title']= 'Detail Recap Laporan Kegiatan '.$kd_ukmkk.'';
    $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
    $data['h_l_ukmukk']=$this->M_history->get_laporan_ukmukk($kd_ukmkk);
    $this->load->view('templates/headeradm', $data);
    $this->load->view('templates/sidebaradm', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/h_detail_l_ukmukk', $data);
    $this->load->view('templates/footeradm');
  }
  // end detail laporan kegiatan 
    public function Data_Pinjam()
    {
        $data['title'] = 'Data Peminjaman';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $data['aula_notyet']=$this->M_ormawa->get_belum_tanggalnya();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datapinjam', $data);
        $this->load->view('templates/footeradm');
    }
        

    public function Keluhan()
    {
        $data['title'] = 'Keluhan';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['userkeluhan']=$this->M_ormawa->tampil_keluhan();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/keluhan', $data);
        $this->load->view('templates/footeradm');
    }
    public function Edit_Profil()
    {
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        $data['title'] = 'Edit Profil';
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk(); 
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['msg'] = $this->session->flashdata('msg');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        if($this->form_validation->run()==false){
          $this->load->view('templates/headeradm', $data);
          $this->load->view('templates/sidebaradm', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('admin/editprofil', $data);
          $this->load->view('templates/footeradm');
        }else
        {
          $nama=$this->input->post('name');
          $this->db->set('nama', $nama);
          $this->db->where('username',  $this->session->userdata('username'));
          $this->db->update('user');
          $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Name has been changed!</div>');
          redirect('c_admin/Edit_Profil');
        }
    }
    public function Edit_Password()
    {
        $data['title'] = 'Edit Password';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $data['msg']=$this->session->flashdata('msg');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confrim New Password', 'required|trim|min_length[6]|matches[new_password1]');
        if($this->form_validation->run()==false){
          $this->load->view('templates/headeradm', $data);
          $this->load->view('templates/sidebaradm', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('admin/editpass', $data);
          $this->load->view('templates/footeradm');
        }else
          {
            $current_password=$this->input->post('current_password');
            $new_password=$this->input->post('new_password1');

            if($data['admin']['password']!=md5($current_password))
            {
              $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
              redirect('c_admin/Edit_Password');
            }else
              {
                if($current_password==$new_password)
                {
                  $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                  redirect('c_admin/Edit_Password');
                }else
                  {
                    $this->db->set('password', md5($new_password));
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password has been changed!</div>');
                    redirect('c_admin/Edit_Password');
                  }
              }
            }
    }
    function Cek_Data_Pengajuan_Universitas($kd_jrsn)
    {
      $data['title'] = 'Cek Data';
      $data['dataacc'] = $this->M_dana->tampil_data_dana_maupengajuanuniv($kd_jrsn);
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['user'] = $this->db->get_where('jurusan', ['kode_himpunan'=>$kd_jrsn]);
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/cekdatapaguuniv', $data);
      $this->load->view('templates/footeradm');
    }
    function Cek_Data_Pengajuan_Fakultas($kd_jrsn){
      $data['title'] = 'Cek Data';
      $data['dataacc'] = $this->M_dana->tampil_data_dana_maupengajuan($kd_jrsn);
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['user'] = $this->db->get_where('jurusan', ['kode_himpunan'=>$kd_jrsn]);
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/cekdatapagu', $data);
      $this->load->view('templates/footeradm');
    }
    function Cek_Data_Pengajuan_UKMUKK($kd_ukmukk){
      $data['title'] = 'Cek Data';
      $data['dataukmukk'] = $this->M_dana->tampil_data_dana_maupengajuanukmukk($kd_ukmukk);
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['user'] = $this->db->get_where('ukm_ukk', ['kode_ukmukk'=>$kd_ukmukk]);
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/cekdatapaguukmukk', $data);
      $this->load->view('templates/footeradm');
    }

    public function update_dana_awal(){
        $id_dana = $this->input->post('id_dana');
        $kd_jrsn = $this->input->post('kd_jrsn');
        $tahunakademik = $this->input->post('tahunakademik',true);
        $danaawal = $this->input->post('danaawal', true);
        $nPengajuan = 1;
        $statususer = 1;
        $danasisa = $this->input->post('danaawal', true);
        $this->M_dana->update_dana_awal($id_dana,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer);
        $this->M_dana->update_user_awal($kd_jrsn, $statususer);
        $this->session->set_flashdata('flashdana', 'Dana Ormawa berhasil diupdate');
        redirect('c_admin/Edit_Pagu_Fakultas');
    }
    public function update_dana_awal_univ(){
      $id_dana = $this->input->post('id_dana');  
      $kd_jrsn = $this->input->post('kd_jrsn');
      $tahunakademik = $this->input->post('tahunakademik',true);
      $danaawal = $this->input->post('danaawal', true);
      $nPengajuan = 1;
      $statususer = 1;
      $danasisa = $this->input->post('danaawal', true);
      
      $this->M_dana->update_dana_awal($id_dana,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer);
      $this->M_dana->update_user_awal($kd_jrsn, $statususer);
      $this->session->set_flashdata('flashdana', 'Dana Ormawa berhasil diupdate');
      redirect('c_admin/Edit_Pagu_Universitas');
  }
    public function update_dana_awal_ormawa(){
      $id_dana = $this->input->post('id_dana');
      $kd_ukmukk = $this->input->post('kd_ukmukk');
      $tahunakademik = $this->input->post('tahunakademik',true);
      $danaawal = $this->input->post('danaawal', true);
      $nPengajuan = 1;
      $statususer = 1;
      $danasisa = $this->input->post('danaawal', true);
      $uangawal = $this->M_dana->update_dana_awal_ukmukk($id_dana,$tahunakademik,$danaawal,$danasisa,$nPengajuan,$statususer);
      $updateusernya = $this->M_dana->update_user_awal1($kd_ukmukk, $statususer);
      $this->session->set_flashdata('flashdana', 'Dana Ormawa berhasil diupdate');
      redirect('c_admin/Edit_Pagu_UKMUKK');
  }
  function reset_akun_universitas(){
    $id_reset=$this->input->post('kd_jrsn');
    $id_detailuser=$this->input->post('id_dana');
    $statususer=1;
    $tahunakademik=0;
    $dana_awal=0;
    $dana_sisa=0;
    $nPengajuan=1;
    $bidang_fakultas=$this->M_dana->get_bidang_fakultas($id_reset)->row();
    $hapus_foto_bidangfak='./assets/img/bidang/'.$bidang_fakultas->image;
    if(is_readable($hapus_foto_bidangfak)&&unlink($hapus_foto_bidangfak)){
      $this->M_dana->hapus_anggota_fakultas($id_reset);
      $this->M_dana->hapus_bidang_fakultas($id_reset);
      $this->M_dana->hapus_proker_fakultas($id_reset);
      // $this->M_dana->hapus_datapengajuan($id_reset);
      $this->M_dana->do_reset_akun_fakultas_user($id_reset,$statususer);
      $this->M_dana->do_reset_akun_fakultas_tbdetail($id_detailuser,$statususer,$tahunakademik,$dana_awal,$dana_sisa,$nPengajuan);
      $this->session->set_flashdata('flashdana', 'Data Akun Ormawa berhasil direset. Jangan lupa untuk melakukan update dana kembali !');
      redirect('c_admin/Edit_Pagu_Universitas');
    }
  }
  function reset_akun_fakultas(){
    $id_reset=$this->input->post('kd_jrsn');
    $id_detailuser=$this->input->post('id_dana');
    $statususer=1;
    $tahunakademik=0;
    $dana_awal=0;
    $dana_sisa=0;
    $nPengajuan=1;
    $bidang_fakultas=$this->M_dana->get_bidang_fakultas($id_reset)->row();
    $hapus_foto_bidangfak='./assets/img/bidang/'.$bidang_fakultas->image;
    if(is_readable($hapus_foto_bidangfak)&&unlink($hapus_foto_bidangfak)){
      $this->M_dana->hapus_anggota_fakultas($id_reset);
      $this->M_dana->hapus_bidang_fakultas($id_reset);
      $this->M_dana->hapus_proker_fakultas($id_reset);
      // $this->M_dana->hapus_datapengajuan($id_reset);
      $this->M_dana->do_reset_akun_fakultas_user($id_reset,$statususer);
      $this->M_dana->do_reset_akun_fakultas_tbdetail($id_detailuser,$statususer,$tahunakademik,$dana_awal,$dana_sisa,$nPengajuan);
      $this->session->set_flashdata('flashdana', 'Data Akun berhasil direset. Jangan lupa untuk melakukan update dana kembali !');
      redirect('c_admin/Edit_Pagu_Fakultas');
    }
  }
  function reset_akun_ukmukk(){
    $id_reset=$this->input->post('kd_ukmukk');
    $statususer=1;
    $tahunakademik=0;
    $dana_awal=0;
    $dana_sisa=0;
    $nPengajuan=1;
    $bidang_ukmukk=$this->M_dana->get_bidang_ukmukk($id_reset)->row();
    $hapus_foto_bidangukmukk='./assets/img/bidang/'.$bidang_ukmukk->image;
    if(is_readable($hapus_foto_bidangukmukk)&&unlink($hapus_foto_bidangukmukk)){
      $this->M_dana->hapus_anggota_ukmukk($id_reset);
      $this->M_dana->hapus_bidang_ukmukk($id_reset);
      $this->M_dana->hapus_proker_ukmukk($id_reset);
      $this->M_dana->do_reset_akun_ukmukk_user($id_reset,$statususer);
      $this->M_dana->do_reset_akun_ukmukk_tbdetail($id_reset,$statususer,$tahunakademik,$dana_awal,$dana_sisa,$nPengajuan);
      $this->session->set_flashdata('flashdana', 'Data Akun berhasil direset. Jangan lupa untuk melakukan update dana kembali !');
      redirect('c_admin/Edit_Pagu_UKMUKK');
    }
  }
   public function data_universitas(){
      $data['title'] = 'Data DEMA-U/SEMA-U';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['univ'] = $this->Model_View->tampil_list_universitas();
   
      $data['fak'] = $this->Model_View->tampil_list_fakultas();
      $data['user'] = $this->Model_View->tampil_user_semaudemau();
   
      $myDataJson = []; 
      for ($i=0; $i<$data['user']->num_rows(); $i++) { 
        $username[$i]=$data['user']->result_array()[$i]['username'];
        // $nama_fakultas[$i]=$data['himpunan']->result_array()[$i]['parent_fakultas'];
        $kode_himpunan[$i]=$data['univ']->result_array()[$i]['kode_himpunan'];
        $nama_himpunan[$i]=$data['univ']->result_array()[$i]['nama_himpunan'];        
        $deskripsi[$i]=$data['univ']->result_array()[$i]['desc_himpunan'];
        $image[$i]=$data['univ']->result_array()[$i]['image'];
        $fakultas[$i]=$data['univ']->result_array()[$i]['parent_fakultas'];

        $myJson['user']=$username[$i];
        $myJson['kode_himpunan']=$kode_himpunan[$i];
        $myJson['nama_himpunan']=$nama_himpunan[$i];
        $myJson['deskripsi']=$deskripsi[$i];
        $myJson['image']=$image[$i];
        $myJson['fakultas']=$fakultas[$i];
        
        $myDataJson[]=$myJson;
      }

      // var_dump($myDataJson);
      // exit();

      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $data['universitas'] = $myDataJson;
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/universitas', $data);
      $this->load->view('templates/footeradm');
    }
    
    public function data_fakultas(){
        $data['title'] = 'Data Fakultas';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['fakultas'] = $this->Model_View->tampil_list_fakultas();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/fakultas', $data);
        $this->load->view('templates/footeradm');
    }

    public function data_himpunan(){
      $data['title'] = 'Data Himpunan';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
      $data['fak'] = $this->Model_View->tampil_list_fakultas();
      $data['users'] = $this->Model_View->tampil_user_himpunan();
      $myDataJson = []; 
      for ($i=0; $i<$data['users']->num_rows(); $i++) { 
        $username[$i]=$data['users']->result_array()[$i]['username'];
        // $nama_fakultas[$i]=$data['himpunan']->result_array()[$i]['parent_fakultas'];
        $kode_himpunan[$i]=$data['himpunan']->result_array()[$i]['kode_himpunan'];
        $nama_himpunan[$i]=$data['himpunan']->result_array()[$i]['nama_himpunan'];        
        $deskripsi[$i]=$data['himpunan']->result_array()[$i]['desc_himpunan'];
        $image[$i]=$data['himpunan']->result_array()[$i]['image'];
        $fakultas[$i]=$data['himpunan']->result_array()[$i]['parent_fakultas'];

        $myJson['user']=$username[$i];
        // $myJson['nama_fakultas']=$nama_fakultas[$i];
        $myJson['kode_himpunan']=$kode_himpunan[$i];
        $myJson['nama_himpunan']=$nama_himpunan[$i];
        $myJson['deskripsi']=$deskripsi[$i];
        $myJson['image']=$image[$i];
        $myJson['fakultas']=$fakultas[$i];
        
        $myDataJson[]=$myJson;
      }
      $data['datahimpunan']=$myDataJson;    

      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/himpunan', $data);
      $this->load->view('templates/footeradm');
  }

   public function data_demasemaf(){
      $data['title'] = 'Data DEMA-F/SEMA-F';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
      $data['fak'] = $this->Model_View->tampil_list_fakultas();
      $data['users'] = $this->Model_View->tampil_user_himpunan();
      $myDataJson = []; 
      
      for ($i=0; $i<$data['users']->num_rows(); $i++) { 
        $username[$i]=$data['users']->result_array()[$i]['username'];
        // $nama_fakultas[$i]=$data['himpunan']->result_array()[$i]['parent_fakultas'];
        $kode_himpunan[$i]=$data['himpunan']->result_array()[$i]['kode_himpunan'];
        $nama_himpunan[$i]=$data['himpunan']->result_array()[$i]['nama_himpunan'];        
        $deskripsi[$i]=$data['himpunan']->result_array()[$i]['desc_himpunan'];
        $image[$i]=$data['himpunan']->result_array()[$i]['image'];
        $fakultas[$i]=$data['himpunan']->result_array()[$i]['parent_fakultas'];

        $myJson['user']=$username[$i];
        // $myJson['nama_fakultas']=$nama_fakultas[$i];
        $myJson['kode_himpunan']=$kode_himpunan[$i];
        $myJson['nama_himpunan']=$nama_himpunan[$i];
        $myJson['deskripsi']=$deskripsi[$i];
        $myJson['image']=$image[$i];
        $myJson['fakultas']=$fakultas[$i];
        $myDataJson[]=$myJson;

      }
      $data['datahimpunan']=$myDataJson;    

      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/demasemaf', $data);
      $this->load->view('templates/footeradm');
  }


    public function data_user_himpunan(){
      $data['title'] = 'Data User Himpunan';
      $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      $data['himpunan'] = $this->Model_View->tampil_list_alljurusan1();
      $data['users'] = $this->Model_View->tampil_semua_userhimp();
      $data['count_puniv']= $this->M_dana->count_puniv();
      $data['count_pfklts']= $this->M_dana->count_pfklts();
      $data['count_pukmukk']= $this->M_dana->count_pukmukk();
      $data['count_luniv']= $this->M_dana->count_luniv();
      $data['count_lfklts']= $this->M_dana->count_lfklts();
      $data['count_lukmukk']= $this->M_dana->count_lukmukk();
      $this->load->view('templates/headeradm', $data);
      $this->load->view('templates/sidebaradm', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/userhimpunan', $data);
      $this->load->view('templates/footeradm');
  }
    
    public function data_kegiatan_himpunan(){
        $data['title'] = 'Data Kegiatan Organisasi Mahasiswa';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();        
        $data['proker'] = $this->Model_View->tampil_kegiatan_allhimp();        
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kegiatan_himpunan', $data);
        $this->load->view('templates/footeradm');
  }
  
  public function data_kegiatan_ukmukk(){
        $data['title'] = 'Data Kegiatan UKM/UKK';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();        
        $data['uproker'] = $this->Model_View->tampil_kegiatan_allukmukk();        
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kegiatan_ukmukk', $data);
        $this->load->view('templates/footeradm');
  }

   public function data_prestasi_himp(){
        $data['title'] = 'Data Prestasi';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
        $data['prestasi'] = $this->Model_View->tampil_prestasi_allhimpunan();        
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/prestasi_himp', $data);
        $this->load->view('templates/footeradm');
  }

   public function data_prestasi_ukmukk(){
        $data['title'] = 'Data Prestasi UKM/UKK';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
        $data['uprestasi'] = $this->Model_View->tampil_prestasi_allukmukk();        
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/prestasi_ukmukk', $data);
        $this->load->view('templates/footeradm');
  }



  public function tambah_data_fakultas(){
      $kode_fakultas = $this->input->post('kode_fakultas');
      $nama_fakultas = $this->input->post('nama_fakultas');
      $deskripsi = $this->input->post('deskripsi');
    //   $visi = $this->input->post('visi');
    //   $misi = $this->input->post('misi');

      $data =  array(
          'kode_fakultas' => $kode_fakultas,
          'nama_fakultas'=> $nama_fakultas,
          'deskripsi' => $deskripsi,
        //   'visi' => $visi,
        //   'misi' => $misi
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
      // $this->M_ormawa->update_fakultas($kode_fakultas, $nama_fakultas);
      $this->Model_View->update_fakultas($kode_fakultas,$nama_fakultas,$deskripsi,$visi,$misi);
      $this->session->set_flashdata('flashormawa','Data Ormawa berhasil diperbaharui!');
      redirect('c_admin/data_fakultas');
  }


  public function delete_data_fakultas(){
  $kode_fakultas = $this->uri->segment(3);
  $this->Model_View->delete_fakultas($kode_fakultas);
  // $this->M_dana->delete_namafakultas($kode_himpunan);
  $this->M_ormawa->delete_fakultas($kode_fakultas);
  $this->session->set_flashdata('flashormawa','Data Ormawa berhasil dihapus!');
  // $this->session->set_flashdata('msg','<div class="alert alert-success">Anggota Himpunan Dihapus</div>');
  redirect('c_admin/data_fakultas');
  }


  public function tambah_data_himpunan(){
      $kode_himpunan = strtoupper($this->input->post('kode_himpunan'));
      $nama_himpunan = $this->input->post('nama_himpunan');
      $deskripsi = $this->input->post('desc_himpunan');      
      $nama = $this->input->post('nama');

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = 0;
      $is_active = 1;
      $statususer=1;      
      $telp=$this->input->post('telp');      
      $parent_fakultas = $this->input->post('parent_fakultas');
      $image = $this->input->post('image');

      if ($_FILES['image']['size'] <= 0){
          
          if($parent_fakultas == ''){
          $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          
      );
      $datadana = array(
        'kd_jrsn'=> $kode_himpunan,
        'statususer' => $statususer,
        'jurusan' => $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );    
      }else{
          $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          'parent_fakultas' => $parent_fakultas,
      );
      $datadana = array(
        'kd_jrsn'=> $kode_himpunan,
        'kd_fklts' => $parent_fakultas,
        'statususer' => $statususer,
        'jurusan' => $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );
       }
      } else{
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
          'image' => $image,
      );
      $datadana = array(
        'kd_jrsn'=> $kode_himpunan,
        'statususer' => $statususer,
        'jurusan' => $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );    
      }
      else{
          $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          'parent_fakultas' => $parent_fakultas,
          'image' => $image
      );
      $datadana = array(
        'kd_jrsn'=> $kode_himpunan,
        'kd_fklts' => $parent_fakultas,
        'statususer' => $statususer,
        'jurusan' => $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );
       }
      }
      // $this->M_dana->tambah_datauser($datadana);
      $this->Model_View->tambah_himpunan($data);
      $this->Model_View->tambah_detailhimpunan($datadana);
      $this->Model_View->tambah_user_himpunan($datauser);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil ditambahkan!');
      redirect('c_admin/data_himpunan');
  }

  public function tambah_data_demasemaf(){
      $kode_himpunan = strtoupper($this->input->post('kode_himpunan'));
      $nama_himpunan = $this->input->post('nama_himpunan');
      $deskripsi = $this->input->post('desc_himpunan');      
      $nama = $this->input->post('nama');

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = 0;
      $is_active = 1;
      $statususer=1;      
      $telp=$this->input->post('telp');      
      $parent_fakultas = $this->input->post('parent_fakultas');
      $image = $this->input->post('image');

      if ($_FILES['image']['size'] <= 0){
        if($parent_fakultas == ''){
          $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          
          // 'statususer' => $statususer,
      );
      $datadana = array(
          'kd_jrsn'=> $kode_himpunan,
          'jurusan'=> $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );    
      }
      else{
          $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          'parent_fakultas' => $parent_fakultas,
          
      );
      $datadana = array(
        'kd_jrsn'=> $kode_himpunan,
        'kd_fklts' => $parent_fakultas,
        'jurusan' => $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );
       }
      } else{
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
          'image' => $image,
          // 'statususer' => $statususer,
      );
      $datadana = array(
          'kd_jrsn'=> $kode_himpunan,
          'jurusan'=> $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );    
      }
      else{
          $data =  array(
          'kode_himpunan' => $kode_himpunan,
          'nama_himpunan'=> $nama_himpunan,
          'desc_himpunan' => $deskripsi,
          'parent_fakultas' => $parent_fakultas,
          'image' => $image
      );
      $datadana = array(
        'kd_jrsn'=> $kode_himpunan,
        'kd_fklts' => $parent_fakultas,
        'jurusan' => $deskripsi
      );
      $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kode_himpunan,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );
       }
      }
      // $this->M_dana->tambah_datauser($datadana);
      $this->Model_View->tambah_himpunan($data);
      $this->Model_View->tambah_detailhimpunan($datadana);
      $this->Model_View->tambah_user_himpunan($datauser);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil ditambahkan!');
      redirect('c_admin/data_demasemaf');
  
  }


public function edit_data_himpunan(){
      $param = $this->input->get('var1');     
      $kode_himpunan = $this->input->post('kode_himpunan');
      $nama_himpunan = $this->input->post('nama_himpunan');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');
      $parent_fakultas = $this->input->post('parent_fakultas');
      $username = $this->input->post('username');
      $kode_himp = $this->input->post('kode_himp');
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
      $this->Model_View->edit_useraja($kode_himpunan,$username);
      $this->Model_View->edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$newimage);
      }else{
      $this->Model_View->edit_useraja($kode_himpunan,$username);
      $this->Model_View->edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$imageold);
      }
      // $this->M_dana->edit_datauser($kode_himpunan,$parent_fakultas);
      
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil diperbaharui!');
      if ($param=='univ') {
        redirect('c_admin/data_universitas');
      }      
      else{
       redirect('c_admin/data_himpunan');
      }
      // elseif ($param='demasemaf') {
      //  redirect('c_admin/data_himpunan');
      // }
      
  }

    public function edit_data_demasemaf(){
      $kode_himpunan = $this->input->post('kode_himpunan');
      $nama_himpunan = $this->input->post('nama_himpunan');
      $deskripsi = $this->input->post('deskripsi');
      $visi = $this->input->post('visi');
      $misi = $this->input->post('misi');
      $parent_fakultas = $this->input->post('parent_fakultas');
      $username = $this->input->post('username');
      $kode_himp = $this->input->post('kode_himp');
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
      $this->Model_View->edit_useraja($kode_himpunan,$username);
      $this->Model_View->edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$image);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil diperbaharui!');
      redirect('c_admin/data_demasemaf');
  }
}

  public function delete_data_himpunan(){
  $kode_himpunan = $this->input->get('var1');
  $username = $this->input->get('var2');  
  // var_dump($kode_himpunan);
  // var_dump($username);
  // exit();
  $this->Model_View->delete_himpunan($kode_himpunan);
  $this->Model_View->delete_userhimpunan($username);
  $this->M_dana->delete_datauser($kode_himpunan);
  $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil dihapus!');
  redirect('c_admin/data_himpunan');
  }

  public function delete_data_demasemaf(){
  $kode_himpunan = $this->input->get('var1');
  $username = $this->input->get('var2');  
  // var_dump($kode_himpunan);
  // var_dump($username);
  // exit();
  $this->Model_View->delete_himpunan($kode_himpunan);
  $this->Model_View->delete_userhimpunan($username);
  $this->M_dana->delete_datauser($kode_himpunan);
  $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil dihapus!');
  redirect('c_admin/data_demasemaf');
  }

  public function tambah_data_user() {
      $nama = $this->input->post('nama');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = 0;
      $is_active = 1;
      $statususer=1;
      $kd_himp = $this->input->post('kode_himp');
      $telp=$this->input->post('telp');
      

      $data = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,
          'kode_himp' => $kd_himp,
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
      );
      $this->Model_View->tambah_user_himpunan($data);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil ditambahkan!');
      redirect('c_admin/data_user_himpunan');
  }

  public function delete_data_user(){
      $id_user = $this->uri->segment(3);
      $this->Model_View->delete_user_himpunan($id_user);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil dihapus!');
      // $this->session->set_flashdata('msg','<div class="alert alert-success">Data User Himpunan Dihapus</div>');
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
      $telp=$this->input->post('telp');

      $this->Model_View->edit_user_himpunan($id_user,$nama,$email,$telp,$username,md5($password));
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil diperbaharui!');
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
    $this->M_dana->pengajuanditolaktbpengajuan($kd_jrsn, $statususer7);
    $this->M_dana->alasantidakdiacc($kd_jrsn, $statususer7, $danasisa, $nPengajuan7,$pesangagal);
    $this->session->set_flashdata('flashpengajuan','Pengajuan berhasil dihapus!');
    redirect('c_admin/Cek_Pengajuan_Fakultas');
  }
  public function tolak_pengajuan_ukmukk(){
    $kd_ukmkk=$this->input->post('kd_ukmkk');
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
    $this->M_dana->pengajuantidakdiaccupdate_ukmukk($kd_ukmkk, $statususer7);
    $this->M_dana->pengajuanditolaktbpengajuan_ukmukk($kd_ukmkk, $statususer7);
    $this->M_dana->alasantidakdiacc_ukmukk($kd_ukmkk, $statususer7, $danasisa, $nPengajuan7,$pesangagal);
    $this->session->set_flashdata('flashpengajuan','Pengajuan berhasil dihapus!');
    redirect('c_admin/Cek_Pengajuan_UKMUKK');
  }
  function update_danaacc_univ(){
    $kd_jrsn=$this->input->post('kd_jrsn');
    $danasisa=$this->input->post('danasisa');
    $old_danaacc=$this->input->post('danaacc');
    $danaupdate=$this->input->post('danaupdate');
    $a=$danasisa;
    $b=$old_danaacc;
    $c=$danaupdate;
    $x=($a+$b)-$c;
    $danaacc=$c;
    $id_pengajuan=$this->input->post('id_pengajuan');
    $this->M_dana->update_danayangdiacc($id_pengajuan,$x,$danaacc);
    $this->M_dana->update_danayangdiaccdetail($kd_jrsn,$x);
    $this->session->set_flashdata('flashdana', 'Dana ACC Ormawa telah diperbaharui');
    redirect('c_admin/List_Pengajuan_Universitas');
  }
  function update_danaacc(){
    $kd_jrsn=$this->input->post('kd_jrsn');
    $danasisa=$this->input->post('danasisa');
    $old_danaacc=$this->input->post('danaacc');
    $danaupdate=$this->input->post('danaupdate');
    $a=$danasisa;
    $b=$old_danaacc;
    $c=$danaupdate;
    $x=($a+$b)-$c;
    $danaacc=$c;
    $id_pengajuan=$this->input->post('id_pengajuan');
    $this->M_dana->update_danayangdiacc($id_pengajuan,$x,$danaacc);
    $this->M_dana->update_danayangdiaccdetail($kd_jrsn,$x);
    $this->session->set_flashdata('flashdana','Dana ACC Ormawa telah diperbaharui');
    redirect('c_admin/List_Pengajuan_Fakultas');
  }
  function update_danaacc_ukmukk(){
    $kd_ukmukk=$this->input->post('kd_ukmkk');
    $danasisa=$this->input->post('danasisa');
    $old_danaacc=$this->input->post('danaacc');
    $danaupdate=$this->input->post('danaupdate');
    $a=$danasisa;
    $b=$old_danaacc;
    $c=$danaupdate;
    $x=($a+$b)-$c;
    $danaacc=$c;
    $id_pengajuan_ukmukk=$this->input->post('id_pengajuan_ukmukk');
    $this->M_dana->update_danayangdiacc_ukmukk($id_pengajuan_ukmukk,$x,$danaacc);
    $this->M_dana->update_danayangdiaccdetail_ukmukk($kd_ukmukk,$x);
    $this->session->set_flashdata('flashdana','Dana ACC Ormawa telah diperbaharui');
    redirect('c_admin/List_Pengajuan_UKMUKK');
  }
  public function data_ukmukk(){
        $data['title'] = 'Data UKM/UKK';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['ukmukk'] = $this->Model_View->tampil_list_ukmukk();
        $data['users'] = $this->Model_View->tampil_user_ukmukk();
        $myDataJson = []; 
        

        for ($i=0; $i<$data['users']->num_rows(); $i++) { 
        $username[$i]=$data['users']->result_array()[$i]['username'];        
        $kode_ukmukk[$i]=$data['ukmukk']->result_array()[$i]['kode_ukmukk'];
        $nama_ukmukk[$i]=$data['ukmukk']->result_array()[$i]['nama_ukmukk'];        
        $desc_ukmukk[$i]=$data['ukmukk']->result_array()[$i]['desc_ukmukk'];
        $image[$i]=$data['ukmukk']->result_array()[$i]['image'];        

        $myJson['user']=$username[$i];        
        $myJson['kode_ukmukk']=$kode_ukmukk[$i];
        $myJson['nama_ukmukk']=$nama_ukmukk[$i];
        $myJson['desc_ukmukk']=$desc_ukmukk[$i];
        $myJson['image']=$image[$i];
        
        $myDataJson[]=$myJson;

      }
      $data['dataukmukk']=$myDataJson;

        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ukmukk', $data);
        $this->load->view('templates/footeradm');
  }


    public function data_userukmukk(){
        $data['title'] = 'Data User UKM/UKK';
        $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $data['ukmukk'] = $this->Model_View->tampil_list_ukmukk();
        $data['userukmukk'] = $this->Model_View->tampil_user_ukmukk();
        $data['count_puniv']= $this->M_dana->count_puniv();
        $data['count_pfklts']= $this->M_dana->count_pfklts();
        $data['count_pukmukk']= $this->M_dana->count_pukmukk();
        $data['count_luniv']= $this->M_dana->count_luniv();
        $data['count_lfklts']= $this->M_dana->count_lfklts();
        $data['count_lukmukk']= $this->M_dana->count_lukmukk();
        $this->load->view('templates/headeradm', $data);
        $this->load->view('templates/sidebaradm', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_ukmukk', $data);
        $this->load->view('templates/footeradm');
    }
    
    public function tambahdata_ukmukk(){
        $kode_ukmukk = strtoupper($this->input->post('kode_ukmukk'));        
        $nama_ukmukk = $this->input->post('nama_ukmukk');
        $desc_ukmukk = $this->input->post('desc_ukmukk');
        // $visi_ukmukk = $this->input->post('visi_ukmukk');
        // $misi_ukmukk = $this->input->post('misi_ukmukk');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = 2;
        $is_active = 1;
        $statususer=1;      
        $telp=$this->input->post('telp');             
        $image = $this->input->post('image');

        if ($_FILES['image']['size'] <= 0){
          $data =  array(
            'kode_ukmukk' => $kode_ukmukk,
            'nama_ukmukk'=> $nama_ukmukk,
            'desc_ukmukk' => $desc_ukmukk,
            // 'visi_ukmukk' => $visi_ukmukk,
            // 'misi_ukmukk' => $misi_ukmukk,
            // 'image' => $image
        );
        $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,          
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
          'kode_himp' => $kode_ukmukk,
        );
        $datadana=array(
          'kd_ukmukk' => $kode_ukmukk,
          'nama_ukmukk' => $nama_ukmukk,
          'statususer' => '1',
          'detail_ukmukk' => $desc_ukmukk
        );
        } else{
        $config['upload_path']='./assets/img/ukmukk';
        $config['allowed_types']='jpg|gif|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('image')){
            echo "Gagal Menambahkan UKM/UKK"; die();
        }else{
            $image=$this->upload->data('file_name');
        }

        $data =  array(
            'kode_ukmukk' => $kode_ukmukk,
            'nama_ukmukk'=> $nama_ukmukk,
            'desc_ukmukk' => $desc_ukmukk,
            // 'visi_ukmukk' => $visi_ukmukk,
            // 'misi_ukmukk' => $misi_ukmukk,
            'image' => $image
        );
        $datauser = array(
          'nama' => $nama,
          'username' => $username,
          'password' => md5($password),
          'role' => $role,          
          'is_active' => $is_active,
          'insert_date' => date('Y-m-d H:i:s'),
          'statususer' => $statususer,
          'telp' =>$telp,
          'kode_himp' => $kode_ukmukk,
        );
        $datadana=array(
          'kd_ukmukk' => $kode_ukmukk,
          'nama_ukmukk' => $nama_ukmukk,
          'statususer' => '1',
          'detail_ukmukk' => $desc_ukmukk
        );
        
    }
        $this->Model_View->tambah_ukmukk($data,$datadana);        
        $this->Model_View->tambah_userukmukk($datauser);
        $this->session->set_flashdata('flashormawahimp','Data UKM/UKK berhasil ditambahkan!');
        redirect('c_admin/data_ukmukk');
    }
    public function editdata_ukmukk(){
        $kode_ukmukk = $this->input->post('kode_ukmukk');
        $nama_ukmukk = $this->input->post('nama_ukmukk');
        $desc_ukmukk = $this->input->post('desc_ukmukk');
        $visi_ukmukk = $this->input->post('visi_ukmukk');
        $misi_ukmukk = $this->input->post('misi_ukmukk');
        $username = $this->input->post('username');        
        $image = $this->input->post('image');
        $imageold = $this->input->post('imageold');

        if (!empty($_FILES["image"]["name"])){
        $config['upload_path']='./assets/img/ukmukk';
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
            $path = './assets/img/ukmukk/'.$imageold.'';
            unlink($path);
          }
        }
      $this->M_dana->edit_datauserukmukk($kode_ukmukk,$nama_ukmukk);
      // $this->Model_View->edit_useraja($kode_himpunan,$username);
      $this->Model_View->update_ukmukk($kode_ukmukk,$nama_ukmukk,$desc_ukmukk,$visi_ukmukk,$misi_ukmukk,$newimage);
      }else{
        $this->M_dana->edit_datauserukmukk($kode_ukmukk,$nama_ukmukk);
      // $this->Model_View->edit_useraja($kode_himpunan,$username);
      $this->Model_View->update_ukmukk($kode_ukmukk,$nama_ukmukk,$desc_ukmukk,$visi_ukmukk,$misi_ukmukk,$imageold);
      }
      
        $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil diperbaharui!');
        redirect('c_admin/data_ukmukk');
            
    }

    public function delete_data_ukmukk(){
    $kode_ukmukk = $this->input->get('var1');
    $username = $this->input->get('var2'); 

    $this->Model_View->delete_ukmukk($kode_ukmukk);
    $this->Model_View->delete_userukmukk($username);
    $this->M_dana->delete_datauserukmukk($kode_ukmukk);
    $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil dihapus!');
    // $this->session->set_flashdata('msg','<div class="alert alert-success">Data Himpunan Dihapus</div>');
    redirect('c_admin/data_ukmukk');
    }

    public function tambah_user_ukmukk() {
        $nama = $this->input->post('nama');
        // $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $kode_himp=$this->input->post('kode_himp');
        $telp=$this->input->post('telp');
        $role = 2;
        $is_active = 1;
        $statususer=1;
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password),
            'role' => $role,
            'kode_himp'=>$kode_himp,
            'is_active' => $is_active,
            'statususer' =>$statususer,
            'insert_date' => date('Y-m-d H:i:s'),
            'telp' => $telp,
        );
        $this->Model_View->tambah_userukmukk($data);
        $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil ditambahkan!');
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
      $telp=$this->input->post('telp');

      $this->Model_View->edit_ukmuser($telp,$id_user,$nama,$email,$username,md5($password));
      $this->session->set_flashdata('flashcoba','Data Ormawa berhasil diperbaharui!');
      redirect('c_admin/data_userukmukk');
  }
  
  public function delete_data_userukmukk(){
      $id_user = $this->uri->segment(3);
      $this->Model_View->delete_user_ukmukk($id_user);
      $this->session->set_flashdata('flashormawahimp','Data Ormawa berhasil dihapus!');
      // $this->session->set_flashdata('msg','<div class="alert alert-success">Data User UKM/UKK Dihapus</div>');
      redirect('c_admin/data_userukmukk');
  }

  public function data_admin()
  {
    $data['title'] = 'Data Admin';
    $data['himpunan'] = $this->Model_View->tampil_list_alljurusan();
    $data['admin'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
    $data['users'] = $this->Model_View->tampil_admin();
    $data['count_puniv']= $this->M_dana->count_puniv();
    $data['count_pfklts']= $this->M_dana->count_pfklts();
    $data['count_pukmukk']= $this->M_dana->count_pukmukk();
    $data['count_luniv']= $this->M_dana->count_luniv();
    $data['count_lfklts']= $this->M_dana->count_lfklts();
    $data['count_lukmukk']= $this->M_dana->count_lukmukk();
    $this->load->view('templates/headeradm', $data);
    $this->load->view('templates/sidebaradm', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/admin', $data);
    $this->load->view('templates/footeradm');
  }
  public function tambah_data_admin()
  {
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = 1;
    $is_active = 1;
    $statususer = 1;
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
    $this->Model_View->tambah_admin($data);
    redirect('c_admin/data_admin');
  }

  public function delete_data_admin()
  {
    $id_user = $this->uri->segment(3);
    $this->Model_View->delete_admin($id_user);
    $this->session->set_flashdata('msg', '<div class="alert alert-success">Data User Himpunan Dihapus</div>');
    redirect('c_admin/data_admin');
  }

  public function edit_admin()
  {
    $id_user = $this->input->post('id_user');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    // $role = 1;
    // $is_active = 1;
    // $kd_himp = $this->input->post('kode_himp');

    $this->Model_View->edit_admin($id_user, $nama, $email, $username, md5($password));
    redirect('c_admin/data_admin');
  }
  function hapus_pengajuan_jrsn(){
    $kd_jrsn=$this->input->post('kd_jrsn');
    $data=$this->M_dana->getDataByID($kd_jrsn)->row();
    $statususer7=2;
    $nPengajuan=$this->input->post('nPengajuan');
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
      $hapusspj='./assets/uploads/suratpengajuan/'.$data->suratpengajuan;
      $hapusrkg='./assets/uploads/rinciankegiatan/'.$data->rinciankegiatan;
      $hapusrkakl='./assets/uploads/rkakl/'.$data->rkakl;
      $hapustor='./assets/uploads/tor/'.$data->tor;
        if(is_readable($hapusspj)&&is_readable($hapusrkg)&&is_readable($hapusrkakl)&&is_readable($hapustor)&&unlink($hapusspj)&&unlink($hapusrkg)&&unlink($hapustor)&&unlink($hapusrkakl)){
        $this->M_dana->hapusFile($kd_jrsn);
        $this->M_dana->pengajuantidakdiaccupdate($kd_jrsn, $statususer7);
        $this->M_dana->pengajuanditolaktbdetailuser($kd_jrsn, $statususer7,$nPengajuan7);
        redirect(base_url('c_admin/Cek_Pengajuan_Fakultas'));
      }
      else{
        echo "ulangi";
      }
  }
}