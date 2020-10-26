<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
              <?php if($this->session->userdata('status') == "login"){?>
                <li class="active"><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
                
                <li class=""><a href="#">Peminjaman Aula SC</a></li>
              <?php } else {?>
              <?php } ?>

              <?php if($this->session->userdata('status') == "login"){?>
              <li class=""><a href="<?php echo base_url().'c_user/index';?>">DASHBOARD</a></li>
              <li class=""><a href="<?php echo base_url().'data/logout';?>">LOG OUT</a></li>
              <?php } else {?> 
              <li class="active"><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
              
              <li class=""><a href="#">Peminjaman Aula SC</a></li> 
              <li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>       
              <?php } ?>              
                </ul>
              </div>
        </div>
      </nav>
    </div>

    <!---->
    <section id="service" class="section-padding wow fadeInUp delay-05s">

      <div class="container">
        <div class="row" style="margin-bottom: 30px; margin: 100px; margin-top: 50px;">

          <div class="col-md-12 text-center" style="margin-bottom: 0px;">
            <div class="kotakb" style="border-style: none; width: 100%;">
              <div class="service-item">
                <?php foreach($ukm_ukk as $u){ ?>
                
                <hr class="bottom-line">
                  <h2 class="service-title pad-bt15" style="font-family: fixed; font-size: 35px"><?php echo $u->nama_ukmukk ?></h2>
                  <h2 class="service-title pad-bt15" style="font-family: fixed; font-size: 35px"><?php echo $u->desc_ukmukk ?></h2>
                <?php } ?>                 
                <br>
              </div>
            </div>
          </div>


          <div class="row" style="margin-bottom: 40px; text-align: center;">
            <?php foreach($ukm_ukk as $u){ ?>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="kotakc" style="margin-left: 10px; border-color: transparent;">
                  <div class="service-item">
                    <h3><span>VISI</span></h3>
                    <p><?php echo $u->visi_ukmukk ?></p>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="kotakc" style="margin-right: 10px; border-color: transparent;">
                  <div class="service-item">
                    <h3><span>MISI</span></h3>
                    <p><?php echo $u->misi_ukmukk ?></p>
                  </div>
                </div>
              </div>
            <?php } ?> 
          </div>

          <div>
            <div class="row">
              <?php foreach($uketua as $u){ ?>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <div class="kotakb" style="width: 50%; border-color: white; margin:auto; margin-bottom: 20px;">
                    <div class="service-item">
                      <h3><span><?php echo $u->u_jabatan ?></span></h3>
                      <p><?php echo $u->u_nim ?></p>
                      <p><?php echo $u->u_nama?></p>
                    </div>
                  </div>
                </div>
              <?php } ?> 
            </div>

            <div class="row">
              <?php $id=1; foreach($usekben as $u){ ?>
               <?php if($u->u_jabatan == 'SEKRETARIS' || $u->u_jabatan == 'BENDAHARA')
               {?>
                <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                    <div class="kotakb" style="border-color: white; margin: auto; margin-bottom: 20px">
                      <div class="service-item">
                      <h3><span style="font-size: 35px;"><?php echo $u->u_jabatan ?></span></h3>
                      <p><?php echo $u->u_nim ?></p>
                      <p><?php echo $u->u_nama?></p>
                    </div>
                  </div>
                </div>
              <?php } else {?>
                <p></p>
              <?php } ?>
            <?php } ?>          
          </div>

          </div>
           <center>
           <div>
            <h3>Bidang - Bidang</h3>
            <hr>
          </div>    
          </center>
        
          <div class = "row" style="margin-bottom: 15px; margin-top: 15px;">
            <?php foreach($ubidang as $u){ ?>
              <?php if($u->desc_ubidang != 'EX OFFICIO'){?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="kotakb" style="border-color: white;">
                  <div class="service-item">
                    <!-- <img src="<?php echo base_url('assets/img/PAO.png')?>" style="width:100px;height:100px; padding: 10px;"> -->
                    <img width="200" height="200" src="<?php echo base_url('assets/img/bidang/').$u->image?>" >
                    <h3><span><?php echo $u->label_ubidang?></span></h3>
                    <p><?php echo $u->desc_ubidang?></p>
                    <h4>Ketua Bidang</h4>
                    <?php foreach($uketuabidang as $agt){?>
                      <?php if($u->kode_ubidang == $agt->parent_ubidang)
                      {?>
                        <p><?php echo $agt->u_nama?></p>
                      <?php } else {?>
                        <p></p>
                      <?php } ?>
                    <?php } ?>  
                    <h4>Anggota</h4>
                    <?php foreach($uanggota as $agt){?>
                      <?php if($u->kode_ubidang == $agt->parent_ubidang)
                      {?>
                        <p><?php echo $agt->u_nama?></p>
                      <?php } else {?>
                        <p></p>
                      <?php } ?>
                    <?php } ?>  
                  </div>
                </div>
              </div>
              <?php } else {?>
              <div></div>
              <?php } ?>
              
            <?php } ?>     
          </div>

        </div>
      </div>

      <!-- <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
          <h2 class="service-title pad-bt15">Data Anggota</h2>
          <hr class="bottom-line">
          <h4><a href="" style="color: #85C441" class="read-more">Anggota Pramuka Angkatan 2019</a></h4>
          <h4><a href="" style="color: #85C441" class="read-more">Anggota Pramuka Angkatan 2018</a></h4>
          <h4><a href="" style="color: #85C441" class="read-more">Anggota Pramuka Angkatan 2017</a></h4>
          <br>
          <br>
        </div>
      </div> -->
    </section>
    <!---->
   <!--  <section id="aulasc" class="section-padding wow fadeInUp delay-05s" style="background-color: #f3f3f3;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Kegiatan</h2>

            <hr class="bottom-line">
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="">
                  <img src="<?php echo base_url('assets/img/blog01.jpg')?>" class="img-responsive">
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
                <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have
                  entrusted to enforce those laws all the time. we always want to help people cordially.</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="">
                  <img src="<?php echo base_url('assets/img/blog02.jpg')?>" class="img-responsive">
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
                <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have
                  entrusted to enforce those laws all the time. we always want to help people cordially.</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="">
                  <img src="<?php echo base_url('assets/img/blog03.jpg')?>" class="img-responsive">
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
                <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have
                  entrusted to enforce those laws all the time. we always want to help people cordially.</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section id="service" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
       <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="service-title pad-bt15">Program Kerja</h2>
          <hr class="bottom-line">
        </div>
        <div class="col-md-12 text-center">
          <table class="fixed-th" >
            <thead>
              <tr>
                <th width="300">Waktu Acara</th>

                <th width="800">Nama Kegiatan</th>
                
              </tr>
            </thead>
            <?php
                  foreach($kegiatan_ukmukk->result_array() as $i):
                    $start_date=$i['ustart_date'];
                    $end_date=$i['uend_date'];
                    $nama_kegiatan=$i['nama_ukegiatan'];
                      
                      ?>
            <tbody>
              <tr>
                            <td width="300"><?php echo $start_date ?> s/d <?php echo $end_date ?> </td>
                            <td width="800"><?php echo $nama_kegiatan ?></td>
                            
                            
              </tr>   
            </tbody>
            <?php endforeach;?>

          </table>
          <br />
          <br>
          <br>
        </div>
      </div>
      </div>
    </section>


    <!-- footer -->
    <footer>
      <div class="footer" id="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <img src="<?php echo base_url('assets/img/uinlogo.png')?>" style="width:150px;height:150px; margin: 10px;">
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