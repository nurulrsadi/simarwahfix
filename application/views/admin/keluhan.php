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
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nama ormawa</th>
							<th>Keluhan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<?php $j=1; ?>
					<?php foreach($userkeluhan->result_array() as $i): 
            $kd_ormawa=$i['kd_ormawa'];
            $tanggal=$i['tanggal'];
            $isikeluhan=$i['isikeluhan'];
            ?>
					<tbody>
						<tr>
							<td class="text-center"><?= $j++; ?></td>
							<td><?= date("d M Y",strtotime($tanggal)); ?></td>
							<td><?= $kd_ormawa; ?></td>
							<td><?= $isikeluhan; ?></td>
							<td class="text-center">
								<center>
									<button class="btn btn-primary" data-toggle="modal"
										data-target="#modaleditDanaAcc<?php echo $kd_ormawa;?>"><i class="fa fa-check"></i> Terima
										Keluhan</button>
								</center>
								<!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</a> -->
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div>
<?php foreach($userkeluhan->result_array() as $i): 
            $kd_ormawa=$i['kd_ormawa'];
            $tanggal=$i['tanggal'];
            $isikeluhan=$i['isikeluhan'];
            ?>
<div class="modal fade" id="modaleditDanaAcc<?php echo $kd_ormawa;?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Keluhan <?= $kd_ormawa ?></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url().'ormawa/hapuskeluhan'?>" enctype="multipart/form-data">
				<div class="modal-body">
					Anda yakin akan terima laporan kegiatan dari <?= $kd_ormawa; ?> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="<?php echo base_url('ormawa/hapuskeluhan/'.$kd_ormawa)?>" class="btn btn-primary">Save changes</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>
</div>
