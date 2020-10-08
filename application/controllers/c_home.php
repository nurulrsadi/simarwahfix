<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_home extends CI_Controller
{
	   function __construct(){
        parent::__construct();	
            $this->load->model('Model_View');

	}
	public function index()
	{
    $data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
    $data['fakultas_new'] = $this->Model_View->tampil_list_fakultaskecuali()->result();
		// $data['jurusan'] = $this->Model_View->tampil_list_jurusan()->result();
		$data['himpunan'] = $this->Model_View->tampil_allhimpunan();
		$this->load->view('home',$data);
	}
	public function demau()
	{
		$this->load->view('demau');
	}
	public function fakultas()
	{
		$kode_fakultas = $this->uri->segment(3);
		$data['jurusan'] = $this->Model_View->tampil_list_jurusan($kode_fakultas);
		$data['fakultas'] = $this->Model_View->tampil_detail_fakultas($kode_fakultas);
		$this->load->view('fakultas',$data);
  }
  
  public function fakultas_new()
  {
    $kode_fakultas = $this->uri->segment(3);
		$data['jurusan'] = $this->Model_View->tampil_list_jurusan($kode_fakultas);
    $data['fakultas_new'] = $this->Model_View->tampil_list_fakultaskecuali()->result();
		$this->load->view('fakultas',$data);
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

		$this->load->view('himpunan',$data);
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function ormawa()
	{
		$data['himpunan'] = $this->Model_View->tampil_allhimpunan();
		$data['fakultas'] = $this->Model_View->tampil_list_fakultas()->result();
		$this->load->view('ormawa',$data);
	}
	public function semau()
	{
		$this->load->view('semaun');
	}
	public function semuaukm()
	{
		$this->load->view('semuaukm');
	}
	public function ukmaja()
	{
		$this->load->view('ukmaja');
	}
}
