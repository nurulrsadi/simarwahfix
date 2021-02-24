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
							<th>Nama Fakultas</th>
							<th>Nama Ormawa</th>
							<th>Tahun Akademik</th>
              <th>Banyak pernah melakukan pengajuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
                  foreach($npengajuan->result_array()  as $i):
                    $kd_jrsn=$i['kd_jrsn'];
                    $nama_fakultas=$i['nama_fakultas'];
                    $tahunakademik=$i['tahunakademik'];
                    $danasisa=$i['danasisa'];
                    $danaawal=$i['danasisa'];
                    $nPengajuan=$i['nPengajuan'];
                    $nama_fakultas=$i['nama_fakultas'];
										$nLakukanPengajuan=$i['n_pengajuan'];
                    ?>
              
							<td><?= $j++; ?></td>
							<td><?= $nama_fakultas; ?></td>
              <td><?= $kd_jrsn; ?></td>
							<td><?= $tahunakademik; ?></td>
							<td class="text-center">
                <?= $nLakukanPengajuan; ?>
              </td>
							<td class="text-center">
								<a href="<?= base_url('c_admin/Detail_History_Pengajuan_Fakultas/'.$kd_jrsn)?>"
									class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search"></i> Cek
									Detail Pengajuan</a>
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
</div>
