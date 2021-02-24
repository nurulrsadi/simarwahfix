</header>

<!-- modal for information at header -->

<!-- Content -->
<section>
	<header class="main">

	</header>
  
	<div class="features">

		<article>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/default/failed.png')?>" class="img-fluid" alt="Responsive image"
					width="100%">
			</div>
		</article>
		<article>
			<!-- untuk jurusan -->
			<?php if( $this->session->userdata('user_login')!='DEMAU' && $this->session->userdata('user_login')!='SEMAU' && $user['statususer'] ==7 && $this->session->userdata('role') == 0):?>
				<?php foreach($alasan_ditolak_fklts->result_array() as $i):
						$alasan_ditolak=$i['alasan_gagal_laporan'];
						$statususer=$i['statususer'];
						$kd_jrsn=$i['kd_jrsn'];
						$id_pengajuan=$i['id_pengajuan'];
						$akhirkegiatan=$i['akhirkegiatan'];
						$tglmakslaporan=$i['tglmakslaporan'];
						$namakegiatan=$i['namaKegiatan'];
						$danaawal=$i['danaawal'];
						$danasisa=$i['danasisa'];
						$danaacc=$i['danaacc'];
						$suratpengajuan=$i['suratpengajuan'];
						$rinciankegiatan=$i['rinciankegiatan'];
						$rkakl=$i['rkakl'];
						$tor=$i['tor'];
						$delete_laporan=$i['laporankegiatan'];
						$delet_rincianbiaya=$i['laporanrincianbiaya'];
						$nPengajuan=$i['nPengajuan'];
						$tahunakademik=$i['tahunakademik'];
						$kd_fakultas=$i['kd_fakultas'];
					?>
						<form action="<?php echo base_url().'history/simpan_gagal_laporan_fak' ?>" method="post">
							<div class="content">
								<p class="customtextcheckdana">Laporan kegiatan yang anda kirimkan tidak kami terima,
									<br><?= $alasan_ditolak?></p>
							</div>
							<br><br>
							<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
							<input type="hidden" name="id_pengajuan" value="<?= $id_pengajuan?>">
							<input type="hidden" name="akhirkegiatan" value="<?= $akhirkegiatan?>">
							<input type="hidden" name="tglmakslaporan" value="<?= $tglmakslaporan?>">
							<input type="hidden" name="namakegiatan" value="<?= $namakegiatan?>">
							<input type="hidden" name="danaawal" value="<?= $danaawal?>">
							<input type="hidden" name="danasisa" value="<?= $danasisa?>">
							<input type="hidden" name="danaacc" value="<?= $danaacc?>">
							<input type="hidden" name="suratpengajuan" value="<?= $suratpengajuan?>">
							<input type="hidden" name="rinciankegiatan" value="<?= $rinciankegiatan?>">
							<input type="hidden" name="rkakl" value="<?= $rkakl?>">
							<input type="hidden" name="tor" value="<?= $tor?>">
							<input type="hidden" name="kd_fakultas" value="<?= $kd_fakultas?>">
							<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
							<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
							<!-- <input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>"> -->
								<button type="submit" class="button primary" style="background-color:royalblue;">
									Ulangi Laporan Kegiatan
								</button>
						</form>
						</article>
					</div>
				<?php endforeach;?>
			<!-- untuk univ -->
			<?php elseif( ($this->session->userdata('user_login')=='DEMAU' || $this->session->userdata('user_login')=='SEMAU') && $user['statususer'] ==7 && $this->session->userdata('role') == 0):?>
				<?php foreach($alasan_ditolak_fklts->result_array() as $i):
						$alasan_ditolak=$i['alasan_gagal_laporan'];
						$statususer=$i['statususer'];
						$kd_jrsn=$i['kd_jrsn'];
						$id_pengajuan=$i['id_pengajuan'];
						$akhirkegiatan=$i['akhirkegiatan'];
						$tglmakslaporan=$i['tglmakslaporan'];
						$namakegiatan=$i['namaKegiatan'];
						$danaawal=$i['danaawal'];
						$danasisa=$i['danasisa'];
						$danaacc=$i['danaacc'];
						$suratpengajuan=$i['suratpengajuan'];
						$rinciankegiatan=$i['rinciankegiatan'];
						$rkakl=$i['rkakl'];
						$tor=$i['tor'];
						$nPengajuan=$i['nPengajuan'];
						$tahunakademik=$i['tahunakademik'];
					?>
						<form action="<?php echo base_url().'history/simpan_gagal_laporan_univ' ?>" method="post">
							<div class="content">
								<p class="customtextcheckdana">Laporan kegiatan yang anda kirimkan tidak kami terimaaa,
									<br><?= $alasan_ditolak?></p>
							</div>
							<br><br>
							<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
							<input type="hidden" name="id_pengajuan" value="<?= $id_pengajuan?>">
							<input type="hidden" name="akhirkegiatan" value="<?= $akhirkegiatan?>">
							<input type="hidden" name="tglmakslaporan" value="<?= $tglmakslaporan?>">
							<input type="hidden" name="namakegiatan" value="<?= $namakegiatan?>">
							<input type="hidden" name="danaawal" value="<?= $danaawal?>">
							<input type="hidden" name="danasisa" value="<?= $danasisa?>">
							<input type="hidden" name="danaacc" value="<?= $danaacc?>">
							<input type="hidden" name="suratpengajuan" value="<?= $suratpengajuan?>">
							<input type="hidden" name="rinciankegiatan" value="<?= $rinciankegiatan?>">
							<input type="hidden" name="rkakl" value="<?= $rkakl?>">
							<input type="hidden" name="tor" value="<?= $tor?>">
							<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
							<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
								<button type="submit" class="button primary" style="background-color:royalblue;">
									Ulangi Laporan Kegiatan
								</button>
						</form>
						</article>
					</div>
				<?php endforeach;?>
			<?php elseif( $this->session->userdata('role') == 2 && $user['statususer'] ==7):?>
				<?php foreach($alasan_ditolak_ukmukk->result_array() as $i):
						$alasan_ditolak=$i['alasan_gagal_laporan'];
						$statususer=$i['statususer'];
						$kd_ukmkk=$i['kd_ukmkk'];
						$id_pengajuan_ukmukk=$i['id_pengajuan_ukmukk'];
						$akhirkegiatan=$i['akhirkegiatan'];
						$tglmakslaporan=$i['tglmakslaporan'];
						$namakegiatan=$i['namaKegiatan'];
						$danaawal=$i['danaawal'];
						$danasisa=$i['danasisa'];
						$danaacc=$i['danaacc'];
						$suratpengajuan=$i['suratpengajuan'];
						$rinciankegiatan=$i['rinciankegiatan'];
						$rkakl=$i['rkakl'];
						$tor=$i['tor'];
						$nPengajuan=$i['nPengajuan'];
						$tahunakademik=$i['tahunakademik'];
					?>
						<form action="<?php echo base_url().'history/simpan_gagal_laporan_ukmukk' ?>" method="post">	
							<div class="content">
								<p class="customtextcheckdana">Laporan kegiatan yang anda kirimkan tidak kami terima,
									<br><?= $alasan_ditolak?> </p>
								<br><br>
							<input type="hidden" name="kd_ukmkk" value="<?= $kd_ukmkk?>">
							<input type="hidden" name="id_pengajuan_ukmukk" value="<?= $id_pengajuan_ukmukk?>">
							<input type="hidden" name="akhirkegiatan" value="<?= $akhirkegiatan?>">
							<input type="hidden" name="tglmakslaporan" value="<?= $tglmakslaporan?>">
							<input type="hidden" name="namakegiatan" value="<?= $namakegiatan?>">
							<input type="hidden" name="danaawal" value="<?= $danaawal?>">
							<input type="hidden" name="danasisa" value="<?= $danasisa?>">
							<input type="hidden" name="danaacc" value="<?= $danaacc?>">
							<input type="hidden" name="suratpengajuan" value="<?= $suratpengajuan?>">
							<input type="hidden" name="rinciankegiatan" value="<?= $rinciankegiatan?>">
							<input type="hidden" name="rkakl" value="<?= $rkakl?>">
							<input type="hidden" name="tor" value="<?= $tor?>">
							<input type="hidden" name="nPengajuan" value="<?= $nPengajuan?>">
							<input type="hidden" name="tahunakademik" value="<?= $tahunakademik?>">
							</div>
								<button type="submit" class="button primary" style="background-color:royalblue;">
									Ulangi Laporan Kegiatan
								</button>
						</form>
						</article>
					</div>
				<?php endforeach;?>
<?php else: ?>
<?php endif;?>

</section>
</div>
</div>
