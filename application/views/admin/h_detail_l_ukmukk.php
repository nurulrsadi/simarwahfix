<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
			<div class="flash-data-pengajuan" data-flashdata="<?= $this->session->flashdata('flashpengajuan');  ?>"></div>
			<?php if($this->session->flashdata('flashpengajuan')): ?>
			<?php endif; ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
						<tr>
							<th>Tanggal</th>
							<th>Nama Ormawa</th>
							<th>Pengajuan ke- </th>
              <th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
                  foreach($h_l_ukmukk->result_array()  as $i):
										$kd_ukmkk=$i['kd_ukmkk'];
										$nama_ukmukk=$i['nama_ukmukk'];
                    $tahunakademik=$i['tahunakademik'];
                    $danasisa=$i['danasisa'];
                    $danaawal=$i['danasisa'];
                    $nPengajuan=$i['nPengajuan'];
                    $color_button=$i['button_color_history'];
                    $nama_status=$i['Nama_Status'];
										$tgl_pengajuan=$i['insertdata'];
										$nPengajuan=$i['nPengajuan'];
										$id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
                    ?>
							<td><?= date_indo($tgl_pengajuan);?></td>
							<td><?= $nama_fakultas; ?></td>
              <td><?= $nama_ukmukk; ?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td class="text-center">
								<span class="<?= $color_button?>"><?= $nama_status?></span>
							</td>
							<td class="text-center">
								<a href=""
									class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaldetail<?php echo $id_pengajuan_ukmukk;?>"><i class="fas fa-search"></i> Cek
									File</a>
								<!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a> -->
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php 
                  foreach($h_l_ukmukk->result_array()  as $i):
					$kd_ukmkk=$i['kd_ukmkk'];
					$nama_ukmukk=$i['nama_ukmukk'];
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
					$alasan_gagal_pengajuan=$i['alasan_gagal_pengajuan'];
					$alasan_gagal_laporan=$i['alasan_gagal_laporan'];
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
											<h6 class="modal-title" id="exampleModalLabel">Detail Laporan</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
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
										</div>
										<div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
	<?php endforeach; ?>

</div>
</div>
<script>
	// javascript for open file
	function basicPopup(url) {
		popupWindow = window.open(url, 'popupWindow',
			'height=300,width=700,left=50, top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=yes,status=yes,download=no'
		)
	}

</script>