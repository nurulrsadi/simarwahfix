<!DOCTYPE html>
  <html lang="en">

  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMARWAH</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords"
  content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
                <li class="active"><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
                <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
                
                <li class=""><a href="<?php echo base_url().'c_home/aulasc';?>">PEMINJAMAN AULA SC</a></li>
              <?php } else {?>
              <?php } ?>

              <?php if($this->session->userdata('status') == "login"){?>
              <li class=""><a href="<?php echo base_url().'c_user/index';?>">DASHBOARD</a></li>
              <li class=""><a href="<?php echo base_url().'data/logout';?>">LOG OUT</a></li>
              <?php } else {?> 
              <li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
              <li class="active"><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
              
              <li class=""><a href="<?php echo base_url().'c_home/aulasc';?>">PEMINJAMAN AULA SC</a></li>
              <li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>       
              <?php } ?>              
                </ul>
              </div>
          </div>
        </div>
      </nav>
    </div>
    <!--/ HEADER-->
    <!---->
    <section id="service" class="section-padding wow fadeInUp delay-05s">

      <div class="container">
        <div class="row" style="margin-bottom: 30px; margin: 100px; margin-top: 50px;">

          <div class="col-md-12 text-center" style="margin-bottom: 0px;">
            <div class="kotakb" style="border-style: none; width: 100%;">
              <div class="service-item">
                <?php foreach($himpunan as $him){ ?>
                <img src="<?php echo base_url('assets/img/jurusan/').$him->image;?>" style="width:100px;height:100px; margin: 10px;">
                <br>
                  <h2 class="service-title pad-bt15" style="font-family: fixed; font-size: 35px"><?php echo $him->kode_himpunan ?></h2>
                  <h2 class="" style="font-family: fixed; font-size: 35px"><?php echo $him->desc_himpunan ?></h2>
                <?php } ?> 
                
                <br>
              </div>
            </div>
          </div>


          <div class="row" style="margin-bottom: 40px; text-align: center;">
            <?php $id=1; foreach($himpunan as $him){ ?>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="kotakc" style="margin-left: 10px; border-color: transparent;">
                  <div class="service-item">
                    <h3><span>VISI</span></h3>
                    <p><?php echo $him->visi ?></p>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="kotakc" style="margin-right: 10px; border-color: transparent;">
                  <div class="service-item">
                    <h3><span>MISI</span></h3>
                    <p><?php echo $him->misi ?></p>
                  </div>
                </div>
              </div>
            <?php } ?> 
          </div>

          <div class="row">
              <?php $id=1; foreach($ketua as $him){ ?>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <div class="kotakb" style="width: 50%; border-color: white; margin:auto; margin-bottom: 20px;">
                    <div class="service-item">
                      <h3><span><?php echo $him->jabatan ?></span></h3>
                      <p><?php echo $him->nim ?></p>
                      <p><?php echo $him->nama?></p>
                    </div>
                  </div>
                </div>
              <?php } ?> 
            </div>
            
          <center>
            <div class="row">
              <?php $id=1; foreach($sekben as $him){ ?>
               <?php if($him->jabatan == 'SEKRETARIS')
               {?>
                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                    <div class="kotakb" style="border-color: white; margin: auto; margin-bottom: 20px">
                      <div class="service-item">
                      <h3><span style="font-size: 35px;"><?php echo $him->jabatan?> <?php echo $id++; ?></span></h3>
                      <p><?php echo $him->nim ?></p>
                      <p><?php echo $him->nama?></p>
                    </div>
                  </div>
                </div>
              <?php } else {?>
                <p></p>
              <?php } ?>
            <?php } ?>          
          </div>
          </center>

          <center>
          <div class="row">
              <?php $id=1; foreach($sekben as $him){ ?>
               <?php if($him->jabatan == 'BENDAHARA')
               {?>
                <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                    <div class="kotakb" style="border-color: white; margin: auto; margin-bottom: 20px">
                      <div class="service-item">
                      <h3><span style="font-size: 35px;"><?php echo $him->jabatan?> <?php echo $id++; ?></span></h3>
                      <p><?php echo $him->nim ?></p>
                      <p><?php echo $him->nama?></p>
                    </div>
                  </div>
                </div>
              <?php } else {?>
                <p></p>
              <?php } ?>
            <?php } ?>          
          </div>
          </center>

          <center>
           <div>
            <h3>Bidang - Bidang</h3>
            <hr>
          </div>    
          </center>
        
          <div class = "row" style="margin-bottom: 15px; margin-top: 15px;">
            <?php $id=1; foreach($bidang as $him){ ?>
              <?php if($him->desc_bidang != 'EX OFFICIO'){?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="kotakb" style="border-color: white;">
                  <div class="service-item">                    
                    <img width="200" height="200" src="<?php echo base_url('assets/img/bidang/').$him->image?>" >
                    <h3><span><?php echo $him->label_bidang?></span></h3>
                    <p><?php echo $him->desc_bidang?></p>
                    <h4>Ketua Bidang</h4>
                    <?php foreach($ketuabidang as $agt){?>
                      <?php if($him->kode_bidang == $agt->parent_bidang)
                      {?>
                        <p><?php echo $agt->nama?></p>
                      <?php } else {?>
                        <p></p>
                      <?php } ?>
                    <?php } ?>  
                    <h4>Anggota</h4>
                    <?php foreach($anggota as $agt){?>
                      <?php if($him->kode_bidang == $agt->parent_bidang)
                      {?>
                        <p><?php echo $agt->nama?></p>
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
                  foreach($kegiatan->result_array() as $i):
                    $start_date=$i['start_date'];
                    $end_date=$i['end_date'];
                    $nama_kegiatan=$i['nama_kegiatan'];
                      
                      ?>
            <tbody>
              <tr>
                            <td width="300"><?php echo p_bulanindo($start_date) ?> s/d <?php echo p_bulanindo($end_date) ?> </td>
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

      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Foto Kegiatan</h2>
            <p class="sub-title pad-bt15"></p>
            <hr class="bottom-line">
          </div>
          <?php 
            foreach($kegiatan->result_array() as $i):
            $start_date=$i['start_date'];
            $end_date=$i['end_date'];
            $nama_kegiatan=$i['nama_kegiatan'];
            $image=$i['image'];
          ?>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>              
                <img src="<?php echo base_url('assets/img/kegiatan/'.$image.'')?>" style="width: 500px; height: 250px;" class="img-responsive">
                <figcaption>
                  <h2><?php echo $nama_kegiatan ?></h2>
                  <p><?php echo p_bulanindo($start_date) ?> s/d <?php echo p_bulanindo($end_date) ?></p>                  
                </figcaption>
            
            </figure>
          </div>
          <?php endforeach ?>

        </div>

      <!-- <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
          <h2 class="service-title pad-bt15">Data Anggota</h2>
          <hr class="bottom-line">
          <h4><a href="" style="color: #be9e21" class="read-more">Seluruh Mahasiswa Jurusan Teknik
          Informatika UIN Sunan Gunung Djati Bandung</a></h4>
          <br>
          <br>
        </div>
      </div> -->

    </div>
  </section>

<section id="blog" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">PRESTASI ORGANISASI</h2>
            <p class="sub-title pad-bt15"></p>
            <hr class="bottom-line">
          </div>
        <div class="row"> 
          <!-- <div class="col-md-6 col-sm-6 col-xs-6"> -->
            <?php foreach ($prestasi->result_array() as $i): 
              $waktu=$i['waktu'];
              $nama_prestasi=$i['nama_prestasi'];
              $jenis_prestasi=$i['jenis_prestasi'];
              $desc_prestasi=$i['desc_prestasi'];
              $image=$i['image'];
              $lokasi=$i['lokasi'];

            ?>
            <div class="col-md-4">
              <div class="blog-img">
                <img src="<?php echo base_url('assets/img/prestasi/'.$image.'')?>" style="width: 500px; height: 250px;" class="img-responsive">
              </div>   
              <div class="blog-info">
                <h2><?php echo $nama_prestasi ?></h2>
                <p>Oleh : <?php echo $jenis_prestasi ?></p>
                <div class="blog-comment">
                  <p><?php echo $waktu?></p>
                  <p>
                    <span><i class="fa fa-map-pin"></i>  <?php echo $lokasi?></span>
                    
                  </p>
                </div>
                <p><?php echo $desc_prestasi?></p>
                <!-- <a href="" class="read-more">Read more →</a> -->
              </div>
            </div>
          <?php endforeach ?>
      
          
        </div>
      </div>
    </section>