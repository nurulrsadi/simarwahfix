</header>

<!-- modal for information at header -->

<!-- Content -->
<section>
	<header class="main">

	</header>
  <?php if( $user['statususer'] ==5 ):?>
	<div class="features">

		<article>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/default/cekfile.png')?>" class="img-fluid" alt="Responsive image"
					width="100%">
			</div>
		</article>
		<article>
			<div class="content">
				<p class="customtextcheckdana">Laporan kegiatan anda sedang kami cek,
					<br>silahkan
					tunggu verifikasi agar dapat melakukan pengajuan dana selanjutnya.</p>
			</div>
		</article>
	</div>
	<?php elseif( $this->session->userdata('role') ==0 && $user['statususer'] ==1):?>
<center>
  <h2>HEI!</h2>
	<p>
		<h4>Silahkan update profile untuk dapat meakses menu ini</h4>
	</p><br>
</center>
<?php elseif( $this->session->userdata('role') ==2 && $user['statususer'] ==1 ):?>
<center>
  <h2>HEI!</h2>
	<p>
		<h4>Silahkan update profile untuk dapat meakses menu ini</h4>
	</p><br>
</center>
<?php else: ?>
<center>
  <h2>Terima kasih telah melakukan update profile!</h2>
	<p>
		<h4>Silahkan melakukan logout dan login kembali untuk meakses menu ini</h4>
	</p><br>
</center>
<?php endif;?>
</section>
</div>
</div>
