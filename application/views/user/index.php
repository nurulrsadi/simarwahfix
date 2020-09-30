  <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
  </header>

  <section>
  	<header class="main">
  	</header>

  	<div class="features">
  		<article>
  			<div class="flash-user-update" data-flashdata="<?= $this->session->flashdata('flashdatauser');  ?>"></div>
  			<?php if($this->session->flashdata('flashdatauser')): ?>
  			<?php endif; ?>
  			<div class="content">
  				<h2>HI, <?php echo strtoupper($this->session->userdata('username')) ?> !</h2>
  				<p>Anda diharuskan Update Profile terlebih dahulu agar dapat melakukan akses ke menu lainnya.</p>
  			</div>
  		</article>
  		<article>
  			<div class="content">
  				<img src="<?php echo base_url('assets/img/profile.png')?>" class="img-fluid" alt="Responsive image"
  					width="100%">
  			</div>
  		</article>
  	</div>
  	<center>
  		<div class="col-md-12">
  			<?php
                    foreach($datahimpunan->result_array() as $i):
                        $kode_himpunan=$i['kode_himpunan'];
                        $nama_himpunan=$i['nama_himpunan'];
                        $deskripsi=$i['desc_himpunan'];
                        $visi=$i['visi'];
                        $misi=$i['misi'];
                                    ?>
  			<h1><?php echo $kode_himpunan?></h1>
  			<h3><?php echo $deskripsi?></h3>
  		</div>
  	</center>
  	<hr>
  	<div class="features">
  		<article>
  			<div class="content">
  				<center>
  					<h3>Visi</h3>
  					<p><?php echo $visi?></p>
  				</center>
  			</div>
  		</article>
  		<article>
  			<div class="content">
  				<center>
  					<h3>Misi</h3>
  					<p><?php echo $misi?></p>
  				</center>
  			</div>
  		</article>
  	</div>
  	<?php endforeach;?>
  	<a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_visimisi">Update Visi Misi</a>
  	<a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_bidang">Tambah Bidang</a>
  	<a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_new">Tambah Data Anggota</a>
  	<!-- <button type="button" class="btn" data-toggle="modal" data-target="#modal_add_new">Tambah Data Anggota</button> -->
  	<br>
  	<br>
  	<div>
  		<h5>Daftar Bidang</h5>
  	</div>
  	<div class="card card-body">
  		<div class="table-responsive">
  			<table class="content-table" id="dataTable" width="100%" cellspacing="0">
  				<thead>
  					<tr>
  						<!-- <th><center>No</center></th> -->
  						<th>Kode Bidang</th>
  						<th>Label</th>
  						<th>Nama Bidang</th>
  						<th>Kode Himpunan</th>
  						<th>Logo</th>
  						<th>
  							<center>Aksi</center>
  						</th>
  					</tr>
  				</thead>
  				<!-- sampai sini back -->
  				<?php
                foreach($bidangbidang->result_array() as $i):
                    $kode=$i['kode_bidang'];
                    $label=$i['label_bidang'];
                    $nama=$i['desc_bidang'];
                    $himpunan=$i['parent_himpunan'];
                    $logo=$i['image'];
                    ?>
  				<tbody>
  					<tr>
  						<!-- <td><center><?php echo $no++ ?></center></td> -->
  						<td><?php echo $kode ?></td>
  						<td><?php echo $label ?></td>
  						<td><?php echo $nama ?></td>
  						<td><?php echo $himpunan ?></td>
  						<td>
  							<img width="100" height="100" src="<?php echo base_url('assets/img/bidang/').$logo?>">
  						</td>
  						<td>
  							<center>
  								<a class="btn btn-warning" data-toggle="modal"
  									data-target="#modal_update_bidang<?php echo $kode;?>">Edit</a>
  								<a class="btn btn-danger" data-toggle="modal"
  									data-target="#modal_delete_bidang<?php echo $kode;?>">Delete</a>
  							</center>
  						</td>
  					</tr>
  				</tbody>
  				<?php endforeach;?>
  			</table>
  		</div>

  	</div>
  	<div>
  		<h5>Anggota Himpunan</h5>
  	</div>
  	<div class="card card-body">
  		<div class="table-responsive">
  			<table class="content-table" id="dataTable" width="100%" cellspacing="0">
  				<thead>
  					<tr>
  						<!-- <th><center>No</center></th> -->
  						<th>Nama</th>
  						<th>NIM</th>
  						<th>Himpunan</th>
  						<th>Bidang</th>
  						<th>Jabatan</th>
  						<th>
  							<center>Aksi</center>
  						</th>
  					</tr>
  				</thead>
  				<!-- sampai sini back -->
  				<?php 
                  foreach($anggota->result_array() as $i):
                    $nim=$i['nim'];
                    $nama=$i['nama'];
                    $himpunan=$i['parent_himpunan'];
                    $bidang=$i['parent_bidang'];
                    $jabatan=$i['jabatan'];
                    ?>
  				<tbody>
  					<tr>
  						<!-- <td><center><?php echo $no++ ?></center></td> -->
  						<td><?php echo $nama ?></td>
  						<td><?php echo $nim ?></td>
  						<td><?php echo $himpunan ?></td>
  						<td><?php echo $bidang ?></td>
  						<td><?php echo $jabatan ?></td>
  						<td>
  							<center>
  								<a class="btn btn-warning" data-toggle="modal"
  									data-target="#modal_edit_new<?php echo $nim;?>">Edit</a>
  								<a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $nim;?>">Delete</a>
  							</center>
  						</td>
  					</tr>
  				</tbody>
  				<?php endforeach;?>
  			</table>
  		</div>

  	</div>
  </section>

  <!-- Modal Delete -->
  <?php
        foreach($anggota->result_array() as $i):
            $nim=$i['nim'];
            $nama=$i['nama'];
            $bidangcurrent=$i['parent_bidang'];
            $jabatan=$i['jabatan'];
        ?>
  <div class="modal fade" id="modal_delete<?php echo $nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  	aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Delete Data Anggota</h3>
  			</div>
  			<div class="modal-body">
  				<h4>Nama : <?php echo $nama;?></h4>
  				<h4>Bidang : <?php echo $bidangcurrent;?></h4>
  				<h4>Jabatan : <?php echo $jabatan;?></h4>
  				<center>
  					<a class="btn btn-danger" href="<?php echo base_url('c_user/delete_data_anggota/'.$nim); ?>">Lanjutkan</a>
  				</center>
  			</div>
  		</div>
  	</div>
  </div>
  <?php endforeach;?>
  <!-- End Modal Delete -->
  <!-- Modal Add Visi Misi -->
  <?php
    foreach($datahimpunan->result_array() as $i):
        $kode_himpunan=$i['kode_himpunan'];
        $nama_himpunan=$i['nama_himpunan'];
        $visi=$i['visi'];
        $misi=$i['misi']; ?>
  <div class="modal fade" id="modal_add_visimisi" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  	aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Tambah Visi Misi</h3>
  			</div>
  			<form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_visi_misi'?>">
  				<div class="modal-body">

  					<div class="form-group">
  						<label class="control-label col-xs-3">Visi</label>
  						<div class="col-xs-8">
  							<input value="<?php echo $visi;?>" name="visi" class="form-control" type="text"
  								placeholder="Visi Himpunan" required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Misi</label>
  						<div class="col-xs-8">
  							<input value="<?php echo $misi;?>" name="misi" class="form-control" type="text"
  								placeholder="Misi Himpunan" required>
  						</div>
  					</div>

  				</div>

  				<div class="modal-footer">
  					<button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
  					<button type="submit" class="btn ">Save</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
  <?php endforeach;?>
  <!-- End Modal Add Visi Misi -->

  <!-- Tambah Bidang -->
  <div class="modal fade" id="modal_add_bidang" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  	aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Tambah Bidang</h3>
  			</div>
  			<form class="form-horizontal" action="<?php echo base_url().'c_user/tambah_bidang';?>"
  				enctype="multipart/form-data" method="post">
  				<div class="modal-body">
  					<div class="form-group">
  						<label class="control-label col-xs-3">Logo Bidang</label>
  						<div class="col-xs-8">
  							<input class="form-control" type="file" name="image" required>
  						</div>
  					</div>
  					<div class="form-group">
  						<label class="control-label col-xs-3">Kode Bidang</label>
  						<div class="col-xs-8">
  							<input value="" name="kode_bidang" class="form-control" type="text" placeholder="Kode Bidang" required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Label Bidang</label>
  						<div class="col-xs-8">
  							<input value="" name="label_bidang" class="form-control" type="text" placeholder="Label Bidang"
  								required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Nama Bidang</label>
  						<div class="col-xs-8">
  							<input value="" name="nama_bidang" class="form-control" type="text" placeholder="Nama Bidang" required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Himpunan</label>
  						<div class="col-xs-8">
  							<select class="form-control" name="parent_himpunan" id="category">
  								<option value="">No Selected</option>
  								<?php
                                        foreach($datahimpunan->result_array() as $i):
                                            $himpunan=$i['kode_himpunan'];
                                            ?>
  								<option value="<?php echo $kode_himpunan;?>"><?php echo $himpunan;?></option>
  								<?php endforeach;?>
  							</select>
  						</div>
  					</div>
  				</div>

  				<div class="modal-footer">
  					<button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
  					<button type="submit" class="btn ">Save</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!-- End Tambah Bidang -->

  <!-- Modal Edit Bidang -->
  <?php
        foreach($bidangbidang->result_array() as $i):
            $kode_bidang=$i['kode_bidang'];
            $label_bidang=$i['label_bidang'];
            $nama_bidang=$i['desc_bidang'];
            $image=$i['image'];
            $kode_himpunan=$i['parent_himpunan'];
        ?>
  <div class="modal fade" id="modal_update_bidang<?php echo $kode_bidang;?>" tabindex="-1" role="dialog"
  	aria-labelledby="largeModal" aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Edit Bidang <?php echo $label_bidang;?></h3>
  			</div>
  			<form class="form-horizontal" action="<?php echo base_url().'c_user/update_data_bidang';?>"
  				enctype="multipart/form-data" method="post">
  				<div class="modal-body">
  					<input type="hidden" name="imageold" value="<?php echo $image;?>">
  					<div class="form-group">
  						<label class="control-label col-xs-3">Logo Bidang</label>
  						<div class="col-xs-8">
  							<input class="form-control" type="file" name="image">
  						</div>
  					</div>
  					<div class="form-group">
  						<label class="control-label col-xs-3">Kode Bidang</label>
  						<div class="col-xs-8">
  							<input value="<?php echo $kode_bidang;?>" name="kode_bidang" class="form-control" type="text"
  								placeholder="Kode Bidang" readonly required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Label Bidang</label>
  						<div class="col-xs-8">
  							<input value="<?php echo $label_bidang;?>" name="label_bidang" class="form-control" type="text"
  								placeholder="Label Bidang">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Nama Bidang</label>
  						<div class="col-xs-8">
  							<input value="<?php echo $nama_bidang;?>" name="nama_bidang" class="form-control" type="text"
  								placeholder="Nama Bidang">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Kode Himpunan</label>
  						<div class="col-xs-8">
  							<input value="<?php echo $kode_himpunan;?>" name="parent_himpunan" class="form-control" type="text"
  								placeholder="Kode Himpunan" readonly>
  						</div>
  					</div>
  				</div>

  				<div class="modal-footer">
  					<button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
  					<button type="submit" class="btn ">Update</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
  <?php endforeach;?>
  <!-- End Modal Edit Bidang -->
  <!--Modal Delete Bidang-->
  <?php
        foreach($bidangbidang->result_array() as $i):
            $kode_bidang=$i['kode_bidang'];
            $label_bidang=$i['label_bidang'];
            $nama_bidang=$i['desc_bidang'];
            $image=$i['image'];
            $kode_himpunan=$i['parent_himpunan'];
        ?>
  <div class="modal fade" id="modal_delete_bidang<?php echo $kode_bidang;?>" tabindex="-1" role="dialog"
  	aria-labelledby="largeModal" aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Delete Data Anggota</h3>
  			</div>
  			<div class="modal-body">
  				<center> <img width="80" height="80" style="border-radius: 50px"
  						src="<?php echo base_url('assets/img/bidang/').$logo?>"></center>
  				<center>
  					<h4>Nama Bidang : <?php echo $label_bidang;?> - <?php echo $nama_bidang;?></h4>
  				</center>
  				<center>
  					<a class="btn btn-danger"
  						href="<?php echo base_url('c_user/delete_data_bidang/'.$kode_bidang); ?>">Lanjutkan</a>
  				</center>
  			</div>
  		</div>
  	</div>
  </div>
  <?php endforeach;?>
  <!--Akhir Modal Delete Bidang-->

  <!-- ============ MODAL ADD Anggota =============== -->
  <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  	aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Tambah Data Anggota</h3>
  			</div>
  			<form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_data_anggota'?>">
  				<div class="modal-body">

  					<div class="form-group">
  						<label class="control-label col-xs-3">NIM</label>
  						<div class="col-xs-8">
  							<input name="nim" class="form-control" type="text" placeholder="NIM Mahasiswa" required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Nama</label>
  						<div class="col-xs-8">
  							<input name="nama" class="form-control" type="text" placeholder="Nama Anggota" required>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Jenis Kelamin</label>
  						<div class="col-xs-8">
  							<select name="jenis_kelamin" class="form-control">
  								<option value="">No Selected</option>
  								<option value="L">Laki - laki</option>
  								<option value="P">Perempuan</option>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Alamat</label>
  						<div class="col-xs-8">
  							<input name="alamat" class="form-control" type="text" placeholder="Alamat Domisili">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Kontak</label>
  						<div class="col-xs-8">
  							<input name="kontak" class="form-control" type="text" placeholder="Kontak Hp / WA">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Email</label>
  						<div class="col-xs-8">
  							<input name="email" class="form-control" type="text" placeholder="Email">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Jabatan</label>
  						<div class="col-xs-8">
  							<select name="jabatan" class="form-control" required>
  								<option value="">No Selected</option>
  								<option value="KETUA">Ketua Umum</option>
  								<option value="SEKRETARIS">Sekretaris Umum</option>
  								<option value="BENDAHARA">Bendahara Umum</option>
  								<option value="KETUA BIDANG">Ketua Bidang</option>
  								<option value="ANGGOTA">Anggota</option>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Himpunan</label>
  						<div class="col-xs-8">
  							<select class="form-control" name="parent_himpunan" id="category">
  								<option value="">No Selected</option>
  								<?php
                                        foreach($datahimpunan->result_array() as $i):
                                            $himpunan=$i['kode_himpunan'];
                                            ?>
  								<option value="<?php echo $kode_himpunan;?>"><?php echo $himpunan;?></option>
  								<?php endforeach;?>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Bidang</label>
  						<div class="col-xs-8">
  							<select class="form-control" name="parent_bidang" id="category" required>
  								<option value="">No Selected</option>
  								<?php
                                        foreach($bidangbidang->result_array() as $i):
                                            $label_bidang=$i['label_bidang'];
                                            $kode_bidang=$i['kode_bidang'];
                                        ?>
  								<option value="<?php echo $kode_bidang;?>"><?php echo $label_bidang;?></option>
  								<?php endforeach;?>
  							</select>
  						</div>
  					</div>
  				</div>

  				<div class="modal-footer">
  					<button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
  					<button type="submit" class="btn ">Save changes</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!--END MODAL ADD BARANG-->
  <!-- Start Modal Edit -->
  <?php
        foreach($anggota->result_array() as $i):
            $nim=$i['nim'];
            $nama=$i['nama'];
            $himpunan=$i['parent_himpunan'];
            $bidangcurrent=$i['parent_bidang'];
            $jabatan=$i['jabatan'];
            $alamat=$i['alamat'];
            $kontak=$i['kontak'];
            $email=$i['email'];
            $jenis_kelamin=$i['jenis_kelamin'];
        ?>
  <div class="modal fade" id="modal_edit_new<?php echo $nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  	aria-hidden="true">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h3 class="modal-title" id="myModalLabel">Edit Data <?php echo $nama;?></h3>
  			</div>
  			<form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_data_anggota'?>">
  				<div class="modal-body">

  					<div class="form-group">
  						<label class="control-label col-xs-3">NIM</label>
  						<div class="col-xs-8">
  							<input name="nim" value="<?php echo $nim;?>" class="form-control" type="text"
  								placeholder="NIM Mahasiswa" required readonly>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Nama Anggota</label>
  						<div class="col-xs-8">
  							<input name="nama" value="<?php echo $nama;?>" class="form-control" type="text" placeholder="Nama"
  								required>
  						</div>
  					</div>

  					<!-- Jenis Kelamin -->
  					<div class="form-group">
  						<label class="control-label col-xs-3">Jenis Kelamin</label>
  						<div class="col-xs-8">
  							<select name="jenis_kelamin" class="form-control">
  								<option value="">-PILIH-</option>
  								<?php if($jenis_kelamin == 'L'):?>
  								<option value="L" selected>Laki - Laki</option>
  								<?php elseif($jenis_kelamin == 'P'):?>
  								<option value="P" selected>Perempuan</option>
  								<?php else:?>
  								<option value="L">Laki - laki</option>
  								<option value="P">Perempuan</option>
  								<?php endif;?>
  							</select>
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Alamat</label>
  						<div class="col-xs-8">
  							<input name="alamat" value="<?php echo $alamat;?>" class="form-control" type="text"
  								placeholder="Alamat Domisili">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Kontak</label>
  						<div class="col-xs-8">
  							<input name="kontak" value="<?php echo $kontak;?>" class="form-control" type="text"
  								placeholder="Kontak Nomor Hp / WA">
  						</div>
  					</div>

  					<div class="form-group">
  						<label class="control-label col-xs-3">Email</label>
  						<div class="col-xs-8">
  							<input name="email" value="<?php echo $email;?>" class="form-control" type="text" placeholder="Email">
  						</div>
  					</div>

  					<!-- Jabatan -->
  					<div class="form-group">
  						<label class="control-label col-xs-3">Jabatan</label>
  						<div class="col-xs-8">
  							<select name="jabatan" class="form-control" required>
  								<option value="">-PILIH-</option>
  								<?php if($jabatan == 'KETUA'):?>
  								<option value="KETUA" selected>Ketua Umum</option>
  								<option value="SEKRETARIS">Sekretaris Umum</option>
  								<option value="BENDAHARA">Bendahara Umum</option>
  								<option value="KETUA BIDANG">Ketua Bidang</option>
  								<option value="ANGGOTA">Anggota</option>
  								<?php elseif($jabatan == 'SEKRETARIS'):?>
  								<option value="KETUA">Ketua Umum</option>
  								<option value="SEKRETARIS" selected>Sekretaris Umum</option>
  								<option value="BENDAHARA">Bendahara Umum</option>
  								<option value="KETUA BIDANG">Ketua Bidang</option>
  								<option value="ANGGOTA">Anggota</option>
  								<?php elseif($jabatan == 'BENDAHARA'):?>
  								<option value="KETUA">Ketua Umum</option>
  								<option value="SEKRETARIS">Sekretaris Umum</option>
  								<option value="BENDAHARA" selected>Bendahara Umum</option>
  								<option value="KETUA BIDANG">Ketua Bidang</option>
  								<option value="ANGGOTA">Anggota</option>
  								<?php elseif($jabatan == 'KETUA BIDANG'):?>
  								<option value="KETUA">Ketua Umum</option>
  								<option value="SEKRETARIS">Sekretaris Umum</option>
  								<option value="BENDAHARA">Bendahara Umum</option>
  								<option value="KETUA BIDANG" selected>Ketua Bidang</option>
  								<option value="ANGGOTA">Anggota</option>
  								<?php elseif($jabatan == 'ANGGOTA'):?>
  								<option value="KETUA">Ketua Umum</option>
  								<option value="SEKRETARIS">Sekretaris Umum</option>
  								<option value="BENDAHARA">Bendahara Umum</option>
  								<option value="KETUA BIDANG">Ketua Bidang</option>
  								<option value="ANGGOTA" selected>Anggota</option>
  								<?php else:?>
  								<option value="KETUA">Ketua Umum</option>
  								<option value="SEKRETARIS">Sekretaris Umum</option>
  								<option value="BENDAHARA">Bendahara Umum</option>
  								<option value="KETUA BIDANG">Ketua Bidang</option>
  								<option value="ANGGOTA">Anggota</option>
  								<?php endif;?>
  							</select>
  						</div>
  					</div>


  					<div class="form-group">
  						<label class="control-label col-xs-3">Himpunan</label>
  						<div class="col-xs-8">
  							<input name="parent_himpunan" value="<?php echo $himpunan;?>" class="form-control" type="text"
  								placeholder="Himpunan" required disabled>
  						</div>
  					</div>

  					<!-- Bidang -->
  					<div class="form-group">
  						<label class="control-label col-xs-3">Bidang</label>
  						<div class="col-xs-8">
  							<select name="parent_bidang" class="form-control" required>
  								<?php
                                   foreach($bidangbidang->result_array() as $i):
                                            $label_bidang=$i['label_bidang'];
                                            $kode_bidang=$i['kode_bidang'];
                                        ?>
  								<?php if($bidangcurrent == $kode_bidang):?>
  								<option value="<?php echo $kode_bidang;?>" selected><?php echo $label_bidang;?></option>
  								<?php else:?>
  								<option value="<?php echo $kode_bidang;?>"><?php echo $label_bidang;?></option>
  								<?php endif;?>
  								<?php endforeach;?>
  							</select>
  						</div>
  					</div>


  				</div>

  				<div class="modal-footer">
  					<button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
  					<button type="submit" class="btn ">Update changes</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>

  <?php endforeach;?>
  <!-- End Modal Edit -->
  <script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
  <script>
  	$(document).ready(function () {
  		$('#mydata').DataTable();
  	});

  </script>
  </div>
  </div>
