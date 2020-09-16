<?php 

class M_data extends CI_Model{
	
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
		} 
	function cek_datahimp($where){
		$query =  $this->db->query('SELECT * FROM himpunan WHERE kode_himp = "'.$where.'"');
		// print_r($query);
		// exit();
		return $query;
  } 
	function tampil_data(){
		return $this->db->get('user');
  }
  function tampil_user($datauser){
    // $query = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
    $query =  $this->db->query('SELECT * FROM user WHERE username = "'.$datauser.'"'); 
		return $query;
  }
	function tampil_ormawa(){
		return $this->db->query("SELECT * FROM user WHERE role=2 ORDER BY fakultas ASC ");
	}

	function save_himpunan($data){
		return $this->db->insert('himpunan',$data);
	}
	function save_bidang($data){
		return $this->db->insert_batch('bidang',$data);
	}
	function save_anggota($data){
		return $this->db->insert_batch('anggota',$data);
	}
	//view
	function tampil_anggota($value){
		$query =  $this->db->query('SELECT * FROM anggota WHERE kode_himp = "'.$value.'"');
		return $query;
	}

	function tampil_bidang($value){
		$query =  $this->db->query('SELECT * FROM bidang WHERE kode_himp = "'.$value.'"');
		return $query;
	}

	function tampil_himpunan($value){
		$query =  $this->db->query('SELECT * FROM himpunan WHERE kode_himp = "'.$value.'"');
		return $query;
	}

	function update_himpunan($data,$kode_himp)
	{
    $this->db->where('kode_himp', $kode_himp);
    $this->db->update('himpunan',$data);
	return true;
	}
	// untuk mengambil semua data. dipake buat manggil edit data ormawa 
	// public function getAllUser(){
    //     $this->db->select('*');
    //     return $this->db->from('user')
	// 		->join('tb_role','user.role=tb_role.id_role')
	// 		->join('tb_fakultas', 'user.fakultas=tb_fakultas.id_fakultas')
    //         ->get()
    //         ->result();
	// }
	function tambahOrmawa($data,$table){
		$this->db->insert($table,$data);
	}

	function editOrmawa($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
		return TRUE;
	}
	// function editOrmawa($data, $id_user){
	// 	$this->db->where('id_user', $id_user);
	// 	$this->db->update('user', $data);
	// 	return TRUE; 
	// }
	function hapusOrmawa($data,$id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
		$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
	}

	// tambahan dari nisvy

}
