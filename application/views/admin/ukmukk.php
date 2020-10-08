    <!-- Begin Page Content -->
    <div class="container-fluid">

    	<!-- Page Heading -->
    	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
    			data-target="#modaltambahhimpunan"><i class="fa fa-user-plus"></i> Tambah Himpunan</a>
    	</div>

    	<!-- DataTales Example -->
    	<div class="card shadow mb-4">
    		<div class="card-header py-3">
    			<h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
    			<div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashormawahimp');  ?>"></div>
    			<?php if($this->session->flashdata('flashormawahimp')): ?>
    			<?php endif; ?>
    		</div>
    		<div class="card-body">
    			<div class="table-responsive">
    				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    					<thead>
    						<tr>
    							<th>Fakultas</th>
    							<th>Kode Himpunan</th>
    							<th>Nama Himpunan</th>
    							<th>Deskripsi</th>
    							<th>Visi</th>
    							<th>Misi</th>
    							<th>Image</th>
    							<th>Aksi</th>
    						</tr>
              </thead>
              
    					<?php 
                  foreach($ukmukk->result_array() as $i):
                    $kode_himpunan=$i['kode_himpunan'];
                    $nama_himpunan=$i['nama_himpunan'];
                    $nama_fakultas=$i['nama_fakultas'];
                    $deskripsi=$i['desc_himpunan'];
                    $visi=$i['visi'];
                    $misi=$i['misi'];
                    $image=$i['image'];
                    $fakultas=$i['parent_fakultas'];
                    ?>
    					<tbody>
    						<tr>
    							<!-- <td><center><?php echo $no++ ?></center></td> -->
    							<td><?php echo $nama_fakultas ?></td>
    							<td><?php echo $kode_himpunan ?></td>
    							<td><?php echo $nama_himpunan ?></td>
    							<td><?php echo $deskripsi ?></td>
    							<td><?php echo $visi ?></td>
    							<td><?php echo $misi ?></td>
    							<td>
    								<img width="100" height="100" src="<?php echo base_url('assets/img/jurusan/').$image?>">
    							</td>
    							<td>
    								<center>
    									<a class="btn btn-warning" data-toggle="modal"
    										data-target="#modaledithimpunan<?php echo $kode_himpunan;?>">Edit</a>
    									<a class="btn btn-danger" data-toggle="modal"
    										data-target="#modal_delete<?php echo $kode_himpunan;?>">Delete</a>
    								</center>
    							</td>
    						</tr>
    					</tbody>
    					<?php endforeach;?>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Modal Tambah Fakultas -->
    <div class="modal fade" id="modaltambahhimpunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    	aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Input Himpunan</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/tambah_data_himpunan'?>"
    					enctype="multipart/form-data">
    					<div class="form-group">
    						<label>Kode Himpunan</t></label>
    						</t><input type="text" name="kode_himpunan" class="form-control" value="" required>
    					</div>
    					<div class="form-group ">
    						<label>Nama Himpunan</t></label>
    						</t><input type="text" name="nama_himpunan" class="form-control" value="" required>
    					</div>
    					<div class="form-group ">
    						<label>
    							Deskripsi</t></label>
    						</t><input type="text" name="deskripsi" class="form-control" value="">
    					</div>
    					<div class="form-group ">
    						<label>Visi</t></label>
    						</t><input type="text" name="visi" class="form-control" value="">
    					</div>
    					<div class="form-group ">
    						<label>Misi</t></label>
    						</t><input type="text" name="misi" class="form-control" value="">
    					</div>

    					<div class="form-group ">
    						<label>Fakultas</label>
    						<select class="form-control" name="parent_fakultas">
    							<option value="">No Selected</option>
    							<?php foreach ($fak->result_array() as $i): $fak=$i['kode_fakultas'];?>
    							<option value="<?php echo $fak;?>"><?php echo $fak=$i['nama_fakultas'];?></option>
    							<?php endforeach ?>
    						</select>
    					</div>
    					<div class="form-group ">
    						<label>Logo Himpunan</t></label>
    						</t><input type="file" name="image" class="form-control" value="" required>
    					</div>
    					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    					<button type="submit" class="btn btn-primary">Save changes</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Akhir Modal Tambah  -->
    <!-- Edit Modal Fakultas -->
    <?php
        foreach($ukmukk->result_array() as $i):
            $kode_himpunan=$i['kode_himpunan'];
                    $nama_himpunan=$i['nama_himpunan'];
                    $deskripsi=$i['desc_himpunan'];
                    $visi=$i['visi'];
                    $misi=$i['misi'];
                    $image=$i['image'];
                    $fakultas=$i['parent_fakultas'];
        ?>
    <div class="modal fade" id="modaledithimpunan<?php echo $kode_himpunan;?>" tabindex="-1" role="dialog"
    	aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Update Himpunan</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/edit_data_himpunan'?>"
    					enctype="multipart/form-data">
    					<div class="form-group">
    						<label>Kode Himpunan</t></label>
    						</t><input type="text" name="kode_himpunan" class="form-control" value="<?php echo $kode_himpunan;?>"
    							required readonly>
    					</div>
    					<div class="form-group ">
    						<label>Nama Himpunan</t></label>
    						</t><input type="text" name="nama_himpunan" class="form-control" value="<?php echo $nama_himpunan;?>"
    							required>
    					</div>
    					<div class="form-group ">
    						<label>
    							Deskripsi</t></label>
    						</t><input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi;?>">
    					</div>
    					<div class="form-group ">
    						<label>Visi</t></label>
    						</t><input type="text" name="visi" class="form-control" value="<?php echo $visi;?>">
    					</div>
    					<div class="form-group ">
    						<label>Misi</t></label>
    						</t><input type="text" name="misi" class="form-control" value="<?php echo $misi;?>">
    					</div>
    					<div class="form-group ">
    						<label>Fakultas</t></label>
    						</t><input type="text" name="parent_fakultas" class="form-control" value="<?php echo $fakultas;?>"
    							readonly>
    					</div>
    					<div class="form-group ">
    						<label>Logo Himpunan</t></label>
    						</t><input type="file" name="image" class="form-control" value="<?php echo $image;?>">
    					</div>
    					<input type="hidden" name="imageold" value="<?php echo $image;?>">
    					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    					<button type="submit" class="btn btn-primary">Update changes</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>
    <!-- Akhir Modal Edit -->

    <!-- Modal Delete -->
    <?php
        foreach($ukmukk->result_array() as $i):
                    $kode_himpunan=$i['kode_himpunan'];
                    $nama_himpunan=$i['nama_himpunan'];
                    $deskripsi=$i['desc_himpunan'];
                    $visi=$i['visi'];
                    $misi=$i['misi'];
                    $image=$i['image'];
                    $fakultas=$i['parent_fakultas'];
        ?>
    <div class="modal fade" id="modal_delete<?php echo $kode_himpunan;?>" tabindex="-1" role="dialog"
    	aria-labelledby="largeModal" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h3 class="modal-title" id="myModalLabel">Delete Data Himpunan</h3>
    			</div>
    			<div class="modal-body">
    				<h4>Kode Himpunan : <?php echo $kode_himpunan;?></h4>
    				<h4>Nama Himpunan : <?php echo $nama_himpunan;?></h4>
    				<center>
    					<a class="btn btn-danger"
    						href="<?php echo base_url('c_admin/delete_data_himpunan/'.$kode_himpunan); ?>">Lanjutkan</a>
    				</center>
    			</div>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>
    <!-- Akhir Modal Delete -->
