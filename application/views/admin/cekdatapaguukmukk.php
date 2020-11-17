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

		<?php foreach($dataukmukk->result_array() as $u):
					$id_pengajuan_ukmuk=$u['id_pengajuan_ukmukk'];
					$kd_ukmkk=$u['kd_ukmkk'];
          $nPengajuan=$u['nPengajuan'];
          $tahunakademik=$u['tahunakademik'];
          $namaKegiatan=$u['namaKegiatan'];
          $suratpengajuan=$u['suratpengajuan'];
          $rinciankegiatan=$u['rinciankegiatan'];
          $rkakl=$u['rkakl'];
          $tor=$u['tor'];
          $danasisa=$u['danasisa'];
          $statususer=$u['statususer'];
          // $nama_fakultas=$u['nama_fakultas'];
          ?>
    <?php foreach($user->result_array() as $j):
		$nama=$j['nama_ukmukk'];
			?>
		<form class="pengajuan" data-flag="0" action="<?php echo base_url('dana/admin_acc_pengajuan_ukmukk/')?>" method="post" id="formpengajuan">
			<input type="hidden" id="kd_ukmkk" name="kd_ukmkk" value="<?= $kd_ukmkk?>">
			<input type="hidden" id="id_pengajuan_ukmukk" name="id_pengajuan_ukmukk" value="<?= $id_pengajuan_ukmukk?>">
			<input type="hidden" id="statususer" name="statususer" value="<?= $statususer?>">
			<input type="hidden" id="tahunakademik" name="tahunakademik" value="<?= $tahunakademik?>">
			<input type="hidden" name="suratpengajuan" value="'./assets/uploads/suratpengajuan/'.<?= $suratpengajuan?>">
			<input type="hidden" name="rinciankegiatan" value="'./assets/uploads/rinciankegiatan/'.<?= $rinciankegiatan?>">
			<input type="hidden" name="rkakl" value="'./assets/uploads/rkakl/'.<?= $rkakl?>">
			<input type="hidden" name="tor" value="'./assets/uploads/tor/'.<?= $tor?>">

			<table style="margin:20px auto;">
				<div class="card-body">
					<div class="form-group row">
						<label for="tahunakademik" class="col-sm-2 col-form-label">Tahun Akademik</label>
						<div class="col-sm-10">
							<input type="hidden" name="kd_ukmkk" value="<?php echo $kd_ukmkk ?>">
							<input type="hidden" name="nPengajuan" value="<?php echo $nPengajuan ?>">
							<input type="text" readonly class="form-control-plaintext" id="tahunakademik" name="tahunakademik"
								value="<?= $tahunakademik ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" value="<?= $nama;?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="nPengajuan" class="col-sm-2 col-form-label">Keterangan Pengajuan</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" name="nPengajuan" id="nPengajuan"
								value="Pengajuan ke-<?= $nPengajuan ?>">
							<input type="hidden" id="nPengajuan" name="nPengajuan" value="<?= $nPengajuan?>">
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
							<a href="<?=site_url().'assets/uploads/rinciankegiatan/'.$rinciankegiatan;'.pdf' ?>"
								onclick="basicPopup(this.href); return false"><?=$rinciankegiatan?> </a>
						</div>
					</div>
					<div class="form-group row">
						<label for="rkakl" class="col-sm-2 col-form-label">Surat RKA-KL</label>
						<div class="col-sm-10">
							<a href="<?=site_url().'assets/uploads/rkakl/'.$rkakl;'.pdf' ?>"
								onclick="basicPopup(this.href); return false"><?=$rkakl?> </a>
						</div>
					</div>
					<div class="form-group row">
						<label for="tor" class="col-sm-2 col-form-label">Surat TOR</label>
						<div class="col-sm-10">
							<a href="<?=site_url().'assets/uploads/tor/'.$tor;'.pdf' ?>"
								onclick="basicPopup(this.href); return false"><?=$tor?> </a>
							<!-- <embed src="<?=base_url().'assets/uploads/tor/'.$tor; ?>" type="application/pdf" width="100%"
								height="700px">
							<?=$tor?> </embed> -->
						</div>
					</div>
					<div class="form-group row">
						<label for="danasisa" class="col-sm-2 col-form-label">Dana Sisa Pagu Anggaran</label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control-plaintext" name="danasisanya" id="danasisa"
								value="Rp <?= number_format($danasisa,0,',','.') ?>">
							<input type="hidden" name=danasisa id="danasisa" value="<?= $danasisa?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="danaminus" class="col-sm-2 col-form-label">Dana Pagu Anggaran Yang di Acc </label>
						<div class="col-sm-10">
							<input type="number" step="0" name="danaminus" id="danaminus" placeholder="Rp. ">
							<small class="text-decoration" style="color:red">contoh : 2000000</small>
						</div>
					</div>
					<a href="<?= base_url('/c_admin/Cek_Pengajuan_UKMUKK'); ?>"
						class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> Kembali</a>
					<!-- <a href="<?= base_url('c_admin/Cek_Data_Pengajuan/Tidak_ACC/'.$kd_ukmkk)?>" class=" d-none d-lg-inline-block btn
						btn-sm btn-danger shadow-lg">Tidak
						Acc</a> -->
					<button type=button class="d-none d-lg-inline-block btn btn-sm btn-danger shadow-lg" data-toggle="modal"
						data-target="#modalalasan<?php echo $kd_ukmkk;?>">
						Tidak Acc</button>
					<button type="submit"  id="btn-submit"
						class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm tombol-yakin">  Acc</butto>
				</div>
	</div>
	</form>
</div>
<?php endforeach; ?>

<!-- modal -->
<?php foreach($dataukmukk->result_array() as $u):
          $kd_ukmkk=$u['kd_ukmkk'];
          $suratpengajuan=$u['suratpengajuan'];
          $nPengajuan=$u['nPengajuan'];
					$danasisa=$u['danasisa'];
					$id_pengajuan_ukmukk=$u['id_pengajuan_ukmukk'];
          ?>
<div class="modal fade" id="modalalasan<?php echo $kd_ukmkk;?>" tabindex="-1" role="dialog"
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
				<form method="post" action="<?php echo base_url().'c_admin/tolak_pengajuan_ukmukk'?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Pengaju</t></label>
						</t><input type="text" name="kd_ukmkk" class="form-control" value="<?php echo $kd_ukmkk;?>" required readonly>
						<input type="hidden" name=danasisa value="<?= $danasisa?>">
					</div>
					<div class="form-group ">
						<label>Alasan Menolak</t></label>
						</t><input type="text" name="pesangagal" class="form-control"
							placeholder="Data kurang lengkap, silahkan perbaiki dahulu!" required>
					</div>
					<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
					<input type="hidden" name="id_pengajuan_ukmukk" value="<?= $id_pengajuan_ukmukk?>">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php endforeach;?>
<!-- endmodal -->

<script>
	// javascript for open file
	function basicPopup(url) {
		popupWindow = window.open(url, 'popupWindow',
			'height=300,width=700,left=50, top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=yes,status=yes,download=no'
		)
	}

</script>
<!-- spj -->
<!-- 
<script type="text/javascript">
$('.tombol-yakin').on('click',function(e){
  var kd_ukmkk = $('#kd_ukmkk').val()
  var statususer = $('#statususer').val()
  var kd_fakultas = $('#kd_fakultas').val()
  var tahunakademik = $('#tahunakademik').val()
  var jurusan = $('#jurusan').val()
  var danaminus = $('#danaminus').val()
  var danasisa = $('#danasisa').val()


  e.preventDefault();
  var form = "dana/admin_acc_pengajuan.php"
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then(cekdata => {
    if (cekdata) {
      // if CONFIRMED => go to delete url
      $.ajax({
        type: "POST",
        url : "<?= base_url('dana/admin_acc_pengajuan'); ?>"
        data :{
          kd_ukmkk : kd_ukmkk,
          statususer : statususer,
          kd_fakultas : kd_fakultas,
          tahunakademik : tahunakademik,
          jurusan : jurusan,
          danaminus : danaminus,
          danasisa: danasisa
        }
      })
    }
  });
});
</script> -->
                                      