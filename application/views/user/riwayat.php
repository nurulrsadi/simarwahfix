</header>

<!-- modal for information at header -->

<!-- Content -->
<section>
  <header class="main">
    <h2 class="text-center">Tabel Riwayat Pencairan Dana </h2>
	</header>
  <?php if( $this->session->userdata('role') ==0):?>
    <!-- <div class="features"> -->
    <table class="content-table">
      <thead>
        <tr>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Nama Pengaju Pencairan Dana</th>
          <th class="text-center">Pengajuan ke-</th>
          <th class="text-center">Status</th>
          <th class="text-center">Detail</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
            foreach($fklts->result_array() as $i):
              $kd_jrsn=$i['kd_jrsn'];
              $tahunakademik=$i['tahunakademik'];
              $danasisa=$i['danasisa'];
              $danaawal=$i['danasisa'];
              $nPengajuan=$i['nPengajuan'];
              $color_button=$i['button_color_history'];
              $nama_status=$i['Nama_Status'];
              $tgl_pengajuan=$i['insertdata'];
              $nPengajuan=$i['nPengajuan'];
              $id_pengajuan=$i['id_pengajuan'];
              $alasan_gagal_laporan=$i['alasan_gagal_laporan'];
              $alasan_gagal_pengajuan=$i['alasan_gagal_pengajuan'];
              $danaacc=$i['danaacc'];
          ?> 
          <td><?= date_indo($tgl_pengajuan);?></td>
          <td><?= $kd_jrsn;?></td>
          <td class="text-center"><?= $nPengajuan;?></td>
          <td class="text-center">
            <span class="<?= $color_button?>"><?= $nama_status?></span>
          </td>
          <td class="text-center">
            <a href=""
              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaldetail<?php echo $id_pengajuan;?>"><i class="fas fa-search"></i> Lihat
              Detail</a>
            <!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a> -->
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <?php
      foreach($fklts->result_array() as $i):
        $kd_jrsn=$i['kd_jrsn'];
        $tahunakademik=$i['tahunakademik'];
        $danasisa=$i['danasisa'];
        $danaawal=$i['danasisa'];
        $nPengajuan=$i['nPengajuan'];
        $color_button=$i['button_color_history'];
        $nama_status=$i['Nama_Status'];
        $tgl_pengajuan=$i['insertdata'];
        $nPengajuan=$i['nPengajuan'];
        $id_pengajuan=$i['id_pengajuan'];
        $alasan_gagal_laporan=$i['alasan_gagal_laporan'];
        $alasan_gagal_pengajuan=$i['alasan_gagal_pengajuan'];
        $danaacc=$i['danaacc'];
    ?> 
    <div class="modal fade scrollable" id="modaldetail<?php echo $id_pengajuan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Detail Sewa</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama penyewa</t></label>
              <input type="text" name="penyewa" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
            </div>
            <div class="form-group">
              <label>File Surat Pengajuan</t></label>
              <input type="text" name="penyewa" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
            </div>
            <div class="form-group">
              <label>File RKA-KL Kegiatan</t></label>
              <input type="text" name="penyewa" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
            </div>
            <div class="form-group">
              <label>File Rincian Kegiatan</t></label>
              <input type="text" name="penyewa" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
            </div>
            <div class="form-group">
              <label>File TOR</t></label>
              <input type="text" name="penyewa" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
            </div>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  <?php endforeach; ?>
  <?php elseif( $this->session->userdata('role') ==2 ):?>  
    
  <?php  else:?>
  <?php endif; ?>
</section>
</div>
</div>