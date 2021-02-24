<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $title; ?></h1>
		<div class="tambahan align-items-center justify-content-between">
    		<a href="<?= base_url('ormawa/delete_all_keluhan/') ?>" onclick="return confirm('Anda yakin hapus semua keluhan?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash"></i> &nbsp; Hapus semua keluhan</a>
    		<a href="<?= base_url('c_admin/Cetak_Keluhan/')?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-print"></i> Print PDF</a>
		</div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel Data <?= $title; ?></h6>
			<div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashdana');  ?>"></div>
    		<?php if($this->session->flashdata('flashdana')): ?>
    		<?php endif; ?>
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
							<!--<th>Aksi</th>-->
						</tr>
					</thead>
					<tbody>
						<tr>
    					<?php $j=1; ?>
    					<?php foreach($userkeluhan->result_array() as $i): 
                            $kd_ormawa=$i['kd_ormawa'];
                            $tanggal=$i['tanggal'];
                            $isikeluhan=$i['isikeluhan'];
                            $id_keluhan=$i['id'];
                        ?>
							<td class="text-center"><?= $j++; ?></td>
							<td><?= date_indo($tanggal); ?></td>
							<td><?= $kd_ormawa; ?></td>
							<td><?= $isikeluhan; ?></td>
							<td class="text-center">
								<center>
								    <button class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $id_keluhan;?>"><i class="fa fa-trash"></i></button>
								    <!--<a class="btn btn-danger" href "<?= base_url('ormawa/deletekeluhan/'.$id_keluhan)?>" onclick="return confirm('Anda yakin hapus keluhan '+ $kd_ormawa+ ' ?')"><i class="fa fa-trash"></i></a>-->
								</center>
							</td>
						</tr>
		            <?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php foreach($userkeluhan->result_array() as $i): 
            $kd_ormawa=$i['kd_ormawa'];
            $tanggal=$i['tanggal'];
            $isikeluhan=$i['isikeluhan'];
            $id_keluhan=$i['id'];
            ?>
<div class="modal fade" id="modal_delete<?php echo $id_keluhan;?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Keluhan <?= $kd_ormawa ?></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				    <div class="form-group">
                        <label for="kd_ormawa">Kode Organisasi</label>
                        <input type="kd_ormawa" class="form-control" id="kd_ormawa" value="<?= $kd_ormawa?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="isikeluhan">Isi keluhan atau saran</label>
                        <input class="form-control" id="isikeluhan" value="<?= $isikeluhan?>" readonly row="3"></input>
                     </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a class="btn btn-danger" href="<?php echo base_url('ormawa/deletekeluhan/'.$id_keluhan); ?>">Hapus</a>
					<!--<button type="submit" class="btn btn-primary" data-dismiss="modal">Save Changes</button>-->
				</div>
		</div>
	</div>
</div>
<?php endforeach;?>
</div>
