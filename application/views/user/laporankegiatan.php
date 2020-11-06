</header>

<!-- Content -->
<section>
	<!-- modal untuk informasi -->
	<header class="main">
	</header>
	<div class="features">
		<article>
    <?php if( $this->session->userdata('role') ==0 && $user['statususer'] ==4):?>
			<?php
    foreach($laporan->result_array() as $i):
        $kd_jrsn=$i['kd_jrsn'];
        $akhirkegiatan=$i['akhirkegiatan'];
        $nPengajuan=$i['nPengajuan'];
        $statususer=$i['statususer'];
  ?>
			<?php ?>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/reportkegiatan.png')?>" class="img-fluid" alt="Responsive image"
					width="100%">
			</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pengajuan pencairan anda telah kami terima, anda dapat ke gedung al-jamiah untuk melakukan
					pencairan<br><br>Silahkan melakukan laporan kegiatan maksimal h+7 dari waktu terlaksanakannya acara, agar
					dapat mengajukan kembali pencairan dana
					<br>Laporan kegiatan paling lambat dikirim pada
					</br>
					<?php $tglmaks= date('d F Y',strtotime('+7 day',strtotime($akhirkegiatan))); ?>
          <?= date_indo($tglmaks); ?>
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
					<td>
						<div class="file-upload-custom">
							<input class="file-upload__input-custom" type="file" name="laporankegiatan" id="laporankegiatan"
								accept="application/pdf" required>
							<button class="file-upload__button-custom" type="button">Choose A
								File</button>
							<span class="file-upload__label-custom"></span>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Rincian Biaya</td>
					<td>
						<div class="file-upload-custom">
							<input class="file-upload__input-custom" type="file" name="laporanrincianbiaya" id="laporanrincianbiaya"
								accept="application/pdf" required>
							<button class="file-upload__button-custom" type="button">Choose A
								File</button>
							<span class="file-upload__label-custom"></span>
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

<?php elseif( $this->session->userdata('role') ==2 && $user['statususer'] ==4):?>
<?php
    foreach($laporan_ukmukk->result_array() as $i):
        $kd_ukmkk=$i['kd_ukmkk'];
        $akhirkegiatan=$i['akhirkegiatan'];
        $nPengajuan=$i['nPengajuan'];
        $statususer=$i['statususer'];
  ?>
			<?php ?>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/reportkegiatan.png')?>" class="img-fluid" alt="Responsive image"
					width="100%">
			</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pengajuan pencairan anda telah kami terima, anda dapat ke gedung al-jamiah untuk melakukan
					pencairan<br><br>Silahkan melakukan laporan kegiatan maksimal h+7 dari waktu terlaksanakannya acara, agar
					dapat mengajukan kembali pencairan dana
					<br>Laporan kegiatan paling lambat dikirim pada
					</br>
					<?php $tglmaks = date('d F Y',strtotime('+7 day',strtotime($akhirkegiatan))); ?>
          <?= date_indo($tglmaks); ?>
			</div>
		</article>
	</div>

	<hr class=" major" />
	<form class="form-horizontal" action="<?php echo base_url().'dana/do_laporan_ukmukk';?>" enctype="multipart/form-data"
		method="post">
		<input type="hidden" name="kd_ukmkk" value="<?= $kd_ukmkk?>">
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
					<td>
						<div class="file-upload-custom">
							<input class="file-upload__input-custom" type="file" name="laporankegiatan" id="laporankegiatan"
								accept="application/pdf" required>
							<button class="file-upload__button-custom" type="button">Choose A
								File</button>
							<span class="file-upload__label-custom"></span>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Rincian Biaya</td>
					<td>
						<div class="file-upload-custom">
							<input class="file-upload__input-custom" type="file" name="laporanrincianbiaya" id="laporanrincianbiaya"
								accept="application/pdf" required>
							<button class="file-upload__button-custom" type="button">Choose A
								File</button>
							<span class="file-upload__label-custom"></span>
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
<?php elseif( $this->session->userdata('role') ==0 && $user['statususer'] ==1):?>
<center>
  <h2>HEI!</h2>
	<p>
		<h4>Silahkan update profile untuk dapat meakses menu ini</h4>
	</p><br>
</center>
<?php elseif( $this->session->userdata('role') ==2 && $user['statususer'] ==1 ):?>
<center>
  <h2>HEI!</h2>
	<p>
		<h4>Silahkan update profile untuk dapat meakses menu ini</h4>
	</p><br>
</center>
<?php else: ?>
<center>
  <h2>Terima kasih telah melakukan update profile!</h2>
	<p>
		<h4>Silahkan melakukan logout dan login kembali untuk meakses menu ini</h4>
	</p><br>
</center>
<?php endif;?>
  
  