<!-- https://www.malasngoding.com/membuat-crud-dengan-codeigniter-update-data/ -->
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
		<?php foreach($dataacc as $u){ ?>
		<form action="<?php echo base_url(). 'dana/admin_acc_pengajuan'; ?>" method="post">
			<table style="margin:20px auto;">
				<div class="card-body">
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Tahun Akademik</label>
						<div class="col-sm-10">
							<input type="hidden" name="id" value="<?php echo $u->kd_jrsn ?>">
							<input type="text" readonly class="form-control-plaintext" id="staticEmail"
								value="<?= $u->tahunakademik ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Fakultas</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=$u->kd_fklts?> ">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Jurusan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $u->jurusan ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Keterangan Pengajuan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" id="staticEmail"
								value="Pengajuan ke-<?= $u->nPengajuan ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Keterangan Kegiatan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" id="staticEmail"
								value="<?= $u->namaKegiatan ?>">
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
							<input type="text" readonly class="form-control-plaintext" id="staticEmail"
								value="Rp. <?= $u->danasisa ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="danakurang" class="col-sm-2 col-form-label">Dana Pagu Anggaran Yang di Acc </label>
						<div class="col-sm-10">
							<input type="text" name="danaminus" id="danakurang" placeholder="Rp. ">
							<small class="text-decoration" style="color:red">contoh : 2000000</small>
						</div>
					</div>
					<a href="<?= base_url('/c_admin/Cek_Pagu'); ?>"
						class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> Kembali</a>
					<button type=button class="d-none d-lg-inline-block btn btn-sm btn-danger shadow-lg" data-toggle="modal"
						data-target="#exampleModal" data-whatever="<?= $u->kd_jrsn ?>">Tidak Acc</button>
					<!-- <button type="button" class="d-none d-lg-inline-block btn btn-sm btn-danger shadow-lg" data-toggle="modal"
						data-target="#exampleModal">
						Tidak Acc</button> -->
					<button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
						onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</button>
				</div>
	</div>
	</form>
</div>
<!-- modal -->
<form action="<?php echo base_url(). 'dana/admin_gagal_acc_pengajuan'; ?>" method="post">
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tidak ACC Pengajuan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="kd_jrsn" class="col-form-label">Pengaju:</label>
							<input type="text" class="form-control" id="kd_jrsn" value=<?=$u->kd_jrsn?> readonly>
						</div>
						<div class="form-group">
							<label for="pesangagal" class="col-form-label">Alasan Tidak ACC:</label>
							<textarea class="form-control" id="pesangagal" required></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send message</button>
				</div>
			</div>
		</div>
	</div>
</form>


<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('New message to ' + recipient)
		modal.find('.modal-body input').val(recipient)
	})

</script>
<?php } ?>
