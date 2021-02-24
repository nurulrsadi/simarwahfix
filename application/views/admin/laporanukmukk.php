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
			<div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashormawahimp');  ?>"></div>
			<?php if($this->session->flashdata('flashormawahimp')): ?>
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
							<th>Tanggal Kegiatan selesai</th>
							<th>Tanggal Maksimal pengumpulan</th>
							<th>Pengajuan ke- </th>
							<th>Laporan Kegiatan</th>
							<th>Laporan Rincian Belanja </th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
            foreach($lpjukmukk->result_array() as $i):
              $kd_ukmkk=$i['kd_ukmkk'];
              $tahunakademik=$i['tahunakademik'];
              $danaawal=$i['danaawal'];
              $danasisa=$i['danasisa'];
              $nPengajuan=$i['nPengajuan'];
              $akhirkegiatan=$i['akhirkegiatan'];
              $tglmakslaporan=$i['tglmakslaporan'];
              $laporankegiatan=$i['laporankegiatan'];
              $laporanrincianbiaya=$i['laporanrincianbiaya'];
							$id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
							?>
							<td><?= $j++; ?></td>
							<td><?= $kd_ukmkk; ?></td>
							<td><?= date("d M Y",strtotime($akhirkegiatan)); ?></td>
							<td><?= date("d M Y",strtotime($tglmakslaporan)); ?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td><a href="<?=site_url().'assets/uploads/laporankegiatan/'.$laporankegiatan;'.pdf' ?>"
									onclick="basicPopup(this.href); return false"><?=$laporankegiatan?> </a></td>
							<td><a href="<?=site_url().'assets/uploads/laporanrincianbiaya/'.$laporanrincianbiaya;'.pdf' ?>"
									onclick="basicPopup(this.href); return false"><?=$laporanrincianbiaya?> </a>
							</td>
							<span data-toggle="tooltip" data-placement="bottom">
							<td class="text-center">
							<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
									data-toggle="modal" data-target="#modalTolakLaporan<?= $id_pengajuan_ukmukk; ?>" title="Tolak Laporan"><i class="fa fa-times-circle"></i></button>
							<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
									data-toggle="modal" data-target="#modalACClaporan<?= $id_pengajuan_ukmukk; ?>" title="Terima Laporan"><i class="fa fa-check"></i></button>
							</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
    foreach($lpjukmukk->result_array() as $i):
      $kd_ukmkk=$i['kd_ukmkk'];
      $nPengajuan=$i['nPengajuan'];
      $suratpengajuan=$i['suratpengajuan'];
      $rinciankegiatan=$i['rinciankegiatan'];
      $rkakl=$i['rkakl'];
      $tor=$i['tor'];
      $laporankegiatan=$i['laporankegiatan'];
      $laporanrincianbiaya=$i['laporanrincianbiaya'];
      $id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
      ?>
<div class="modal fade" id="modalACClaporan<?= $id_pengajuan_ukmukk; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo base_url('dana/acc_laporan_ukmukk/'.$id_pengajuan_ukmukk);?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Terima Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Anda yakin akan terima laporan kegiatan dari ORMAWA <?= $kd_ukmkk; ?> ?
				</div>
				<input type="hidden" id="kd_ukmkk" name="kd_ukmkk" value="<?= $kd_ukmkk; ?>">
        <input type="hidden" id="nPengajuan" name="nPengajuan" value="<?= $nPengajuan?>">
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Terima Laporan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php endforeach;?>
<?php 
    foreach($lpjukmukk->result_array() as $i):
      $kd_ukmkk=$i['kd_ukmkk'];
      $nPengajuan=$i['nPengajuan'];
      $suratpengajuan=$i['suratpengajuan'];
      $rinciankegiatan=$i['rinciankegiatan'];
      $rkakl=$i['rkakl'];
      $tor=$i['tor'];
      $laporankegiatan=$i['laporankegiatan'];
      $laporanrincianbiaya=$i['laporanrincianbiaya'];
      $id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
			?>
<div class="modal fade" id="modalTolakLaporan<?= $id_pengajuan_ukmukk; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo base_url('dana/tolak_laporan_ukmukk/')?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Alasan laporan kegiatan ditolak</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="pengaju">Pengaju</label>
						<input type="text" class="form-control" id="pengaju" name="pengaju" value="<?= $kd_ukmkk;?>" readonly required>
					</div>
					<div class="form-group">
							<label for="alasan_tolak_pengajuan">Alasan menolak laporan kegiatan acara</label>
							<textarea class="form-control" id="alasan_tolak_laporan" name="alasan_tolak_laporan" rows="5" required></textarea>
					</div>
				</div>
				<input type="hidden" id="kd_ukmkk" name="kd_ukmkk" value="<?= $kd_ukmkk; ?>">
        <input type="hidden" id="id_pengajuan_ukmukk" name="id_pengajuan_ukmukk" value="<?= $id_pengajuan_ukmukk?>">
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tolak Laporan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php endforeach; ?>
<!-- pdf -->

