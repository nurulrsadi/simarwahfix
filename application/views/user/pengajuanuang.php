</header>
<ul class="icons">
	<li></li>
</ul>
</header>

<!-- Content -->
<section>
	<header class="main">
		<!-- <h1>Pagu Keuangan</h1> -->
	</header>
	<?php
                    foreach($dana->result_array() as $i):
                        $kd_jrsn=$i['kd_jrsn'];
                        $kd_fklts=$i['kd_fklts'];
                        $danaawal=$i['danaawal'];
                        $danasisa=$i['danasisa'];
                        $nPengajuan=$i['nPengajuan'];
                        $statususer=$i['statususer'];
                        $tahunakademik=$i['tahunakademik'];
                        $jurusan=$i['jurusan'];
  ?>

	<div class="features">

		<article>
			<form class="form-horizontal" action="<?php echo base_url().'dana/do_pengajuan';?>" enctype="multipart/form-data"
				method="post">
				<!-- <span class="icon fa-gem"></span> -->
				<div class="content">
					<img src="<?php echo base_url('assets/img/money.png')?>" class="img-fluid" alt="Responsive image"
						width="100%">
				</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pagu Anggaran Keuangan yang Organisasi Anda Miliki sebesar
					<br>Rp. <?php echo $danasisa?></br>
			</div>
		</article>
	</div>

	<!-- SYARAT CAIR UANG -->
	<h2>Pengajuan Uang Untuk Kegiatan</h2>
	<p>Silahkan melengkapi data dibawah ini untuk dapat melakukan pengajuan pencairan dana. Anda dapat melakukan pengajuan
		sebanyak 3 (tiga) kali</p>
	<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
	<!-- <input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>" /> -->
	<input type="hidden" name="statususer" value="<?= $statususer?>">
	<input type="hidden" name="kd_fklts" value="<?= $kd_fklts?>">
	<input type="hidden" name="danasisa" value="<?= $danasisa?>">
	<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
	<input type="hidden" name="jurusan" value="<?= $jurusan?>">

	<div class="row ">
		<div class="col-2 col-12-small">
			<label for="nPengajuan">Pengajuan ke</label><br>
			<label for="namaKegiatan">Nama Kegiatan</label><br>
			<label for="akhirkegiatan">Akhir Tanggal Kegiatan</label>
		</div>
		<br>
		<div class="col-4 col-12-xsmall">
			<input type="text" name="nPengajuan" id="nPengajuan" value="<?php echo $nPengajuan;?> " readonly /><br>
			<input type="text" name="namaKegiatan" id="namaKegiatan" placeholder=" contoh : PBAK, AUDIENSI" required /> <br>
			<input type="date" name="akhirkegiatan" id="akhirkegiatan" required /> <br>
		</div>
	</div>
	<!-- tabel -->
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
				<td>Surat Pengajuan</td>
				<td>
					<div class="file-upload-custom">
						<input class="file-upload__input-custom" type="file" name="suratpengajuan" id="suratpengajuan"
							accept="application/pdf" required>
						<button class="file-upload__button-custom" type="button">Choose A
							File</button>
						<span class="file-upload__label-custom"></span>
					</div>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Rincian Kegiatan</td>
				<td>
					<div class="file-upload-custom">
						<input class="file-upload__input-custom" type="file" value="" name="rinciankegiatan" id="rinciankegiatan"
							accept="application/pdf" required>
						<button class="file-upload__button-custom" type="button">Choose A
							File</button>
						<span class="file-upload__label-custom"></span>
					</div>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>RKA-KL </td>
				<td>
					<div class="file-upload-custom">
						<input class="file-upload__input-custom" type="file" name="rkakl" id="rkakl" accept="application/pdf"
							required>
						<button class="file-upload__button-custom" type="button" required>Choose A
							File</button>
						<span class="file-upload__label-custom"></span>
					</div>
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>TOR Kegiatan </td>
				<td>
					<div class="file-upload-custom">
						<input class="file-upload__input-custom" type="file" name="tor" id="tor" accept="application/pdf" required>
						<button class="file-upload__button-custom" required>Choose A
							File</button>
						<span class="file-upload__label-custom"></span>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- end tabel -->
	<!-- kirim -->
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
			<p><button type="submit" class="btn btn-success">Kirim</button></p>
			<!-- </a> -->
		</div>
	</div>
	<!--  -->
	</form>

</section>
</div>
</div>
<?php endforeach;?>
<!-- end kirim -->
