<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>simarwa</title>
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

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div>
      <nav class="navbar navbar-defaulta navbar-fixed-top" style="margin: 10px;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">SI<span class="logo-dec">MARWA</span></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
              <li class="active"><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
              <li class=""><a href="#">Daftar Kegiatan</a></li>
              <li class=""><a href="#">Peminjaman Aula SC</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!--/ HEADER-->
    <!---->
    <section id="ukm" class="section-padding wow fadeInUp delay-05s">
      <div class="container" style="margin-top: 50px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">UKM & UKK</h2>
            <p class="sub-title pad-bt15">Unit Kegiatan Mahasiswa</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <a href="<?php echo base_url().'c_home/ukmaja';?>">
                <img src="<?php echo base_url('assets/img/pramuka.jpg')?>" style="width: 500px; height: 250px;" class="img-responsive">
                <figcaption>
                  <h2>PRAMUKA</h2>
                  <p>Pramuka UIN Sunan Gunung Djati Bandung</p>
                </figcaption>
              </a>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="<?php echo base_url('assets/img/PSM.jpg')?>" style="width: 500px; height: 250px;" class="img-responsive">
              <figcaption>
                <h2>PSM</h2>
                <p>Paduan Suara Mahasiswa</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="<?php echo base_url('assets/img/fabbis.jpg')?>" style="width: 500px; height: 250px;" class="img-responsive">
              <figcaption>
                <h2>FABBIS</h2>
                <p>Family of Basketball UIN SGD BDG</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="<?php echo base_url('assets/img/liga.jpg')?>" style="width: 500px; height: 250px;" class="img-responsive">
              <figcaption>
                <h2>LIMA</h2>
                <p>Liga Mahasiswa</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="<?php echo base_url('assets/img/LDM.jpg')?>" style="width: 500px; height: 250px;" class="img-responsive">
              <figcaption>
                <h2>LDM</h2>
                <p>Lembaga Dakwah Masjid</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="<?php echo base_url('assets/img/port06.jpg')?>" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>

        </div>
    </section>
    <!---->
    <!---->
    <footer>
      <div class="footer" id="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <img src="<?php echo base_url('assets/img/uinlogo.png')?>" style="width:110px;height:160px; margin: auto;">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <h3 style="font-size: 30px;">SI<span class="logo-dec">MARWA</span></h3>
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
                  <h5> <a href="index.html">Tentang SIMARWA</a> </h5>
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
  </div>
  <script src="<?php echo base_url('assets/js/simarwahjquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahjquery.easing.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahbootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahwow.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwah/jquery.bxslider.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahcustom.js')?>"></script>
  <script src="<?php echo base_url('contactform/contactform.js')?>"></script>

</body>

</html>