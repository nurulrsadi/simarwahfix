<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-home"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SIMARWAH Admin</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?php echo base_url('c_admin/index') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-dollar-sign"></i>
			<span>Pagu Anggaran</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu Pagu :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Edit_Pagu') ?>">Edit Pagu Ormawa</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Cek_Pagu') ?>">Cek Pengajuan</a>
				<!-- <a class="collapse-item" href="<?php echo base_url('c_admin/Data_Pagu') ?>">Data Anggaran</a> -->
				<a class="collapse-item" href="<?php echo base_url('c_admin/Laporan_Kegiatan') ?>">Cek Laporan Kegiatan</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/List_Pengajuan') ?>">Data Pengajuan </a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Data_Pinjam') ?>">
			<i class="fas fa-fw fa-hotel"></i>
			<span>Peminjaman Aula</span></a>
	</li>

	<!-- Nav Item - Ormawa -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="far fa-fw fa-address-book"></i>
			<span>Data Ormawa</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu Ormawa :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/data_fakultas') ?>">Data Fakultas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/data_himpunan') ?>">Data Himpunan</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/data_user_himpunan') ?>">Data User Himpunan</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Keluhan -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Keluhan') ?>">
			<i class="fas fa-fw 
            fa-inbox"></i>
			<span>Keluhan</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Pengaturan
	</div>

	<!-- Nav Item - My Profile -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Edit_Profil') ?>">
			<i class="fas fa-fw fa-user-edit"></i>
			<span>Edit Profil</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Password') ?>">
			<i class="fas fa-fw fa-user-lock"></i>
			<span>Edit Password</span></a>
	</li>

	<!-- Nav Item - Log Out -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_home/login') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
