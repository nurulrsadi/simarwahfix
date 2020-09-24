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

		<?php foreach($dataacc->result_array() as $u):
          $kd_jrsn=$u['kd_jrsn'];
          $nPengajuan=$u['nPengajuan'];
          $tahunakademik=$u['tahunakademik'];
          $kd_fakultas=$u['kd_fakultas'];
          $jurusan=$u['jurusan'];
          $namaKegiatan=$u['namaKegiatan'];
          $suratpengajuan=$u['suratpengajuan'];
          $rinciankegiatan=$u['rinciankegiatan'];
          $rkakl=$u['rkakl'];
          $tor=$u['tor'];
          $danasisa=$u['danasisa'];
          $statususer=$u['statususer'];
          $nama_fakultas=$u['nama_fakultas'];
          ?>
		<form action="<?php echo base_url('dana/admin_acc_pengajuan/')?>" method="post">
			<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
			<input type="hidden" name="statususer" value="<?= $statususer?>">
			<input type="hidden" name="kd_fakultas" value="<?= $kd_fakultas?>">
			<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
			<input type="hidden" name="jurusan" value="<?= $jurusan?>">
			<input type="hidden" name="suratpengajuan" value="'./assets/uploads/suratpengajuan/'.<?= $suratpengajuan?>">
			<input type="hidden" name="rinciankegiatan" value="'./assets/uploads/rinciankegiatan/'.<?= $rinciankegiatan?>">
			<input type="hidden" name="rkakl" value="'./assets/uploads/rkakl/'.<?= $rkakl?>">
			<input type="hidden" name="tor" value="'./assets/uploads/tor/'.<?= $tor?>">

			<table style="margin:20px auto;">
				<div class="card-body">
					<div class="form-group row">
						<label for="tahunakademik" class="col-sm-2 col-form-label">Tahun Akademik</label>
						<div class="col-sm-10">
							<input type="hidden" name="kd_jrsn" value="<?php echo $kd_jrsn ?>">
							<input type="hidden" name="nPengajuan" value="<?php echo $nPengajuan ?>">
							<input type="text" readonly class="form-control-plaintext" id="tahunakademik" name="tahunakademik"
								value="<?= $tahunakademik ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="kd_fakultas" class="col-sm-2 col-form-label">Fakultas</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" id="kd_fakultas" name="kd_fakultas"
								value="<?=$nama_fakultas?> ">
						</div>
					</div>
					<div class="form-group row">
						<label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" name="jurusan" id="jurusan"
								value="<?= $jurusan ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="nPengajuan" class="col-sm-2 col-form-label">Keterangan Pengajuan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" name="nPengajuan" id="nPengajuan"
								value="Pengajuan ke-<?= $nPengajuan ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Keterangan Kegiatan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" name="namaKegiatan" id="staticEmail"
								value="<?= $namaKegiatan ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="suratpengajuan" class="col-sm-2 col-form-label">Surat Pengajuan</label>
						<div class="col-sm-10">
							<a href="<?=site_url().'assets/uploads/suratpengajuan/'.$suratpengajuan;'.pdf' ?>"
								onclick="basicPopup(this.href); return false"><?=$suratpengajuan?> </a>
						</div>
					</div>
					<div class="form-group row">
						<label for="rinciankegiatan" class="col-sm-2 col-form-label">Rincian Kegiatan</label>
						<div class="col-sm-10">
							<a href="<?=site_url().'assets/uploads/rinciankegiatan/'.$rinciankegiatan;'.pdf' ?>" target=_blank
								name="rinciankegiatan" id="rinciankegiatan">
								<?=$rinciankegiatan?> </a>
						</div>
					</div>
					<div class="form-group row">
						<label for="rkakl" class="col-sm-2 col-form-label">Surat RKA-KL</label>
						<div class="col-sm-10">
							<a href="<?=base_url().'assets/uploads/rkakl/'.$rkakl;'.pdf' ?>" target=_blank name="rkakl">
								<?=$rkakl?> </a>
						</div>
					</div>
					<div class="form-group row">
						<label for="tor" class="col-sm-2 col-form-label">Surat RKA-KL</label>
						<div class="col-sm-10">

							<a href="<?=site_url().'assets/uploads/tor/'.$tor; '.pdf'?>" target=_blank>
								<?=$tor?> </a>
						</div>
					</div>
					<div class="form-group row">
						<label for="danasisa" class="col-sm-2 col-form-label">Dana Sisa Pagu Anggaran</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" name="danasisanya" id="danasisa"
								value="Rp <?= number_format($danasisa,0,',','.') ?>">
							<input type="hidden" name=danasisa value="<?= $danasisa?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="danaminus" class="col-sm-2 col-form-label">Dana Pagu Anggaran Yang di Acc </label>
						<div class="col-sm-10">
							<input type="number" step="0" name="danaminus" id="danaminus" placeholder="Rp. ">
							<small class="text-decoration" style="color:red">contoh : 2000000</small>
						</div>
					</div>
					<a href="<?= base_url('/c_admin/Cek_Pagu'); ?>"
						class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> Kembali</a>
					<!-- <a href="<?= base_url('c_admin/Cek_Data_Pengajuan/Tidak_ACC/'.$kd_jrsn)?>" class=" d-none d-lg-inline-block btn
						btn-sm btn-danger shadow-lg">Tidak
						Acc</a> -->
					<button type=button class="d-none d-lg-inline-block btn btn-sm btn-danger shadow-lg" data-toggle="modal"
						data-target="#modalalasan<?php echo $kd_jrsn;?>">
						Tidak Acc</button>
					<button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"
						onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i class="fa fa-check"></i> Setuju</button>
				</div>
	</div>
	</form>
</div>
<?php endforeach; ?>

<!-- modal -->
<?php foreach($dataacc->result_array() as $u):
          $kd_jrsn=$u['kd_jrsn'];
          $suratpengajuan=$u['suratpengajuan'];
          $nPengajuan=$u['nPengajuan'];
          $danasisa=$u['danasisa'];
          ?>
<div class="modal fade" id="modalalasan<?php echo $kd_jrsn;?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Alasan Menolak</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url().'c_admin/tolak_pengajuan'?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Pengaju</t></label>
						</t><input type="text" name="kd_jrsn" class="form-control" value="<?php echo $kd_jrsn;?>" required readonly>
						<input type="hidden" name=danasisa value="<?= $danasisa?>">
					</div>
					<div class="form-group ">
						<label>Alasan Menolak</t></label>
						</t><input type="text" name="pesangagal" class="form-control"
							placeholder="Data kurang lengkap, silahkan perbaiki dahulu!" required>
					</div>
					<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<!-- endmodal -->

<? 
$pathfile = 'assets/uploads/suratpengajuan/'.$suratpengajuan; 
// Header content type 
header('Content-type: application/pdf'); 
header('Content-Disposition: inline; filename="' . $pathfile . '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
// Read the file 
@readfile($pathfile); 
?>

<script>
	// javascript for open file
	function basicPopup(url) {
		popupWindow = window.open(url, 'popupWindow',
			'height=300,width=700,left=50, top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=yes,status=yes,download=no'
		)
	}

</script>
<!-- spj -->
<script>
	function renderPDF(url, canvasContainer, options) {

		options = options || {
			scale: 1
		};

		function renderPage(page) {
			var viewport = page.getViewport(options.scale);
			var wrapper = document.createElement("div");
			wrapper.className = "canvas-wrapper";
			var canvas = document.createElement('canvas');
			var ctx = canvas.getContext('2d');
			var renderContext = {
				canvasContext: ctx,
				viewport: viewport
			};

			canvas.height = viewport.height;
			canvas.width = viewport.width;
			wrapper.appendChild(canvas)
			canvasContainer.appendChild(wrapper);

			page.render(renderContext);
		}

		function renderPages(pdfDoc) {
			for (var num = 1; num <= pdfDoc.numPages; num++)
				pdfDoc.getPage(num).then(renderPage);
		}

		PDFJS.disableWorker = true;
		PDFJS.getDocument(url).then(renderPages);

	}


	renderPDF('<?=site_url().'
		assets / uploads / suratpengajuan / '.$suratpengajuan;'.pdf '?>', document.getElementById('<?=$suratpengajuan ?>')
	); <

</script>
