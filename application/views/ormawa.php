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
      </nav>
    </div>
    <!--/ HEADER-->
    <!---->
     <section id="ormawa" class="section-padding wow fadeInUp delay-05s" style="background-color: #f3f3f3">

      <div class="container">
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-12 text-center" style="margin-top: 50px;">
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
                  <h3><?php echo $kode_himpunan;?></h3>
                  <p><?php echo $nama_himpunan;?></p>
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