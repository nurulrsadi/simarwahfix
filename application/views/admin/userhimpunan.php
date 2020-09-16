    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaltambahuser"><i class="fa fa-user-plus"></i> Tambah User Himpunan</a>
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
                                <th>Id User</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Kode Himpunan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php 
                  foreach($users->result_array() as $i):
                    $id_user=$i['id_user'];
                    $nama=$i['nama'];
                    $username=$i['username'];
                    $password=$i['password'];
                    $role=$i['role'];
                    $kd_himp=$i['kode_himp'];
                    ?>
                    <tbody>
                        <tr>
                          <!-- <td><center><?php echo $no++ ?></center></td> -->
                          <td><?php echo $id_user ?></td>
                          <td><?php echo $nama ?></td>
                          <td><?php echo $username ?></td>
                          <td><?php echo $password ?></td>
                          <td><?php echo $role ?></td>
                          <td><?php echo $kd_himp ?></td>
                          <td><center>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#modaledituser<?php echo $id_user;?>">Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $id_user;?>">Delete</a>
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

    <!-- Modal Tambah Fakultas -->
    <div class="modal fade" id="modaltambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Input User Himpunan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="<?php echo base_url().'c_admin/tambah_data_user'?>" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <label>Nama User</t></label>
                                            </t><input type="text" name="nama" class="form-control" value="" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Email</t></label>
                                                </t><input type="text" name="email" class="form-control" value="" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>
                                                Username</t></label>
                                                </t><input type="text" name="username" class="form-control" value="">
                                            </div>  
                                            <div class="form-group " >
                                            <label>Password</t></label>
                                                </t><input type="password" name="password" class="form-control" value="">
                                            </div>                                                    
                                            <div class="form-group ">
                                            <label>Kode Himpunan</label>
                                            <select class="form-control" name="kode_himp">
                                                 <option value="">No Selected</option>
                                                 <?php foreach ($himpunan->result_array() as $i): 
                                                    $himpunan=$i['kode_himpunan'];
                                                    $labelhimpunan = $i['nama_himpunan'];
                                                    ?>
                                                      <option value="<?php echo $himpunan;?>"><?php echo $himpunan;?> - <?php echo $labelhimpunan;?></option>
                                                 <?php endforeach ?>
                                            </select>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- Akhir Modal Tambah  -->

<!-- Awal Modal Edit -->
 <?php
          foreach($users->result_array() as $i):
                    $id_user=$i['id_user'];
                    $nama=$i['nama'];
                    $username=$i['username'];
                    $email = $i['email'];
                    $password=$i['password'];
                    $role=$i['role'];
                    $kd_himp=$i['kode_himp'];
                    ?>
 <div class="modal fade" id="modaledituser<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Input User Himpunan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="<?php echo base_url().'c_admin/edit_user_himpunan'?>" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <label>Id User</t></label>
                                            </t><input type="text" name="id_user" class="form-control" value="<?php echo $id_user;?>" required readonly>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Nama</t></label>
                                                </t><input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Email</t></label>
                                                </t><input type="text" name="email" class="form-control" value="<?php echo $email;?>" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>
                                                Username</t></label>
                                                </t><input type="text" name="username" class="form-control" value="<?php echo $username;?>">
                                            </div>  
                                            <div class="form-group " >
                                            <label>Password</t></label>
                                                </t><input type="password" name="password" class="form-control" value="<?php echo $password;?>">
                                            </div>  
                                            <div class="form-group " >
                                            <label>Kode Himpunan</t></label>
                                                </t><input type="text" name="kd_himp" class="form-control" value="<?php echo $kd_himp;?>" required readonly>
                                            </div>                                                   
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
<!-- Akhir Modal Edit -->

<!-- Modal Delete -->
 <?php
          foreach($users->result_array() as $i):
                    $id_user=$i['id_user'];
                    $nama=$i['nama'];
                    $username=$i['username'];
                    $password=$i['password'];
                    $role=$i['role'];
                    $kd_himp=$i['kode_himp'];
                    ?>
<div class="modal fade" id="modal_delete<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Delete Data User Himpunan</h3>
            </div>
                <div class="modal-body">
                    <h4>Id User : <?php echo $id_user;?></h4>
                    <h4>Nama    : <?php echo $nama;?></h4>
                    <center>
                     <a class="btn btn-danger" href="<?php echo base_url('c_admin/delete_data_user/'.$id_user); ?>">Lanjutkan</a>
                    </center>
                </div>
            </div>
            </div>
        </div>
    <?php endforeach;?>
<!-- Akhir Modal Delete -->