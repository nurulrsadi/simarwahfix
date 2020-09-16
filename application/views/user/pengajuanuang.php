<ul class="icons">
	<li></li>
</ul>
</header>

<!-- Content -->
<section>
	<header class="main">
		<!-- <h1>Pagu Keuangan</h1> -->
	</header>

	<div class="features">

		<article>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/money.png')?>" class="img-fluid" alt="Responsive image" width="100%">
			</div>
		</article>
		<article>
			<div class="content">
				<p class="customtext">Pagu Anggaran Keuangan yang Organisasi Anda Miliki sebesar
					<br>Rp. <?= $user['dana_sisa'];?></br>
			</div>
		</article>
	</div>

	<!-- SYARAT CAIR UANG -->
	<h2>Pengajuan Uang Untuk Kegiatan</h2>
	<p>Silahkan melengkapi data dibawah ini untuk dapat melakukan pengajuan pencairan dana. Anda dapat melakukan pengajuan
		sebanyak 3 (tiga) kali</p>
	<!-- <form action="<?= site_url('dana/_uploadpengajuan')?>" method="post" enctype="multipart/form-data"> -->
	<!--  -->
	<!-- <?= form_open('dana/do_pengajuan')?> -->

	<form class="form-horizontal" action="<?php echo base_url().'dana/do_pengajuan';?>" enctype="multipart/form-data"
		method="post">
		<div class="row ">
			<div class="col-2 col-12-small">
				<label for="nPengajuan">Pengajuan ke</label><br>
				<label for="namaKegiatan">Nama Kegiatan</label>
			</div>
			<br>
			<div class="col-4 col-12-xsmall">
				<input type="text" name="nPengajuan" id="nPengajuan" value="<?= $user['nPengajuan']; ?>" readonly /><br>
				<input type="text" name="namaKegiatan" id="namaKegiatan" value="<?= $user['namaKegiatan']; ?>"
					placeholder="contoh : PBAK, AUDIENSI" /><br>
			</div>
		</div>
		<!-- <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label"> Pengajuan ke : </tr/tr></label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control-plaintext" id="nPengajuan" name="nPengajuan" value="<?= $user['nPengajuan']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label"> Pengaju :</tr/tr></label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        </div>
                    </div> -->
		<!-- <?= $error; ?> -->
		<!-- <p>Pengajuan ke- <?= $user['nPengajuan'];?> </p>
                    <p>Pengaju : <?= $user['nama']; ?></p> -->
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
							<input class="form-control file-upload__input-custom" type="file" name="suratpengajuan"
								id="suratpengajuan" accept="application/pdf" required>
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
							<input class="file-upload__input-custom" type="file" value="<?php echo set_value('rinciankegiatan');?>"
								name="rinciankegiatan" id="rinciankegiatan" accept="application/pdf" required>
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
							<input class="file-upload__input-custom" type="file" name="tor" id="tor" accept="application/pdf"
								required>
							<button class="file-upload__button-custom" required>Choose A
								File</button>
							<span class="file-upload__label-custom"></span>
						</div>
					</td>
				</tr>
			</tbody>
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
				<p><button type="submit" value="upload" class="btn btn-primary" ">Kirim</button></p>
                                <!-- </a> -->
                            </div>
                        </div>
                    <!--  -->
                    </form>

                </section>
            </div>
        </div>
