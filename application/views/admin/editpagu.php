<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
	</div>

	<!-- Content Row -->
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary" style='text-transform:capitalize'>Tabel <?=  $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Fakultas</>
							<th>Nama Ormawa</th>
							<th>Tahun Ajaran</th>
							<th>Pagu Anggaran</th>
							<th>Dana Sisa</th>
							<th>Aksi</th>
						</tr>
					</thead>
          <?php $j=1; ?>
					<?php 
                  foreach($userdana->result_array() as $i):
                    $kd_jrsn=$i['kd_jrsn'];
                    $kd_fklts=$i['kd_fklts'];
                    $tahunakademik=$i['tahunakademik'];
                    $danaawal=$i['danaawal'];
                    $danasisa=$i['danasisa'];
                    $nPengajuan=$i['nPengajuan'];
                    // $fakultas=$i['parent_fakultas'];
                    ?>
					<tbody>
						<tr>
							<td><?= $j++; ?></td>
							<td><?= $kd_jrsn; ?></td>
							<td> <?= $kd_fklts; ?></td>
							<td><?= $tahunakademik; ?></td>
							<td>Rp. <?= $danaawal; ?></td>
							<td>Rp. <?= $danasisa; ?></td>
							<td class="align-self-auto">
								<!-- Button trigger modal -->
								<a href="" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm" data-toggle="modal"
									data-target="#editanggaran<?= $kd_jrsn?>"><i class="fa fa-pen"></i>
									Edit Anggaran
								</a>
							</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>

        <?php 
                  foreach($userdana->result_array() as $i):
                    // $id_dana=$i['id_dana'];
                    $kd_jrsn=$i['kd_jrsn'];
                    $kd_fklts=$i['kd_fklts'];
                    $tahunakademik=$i['tahunakademik'];
                    $danaawal=$i['danaawal'];
                    $danasisa=$i['danasisa'];
                    $nPengajuan=$i['nPengajuan'];
                    // $fakultas=$i['parent_fakultas'];
                    ?>
				<div class="modal fade" id="editanggaran<?= $kd_jrsn;?>" tabindex="-1" role="dialog"
					aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel">FORM INPUT ANGGARAN</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" action="<?php echo base_url('c_admin/update_dana_awal')?>" method="post"
									enctype="multipart/form-data" role="form">
									<div class="form-group ">
										<input type="hidden" name="kd_jrsn" value="<?php echo $kd_jrsn;?>">
										<input type="hidden" name="nPengajuan" value="<?php echo $nPengajuan;?>">
										<label">Tahun Akademik</label>
											<input type="text" name="tahunakademik" value="<?php echo $tahunakademik;?>" id="tahunakademik"
												class="form-control" required>
									</div>
									<div class="form-group ">
										<label">
											Fakultas </t></label>
											</t>
											<input type="text" name="fakultas" readonly class="form-control" id="fakultas"
												value="<?php echo $kd_fklts;?>">
									</div>
									<div class="form-group ">
										<label">
											Nama Ormawa </t></label>
											</t>
											<input type="text" name="namaormawa" readonly class="form-control" value="<?php echo $kd_jrsn;?>">
									</div>
									<div class="form-group">
										<label">
											Pagu Anggaran <small class="text-decoration" style="color:red">contoh : 2000000</small>
											</label>
											<input type="number" min="0" name="danaawal" id="dana_awal" value="<?php echo $danaawal;?>"
												class="form-control" required>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
						</form>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
