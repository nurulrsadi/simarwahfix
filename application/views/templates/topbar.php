<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">
      <?php if($count_puniv||$count_pfklts||$count_pukmukk||$count_luniv||$count_lfklts||$count_lukmukk ==0 ):?>
      <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifikasi
                </h6>
                <a class="dropdown-item d-flex align-items-center">
                  <div class="mr-3">
                    Tidak ada notifikasi baru
                  </div>
                </a>
              </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>
      <?php elseif($count_puniv||$count_pfklts||$count_pukmukk||$count_luniv||$count_lfklts||$count_lukmukk >0 ):?>
      <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">!</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifikasi
                </h6>
                <!-- NOTIF PENGAJUAN UNIV-->
                <?php elseif($count_puniv!=0):?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('c_admin/Cek_Pengajuan_Universitas') ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>

                  <div>
                    <div class="small text-gray-500"></div>
                    Ada Pengajuan baru dari ORMAWA Tingkat Universitas
                  </div>
                </a>
                <!-- NOTIF PENGAJUAN FAKULTAS -->
                <?php elseif($count_pfklts!=0):?>
                  <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('c_admin/Cek_Pengajuan_Fakultas') ?>">
                    <div class="mr-3">
                      <div class="icon-circle bg-warning">
                        <i class="fas fa-donate text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500"></div>
                      Ada Pengajuan baru dari ORMAWA tingkat Fakultas
                    </div>
                  </a>
                <!-- NOTIF PENGAJUAN UKM UKK -->
                <?php elseif($count_pukmukk!=0):?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('c_admin/Cek_Pengajuan_UKMUKK') ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                    Ada Pengajuan baru dari ORMAWA tingkat UKM UKK
                  </div>
                </a>
                <!-- NOTIF LAPORAN UNIV -->
                <?php elseif($count_luniv!=0):?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('c_admin/Laporan_Kegiatan_Universitas') ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                    Ada Laporan Kegiatan baru dari ORMAWA Tingkat Universitas
                  </div>
                </a>
                <!-- NOTIF LAPORAN FAKULTAS -->
                <?php elseif($count_lfklts!=0):?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('c_admin/Laporan_Kegiatan_Fakultas') ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                    Ada Laporan Kegiatan baru dari ORMAWA Tingkat Fakultas
                  </div>
                </a>
                <!-- NOTIF LAPORAN UKM UKK -->
                <?php elseif($count_lukmukk!=0):?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('c_admin/Laporan_Kegiatan_UKMUKK') ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                    Ada Laporan Kegiatan baru dari ORMAWA Tingkat UKM UKK
                  </div>
                </a>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <?php else:?>
            <?php endif;?>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<span
							class="mr-2 d-none d-lg-inline text-black-600 small"><?php echo $admin['nama'];?></span>
						<img class="img-profile rounded-circle"
							src="<?= base_url('./assets/img/profile/default.jpg').$this->session->userdata("image");   ?> ">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?php echo base_url('c_admin/Edit_Profil') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profil
						</a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->
