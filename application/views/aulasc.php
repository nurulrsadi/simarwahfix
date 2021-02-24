<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMARWAH</title>
	<meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
	<meta name="keywords"
		content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

	<link rel="stylesheet" type="text/css"
		href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahjquery.bxslider.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahfont-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahbootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahanimate.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahstyle.css')?>">
	<!-- =======================================================
    Theme Name: Baker
    Theme URL: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
	<div>
		<nav class="navbar navbar-defaulta navbar-fixed-top" style="margin: 10px;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">SI<span class="logo-dec">MARWAH</span></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<?php if($this->session->userdata('status') == "login"){?>
						<li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
						
						<li class="active"><a href="<?php echo base_url().'c_home/aulasc';?>">Peminjaman Aula SC</a></li>
						<?php } else {?>
						<?php } ?>

						<?php if($this->session->userdata('status') == "login"){?>

						<li class=""><a href="<?php echo base_url().'data/logout';?>">LOG OUT</a></li>
						<?php } else {?>
						<li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
						
						<li class="active"><a href="<?php echo base_url().'c_home/aulasc';?>">Peminjaman Aula SC</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<section id="aulasc" class="section-padding wow fadeInUp delay-05s">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center" style="margin-top: 50px;">
					<h2 class="service-title pad-bt15">Peminjaman Aula Student Center</h2>
					<p class="sub-title pad-bt15">Aula yang terletak di Lt.1 Student Center biasa digunakan untuk
						kegiatan
						mahasiswa.</p>
					<hr class="bottom-line">
				</div>
				<div id="calendar" style="max-width: 800px;margin: 2rem auto;padding: 0 5px">

					<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
					<script type="text/javascript"
						src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.0-alpha.4/plugins/gcal.js">
					</script>
					<link href="<?= base_url().'assets/js/fullcalendarjs/main.min.css'?>" rel="stylesheet"
						type="text/css">
					<script src="<?= base_url().'assets/js/fullcalendarjs/main.js' ?>" type="text/javascript" />
					</script>
					<script src="<?= base_url().'assets/js/fullcalendarjs/locales-all.js' ?>" type="text/javascript">
					</script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
						integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
						crossorigin="anonymous"></script>

					<script>
						document.addEventListener('DOMContentLoaded', function () {
							var initialLocaleCode = 'id';
							var localeSelectorEl = document.getElementById('locale-selector');
							var calendarEl = document.getElementById('calendar');
							var calendar = new FullCalendar.Calendar(calendarEl, {
								headerToolbar: {
									left: 'prev,next today',
									center: 'title',
									right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
								},
								// startEditable:true,
								allDayDefault: true,
								locale: initialLocaleCode,
								buttonIcons: false, // show the prev/next text
								weekNumbers: true,
								navLinks: true, // can click day/week names to navigate views
								editable: true,
								dayMaxEvents: true, // allow "more" link when too many events
								eventSources: [{
									url: "<?php echo base_url('ormawa/getEvents');?>"
								}]
							});

							calendar.getEventSources();
							calendar.render();

							// build the locale selector's options
							calendar.getAvailableLocaleCodes().forEach(function (localeCode) {
								var optionEl = document.createElement('option');
								optionEl.value = localeCode;
								optionEl.selected = localeCode == initialLocaleCode;
								optionEl.innerText = localeCode;
								localeSelectorEl.appendChild(optionEl);
							});

							// when the selected option changes, dynamically change the calendar option
							localeSelectorEl.addEventListener('change', function () {
								if (this.value) {
									calendar.setOption('locale', this.value);
								}
							});
						});

					</script>
				</div>
				<div class="col-4 col-12-medium">
					<b>Keterangan</b>
					<br><br>
					<div class="ket" style="display:flex;">
						<div class="boxaulaA"
							style="padding-top:5px;width:20px;height:20px;background:#0000ff; display:flex; padding-right:5px;">
						</div>
						&nbsp;&nbsp;&nbsp;Aula A
					</div>
					<br>
					<div class="ket" style="display:flex;">
						<div class="boxaulaA" style="width:20px;height:20px;background:#800080; display:flex;"></div>
						&nbsp;&nbsp;&nbsp;Aula B
					</div>
				</div>

			</div>
		</div>
	</section>
	<footer>
		<div class="footer" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="<?php echo base_url('assets/img/uinlogo.png')?>"
							style="width:110px;height:160px; margin: auto;">
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<h3 style="font-size: 30px;">SI<span class="logo-dec">MARWAH</span></h3>
						<ul>
							<li><a href="https://uinsgd.ac.id">UIN Sunan Gunung Djati</a></li>
							<li>
								<p>Bandung</p>
							</li>
							<li>
								<p>Jawa Barat</p>
							</li>
						</ul>
					</div>

					<div class="col-lg-4 col-sm-4 col-xs-4">
						<ul>
							<li>
								<h5> <a href="<?php echo base_url().'c_home/index';?>">Tentang SIMARWAH</a> </h5>
							</li>
							<li>
								<h5><a href="#">Panduan</a> </h5>
							</li>
							<li>
								<h5><a href="#">Kontak</a> </h5>
							</li>
							<li>
								<h5><a href="#">Lokasi Kami</a> </h5>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!---->

	<script src="<?php echo base_url('assets/js/simarwahjquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/simarwahjquery.easing.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/simarwahbootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/simarwahwow.js')?>"></script>
	<script src="<?php echo base_url('assets/js/simarwah/jquery.bxslider.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/simarwahcustom.js')?>"></script>
	<script src="<?php echo base_url('contactform/contactform.js')?>"></script>

</body>
