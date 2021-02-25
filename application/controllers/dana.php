<?php 

class dana extends CI_Controller{ 

    //   pengajuan fklts
      function do_pengajuan()
      {
      $this->form_validation->set_rules('suratpengajuan', 'rinciankegiatan', 'rkakl', 'tor', 'required');
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);

      // $config = array();
      $config['upload_path'] = './assets/uploads/suratpengajuan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'SPJ-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'spjupload');
      $this->spjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rinciankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKG-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rkgupload');
      $this->rkgupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rkakl/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKA_KL-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'rkaklupload');
      $this->rkaklupload->initialize($config);        

      $config['upload_path'] = './assets/uploads/tor/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'TOR-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'torupload');
      $this->torupload->initialize($config);

      if(!empty($_FILES['suratpengajuan']['name']))
        {
            if(!$this->spjupload->do_upload('suratpengajuan'))
            {
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->spjupload->data();
                $spj = $upload_data['file_name'];
            }
        }
      if(!empty($_FILES['rinciankegiatan']['name']))
      {
          if(!$this->rkgupload->do_upload('rinciankegiatan'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rkgupload->data();
              $rkg = $upload_data['file_name'];
          }
      }
      if(!empty($_FILES['rkakl']['name']))
      {
          if(!$this->rkaklupload->do_upload('rkakl'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rkaklupload->data();
              $rkakl = $upload_data['file_name'];
          }
      }
      if(!empty($_FILES['tor']['name']))
      {
          if(!$this->torupload->do_upload('tor'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->torupload->data();
              $tor = $upload_data['file_name'];
          }
        }
        
      $kd_jrsn	= $this->input->post('kd_jrsn',true);
      $kd_fklts	= $this->input->post('kd_fklts',true);
      $namaKegiatan = $this->input->post('namaKegiatan',true);
      $nPengajuan = $this->input->post('nPengajuan',true);
      $statususer = 3;
      $danasisa = $this->input->post('danasisa',true);
      $danaawal = $this->input->post('danaawal',true);
      $tahunakademik = $this->input->post('tahunakademik',true);
      $akhirkegiatan=date('Y-m-d', strtotime($this->input->post('akhirkegiatan')));
      $suratpengajuannya = $spj;
      $rinciankegiatannya = $rkg;
      $rkaklnya = $rkakl;
      $tornya = $tor;
      $datadana1=array(
        'kd_jrsn' =>$kd_jrsn, 
        'kd_fakultas'=>$kd_fklts,
        'statususer' =>3,
        'akhirkegiatan'=>$akhirkegiatan,
        'danasisa'=>$danasisa,
        'danaawal' =>$danaawal,
        'nPengajuan'=>$nPengajuan,
        'namaKegiatan'=>$namaKegiatan,
        'suratpengajuan'=>$suratpengajuannya,
        'rinciankegiatan'=>$rinciankegiatannya,
        'rkakl'=>$rkaklnya,
        'tor' =>$tornya,
        'tahunakademik'=>$tahunakademik
      );
        // // var_dump($datadana1); die();
        // // $databerhasil=$this->M_dana->pengajuanfile($kd_jrsn,$statususer);
        // $databerhasil1=$this->M_dana->pengajuanfileuser($kd_jrsn,$statususer);
      $datadana2=$this->M_dana->tambah_pengajuan($datadana1);
      if($datadana2){ // Jika sukses
        $this->M_dana->pengajuanfileuser($kd_jrsn,$statususer);
        redirect('c_user/Verifikasi_Data');
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."';</script>";
        }
      }
      
    //   end pengajuan fklts
    
    //   pengajuan univ
      function do_pengajuan_univ()
      {
      $this->form_validation->set_rules('suratpengajuan', 'rinciankegiatan', 'rkakl', 'tor', 'required');
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);

      // $config = array();
      $config['upload_path'] = './assets/uploads/suratpengajuan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'SPJ-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'spjupload');
      $this->spjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rinciankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKG-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rkgupload');
      $this->rkgupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rkakl/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKA_KL-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'rkaklupload');
      $this->rkaklupload->initialize($config);        

      $config['upload_path'] = './assets/uploads/tor/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'TOR-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'torupload');
      $this->torupload->initialize($config);

      if(!empty($_FILES['suratpengajuan']['name']))
        {
            if(!$this->spjupload->do_upload('suratpengajuan'))
            {
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->spjupload->data();
                $spj = $upload_data['file_name'];
            }
        }
      if(!empty($_FILES['rinciankegiatan']['name']))
      {
          if(!$this->rkgupload->do_upload('rinciankegiatan'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rkgupload->data();
              $rkg = $upload_data['file_name'];
          }
      }
      if(!empty($_FILES['rkakl']['name']))
      {
          if(!$this->rkaklupload->do_upload('rkakl'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rkaklupload->data();
              $rkakl = $upload_data['file_name'];
          }
      }
      if(!empty($_FILES['tor']['name']))
      {
          if(!$this->torupload->do_upload('tor'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->torupload->data();
              $tor = $upload_data['file_name'];
          }
        }

      $kd_jrsn	= $this->input->post('kd_jrsn',true);
      $namaKegiatan = $this->input->post('namaKegiatan',true);
      $nPengajuan = $this->input->post('nPengajuan',true);
      $jurusan = $this->input->post('jurusan',true);
      $statususer = 3;
      $danasisa = $this->input->post('danasisa',true);
      $danaawal = $this->input->post('danaawal',true);
      $tahunakademik = $this->input->post('tahunakademik',true);
      $akhirkegiatan=date('Y-m-d', strtotime($this->input->post('akhirkegiatan')));
      $suratpengajuannya = $spj;
      $rinciankegiatannya = $rkg;
      $rkaklnya = $rkakl;
      $tornya = $tor;
    //   $datadana1=array(
    //     'kd_jrsn' =>$kd_jrsn,
    //     'kd_fakultas'=> '',
    //     'statususer' =>3,
    //     'akhirkegiatan'=>$akhirkegiatan,
    //     'danasisa'=>$danasisa,
    //     'danaawal' =>$danaawal,
    //     'nPengajuan'=>$nPengajuan,
    //     'namaKegiatan'=>$namaKegiatan,
    //     'suratpengajuan'=>$suratpengajuannya,
    //     'rinciankegiatan'=>$rinciankegiatannya,
    //     'rkakl'=>$rkaklnya,
    //     'tor' =>$tornya,
    //     'tahunakademik'=>$tahunakademik
    //   );
      // $databerhasil1=$this->M_dana->pengajuanfileuser($kd_jrsn,$statususer);
      $datadana1=$this->M_dana->tambah_pengajuan_univ($kd_jrsn,$namaKegiatan,$nPengajuan,$jurusan,$statususer,$danasisa,$danaawal,$tahunakademik,$akhirkegiatan,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya);
      if($datadana1){ // Jika sukses
        $this->M_dana->pengajuanfileuser($kd_jrsn,$statususer);
        redirect('c_user/Verifikasi_Data');
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."';</script>";
        }
      }
    //   end pengajuan univ
      public function admin_acc_pengajuan_univ(){
        $id_pengajuan = $this->input->post('id_pengajuan');
        $kd_jrsn = $this->input->post('kd_jrsn');
        $danasisa =$this->input->post('danasisa', true);
        $danaminus =$this->input->post('danaminus', true);

        // kalau diacc
          $statususer6 = 4;
          $kd_jrsn = $this->input->post('kd_jrsn', true);
          $b = $danasisa;
          $c = $danaminus;
          $x = $b-$c;
        
        $nPengajuan6 = $this->input->post('nPengajuan', true);
            
            $this->M_dana->pengajuandiacc($id_pengajuan, $statususer6, $x, $nPengajuan6,$c);
            $this->M_dana->pengajuandiaccupdatedb($kd_jrsn, $x, $nPengajuan6);
            $this->M_dana->pengajuandiaccupdatedbuser($kd_jrsn, $statususer6, $x, $nPengajuan6);
            $this->session->set_flashdata('flashormawahimp','Pengajuan Ormawa telah diterima');
            redirect('c_admin/Cek_Pengajuan_Universitas');
        
      }
      public function admin_acc_pengajuan(){
        $id_pengajuan = $this->input->post('id_pengajuan');
        $kd_jrsn = $this->input->post('kd_jrsn');
        $danasisa =$this->input->post('danasisa', true);
        $danaminus =$this->input->post('danaminus', true);

        // kalau diacc
          $statususer6 = 4;
          $kd_jrsn = $this->input->post('kd_jrsn', true);
          $b = $danasisa;
          $c = $danaminus;
          $x = $b-$c;
        
        $nPengajuan6 = $this->input->post('nPengajuan', true);
            
            $this->M_dana->pengajuandiacc($id_pengajuan, $statususer6, $x, $nPengajuan6,$c);
            $this->M_dana->pengajuandiaccupdatedb($kd_jrsn, $x, $nPengajuan6);
            $this->M_dana->pengajuandiaccupdatedbuser($kd_jrsn, $statususer6, $x, $nPengajuan6);
            $this->session->set_flashdata('flashormawahimp','Pengajuan Ormawa telah diterima');
            redirect('c_admin/Cek_Pengajuan_Fakultas');
        
      }
      public function admin_acc_pengajuan_ukmukk(){
        $id_pengajuan_ukmukk=$this->input->post('id_pengajuan_ukmukk', true);
        $kd_ukmkk = $this->input->post('kd_ukmukk');
        $danasisa =$this->input->post('danasisa', true);
        $danaminus =$this->input->post('danaminus', true);

        // kalau diacc
          $statususer6 = 4;
          $kd_ukmkk = $this->input->post('kd_ukmkk', true);
          $b = $danasisa;
          $c = $danaminus;
          $x = $b-$c;
            $nPengajuan6 = $this->input->post('nPengajuan', true);
            $this->M_dana->pengajuandiacc_ukmukk($id_pengajuan_ukmukk, $statususer6, $x, $nPengajuan6,$c);
            $this->M_dana->pengajuandiaccupdatedb_ukmukk($kd_ukmkk, $x, $nPengajuan6);
            $this->M_dana->pengajuandiaccupdatedbuser_ukmukk($kd_ukmkk, $statususer6);
            $this->session->set_flashdata('flashormawahimp','Pengajuan UKM/UKK telah diterima');
            redirect('c_admin/Cek_Pengajuan_UKMUKK');
        
      }
      function do_laporan(){
      $this->form_validation->set_rules('laporankegiatan', 'laporanrincianbiaya', 'rkakl', 'tor', 'required');
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);

      // $config = array();
      $config['upload_path'] = './assets/uploads/laporankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'LPJ-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'lpjupload');
      $this->lpjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/laporanrincianbiaya/';//path folder
      $config['allowed_types'] = 'pdf|xlsx';//type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RBY-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rbyupload');
      $this->rbyupload->initialize($config);

        if(!empty($_FILES['laporankegiatan']['name']))
        {
            if(!$this->lpjupload->do_upload('laporankegiatan'))
            {
                // $this->lpjupload->display_errors();
                echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Laporan_Kegiatan')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->lpjupload->data();
                $lpj = $upload_data['file_name'];
            }
        }
      if(!empty($_FILES['laporanrincianbiaya']['name']))
      {
          if(!$this->rbyupload->do_upload('laporanrincianbiaya'))
          {
              // $this->rbyupload->display_errors();
              echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Laporan_Kegiatan')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rbyupload->data();
              $rby = $upload_data['file_name'];
          }
      }
      $kd_jrsn=$this->input->post('kd_jrsn', true);
      $laporankegiatannya=$lpj;
      $rincianbiayanya=$rby;
      $id_pengajuan=$this->input->post('id_pengajuan', true);
      $akhirkegiatan= date("Y-m-d",strtotime($this->input->post('akhirkegiatan')));
      $tgluploadlpj=date("Y-m-d",strtotime($this->input->post('tgluploadlpj')));
      $tglmakslaporan= date('Y-m-d',strtotime('+7 day',strtotime($akhirkegiatan))); 
      $statususer=5;

      $this->M_dana->update_laporan($id_pengajuan, $statususer, $tgluploadlpj, $tglmakslaporan, $laporankegiatannya, $rincianbiayanya);
      $this->M_dana->update_laporanuser($kd_jrsn, $statususer);
      redirect('c_user/Verifikasi_Laporan');
    }
    function updatedanhapus_univ($kd_jrsn){
      // $kd_jrsn=$this->input->post('kd_jrsn');
      $nPengajuan=$this->input->post('nPengajuan',true);
      $x=$nPengajuan;
      $y=1;
      $newnPengajuan = $x+$y;
      $statususer=2;
      $this->M_dana->update_nPengajuan($statususer,$newnPengajuan,$kd_jrsn);
      $this->M_dana->update_nPengajuanuser($statususer,$kd_jrsn);

      $data=$this->M_dana->getDataByID($kd_jrsn)->row();
      $hapusspj='./assets/uploads/suratpengajuan/'.$data->suratpengajuan;
      $hapusrkg='./assets/uploads/rinciankegiatan/'.$data->rinciankegiatan;
      $hapusrkakl='./assets/uploads/rkakl/'.$data->rkakl;
      $hapustor='./assets/uploads/tor/'.$data->tor;
      $hapuslpj='./assets/uploads/laporankegiatan/'.$data->laporankegiatan;
      $hapusrby='./assets/uploads/laporanrincianbiaya/'.$data->laporanrincianbiaya;


      if(is_readable($hapusspj)&&is_readable($hapusrkg)&&is_readable($hapusrkakl)&&is_readable($hapustor)&&is_readable($hapuslpj)&&is_readable($hapusrby)&&unlink($hapusspj)&&unlink($hapusrkg)&&unlink($hapustor)&&unlink($hapusrkakl)&&unlink($hapuslpj)&&unlink($hapusrby)){
        $delete=$this->M_dana->hapusFile($kd_jrsn);
        redirect(base_url('c_admin/Laporan_Kegiatan_Universitas'));
      }
      else{
        echo "ulangi";
      }
    }
    function updatedanhapus($kd_jrsn){
      // $kd_jrsn=$this->input->post('kd_jrsn');
      $nPengajuan=$this->input->post('nPengajuan',true);
      $x=$nPengajuan;
      $y=1;
      $newnPengajuan = $x+$y;
      $statususer=2;
      $this->M_dana->update_nPengajuan($statususer,$newnPengajuan,$kd_jrsn);
      $this->M_dana->update_nPengajuanuser($statususer,$kd_jrsn);

      $data=$this->M_dana->getDataByID($kd_jrsn)->row();
      $hapusspj='./assets/uploads/suratpengajuan/'.$data->suratpengajuan;
      $hapusrkg='./assets/uploads/rinciankegiatan/'.$data->rinciankegiatan;
      $hapusrkakl='./assets/uploads/rkakl/'.$data->rkakl;
      $hapustor='./assets/uploads/tor/'.$data->tor;
      $hapuslpj='./assets/uploads/laporankegiatan/'.$data->laporankegiatan;
      $hapusrby='./assets/uploads/laporanrincianbiaya/'.$data->laporanrincianbiaya;
      if(is_readable($hapusspj)&&is_readable($hapusrkg)&&is_readable($hapusrkakl)&&is_readable($hapustor)&&is_readable($hapuslpj)&&is_readable($hapusrby)&&unlink($hapusspj)&&unlink($hapusrkg)&&unlink($hapustor)&&($hapusrkakl)&&($hapuslpj)&&($hapusrby)){
        $this->M_dana->hapusFile($kd_jrsn);
        redirect(base_url('c_admin/Laporan_Kegiatan_Fakultas'));
      }
      else{
        echo "ulangi";
      }
    }
    // terima laporan
    function acc_laporan_univ()
    {
      $id_pengajuan=$this->uri->segment(3);
      $nPengajuan = $this->input->post('nPengajuan', true);
      $kd_jrsn = $this->input->post('kd_jrsn', true);
      $x = $nPengajuan;
      $y = 1;
      $tambah_pengajuan=$x+$y;
      if($tambah_pengajuan==4){
         $statususer_pengajuan=11;
         $statususer_user=11;
      }else{
         $statususer_pengajuan=10; 
         $statususer_user=2;
      }
      // untuk tb_detailuser
      $this->M_dana->update_detailnpengajuan_fklts($kd_jrsn,$tambah_pengajuan);
      // untuk tb_pengajuan
      $this->M_dana->update_npengajuan_fklts($id_pengajuan,$statususer_pengajuan);
      // untuk user
      $this->M_dana->update_pengajuanuser_fklts($kd_jrsn,$statususer_user);
      $this->session->set_flashdata('flashormawahimp','Laporan Kegiatan berhasil diterima, silahkan melihat ke history pengajuan untuk informasi lebih lengkap!');
      redirect(base_url('c_admin/Laporan_Kegiatan_Universitas'));
    }
    function acc_laporan_fklts()
    {
      $id_pengajuan=$this->uri->segment(3);
      $statususer_user=2;
      $nPengajuan = $this->input->post('nPengajuan', true);
      $kd_jrsn = $this->input->post('kd_jrsn', true);
      $x = $nPengajuan;
      $y = 1;
      $tambah_pengajuan=$x+$y;
      if($tambah_pengajuan==4){
         $statususer_pengajuan=11;
         $statususer_user=11;
      }else{
         $statususer_pengajuan=10; 
         $statususer_user=2;
      }
      // untuk tb_detailuser
      $this->M_dana->update_detailnpengajuan_fklts($kd_jrsn,$tambah_pengajuan);
      // untuk tb_pengajuan
      $this->M_dana->update_npengajuan_fklts($id_pengajuan,$statususer_pengajuan);
      // untuk user
      $this->M_dana->update_pengajuanuser_fklts($kd_jrsn,$statususer_user);
      // var_dump($update,$update1,$update2); die();
      // if(!$update){
      $this->session->set_flashdata('flashormawahimp','Laporan Kegiatan berhasil diterima, silahkan melihat ke history pengajuan untuk informasi lebih lengkap!');
      // }
      redirect(base_url('c_admin/Laporan_Kegiatan_Fakultas'));
    }
    function tolak_laporan()
    {
      $id_pengajuan=$this->input->post('id_pengajuan', true);
      $statususer=7;
      $alasan_gagal_laporan=$this->input->post('alasan_tolak_laporan',true);
      $kd_jrsn=$this->input->post('pengaju', true);

      $this->M_dana->send_alasan_l_fklts($id_pengajuan, $alasan_gagal_laporan);
      $this->M_dana->send_update_l_u_fklts($kd_jrsn,$statususer);
      $this->session->set_flashdata('flashormawahimp','Laporan kegiatan berhasil ditolak!');
      redirect(base_url('c_admin/Laporan_Kegiatan_Fakultas'));
    }
    function tolak_laporan_univ()
    {
      $id_pengajuan=$this->uri->segment(4);
      $kd_jrsn=$this->uri->segment(3);
    //   $id_pengajuan=$this->input->post('id_pengajuan', true);
      $statususer=7;
      $alasan_gagal_laporan=$this->input->post('alasan_tolak_laporan',true);
    //   $kd_jrsn=$this->input->post('pengaju', true);

      $this->M_dana->send_alasan_l_fklts($id_pengajuan, $alasan_gagal_laporan);
      $this->M_dana->send_update_l_u_fklts($kd_jrsn,$statususer);
      $this->session->set_flashdata('flashormawahimp','Laporan kegiatan berhasil ditolak!');
      redirect(base_url('c_admin/Laporan_Kegiatan_Universitas'));
    }
    // pengajuan UKMUKK
    function do_pengajuan_ukmukk(){
      $this->form_validation->set_rules('suratpengajuan', 'rinciankegiatan', 'rkakl', 'tor', 'required');
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);

      // $config = array();
      $config['upload_path'] = './assets/uploads/suratpengajuan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'SPJ-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'spjupload');
      $this->spjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rinciankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKG-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rkgupload');
      $this->rkgupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rkakl/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKA_KL-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'rkaklupload');
      $this->rkaklupload->initialize($config);        

      $config['upload_path'] = './assets/uploads/tor/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'TOR-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'torupload');
      $this->torupload->initialize($config);

      if(!empty($_FILES['suratpengajuan']['name']))
        {
            if(!$this->spjupload->do_upload('suratpengajuan'))
            {
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->spjupload->data();
                $spj = $upload_data['file_name'];
            }
        }
      if(!empty($_FILES['rinciankegiatan']['name']))
      {
          if(!$this->rkgupload->do_upload('rinciankegiatan'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rkgupload->data();
              $rkg = $upload_data['file_name'];
          }
      }
      if(!empty($_FILES['rkakl']['name']))
      {
          if(!$this->rkaklupload->do_upload('rkakl'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rkaklupload->data();
              $rkakl = $upload_data['file_name'];
          }
      }
      if(!empty($_FILES['tor']['name']))
      {
          if(!$this->torupload->do_upload('tor'))
          {
            echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->torupload->data();
              $tor = $upload_data['file_name'];
          }
        }
        
      $kd_ukmukk	= $this->input->post('kd_ukmukk',true);
      $nama_ukmukk	= $this->input->post('nama_ukmukk',true);
      $namaKegiatan = $this->input->post('namaKegiatan',true);
      $nPengajuan = $this->input->post('nPengajuan',true);
      $statususer = 3;
      $danasisa = $this->input->post('danasisa',true);
      $danaawal = $this->input->post('danaawal',true);
      $tahunakademik = $this->input->post('tahunakademik',true);
      $akhirkegiatan=date('Y-m-d', strtotime($this->input->post('akhirkegiatan')));
      $suratpengajuannya = $spj;
      $rinciankegiatannya = $rkg;
      $rkaklnya = $rkakl;
      $tornya = $tor;
      $datadana=array(
        'kd_ukmkk'=>$kd_ukmukk,
        'nama_ukmukk'=>$nama_ukmukk,
        'statususer' =>3,
        'akhirkegiatan'=>$akhirkegiatan,
        'danasisa'=>$danasisa,
        'danaawal' =>$danaawal,
        'nPengajuan'=>$nPengajuan,
        'namaKegiatan'=>$namaKegiatan,
        'suratpengajuan'=>$suratpengajuannya,
        'rinciankegiatan'=>$rinciankegiatannya,
        'rkakl'=>$rkaklnya,
        'tor' =>$tornya,
        'tahunakademik'=>$tahunakademik
      );
      $datadana1=$this->M_dana->tambah_pengajuan_ukmukk($datadana);
      if($datadana1){ // Jika sukses
        $this->M_dana->pengajuanfileuser_ukmukk($kd_ukmukk,$statususer);
        redirect('c_user/Verifikasi_Data');
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."';</script>";
        }
    }
    function acc_laporan_ukmukk()
    {
      $id_pengajuan_ukmukk=$this->uri->segment(3);
      $nPengajuan = $this->input->post('nPengajuan', true);
      $kd_ukmkk = $this->input->post('kd_ukmkk', true);
      $x = $nPengajuan;
      $y = 1;
      $tambah_pengajuan=$x+$y;
      if($tambah_pengajuan==4){
         $statususer_pengajuan=11;
         $statususer_user=11;
      }else{
         $statususer_pengajuan=10; 
         $statususer_user=2;
      }
      // untuk tb_detailuserukmukk
      $this->M_dana->update_detailnpengajuan_ukmukk($kd_ukmkk,$tambah_pengajuan);
      // untuk tb_pengajuan_ukmukk
      $this->M_dana->update_npengajuan_ukmukk($id_pengajuan_ukmukk,$statususer_pengajuan);
      // untuk user
      $this->M_dana->update_pengajuanuser_ukmukk($kd_ukmkk,$statususer_user);
      $this->session->set_flashdata('flashormawahimp','Laporan Kegiatan berhasil diterima, silahkan melihat ke history laporan UKM UKK untuk informasi lebih lengkap!');
      redirect(base_url('c_admin/Laporan_Kegiatan_UKMUKK'));
    }
    function tolak_laporan_ukmukk()
    {
      $id_pengajuan_ukmukk=$this->input->post('id_pengajuan_ukmukk', true);
      $statususer=7;
      $alasan_gagal_laporan=$this->input->post('alasan_tolak_laporan',true);
      $kd_ukmkk=$this->input->post('pengaju', true);

      $this->M_dana->send_alasan_l_ukmukk($id_pengajuan_ukmukk, $alasan_gagal_laporan, $statususer);
      $this->M_dana->send_update_l_u_ukmukk($kd_ukmkk,$statususer);
      $this->session->set_flashdata('flashormawahimp','Laporan kegiatan berhasil ditolak!');
      redirect(base_url('c_admin/Laporan_Kegiatan_UKMUKK'));
    }
    function updatedanhapus_ukmukk($kd_ukmkk){
      $kd_jrsn=$this->input->post('kd_ukmkk');
      $nPengajuan=$this->input->post('nPengajuan',true);
      $x=$nPengajuan;
      $y=1;
      $newnPengajuan = $x+$y;
      $statususer=2;
      $this->M_dana->update_nPengajuan_ukmukk($statususer,$newnPengajuan,$kd_ukmkk);
      $this->M_dana->update_nPengajuanuser($statususer,$kd_jrsn);

      $data=$this->M_dana->getDataByID($kd_ukmkk)->row();
      $hapusspj='./assets/uploads/suratpengajuan/'.$data->suratpengajuan;
      $hapusrkg='./assets/uploads/rinciankegiatan/'.$data->rinciankegiatan;
      $hapusrkakl='./assets/uploads/rkakl/'.$data->rkakl;
      $hapustor='./assets/uploads/tor/'.$data->tor;
      $hapuslpj='./assets/uploads/laporankegiatan/'.$data->laporankegiatan;
      $hapusrby='./assets/uploads/laporanrincianbiaya/'.$data->laporanrincianbiaya;


      if(is_readable($hapusspj)&&is_readable($hapusrkg)&&is_readable($hapusrkakl)&&is_readable($hapustor)&&is_readable($hapuslpj)&&is_readable($hapusrby)&&unlink($hapusspj)&&unlink($hapusrkg)&&unlink($hapustor)&&($hapusrkakl)&&($hapuslpj)&&($hapusrby)){
        $delete=$this->M_dana->hapusFile_ukmukk($kd_ukmkk);
        redirect(base_url('c_admin/Laporan_Kegiatan_UKMUKK'));
      }
      else{
        echo "ulangi";
      }
    }
    // laporan ukmukk
    function do_laporan_ukmukk(){
      $this->form_validation->set_rules('laporankegiatan', 'laporanrincianbiaya', 'rkakl', 'tor', 'required');
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);
      $kd_ukmkk=$this->input->post('kd_ukmkk', true);
      $namaKegiatan=$this->input->post('namaKegiatan', true);
      $nPengajuan=$this->input->post('nPengajuan', true);
      
      // $config = array();
      $config['upload_path'] = './assets/uploads/laporankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'LPJ-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'lpjupload');
      $this->lpjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/laporanrincianbiaya/';//path folder
      $config['allowed_types'] = 'pdf|xlsx'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RBY-'.$kd_ukmkk.'-ke'.$nPengajuan.'-'.$namaKegiatan.'-'.$kode.'';
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rbyupload');
      $this->rbyupload->initialize($config);

        if(!empty($_FILES['laporankegiatan']['name']))
        {
            if(!$this->lpjupload->do_upload('laporankegiatan'))
            {
              echo "<script>alert('Data gagal diupdate, File pdf maximal 2MB');window.location = '".base_url('c_user/Laporan_Kegiatan')."'</script>";die();
            }  
            else
            {
                $upload_data = $this->lpjupload->data();
                $lpj = $upload_data['file_name'];
            }
        }
      if(!empty($_FILES['laporanrincianbiaya']['name']))
      {
          if(!$this->rbyupload->do_upload('laporanrincianbiaya'))
          {
            echo "<script>alert('Data gagal diupdate, File excel maximal 2MB');window.location = '".base_url('c_user/Laporan_Kegiatan')."'</script>";die();
          }  
          else
          {
              $upload_data = $this->rbyupload->data();
              $rby = $upload_data['file_name'];
          }
      }
      $laporankegiatannya=$lpj;
      $rincianbiayanya=$rby;
      $akhirkegiatan= date("Y-m-d",strtotime($this->input->post('akhirkegiatan')));
      $tgluploadlpj=date("Y-m-d",strtotime($this->input->post('tgluploadlpj')));
      $tglmakslaporan= date('Y-m-d',strtotime('+7 day',strtotime($akhirkegiatan))); 
      $statususer=5;
      $id_pengajuan_ukmukk=$this->input->post('id_pengajuan_ukmukk',true);
      $this->M_dana->update_laporan_ukmukk($id_pengajuan_ukmukk, $statususer, $tgluploadlpj, $tglmakslaporan, $laporankegiatannya, $rincianbiayanya);
      // $this->M_dana->update_laporandetail_ukmukk($kd_ukmkk, $statususer);
      $this->M_dana->update_laporanuser_ukmukk($kd_ukmkk, $statususer);
      redirect('c_user/Verifikasi_Laporan');
    }
    // fungsi menolak nolak
      // tolak pengajuan univ
      function hapus_pengajuan_univ(){
        $id_pengajuan= $this->input->post('id_pengajuan', true);
        $kd_jrsn=$this->input->post('pengaju', true);
        $alasan_tolak_pengajuan=$this->input->post('alasan_tolak_pengajuan',true);
        // $data=$this->M_dana->getDataByID($kd_jrsn)->row();
        $statususer=6;
        $this->M_dana->send_alasan_p_fklts($id_pengajuan,$statususer,$alasan_tolak_pengajuan);
        $this->M_dana->send_update_u_fklts($kd_jrsn,$statususer);
        $this->session->set_flashdata('flashormawahimp','Pengajuan Anggaran Dana berhasil ditolak');
        redirect(base_url('c_admin/Cek_Pengajuan_Universitas'));
      }
      // tolak pengajuan jurusan
      function hapus_pengajuan_jrsn(){
        $id_pengajuan= $this->input->post('id_pengajuan', true);
        $kd_jrsn=$this->input->post('pengaju', true);
        $alasan_tolak_pengajuan=$this->input->post('alasan_tolak_pengajuan',true);
        // $data=$this->M_dana->getDataByID($kd_jrsn)->row();
        $statususer=6;
        $this->M_dana->send_alasan_p_fklts($id_pengajuan,$statususer,$alasan_tolak_pengajuan);
        $this->M_dana->send_update_u_fklts($kd_jrsn,$statususer);
        $this->session->set_flashdata('flashormawahimp', 'Pengajuan Anggaran Dana berhasil ditolak');
        // $this->M_dana->send_update_d_fklts($kd_jrsn,$statususer,$nPengajuan7);
        redirect(base_url('c_admin/Cek_Pengajuan_Fakultas'));
      }
      // tolak pengajuan ukmukk
      function hapus_pengajuan_ukmukk(){
        $id_pengajuan_ukmukk= $this->input->post('id_pengajuan_ukmukk', true);
        $kd_ukmkk=$this->input->post('pengaju', true);
        $alasan_tolak_pengajuan=$this->input->post('alasan_tolak_pengajuan',true);
        $statususer=6;
        $this->M_dana->send_alasan_p_ukmukk($id_pengajuan_ukmukk,$statususer,$alasan_tolak_pengajuan);
        $this->M_dana->send_update_u_ukmukk($kd_ukmkk,$statususer);
        $this->session->set_flashdata('flashormawahimp', 'Pengajuan Anggaran Dana berhasil ditolak');
        redirect(base_url('c_admin/Cek_Pengajuan_UKMUKK'));
      }
    // end fungsi menolak nolak
}
