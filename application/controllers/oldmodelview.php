<?php 

 class Model_View extends CI_Model
 {
 	function cek_login($table,$where){
 		return $this->db->get_where($table,$where);
 	}
 	function cek_datahimp($where){
		$query =  $this->db->query('SELECT * FROM user WHERE kode_himp = "'.$where.'"');
		// print_r($query);
		// exit();
		return $query;
	} 
 	function tampil_list_fakultas(){
		$query =  $this->db->query('SELECT * FROM fakultas');
		return $query;
  }
  function tampil_list_fakultaskecuali(){
    $this->db->select("*");
    $this->db->from("fakultas");
    $this->db->where('kode_fakultas !=', 'UKM');
    $this->db->where('kode_fakultas !=', 'UKK');
    $query = $this->db->get();
		return $query;
  }
	function tampil_list_alljurusan(){
    $notin = array('UKM', 'UKK');
    $this->db->select("*");
    $this->db->from("jurusan");
    $this->db->where_not_in('parent_fakultas', $notin);
    $this->db->order_by('parent_fakultas', 'ASC');
    $query = $this->db->get();
		return $query;
	}
	function tampil_list_jurusan($fakultas){
		$query =  $this->db->query('SELECT * FROM jurusan WHERE parent_fakultas = "'.$fakultas.'"');
		return $query;
	}
	function tampil_detail_fakultas($fakultas){
		$query =  $this->db->query('SELECT * FROM fakultas WHERE kode_fakultas = "'.$fakultas.'"');
		return $query;
	}
	function tampil_all_anggota($jurusan){
		$this->db->select("*");
		$this->db->from("anggota_himpunan");
		$this->db->where("parent_himpunan =",$jurusan);
		$this->db->order_by("nama", 'ASC');
		$query = $this->db->get();
		return $query;
	}
	function tampil_allhimpunan(){
		$query =  $this->db->query('SELECT * FROM jurusan');
		return $query;
	}
	function tampil_bendahara_sekretaris($jurusan){
		$this->db->select("*");
		$this->db->from("anggota_himpunan");
		$this->db->where("parent_himpunan =",$jurusan);
		$this->db->order_by("jabatan", 'ASC');
		$query = $this->db->get();
		return $query;
	}

	function tampil_ketua($jurusan){
		$query =  $this->db->query('SELECT * FROM anggota_himpunan WHERE jabatan = "KETUA" AND parent_himpunan = "'.$jurusan.'"');
		return $query;
	}
	function tampil_anggota($jurusan){
		$this->db->select("*");
		$this->db->from("anggota_himpunan");
		$this->db->where("jabatan =",'ANGGOTA');
		$this->db->where("parent_himpunan =",$jurusan);
		$this->db->order_by("parent_bidang", 'ASC');
		$query = $this->db->get();
		// $query =  $this->db->query('SELECT * FROM anggota_himpunan WHERE jabatan = "ANGGOTA" AND parent_himpunan = "'.$jurusan.'"');
		return $query;
	}
	function tampil_ketua_bidang($jurusan){
		$this->db->select("*");
		$this->db->from("anggota_himpunan");
		$this->db->where("jabatan =",'KETUA BIDANG');
		$this->db->where("parent_himpunan =",$jurusan);
		$this->db->order_by("parent_bidang", 'ASC');
		$query = $this->db->get();
		// $query =  $this->db->query('SELECT * FROM anggota_himpunan WHERE jabatan = "KETUA BIDANG" AND parent_himpunan = "'.$jurusan.'"');
		return $query;
  }
  // nuy tambah
  function tampil_statususer($jurusan){
		$query =  $this->db->query('SELECT * FROM user WHERE kode_himp = "'.$jurusan.'"');
		return $query;
  }
  
  function tambah_statususer($parent_himpunan,$statususer){
    return $query = $this->db->query("UPDATE user SET statususer='$statususer' WHERE kode_himp=
    '$parent_himpunan' ");
  }
  // end nuy 

	function tampil_bidang($jurusan){
		$query =  $this->db->query('SELECT * FROM nama_bidang WHERE parent_himpunan = "'.$jurusan.'"');
		return $query;
	}
	function tampil_himpunan($jurusan){
		$query =  $this->db->query('SELECT * FROM jurusan WHERE kode_himpunan = "'.$jurusan.'"');
		return $query;
	}
	function simpan_anggota_baru($nim,$nama,$jenis_kelamin,$alamat,$kontak,$email,$jabatan,$parent_himpunan,$parent_bidang){
		if($parent_bidang == ''){
			$parent_bidang = NULL;
		}
        $query_save =$this->db->query("INSERT INTO anggota_himpunan (nim,nama,jenis_kelamin,alamat,kontak,email,jabatan,parent_himpunan,parent_bidang) VALUES ('$nim','$nama','$jenis_kelamin','$alamat','$kontak','$email','$jabatan','$parent_himpunan','$parent_bidang')");
        return $query_save;
    }

    function update_anggota($nim,$nama,$jenis_kelamin,$alamat,$kontak,$email,$jabatan,$parent_himpunan,$parent_bidang){
        $query_update =$this->db->query("UPDATE anggota_himpunan SET nama = '$nama',jenis_kelamin = '$jenis_kelamin',alamat = '$alamat', kontak = '$kontak',email = '$email',jabatan = '$jabatan',parent_bidang = '$parent_bidang' WHERE nim='$nim'");
        return $query_update;
    }

    function update_visimisi($visi,$misi,$kode_himpunan){
        $query_update =$this->db->query("UPDATE jurusan SET visi = '$visi', misi = '$misi' WHERE kode_himpunan ='$kode_himpunan'");
        return $query_update;
    }

    // function update_jmlmhsaktif($jml_mhsaktif,$kode_himpunan){
    //     $query_update =$this->db->query("UPDATE jurusan SET jml_mhsaktif = '$jml_mhsaktif' WHERE kode_himpunan ='$kode_himpunan'");
    //     return $query_update;
    // }

    function delete_anggota($nim){
    $this->db->delete('anggota_himpunan', array('nim' => $nim));
    }

    function get_anggota_by_nim($nim){
    	$this->db->select("*");
		$this->db->from("anggota_himpunan");
		$this->db->where("nim =",$nim);
		$query = $this->db->get();

		return $query;
    }

    function tambah_bidang($data){
    $this->db->insert('nama_bidang',$data);
    $this->session->set_flashdata('Sukses',"Bidang Berhasil Ditambahkan");
    return TRUE;
  }
  function update_bidang($label_bidang,$desc_bidang,$kode_bidang,$parent_himpunan,$image){
  	$query_update_bidang =$this->db->query("UPDATE nama_bidang SET label_bidang = '$label_bidang', desc_bidang = '$desc_bidang', image = '$image' WHERE kode_bidang ='$kode_bidang'");
  	// var_dump($kode_bidang);
  	// exit();
    return $query_update_bidang;
  }
  function delete_bidang($kd_bidang){
  	 $this->db->delete('nama_bidang', array('kode_bidang' => $kd_bidang));	
  }

  function tambah_fakultas($data,$datafakultas){
  	$this->db->insert('fakultas',$data);
    $this->session->set_flashdata('Sukses',"Data Fakultas Berhasil Ditambahkan");
    return TRUE;
  }

  function update_fakultas($kode_fakultas,$nama_fakultas,$deskripsi,$visi,$misi){
  	$query_update_fakultas =$this->db->query("UPDATE fakultas SET nama_fakultas = '$nama_fakultas', deskripsi = '$deskripsi', visi = '$visi', misi = '$misi' WHERE kode_fakultas ='$kode_fakultas'");
  	return $query_update_fakultas;
  }

  function delete_fakultas($kode_fakultas){
  	  $this->db->delete('fakultas', array('kode_fakultas' => $kode_fakultas));
  }


  function tambah_himpunan($data,$datadana){
    $this->db->insert('jurusan',$data);
    $this->session->set_flashdata('Sukses',"Data Jurusan Berhasil Ditambahkan");
    $this->db->insert('tb_detailuser',$datadana);
    return TRUE;
  }

  function edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$image){
  	 $query_update_himpunan = $this->db->query("UPDATE jurusan SET nama_himpunan = '$nama_himpunan',desc_himpunan = '$deskripsi',visi = '$visi',misi = '$misi',image = '$image' WHERE kode_himpunan = '$kode_himpunan'");
  	 return $query_update_himpunan;
  }

    function delete_himpunan($kode_himpunan){
  	  $this->db->delete('jurusan', array('kode_himpunan' => $kode_himpunan));
  }

  function tampil_user_himpunan(){
  	$query_tampil_user_himpunan = $this->db->query("SELECT * FROM user");
  	return $query_tampil_user_himpunan;
  }

  function tambah_user_himpunan($data){
    $this->db->insert('user',$data);
  	$this->session->set_flashdata('Sukses',"Data User Berhasil Ditambahkan");
    return TRUE;
  }

  function delete_user_himpunan($id_user){
  	 $this->db->delete('user', array('id_user' => $id_user));
  }
  function edit_user_himpunan($id_user,$nama,$email,$username,$password){
  	$query_update_user = $this->db->query("UPDATE user SET nama = '$nama', email = '$email', username = '$username', password = '$password' WHERE id_user = '$id_user'");
  	return $query_update_user;
  }

  //untuk ukm dan ukk
  function tampil_list_ukmukk(){
		$query =  $this->db->query('SELECT * FROM tb_parentukmukk');
		return $query;
	}
  function update_parentukmukk($kode_parentukmukk,$deskripsi)
  {
    return $query_update_pukmukk = $this->db->query("UPDATE tb_parentukmukk SET deskripsi = '$deskripsi' WHERE kode_parentukmukk = '$kode_parentukmukk'");
  }

  function detail_tampil_list_ukmukk(){
    return $query = $this->db->query('SELECT * FROM tb_ukmukk');
  }

 }
?>
