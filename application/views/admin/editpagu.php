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
    		</div>
    		<div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashdana');  ?>"></div>
    		<?php if($this->session->flashdata('flashdana')): ?>
    		<?php endif; ?>
    		<div class="card-body">
    			<div class="table-responsive">
    				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    					<thead>
    						<tr>
    							<th>No</th>
    							<th>Nama Fakultas</th>
    							<th>Nama Ormawa</th>
    							<th>Tahun Akademik</th>
    							<th>Pegu Anggaran</th>
    							<th>Dana Sisa</th>
    							<th>Aksi</th>
    						</tr>
              </thead>
              <tfoot>
    						<tr>
    							<th>No</th>
    							<th>Nama Fakultas</th>
    							<th>Nama Ormawa</th>
    							<th>Tahun Akademik</th>
    							<th>Pegu Anggaran</th>
    							<th>Dana Sisa</th>
    							<th>Aksi</th>
    						</tr>
        </tfoot>
    					<tbody>
    						<tr>
            					<?php $j=1; ?>
            					<?php 
                                  foreach($userdana->result_array() as $i):
                                    $kd_jrsn=$i['kd_jrsn'];
                                    $nama_fakultas=$i['nama_fakultas'];
                                    $tahunakademik=$i['tahunakademik'];
                                    $danaawal=$i['danaawal'];
                                    $danasisa=$i['danasisa'];
                										$nPengajuan=$i['nPengajuan'];
                										$id_dana=$i['id_dana'];
                                    // $fakultas=$i['parent_fakultas'];
                                    ?>
    							<td><?=$j++;?></td>
    							<!-- <td><center><?php echo $no++ ?></center></td> -->
    							<td><?php echo $nama_fakultas ?></td>
    							<td><?php echo $kd_jrsn ?></td>
    							<td><?php echo $tahunakademik ?></td>
    							<td>Rp. <?php echo number_format($danaawal,0,',','.') ?></td>
    							<td>Rp. <?php echo number_format($danasisa,0,',','.') ?></td>
    							<td class="align-self-auto">
                    <span data-toggle="tooltip" data-placement="bottom">
    								<a href="" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal"
    									data-target="#modaleditanggaran<?php echo $id_dana;?>" title="Edit Pagu Anggaran"><i class="fa fa-pen"></i>
    								</a>
                    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal"
    									data-target="#modalresetakun<?php echo $id_dana;?>" title="Reset Akun"><i class="fa fa-undo"></i>
    								</a>
    							</td>
    						</tr>
    					<?php endforeach;?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>
  </div>
    
    
    <?php foreach($userdana->result_array() as $i):
          $kd_jrsn=$i['kd_jrsn'];
          $nama_fakultas=$i['nama_fakultas'];
          $tahunakademik=$i['tahunakademik'];
          $danaawal=$i['danaawal'];
          $danasisa=$i['danasisa'];
					$nPengajuan=$i['nPengajuan'];
					$id_dana=$i['id_dana'];
					$jurusan=$i['jurusan'];
          ?>
    <div class="modal fade" id="modaleditanggaran<?php echo $id_dana;?>" tabindex="-1" role="dialog"
    	aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Update Pagu Anggaran</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/update_dana_awal'?>"
							enctype="multipart/form-data">
							<input type="hidden" id="id_dana" name="id_dana" value="<?= $id_dana?>">
    					<div class="form-group">
    						<label>Tahun Akademik</t></label>
    						</t><input type="text" name="tahunakademik" class="form-control" value="<?php echo $tahunakademik;?>"
    							required>
    					</div>
    					<div class="form-group ">
    						<label>Nama Himpunan</t></label>
    						</t><input type="text" name="kd_jrsn" class="form-control" value="<?php echo $kd_jrsn;?>" required
    							readonly>
    					</div>
							<div class="form-group ">
    						<label>Detail Jurusan</t></label>
    						</t><input type="text" name="jurusan" class="form-control" value="<?php echo $jurusan;?>" required
    							readonly>
    					</div>
    					<div class="form-group ">
    						<label>
    							Nama Fakultas</t></label>
    						</t><input type="text" name="nama_fakultas" class="form-control" value="<?php echo $nama_fakultas;?>"
    							readonly>
    					</div>
    					<div class="form-group ">
    						<label>Pagu Anggaran <small class="text-decoration" style="color:red">contoh : 2000000</small></t>
    						</label>
    						</t><input type="number" name="danaawal" min="0" name="danaawal" id="danaawal"
    							value="<?php echo $danaawal;?>" class="form-control" required>
    					</div>
    			  </div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary">Save changes</button>
    			</div>
    			</form>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>
    <!-- Akhir Modal Edit -->
    <!-- Reset akun -->
    <?php foreach($userdana->result_array() as $i):
					$kd_jrsn=$i['kd_jrsn'];
					$id_dana=$i['id_dana'];
          ?>
  <div class="modal fade" id="modalresetakun<?php echo $id_dana;?>" tabindex="-1" role="dialog"
    	aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false"  >
    	<div class="modal-dialog modal-dialog-centered">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Reset Akun </h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<form method="post" action="<?php echo base_url().'c_admin/reset_akun_fakultas'?>"
    					enctype="multipart/form-data">
							<input type="hidden" id="id_dana" name="id_dana" value="<?= $id_dana?>">
              <h7>Anda yakin akan mereset akun <?= $kd_jrsn; ?>?</h7>
    					<input type="hidden" name="kd_jrsn" id="kd_jrsn" value="<?= $kd_jrsn ?>" >
              <!-- <input type="hidden" id="kd_jrsn" name="kd_jrsn" value="<?= $kd_jrsn?>"> -->
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-danger">Reset</button>
    			</div>
    			</form>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>