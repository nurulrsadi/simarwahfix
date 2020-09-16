				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
										<canvas id="chartfakultas"></canvas>
									</div>
									<div class="mt-4 text-center small">
										<span class="mr-2">
										<i class="fas fa-circle text-primary"></i> Direct
										</span>
										<span class="mr-2">
										<i class="fas fa-circle text-success"></i> Social
										</span>
										<span class="mr-2">
										<i class="fas fa-circle text-info"></i> Referral
										</span>
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
										<canvas id="chartukmukk"></canvas>
									</div>
									<div class="mt-4 text-center small">
										<span class="mr-2">
										<i class="fas fa-circle text-primary"></i> Direct
										</span>
										<span class="mr-2">
										<i class="fas fa-circle text-success"></i> Social
										</span>
										<span class="mr-2">
										<i class="fas fa-circle text-info"></i> Referral
										</span>
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