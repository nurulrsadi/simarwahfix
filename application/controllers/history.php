<?php 

class history extends CI_Controller{ 
  function simpan_gagal_pengajuan_fak()
  {
    $kd_jrsn=$this->input->post('kd_jrsn', true);
    $ubah=$this->M_dana->change_jadi_failed_fklts($kd_jrsn);
    if($ubah)
    {
      $this->db->set('statususer', 2);
      $this->db->where('username', $this->session->userdata('username'));
      $this->db->update('user');
      $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Silahkan melakukan pengajuan anggaran dengan format yang benar!</div>');
      redirect(base_url("c_user/Pagu_Anggaran"));
    }
    else
    {
      echo "<script>alert('Silahkan Ulangi');window.location = '".base_url('c_user/Failed_Anggaran')."';</script>";
    }
  }
  function simpan_gagal_pengajuan_ukmukk()
  {
    $id_pengajuan_ukmukk=$this->input->post('id_pengajuan_ukmukk');
    $ubah=$this->M_dana->change_jadi_failed_ukmukk($id_pengajuan_ukmukk);
    if($ubah)
      {
        $this->db->set('statususer', 2);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Silahkan melakukan pengajuan anggaran dengan format yang benar!</div>');
        redirect(base_url("c_user/Pagu_Anggaran"));
      }
    else
      {
        echo "<script>alert('Silahkan Ulangi');window.location = '".base_url('c_user/Failde_Anggaran')."';</script>";
      }
  }
  function simpan_gagal_laporan_univ()
  {
    $statususer_new=4;
    $kd_jrsn=$this->input->post('kd_jrsn', true);
    $akhirkegiatan=$this->input->post('akhirkegiatan', true);
    $tglmakslaporan=$this->input->post('tglmakslaporan', true);
    $namakegiatan=$this->input->post('namakegiatan', true);
    $danaawal=$this->input->post('danaawal', true);
    $danasisa=$this->input->post('danasisa', true);
    $danaacc=$this->input->post('danaacc', true);
    $suratpengajuan=$this->input->post('suratpengajuan', true);
    $rinciankegiatan=$this->input->post('rinciankegiatan', true);
    $rkakl=$this->input->post('rkakl', true);
    $tor=$this->input->post('tor', true);
    $tahunakademik=$this->input->post('tahunakademik', true);
    $nPengajuan=$this->input->post('nPengajuan', true);
    // $row=$this->M_dana->getDataByID_pengajuan($id_pengajuan)->row();
    // $hapuslpj='./assets/uploads/laporankegiatan/'.$row->laporankegiatan;
    // $hapusrby='./assets/uploads/laporanrincianbiaya/'.$row->laporanrincianbiaya;
    // if(is_readable($hapuslpj)&&is_readable($hapusrby)&&unlink($hapuslpj)&&unlink($hapusrby))
    // {
      $data=array(
        'kd_jrsn' => $kd_jrsn,
        'akhirkegiatan' => $akhirkegiatan,
        'tglmakslaporan' => $tglmakslaporan,
        'namakegiatan' => $namakegiatan,
        'danaawal' => $danaawal,
        'danasisa' => $danasisa,
        'danaacc' => $danaacc,
        'suratpengajuan' => $suratpengajuan,
        'rinciankegiatan' => $rinciankegiatan,
        'rkakl' => $rkakl,
        'tor' => $tor,
        'statususer' => $statususer_new,
        'nPengajuan' => $nPengajuan,
        'tahunakademik' => $tahunakademik,
      );
      $new_pengajuan=$this->M_dana->new_pengajuan($data);
      if($new_pengajuan)
      {
        $ubah=$this->M_dana->change_l_jadi_failed_fklts($kd_jrsn);
        if($ubah)
        {
          $this->db->set('statususer', 4);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Silahkan melakukan pengajuan anggaran dengan format yang benar!</div>');
          redirect(base_url("c_user/Laporan_Kegiatan"));
        }
     }
    // }
  }
  function simpan_gagal_laporan_fak()
  {
    $statususer_new=4;
    $kd_jrsn=$this->input->post('kd_jrsn', true);
    $id_pengajuan=$this->input->post('id_pengajuan', true);
    $akhirkegiatan=$this->input->post('akhirkegiatan', true);
    $tglmakslaporan=$this->input->post('tglmakslaporan', true);
    $namakegiatan=$this->input->post('namakegiatan', true);
    $danaawal=$this->input->post('danaawal', true);
    $danasisa=$this->input->post('danasisa', true);
    $danaacc=$this->input->post('danaacc', true);
    $suratpengajuan=$this->input->post('suratpengajuan', true);
    $rinciankegiatan=$this->input->post('rinciankegiatan', true);
    $rkakl=$this->input->post('rkakl', true);
    $tor=$this->input->post('tor', true);
    $tahunakademik=$this->input->post('tahunakademik', true);
    $kd_fakultas=$this->input->post('kd_fakultas', true);
    $nPengajuan=$this->input->post('nPengajuan', true);
    // $row=$this->M_dana->getDataByID_pengajuan($id_pengajuan)->row();
    // $hapuslpj='./assets/uploads/laporankegiatan/'.$row->laporankegiatan;
    // $hapusrby='./assets/uploads/laporanrincianbiaya/'.$row->laporanrincianbiaya;
    // if(is_readable($hapuslpj)&&is_readable($hapusrby)&&unlink($hapuslpj)&&unlink($hapusrby))
    // {
      $data=array(
        'kd_jrsn' => $kd_jrsn,
        'akhirkegiatan' => $akhirkegiatan,
        'tglmakslaporan' => $tglmakslaporan,
        'namakegiatan' => $namakegiatan,
        'danaawal' => $danaawal,
        'danasisa' => $danasisa,
        'danaacc' => $danaacc,
        'suratpengajuan' => $suratpengajuan,
        'rinciankegiatan' => $rinciankegiatan,
        'rkakl' => $rkakl,
        'tor' => $tor,
        'statususer' => $statususer_new,
        'nPengajuan' => $nPengajuan,
        'tahunakademik' => $tahunakademik,
        'kd_fakultas' => $kd_fakultas
      );
      $new_pengajuan=$this->M_dana->new_pengajuan($data);
      if($new_pengajuan)
      {
        $ubah=$this->M_dana->change_l_jadi_failed_fklts($kd_jrsn);
        if($ubah)
        {
          $this->db->set('statususer', 4);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Silahkan melakukan pengajuan anggaran dengan format yang benar!</div>');
          redirect(base_url("c_user/Laporan_Kegiatan"));
        }
      }
    // }
  }
  function simpan_gagal_laporan_ukmukk()
  {
    $statususer_new=4;
    $kd_ukmkk=$this->input->post('kd_ukmkk', true);
    $id_pengajuan_ukmukk=$this->input->post('id_pengajuan_ukmukk', true);
    $akhirkegiatan=$this->input->post('akhirkegiatan', true);
    $tglmakslaporan=$this->input->post('tglmakslaporan', true);
    $namakegiatan=$this->input->post('namakegiatan', true);
    $danaawal=$this->input->post('danaawal', true);
    $danasisa=$this->input->post('danasisa', true);
    $danaacc=$this->input->post('danaacc', true);
    $suratpengajuan=$this->input->post('suratpengajuan', true);
    $rinciankegiatan=$this->input->post('rinciankegiatan', true);
    $rkakl=$this->input->post('rkakl', true);
    $tor=$this->input->post('tor', true);
    $tahunakademik=$this->input->post('tahunakademik', true);
    $nPengajuan=$this->input->post('nPengajuan', true);
    // $row=$this->M_dana->getDataByID_pengajuanUKMUKK($id_pengajuan_ukmukk)->row();
    // $hapuslpj='./assets/uploads/laporankegiatan/'.$row->laporankegiatan;
    // $hapusrby='./assets/uploads/laporanrincianbiaya/'.$row->laporanrincianbiaya;
    // if(is_readable($hapuslpj)&&is_readable($hapusrby)&&unlink($hapuslpj)&&unlink($hapusrby))
    // {
      $data=array(
        'kd_ukmkk' => $kd_ukmkk,
        'akhirkegiatan' => $akhirkegiatan,
        'tglmakslaporan' => $tglmakslaporan,
        'namakegiatan' => $namakegiatan,
        'danaawal' => $danaawal,
        'danasisa' => $danasisa,
        'danaacc' => $danaacc,
        'suratpengajuan' => $suratpengajuan,
        'rinciankegiatan' => $rinciankegiatan,
        'rkakl' => $rkakl,
        'tor' => $tor,
        'statususer' => $statususer_new,
        'nPengajuan' => $nPengajuan,
        'tahunakademik' => $tahunakademik,
      );
      $new_pengajuan=$this->M_dana->new_pengajuan_ukmukk($data);
      if($new_pengajuan)
      {
        $ubah=$this->M_dana->change_l_jadi_failed_ukmukk($kd_ukmkk);
        if($ubah)
        {
          $this->db->set('statususer', 4);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Silahkan melakukan pengajuan anggaran dengan format yang benar!</div>');
          redirect(base_url("c_user/Laporan_Kegiatan"));
        }
      }
    }
  // }
}