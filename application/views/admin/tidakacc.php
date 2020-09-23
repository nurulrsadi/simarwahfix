<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
		</div>
		<div class="card-body">
			<form method="" action="">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Periode</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="2019/2020">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Fakultas</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Saintek">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Jurusan</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Teknik Informatika">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Keterangan Pengajuan</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Pengajuan ke-1">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Keterangan Kegiatan</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail"
							value="PORSENIF, DIESNAL, MUSKOM">
					</div>
				</div>
				<!-- <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div> -->
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Surat Pengajuan</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail"
							value="PengajuanDanaHimatif1.pdf">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Rincian Kegiatan</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail"
							value="SuratRincianKegiatanHimatif1.pdf">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Surat RKA-KL</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="RKA-KLHimatif1.pdf">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Dana Sisa Pagu Anggaran</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Rp. 12.000.000">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Dana Pagu Anggaran Yang di Acc</label>
					<div class="col-sm-10">
						<input type="text" name="" id="staticEmail" placeholder="Rp. 5.000.000">
					</div>
				</div>
				<a href="<?= base_url('/c_admin/Cek_Pagu'); ?>"
					class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> Kembali</a>
				<button type="submit" class="d-none d-lg-inline-block btn btn-sm btn-danger shadow-lg"
					onclick="return confirm('Alasan Anda Tidak Menyetujui');">Tidak Acc</button>
				<button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
					onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</button>
		</div>
		</form>
	</div>
</div>
</div>
