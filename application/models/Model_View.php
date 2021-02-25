<?php 

 class Model_View extends CI_Model
 {
 	function cek_login($table,$where){
 		return $this->db->get_where($table,$where);
 	}
  function ceknim_anggota($nim){
    $this->db->select('*');
    $this->db->from('anggota_himpunan');
    $this->db->where("nim =",$nim);
    $query = $this->db->get();
    return $query;
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
	function tampil_list_alljurusan(){
    $this->db->select('*');
    $this->db->from('jurusan');
    $this->db->where('parent_fakultas is NOT NULL', NULL, FALSE);
    $this->db->join('fakultas', 'fakultas.kode_fakultas = jurusan.parent_fakultas');
    $this->db->order_by('kode_himpunan', 'ASC');
    $query = $this->db->get();
    return $query;
  }
  function tampil_list_alljurusan1(){
    $query =  $this->db->query('SELECT * FROM jurusan');
		return $query;
  }
  function tampil_list_universitas(){
    $this->db->select('*');
    $this->db->from('jurusan');
    $this->db->where('parent_fakultas is NULL', NULL, TRUE);
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
		$this->db->order_by("create_date", 'ASC');
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

	function tampil_bidang($jurusan){
		$query =  $this->db->query("SELECT * FROM nama_bidang WHERE parent_himpunan = '$jurusan' ORDER BY create_date ASC");
		return $query;
	}
	function tampil_himpunan($jurusan){
		$query =  $this->db->query('SELECT * FROM jurusan WHERE kode_himpunan = "'.$jurusan.'"');
		return $query;
	}
	function tampil_kegiatan_allhimp(){
		$query = $this->db->query('SELECT * FROM daftar_kegiatan');
		return $query;
	}
	function tampil_kegiatan_allukmukk(){
    $query = $this->db->query('SELECT * FROM kegiatan_ukmukk');
    return $query;
  }
  
  function tampil_prestasi_allhimpunan(){
    $query = $this->db->query('SELECT * FROM prestasi_himpunan');
    return $query;
  }
  function tampil_prestasi_allukmukk(){
    $query = $this->db->query('SELECT * FROM prestasi_ukmukk');
    return $query;
  }
	function tampil_prestasi_himpunan($jurusan){    
    $query = $this->db->query("SELECT * FROM prestasi_himpunan WHERE parent_himpunan = '$jurusan' ORDER BY create_date ASC");
    return $query;
    }
    
    function tampil_prestasi_ukmukk($ukm_ukk){
    $query =  $this->db->query("SELECT * FROM prestasi_ukmukk WHERE parent_ukmukk = '$ukm_ukk' ORDER BY create_date ASC");    
    return $query;
  }
  
	function tampil_kegiatan_himp($jurusan){    
    $query = $this->db->query("SELECT * FROM daftar_kegiatan WHERE Parent_himpunan = '$jurusan' ORDER BY create_date ASC");
    return $query;
  }
  
  function tampil_ukegiatan($ukm_ukk){
    $query =  $this->db->query("SELECT * FROM kegiatan_ukmukk WHERE parent_ukmukk = '$ukm_ukk' ORDER BY create_date ASC");
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

    function update_jml_mhsaktif($jml_mhsaktif,$kode_himpunan){
        $query_update =$this->db->query("UPDATE jurusan SET jml_mhsaktif = '$jml_mhsaktif' WHERE kode_himpunan ='$kode_himpunan'");
        return $query_update;
    }

    function update_kegiatan($start_date,$end_date,$nama_kegiatan, $Parent_himpunan, $id_kegiatan, $image){
    	$query_update=$this->db->query("UPDATE daftar_kegiatan SET start_date='$start_date',end_date='$end_date', nama_kegiatan='$nama_kegiatan',image='$image' WHERE id_kegiatan='$id_kegiatan' ");
    	return $query_update;
    }

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

  function tambah_fakultas($data){
  	$this->db->insert('fakultas',$data);
  	$this->session->set_flashdata('Sukses',"Data Fakultas Berhasil Ditambahkan");
    return TRUE;
  }

  function tambah_kegiatan($data){
  	$this->db->insert('daftar_kegiatan', $data);
  	$this->session->set_flashdata('Sukses', "Nama Kegiatan Berhasil Ditambahkan");

  }
  function delete_kegiatan($id_kegiatan){
  	 $this->db->delete('daftar_kegiatan', array('id_kegiatan' => $id_kegiatan));	
  }
  
  function tambah_prestasi($data){
    $this->db->insert('prestasi_himpunan', $data);
    $this->session->set_flashdata('Sukses', "Prestasi Berhasil Ditambahkan");
    return TRUE;
  }
  function update_prestasi($waktu,$nama_prestasi,$jenis_prestasi,$desc_prestasi,$lokasi,$parent_himpunan,$id_prestasi,$image){
      $query_update=$this->db->query("UPDATE prestasi_himpunan SET waktu='$waktu', nama_prestasi='$nama_prestasi', jenis_prestasi='$jenis_prestasi', desc_prestasi='$desc_prestasi', lokasi='$lokasi', image='$image' WHERE id_prestasi='$id_prestasi' ");
      return $query_update;
  }
  function delete_prestasi($id_prestasi){
     $this->db->delete('prestasi_himpunan', array('id_prestasi' => $id_prestasi));  
  }

  function tambah_uprestasi($data){
    $this->db->insert('prestasi_ukmukk', $data);
    $this->session->set_flashdata('Sukses', "Prestasi Berhasil Ditambahkan");
    return TRUE;
  }
  function update_uprestasi($waktu,$nama_uprestasi,$jenis_uprestasi,$desc_uprestasi,$ulokasi,$parent_ukmukk,$id_uprestasi,$image){
      $query_update=$this->db->query("UPDATE prestasi_ukmukk SET waktu='$waktu', nama_uprestasi='$nama_uprestasi', jenis_uprestasi='$jenis_uprestasi', desc_uprestasi='$desc_uprestasi', ulokasi='$ulokasi', image='$image' WHERE id_uprestasi='$id_uprestasi' ");
      return $query_update;
  }
  function delete_uprestasi($id_uprestasi){
     $this->db->delete('prestasi_ukmukk', array('id_uprestasi' => $id_uprestasi));  
  }


  function update_fakultas($kode_fakultas,$nama_fakultas,$deskripsi,$visi,$misi){
  	$query_update_fakultas =$this->db->query("UPDATE fakultas SET nama_fakultas = '$nama_fakultas', deskripsi = '$deskripsi', visi = '$visi', misi = '$misi' WHERE kode_fakultas ='$kode_fakultas'");
  	return $query_update_fakultas;
  }

  function delete_fakultas($kode_fakultas){
  	  $this->db->delete('fakultas', array('kode_fakultas' => $kode_fakultas));
  }


  function tambah_himpunan($data){
    $this->db->insert('jurusan',$data);        
    // $this->db->insert('tb_detailuser',$datadana);
    $this->session->set_flashdata('Sukses',"Data Jurusan Berhasil Ditambahkan");
    return TRUE;
  }
  function tambah_detailhimpunan($datadana)
  {
    $this->db->insert('tb_detailuser',$datadana);
    $this->session->set_flashdata('Sukses',"Data Jurusan Berhasil Ditambahkan");
    return TRUE;
  }
  function edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$image){
  	 $query_update_himpunan = $this->db->query("UPDATE jurusan SET nama_himpunan = '$nama_himpunan',desc_himpunan = '$deskripsi',visi = '$visi',misi = '$misi',image = '$image' WHERE kode_himpunan = '$kode_himpunan'");
  	 return $query_update_himpunan;
  }
//   function edit_himpunan($kode_himpunan,$nama_himpunan,$deskripsi,$visi,$misi,$parent_fakultas,$image){
//   	 $query_update_himpunan = $this->db->query("UPDATE jurusan SET nama_himpunan = '$nama_himpunan',desc_himpunan = '$deskripsi',visi = '$visi',misi = '$misi',image = '$image' WHERE kode_himpunan = '$kode_himpunan'");
//   	 return $query_update_himpunan;
//   }
    function delete_himpunan($kode_himpunan){
  	$query=$this->db->query("DELETE FROM jurusan WHERE kode_himpunan='$kode_himpunan'");
    return $query;    
  }
   function delete_userhimpunan($username){
    $query=$this->db->query("DELETE FROM user WHERE username='$username'");
    return $query;
  }

  function tampil_user_himpunan(){
  	$query_tampil_user_himpunan = $this->db->query("SELECT * FROM user WHERE role=0 AND kode_himp != 'semau' AND kode_himp != 'demau' ORDER BY kode_himp ASC");
  	return $query_tampil_user_himpunan;
  }
  function tampil_semua_userhimp(){
    $query_tampil_user_himpunan = $this->db->query("SELECT * FROM user WHERE role=0 ORDER BY kode_himp ASC");
    return $query_tampil_user_himpunan;
  }
  function tampil_user_semaudemau(){
    $usersemau = $this->db->query("SELECT * FROM user WHERE role=0 AND kode_himp = 'semau' OR kode_himp = 'demau' ORDER BY kode_himp ASC");
    return $usersemau;
  }

  function tambah_user_himpunan($data){
  	$this->db->insert('user',$data);
  	$this->session->set_flashdata('Sukses',"Data User Berhasil Ditambahkan");
    return TRUE;
  }

  function delete_user_himpunan($id_user){
  	 $this->db->delete('user', array('id_user' => $id_user));
  }
  function edit_user_himpunan($id_user,$nama,$email,$telp,$username,$password){
  	$query_update_user = $this->db->query("UPDATE user SET nama = '$nama', email = '$email',telp='$telp', username = '$username', password = '$password' WHERE id_user = '$id_user'");
  	return $query_update_user;

  }
  function edit_useraja($kode_himp,$username){
    $query_update_user = $this->db->query("UPDATE user SET username = '$username' WHERE kode_himp = '$kode_himp'");
    return $query_update_user;
  }

  function tampil_ukmukk ($kode_ukmukk){
    $query = $this->db->query('SELECT * FROM ukm_ukk WHERE kode_ukmukk ="'.$kode_ukmukk.'" ');
    return $query;
  }
  function tampil_semua_ukmukk (){
    $query = $this->db->query('SELECT * FROM ukm_ukk');
    return $query;
  }
  function update_visimisi_ukmukk($visi_ukmukk,$misi_ukmukk,$kode_ukmukk){
    $query_update =$this->db->query("UPDATE ukm_ukk SET visi_ukmukk = '$visi_ukmukk', misi_ukmukk = '$misi_ukmukk' WHERE kode_ukmukk ='$kode_ukmukk'");
        return $query_update;
  }

  function tampil_bidang_ukmukk ($kode_ukmukk){    
    $query = $this->db->query("SELECT * FROM bidang_ukmukk WHERE parent_ukmukk ='$kode_ukmukk' ORDER BY create_date ASC");
    return $query;
  }

  function tampil_anggota_ukmukk ($kode_ukmukk){
    $query = $this->db->query('SELECT * FROM anggota_ukmukk WHERE parent_ukmukk ="'.$kode_ukmukk.'" ');
    return $query;
  }

  function tambah_ubidang($data){
    $this->db->insert('bidang_ukmukk',$data);
    $this->session->set_flashdata('Sukses',"Bidang Berhasil Ditambahkan");
    return TRUE;
  }

  function update_ukmbidang($label_ubidang,$desc_ubidang,$kode_ubidang,$parent_ukmukk,$image){
    $query_update_bidang =$this->db->query("UPDATE bidang_ukmukk SET label_ubidang = '$label_ubidang', desc_ubidang = '$desc_ubidang', image = '$image' WHERE kode_ubidang ='$kode_ubidang'");
    // var_dump($kode_bidang);
    // exit();
    return $query_update_bidang;
  }

  function simpan_ukmanggota($u_nim,$u_nama,$u_jeniskelamin,$u_alamat,$u_kontak,$u_email,$u_jabatan,$parent_ukmukk,$parent_ubidang){
    if($parent_ubidang == ''){
      $parent_ubidang = NULL;
    }
        $query_save =$this->db->query("INSERT INTO anggota_ukmukk (u_nim,u_nama,u_jeniskelamin,u_alamat,u_kontak,u_email,u_jabatan,parent_ukmukk,parent_ubidang) VALUES ('$u_nim','$u_nama','$u_jeniskelamin','$u_alamat','$u_kontak','$u_email','$u_jabatan','$parent_ukmukk','$parent_ubidang')");
        return $query_save;
    }

  function tambah_kegiatan_ukmukk($data){
    $this->db->insert('kegiatan_ukmukk', $data);
    $this->session->set_flashdata('Sukses', "Nama Kegiatan Berhasil Ditambahkan");

  }

  function update_ukmanggota($u_nim,$u_nama,$u_jeniskelamin,$u_alamat,$u_kontak,$u_email,$u_jabatan,$parent_ukmukk,$parent_ubidang){
        $query_update =$this->db->query("UPDATE anggota_ukmukk SET u_nama = '$u_nama',u_jeniskelamin = '$u_jeniskelamin',u_alamat = '$u_alamat', u_kontak = '$u_kontak',u_email = '$u_email',u_jabatan = '$u_jabatan',parent_ubidang = '$parent_ubidang' WHERE u_nim='$u_nim'");
        return $query_update;
    }

   function delete_ukmbidang($kd_ubidang){
     $this->db->delete('bidang_ukmukk', array('kode_ubidang' => $kd_ubidang));  
  }

   function delete_ukmanggota($u_nim){
    $this->db->delete('anggota_ukmukk', array('u_nim' => $u_nim));
  }

  function tampil_kegiatan_ukmukk($ukm_ukk){
    $query = $this->db->query('SELECT * FROM kegiatan_ukmukk WHERE parent_ukmukk = "'.$ukm_ukk.'"');
    return $query;
  }

  function update_ukegiatan($ustart_date,$uend_date,$nama_ukegiatan, $parent_ukmukk, $id_ukegiatan, $image){
      $query_update=$this->db->query("UPDATE kegiatan_ukmukk SET ustart_date='$ustart_date',uend_date='$uend_date', nama_ukegiatan='$nama_ukegiatan', image='$image' WHERE id_ukegiatan='$id_ukegiatan' ");
      return $query_update;
  }
  function delete_ukegiatan($id_ukegiatan){
     $this->db->delete('kegiatan_ukmukk', array('id_ukegiatan' => $id_ukegiatan));  
  }
  function update_jml_umhsaktif($jml_umhsaktif,$kode_ukmukk){
        $query_update =$this->db->query("UPDATE ukm_ukk SET jml_umhsaktif = '$jml_umhsaktif' WHERE kode_ukmukk ='$kode_ukmukk'");
        return $query_update;
  }
  function tampil_usekben($ukm_ukk){
    $this->db->select("*");
    $this->db->from("anggota_ukmukk");
    $this->db->where("parent_ukmukk =",$ukm_ukk);
    $this->db->order_by("create_date", 'ASC');
    $query = $this->db->get();
    return $query;
  }
  function tampil_uketua($ukm_ukk){
    $query =  $this->db->query('SELECT * FROM anggota_ukmukk WHERE u_jabatan = "KETUA" AND parent_ukmukk = "'.$ukm_ukk.'"');
    return $query;
  }

  function tampil_ubidang($ukm_ukk){
    $query =  $this->db->query('SELECT * FROM bidang_ukmukk WHERE parent_ukmukk = "'.$ukm_ukk.'"');
    return $query;
  }

  function tampil_ukabid($ukm_ukk){
    $query = $this->db->query('SELECT * FROM anggota_ukmukk WHERE u_jabatan = "Ketua Bidang" AND parent_ukmukk = "'.$ukm_ukk.'"');
    return $query;
  }
  
  function tampil_uanggota($ukm_ukk){
    $this->db->select("*");
    $this->db->from("anggota_ukmukk");
    $this->db->where("u_jabatan =",'ANGGOTA');
    $this->db->where("parent_ukmukk =",$ukm_ukk);
    $this->db->order_by("parent_ubidang", 'ASC');
    $query = $this->db->get();
    // $query =  $this->db->query('SELECT * FROM anggota_himpunan WHERE jabatan = "ANGGOTA" AND parent_himpunan = "'.$jurusan.'"');
    return $query;
 }

  function tampil_list_ukmukk(){
    $query =  $this->db->query('SELECT * FROM ukm_ukk');
    return $query;
  }
  function tampil_user_ukmukk(){
    $query_tampil_user_ukmukk = $this->db->query("SELECT * FROM user WHERE role=2");
    return $query_tampil_user_ukmukk;
  }
  function tambah_ukmukk($data,$datadana){
    $this->db->insert('ukm_ukk',$data);
    $this->session->set_flashdata('Sukses',"Data Fakultas Berhasil Ditambahkan");
    $this->db->insert('tb_detailuserukmukk',$datadana);
    return TRUE;
  }
  function update($kode_fakultas,$nama_fakultas,$deskripsi,$visi,$misi){
    $query_update_fakultas =$this->db->query("UPDATE fakultas SET nama_fakultas = '$nama_fakultas', deskripsi = '$deskripsi', visi = '$visi', misi = '$misi' WHERE kode_fakultas ='$kode_fakultas'");
    return $query_update_fakultas;
  }
  function tambah_userukmukk($data){
    $this->db->insert('user',$data);
    $this->session->set_flashdata('Sukses',"Data User Berhasil Ditambahkan");
    return TRUE;
  }
  function edit_ukmuser($telp,$id_user,$nama,$email,$username,$password){
    $query_update_user = $this->db->query("UPDATE user SET nama = '$nama', email = '$email', username = '$username', password = '$password', telp='$telp'  WHERE id_user = '$id_user'");
    return $query_update_user;

  }
  function update_ukmukk($kode_ukmukk,$nama_ukmukk,$desc_ukmukk,$visi_ukmukk,$misi_ukmukk,$image){
     $query_update_ukmukk = $this->db->query("UPDATE ukm_ukk SET nama_ukmukk = '$nama_ukmukk',desc_ukmukk = '$desc_ukmukk',visi_ukmukk = '$visi_ukmukk',misi_ukmukk = '$misi_ukmukk', image = '$image' WHERE kode_ukmukk = '$kode_ukmukk'");
     return $query_update_ukmukk;
  }

  function delete_ukmukk($kode_ukmukk){
      $this->db->delete('ukm_ukk', array('kode_ukmukk' => $kode_ukmukk));
  }
  function delete_userukmukk($username){
    $query=$this->db->query("DELETE FROM user WHERE username='$username'");
    return $query;
  }
  function delete_user_ukmukk($id_user){
     $this->db->delete('user', array('id_user' => $id_user));
  }



//tambah_nuy
 function tampil_statususer($jurusan){
  $query =  $this->db->query('SELECT * FROM user WHERE kode_himp = "'.$jurusan.'"');
  return $query;
}

function tambah_statususer($parent_himpunan,$statususer){
  return $query = $this->db->query("UPDATE user SET statususer='$statususer' WHERE kode_himp=
  '$parent_himpunan' ");
}
function tambah_statususerukmukk($parent_ukmukk,$statususer){
  return $query = $this->db->query("UPDATE user SET statususer='$statususer' WHERE kode_himp=
  '$parent_ukmukk' ");
}
//end_nuy

// tambah molly
function tampil_admin()
  {
    $query_tampil_admin = $this->db->query('SELECT * FROM user WHERE role=1');
    return $query_tampil_admin;
  }

  function tambah_admin($data)
  {
    $this->db->insert('user', $data);
    $this->session->set_flashdata('Sukses', "Data Admin Berhasil Ditambahkan");
    return TRUE;
  }

  function delete_admin($id_user)
  {
    $this->db->delete('user', array('id_user' => $id_user));
  }
  function edit_admin($id_user, $nama, $email, $username, $password)
  {
    $query_update_admin = $this->db->query("UPDATE user SET nama = '$nama', email = '$email', username = '$username', password = '$password' WHERE id_user = '$id_user'");
    return $query_update_admin;
  }
  // tambahan nisvy
  function update_fotoukm($kode_ukmukk,$image){
    $query_update_ukmukk = $this->db->query("UPDATE ukm_ukk SET image = '$image' WHERE kode_ukmukk = '$kode_ukmukk'");
    return $query_update_ukmukk;
  }
  function update_fotohmj($kode_himpunan,$image){
    $query_update_hmj = $this->db->query("UPDATE jurusan SET image = '$image' WHERE kode_himpunan = '$kode_himpunan'");
    return $query_update_hmj;
  }

  // tambah nurul
  function tampil_list_anggota_himpunan($jurusan)
  {
    $query = $this->db->query("SELECT * FROM data_anggota_himpunan WHERE parent_himpunan = '$jurusan' ORDER BY tahun_akademik DESC");
    return $query;
  }
  function tampil_list_anggota_ukmukk($ukm_ukk)
  {
    $query = $this->db->query("SELECT * FROM data_anggota_ukmukk WHERE parent_ukmukk = '$ukm_ukk' ORDER BY tahun_akademik DESC");
    return $query;
  }
  function tambah_list_anggota_himp($data){
    $this->db->insert('data_anggota_himpunan', $data);
    $this->session->set_flashdata('Sukses', "List Anggota Berhasil Ditambahkan");
    return TRUE;
  }
  function tambah_list_anggota_ukmukk($data){
    $this->db->insert('data_anggota_ukmukk', $data);
    $this->session->set_flashdata('Sukses', "List Anggota Berhasil Ditambahkan");
    return TRUE;
  }
  function getDataByIDList($id_listanggota){
    return $this->db->get_where('data_anggota_himpunan', array('id_listanggota'=>$id_listanggota));
  }
  function getDataByIDuList($id_ulistanggota){
    return $this->db->get_where('data_anggota_ukmukk', array('id_ulistanggota'=>$id_ulistanggota));
  }
  
  function updateListAnggota($id_listanggota,$new_data)
  {
    $this->db->where('id_listanggota', $id_listanggota);
    return $this->db->update('data_anggota_himpunan', $new_data);
  }
  function updateListUAnggota($id_ulistanggota, $new_data)
  {
    $this->db->where('id_ulistanggota', $id_ulistanggota);
    return $this->db->update('data_anggota_ukmukk', $new_data);
  }
  function delete_list_anggota($id_listanggota)
  {
    $this->db->delete('data_anggota_himpunan', array('id_listanggota' => $id_listanggota));
  }
  function delete_list_uanggota($id_ulistanggota)
  {
    $this->db->delete('data_anggota_ukmukk', array('id_ulistanggota' => $id_ulistanggota));  
  }

  function update_list_anggota_himp($tahun_akademik,$parent_himpunan,$id_listanggota,$file_excel)
  {
    $query_update=$this->db->query("UPDATE data_anggota_himpunan SET tahun_akademik='$tahun_akademik',parent_himpunan='$parent_himpunan', file_excel='$file_excel' WHERE id_listanggota='$id_listanggota' ");
    return $query_update;
  }
  
}


