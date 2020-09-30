				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
								class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
					</div>

					<!-- Content Row -->
					<div class="row">
						<div class="col-xl-4 col-md-6 col-lg-5">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-6">
									<h6 class="m-0 font-weight-bold text-primary">Diagram Fakultas</h6>
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
									<h6 class="m-0 font-weight-bold text-primary">Diagram UKM/UKK</h6>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-pie pt-4 pb-2">
										<canvas id="chartukmukk" style="height:40vh; width:80vw"></canvas>
									</div>
								</div>
							</div>
						</div>

					</div>


					<div class="row">

						<!-- Area Chart -->
						<!-- <div class="col-xl-8 col-lg-7"> -->

						<!-- Approach -->
						<!-- <div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Halaman Admin Simarwah</h6>
									</div>
									<div class="card-body">
										<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor
											page performance. Custom CSS classes are used to create custom components and custom utility
											classes.</p>
										<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap
											framework, especially the utility classes.</p>
									</div>
								</div> -->

						<!-- </div> -->
					</div>

				</div>
				<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->
				<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
					integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
					crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"
					integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg=="
					crossorigin="anonymous"></script> -->
          <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
          <script>
              // Set new default font family and font color to mimic Bootstrap's default styling
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
                    'rgba(255, 159, 64, 1)' ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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