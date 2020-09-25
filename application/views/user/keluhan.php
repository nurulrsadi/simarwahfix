  </header>
  <!-- Content -->
  <section>
  	<header class="main">

  	</header>

  	<div class="main-content">

  		<h3>Buat keluhan</h3>
  		<hr />

  		<div class="box-body">
  			<?php
      foreach($ormawa->result_array() as $i):
          $kd_jrsn=$i['kd_jrsn'];
          $kd_fklts=$i['kd_fklts'];
  ?>
  			<form class="form-horizontal" action="<?php echo base_url().'ormawa/do_keluhan';?>"
  				enctype="multipart/form-data" method="post">
  				<input type="hidden" name="tanggal" value="<?= date('Y-m-d');?>">
  				<input type="hidden" name="kd_fklts" value="<?= $kd_fklts;?>">
  				<div class="form-group">
  					<label for="namaormawa" class="col-sm-2 col-form-label">Nama ORMAWA</label>
  					<div class="col-sm-10">
  						<input type="text" id="namaormawa" name="kd_jrsn" class="form-control" value="<?= $kd_jrsn; ?>" readonly>
  					</div>
  				</div>
  				<div class=" form-group">
  					<label for="isikeluhan" class="col-sm-2 col-form-label">Isi Keluhan</label>
  					<div class="col-sm-10">
  						<input type="text" name="isikeluhan" id="isikeluhan" class="form-control" required>
  					</div>
  				</div>
  				<br>
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
  						<!-- <a href="<?php echo base_url().'c_user/Verifikasi_Data';?>"> -->
  						<p><button type="submit" class="btn-succes">Kirim</button></p>
  						<!-- </a> -->
  					</div>
  					<!-- <p>< button type="submit" class="btn btn-succes" ">Kirim</button></p> -->
  			</form>
  		</div>
  	</div>
  </section>
  </div>
  </div>
  <?php endforeach;?>
