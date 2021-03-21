    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/usermain.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
<title>Program Kerja</title>
</header>
<body>
  <section>
    <header class="main">
    </header>
    <center>
        <h1 style="font-size: 40px;">Calon Anggota</h1>
        <!-- <p><?php echo $kode_himpunan?> </p> -->
    </center>
        <!-- <form action="post"> -->
        
        <?= $this->session->flashdata('massage'); ?>
        Pendaftar : <?= $total;?><br>
        Diterima : <?= $diterima;?><br>
        >Proses : <?= $diterima;?>
        Total calon anggota yang mendaftar : <?= $total;?>
        <br>
        Total calon anggota yang diterima : <?= $diterima;?>
        <br>
        Total calon anggota yang belum diproses : <?= $ditolak;?>
          <div class="table-responsive" >
          <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Alasan</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <?php foreach($all_calon->result_array() as $i):
              $id_calon = $i['id_calon_anggota'];
              $nama = $i['nama_calon_anggota'];
              $alasan = $i['alasan_bergabung'];
              $jurusan = $i['jurusan'];
              $status = $i['status_calon'];
              $nama_status = $i['status'];
              $warna_status = $i['warna'];
            ?>
            <tbody>
              <tr>
                <td><?=$nama; ?></td>
                <td><?= $alasan; ?></td>
                <td><?= $jurusan;?></td>
                <td class="text-center">
                  <span class="<?= $warna_status?>"><?= $nama_status?></span>
                </td>
                <td>
                  <center>
                    <!-- <button type="btn btn-info" data-toggle="modal" data-target="#lihat_detail<?php echo $id_calon;?>" title="">Lihat </button> -->
                    <button type="button info" data-toggle="modal" data-target="#lihat_detail<?php echo $id_calon;?>" class="button primary"  style="background-color:royalblue;" data-dismiss="modal">Lihat</button>
                    &nbsp;
                    <button type="button info" data-toggle="modal" data-target="#tolak_peserta<?php echo $id_calon;?>" class="button primary"  style="background-color:#A30000;" data-dismiss="modal">Tolak</button>
                  </center>
                </td>
              </tr>
            </tbody>
            <?php endforeach;?>
          </table>
          </div>
        <!-- </form> -->
        <!-- <button type="button" class="button primary"  style="float:right; background-color:#3D85C6;" data-target="#terima_semua<?php echo $id_calon;?>" data-toggle="modal" data-dismiss="modal">Terima semua calon anggota</button> -->
  </section>
    
    <!-- lihat data -->
    <?php foreach($all_calon->result_array() as $i):
              $id_calon = $i['id_calon_anggota'];
              $nama = $i['nama_calon_anggota'];
              $alasan = $i['alasan_bergabung'];
              $jurusan = $i['jurusan'];
              $status = $i['status_calon'];
              $nama_status = $i['status'];
              $warna_status = $i['warna'];

              $nim = $i['nim'];
              $ttl = $i['ttl'];
              $jk = $i['jk'];
              $alamat = $i['alamat'];
              $no_kontak = $i['no_kontak'];
              $img = $i['img_c_anggota'];
              $fkls = $i['fakultas'];
            ?>
            <div class="modal fade scrollable" id="lihat_detail<?php echo $id_calon;?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <form method="post" action="<?php echo base_url().'m_ukmukk/update_status_calon'?>" enctype="multipart/form-data">
                  <div class="modal-header text-center">
                    <h3 class="modal-title" id="exampleModalLabel">Detail calon anggota</h3>
                  </div>
                  <div class="modal-body">
                  <!-- <form class="form-horizontal" method="post" action="<?php echo base_url().'m_ukmukk/update_status_calon'?>" enctype="multipart/form-data"> -->
                    <input name="id_calon" value="<?php echo $id_calon;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>
                    <div class="form-group ">
                        <label>NIM</label>
                        <input type="text" class="form-control" value="<?= $nim;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Fakultas</label>
                        <input type="text" class="form-control" value="<?= $fkls;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" value="<?= $jurusan;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?= $nama;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Tempat, tanggal lahir</label>
                        <input type="text" class="form-control" value="<?= $ttl;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Jenis kelamin</label>
                        <input type="text" class="form-control" value="<?= $jk;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="<?= $alamat;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>No telepon</label>
                        <input type="text" class="form-control" value="<?= $no_kontak;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Alasan bergabung</label>
                        <input type="text" class="form-control" value="<?= $jk;?>" readonly>
                    </div>
                    <div class="form-group ">
                        <label><bold>Foto</bold></label><br>
                        <img style="width:128px;height:128px;" src="<?php echo base_url('assets/img/calon_anggota/').$img?>">
                    </div>    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="button primary" style="background-color:grey;" data-dismiss="modal">Close</button>
                    <button type="submit" class="button primary" style="background-color:royalblue;" >Terima calon anggota</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <?php endforeach?>
    <!-- end lihat data -->

    <!-- tolak peserta -->
    <?php foreach($all_calon->result_array() as $i):
              $id_calon = $i['id_calon_anggota'];
              $nama = $i['nama_calon_anggota'];
            ?>
            <div class="modal fade scrollable" id="tolak_peserta<?php echo $id_calon;?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <form method="post" action="<?php echo base_url().'m_ukmukk/tolak_calon'?>" enctype="multipart/form-data">
                  <div class="modal-header text-center">
                    <h3 class="modal-title" id="exampleModalLabel">Detail calon anggota</h3>
                  </div>
                  <div class="modal-body">
                  <input name="id_calon" value="<?php echo $id_calon;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>
                    <h4>
                      Anda yakin tolak calon anggota <?= $nama;?> ?
                    </h4>
                    <small class="text-decoration" style="text-align:right;color:#A30000;"> *jika anda menolak, maka data calon anggota akan dihapus. </small>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="button primary" style="background-color:grey;" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="button primary" style="background-color:#A30000;" >Tolak</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <?php endforeach?>
    <!--  end tolak peserta-->

    <!-- terima semua -->
        <?php foreach($all_calon->result_array() as $i):
              $id_calon = $i['id_calon_anggota'];
              $nama = $i['nama_calon_anggota'];
              $alasan = $i['alasan_bergabung'];
              $jurusan = $i['jurusan'];
              $status = $i['status_calon'];
              $nama_status = $i['status'];
              $warna_status = $i['warna'];

              $nim = $i['nim'];
              $ttl = $i['ttl'];
              $jk = $i['jk'];
              $alamat = $i['alamat'];
              $no_kontak = $i['no_kontak'];
              $img = $i['img_c_anggota'];
              $fkls = $i['fakultas'];
            ?>
            <div class="modal fade scrollable" id="terima_semua<?php echo $id_calon;?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h3 class="modal-title" id="exampleModalLabel">Detail calon anggota</h3>
                  </div>
                  <div class="modal-body">
                    hapus?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="button primary" style="background-color:grey;" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach?>
    <!-- end terima semua -->

  </div>
  </div>
</body>
</html>