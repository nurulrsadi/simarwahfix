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
			<div class="flash-data-pengajuan" data-flashdata="<?= $this->session->flashdata('flashormawahimp');  ?>"></div>
			<?php if($this->session->flashdata('flashormawahimp')): ?>
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
							<th>Sisa Anggaran Pagu</th>
							<th>Pengajuan ke- </th>
							<th>keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
                  foreach($datapengajuukm->result_array() as $i):
                    $kd_ukmukk=$i['kd_ukmkk'];
                    // $nama_fakultas=$i['nama_fakultas'];
                    $tahunakademik=$i['tahunakademik'];
                    $danasisa=$i['danasisa'];
                    $danaawal=$i['danasisa'];
                    $nPengajuan=$i['nPengajuan'];
                    ?>
							<td><?= $j++; ?></td>
							<td><?= $kd_ukmukk; ?></td>
							<td>Rp. <?= number_format($danasisa,0,',','.'); ?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td>
								<span class="btn btn-sm btn-danger">Belum disetujui</span>
							</td>
							<td class="text-center">
								<a href="<?= base_url('c_admin/Cek_Data_Pengajuan_UKMUKK/'.$kd_ukmukk)?>"
									class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search"></i> Cek
									File</a>
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
