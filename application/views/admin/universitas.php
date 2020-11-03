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
    							<th>Jurusan</th>
    							<th>Nama Himpunan</th>
                  <th>Deskripsi</th>                                    							
    							<th>Image</th>
    							<th>Aksi</th>
    						</tr>
              </thead>
              
    					<?php 
                  foreach($univ->result_array() as $i):
                    $kode_himpunan=$i['kode_himpunan'];
                    $nama_himpunan=$i['nama_himpunan'];
                    $deskripsi=$i['desc_himpunan'];
                    $image=$i['image'];
                    ?>
    					<tbody>
    						<tr>
    							<!-- <td><center><?php echo $no++ ?></center></td> -->  							
    							<td><?php echo $nama_himpunan ?></td>
                  <td><?php echo $kode_himpunan ?></td>
                  <td><?php echo $deskripsi ?></td>                                
    							
    							<td>
    								<img width="100" height="100" src="<?php echo base_url('assets/img/jurusan/').$image?>">
    							</td>
    							<td>
    								<center>
                      <span data-toggle="tooltip" data-placement="bottom">
    									<button class="btn btn-warning" data-toggle="modal"
    										data-target="#modaledithimpunan<?php echo $kode_himpunan;?>"title="Edit"><i class="far fa-edit" style="color: white;"></i></button>
    									<button class="btn btn-danger" data-toggle="modal"
    										data-target="#modal_delete<?php echo $kode_himpunan;?>" title="Delete"><i class="far fa-trash-alt" style="color: white;"></i></button>
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
                        <div class="form-group ">
                            <label>Jurusan</t></label>
                            </t><input type="text" name="nama_himpunan" class="form-control"value="" required autocomplete="off">
                        </div>
    					<div class="form-group">
    						<label>Nama Himpunan</t></label>
    						</t><input type="text" name="kode_himpunan" class="form-control" value=""  style="text-transform:uppercase"  required autocomplete="off">
    					</div>
    					<div class="form-group">
                  <label>Deskripsi Himpunan</t></label>
                  </t><input type="text" name="desc_himpunan" class="form-control" value="" required autocomplete="off">
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
    <!-- Edit Modal  -->
    <?php
        foreach($univ->result_array() as $i):
            $kode_himpunan=$i['kode_himpunan'];
                    $nama_himpunan=$i['nama_himpunan'];
                    $deskripsi=$i['desc_himpunan'];
                    $visi=$i['visi'];
                    $misi=$i['misi'];
                    $image=$i['image'];
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
                        <div class="form-group ">
                            <label>Jurusan</t></label>
                            </t><input type="text" name="nama_himpunan" class="form-control" value="<?php echo $nama_himpunan;?>"
                                required>
                        </div>
    					<div class="form-group">
    						<label>Nama Himpunan</t></label>
    						</t><input type="text" name="kode_himpunan" class="form-control" value="<?php echo $kode_himpunan;?>"
    							required readonly>
    					</div>    					
    					<div class="form-group ">
    						<label>
    							Deskripsi</t></label>
    						</t><input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi;?>">
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
        foreach($univ->result_array() as $i):
                    $kode_himpunan=$i['kode_himpunan'];
                    $nama_himpunan=$i['nama_himpunan'];
                    $deskripsi=$i['desc_himpunan'];
                    $visi=$i['visi'];
                    $misi=$i['misi'];
                    $image=$i['image'];
        ?>
    <div class="modal fade" id="modal_delete<?php echo $kode_himpunan;?>" tabindex="-1" role="dialog"
    	aria-labelledby="largeModal" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="myModalLabel">Delete Data Himpunan</h5>
    			</div>
    			<div class="modal-body">
    				<h6>Kode Himpunan : <?php echo $kode_himpunan;?></h6>
    				<h6>Nama Himpunan : <?php echo $nama_himpunan;?></h6><br>
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
