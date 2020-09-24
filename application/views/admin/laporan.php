<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
		<h8 data-toggle="tooltip" data-placement="top" title="Hari ini"><?= date('d F Y');?> </h8>
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
                    // $fakultas=$i['parent_fakultas'];
                    ?>
					<tbody>
						<tr>
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
								<button type="submit" class="d-none d-lg-inline-block btn btn-sm btn-primary shadow-lg"
									onclick="return confirm('Anda Yakin Menerima Laporan Tersebut? ');"><i class="fa fa-check"></i>Terima
									Laporan</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
