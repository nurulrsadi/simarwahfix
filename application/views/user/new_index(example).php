<body id="main">
    
<!-- Banner -->
<section id="banner">
<!-- <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?php echo base_url() . 'c_user/index'; ?>">Edit Profile</a>
  <a href="<?php echo base_url() . 'c_user/Pagu_Anggaran'; ?>">Pengajuan Dana</a>
  <a href="<?php echo base_url() . 'c_user/Pinjam_Aula'; ?>">Peminjaman Aula</a>
  <a href="<?php echo base_url() . 'c_user/Guide_HMJ'; ?>">Panduan Simarwah</a>
  <a href="<?php echo base_url() . 'c_home/login'; ?>">Logout</a>
</div> -->
   <div class="row">
        <div>
            <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> -->
            <h2>HI, <?php echo strtoupper($this->session->userdata('username')) ?> !</h2>
             <p>Anda diharuskan Update Profile terlebih dahulu agar dapat melakukan akses ke menu lainnya.</p>
        </div>
    </div>
    <span class="image object">
        <img src="<?php echo base_url('assets/img/profile.png')?>" alt="" />
    </span>
</section>
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahbootstrap.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/simarwahstyle.css') ?>">
<!-- Section -->
<section>
    <center>
        <div class="col-md-12">
            <?php foreach($himpunan as $himp){ ?>
                <h1><?php echo $himp->kode_himpunan?></h1>   
                <h3><?php echo $himp->nama_himpunan?></h3>    
            <?php } ?>
        </div>
    </center>
     <div class="container">
      <div class="row col-md-12 col-lg-12">
        <div class="col-md-6 col-lg-6">
           <center>
                <h3>Visi</h3>
           </center>
        </div>
        <div class="col-md-6 col-lg-6">
            <center><h3>Misi</h3></center>
        </div>
    </div>
    </div>

    <div>
        <button class="btn"> Tambah Data Himpunan</button>
    </div>
    <br>
    <div><h5>Anggota Himpunan</h5></div>
    <table class="content-table">
        <thead>
            <tr>
              <th><center>No</center></th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Himpunan</th>
              <th>Bidang</th>
              <th>Jabatan</th>
              <th><center>Aksi</center></th>
          </tr>
      </thead>
      <?php $id=1; foreach($allanggota as $agt){ ?>
        <tbody>
            <tr>
              <td><center><?php echo $id++ ?></center></td>
              <td><?php echo $agt->nama ?></td>
              <td><?php echo $agt->nim ?></td>
              <td><?php echo $agt->parent_himpunan ?></td>
              <td><?php echo $agt->parent_bidang ?></td>
              <td><?php echo $agt->jabatan ?></td>
              <td><center>
                <a class="btn btn-warning" href="<?php echo base_url('c_user/editadmin/'.$agt->nim); ?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo base_url('c_user/hapusadmin/'.$agt->nim); ?>">Delete</a>
            </center>
        </td>
    </tr>
</tbody>
<?php } ?>
</table>
</section>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</body>