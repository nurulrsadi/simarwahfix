  </header>
  <!-- Content -->
  <section>
  	<header class="main">

  	</header>

  	<div class="main-content">
        
  		<h3>Buat keluhan</h3>
  		<hr />
        <?= $msg;?>
  		<div class="box-body">
        <?php foreach($userlogin->result_array() as $i ):
          $user_login=$i['kode_himp'];
        ?>
        <br>
  			<form class="form-horizontal" action="<?php echo base_url().'ormawa/do_keluhan';?>"
  				enctype="multipart/form-data" method="post">
  				<input type="hidden" name="tanggal" value="<?= date('Y-m-d');?>">
  				<div class="form-group row">
  					<label for="namaormawa" class="col-sm-2 col-form-label">Nama ORMAWA</label>
  					<div class="col-sm-5">
  						<input type="text" id="namaormawa" name="namaormawa" class="form-control-plaintext" value="<?= $user_login; ?>" readonly>
  					</div>
  				</div>
  				<div class="form-group row">
      				<label for="isikeluhan" class="col-sm-2 col-form-label">Isi Keluhan</label>
      				<div class="col-sm-5">
      				    <textarea class="form-control" name="isikeluhan" id="isikeluhan" rows="3" required>
                        </textarea>
      				</div>
  				</div>
  				<br>
  				<div class="row gtr-200">
  					<div class="col-2 col-12-medium">
  					</div>
  					<div class=" col-12-medium">
  						<p><button type="submit" class="btn-succes">Kirim</button></p>
  					</div>
  			</form>
  		</div>
  	</div>
  </section>
  </div>
  </div>
  <?php endforeach;?>
