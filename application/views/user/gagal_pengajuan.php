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
			<?php if( $user['statususer'] ==6 && $this->session->userdata('role') == 0):?>
				<?php foreach($alasan_ditolak_fklts->result_array() as $i):
						$alsan_ditolak=$i['alasan_gagal_pengajuan'];
						$statususer=$i['statususer'];
						$kd_jrsn=$i['kd_jrsn'];
					?>
						<form action="<?php echo base_url().'history/simpan_gagal_pengajuan_fak' ?>" method="post">
							<div class="content">
								<p class="customtextcheckdana">Pengajuan Anggaran yang anda ajukan tidak kami terima,
									<br><?= $alsan_ditolak?> </p>
							</div>
							<br><br>
							<input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>">
							<!-- <input type="hidden" name="kd_jrsn" value="<?= $kd_jrsn?>"> -->
								<button type="submit" class="button primary" style="background-color:royalblue;">
									Ulangi Pengajuan Anggaran
								</button>
						</form>
						</article>
					</div>
				<?php endforeach;?>
			<?php elseif( $user['statususer'] ==6 && $this->session->userdata('role') == 2):?>
				<?php foreach($alasan_ditolak_ukmukk->result_array() as $i):
						$alsan_ditolak=$i['alasan_gagal_pengajuan'];
						$statususer=$i['statususer'];
						$kd_ukmukk=$i['kd_ukmukk'];
					?>
						<form action="<?php echo base_url().'history/simpan_gagal_pengajuan_ukmukk' ?>" method="post">	
							<div class="content">
								<p class="customtextcheckdana">Pengajuan Anggaran yang anda ajukan tidak kami terima,
									<br><?= $alsan_ditolak?> </p>
								<br><br>
							</div>
								<button type="submit" class="button primary">
									Sewa Aula SC
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
