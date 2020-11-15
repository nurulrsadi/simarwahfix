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
							<th>Id</th>
							<th>Nama Ormawa</th>
							<th>Tanggal Proses Pengajuan</th>
							<th>Pengajuan ke- </th>
              <th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
                  foreach($h_p_ukmukk->result_array()  as $i):
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
							<td><?= $j++; ?></td>
              <td><?= $kd_jrsn; ?></td>
							<td><?= date_indo($tgl_pengajuan);?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td class="text-center">
								<span class="<?= $color_button?>"><?= $nama_status?></span>
							</td>
							<td class="text-center">
								<a href=""
									class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaldetail<?php echo $id_pengajuan;?>"><i class="fas fa-search"></i> Cek
									File</a>
								<!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a> -->
							</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<?php 
                  foreach($h_p_ukmukk->result_array()  as $i):
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
		  				<div class="modal fade scrollable" id="modaldetail<?php echo $id_pengajuan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    						<div class="modal-dialog">
    							<div class="modal-content">
										<div class="modal-header">
											<h6 class="modal-title" id="exampleModalLabel">Detail Sewa</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
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