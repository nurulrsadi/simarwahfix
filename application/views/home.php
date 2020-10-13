<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>simarwah</title>
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
    <div class="header">
      <div class="bg-color">

        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
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
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <h1>SI<span class="logo-dec">MARWAH</span></h1>
                <h2 class="bnr-sub-title">Sistem Informasi Organisasi Mahasiswa</h2>
                <p class="bnr-para">SIMARWA (Sistem Informasi Organisasi Mahasiswa) merupakan sistem informasi pada
                  organisasi mahasiswa yang ada di kampus UIN Sunan Gunung Djati Bandung. Sistem ini mempermudah
                  mahasiswa dalam keperluan di organisasi, seperti peminjaman Aula Student Center, informasi daftar
                  kegiatan, pendaftaran UKM (Unit Kegiatan Mahasiswa), mengajukan anggaran organisasi, serta informasi
                  setiap organisasi. </p>
                <!--  <div class="brn-btn">
                  <a href="#" class="btn btn-download">Download now!</a>
                  <a href="#" class="btn btn-more">Learn More</a>
                </div> -->
                <!-- <div class="overlay-detail">
                  <a href="#feature"><i class="fa fa-angle-down"></i></a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <!---->
    <!-- <section id="feature" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser01.png">
              </div>
              <h3 class="pad-bt15">Creative Concept</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser02.png">
              </div>
              <h3 class="pad-bt15">Amazing Design</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser03.png">
              </div>
              <h3 class="pad-bt15">Cost effective</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser04.png">
              </div>
              <h3 class="pad-bt15">Secure</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!---->
    <!---->
    <section id="ormawa" class="section-padding wow fadeInUp delay-05s" style="background-color: #f3f3f3">

      <div class="container">
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Organisasi Mahasiswa</h2>
            <!-- <p class="sub-title pad-bt15"></p> -->
            <hr class="bottom-line">
          </div>
          <?php foreach ($himpunan->result_array() as $i):
            $nama_himpunan = $i['nama_himpunan'];
            $kode_himpunan = $i['kode_himpunan'];
            $deskripsi = $i['desc_himpunan'];
            $image = $i['image'];
          ?>
          <?php if($kode_himpunan == 'SEMAU' || $kode_himpunan == 'DEMAU')
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

        <div class="row" style="margin-bottom: 30px;">
          <?php $id=1; foreach($fakultas as $fak){ ?>
            <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="service-item">
              <div class="kotakb">
                <a href="<?php echo base_url().'c_home/fakultas/'.$fak->kode_fakultas.'';?>">
                  <h3><span><?php echo $fak->kode_fakultas ?></span></h3>
                  <p><?php echo $fak->nama_fakultas ?></p>
                </a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!---->
    <!---->
    <section id="ukm" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
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
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">

            <h4><a href="<?php echo base_url().'c_home/semuaukm';?>" style="color: #85C441" class="read-more">Lihat Lebih →</a></h4>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!--     <section id="testimonial" class="wow fadeInUp delay-05s">
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
    </section>
 -->
    <!---->
    <section id="aulasc" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Peminjaman Aula Student Center</h2>
            <p class="sub-title pad-bt15">Aula yang terletak di Lt.1 Student Center biasa digunakan untuk kegiatan
              mahasiswa.</p>
            <hr class="bottom-line">
          </div>
          <div id="calendar" style="max-width: 800px;margin: 2rem auto;padding: 0 5px">

            <pre id="debug" style="overflow-x:hidden"></pre>
            
                
                <link rel="stylesheet" href="<?php echo base_url('assets/dist/calendar.css')?>">
               <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
                <script src="<?php echo base_url('assets/dist/calendar.js')?>"></script>


                <script>
                  var d = new Date()
                  var calendar = new Calendar({
                    target: document.querySelector("#calendar"),
                    data: {
                      view: 'calendar',
                      escape: false,
                      year: d.getFullYear(),
                      month: d.getMonth(),
                    }
                  })

                  // fetch("entries.json").then(r => r.json()).then(data => {
                  //   var entries = calendar.get('entries')
                  //   var cardEntries = data.cards.filter(c => !!c.badges.due && !c.closed).map(c => {

                  //   return {
                  //     title: c.name,
                  //     start: c.badges.due,
                  //     content: c.desc,
                  //     image: c.attachments.length > 0 ? c.attachments[0].previews.sort((a,b) => b.bytes - a.bytes)[0].url : null
                  //   }
                  //   })

                  //   entries = entries.concat(cardEntries)
                  //   calendar.set({entries: entries, message: ''})
                  //   })
                    
          
                </script>
              
          </div>
          <div class="col-md- col-sm-6 col-xs-12">
            <div class="blog-sec" style="margin-top: 60px;">
              <div class="blog-info">
                <h2>Keterangan Telah Dipinjam : </h2>
                <br>
                <div class="row" style="margin-bottom: 15px; margin-left: 30px">
                  <div class="biru" style="display: inline-grid;"></div>
                  <p>Aula SC A</p>
                  <div class="merah" style="display: inline-grid;"></div>
                  <p>Aula SC B</p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->

    <!---->
    <!---->
    <!-- FOOTER -->
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
                  <h5> <a href="indexforall.html">Tentang SIMARWA</a> </h5>
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