<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
                                <img src="<?php echo base_url('assets/img/report.png')?>" class="img-fluid" alt="Responsive image" width="100%">
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p class="customtext">Agar dapat mengajukan pencairan dana kembali, <br>Silahkan
                                    lengkapi
                                    data dibawah ini.</p>
                            </div>
                        </article>
                    </div>

                    <!-- SYARAT CAIR UANG -->
                    <h2>Tabel Laporan Kegiatan</h2>
                    <form action="post">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Nama File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Laporan Kegiatan</td>
                                    <td>
                                        <div class="file-upload-custom">
                                            <input class="file-upload__input-custom" type="file" name="myFile[]"
                                                id="myFile" multiple>
                                            <button class="file-upload__button-custom" type="button">Choose A
                                                File</button>
                                            <span class="file-upload__label-custom"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Rincian Keuangan</td>
                                    <td>
                                        <div class="file-upload-custom">
                                            <input class="file-upload__input-custom" type="file" name="myFile[]"
                                                id="myFile" multiple>
                                            <button class="file-upload__button-custom" type="button">Choose A
                                                File</button>
                                            <span class="file-upload__label-custom"></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row gtr-200">
                            <div class="col-2 col-12-medium">
                            </div>
                            <div class="col-2 col-12-medium">
                            </div>
                            <div class="col-2 col-12-medium">
                            </div>
                            <div class="col-2 col-12-medium">
                            </div>
                            <div class="col-2 col-12-medium">
                            </div>
                            <div class="col-2 col-12-medium">
                                <a href="reportcheck.html">
                                    <p><button type="button" class="btn btn-primary">Kirim</button></p>
                                </a>
                            </div>
                        </div>
                    </form>
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
                        <li><a href="<?php echo base_url().'c_home/reportkegiatan';?>"><img src="<?php echo base_url('assets/img/sidebarreport.png')?>" class="icons"
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