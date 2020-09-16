<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html>

<head>
    <title> Laporan Kegiatan</title>
    <meta charset="utf-8" />
    <meta name="viewport" contenBt="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/usermain.css')?>" />
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
                    <a href="index.html" class="logo"><strong>SIMARWAH </strong> Laporan Kegiatan</a>
                    <!-- <ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
									</ul> -->
                </header>

                <!-- Content -->
                <section>
                    <header class="main">

                    </header>

                    <div class="features">

                        <article>
                            <!-- <span class="icon fa-gem"></span> -->
                            <div class="content">
                                <img src="<?php echo base_url('assets/img/cekfile.png')?>" class="img-fluid" alt="Responsive image" width="100%">
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p class="customtextcheck">Laporan kegiatan anda sedang kami cek, <br>Silahkan
                                    tunggu verifikasi untuk dapat mengajukan pencairan dana kembali.</p>
                                <p><a href="reportkegiatan.html" class="button primary">Ubah Laporan Kegiatan</a></p>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">

                <!-- Search -->
                <section id="search" class="alt">
                    <h2><strong>Selamat datang !</strong></h2>
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
                        <li><a href="index.html"><img src="<?php echo base_url('assets/img/sidebarprofile.png')?>" class="icons" alt="profileicon"
                                    width=7% margin=5px> Edit Profil</a></li>
                        <li><a href="reportcheck.html"><img src="<?php echo base_url('assets/img/sidebarreport.png')?>" class="icons"
                                    alt="profileicon" width=7% margin=5px> Laporan Kegiatan</a></li>
                        <li><a href="<?php echo base_url().'c_home/pinjamaula';?>"><img src="<?php echo base_url('assets/img/sidebarrentfix.png')?>" class="icons"
                                    alt="profileicon" width=7% margin=5px> Peminjaman Aula SC</a></li>
                        <li><a href="<?php echo base_url().'c_home/guidehmj';?>"><img src="<?php echo base_url('assets/img/sidebarguide.png')?>" class="icons" alt="profileicon"
                                    width=7% margin=5px> Panduan SIMARWAH</a></li>
                        <li><a href="<?php echo base_url().'c_home/index';?>"><img src="<?php echo base_url('assets/img/sidebarlogout.png')?>" class="icons" alt="profileicon" width=7%
                                    margin=5px> Log Out</a></li>
                    </ul>
                </nav>


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
    <script src="<?php echo base_url('assets/js/userbuttoncairuang.js')?>"></script>
    <script src="<?php echo base_url('assets/js/userbuttonpengajuanuangg.js')?>"></script>
</body>

</html>