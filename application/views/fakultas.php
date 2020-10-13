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
                <li class="active"><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
                <li class=""><a href="#">Daftar Kegiatan</a></li>
                <li class=""><a href="#">Peminjaman Aula SC</a></li>
              <?php } else {?>
              <?php } ?>

              <?php if($this->session->userdata('status') == "login"){?>
              
              <li class=""><a href="<?php echo base_url().'data/logout';?>">LOG OUT</a></li>
              <?php } else {?> 
              <li class="active"><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
              <li class=""><a href="#">Daftar Kegiatan</a></li>
              <li class=""><a href="#">Peminjaman Aula SC</a></li> 
              <li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>       
              <?php } ?>              
                </ul>
              </div>
      </div>
    </nav>
  </div>
  <!---->
  <!---->
  <section id="service" class="section-padding wow fadeInUp delay-05s">

    <div class="container">
      <?php foreach ($fakultas->result_array() as $i):
        $deskripsi = $i['deskripsi'];
        $nama_fakultas = $i['nama_fakultas'];
        $visi = $i['visi'];
        $misi = $i['misi'];
      ?>
      <div class="row" style="margin-bottom: 30px; margin: 100px; margin-top: 50px;">
        <div class="col-md-12 text-center">
          <div style="background-image: url('saintek.jpg');">
            <h2 class="service-title pad-bt15" style="font-family: fixed; font-size: 40px"><?php echo $nama_fakultas;?></h2>
            <!-- <p class="sub-title pad-bt15"></p> -->
            <hr class="bottom-line">
          </div>
        </div>
        <div class="col-md-12 text-center" style="margin-bottom: 40px;">
          <div class="service-item">
            <p><?php echo $deskripsi;?></p>
           </div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 40px; text-align: center;">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="" style="margin-left: 10px;">
              <div class="service-item">
                <h3><span>VISI</span></h3>
                <p><?php echo $visi; ?></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="" style="margin-right: 10px;">
              <div class="service-item">
                <h3><span>MISI</span></h3>
                <p><?php echo $misi; ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>



     

        <!-- dema sema saintek -->
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Organisasi Mahasiswa</h2>
            <!-- <p class="sub-title pad-bt15"></p> -->
            <hr class="bottom-line">
          </div>
          <?php foreach ($jurusan->result_array() as $i):
            $nama_himpunan = $i['nama_himpunan'];
            $kode_himpunan = $i['kode_himpunan'];
            $deskripsi = $i['desc_himpunan'];
            $image = $i['image'];
          ?>
          <?php if($nama_himpunan == 'SEMAF' || $nama_himpunan == 'DEMAF')
             {?>
                <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="kotakb" style="margin-left: 20;">
              <div class="service-item">
                <a href="<?php echo base_url().'c_home/himpunan/'.$kode_himpunan.'';?>">
                  <img src="<?php echo base_url('assets/img/jurusan/').$image;?>" style="width:100px;height:100px; margin: 10px;">
                  <h3><?php echo $nama_himpunan;?></h3>
                  <p><?php echo $deskripsi;?></p>
                </a>
              </div>
            </div>
          </div>
            <?php } else {?>
            <?php } ?>
          <?php endforeach ?>
          <br>
          <br>
        </div>

        <!-- jurusan di saintek 1-->
        <div class="row" style="margin-bottom: 30px;">
        <?php foreach ($jurusan->result_array() as $i):
            $nama_himpunan = $i['nama_himpunan'];
            $kode_himpunan = $i['kode_himpunan'];
            $deskripsi = $i['desc_himpunan'];
            $image = $i['image'];
          ?>
          <?php if($nama_himpunan == "SEMAF" || $nama_himpunan == "DEMAF")
             {?>
           <?php } else {?>
            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
            <div class="service-item">
              <div class="kotakb">
                <a href="<?php echo base_url().'c_home/himpunan/'.$kode_himpunan.'';?>">
                  <img src="<?php echo base_url('assets/img/jurusan/').$image;?>" style="width:100px;height:100px; margin: auto;">
                  <h3><span><?php echo $nama_himpunan ?></span></h3>
                  <p><?php echo $deskripsi ?></p>
                </a>
              </div>
            </div>
          </div>
            <?php } ?>
         <?php endforeach ?>
          </div>
        </div>
      </div>
  </section>
  <!---->
  <!---->
  <!---->
  <!---->
  <!-- -->
  <!---->
  <!---->
  <!-- <section id="testimonial" class="wow fadeInUp delay-05s">
    <div class="bg-testicolor">
      <div class="container section-padding">
        <div class="row">
          <div class="testimonial-item">
            <ul class="bxslider">
              <li>
                <blockquote>
                  <img src="img/thumb.png" class="img-responsive">
                  <p>Come a day there won't be room for naughty men like us to slip about at all. This job goes south, there well may not be another. </p>
                </blockquote>
                <small>Shaun Paul, Client</small>
              </li>
              <li>
                <blockquote>
                  <img src="img/thumb.png" class="img-responsive">
                  <p>So here is us, on the raggedy edge. Don't push me, and I won't push you. </p>
                </blockquote>
                <small>Marry Smith, Client</small>
              </li>
              <li>
                <blockquote>
                  <img src="img/thumb.png" class="img-responsive">
                  <p>Come a day there won't be room for naughty men like us to slip about at all. This job goes south, there well may not be another.</p>
                </blockquote>
                <small>Vivek Singh, Client</small>
              </li>
              <li>
                <blockquote>
                  <img src="img/thumb.png" class="img-responsive">
                  <p>So here is us, on the raggedy edge. Don't push me, and I won't push you.</p>
                </blockquote>
                <small>John Doe, Client</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!---->
  <!-- <section id="blog" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="service-title pad-bt15">Latest from our blog</h2>
          <p class="sub-title pad-bt15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua.</p>
          <hr class="bottom-line">
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="blog-sec">
            <div class="blog-img">
              <a href="">
                <img src="img/blog01.jpg" class="img-responsive">
              </a>
            </div>
            <div class="blog-info">
              <h2>This is Lorem ipsum heading.</h2>
              <div class="blog-comment">
                <p>Posted In: <span>Legal Advice</span></p>
                <p>
                  <span><a href="#"><i class="fa fa-comments"></i></a> 15</span>
                  <span><a href="#"><i class="fa fa-eye"></i></a> 11</span></p>
              </div>
              <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have entrusted to enforce those laws all the time. we always want to help people cordially.</p>
              <a href="" class="read-more">Read more →</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="blog-sec">
            <div class="blog-img">
              <a href="">
                <img src="img/blog02.jpg" class="img-responsive">
              </a>
            </div>
            <div class="blog-info">
              <h2>This is Lorem ipsum heading.</h2>
              <div class="blog-comment">
                <p>Posted In: <span>Legal Advice</span></p>
                <p>
                  <span><a href="#"><i class="fa fa-comments"></i></a> 15</span>
                  <span><a href="#"><i class="fa fa-eye"></i></a> 11</span></p>
              </div>
              <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have entrusted to enforce those laws all the time. we always want to help people cordially.</p>
              <a href="" class="read-more">Read more →</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="blog-sec">
            <div class="blog-img">
              <a href="">
                <img src="img/blog03.jpg" class="img-responsive">
              </a>
            </div>
            <div class="blog-info">
              <h2>This is Lorem ipsum heading.</h2>
              <div class="blog-comment">
                <p>Posted In: <span>Legal Advice</span></p>
                <p>
                  <span><a href="#"><i class="fa fa-comments"></i></a> 15</span>
                  <span><a href="#"><i class="fa fa-eye"></i></a> 11</span></p>
              </div>
              <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have entrusted to enforce those laws all the time. we always want to help people cordially.</p>
              <a href="" class="read-more">Read more →</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!---->
  <!-- <section id="contact" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center white">
          <h2 class="service-title pad-bt15">Keep in touch with us</h2>
          <p class="sub-title pad-bt15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua.</p>
          <hr class="bottom-line white-bg">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="loction-info white">
            <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>A99 Adam Street<br>Texas, TX 555072</p>
            <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@baker.com</p>
            <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+41 5787 2323</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="contact-form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="col-md-6 padding-right-zero">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">SEND NOW</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section> -->
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
<script src="assets/js/simarwahjquery.min.js"></script>
<script src="assets/js/simarwahjquery.easing.min.js"></script>
<script src="assets/js/simarwahbootstrap.min.js"></script>
<script src="assets/js/simarwahwow.js"></script>
<script src="assets/js/simarwah/jquery.bxslider.min.js"></script>
<script src="assets/js/simarwahcustom.js"></script>
<script src="contactform/contactform.js"></script>

</body>

</html>