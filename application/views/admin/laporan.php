<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
		<a href="<?= base_url().'c_admin/Cek_Pagu_Tingkat_Univ';?>"
			class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Cek Pengajuan Dana DEMAU SEMAU</a>
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
						<tr>
							<th>No</th>
							<th>Nama Fakultas</th>
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
            foreach($lpjjrsn->result_array() as $i):
              $kd_jrsn=$i['kd_jrsn'];
              $nama_fakultas=$i['nama_fakultas'];
              $tahunakademik=$i['tahunakademik'];
              $danaawal=$i['danaawal'];
              $danasisa=$i['danasisa'];
              $nPengajuan=$i['nPengajuan'];
              $akhirkegiatan=$i['akhirkegiatan'];
              $tglmakslaporan=$i['tglmakslaporan'];
              $laporankegiatan=$i['laporankegiatan'];
              $laporanrincianbiaya=$i['laporanrincianbiaya'];
              ?>
							<td><?= $j++; ?></td>
							<td><?= $nama_fakultas; ?></td>
							<td><?= $kd_jrsn; ?></td>
							<td><?= date("d M Y",strtotime($akhirkegiatan)); ?></td>
							<td><?= date("d M Y",strtotime($tglmakslaporan)); ?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td><a href="<?=site_url().'assets/uploads/laporankegiatan/'.$laporankegiatan;'.pdf' ?>" target=_blank
									name="laporankegiatan" id="laporankegiatan">
									<?=$laporankegiatan?></td>
							<td><a href="<?=site_url().'assets/uploads/laporanrincianbiaya/'.$laporanrincianbiaya;'.pdf' ?>"
									target=_blank name="laporanrincianbiaya" id="laporanrincianbiaya">
									<?=$laporanrincianbiaya?>
							</td>
							<td class="text-center">
								<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm"
									data-toggle="modal" data-target="#modalACClaporan<?= $kd_jrsn; ?>"><i class="fa fa-check"></i>Terima
									Laporan</button>
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
    foreach($lpjjrsn->result_array() as $i):
      $kd_jrsn=$i['kd_jrsn'];
      $nPengajuan=$i['nPengajuan'];
      $suratpengajuan=$i['suratpengajuan'];
      $rinciankegiatan=$i['rinciankegiatan'];
      $rkakl=$i['rkakl'];
      $tor=$i['tor'];
      $laporankegiatan=$i['laporankegiatan'];
      $laporanrincianbiaya=$i['laporanrincianbiaya'];
      // $fakultas=$i['parent_fakultas'];
      ?>
<div class="modal fade" id="modalACClaporan<?= $kd_jrsn; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Terima Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Anda yakin akan terima laporan kegiatan dari <?= $kd_jrsn; ?> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<a href="<?php echo base_url('dana/updatedanhapus/'.$kd_jrsn)?>" class="btn btn-primary">Terima Laporan</a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php endforeach;?>
