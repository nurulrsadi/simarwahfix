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
	<?php echo $msg; ?>

  <?php if( $this->session->userdata('role') ==0 && $user['statususer']==2 && $this->session->userdata('user_login')!='DEMAU' && $this->session->userdata('user_login')!='SEMAU'):?>
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
				<div class="content">
					<img src="<?php echo base_url('assets/img/default/money.png')?>" class="img-fluid" alt="Responsive image"
						width="100%">
				</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pagu Anggaran Keuangan yang Organisasi Anda Miliki sebesar
					<br>Rp. <?php echo number_format($danasisa,0,',','.')?></br>
			</div>
		</article>
	</div>

	<!-- SYARAT CAIR UANG -->
	<h2>Pengajuan Uang Untuk Kegiatan</h2>
	<p>
		<h4>Silahkan melengkapi data dibawah ini untuk dapat melakukan pengajuan pencairan dana. Anda dapat melakukan
			pengajuan
			sebanyak 3 (tiga) kali</h4>
	</p><br>
	<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
	<input type="hidden" name="statususer" value="<?= $statususer?>">
	<input type="hidden" name="kd_fklts" value="<?= $kd_fklts?>">
	<input type="hidden" name="danasisa" value="<?= $danasisa?>">
	<input type="hidden" name="danaawal" value="<?= $danaawal?>">
	<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
	<input type="hidden" name="jurusan" value="<?= $jurusan?>">
	
	
	<div class="form-group row">
		<label for="nPengajuan" class="col-sm-2 col-form-label">Pengajuan ke</label>
		<div class="col-sm-3">
			<input type="text" name="nPengajuan" id="nPengajuan" value="<?php echo $nPengajuan;?> " readonly required/>
			<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
		</div>
	</div>
  
	<div class="form-group row">
		<label for="namaKegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
		<div class="col-sm-3">
			<input type="text" name="namaKegiatan" id="namaKegiatan" placeholder=" contoh : PBAK, AUDIENSI" autocomplete="off" required />
		</div>
	</div>
	<div class="form-group row">
		<label for="akhirkegiatan" class="col-sm-2 col-form-label">Akhir Tanggal Kegiatan</label>
		<div class="col-sm-3">
			<input type="date" name="akhirkegiatan" id="akhirkegiatan" autocomplete="off" required />
		</div>
	</div>
	<br><br>
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
				<td>RKA-KL Kegiatan </td>
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
			<p><button type="submit" class="btn-succes">Kirim</button></p>
			<!-- </a> -->
		</div>
	</div>
	<!--  -->
	</form>

<?php endforeach;?>

<!-- end kirim -->

<!-- untuk ukmukk -->
<?php elseif($this->session->userdata('role') ==2 && $user['statususer']==2  ):?>
	<?php
      foreach($danaukmukk->result_array() as $j):
          $kd_ukmukk=$j['kd_ukmukk'];
          $nama_ukmukk=$j['nama_ukmukk'];
          $danaawal=$j['danaawal'];
          $danasisa=$j['danasisa'];
          $nPengajuan=$j['nPengajuan'];
          $statususer=$j['statususer'];
          $tahunakademik=$j['tahunakademik'];
          // $jurusan=$j['jurusan'];
  ?>

	<div class="features">

		<article>
			<form class="form-horizontal" action="<?php echo base_url().'dana/do_pengajuan_ukmukk';?>" enctype="multipart/form-data"
				method="post">
				<!-- <span class="icon fa-gem"></span> -->
				<div class="content">
					<img src="<?php echo base_url('assets/img/default/money.png')?>" class="img-fluid" alt="Responsive image"
						width="100%">
				</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pagu Anggaran Keuangan yang Organisasi Anda Miliki sebesar
					<br>Rp. <?php echo number_format($danasisa,0,',','.')?></br>
			</div>
		</article>
	</div>

	<!-- SYARAT CAIR UANG -->
	<h2>Pengajuan Uang Untuk Kegiatan</h2>
	<p>
		<h4>Silahkan melengkapi data dibawah ini untuk dapat melakukan pengajuan pencairan dana. Anda dapat melakukan
			pengajuan
			sebanyak 3 (tiga) kali</h4>
	</p><br>
  <input type="hidden" name="kd_ukmukk" value="<?= $kd_ukmukk?>">
  <input type="hidden" name="nama_ukmukk" value="<?= $nama_ukmukk?>">
	<input type="hidden" name="statususer" value="<?= $statususer?>">
	<input type="hidden" name="danasisa" value="<?= $danasisa?>">
	<input type="hidden" name="danaawal" value="<?= $danaawal?>">
  <input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
  


	<div class="form-group row">
		<label for="nPengajuan" class="col-sm-2 col-form-label">Pengajuan ke</label>
		<div class="col-sm-3">
			<input type="text" name="nPengajuan" id="nPengajuan" value="<?php echo $nPengajuan;?> " readonly />
			<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="namaKegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
		<div class="col-sm-3">
			<input type="text" autocomplete="off" name="namaKegiatan" id="namaKegiatan" placeholder=" contoh : PBAK, AUDIENSI" autocomplete="off" required />
		</div>
	</div>
	<div class="form-group row">
		<label for="akhirkegiatan" class="col-sm-2 col-form-label">Akhir Tanggal Kegiatan</label>
		<div class="col-sm-3">
			<input type="date" name="akhirkegiatan" id="akhirkegiatan" required />
		</div>
	</div>
	<br><br>
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
				<td>RKA-KL Kegiatan </td>
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
			<p><button type="submit" class="btn-succes">Kirim</button></p>
			<!-- </a> -->
		</div>
	</div>
	<!--  -->
	</form>
<?php endforeach;?>

	<?php elseif(($this->session->userdata('user_login')=='DEMAU' || $this->session->userdata('user_login')=='SEMAU') && $user['statususer']==2  ) :?>
	
	<?php
      foreach($danauniv->result_array() as $i):
          $kd_jrsn=$i['kd_jrsn'];
          $danaawal=$i['danaawal'];
          $danasisa=$i['danasisa'];
          $nPengajuan=$i['nPengajuan'];
          $statususer=$i['statususer'];
					$tahunakademik=$i['tahunakademik'];
					$jurusan=$i['jurusan'];
	?>

	<div class="features">

		<article>
			<form class="form-horizontal" action="<?php echo base_url().'dana/do_pengajuan_univ';?>" enctype="multipart/form-data"
				method="post">
				<div class="content">
					<img src="<?php echo base_url('assets/img/default/money.png')?>" class="img-fluid" alt="Responsive image"
						width="100%">
				</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pagu Anggaran Keuangan yang Organisasi Anda Miliki sebesar
					<br>Rp. <?php echo number_format($danasisa,0,',','.')?></br>
			</div>
		</article>
	</div>

	<!-- SYARAT CAIR UANG -->
	<h2>Pengajuan Uang Untuk Kegiatan</h2>
	<p>
		<h4>Silahkan melengkapi data dibawah ini untuk dapat melakukan pengajuan pencairan dana. Anda dapat melakukan
			pengajuan
			sebanyak 3 (tiga) kali</h4>
	</p><br>
	<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
	<input type="hidden" name="statususer" value="<?= $statususer?>">
	<input type="hidden" name="danasisa" value="<?= $danasisa?>">
	<input type="hidden" name="danaawal" value="<?= $danaawal?>">
	<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
	<input type="hidden" name="jurusan" value="<?= $jurusan?>">

	
	
	<div class="form-group row">
		<label for="nPengajuan" class="col-sm-2 col-form-label">Pengajuan ke</label>
		<div class="col-sm-3">
			<input type="text" name="nPengajuan" id="nPengajuan" value="<?php echo $nPengajuan;?> " readonly required/>
			<input type="hidden" name="nPengajuan" id="nPengajuan" value="<?= $nPengajuan?>">
		</div>
	</div>
  
	<div class="form-group row">
		<label for="namaKegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
		<div class="col-sm-3">
			<input type="text" name="namaKegiatan" id="namaKegiatan" placeholder=" contoh : PBAK, AUDIENSI" autocomplete="off" required />
		</div>
	</div>
	<div class="form-group row">
		<label for="akhirkegiatan" class="col-sm-2 col-form-label">Akhir Tanggal Kegiatan</label>
		<div class="col-sm-3">
			<input type="date" name="akhirkegiatan" id="akhirkegiatan" autocomplete="off" required />
		</div>
	</div>
	<br><br>
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
				<td>RKA-KL Kegiatan </td>
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
			<p><button type="submit" class="btn-succes">Kirim</button></p>
			<!-- </a> -->
		</div>
	</div>
	<!--  -->
	</form>
<?php endforeach;?>

<?php elseif($user['statususer']==1 && ($user['role']==2||$user['role']==0) ) :?>
<center>
  <h2>HEI!</h2>
	<p>
		<h4>Silahkan update profile untuk dapat meakses menu ini asas</h4>
	</p><br>
</center>

<?php elseif( ($user['role']==2||$user['role']==0) && $user['statususer']==11) :?>
<center>
    <div class="features">
    	<article>
    		<div class="content">
    			<img src="<?php echo base_url('assets/img/default/money.png')?>" class="img-fluid" alt="Responsive image"
    				width="100%">
    		</div>
    	</article>
    	<article>
			<div class="content">
				<p class="customtext">Anda telah melakukan maksimal pengajuan anggaran dana</p>
			</div>
		</article>
	</div>
</center>

<?php else: ?>

<?php endif;?>
</section>
</div>
</div>

