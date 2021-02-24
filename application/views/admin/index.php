				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
					</div>
          <div class="row">
						<div class="col-xl-4 col-md-6 col-lg-5">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-6">
									<h6 class="m-0 font-weight-bold text-primary">Diagram Total Anggota Ormawa per-Fakultas</h6>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-pie pt-4 pb-2">
										<canvas id="datafakultas" ></canvas>

									</div>
								</div>
							</div>
						</div>

            <div class="col-xl-4 col-md-6 col-lg-5">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-6">
									<h6 class="m-0 font-weight-bold text-primary">Diagram Mahasiswa Aktif perFakultas</h6>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-pie pt-4 pb-2">
										<canvas id="dataaktiffklts" style="height:40vh; width:80vw"></canvas>
									</div>
								</div>
							</div>
						</div>
            
						<div class="col-xl-4 col-md-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
								<div class="card-header py-6">
                  <h6 class="m-0 font-weight-bold text-primary">Diagram Mahasiswa Aktif perUKM/UKK</h6>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-pie pt-4 pb-2">
                    <canvas id="datamhsukmukk" style="height:40vh; width:80vw"></canvas>
									</div>
								</div>
							</div>
						</div>
            
          </div>
          <div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabel Sewa Aula Selesai</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Nama Peminjam</th>
											<th>Nama Kegiatan</th>
											<th>Nama Aula</th>
											<th>Tanggal Akhir Acara</th>
											<th>Keterangan</th>
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
                                <td><?= date_indo($date_hingga); ?></td>
                                <td class="text-center">
                                    <a href=""  class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-check"></i>
                                        Selesai
                                    </a></td>
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
            <div class="modal fade" id="modaldetail<?php echo $id_sewa;?>" tabindex="-1" role="dialog"
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
                          <input type="date" name="hingga" class="form-control" id="hingga" value="<?php echo $hingga;?>" readonly>
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
                      <h7>Anda yakin hapus sewa untuk <?= $ormawa ?> yang berkegiatan <?= $nama_kegiatan ?> pada tanggal <?= date_indo($mulai);?> ?</h7>
                      <input type="hidden" id="id_user" name="id_user" value="<?= $id_sewa?>">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a class="btn btn-danger" href="<?php echo base_url('ormawa/hapus_datasewa_index/'.$id_sewa); ?>">Lanjutkan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach;?>
          </div>
          <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

          <!-- java for diagram total anggota ormawa per fakultas -->
          <script>
          Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = '#858796';
          var myDoughnutChart = document.getElementById('datafakultas').getContext('2d');
          var chart = new Chart(myDoughnutChart, {
        // The type of chart we want to create
          type: 'doughnut',
          // The data for our dataset
          data: {
              labels: [ <?php if(count($totalFklts)>0){
                        foreach($totalFklts as $k){
                          echo "'" .$k->parent_fakultas. "',";
                        }
                      }
                      ;?> ],
              datasets: [{
                  label: 'Data Anggota ORMAWA Fakultas',
                  data: [<?php if(count($totalFklts)>0){
                        foreach($totalFklts as $k){
                          echo "'" .$k->total_anggotafak. "',";
                        }
                      }
                      ?>], 
                  backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,102,102,1)',
                    'rgba(153,204,204,1)',
                    'rgba(102,51,153,1))',
                    ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,102,102,1)',
                    'rgba(153,204,204,1)',
                    'rgba(102,51,153,1))',
                ],
                borderWidth: 0.1,
                // borderAlign : inner,
              }]
          },

          // Configuration options go here
            options: 
            {
              responsive: true,
          }
        });
				</script>

          <!-- java for diagram total anggota ormawa per fakultas -->
          <script>
          Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = '#858796';
          var myDoughnutChart = document.getElementById('dataaktiffklts').getContext('2d');
          var chart = new Chart(myDoughnutChart, {
        // The type of chart we want to create
          type: 'doughnut',
          // The data for our dataset
          data: {
              labels: [ <?php if(count($sumAktifFklts)>0){
                        foreach($sumAktifFklts as $k){
                          echo "'" .$k->parent_fakultas. "',";
                        }
                      }
                      ;?> ],
              datasets: [{
                  label: 'Data Anggota ORMAWA Fakultas',
                  data: [<?php if(count($sumAktifFklts)>0){
                        foreach($sumAktifFklts as $k){
                          echo "'" .$k->total_amount. "',";
                        }
                      }
                      ?>],
                  backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,102,102,1)',
                    'rgba(153,204,204,1)',
                    'rgba(102,51,153,1))',
                    ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,102,102,1)',
                    'rgba(153,204,204,1)',
                    'rgba(102,51,153,1))',
                ],
                borderWidth: 0.1,
                // borderAlign : inner,
              }]
          },

          // Configuration options go here
            options: 
            {
              responsive: true,
          }
        });
				</script>

        <!-- java for diagram mahasiswa aktif di ukmukk -->
        <script>
          Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = '#858796';
          var myDoughnutChart = document.getElementById('datamhsukmukk').getContext('2d');
          var chart = new Chart(myDoughnutChart, {
        // The type of chart we want to create
          type: 'doughnut',
          // The data for our dataset
          data: {
              labels: [ <?php if(count($sumAktifukmukk)>0){
                        foreach($sumAktifukmukk as $k){
                          echo "'" .$k->nama_ukmukk. "',";
                        }
                      }
                      ;?> ],
              datasets: [{
                  label: 'Data Anggota ORMAWA Fakultas',
                  data: [<?php if(count($sumAktifukmukk)>0){
                        foreach($sumAktifukmukk as $k){
                          echo "'" .$k->jml_umhsaktif. "',";
                        }
                      }
                      ?>],
                  backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,102,102,1)',
                    'rgba(153,204,204,1)',
                    'rgba(255,204,204,1)',
                    'rgba(0,255,153,1)',
                    'rgba(102,51,153,1))',
                    ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,102,102,1)',
                    'rgba(153,204,204,1)',
                    'rgba(255,204,204,1)',
                    'rgba(0,255,153,1)',
                    'rgba(102,51,153,1)',
                ],
                borderWidth: 0.1,
                // borderAlign : inner,
              }]
          },

          // Configuration options go here
            options: 
            {
              responsive: true,
          }
        });
				</script>
        <script>
	// javascript for open file
	function basicPopup(url) {
		popupWindow = window.open(url, 'popupWindow',
			'height=300,width=700,left=50, top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=yes,status=yes,download=no'
		)
	}

</script>