<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
            <a class="navbar-brand">SI<span class="logo-dec">MARWAH</span></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <?php if($this->session->userdata('status') == "login"){?>
                <li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
                <li class=""><a href="#">Daftar Kegiatan</a></li>
                <li class=""><a href="#">Peminjaman Aula SC</a></li>
              <?php } else {?>
              <?php } ?>

              <?php if($this->session->userdata('status') == "login"){?>
              
              <li class=""><a href="<?php echo base_url().'data/logout';?>">LOG OUT</a></li>
            <?php } else {?>  
              <li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>       
            <?php } ?>

              
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!--/ HEADER-->
    <!---->
    <section id="service" class="section-padding wow fadeInUp delay-05s">

      <div class="container">
        <div class="row" style="margin-bottom: 30px; margin: 100px; margin-top: 50px;">
          <!-- <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">SEMA - U</h2>
            <hr class="bottom-line">
          </div> -->

          <div class="col-md-12 text-center" style="margin-bottom: 40px;">
            <div class="kotakb" style="border-style: none; width: 100%;">
              <div class="service-item">
                <img src="<?php echo base_url('assets/img/demau.jpg')?>" style="width:150px;height:150px; margin: 10px;">
                <hr class="bottom-line">
                <h2 class="service-title pad-bt15" style="font-family: fixed; font-size: 50px">DEMA-U</h2>
                <p>SEMA-U adalah Senat Mahasiswa Universitas</p>
                <br>
              </div>
            </div>
          </div>


          <div class="row" style="margin-bottom: 40px; text-align: center;">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="" style="margin-left: 10px;">
                <div class="service-item">
                  <h3><span>VISI</span></h3>
                  <p>SEMA-U adalah Senat Mahasiswa Universitas</p>

                </div>
              </div>
            </div>
            <br>
            <br>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="" style="margin-right: 10px;">
                <div class="service-item">
                  <h3><span>MISI</span></h3>
                  <p>SEMA-U adalah Senat Mahasiswa Universitas</p>
                </div>
              </div>
          </div>
          

          <div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="kotakb" style="width: 50%; border-color: white; margin:auto; margin-bottom: 20px;">
                  <div class="service-item">
                    <h3><span>KETUA UMUM</span></h3>
                    <p>1177050000</p>
                    <p>Muhammad</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="margin-bottom: 20px;">
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="service-item">
                  <div class="kotakb" style="border-color: white; margin: auto;">
                    <h3><span style="font-size: 35px;">SEKERTARIS UMUM</span></h3>
                    <p>11770500</p>
                    <p>Nama Mahasiswa</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="service-item">
                  <div class="kotakb" style="border-color: white;  margin: auto;">
                    <h3><span style="font-size: 35px;">BENDAHARA UMUM</span>1</h3>
                    <p>11770500</p>
                    <p>Nama Mahasiswa</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="service-item">
                  <div class="kotakb" style="border-color: white;  margin: auto;">
                    <h3><span style="font-size: 35px;">BENDAHARA UMUM</span>2</h3>
                    <p>11770500</p>
                    <p>Nama Mahasiswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="kotakb" style="border-color: white;">
                <div class="service-item">
                  <img src="<?php echo base_url('assets/img/PAO.png')?>" style="width:100px;height:100px; margin: 10px;">
                  <h3><span>PAO</span></h3>
                  <p>Pengembangan Aparatur Organisasi</p>
                  <p>Ketua Bidang</p>
                  <p>Sekertaris Bidang</p>
                  <p>Bendahara Bidang</p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="kotakb" style="border-color: white;">
                <div class="service-item">
                  <img src="<?php echo base_url('assets/img/PAO.png')?>" style="width:100px;height:100px; margin: 10px;">
                  <h3><span>PAO</span></h3>
                  <p>Pengembangan Aparatur Organisasi</p>
                  <p>Ketua Bidang</p>
                  <p>Sekertaris Bidang</p>
                  <p>Bendahara Bidang</p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="kotakb" style="border-color: white;">
                <div class="service-item">
                  <img src="<?php echo base_url('assets/img/PAO.png')?>" style="width:100px;height:100px; margin: 10px;">
                  <h3><span>PAO</span></h3>
                  <p>Pengembangan Aparatur Organisasi</p>
                  <p>Ketua Bidang</p>
                  <p>Sekertaris Bidang</p>
                  <p>Bendahara Bidang</p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="kotakb" style="border-color: white;">
                <div class="service-item">
                  <img src="<?php echo base_url('assets/img/PAO.png')?>" style="width:100px;height:100px; margin: 10px;">
                  <h3><span>PAO</span></h3>
                  <p>Pengembangan Aparatur Organisasi</p>
                  <p>Ketua Bidang</p>
                  <p>Sekertaris Bidang</p>
                  <p>Bendahara Bidang</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Program Kerja</h2>
            <hr class="bottom-line">
          </div>
          <div class="col-md-12 text-center">
            <table class="fixed-th">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Waktu Acara</th>
                  <th>Nama Acara</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Agustur - September 2019</td>
                  <td>PBAK 2019</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>

                <tr>
                  <td>7</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>September - November 2019</td>
                  <td>MONITOR 2019</td>
                </tr>
              </tbody>
            </table>
            <br />
            <br>
            <br>
          </div>
        </div>
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
                      <h5> <a href="<?php echo base_url().'c_home/index';?>">Tentang SIMARWA</a> </h5>
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

</html>