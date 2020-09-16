<?php 

class data extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_data','modal');
		

	}

	function index(){
		$this->load->view('login');
	}
	// 

	//login
	function aksi_login_user(){
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$where = array(
			'username' => $username,
			'password' => md5($password),
			);
		$cek = $this->M_data->cek_login("user",$where);
		if($cek -> num_rows() ==1){
		foreach ($cek->result() as $session) {
				$sess_data['username'] = $session->username;
				$sess_data['role'] = $session->role;
				$sess_data['kode_himp_sess'] = $session->kode_himp;
				$sess_data['status'] = "login";
				$this->session->set_userdata($sess_data);
			}
			if($sess_data['username']){
				// cek role
				if($sess_data['role'] == 1){
					redirect('c_admin/index');
				}else{
					redirect('c_user/index');
				}
			}
	}
	else{
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Your username and Password is Wrong!</div>');
			redirect('c_home/login');
		}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('c_home/login'));
	}

	
	// function resetpassword(){
    //     $this->form_validation->set_rules('id_user', 'required');
  	// 	$password = $this->input->post('password');
	// 	{
    //         $data ['password'] => $password,
	//     }
    //         $this->m_data->update_password($data,$id_user);
    //         redirect('c_user/index');
	// }

	// tambahan dari nurul
	
	public function tambahUser()
    {
		$password=$this->input->post('password', true);
        $data = array(
      'nama' => $this->input->post('nama', true),
      'fakultas' => $this->input->post('fakultas', true),
      'email' => $this->input->post('email', true),
      'username' => $this->input->post('username', true),
      'password' => md5($password),
			'role' => 2,
			'tahunakademik' => "",
			'dana_awal' => "",
			'dana_sisa' => 'dana_awal',
		);

        $this->M_data->tambahOrmawa($data,'user');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Ditambahkan</div>');
        redirect('c_admin/Data_Ormawa');
	}

	public function editOrmawa(){
		$id_user = $this->input->post('id_user');
		$password=$this->input->post('password', true);
		$nama=$this->input->post('nama');
		$fakultas=$this->input->post('fakultas');
		$email=$this->input->post('email');
		$username=$this->input->post('username');
    $data = array(
        'nama' => $nama,
        'fakultas' => $fakultas,
        'email' => $email,
        'username' => $username,
        'password' => md5($password),
			'role' => 2,
		);
		$where = array(
			'id_user'=>$id_user,
		);
		$this->M_data->editOrmawa($where, $data, 'user');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('c_admin/Data_Ormawa');
        // $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        // <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna berhasil diperbaharui</div>');
        // redirect('c_admin/Data_Ormawa');
	}
		public function hapusOrmawa($id_user){
			$this->M_Data->hapusOrmawa($data,$id_user);
			redirect('c_admin/Data_Ormawa');
		}
	
	// tambahan dari nisvy
	public function ChangePassword()
  {
      $data['title'] = 'Ubah Password';
      $this->load->view('templates/header', $data);
      $this->load->view('user/ubahpassword');
      $this->load->view('templates/sidebaruser');
      $this->load->view('templates/footer');
	}

	function getUserId($username){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $username);
    return $this->db->get()->result_array();
	}
	
	function uploadfiledana($data){
		$this->db->where('username', $username);
		$this->db->update('user', $data);
	}
	
	
	}
