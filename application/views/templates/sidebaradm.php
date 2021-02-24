 <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('c_admin/index') ?>">
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
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Dana
	</div>
	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_editdana" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-dollar-sign"></i>
			<span>Pagu Anggaran</span>
		</a>
		<div id="collapse_editdana" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu Pagu :</h6>
        <a class="collapse-item" href="<?php echo base_url('c_admin/Edit_Pagu_Universitas') ?>">Edit Pagu Universitas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Edit_Pagu_Fakultas') ?>">Edit Pagu Per Fakultas</a>
        <a class="collapse-item" href="<?php echo base_url('c_admin/Edit_Pagu_UKMUKK') ?>">Edit Pagu Per UKMUKK</a>
			</div>
		</div>
	</li>
  <!-- CEK PENGAJUAN -->
  <li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_pengajuan" aria-expanded="true"
			aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-file-invoice-dollar"></i>
			<span>Cek Pengajuan </span>
		</a>
		<div id="collapse_pengajuan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu Pengajuan :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Cek_Pengajuan_Universitas') ?>">Pengajuan Universitas</a>
        <a class="collapse-item" href="<?php echo base_url('c_admin/Cek_Pengajuan_Fakultas') ?>">Pengajuan per Fakultas </a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Cek_Pengajuan_UKMUKK') ?>">Pengajuan per UKM UKK</a>
			</div>
		</div>
	</li>
  <!-- CEK LAPORAN -->
  <li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_Laporan" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-paste"></i>
			<span>Cek Laporan</span>
		</a>
		<div id="collapse_Laporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu Laporan :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Laporan_Kegiatan_Universitas') ?>">Laporan Universitas</a>
        <a class="collapse-item" href="<?php echo base_url('c_admin/Laporan_Kegiatan_Fakultas') ?>">Laporan per Fakultas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/Laporan_Kegiatan_UKMUKK') ?>">Laporan per UKM UKK</a>
			</div>
		</div>
	</li>

  <!-- MENU REVISI DANA -->
  <li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_RevisiDana" aria-expanded="true"
			aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-money-check-alt"></i>
			<!-- <i class="fas fa-fw fa-dollar-sign"></i> -->
			<span>Revisi Dana ACC</span>
		</a>
		<div id="collapse_RevisiDana" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu Laporan :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/List_Pengajuan_Universitas') ?>">Dana ACC Universitas</a>
        <a class="collapse-item" href="<?php echo base_url('c_admin/List_Pengajuan_Fakultas') ?>">Dana ACC Fakultas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/List_Pengajuan_UKMUKK') ?>">Dana ACC UKM UKK</a>
			</div>
		</div>
	</li>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Data_Pinjam') ?>">
			<i class="fas fa-fw fa-hotel"></i>
			<span>Peminjaman Aula</span></a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Data Akun
	</div>
	<!-- Nav Item - Ormawa -->
  	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data SEMA/DEMA & HMJ</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Ormawa :</h6>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_universitas') ?>">Data DEMA-U/SEMA-U</a>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_fakultas') ?>">Data Fakultas</a>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_demasemaf') ?>">Data DEMA-F/SEMA-F</a>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_himpunan') ?>">Data Himpunan</a>
                
            </div>
        </div>
    </li>

    <!-- Collapse Menu UKM UKK -->
    <li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/data_ukmukk') ?>">
			<i class="fas fa-fw fa-address-book"></i>
			<span>Data UKM/UKK</span></a>
	</li>
    
    <!-- Collapse Menu Kegiatan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProker" aria-expanded="true" aria-controls="collapseProker">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Program Kerja</span>
        </a>
        <div id="collapseProker" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Kegiatan :</h6>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_kegiatan_himpunan') ?>">Kegiatan ORMAWA</a>                
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_kegiatan_ukmukk') ?>">Kegiatan UKM/UKK</a>
            </div>
        </div>
    </li>

    <!-- Collapse Menu Prestasi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrestasi" aria-expanded="true" aria-controls="collapsePrestasi">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Data Prestasi</span>
        </a>
        <div id="collapsePrestasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Prestasi :</h6>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_prestasi_himp') ?>">Prestasi ORMAWA</a>                
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_prestasi_ukmukk') ?>">Prestasi UKM/UKK</a>
            </div>
        </div>
    </li>
    
    <!-- Collapse Menu User -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data User</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu USER :</h6>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_user_himpunan') ?>">Data User Himpunan</a>
                <a class="collapse-item" href="<?php echo base_url('c_admin/data_userukmukk') ?>">Data User UKM/UKK</a>
            </div>
        </div>
    </li>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Recap Pengajuan dan Laporan
	</div>
	<!-- Menu History Pengajuan-->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_History_Pengajuan" aria-expanded="true"
			aria-controls="collapseUtilities">
      <i class="fas fa-fw fas fa-archive"></i>
			<!-- <i class="fas fa-fw fa-dollar-sign"></i> -->
			<span>History Pengajuan</span>
		</a>
		<div id="collapse_History_Pengajuan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu History :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/History_Pengajuan_Universitas') ?>">History Pengajuan Universitas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/History_Pengajuan_Fakultas') ?>">History Pengajuan Fakultas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/History_Pengajuan_UKMUKK') ?>">History Pengajuan UKM UKK</a>
				<!-- <a class="collapse-item" href="<?php echo base_url('c_admin/List_Pengajuan_UKMUKK') ?>">Dana ACC UKM UKK</a> -->
			</div>
		</div>
	</li>
	<!-- Menu History Laporan-->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_History_Laporan" aria-expanded="true"
			aria-controls="collapseUtilities">
      <i class="fas fa-fw fas fa-archive"></i>
			<!-- <i class="fas fa-fw fa-dollar-sign"></i> -->
			<span>History Laporan</span>
		</a>
		<div id="collapse_History_Laporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu History :</h6>
				<a class="collapse-item" href="<?php echo base_url('c_admin/History_Laporan_Universitas') ?>">History Laporan Universitas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/History_Laporan_Fakultas') ?>">History Laporan Fakultas</a>
				<a class="collapse-item" href="<?php echo base_url('c_admin/History_Laporan_UKMUKK') ?>">History Laporan UKM UKK</a>
				<!-- <a class="collapse-item" href="<?php echo base_url('c_admin/List_Pengajuan_UKMUKK') ?>">Dana ACC UKM UKK</a> -->
			</div>
		</div>
	</li>
	<hr class="sidebar-divider">
    
    <div class="sidebar-heading">
		Keluhan
	</div>
    <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('c_admin/keluhan') ?>">
			<i class="fas fa-fw fa-file"></i>
			<!--<i class="fas fa-file"></i>-->
			<span>Keluhan</span></a>
	</li>
    
    <hr class="sidebar-divider">
	<!-- Heading -->
	<div class="sidebar-heading">
		Pengaturan
	</div>

  <!-- Admin menu -->
  <li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/data_admin') ?>">
			<i class="far fa-fw fa-address-book"></i>
			<span>Data Admin</span></a>
	</li>

  <li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Edit_Profil') ?>">
			<i class="fas fa-fw fa-user-edit"></i>
			<span>Edit Profil</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('c_admin/Edit_Password') ?>">
			<i class="fas fa-fw fa-user-lock"></i>
			<span>Edit Password</span></a>
	</li>

	<!-- Nav Item - Log Out -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('data/logout') ?>">
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
