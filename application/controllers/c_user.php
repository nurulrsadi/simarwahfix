<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_user extends CI_Controller
{
function __construct(){
    parent::__construct();
    $this->load->model('M_data');
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
    $cek = $this->Model_View->cek_datahimp($kode_himp_sess);
    if($cek -> num_rows() == 1){
    $sess_data['data_himpunan'] = "true";
    $this->session->set_userdata($sess_data);
    }else{
    $sess_data['data_himpunan'] = "false";
    $this->session->set_userdata($sess_data);
    }

    $ceksess = $this->session->userdata('data_himpunan');
    $data['anggota'] = $this->Model_View->tampil_all_anggota($kode_himp_sess);
    $data['datahimpunan'] = $this->Model_View->tampil_himpunan($kode_himp_sess);
    $data['bidangbidang'] = $this->Model_View->tampil_bidang($kode_himp_sess);

    $data['title'] = 'Edit Profile';
    $this->load->view('templates/header', $data);
    $this->load->view('user/index',$data);
    $this->load->view('templates/sidebaruser');
    $this->load->view('templates/footer');
    }

}
    public function Pagu_Anggaran()
    { 
        if($this->session->userdata('status') != "login"){
        redirect(base_url("c_home/login"));
    }
        else{
            // $uid = get_userdata("id_user");
            // $this->load->model('M_data');
            // $usr =$this->M_data->tampil_data($uid);
            // $session = $this->session->userdata('id_user');
            // $loginsession = $this->session->userdata('username');
            $data = array(
                'title' =>'Pagu Anggaran',
                // 'user' => $usr,
                'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(),
                // 'datauser' =>  $this->M_data->tampil_user($loginsession),
                // 'user' => $this->db->get_where('user', ['id_user' => $session])->row_array(),
            );
            $this->load->view('templates/header', $data);
            $this->load->view('user/pengajuanuang', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function Verifikasi_Data()
    {
        $data=array(
            'title' => 'Verifikasi Pencairan Dana',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/dicekadmindulu');
        $this->load->view('templates/sidebaruser');
        $this->load->view('templates/footer');
    }
    public function Pinjam_Aula()
    {
        $data=array(
            'title' => 'Peminjaman Aula SC',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/pinjamaula');
        $this->load->view('templates/sidebaruser');
        $this->load->view('templates/footer');
    }
    public function Guide_HMJ()
    {
        $data=array(
            'title' => 'Cara menggunakan Website SIMARWAH',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        );
        $this->load->view('templates/header', $data);
        $this->load->view('user/userguide', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/footer');
    }
    public function Keluhan()
    {
        $data=array(
            'title' => 'Keluhan',
            'user' => $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array(), 
        );
        $data['title'] = 'Keluhan';
        $this->load->view('templates/header', $data);
        $this->load->view('user/keluhan', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahdata_ormawa()
    {
        $kode_himp_sess = $this->session->userdata('kode_himp_sess');

        $nm_himp = $_POST['nm_himp'];
        $tentang_himp = $_POST['tentang_himp'];
        $visi_himp = $_POST['visi_himp'];
        $misi_himp = $_POST['misi_himp'];
        $ketua_himp = $_POST['ketua_himp'];
        $wakil_himp = $_POST['wakil_himp'];
        $bendahara_himp = $_POST['bendahara_himp'];
        $sekretaris_himp = $_POST['sekretaris_himp'];
        $kode_himp = $kode_himp_sess;
            // $kode_bidang_anggota = strtoupper($_POST['kode_bidang_anggota']);

        $himpunan = array(
            'nm_himp' => $nm_himp,
            'tentang_himp' => $tentang_himp,
            'visi_himp' => $visi_himp,
            'misi_himp' => $misi_himp,
            'ketua_himp' => $ketua_himp,
            'wakil_himp' => $wakil_himp,
            'sekretaris_himp' => $sekretaris_himp,
            'bendahara_himp' => $bendahara_himp,
            'kode_himp' => $kode_himp
        );

        $datahimpunan = $this->M_data->save_himpunan($himpunan);
        if($datahimpunan){ // Jika sukses
        echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
        }else{ // Jika gagal
        echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
    }
    }

    public function update_ormawa(){
        // $this->form_validation->set_rules('id_user', 'id_user', 'required');
        // $this->form_validation->set_rules('pemilik', 'pemilik', 'required');
    $kode_himp_sess = $this->session->userdata('kode_himp_sess');

    $nm_himp = $this->input->post('nm_himp');
    $tentang_himp = $this->input->post('tentang_himp');
    $visi_himp = $this->input->post('visi_himp');
    $misi_himp = $this->input->post('misi_himp');
    $ketua_himp = $this->input->post('ketua_himp');
    $wakil_himp = $this->input->post('wakil_himp');
    $sekretaris_himp = $this->input->post('sekretaris_himp');
    $bendahara_himp = $this->input->post('bendahara_himp');

    $himpunan = array(
        'nm_himp' => strtoupper($nm_himp),
        'tentang_himp' => $tentang_himp,
        'visi_himp' => $visi_himp,
        'misi_himp' => $misi_himp,
        'ketua_himp' => $ketua_himp,
        'wakil_himp' => $wakil_himp,
        'sekretaris_himp' => $sekretaris_himp,
        'bendahara_himp' => $bendahara_himp,
    );

    $updatehimp = $this->M_data->update_himpunan($himpunan,$kode_himp_sess);
            if($updatehimp){ // Jika sukses
                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
            }else{ // Jika gagal
                echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
            }
        }

        public function save_bidang_anggota(){
            $kode_himp_sess = $this->session->userdata('kode_himp_sess');

            $nm_bidang = $_POST['nm_bidang'];
            $nm_ketua = $_POST['ketua_bidang'];
            $kode_bidang = $_POST['nm_bidang'][0];
            $kode_bidang_anggota = $_POST['nm_bidang'][0];

            $kode_himp = $kode_himp_sess;

            $nm_anggota = $_POST['nm_anggota'];


            $bidang = array();
            $anggota = array();
            $index = 0;
            $index_2 = 0;
            foreach($nm_bidang as $bid){
                array_push($bidang, array(
                    'nm_bidang' => $bid,
                    'ketua_bidang' => $nm_ketua[$index],
                    'kode_bidang' => strtoupper($kode_bidang),
                    'kode_himp' => strtoupper($kode_himp)
                ));
                $index++;
            }
            foreach ($nm_anggota as $agt){
                array_push($anggota, array(
                    'nm_anggota' => $agt,
                    'kode_himp' => strtoupper($kode_himp),
                    'kode_bidang' => strtoupper($kode_bidang_anggota),
                ));
                $index_2++;

            }

            $bidang = $this->M_data->save_bidang($bidang);
            $anggota = $this->M_data->save_anggota($anggota);
            if($bidang){ // Jika sukses
                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('c_user/index')."';</script>";
            }else{ // Jika gagal
                echo "<script>alert('Data gagal disimpan');window.location = '".base_url('c_user/index')."';</script>";
            }
        }

        public function edit_bidang($idbidang,$kode_bidang){
            print_r($idbidang);
            print_r($kode_bidang);
            exit();
        }
    }
