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
          <th class="text-center">Nama Organisasi</th>
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
        $gagal_laporan=$i['alasan_gagal_laporan'];
        $gagal_pengajuan=$i['alasan_gagal_pengajuan'];
        $danaacc=$i['danaacc'];
        $suratpengajuan=$i['suratpengajuan'];
        $rinciankegiatan=$i['rinciankegiatan'];
        $rkakl=$i['rkakl'];
        $tor=$i['tor'];
        $laporankegiatan=$i['laporankegiatan'];
        $laporanrincianbiaya=$i['laporanrincianbiaya'];
        $statususer=$i['statususer'];
    ?> 
    <div class="modal fade scrollable" id="modaldetail<?php echo $id_pengajuan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h4>
          </div>
          <div class="modal-body">
                <div class="form-group">
			    <label>Tanggal</t></label>
				<input type="text" name="tanggal" class="form-control" value="<?php echo date_indo($tgl_pengajuan);?>" required readonly>
				</div>
				<div class="form-group">
					<label>Nama penyewa</t></label>
					<input type="text" name="penyewa" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
				</div>
				<div class="form-group">
					<label>Status</t></label>
					<input type="text" name="nama_status" class="form-control" value="<?php echo $nama_status;?>" required readonly>
				</div>
				<?php if($statususer==10):?>
				<div class="form-group">
					<label>Dana ACC</t></label>
					<input type="text" name="danaacc" class="form-control" value="Rp. <?php echo number_format($danaacc,0,',','.')?>" required readonly>
				</div>
				<div class="form-group">
					<label>Dana Sisa</t></label>
					<input type="text" name="danaacc" class="form-control" value="Rp. <?php echo number_format($danasisa,0,',','.')?>" required readonly>
				</div>
				<?php else:?>
				<?php endif;?>
				<?php if($gagal_pengajuan!='' && $statususer!=10):?>
				<div class="form-group">
					<label>Alasan pengajuan ditolak</t></label>
					<input type="text" name="alasan" class="form-control" value="<?php echo $gagal_pengajuan;?>" required readonly>
				</div>
				<?php elseif($gagal_laporan!='' && $statususer!=10):?>
				<div class="form-group">
					<label>Alasan laporan ditolak</t></label>
					<input type="text" name="alasan" class="form-control" value="<?php echo $gagal_laporan;?>" required readonly>
				</div>
				<?php else:?>
				<?php endif;?>
				<div class="form-group">
					<label>File Surat Pengajuan</t></label>
					<br>
					<center>
					    <a href="<?=site_url().'assets/uploads/suratpengajuan/'.$suratpengajuan;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$suratpengajuan?> </a>
					</center>
				</div>
				<div class="form-group">
					<label>File RKA-KL Kegiatan</t></label>
					<br>
					<center>
				        <a href="<?=site_url().'assets/uploads/rkakl/'.$rkakl;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$rkakl?> </a>
					</center>
				</div>
				<div class="form-group">
					<label>File Rincian Kegiatan</t></label>
					<br>
					<center>
					    <a href="<?=site_url().'assets/uploads/rkakl/'.$rkakl;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$rkakl?> </a>
					</center>
				</div>
				<div class="form-group">
					<label>File TOR</t></label>
					<br>
					<center>
					    <a href="<?=site_url().'assets/uploads/tor/'.$tor;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$tor?> </a>
					</center>
				</div>
				<?php if($statususer==10||$statususer==9):?>
				<div class="form-group">
					<label>File Laporan Kegiatan</t></label>
					<br>
					<center>
					    <a href="<?=site_url().'assets/uploads/laporankegiatan/'.$laporankegiatan;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$tor?> </a>
					</center>
				</div>
				<div class="form-group">
					<label>File Rincian Biaya</t></label>
					<br>
					<center>
					    <a href="<?=site_url().'assets/uploads/laporanrincianbiaya/'.$laporanrincianbiaya;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$tor?> </a>
					</center>
				</div>
				<?php else:?>
				<?php endif;?>
          </div>
          <div class="modal-footer">
            <button type="button" class="button primary" style="background-color:royalblue;" data-dismiss="modal">
              Tutup
              </button>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  <?php endforeach; ?>
  <?php elseif( $this->session->userdata('role') ==2 ):?>  
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
            foreach($ukmukk->result_array() as $i):
              $kd_ukmkk=$i['kd_ukmkk'];
              $tahunakademik=$i['tahunakademik'];
              $danasisa=$i['danasisa'];
              $danaawal=$i['danasisa'];
              $danaacc=$i['danaacc'];
              $nPengajuan=$i['nPengajuan'];
              $color_button=$i['button_color_history'];
              $nama_status=$i['Nama_Status'];
              $tgl_pengajuan=$i['insertdata'];
              $nPengajuan=$i['nPengajuan'];
              $id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
          ?> 
       <td><?= date_indo($tgl_pengajuan);?></td>
          <td><?= $kd_ukmkk;?></td>
          <td class="text-center"><?= $nPengajuan;?></td>
          <td class="text-center">
            <span class="<?= $color_button?>"><?= $nama_status?></span>
          </td>
          <td class="text-center">
            <a href=""
              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaldetail<?php echo $id_pengajuan_ukmukk;?>"><i class="fas fa-search"></i> Lihat
              Detail</a>
            <!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a> -->
          </td>
        </tr>
        <?php endforeach;?>
    </table>
    <?php
      foreach($ukmukk->result_array() as $i):
        $kd_ukmkk=$i['kd_ukmkk'];
        $tahunakademik=$i['tahunakademik'];
        $danasisa=$i['danasisa'];
        $danaawal=$i['danasisa'];
        $nPengajuan=$i['nPengajuan'];
        $color_button=$i['button_color_history'];
        $nama_status=$i['Nama_Status'];
        $tgl_pengajuan=$i['insertdata'];
        $nPengajuan=$i['nPengajuan'];
        $id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
        $gagal_laporan=$i['alasan_gagal_laporan'];
        $gagal_pengajuan=$i['alasan_gagal_pengajuan'];
        $danaacc=$i['danaacc'];
		$suratpengajuan=$i['suratpengajuan'];
        $rinciankegiatan=$i['rinciankegiatan'];
        $rkakl=$i['rkakl'];
        $tor=$i['tor'];
        $laporankegiatan=$i['laporankegiatan'];
        $laporanrincianbiaya=$i['laporanrincianbiaya'];
        $statususer=$i['statususer'];
    ?> 
    <div class="modal fade scrollable" id="modaldetail<?php echo $id_pengajuan_ukmukk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
			<label>Tanggal</t></label>
			<input type="text" name="tanggal" class="form-control" value="<?php echo date_indo($tgl_pengajuan);?>" required readonly>
			</div>
			<div class="form-group">
				<label>Nama penyewa</t></label>
				<input type="text" name="penyewa" class="form-control" value="<?php echo $kd_ukmkk;?>" required readonly>
			</div>
			<div class="form-group">
				<label>Status</t></label>
				<input type="text" name="nama_status" class="form-control" value="<?php echo $nama_status;?>" required readonly>
			</div>
			<?php if($statususer==10):?>
			<div class="form-group">
				<label>Dana ACC</t></label>
				<input type="text" name="danaacc" class="form-control" value="Rp. <?php echo number_format($danaacc,0,',','.')?>" required readonly>
			</div>
			<div class="form-group">
				<label>Dana Sisa</t></label>
				<input type="text" name="danaacc" class="form-control" value="Rp. <?php echo number_format($danasisa,0,',','.')?>" required readonly>
			</div>
			<?php else:?>
			<?php endif;?>
			<?php if($gagal_pengajuan!='' && $statususer!=10):?>
			<div class="form-group">
				<label>Alasan pengajuan ditolak</t></label>
				<input type="text" name="alasan" class="form-control" value="<?php echo $gagal_pengajuan;?>" required readonly>
			</div>
			<?php elseif($gagal_laporan!='' && $statususer!=10):?>
			<div class="form-group">
				<label>Alasan laporan ditolak</t></label>
				<input type="text" name="alasan" class="form-control" value="<?php echo $gagal_laporan;?>" required readonly>
			</div>
			<?php else:?>
			<?php endif;?>
			<div class="form-group">
				<label>File Surat Pengajuan</t></label>
				<br>
				<center>
				    <a href="<?=site_url().'assets/uploads/suratpengajuan/'.$suratpengajuan;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$suratpengajuan?> </a>
				</center>
			</div>
			<div class="form-group">
				<label>File RKA-KL Kegiatan</t></label>
				<br>
				<center>
			        <a href="<?=site_url().'assets/uploads/rkakl/'.$rkakl;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$rkakl?> </a>
				</center>
			</div>
			<div class="form-group">
				<label>File Rincian Kegiatan</t></label>
				<br>
				<center>
				    <a href="<?=site_url().'assets/uploads/rkakl/'.$rkakl;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$rkakl?> </a>
				</center>
			</div>
			<div class="form-group">
				<label>File TOR</t></label>
				<br>
				<center>
				    <a href="<?=site_url().'assets/uploads/tor/'.$tor;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$tor?> </a>
				</center>
			</div>
			<?php if($statususer==10||$statususer==9):?>
			<div class="form-group">
				<label>File Laporan Kegiatan</t></label>
				<br>
				<center>
				    <a href="<?=site_url().'assets/uploads/laporankegiatan/'.$laporankegiatan;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$tor?> </a>
				</center>
			</div>
			<div class="form-group">
				<label>File Rincian Biaya</t></label>
				<br>
				<center>
				    <a href="<?=site_url().'assets/uploads/laporanrincianbiaya/'.$laporanrincianbiaya;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$tor?> </a>
				</center>
			</div>
			<?php else:?>
			<?php endif;?>
          </div>
          <div class="modal-footer">
          <!-- <button type="submit" class="button primary" style="background-color:royalblue;"> -->
            <button type="button" class="button primary" style="background-color:royalblue;" data-dismiss="modal">
            Tutup
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  <?php endforeach; ?>
  <?php  else:?>
  <?php endif; ?>
</section>
</div>
</div>