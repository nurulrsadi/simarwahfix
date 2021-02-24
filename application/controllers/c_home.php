<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_home extends CI_Controller
{
	   function __construct(){
        parent::__construct();	
            $this->load->model('Model_View');
            $this->load->model('M_data');

	}
	public function index()
	{		
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
		// $data['jurusan'] = $this->Model_View->tampil_list_jurusan()->result();
		$data['himpunan'] = $this->Model_View->tampil_allhimpunan();	
		$data['semua_ukmukk'] = $this->Model_View->tampil_semua_ukmukk();
		$data['kegiatan'] = $this->Model_View->tampil_kegiatan_allhimp();
		$data['kegiatan_ukmukk'] = $this->Model_View->tampil_kegiatan_allukmukk();
		$this->load->view('templates/navbarhome', $data);
		$this->load->view('home',$data);
		$this->load->view('templates/footerhome', $data);
	}

	public function fakultas()
	{
		$kode_fakultas = $this->uri->segment(3);
		$data['jurusan'] = $this->Model_View->tampil_list_jurusan($kode_fakultas);		
		$data['fakultas'] = $this->Model_View->tampil_detail_fakultas($kode_fakultas);
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();		
		$this->load->view('fakultas',$data);
		$this->load->view('templates/footerhome', $data);
	}
	public function himpunan()
	{
		$kode_jurusan = $this->uri->segment(3);
		$data['sekben'] = $this->Model_View->tampil_bendahara_sekretaris($kode_jurusan)->result();
		$data['ketua'] = $this->Model_View->tampil_ketua($kode_jurusan)->result();
		$data['ketuabidang'] = $this->Model_View->tampil_ketua_bidang($kode_jurusan)->result();
		$data['anggota'] = $this->Model_View->tampil_anggota($kode_jurusan)->result();
		$data['himpunan'] = $this->Model_View->tampil_himpunan($kode_jurusan)->result();
		$data['bidang'] = $this->Model_View->tampil_bidang($kode_jurusan)->result();
		$data['kegiatan'] = $this->Model_View->tampil_kegiatan_himp($kode_jurusan);
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
        $data['prestasi'] = $this->Model_View->tampil_prestasi_himpunan($kode_jurusan);
		$this->load->view('himpunan',$data);
		$this->load->view('templates/footerhome', $data);
	}

	public function login()
	{
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$this->load->view('login');
		$this->load->view('templates/footerhome', $data);
	}
	public function ormawa()
	{
		$data['himpunan'] = $this->Model_View->tampil_allhimpunan();
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
		$this->load->view('ormawa',$data);
		$this->load->view('templates/footerhome', $data);
	}

	public function semuaukm()
	{
		$data['semua_ukmukk'] = $this->Model_View->tampil_semua_ukmukk();
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
		$this->load->view('semuaukm', $data);
		$this->load->view('templates/footerhome', $data);
	}
	public function ukmaja()
	{
		$kode_ubidang = $this->uri->segment(3);
		$data['usekben'] = $this->Model_View->tampil_usekben($kode_ubidang)->result();
		$data['uketua'] = $this->Model_View->tampil_uketua($kode_ubidang)->result();
		$data['uketuabidang'] = $this->Model_View->tampil_ukabid($kode_ubidang)->result();
		$data['uanggota'] = $this->Model_View->tampil_uanggota($kode_ubidang)->result();
		$data['ukm_ukk'] = $this->Model_View->tampil_ukmukk($kode_ubidang)->result();
		$data['ubidang'] = $this->Model_View->tampil_ubidang($kode_ubidang)->result();
		$data['kegiatan_ukmukk'] = $this->Model_View->tampil_ukegiatan($kode_ubidang);
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
		$data['uprestasi'] = $this->Model_View->tampil_prestasi_ukmukk($kode_ubidang);
		$this->load->view('ukmaja',$data);
		$this->load->view('templates/footerhome', $data);


		// $data['kegiatan'] = $this->Model_View->tampil_kegiatan($kode_jurusan);
	}
	public function aulasc()
	{
		$data['fakultasfooter'] = $this->Model_View->tampil_list_fakultas()->result();
		$this->load->view('aulasc');
		$this->load->view('templates/footerhome', $data);
	}
}
