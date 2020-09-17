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
        public function update_pengajuan(){
          $a=1;
          $kd_jrsn = $this->input->post('kd_jrsn');
          $nPengajuan = $this->input->post('nPengajuan');
          $namaKegiatan = $this->input->post('namaKegiatan');
          $suratpengajuan = $this->input->post('suratpengajuan');
          $rinciankegiatan= $this->input->post('rinciankegiatan');
          $rkakl= $this->input->post('rkakl');
          $tor = $this->input->post('tor'); 
          // $imageold = $this->input->post('imageold'); 
          if ($image=''){} else{
            $config['upload_path']='./assets/img/bidang';
            $config['allowed_types']='jpg|gif|png|jpeg';
            $config['encrypt_name'] = TRUE;
      
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('image')){
                echo "Gagal Menambahkan Bidang"; die();
            }else{
                $image=$this->upload->data('file_name');
            }
          }

        
              if ($image=''){} else{
              $config['upload_path']='./assets/img/bidang';
              $config['allowed_types']='jpg|gif|png|jpeg';
              $config['encrypt_name'] = TRUE;
        
              $this->load->library('upload',$config);
              if(!$this->upload->do_upload('image')){
                  $image = $imageold;
              }else{
                  $image=$this->upload->data('file_name');
              }
              $databidang = $this->Model_View->update_bidang($label_bidang,$nama_bidang,$kode_bidang,$parent_himpunan,$image);
              redirect('c_user');
          }
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
      $this->spjupload->initialize($config);

      $config['upload_path'] = './uploads/rinciankegiatan/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKG-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload',$config, 'rkgupload');
      $this->rkgupload->initialize($config);

      $config['upload_path'] = './uploads/rkakl/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'RKA_KL-'.$kode;
      $config['max_width'] = '2048';
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'rkaklupload');
      $this->rkaklupload->initialize($config);        

      $config['upload_path'] = './uploads/tor/';//path folder
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
      $namaKegiatan = $this->input->post('namaKegiatan',true);
      $nPengajuan = $this->input->post('nPengajuan',true);
      $statususer = $this->input->post('statususer',true);
      $data['a'] = 1;
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
      } else if ($data['nPengajuan'] = 4 )
      {
        $pengajuan4 = $data['nPengajuan']+$data['a'];
        $nPengajuan6 = $pengajuan4; 
      }

      if($data['statususer'] = 1 )
      {
        $statususer1 = $data['statususer']+$data['a'];
        $statususer6 = $statususer1; 
      } else if ($data['statususer'] = 2 )
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
      $nPengajuannya = $nPengajuan6;

      $datadana = $this->M_dana->update_pengajuan($kd_jrsn,$suratpengajuannya,$rinciankegiatannya,$rkaklnya,$tornya,$nPengajuan6,$namaKegiatan,$statususer6);
      if($datadana){ // Jika sukses
        redirect('c_user/Verifikasi_Data');
        }else{ // Jika gagal
              echo "<script>alert('Data gagal diupdate, File pdf min 2MB');window.location = '".base_url('c_user/index')."';</script>";
        }
    }
}
