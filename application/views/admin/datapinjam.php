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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Ormawa Penyewa</th>
                            <th>Nama Kegiatan</th>
                            <th>Nama Aula</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled text-center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($aula_notyet->result_array()as $i):
                      $ormawa=$i['penyewa'];
                      $nama_kegiatan=$i['Keterangan'];
                      $aula=$i['keterangan'];
                      $mulai=$i['dari'];
                      $hingga=$i['hingga'];
                      $id_sewa=$i['id_sewa'];
                    ?>
                    <?php $date_hingga=date('Y-m-d', strtotime($hingga.'-1 day')); ?>
                        <tr>
                            <td><?= $ormawa;?></td>
                            <td><?= $nama_kegiatan; ?></td>
                            <td><?= $aula; ?></td>
                            <td><?= date_indo($mulai);?></td>
                            <td><?= date_indo($date_hingga);?></td>
                            <td class="text-center">
                                <a href=""  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaldetail<?php echo $id_sewa;?>"><i class="fa fa-search"></i>
                                    Lihat
                                </a>
                                <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#modalhapus<?php echo $id_sewa;?>"><i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                            </td>
                            <!--Modal Hapus-->
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
      </div>
    
    <?php foreach($aula_notyet->result_array()as $i):
      $ormawa=$i['penyewa'];
      $nama_kegiatan=$i['Keterangan'];
      $aula=$i['keterangan'];
      $mulai=$i['dari'];
      $hingga=$i['hingga'];
      $id_sewa=$i['id_sewa'];
      $surat_sewa=$i['surat_sewa'];
      $nama_pj=$i['nama_pj'];
      $no_pj=$i['no_pj'];
    ?>
    <?php $date_hingga=date('Y-m-d', strtotime($hingga.'-1 day')); ?>
    <div class="modal fade modal-dialog modal-dialog-scrollable" id="modaldetail<?php echo $id_sewa;?>" tabindex="-1" role="dialog"
    	aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Detail Sewa</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
          <input type="hidden" id="id_user" name="id_user" value="<?= $id_sewa?>">
                  <div class="form-group">
                    <label>Surat pengajuan</t></label>
                    <a href="<?=site_url().'assets/uploads/suratizinaula/'.$surat_sewa;'.pdf' ?>" onclick="basicPopup(this.href); return false"><?=$surat_sewa?> </a>
                  </div>
                  <div class="form-group">
                    <label>Nama penyewa</t></label>
                        </t><input type="text" name="penyewa" class="form-control" value="<?php echo $ormawa;?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Kegiatan</t></label>
                        </t><input type="text" name="Keterangan" class="form-control" value="<?php echo $nama_kegiatan;?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label>Aula yang disewa</t></label>
                        </t><input type="text" name="penyewa" class="form-control" value="<?php echo $aula;?>" required readonly>
                  </div>
                  <div class="row form-group">
                    <div class="form-group col-md-6">
                      <label for="dari">Mulai Tanggal</label>
                      <input type="date" class="form-control" id="dari" value="<?php echo $mulai;?>"  name="dari" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="hingga">Akhir Tanggal</label>
                      <input type="date" name="hingga" class="form-control" id="hingga" value="<?php echo $date_hingga;?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Penanggung Jawab Acara</t></label>
                        </t><input type="text" name="nama_pj" class="form-control" value="<?php echo $nama_pj;?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label>No HP Penanggung Jawab Acara</t></label>
                        </t><input type="text" name="no_pj" class="form-control" value="<?php echo $no_pj;?>" required readonly>
                  </div>
    			</div>
    			<div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm card-shadow-2" data-dismiss="modal">Close</button>
    			</div>
    		</div>
    	</div>
    </div>
    <?php endforeach;?>

    <!-- hapus sewa -->
    <?php foreach($aula_notyet->result_array()as $i):
      $ormawa=$i['penyewa'];
      $nama_kegiatan=$i['Keterangan'];
      $aula=$i['keterangan'];
      $mulai=$i['dari'];
      $hingga=$i['hingga'];
      $id_sewa=$i['id_sewa'];
    ?>
    <?php $date_hingga=date('Y-m-d', strtotime($hingga.'-1 day')); ?>
    <div class="modal fade" id="modalhapus<?php echo $id_sewa;?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Hapus Sewa Aula</h6>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <h7>Anda yakin hapus sewa untuk <?= $ormawa ?> yang berkegiatan <?= $nama_kegiatan ?> pada tanggal <?= date("d M Y",strtotime($mulai));?> ?</h7>
        <input type="hidden" id="id_user" name="id_user" value="<?= $id_sewa?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="<?php echo base_url('ormawa/hapus_datasewa/'.$id_sewa); ?>">Lanjutkan</a>
      </div>
			</div>
		</div>
	</div>
<?php endforeach;?>
</div>
</div>
<script>
	// javascript for open file
	function basicPopup(url) {
		popupWindow = window.open(url, 'popupWindow',
			'height=300,width=700,left=50, top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=yes,status=yes,download=no'
		)
	}

</script>