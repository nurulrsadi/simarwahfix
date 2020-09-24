</header>

<!-- Content -->
<section>
	<!-- modal untuk informasi -->
	<header class="main">
	</header>
	<div class="features">
		<article>
			<?php
    foreach($laporan->result_array() as $i):
        $kd_jrsn=$i['kd_jrsn'];
        $akhirkegiatan=$i['akhirkegiatan'];
        $nPengajuan=$i['nPengajuan'];
        $statususer=$i['statususer'];
  ?>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/reportkegiatan.png')?>" class="img-fluid" alt="Responsive image"
					width="100%">
			</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Silahkan melakukan laporan kegiatan maksimal h+7 dari waktu terlaksanakannya acara, agar
					dapat mengajukan kembali pencairan dana
					<br>Laporan kegiatan paling lambat dikirim pada
					</br>
					<?=date('d F Y',strtotime('+7 day',strtotime($akhirkegiatan))); ?>
			</div>
		</article>
	</div>

	<hr class=" major" />
	<form class="form-horizontal" action="<?php echo base_url().'dana/do_laporan';?>" enctype="multipart/form-data"
		method="post">
		<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
		<input type="hidden" name="akhirkegiatan" value="<?= date("d-m-Y",strtotime($akhirkegiatan)); ?>">
		<input type="hidden" name="statususer" value="<?= $statususer?>">
		<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
		<input type="hidden" name="tgluploadlpj" value="<?= date('d F Y');?>">
		<table class="content-table">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Dokumen</th>
					<th>Nama File</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Laporan Kegiatan</td>
					<td><input type="file" name="laporankegiatan" class="form-control-file" id="exampleFormControlFile1"
							accept="application/pdf" required>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Rincian Biaya</td>
					<td><input type="file" name="laporanrincianbiaya" class="form-control-file" id="exampleFormControlFile1"
							accept="application/pdf" required>
					</td>
				</tr>
				</tbod>
		</table>
		<div class="row gtr-200">
			<div class="col-2 col-12-medium">
			</div>
			<div class="col-2 col-12-medium">
			</div>
			<div class="col-2 col-12-medium">
			</div>
			<div class="col-2 col-12-medium">
			</div>
			<div class="col-2 col-12-medium">
			</div>
			<div class="col-2 col-12-medium">
				<!-- <a href="<?php echo base_url().'c_user/Verifikasi_Data';?>"> -->
				<p><button type="submit" class="btn-succes">Kirim</button></p>
				<!-- </a> -->
			</div>
	</form>
	<hr class="major" />
</section>
</div>
</div>
<?php endforeach;?>
