<?php 

class data extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Model_View');
		

	}

	function index(){
		$this->load->view('login');
	}
	function tampil_data(){
		
	}

	//login
	function aksi_login_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password),
			);
		$cek = $this->Model_View->cek_login("user",$where);
		// var_dump($cek -> num_rows());
		// exit();
		if($cek -> num_rows() == 1){
			foreach ($cek->result() as $session) {
				$sess_data['username'] = $session->username;
		        $sess_data['role'] = $session->role;
		        $sess_data['statususer'] = $session->statususer;
		        $sess_data['user_login'] = $session->kode_himp;
		        $sess_data['kode_himp_sess'] = $session->kode_himp;
		        $sess_data['nama'] = $session->nama;
				$sess_data['status'] = "login";
				$this->session->set_userdata($sess_data);
			}

			// var_dump($sess_data['username']);
			// var_dump($sess_data['role']);
			// exit();
			if($sess_data['username']){
        // cek role
        if($sess_data['statususer']){
          if($sess_data['role'] == 1){
            redirect('c_admin/index');
          }else{
            redirect('c_user/index');
          }
        }
			}
	}else
		if($cek)
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Your username and Password is Wrong!</div>');
			redirect('c_home/login');
	}


	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('c_home/login'));
	}
}