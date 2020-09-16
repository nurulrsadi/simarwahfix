<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html>

<head>
	<title> Laporan Kegiatan</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/usermain.css')?>" />


	<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')?>"></script>


</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner section-padding wow fadeInUp delay-05s animated"
				style="visibility: visible;animation-name: fadeInUp;">
				<!-- Header -->
				<header id="header">
					<a href="" class="logo"><strong>SIMARWAH</strong> Laporan Kegiatan</a>
					<a href="#" class="gambarsendiri"><img src="<?php echo base_url('assets/img/avatar2.jpg')?>" class="rounded-circle" alt=""
							width="10%" height="100%"></a>
					<!-- <ul class="icons"> -->
					<!-- <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li> -->


					<!-- </ul> -->
				</header>

				<!-- Content -->
				<section>
					<header class="main">
						<h1>Laporan Kegiatan</h1>
					</header>

					<!-- <span class="image main"><img src="images/pic11.jpg" alt="gambar tata cara pengajuan anggaran biaya" /></span> -->
					<h2>Laporan Kegiatan</h2>

					<p>
						<form>
							<div class="form-group">
								<label for="exampleFormControlFile1">Kirim Laporan Kegiatan Anda</label>
								<input type="file" class="form-control-file" id="exampleFormControlFile1">
							</div>
						</form>
					</p>
					<!-- <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum sit amet, fergiat. Pellentesque in mi eu massa lacinia malesuada et a elit. Donec urna ex, lacinia in purus ac, pretium pulvinar mauris. Curabitur sapien risus, commodo eget turpis at, elementum convallis elit. Pellentesque enim turpis, hendrerit.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus, vel sed vehicula.</p>
                                <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum sit amet, fersapien risus, commodo eget turpis at, elementum convallis elit. Pellentesque enim turpis, hendrerit tristique lorem ipsum dolor.</p> -->

					<hr class="major" />

					<h2>Rincian Anggaran Kegiatan . . . .</h2>

					<h3>Tahun Kegiatan : </h3>
					<div class="table-responsive-sm">
						<table class="table table-bordered table-dark">
							<thead>
								<div class="tabel-hijau">
									<tr>
										<th scope="col">Kode</th>
										<th scope="col">Uraian SubOutput/Komponen/SubKomponen/detil</th>
										<th scope="col">Volume Sub Output</th>
										<th scope="col">Jumlah Komponen</th>
										<th scope="col" colspan="2">Rincian Perhitungan</th>
										<th scope="col">Harga Satuan</th>
										<th scope="col">Jumlah</th>
									</tr>
									<tr>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col">jml</th>
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</div>
								<tr>
									<th scope="col">1</th>
									<th scope="col">2</th>
									<th scope="col">3</th>
									<th scope="col">4</th>
									<th scope="col" colspan="2">5</th>
									<th scope="col">6</th>
									<th scope="col">7</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">025,04,07</th>
									<td>Program Pendidikan Islam</td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>

								</tr>
								<tr>
									<th scope="row">2132</th>
									<td>PENINGKATAN AKSES MUTU, RELEVASI, DAN DAYA SAING PENDIDIKAN TINGGI KEAGAMAAN
										ISLAM</td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> <span>Total Harga</span>Total </td>
								</tr>
								<tr>
									<th scope="row">2132</th>
									<td>PENINGKATAN AKSES MUTU, RELEVASI, DAN DAYA SAING PENDIDIKAN TINGGI KEAGAMAAN
										ISLAM</td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> <span>Total Harga</span>Total </td>
								</tr>
								</tr>
							</tbody>
						</table>

					</div>

					<hr class="major" />

					<h2>Magna etiam veroeros</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class
						aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam
						tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc
						ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non,
						bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus.
						Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In
						non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus, vel sed vehicula.
					</p>
					<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor
						imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet.
						Pellentesque leo mauris, consectetur id ipsum sit amet, fersapien risus, commodo eget turpis at,
						elementum convallis elit. Pellentesque enim turpis, hendrerit tristique lorem ipsum dolor.</p>

					<hr class="major" />

					<h2>Lorem aliquam bibendum</h2>
					<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque
						venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim
						auctor sit amet. Pellentesque leo mauris, consectetur id ipsum sit amet, fergiat. Pellentesque
						in mi eu massa lacinia malesuada et a elit. Donec urna ex, lacinia in purus ac, pretium pulvinar
						mauris. Curabitur sapien risus, commodo eget turpis at, elementum convallis elit. Pellentesque
						enim turpis, hendrerit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class
						aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam
						tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc
						ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non,
						bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus.
						Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In
						non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus, vel sed vehicula.
					</p>

				</section>

			</div>
		</div>

		<!-- Sidebar -->
		<div id="sidebar">
			<div class="inner">

				<!-- Search -->
				<section id="search" class="alt">
					<h2><strong>Selamat datang !</strong> </h2>
					<!-- <form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form> -->

				</section>

				<!-- Menu -->
				<nav id="menu">
					<header class="major">
						<h2>Menu</h2>
					</header>
					<ul>
						<li><a href="index.html">Edit Profil</a></li>
						<li><a href="pengajuanrab.html">Laporan Kegiatan</a></li>
						<li><a href="<?php echo base_url().'c_home/pinjamaula';?>">Peminjaman Aula SC</a></li>
						<li><a href="<?php echo base_url().'c_home/index';?>">Log Out</a></li>
						<!-- <li>
											<span class="opener">Submenu</span>
											<ul>
												<li><a href="#">Lorem Dolor</a></li>
												<li><a href="#">Ipsum Adipiscing</a></li>
												<li><a href="#">Tempus Magna</a></li>
												<li><a href="#">Feugiat Veroeros</a></li>
											</ul>
										</li>
										
										<li><a href="#">Adipiscing</a></li>
										<li>
											<span class="opener">Another Submenu</span>
											<ul>
												<li><a href="#">Lorem Dolor</a></li>
												<li><a href="#">Ipsum Adipiscing</a></li>
												<li><a href="#">Tempus Magna</a></li>
												<li><a href="#">Feugiat Veroeros</a></li>
											</ul>
										</li>
										<li><a href="#">Maximus Erat</a></li>
										<li><a href="#">Sapien Mauris</a></li>
										<li><a href="#">Amet Lacinia</a></li>  -->
					</ul>
				</nav>

				<!-- Section -->
				<!-- <section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section> -->

				<!-- Section -->
				<!-- <section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
										<li class="icon solid fa-phone">(000) 000-0000</li>
										<li class="icon solid fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section> -->

				<!-- Footer -->
				<footer id="footer">
					<p class="copyright">Jika Anda mengalami kesulitan, silahkan klik <a href="keluhan.html">disini</a>.
					</p>
				</footer>

			</div>
		</div>

	</div>

	<!-- Scripts -->
	<script src="<?php echo base_url('assets/js/userjquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/userbrowser.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/userbreakpoints.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/userutil.js')?>"></script>
	<script src="<?php echo base_url('assets/js/usermain.js')?>"></script>

</body>

</html>