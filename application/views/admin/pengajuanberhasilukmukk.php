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
			<div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashdana');  ?>"></div>
    		<?php if($this->session->flashdata('flashdana')): ?>
    		<?php endif; ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
						<tr>
							<th>No</th>
							<th>Nama Ormawa</th>
							<th>Sisa Anggaran Pagu</th>
							<th>Tanggal Akhir Acara</th>
							<th>Pengajuan ke</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
                  foreach($datauserbelum_ukmukk->result_array() as $i):
                    $kd_ukmkk=$i['kd_ukmkk'];
                    $tahunakademik=$i['tahunakademik'];
                    $danaawal=$i['danaawal'];
                    $danasisa=$i['danasisa'];
                    $danaacc=$i['danaacc'];
                    $nPengajuan=$i['nPengajuan'];
                    $akhirkegiatan=$i['akhirkegiatan'];
                    ?>

							<td><?= $j++; ?></td>
							<td><?= $kd_ukmkk; ?></td>
							<td>Rp. <?=  number_format($danasisa,0,',','.'); ?></td>
							<td><?= date_indo($akhirkegiatan); ?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td>
								<span class="btn btn-sm btn-danger">Laporan Belum Dikirim</span>
							</td>
							<td class="text-center">
								<center>
									<button class="btn btn-primary" data-toggle="modal"
										data-target="#modaleditDanaAcc<?php echo $kd_ukmkk;?>"><i class="fas fa-search"></i> Edit</button>
								</center>
								<!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a> -->
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php 
    foreach($datauserbelum_ukmukk->result_array() as $i):
      $kd_ukmkk=$i['kd_ukmkk'];
      $tahunakademik=$i['tahunakademik'];
      $danaawal=$i['danaawal'];
      $danasisa=$i['danasisa'];
      $danaacc=$i['danaacc'];
      $nPengajuan=$i['nPengajuan'];
			$akhirkegiatan=$i['akhirkegiatan'];
			$id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
      ?>
<div class="modal fade" id="modaleditDanaAcc<?php echo $kd_ukmkk;?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Update Dana ACC Pagu Anggaran</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url().'c_admin/update_danaacc_ukmukk'?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tahun Akademik</t></label>
						</t><input type="text" name="tahunakademik" class="form-control" value="<?php echo $tahunakademik;?>"
							required readonly>
					</div>
					<div class="form-group ">
						<label>Nama Ormawa</t></label>
						</t><input type="text" name="kd_ukmkk" class="form-control" value="<?php echo $kd_ukmkk;?>" required readonly>
					</div>
					<div class="form-group ">
						<label>Dana Sisa</t></label>
						</t><input type="text" name="danasisa" class="form-control"
							value="Rp <?php echo number_format($danasisa,0,',','.');?>" readonly>
						<input type="hidden" name="danasisa" value="<?= $danasisa?>">
					</div>
					<div class="form-group ">
						<label>Dana yang di ACC sebelumnya</t></label>
						</t><input type="text" name="danaacc" class="form-control"
							value="Rp <?php echo number_format($danaacc,0,',','.');?>" readonly>
						<input type="hidden" name="danaacc" value="<?= $danaacc?>">
					</div>
					<div class="form-group ">
						<label>Update Dana yang di ACC <small class="text-decoration" style="color:red">contoh : 2000000</small>
							</t>
						</label>
						</t><input type="number" name="danaupdate" min="1" value="" class="form-control" required>
					</div>
					<input type="hidden" name="id_pengajuan_ukmukk" value="<?= $id_pengajuan_ukmukk?>">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>

