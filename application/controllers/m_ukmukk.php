<?php 

class m_ukmukk extends CI_Controller{ 

  function cek_daftar_calon()
  {
    $nim = $this->input->post('nim');
    $ukmukk = $this->input->post('ukmukk');
    $where = array(
      'nim' => $nim,
      'ukmukk' => $ukmukk,
    );
    $cek = $this->Model_ukmukk->cek_mhs("tb_calon_anggota",$where);

    if($cek->num_rows() == 0 ){
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);
      
      $config['upload_path']='./assets/img/calon_anggota';
      $config['allowed_types']='jpg|png|jpeg';
      $config['max_size'] = '2048';
      $config['file_name'] = $kode.'-'.$ukmukk.'.jpg';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'calonupload');
      $this->calonupload->initialize($config);
      if(!empty($_FILES['gambar']['name']))
      {
        if(!$this->calonupload->do_upload('gambar'))
        {
          echo "<script>alert('Gagal upload foto, silahkan lakukan pendaftaran ulang dengan foto maximal size 2MB');window.location = '".base_url('c_home/daftar_ukm_ukk')."'</script>";die();
        }  
        else
        {
          $upload_data = $this->calonupload->data();
          $img = $upload_data['file_name'];
          
        }
      }
      $nama = $this->input->post('nama');
      $ttl = $this->input->post('ttl');
      $jk = $this->input->post('jk');
      $domisili = $this->input->post('domisili');
      $no_kontak = $this->input->post('no_kontak');
      $jurusan = $this->input->post('jurusan');
      $fakultas = $this->input->post('parent_fakultas');
      $alasan  = $this->input->post('alasan');
      $image = $img;
      $data = array(
        'nim' => $nim,
        'nama_calon_anggota' => $nama,
        'ttl' => $ttl,
        'jk' => $jk,
        'alamat' => $domisili,
        'no_kontak' => $no_kontak,
        'alasan_bergabung' => $alasan,
        'img_c_anggota' => $image,
        'ukmukk' => $ukmukk,
        'jurusan' => $jurusan,
        'fakultas' => $fakultas,
        'status_calon' => 0,
      );
      $tambah=$this->Model_ukmukk->tambah_calon($data);
      if($tambah){
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> Anda berhasil melakukan pendaftaran!</div>');
			  redirect('c_home/daftar_ukm_ukk');
      }else{
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Pastikan anda telah melakukan seluruh input!</div>');
        redirect('c_home/daftar_ukm_ukk');
      }
    }
    else
		if($cek){
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Anda telah pernah melakukan pendaftaran!</div>');
			redirect('c_home/daftar_ukm_ukk');
    }
  }

  function update_status_calon()
  {
    $id_calon=$this->input->post('id_calon');
    $status_baru=1;
    $update=$this->Model_ukmukk->update_terima($id_calon,$status_baru);
    if($update)
    {
      $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> Calon anggota telah diterima!</div>');
      // $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Calon anggota telah diterima!</div>');
			redirect('c_user/Calon_Anggota');
    }
  }

  function tolak_calon()
  {
    $id_calon=$this->input->post('id_calon');
    $data=$this->Model_ukmukk->getDataByID($id_calon)->row();
    $hapusgambar='./assets/img/calon_anggota/'.$data->img_c_anggota;
    if(is_readable($hapusgambar)&&unlink($hapusgambar))
    {
      $this->Model_ukmukk->hapusData($id_calon);
      $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Calon anggota telah ditolak!</div>');
			redirect('c_user/Calon_Anggota');
    }
  }

}