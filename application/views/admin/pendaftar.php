<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <div class="tambahan align-items-center justify-content-between">
      <div class="my-2"></div>
      <span class="btn btn-primary">Pendaftar : <?= $total;?></span>
      <span class="btn btn-success">Diterima : <?= $diterima;?></span>
      <span class="btn btn-warning">Proses : <?= $diterima;?></span>
      <br>
    </div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
			<div class="flash-data-pengajuan" data-flashdata="<?= $this->session->flashdata('flashpengajuan');  ?>"></div>
			<!-- <?php if($this->session->flashdata('flashpengajuan')): ?>
			<?php endif; ?> -->
		</div>
    
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
						<tr>
							<!-- <th class="text-center">No</th> -->
							<th>Nama</th>
							<th>Jurusan</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
                  foreach($all_calon->result_array()  as $i):
                    $id_calon = $i['id_calon_anggota'];
                    $nama = $i['nama_calon_anggota'];
                    $alasan = $i['alasan_bergabung'];
                    $jurusan = $i['jurusan'];
                    $status = $i['status_calon'];
                    $nama_status = $i['status'];
                    $warna_status = $i['warna'];
                    ?>
							<!-- <td class="text-center"><?= $j++; ?></td> -->
							<td><?= $nama; ?></td>
              <td><?= $jurusan; ?></td>
              <td class="text-center">
                  <span class="<?= $warna_status?>"><?= $nama_status?></span>
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
