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
						<tr>
							<th>Id</th>
							<th>Nama Fakultas</th>
							<th>Nama Ormawa</th>
							<th>Sisa Anggaran Pagu</th>
							<th>Pengajuan ke- </th>
							<th>keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $i=1; ?>
							<?php foreach($getpengajuandana as $j):  ?>
							<td><?= $i++; ?></td>
							<td><?= $j->fakultas; ?></td>
							<td><?= $j->username; ?></td>
							<td><?= $j->dana_sisa; ?></td>
							<td class="text-center"><?= $j->nPengajuan; ?></td>
							<!-- <td class="text-center"><?= $j->dana_sisa; ?></td> -->
							<td>
								<span class="btn btn-sm btn-danger">Belum disetujui</span>
							</td>
							<td class="text-center">
								<a href="<?= base_url('c_admin/Cek_Data_Pengajuan')?>"
									class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search"></i> Cek
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
</div>
