<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMARWAH</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahjquery.bxslider.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahfont-awesome.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahbootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahanimate.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahstyle.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header id="main-header">
  <nav class="navbar navbar-default navbar-fixed-top" style="margin: 10px;">
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
            <li class=""><a href="<?php echo base_url() . 'c_home/index'; ?>">Tentang Kami</a></li>
            <li class=""><a href="<?php echo base_url() . 'c_home/ormawa'; ?>">ORMAWA</a></li>
            <li class=""><a href="<?php echo base_url() . 'c_home/semuaukm'; ?>">UKM&UKK</a></li>
            
            <li class=""><a href="<?php echo base_url().'c_home/aulasc';?>">PEMINJAMAN AULA SC</a></li>
            <li class="active"><a href="<?php echo base_url() . 'c_home/login'; ?>">LOGIN</a></li>
          </ul>
        </div>
      </div>
    </nav>
</header>

<body class="header">
  <div class="bg-color">
    <div class="col-md-4 col-lg-4 col-sm-3"></div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12" >
        <div style="background-color: white; opacity: 0.8; border-radius: 50px; margin-top: 150px; padding: 90px;">
          <div class="text-center">
            <img src="">
            <h2 class="service-title pad-bt15">LOG IN</h2>
            <hr class="bottom-line">
            <?= $this->session->flashdata('massage'); ?>
          </div>

          <div class="row" style="margin-bottom: 10px; text-align: center;">
            <div class="contact-form">
              <form action="<?php echo base_url('data/aksi_login_user'); ?>" method="post" style="margin: auto;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group" style="margin-bottom: 20px;">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="username" style="height:45px;"; class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group" style="margin-bottom: 20px;">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" style="height: 45px;" class="form-control" name="password" id="password" placeholder="Password"/>
                    <div class="validation"></div>
                  </div>
                </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <button type="submit" class="btn btn-primary btn-submit text-center">Masuk</button>
                  </div>
                
                </form>

              </div>
            </div>
          </div>
        </div>
    <div class="col-md-4 col-lg-4 col-sm-3"></div>
      </div>
    </div>
  </body>
  <footer class="bg-color">

  </footer>
  <script src="<?php echo base_url('assets/js/simarwahjquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahjquery.easing.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahbootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahwow.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/simarwah/jquery.bxslider.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahcustom.js') ?>"></script>
  <script src="<?php echo base_url('contactform/contactform.js') ?>"></script>

  </html>