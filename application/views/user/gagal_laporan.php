</header>

<!-- modal for information at header -->

<!-- Content -->
<section>
	<header class="main">

	</header>
  <?php if( $user['statususer'] ==7 ):?>
	<div class="features">

		<article>
			<!-- <span class="icon fa-gem"></span> -->
			<div class="content">
				<img src="<?php echo base_url('assets/img/default/failed.png')?>" class="img-fluid" alt="Responsive image"
					width="100%">
			</div>
		</article>
		<article>
			<div class="content">
				<p class="customtextcheckdana">Laporan Kegiatan yang anda kirim tidak kami terima,
					<br>hal ini dikarenakan 
					bla bla bla</p>
			</div>
		</article>
	</div>
<?php else: ?>
<?php endif;?>

</section>
</div>
</div>
