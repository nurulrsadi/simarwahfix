<?php 

class dana extends CI_Controller{ 

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
                $this->spjupload->display_errors();
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
              $this->rkgupload->display_errors();
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
              $this->rkaklupload->display_errors();
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
              $this->torupload->display_errors();
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

        $databerhasil=$this->M_dana->pengajuanfile($kd_jrsn,$statususer);
        $databerhasil1=$this->M_dana->pengajuanfileuser($kd_jrsn,$statususer);
      $this->M_dana->tambah_pengajuan($datadana1);
      if($datadana1){ // Jika sukses
        redirect('c_user/Verifikasi_Data');
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate, File pdf min 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."';</script>";
        }
      }

      public function admin_acc_pengajuan(){
        $kd_jrsn = $this->input->post('kd_jrsn');
        $where = array('kd_jrsn' => $kd_jrsn);
        $u = $this->M_dana->getDataByID($kd_jrsn)->row();
        $tahunakademik = $this->input->post('tahunakademik', true);
        $danasisa =$this->input->post('danasisa', true);
        $danaminus =$this->input->post('danaminus', true);
        $pesangagal =$this->input->post('pesangagal', true);
        $nPengajuan =$this->input->post('nPengajuan', true);
        $statususer = $this->input->post('statususer');
        $uangsisaacc = $this->input->post('uangsisaacc');
        $sup = 1;

        // kalau diacc
        if($danaminus!=''){
          $statususer6 = 4;
          $kd_jrsn = $this->input->post('kd_jrsn', true);
          $b = $danasisa;
          $c = $danaminus;
          $x = $b-$c;
          if($data['nPengajuan'] = 1 )
            {
              $pengajuan1 = $data['nPengajuan']+$data['a'];
              $nPengajuan6 = $pengajuan1; 
            } else if ($data['nPengajuan'] = 2 )
            {
              $pengajuan2 = $data['nPengajuan']+$data['a'];
              $nPengajuan6 = $pengajuan2; 
            } else if ($data['nPengajuan'] = 3 )
            {
              $pengajuan3 = $data['nPengajuan']+$data['a'];
              $nPengajuan6 = $pengajuan3; 
            } else {
              $data['b'] = 1;
              $pengajuan4 = $data['b'];
              $nPengajuan6 = $pengajuan4;
            }
            
            $this->M_dana->pengajuandiacc($kd_jrsn, $statususer6, $x, $nPengajuan6,$c);
            // $this->M_dana->pengajuandiaccupdatedb($kd_jrsn, $statususer6, $x, $nPengajuan6);
            $this->M_dana->pengajuandiaccupdatedbuser($kd_jrsn, $statususer6, $x, $nPengajuan6);
            redirect('c_admin/Cek_Pengajuan_Fakultas');
            $this->session->set_flashdata('flashpengajuan','Pengajuan Ormawa telah diterima');
        }
        else{
          redirect('c_admin/tolak_pengajuan');
          // $statususer7 = 2;
          // $kd_jrsn = $this->input->post('kd_jrsn', true);
          // if($data['nPengajuan'] = 1 )
          // {
          //   $pengajuan1 = $data['nPengajuan'];
          //   $nPengajuan7 = $pengajuan1; 
          // } else if ($data['nPengajuan'] = 2 )
          // {
          //   $pengajuan2 = $data['nPengajuan']-$data['a'];
          //   $nPengajuan7 = $pengajuan2; 
          // } else if ($data['nPengajuan'] = 3 )
          // {
          //   $pengajuan3 = $data['nPengajuan']-$data['a'];
          //   $nPengajuan7 = $pengajuan3; 
          // } else {
          //   $data['b'] = 1;
          //   $pengajuan4 = $data['b'];
          //   $nPengajuan7 = $pengajuan4;
          // }

          //   $this->M_dana->pengajuantidakdiaccupdate($kd_jrsn, $statususer7);
          //   $this->M_dana->pengajuantidakdiaccdetil($kd_jrsn,$statususer7, $danasisa,$nPengajuan7,$pesangagal);
            
            
            
            
          //   // $this->M_dana->pengajuandiaccupdatedbuser($kd_jrsn, $statususer7, $nPengajuan6);
          //   redirect('c_admin/Cek_Pengajuan_Fakultas');
        }
        // if()
      }
      public function admin_acc_pengajuan_ukmukk(){
        $kd_ukmkk = $this->input->post('kd_ukmukk');
        $where = array('kd_ukmkk' => $kd_ukmkk);
        $u = $this->M_dana->getDataByID($kd_ukmkk)->row();
        $tahunakademik = $this->input->post('tahunakademik', true);
        $danasisa =$this->input->post('danasisa', true);
        $danaminus =$this->input->post('danaminus', true);
        $pesangagal =$this->input->post('pesangagal', true);
        $nPengajuan =$this->input->post('nPengajuan', true);
        $statususer = $this->input->post('statususer');
        $uangsisaacc = $this->input->post('uangsisaacc');
        $sup = 1;

        // kalau diacc
        if($danaminus!=''){
          $statususer6 = 4;
          $kd_ukmkk = $this->input->post('kd_ukmkk', true);
          $b = $danasisa;
          $c = $danaminus;
          $x = $b-$c;
          if($data['nPengajuan'] = 1 )
            {
              $pengajuan1 = $data['nPengajuan']+$data['a'];
              $nPengajuan6 = $pengajuan1; 
            } else if ($data['nPengajuan'] = 2 )
            {
              $pengajuan2 = $data['nPengajuan']+$data['a'];
              $nPengajuan6 = $pengajuan2; 
            } else if ($data['nPengajuan'] = 3 )
            {
              $pengajuan3 = $data['nPengajuan']+$data['a'];
              $nPengajuan6 = $pengajuan3; 
            } else {
              $data['b'] = 1;
              $pengajuan4 = $data['b'];
              $nPengajuan6 = $pengajuan4;
            }
            
            $this->M_dana->pengajuandiacc_ukmukk($kd_ukmkk, $statususer6, $x, $nPengajuan6,$c);
            $this->M_dana->pengajuandiaccupdatedb_ukmukk($kd_ukmkk, $statususer6, $x, $nPengajuan6);
            $this->M_dana->pengajuandiaccupdatedbuser_ukmukk($kd_ukmkk, $statususer6, $x, $nPengajuan6);
            redirect('c_admin/Cek_Pengajuan_UKMUKK');
            $this->session->set_flashdata('flashpengajuan','Pengajuan UKM/UKK telah diterima');
        }
        else{
          redirect('c_admin/tolak_pengajuan');
          // $statususer7 = 2;
          // $kd_jrsn = $this->input->post('kd_jrsn', true);
          // if($data['nPengajuan'] = 1 )
          // {
          //   $pengajuan1 = $data['nPengajuan'];
          //   $nPengajuan7 = $pengajuan1; 
          // } else if ($data['nPengajuan'] = 2 )
          // {
          //   $pengajuan2 = $data['nPengajuan']-$data['a'];
          //   $nPengajuan7 = $pengajuan2; 
          // } else if ($data['nPengajuan'] = 3 )
          // {
          //   $pengajuan3 = $data['nPengajuan']-$data['a'];
          //   $nPengajuan7 = $pengajuan3; 
          // } else {
          //   $data['b'] = 1;
          //   $pengajuan4 = $data['b'];
          //   $nPengajuan7 = $pengajuan4;
          // }

          //   $this->M_dana->pengajuantidakdiaccupdate($kd_jrsn, $statususer7);
          //   $this->M_dana->pengajuantidakdiaccdetil($kd_jrsn,$statususer7, $danasisa,$nPengajuan7,$pesangagal);
            
            
            
            
          //   // $this->M_dana->pengajuandiaccupdatedbuser($kd_jrsn, $statususer7, $nPengajuan6);
          //   redirect('c_admin/Cek_Pengajuan_Fakultas');
        }
        // if()
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
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RBY-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rbyupload');
      $this->rbyupload->initialize($config);

        if(!empty($_FILES['laporankegiatan']['name']))
        {
            if(!$this->lpjupload->do_upload('laporankegiatan'))
            {
                $this->lpjupload->display_errors();
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
              $this->rbyupload->display_errors();
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
      $akhirkegiatan= date("Y-m-d",strtotime($this->input->post('akhirkegiatan')));
      $tgluploadlpj=date("Y-m-d",strtotime($this->input->post('tgluploadlpj')));
      $tglmakslaporan= date('Y-m-d',strtotime('+7 day',strtotime($akhirkegiatan))); 
      $statususer=5;
      $data=array(
        'kd_jrsn' => $kd_jrsn,
        'statususer' => $statususer,
        'akhirkegiatan' => $akhirkegiatan,
        'tgluploadlpj' => $tgluploadlpj,
        'tglmakslaporan' => $tglmakslaporan,
        'laporankegiatan' => $laporankegiatannya,
        'rincianbiaya' => $rincianbiayanya,
      );
      $this->M_dana->update_laporan($kd_jrsn, $statususer, $tgluploadlpj, $tglmakslaporan, $laporankegiatannya, $rincianbiayanya);
      $this->M_dana->update_laporandetail($kd_jrsn, $statususer);
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
                $this->spjupload->display_errors();
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
              $this->rkgupload->display_errors();
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
              $this->rkaklupload->display_errors();
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
              $this->torupload->display_errors();
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
      $datadana1=array(
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
        'tor' =>$tor,
        'tahunakademik'=>$tahunakademik
      );
        $databerhasil=$this->M_dana->pengajuanfile($kd_ukmukk,$statususer);
        $databerhasil1=$this->M_dana->pengajuanfileuser($kd_ukmukk,$statususer);
      $this->M_dana->tambah_pengajuan_ukmukk($datadana1);
      if($datadana1){ // Jika sukses
        redirect('c_user/Verifikasi_Data');
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate, File pdf min 2MB');window.location = '".base_url('c_user/Pagu_Anggaran')."';</script>";
        }
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

      // $config = array();
      $config['upload_path'] = './assets/uploads/laporankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'LPJ-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'lpjupload');
      $this->lpjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/laporanrincianbiaya/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RBY-'.$kode;
      $config['max_size'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rbyupload');
      $this->rbyupload->initialize($config);

        if(!empty($_FILES['laporankegiatan']['name']))
        {
            if(!$this->lpjupload->do_upload('laporankegiatan'))
            {
                $this->lpjupload->display_errors();
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
              $this->rbyupload->display_errors();
          }  
          else
          {
              $upload_data = $this->rbyupload->data();
              $rby = $upload_data['file_name'];
          }
      }
      $kd_ukmkk=$this->input->post('kd_ukmkk', true);
      $laporankegiatannya=$lpj;
      $rincianbiayanya=$rby;
      $akhirkegiatan= date("Y-m-d",strtotime($this->input->post('akhirkegiatan')));
      $tgluploadlpj=date("Y-m-d",strtotime($this->input->post('tgluploadlpj')));
      $tglmakslaporan= date('Y-m-d',strtotime('+7 day',strtotime($akhirkegiatan))); 
      $statususer=5;
      $data=array(
        'kd_ukmkk' => $kd_ukmkk,
        'statususer' => $statususer,
        'akhirkegiatan' => $akhirkegiatan,
        'tgluploadlpj' => $tgluploadlpj,
        'tglmakslaporan' => $tglmakslaporan,
        'laporankegiatan' => $laporankegiatannya,
        'rincianbiaya' => $rincianbiayanya,
      );
      $this->M_dana->update_laporan_ukmukk($kd_ukmkk, $statususer, $tgluploadlpj, $tglmakslaporan, $laporankegiatannya, $rincianbiayanya);
      $this->M_dana->update_laporandetail_ukmukk($kd_ukmkk, $statususer);
      $this->M_dana->update_laporanuser_ukmukk($kd_ukmkk, $statususer);
      redirect('c_user/Verifikasi_Laporan');
    }
    // fungsi menolak nolak
      // tolak pengajuan jurusan
      function hapus_pengajuan_jrsn(){
        $kd_jrsn=$this->input->post('pengaju', true);
        $alasan_tolak_pengajuan=$this->input->post('alasan_tolak_pengajuan',true);
        // $data=$this->M_dana->getDataByID($kd_jrsn)->row();
        $statususer=6;
        $nPengajuan=$this->input->post('nPengajuan');
        if($data['nPengajuan'] = 1 )
        {
          $pengajuan1 = $data['nPengajuan'];
          $nPengajuan7 = $pengajuan1; 
        } else if ($data['nPengajuan'] = 2 )
        {
          $pengajuan2 = $data['nPengajuan']-$data['a'];
          $nPengajuan7 = $pengajuan2; 
        } else if ($data['nPengajuan'] = 3 )
        {
          $pengajuan3 = $data['nPengajuan']-$data['a'];
          $nPengajuan7 = $pengajuan3; 
        } else {
          $data['b'] = 1;
          $pengajuan4 = $data['b'];
          $nPengajuan7 = $pengajuan4;
        }
        $this->M_dana->send_alasan_p_fklts($kd_jrsn,$statususer,$alasan_tolak_pengajuan,$nPengajuan7);
        $this->M_dana->send_update_u_fklts($kd_jrsn,$statususer);
        // $this->M_dana->send_update_d_fklts($kd_jrsn,$statususer,$nPengajuan7);
        redirect(base_url('c_admin/Cek_Pengajuan_Fakultas'));
          
      }
    // end fungsi menolak nolak
}
