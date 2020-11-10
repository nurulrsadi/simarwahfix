<?php 

class history extends CI_Controller{ 
  function simpan_gagal_pengajuan_fak()
  {
    $statususer=6;
    $kd_jrsn=$this->input->post('kd_jrsn');
    $ubah=$this->M_dana->change_jadi_failed_fklts($kd_jrsn);
    if($ubah)
    {
      $this->db->set('statususer', 2);
      $this->db->where('username', $this->session->userdata('username'));
      $this->db->where('statususer', $statususer);
      $this->db->update('user');
      $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Silahkan melakukan pengajuan anggaran dengan format yang benar!</div>');
      redirect(base_url("c_user/Pagu_Anggaran"));
    }
    else
    {
      echo "<script>alert('Silahkan Ulangi');window.location = '".base_url('c_user/Failde_Anggaran')."';</script>";
    }
  }
  function simpan_gagal_pengajuan_ukmukk()
  {
    $statususer=6;
    $kd_ukmukk=$this->input->post('kd_ukmukk');
    $ubah=$this->M_dana->change_jadi_failed_ukmuk($kd_ukmukk);
    if($ubah)
      {
        $this->db->set('statususer', 2);
        $this->db->where('statususer', $statususer);
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
}