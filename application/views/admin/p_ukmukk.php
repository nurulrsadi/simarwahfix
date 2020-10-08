    <!-- Begin Page Content -->
    <div class="container-fluid">

    	<!-- Page Heading -->
    	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    		<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
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
    							<th>Kode UKM UKK</th>
    							<th>Nama </th>
    							<th>Deskripsi</th>
    							<th>Aksi</th>
    						</tr>
    					</thead>
    					<?php 
                  foreach($ukmukk->result_array() as $i):
                    $kode_parentukmukk=$i['kode_parentukmukk'];
                    $nama=$i['nama'];
                    $deskripsi=$i['deskripsi'];
                    ?>
    					<tbody>
    						<tr>
    							<!-- <td><center><?php echo $no++ ?></center></td> -->
    							<td><?php echo $kode_parentukmukk ?></td>
    							<td><?php echo $nama ?></td>
    							<td><?php echo $deskripsi ?></td>
    							<td>
    								<center>
    									<button class="btn btn-warning" data-toggle="modal"
    										data-target="#modaleditdeskripsi<?php echo $kode_parentukmukk;?>">Edit</button>
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

    <!-- Edit Modal Fakultas -->
    <?php
        foreach($ukmukk->result_array() as $i):
          $kode_parentukmukk=$i['kode_parentukmukk'];
          $nama=$i['nama'];
          $deskripsi=$i['deskripsi'];
        ?>
    <div class="modal fade" id="modaleditdeskripsi<?php echo $kode_parentukmukk;?>" tabindex="-1" role="dialog"
    	aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Edit Deskripsi Fakultas</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/edit_data_parentukmukk'?>">
    					<div class="form-group">
    						<label>Kode UKM UKK</t></label>
    						</t><input type="text" name="kode_parentukmukk" class="form-control" value="<?php echo $kode_parentukmukk;?>"
    							required readonly>
    					</div>
    					<div class="form-group ">
    						<label>Nama </t></label>
    						</t><input type="text" name="nama" class="form-control" value="<?php echo $nama;?>"
    							required readonly>
    					</div>
    					<div class="form-group ">
    						<label>
    							Deskripsi</t></label>
    						</t><input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi;?>">
    					</div>
              </div>
              <div class="modal-footer">
    					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    					<button type="submit" class="btn btn-primary">Update changes</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>
    <!-- Akhir Modal Edit -->
