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

        public function danaOrmawa(){
                $data = array(
                'id_user' => $this->input->post('id_user', true),
                'nama' => $this->input->post('nama', true),
                'fakultas' => $this->input->post('fakultas', true),
                'dana_awal' => $this->input->post('dana_awal', true),
                'dana_sisa' => $this->input->post('dana_sisa', true),
                'tahunakademik' => $this->input->post('username', true),
                );
                $this->M_dana->editDana($data,'user');
                $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Anggaran telah diperbaharui </div>');
                redirect('c_admin/Edit_Pagu');
        }






        













function do_pengajuan()
{
      $this->form_validation->set_rules('suratpengajuan', 'rinciankegiatan', 'rkakl', 'tor', 'required');
      
      $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);

      // $config = array();
      $config['upload_path'] = './uploads/suratpengajuan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'SPJ-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'spjupload');
      // $this->spjupload->initialize($config);
      // $upload_spj = $this->spjupload->do_upload('suratpengajuan');

      // $config = array();
      $config['upload_path'] = './uploads/rinciankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKG-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rkgupload');
      // $this->rkgupload->initialize($config);
      // $upload_rkg = $this->rkgupload->do_upload('rinciankegiatan');

      // $config = array();
      $config['upload_path'] = './uploads/rkakl/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKA_KL-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'rkaklupload');
      // $this->rkaklupload->initialize($config);        
      // $upload_rkakl=$this->rkaklupload->do_upload('rkakl');

      // $config = array();
      $config['upload_path'] = './uploads/tor/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'TOR-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'torupload');
      // $this->torupload->initialize($config);
      // $upload_tor=$this->torupload->do_upload('tor');

      if(!empty($_FILES['suratpengajuan']['name']))
        {
            if(!$this->spjupload->do_upload('suratpengajuan'))
            {
                $this->spjupload->display_errors();
            }  
            else
            {
              $spj=$this->upload->data('file_name');
                // $upload_data = $this->spjupload->data();
                // $spj = $upload_data['file_name'];
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
        
      $id_user	= $this->input->post('id_user',true);
      // $nPengajuan	= $this->input->post('nPengajuan',true);
      // $nama	= $this->input->post('nama');
      $data['a'] = 1;
      if($data['nPengajuan'] = 0 )
      {
        $pengajuan1 = $data['nPengajuan']+$data['a'];
        $nPengajuan6 = $pengajuan1; 
      } else if ($data['nPengajuan'] == 1 )
      {
        $pengajuan2 = $data['nPengajuan']+$data['a'];
        $nPengajuan6 = $pengajuan2; 
      } else if ($data['nPengajuan'] == 2 )
      {
        $pengajuan3 = $data['nPengajuan']+$data['a'];
        $nPengajuan6 = $pengajuan3; 
      } else if ($data['nPengajuan'] == 3 )
      {
        $pengajuan4 = $data['nPengajuan']+$data['a'];
        $nPengajuan6 = $pengajuan4; 
      }
      else
      {
        $pengajuan5 = $data['nPengajuan']+$data['a'];
        $nPengajuan2 = $pengajuan5; 
      }

      // $statususer=  $this->input->post('statususer');
        $status1= $data['statususer'] + $data['a'];
        $statususer = $status1;

      $suratpengajuannya = $spj;
      $rinciankegiatannya = $rkg;
      $rkaklnya = $rkakl;
      $tornya = $tor;

        $datakirim=array(
          'id_user' => $id_user,
          'nPengajuan' => $nPengajuan6,
          'statususer' => $statususer,
          'suratpengajuan_file' => $suratpengajuannya,
          'rinciankegiatan_file' => $rinciankegiatannya,
          'rkakl_file' => $rkaklnya,
          'tor_file' => $tornya,
        );



      
      // $status_1 =  $this->input->post('status_1');
      // $suratpengajuan = $this->input->post('suratpengajuan');
      // $rinciankegiatan = $this->input->post('rinciankegiatan');
      // $rkakl = $this->input->post('rkakl');
      // $tor = $this->input->post('tor');
      

    
      // $username = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
      // $suratpengajuan = $data1['file_name'];
      // $rinciankegiatan = $data2['file_name'];
      // $rkakl = $data3['file_name'];
      // $tor = $data4['file_name'];

      // if ($upload_spj && $upload_rkg && $upload_rkakl && $upload_tor) {
      //   $data1;
      //   $data2;
      //   $data3;
      //   $data4;
      // } else {
      //   // 
      //   // 

      //   redirect(site_url('c_user/Pagu_Anggaran'));
      //   $this->session->set_flashdata('add_event_gagal','Data gagal ditambahkan!');
      //   echo 'Upload Surat Pengajuan Error : ' . $this->upload_spj->display_errors() . '<br/>';
      //   echo 'Upload Surat Rincian Kegiatan Error : ' . $this->upload_rkg->display_errors() . '<br/>';
      //   echo 'Upload Surat RKA-KL Error : ' . $this->upload_rkakl->display_errors() . '<br/>';
      //   echo 'Upload Surat TOR Error : ' . $this->upload_tor->display_errors() . '<br/>';
      // }



      // $data=array(
      //   'username'=> $username,
      //   'suratpengajuan' => $suratpengajuan,
      //   'rinciankegiatan' => $rinciankegiatan,
      //   'rkakl' => $rkakl,
      //   'tor' => $tor,
      // );
      // $data=array(
      //   'id_user' => $id_user,
      //   'suratpengajuan_file' => $suratpengajuan,
      //   'rinciankegiatan_file' => $rinciankegiatan,
      //   'rkakl_file' => $rkakl,
      //   'tor_file' => $tor,
      //   'nPengajuan' => $nPengajuan_1,
      //   'statususer' => $statususer,
      // );
      if(!$this->M_dana->pengajuan($datakirim))
      {
        $this->session->set_flashdata('Silahkan input data sesuai persyaratan, maksimal 2MB!');
        redirect(site_url('c_user/Pagu_Anggaran'));
      }
      else{

        redirect(site_url('c_user/Verifikasi_Data'));
      }
      // $this->M_dana->pengajuan($datakirim);
}
        
}
