    <!-- Begin Page Content -->
    <div class="container-fluid">

    	<!-- Page Heading -->
    	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
    			data-target="#modaltambahfakultas"><i class="fa fa-user-plus"></i> Tambah Fakultas</a>
    	</div>

    	<!-- DataTales Example -->
    	<div class="card shadow mb-4">
    		<div class="card-header py-3">
    			<h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
    			<div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashormawa');  ?>"></div>
    			<?php if($this->session->flashdata('flashormawa')): ?>
    			<?php endif; ?>
    		</div>
    		<div class="card-body">
    			<div class="table-responsive">
    				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    					<thead>
    						<tr>
    							<th>Kode Fakultas</th>
    							<th>Nama Fakultas</th>
    							<th>Deskripsi</th>
    							
    							<th>Aksi</th>
    						</tr>
    					</thead>
    					<tbody>
                        <?php 
                          foreach($fakultas->result_array() as $i):
                            $kode_fakultas=$i['kode_fakultas'];
                            $nama_fakultas=$i['nama_fakultas'];
                            $deskripsi=$i['deskripsi'];                            
                            ?>    					
    						<tr>
    							<!-- <td><center><?php echo $no++ ?></center></td> -->
    							<td><?php echo $kode_fakultas ?></td>
    							<td><?php echo $nama_fakultas ?></td>
    							<td><?php echo $deskripsi ?></td>
    							
    							<td>
    								<center>
                            <span data-toggle="tooltip" data-placement="bottom">
    									<button class="btn btn-warning" data-toggle="modal"
    										data-target="#modaleditfakultas<?php echo $kode_fakultas;?>" title="Edit"><i class="far fa-edit" style="color: white;"></i></button>
    									<!-- <button class="btn btn-danger" data-toggle="modal"
    										data-target="#modal_delete<?php echo $kode_fakultas;?>" title="Delete"><i class="far fa-trash-alt" style="color: white;"></i></button> -->
    								</center>
    							</td>
    						</tr>
                            <?php endforeach;?>
    					</tbody>    					
    				</table>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Modal Tambah Fakultas -->
    <div class="modal fade" id="modaltambahfakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    	aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Input Fakultas</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/tambah_data_fakultas'?>">
    					<div class="form-group">
    						<label>Kode Fakultas (co: SAINTEK)</label>
    						<input type="text" name="kode_fakultas" class="form-control" placeholder="" autocomplete="off" value="" required>
    					</div>
    					<div class="form-group ">
    						<label>Nama Fakultas (co: Sains dan Teknologi)</label>
    						<input type="text" name="nama_fakultas" class="form-control" autocomplete="off" value="" required>
    					</div>
    					<div class="form-group ">
    						<label>Deskripsi (co: Tentang Fakultas)</label>
    						<input type="text" name="deskripsi" class="form-control" autocomplete="off" value="">
    					</div>
    					
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary">Save</button>
    			</div>
    			</form>
    		</div>
    	</div>
    </div>
    </div>
    <!-- Akhir Modal Tambah  -->
    <!-- Edit Modal Fakultas -->
    <?php
        foreach($fakultas->result_array() as $i):
           $kode_fakultas=$i['kode_fakultas'];
           $nama_fakultas=$i['nama_fakultas'];
           $deskripsi=$i['deskripsi'];
           $visi=$i['visi'];
           $misi=$i['misi'];
        ?>
    <div class="modal fade" id="modaleditfakultas<?php echo $kode_fakultas;?>" tabindex="-1" role="dialog"
    	aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Input Fakultas</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/edit_data_fakultas'?>">
    					<div class="form-group">
    						<label>Kode Fakultas</t></label>
    						</t><input type="text" name="kode_fakultas" class="form-control" value="<?php echo $kode_fakultas;?>"
    							required readonly>
    					</div>
    					<div class="form-group ">
    						<label>Nama Fakultas</t></label>
    						</t><input type="text" name="nama_fakultas" class="form-control" value="<?php echo $nama_fakultas;?>"
    							required>
    					</div>
    					<div class="form-group ">
    						<label>
    							Deskripsi</t></label>
    						</t><input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi;?>">
    					</div>
    					
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
        foreach($fakultas->result_array() as $i):
           $kode_fakultas=$i['kode_fakultas'];
           $nama_fakultas=$i['nama_fakultas'];
           $deskripsi=$i['deskripsi'];
           $visi=$i['visi'];
           $misi=$i['misi'];
        ?>
    <div class="modal fade" id="modal_delete<?php echo $kode_fakultas;?>" tabindex="-1" role="dialog"
    	aria-labelledby="largeModal" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="myModalLabel">Delete Data Fakultas</h5>
    			</div>
    			<div class="modal-body">
    				<h6>Kode Fakultas : <?php echo $kode_fakultas;?></h6>
    				<h6>Nama Fakultas : <?php echo $nama_fakultas;?></h6><br>
    				<center>
    					<a class="btn btn-danger"
    						href="<?php echo base_url('c_admin/delete_data_fakultas/'.$kode_fakultas); ?>">Lanjutkan</a>
    				</center>
    			</div>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>
    <!-- Akhir Modal Delete -->
