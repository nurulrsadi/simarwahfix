<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMARWAH</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahjquery.bxslider.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahfont-awesome.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahbootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahanimate.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahstyle.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
						
						<li class="active"><a href="<?php echo base_url().'c_home/aulasc';?>">Peminjaman Aula SC</a></li>
						<?php } else {?>
						<?php } ?>

						<?php if($this->session->userdata('status') == "login"){?>

						<li class=""><a href="<?php echo base_url().'data/logout';?>">LOG OUT</a></li>
						<?php } else {?>
						<li class=""><a href="<?php echo base_url().'c_home/index';?>">Tentang Kami</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/ormawa';?>">ORMAWA</a></li>
						<li class=""><a href="<?php echo base_url().'c_home/semuaukm';?>">UKM&UKK</a></li>
						
						<li class=""><a href="<?php echo base_url().'c_home/aulasc';?>">Peminjaman Aula SC</a></li>
            <li class="active"><a href="<?php echo base_url().'c_home/daftar_ukm_ukk';?>">Daftar UKM&UKK</a></li> 
						<li class=""><a href="<?php echo base_url().'c_home/login';?>">LOGIN</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>

  <section id="service" class="section-padding wow fadeInUp delay-05s">
      <div class="row">
      <!-- <div class="col-md-4 col-lg-4 col-sm-3"> -->
        <!-- <div class="col-md-12 col-sm-12 col-xs-12" > -->
        <div style="background-color: white; opacity: 0.9; border-radius: 5px; margin-top: 10px; margin-right: 200px; margin-left: 200px;">
          <div class="text-center">
            <img src="">
              <center>
              <h2 class="service-title pad-bt15">FORM PENDAFTARAN CALON ANGGOTA UKM & UKK</h2>
              </center>
            <hr class="bottom-line">
            <?= $this->session->flashdata('massage'); ?>
          </div>

            <div class="row" style="margin-bottom: 10px;">
              <div class="contact-form"  style="color:black; ">
                <form action="<?php echo base_url('m_ukmukk/cek_daftar_calon'); ?>" enctype="multipart/form-data" method="post" style="margin: auto;">
                  
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group" style="margin-bottom: 20px;">
                    <span class="input-group-addon"><i class="far fa-paper-plane"></i></span>
                    <div class="form-group" >
                      <select class="form-control" style="color:black;" name="ukmukk" required>
                        <option disabled selected>UKM & UKK</option>
                        <?php foreach ($semua_ukmukk->result_array() as $i): $semua_ukmukk=$i['kode_ukmukk'];?>
                        <option value="<?php echo $semua_ukmukk;?>" style="color:black;"><?php echo $semua_ukmukk=$i['nama_ukmukk'];?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-portrait"></i></span>
                      <input type="number"  style="height: 45px;" class="form-control" name="nim" id="nim" placeholder="NIM" autocomplete="off" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-signature"></i></span>
                      <input type="text" style="height: 45px;" class="form-control" name="nama" id="nama" placeholder="Nama lengkap"autocomplete="off" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-calendar-day"></i></span>
                      <input type="text" style="height: 45px;" class="form-control" name="ttl" id="ttl" placeholder="Tempat, Tanggal Lahir"autocomplete="off" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-venus-mars"></i></span>
                      <div class="form-group">
                        <select class="form-control" name="jk" required>
                          <option disabled selected>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                      <input type="text" style="height: 45px;" class="form-control" name="domisili" id="domisili" placeholder="Alamat Domisili"autocomplete="off" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-phone-alt"></i></span>
                      <input type="number" style="height: 45px;" class="form-control" name="no_kontak" id="no_kontak" placeholder="No Telepon"autocomplete="off" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <small class="text-decoration" style="color:black;"><b>Upload gambar diri, maksimal 2MB</b></small></t>
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-image"></i></span>
                      <input type="file" style="height: 45px;" class="form-control" name="gambar" id="gambar" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fab fa-accusoft"></i></span>
                      <div class="form-group">
                        <select class="form-control" name="jurusan" required>
                          <option disabled selected>Jurusan</option>
                          <?php foreach ($jrsn->result_array() as $i): $jrsn=$i['kode_jurusan'];?>
                              <option value="<?php echo $jrsn;?>"><?php echo $jrsn=$i['kode_jurusan'];?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="fas fa-university"></i></span>
                      <div class="form-group">
                        <select class="form-control" name="parent_fakultas" required>
                          <option disabled selected>Fakultas</option>
                          <?php foreach ($fak->result_array() as $i): $fak=$i['kode_fakultas'];?>
                          <option value="<?php echo $fak;?>"><?php echo $fak=$i['nama_fakultas'];?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group" style="margin-bottom: 20px;">
                      <span class="input-group-addon"><i class="far fa-lightbulb"></i></span>
                      <input type="text" style="height: 45px;" class="form-control" name="alasan" id="alasan" placeholder="Alasan bergabung" autocomplete="off" required/>
                      <div class="validation"></div>
                    </div>
                  </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                      <button type="submit" class="buttonbtn btn-primary btn-submit text-center tombol-yakin">Daftar</button>
                    </div>
                  
                  </form>
                </div>
              </div>
            <!-- </div> -->
        </div>
    </div>
  </section>
<footer>
		<div class="footer" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<img src="<?php echo base_url('assets/img/uinlogo.png')?>"
							style="width:110px;height:160px; margin: auto;">
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
								<h5> <a href="<?php echo base_url().'c_home/index';?>">Tentang SIMARWAH</a> </h5>
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
