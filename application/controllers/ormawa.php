<?php 

class ormawa extends CI_Controller{ 
  function do_keluhan(){
    $kd_ormawa=$this->input->post('kd_jrsn',true);
    $kd_fklts=$this->input->post('kd_fklts',true);
    $tanggal=date("Y-m-d",strtotime($this->input->post('tanggal')));
    $isikeluhan=$this->input->post('isikeluhan', true);
    $data1=array(
      'kd_ormawa'=>$kd_ormawa,
      'kd_fakultas' => $kd_fklts,
      'tanggal' => $tanggal,
      'isikeluhan' => $isikeluhan,
    );
    $this->M_ormawa->tambah_keluhan($data1);
    if($data1){ // Jika sukses
      redirect('c_user/Keluhan');
      }else{ // Jika gagal
            echo "<script>alert('Keluhan gagal dikirim, silahkan input keluhan maksimal 250kata ');window.location = '".base_url('c_user/Keluhan')."';</script>";
      }
  }
  function hapuskeluhan($kd_ormawa){
    $kd_ormawa=$this->input->post('kd_ormawa',true);
    $data=$this->M_ormawa->getDataByID($kd_ormawa)->row();
    $delete=$this->M_ormawa->hapuskeluhannya($kd_ormawa);
    redirect('c_admin/keluhan');
  }
  function do_sewa(){
    $this->form_validation->set_rules('surat_sewa', 'required');
    $kode= date('ymd') . '-' . substr(md5(rand()), 0, 10);
    $penyewa=$this->input->post('penyewa',true);
    $Keterangan=$this->input->post('Keterangan',true);
    $jenisaula=$this->input->post('jenisaula', true);
    $dari=date("Y-m-d",strtotime($this->input->post('dari')));
    $hingga1=date("Y-m-d",strtotime($this->input->post('hingga')));
    $hingga=date('Y-m-d', strtotime($hingga1.'+1 day' ));
    $mulaipukul=date("h:i",strtotime($this->input->post('mulaipukul')));
    $akhirpukul=date("h:i",strtotime($this->input->post('akhirpukul')));
    $nama_pj=$this->input->post('nama_pj', true);
    $no_pj=$this->input->post('no_pj',true);
    $no_surat=$this->input->post('no_surat',true);
    $surat_sewa = $this->input->post('surat_sewa', true);
    if ($surat_sewa=''){} else{
      $config['upload_path'] = './assets/uploads/suratizinaula/';//path folder
      $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
      $config['file_name'] = 'SuratIzinSewaAula-'.$kode.'-'.$penyewa.'-'.$Keterangan;
      $config['max_size']='2048';
      $this->load->library('upload',$config);
      if(!$this->upload->do_upload('surat_sewa')){
        echo "<script>alert('Gagal melakukan, File pdf min 2MB');window.location = '".base_url('c_user/Pinjam_Aula')."';</script>";
      }else{
        $surat_sewanya=$this->upload->data('file_name');
      }
    $statussewa=1;
    $id_user=$this->input->post('id_user', true);
    $data=array(
      'penyewa' => $penyewa,
      'Keterangan' => $Keterangan,
      'jenisaula' => $jenisaula,
      'dari' => $dari,
      'hingga' => $hingga,
      'mulaipukul' => $mulaipukul,
      'akhirpukul' => $akhirpukul,
      'nama_pj' => $nama_pj,
      'no_pj' => $no_pj,
      'surat_sewa' => $surat_sewanya,
      'no_surat' => $no_surat,
    );
    // var_dump($data); die();
    $this->M_ormawa->sewa_aula($data);
    if($data){ // Jika sukses
      // $this->M_ormawa->update_status_sewa($statussewa,$id_user);
      $this->session->set_flashdata('flashdata', 'Sewa Aula berhasil dilakukan !');
      redirect('c_user/Pinjam_Aula');

      }else{ // Jika gagal
            echo "<script>alert('Silahkan isi form dengan hati-hati, File pdf min 2MB');window.location = '".base_url('c_user/Pinjam_Aula')."';</script>";
      }
    }
  }
  function hapus_datasewa(){
    $id_sewa = $this->uri->segment(3);
    $data=$this->M_ormawa->getDataSewaByID($id_sewa)->row();
    $hapussuratizin='./assets/uploads/suratizinaula/'.$data->surat_sewa;
    if(is_readable($hapussuratizin)&&unlink($hapussuratizin)){
      $this->M_ormawa->hapus_data_sewa_user($id_sewa);
      $this->session->set_flashdata('msg','<div class="alert alert-success">Data User Himpunan Dihapus</div>');
      redirect('c_admin/Data_Pinjam');
    }
  }
  function hapus_datasewa_index(){
    $id_sewa = $this->uri->segment(3);
    $data=$this->M_ormawa->getDataSewaByID($id_sewa)->row();
    $hapussuratizin='./assets/uploads/suratizinaula/'.$data->surat_sewa;
    if(is_readable($hapussuratizin)&&unlink($hapussuratizin)){
      $this->M_ormawa->hapus_data_sewa_user($id_sewa);
      $this->session->set_flashdata('msg','<div class="alert alert-success">Data User Himpunan Dihapus</div>');
      redirect('c_admin');
    }
  }
  public function getEvents(){
    $r=$this->M_ormawa->getAllEvents();
    
    foreach($r->result_array() as $row ){
      $pengguna = $row['penyewa'];
      $Acara = $row['Keterangan'];
      $tgl_mulai = $row['dari'];
      $tgl_akhir = $row['hingga'];
      $warna = $row['jenisaula'];
      $data[]=array(
        // 'id' => $row['id_sewa'],
        'title'=> $pengguna.' - '.$Acara,
        'start' => $tgl_mulai,
        'end' => $tgl_akhir,
        'color' => $warna,
      );
    }
    echo json_encode($data);
    // var_dump($r); die();
  }
}