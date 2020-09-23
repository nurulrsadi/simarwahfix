<?php 

class dana extends CI_Controller{ 
        
        private function _detail()
        {
        // join 3 table 
        $this->db->select('*');
        return $this->db->from('user')
                ->join('tb_pengajuandana', 'user.dana_awal=tb_pengajuandana.id_pengajuan')
                // ->join('tb_kelas', 'tb_user.kelas=tb_kelas.id_kelas')
                ->get()
                ->row_array();
        }
        
        function do_pengajuan()
      {
      $this->form_validation->set_rules('suratpengajuan', 'rinciankegiatan', 'rkakl', 'tor', 'required');
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);

      // $config = array();
      $config['upload_path'] = './assets/uploads/suratpengajuan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'SPJ-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'spjupload');
      $this->spjupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rinciankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKG-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rkgupload');
      $this->rkgupload->initialize($config);

      $config['upload_path'] = './assets/uploads/rkakl/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKA_KL-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'rkaklupload');
      $this->rkaklupload->initialize($config);        

      $config['upload_path'] = './assets/uploads/tor/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'TOR-'.$kode;
      $config['max_width'] = '2048';
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
      $statususer = $this->input->post('statususer',true);
      $danasisa = $this->input->post('danasisa',true);
      $tahunakademik = $this->input->post('tahunakademik',true);
      $akhirkegiatan=date('Y-m-d 00:00:00', strtotime($this->input->post('akhirkegiatan')));
      $data['a'] = 1;
      // buat kalau udah di acc
      // if($data['nPengajuan'] = 1 )
      // {
      //   $pengajuan1 = $data['nPengajuan']+$data['a'];
      //   $nPengajuan6 = $pengajuan1; 
      // } else if ($data['nPengajuan'] = 2 )
      // {
      //   $pengajuan2 = $data['nPengajuan']+$data['a'];
      //   $nPengajuan6 = $pengajuan2; 
      // } else if ($data['nPengajuan'] = 3 )
      // {
      //   $pengajuan3 = $data['nPengajuan']+$data['a'];
      //   $nPengajuan6 = $pengajuan3; 
      // } else if ($data['nPengajuan'] = 4 )
      // {
      //   $pengajuan4 = $data['nPengajuan']+$data['a'];
      //   $nPengajuan6 = $pengajuan4; 
      // }

      if($data['statususer'] = 1 )
      {
        $statususer1 = $data['statususer']+$data['a'];
        $statususer6 = $statususer1; 
      } else if ($data['statususer'] =2 )
      {
        $statususer2 = $data['statususer']+$data['a'];
        $statususer6 = $statususer2; 
      } else if ($data['statususer'] = 3 )
      {
        $statususer3 = $data['statususer']+$data['a'];
        $statususer6 = $statususer3; 
      } else if ($data['statususer'] = 4 )
      {
        $statususer4 = $data['statususer']+$data['a'];
        $statususer6 = $statususer4; 
      }
        // $status1= $data['statususer'] + $data['a'];
        // $statususer1 =$status1;

      $suratpengajuannya = $spj;
      $rinciankegiatannya = $rkg;
      $rkaklnya = $rkakl;
      $tornya = $tor;
      // $tahunakademik= $this->input->post('tahunakademik',true);
      // $waktuupload = date('l jS \of F Y \a\t h:i:s A', timestamp);
      // $nPengajuannya = $nPengajuan6;

      $datadana = $this->M_dana->update_pengajuan($kd_jrsn, $statususer6,$nPengajuan);
      $datadana1=array(
        'kd_jrsn' =>$kd_jrsn, 
        'kd_fakultas'=>$kd_fklts,
        'statususer' =>$statususer6,
        'akhirkegiatan'=>$akhirkegiatan,
        'danasisa'=>$danasisa,
        'nPengajuan'=>$nPengajuan,
        'namaKegiatan'=>$namaKegiatan,
        'suratpengajuan'=>$suratpengajuannya,
        'rinciankegiatan'=>$rinciankegiatannya,
        'rkakl'=>$rkaklnya,
        'tor' =>$tor,
        'tahunakademik'=>$tahunakademik
      );
      // $datadana1 = $this->M_dana->insert_pengajuan($kd_jrsn,$kd_fklts,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya,$nPengajuan,$namaKegiatan,$statususer6,$akhirkegiatan,$danasisa);
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
        // $suratpengajuan =$this->input->post('suratpengajuan', true);
        // $rinciankegiatan =$this->input->post('rinciankegiatan', true);
        // $rkakl =$this->input->post('rkakl', true);
        // $tor =$this->input->post('tor', true);
        $statususer = $this->input->post('statususer');
        $data['a'] = 1;

        // kalau diacc
        if($danaminus!=''){ 
          $statususer6 = number_format($statususer+1);
          // $statususer6 = $statususer2;
          $kd_jrsn = $this->input->post('kd_jrsn', true);
          // $danabaru = $data['danasisa']+$data['danaminus'];
          // $danaupdate = $danabaru;
          $b=1000;
          $x = number_format($danasisa-$danaminus); 

          // setlocale(LC_MONETARY,"de_DE");
          // $x = $data['danaminus'];
          // $y = $data['danaminus'];
          // $danaupdate = $x-$y;
          // $data['danasisa']-$data['danaminus'];
          // $danaupdate = $dana2;
          // $data['danasisanya'] = $this->input->post('update');
          // $danaupdate=$danasisanya;

          // $statususer6 = $statususer2;
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

            $this->M_dana->pengajuandiacc($kd_jrsn, $statususer6, $x, $nPengajuan6);
            $this->M_dana->pengajuandiaccupdatedb($kd_jrsn, $statususer6, $x, $nPengajuan6);
        }
        else{
          $pesangagal =$this->input->post('pesangagal');
          // $kurangdana = $data['danasisa'] - $data['danaminus'];
          // $danasisanya = $kurangdana;
          // $suratpengajuannya = './assets/uploads/suratpengajuan/'.$getdatadana->suratpengajuan;
          // $rinciankegiatannya = '.assets/uploads/rinciankegiatan/'.$getdatadana->rinciankegiatan;
          // $rkaklnya = '.assets/uploads/rkakl/'.$getdatadana->rkakl;
          // $tornya = '.assets/uploads/tor/'.$getdatadana->tor;

        //   $suratpengajuannya = './assets/uploads/suratpengajuan/'.$u->suratpengajuan;
        //   $rinciankegiatannya = './assets/uploads/rinciankegiatan/'.$u->rinciankegiatan;
        //   $rkaklnya = './assets/uploads/rkakl/'.$u->rkakl;
        //   $tornya = './assets/uploads/tor/'.$u->tor;
        // unlink($suratpengajuannya&&$rinciankegiatannya&&$rkaklnya&&$tornya);





          
        //   $statususer2 = $data['statususer']-$data['a'];
        //   $statususer6 = $statususer2;
        //   if($data['nPengajuan'] = 1 )
        //     {
        //       $pengajuan1 = $data['nPengajuan']+$data['a'];
        //       $nPengajuan6 = $pengajuan1; 
        //     } else if ($data['nPengajuan'] = 2 )
        //     {
        //       $pengajuan2 = $data['nPengajuan']+$data['a'];
        //       $nPengajuan6 = $pengajuan2; 
        //     } else if ($data['nPengajuan'] = 3 )
        //     {
        //       $pengajuan3 = $data['nPengajuan']+$data['a'];
        //       $nPengajuan6 = $pengajuan3; 
        //     } else {
        //       $data['b'] = 1;
        //       $pengajuan4 = $data['b'];
        //       $nPengajuan6 = $pengajuan4;
        //     }
        //     $dataupdatedana=array(
        //       'statususer' => $statususer6,
        //       'suratpengajuan' => $suratpengajuannya,
        //       'rinciankegiatan' => $rinciankegiatannya,
        //       'rkakl' => $rkaklnya,
        //       'tor' =>$tornya,
        //       'nPengajuan'=>$nPengajuan6
        //     );
        //     $where=array('kd_jrsn'=>$kd_jrsn);
        //     $this->M_dana->updateacc($where,$dataupdatedana,'tb_detailuser');
        //     redirect('c_admin/Cek_Pagu');
          // $datadana=$this->M_dana->update_accpengajuan($kd_jrsn,$statususer6);
        }
        redirect('c_admin/Cek_Pagu');
        // if()
      }
      function admin_gagal_acc_pengajuan(){

      }

}
