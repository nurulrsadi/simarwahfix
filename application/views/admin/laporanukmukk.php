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
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
						<tr>
							<th>No</th>
							<th>Nama Ormawa</th>
							<th>Tanggal Kegiatan selesai</th>
							<th>Tanggal Maksimal pengumpulan</th>
							<th>Pengajuan ke- </th>
							<th>Laporan Kegiatan</th>
							<th>Laporan Rincian Belanja </th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php $j=1; ?>
							<?php 
            foreach($lpjukmukk->result_array() as $i):
              $kd_ukmkk=$i['kd_ukmkk'];
              $tahunakademik=$i['tahunakademik'];
              $danaawal=$i['danaawal'];
              $danasisa=$i['danasisa'];
              $nPengajuan=$i['nPengajuan'];
              $akhirkegiatan=$i['akhirkegiatan'];
              $tglmakslaporan=$i['tglmakslaporan'];
              $laporankegiatan=$i['laporankegiatan'];
              $laporanrincianbiaya=$i['laporanrincianbiaya'];
              ?>
							<td><?= $j++; ?></td>
							<td><?= $kd_ukmkk; ?></td>
							<td><?= date("d M Y",strtotime($akhirkegiatan)); ?></td>
							<td><?= date("d M Y",strtotime($tglmakslaporan)); ?></td>
							<td class="text-center"><?= $nPengajuan; ?></td>
							<td><a href="<?=site_url().'assets/uploads/laporankegiatan/'.$laporankegiatan;'.pdf' ?>"
									onclick="basicPopup(this.href); return false"><?=$laporankegiatan?> </a></td>
							<td><a href="<?=site_url().'assets/uploads/laporanrincianbiaya/'.$laporanrincianbiaya;'.pdf' ?>"
									onclick="basicPopup(this.href); return false"><?=$laporanrincianbiaya?> </a>
							</td>
							<td class="text-center">
								<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm"
									data-toggle="modal" data-target="#modalACClaporan<?= $kd_ukmkk; ?>"><i class="fa fa-check"></i>Terima
									Laporan</button>
							</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
    foreach($lpjukmukk->result_array() as $i):
      $kd_ukmkk=$i['kd_ukmkk'];
      $nPengajuan=$i['nPengajuan'];
      $suratpengajuan=$i['suratpengajuan'];
      $rinciankegiatan=$i['rinciankegiatan'];
      $rkakl=$i['rkakl'];
      $tor=$i['tor'];
      $laporankegiatan=$i['laporankegiatan'];
      $laporanrincianbiaya=$i['laporanrincianbiaya'];
      // $fakultas=$i['parent_fakultas'];
      ?>
<div class="modal fade" id="modalACClaporan<?= $kd_ukmkk; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="<?php echo base_url('dana/updatedanhapus_ukmukk/'.$kd_ukmkk)?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Terima Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Anda yakin akan terima laporan kegiatan dari ORMAWA <?= $kd_ukmkk; ?> ?
        </div>
        <input type="hidden" id="nPengajuan" name="nPengajuan" value="<?= $nPengajuan?>">
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Terima Laporan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php endforeach;?>

<!-- pdf -->
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
