<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

    <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href=<?= base_url('c_admin/tambahUser') ?> class=" btn-sm btn-primary shadow-sm" ><i class="fa fa-user-plus"></i> Tambah</a>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <?= $this->session->flashdata('msg'); ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ormawa</th>
                                <th>Fakultas</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        <?php foreach($getalluser as $x):  ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->fakultas; ?></td>
                                <td><?= $x->email; ?></td>
                                <td><?= $x->username; ?></td>
                                <td class="text-center">
                                <a 
                                    href=""
                                    data-toggle="modal" data-target="#updateOrmawa<?= $x->id_user?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    Ubah
                                </a>
                                <br>
                                    <!-- <a href=""class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#updateOrmawa"><i class="fa fa-plane"></i> Edit</a> -->
                                    <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" href="<?php echo base_url('data/hapusOrmawa/'.$x->id_user); ?> "><i class="fa fa-trash"></i> Delete</a>
                                    <!-- <a href =""  data-toggle="modal" data-target="#hapusOrmawa <?= $x->id_user?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fa fa-trash"></i> Hapus</> -->
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

        <!-- pertanyaan hapus user -->
        <!-- <?php
        foreach($getalluser as $x):
            $id_user=$x->id_user;
            $nama=$x->nama;
            $fakultas=$x->fakultas;
            $email=$x->email;
            $username=$x->username;
        ?>
        <div class="modal fade" id="hapusOrmawa<?= $x->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin akan menghapus Akun ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?> -->

        <!-- edit -->
        <?php
            foreach($getalluser as $x):
                $id_user=$x->id_user;
                $nama=$x->nama;
                $fakultas=$x->fakultas;
                $email=$x->email;
                $username=$x->username;
            ?>
                    <form class="form-horizontal" action="<?php echo site_url('data/editOrmawa')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal fade" id="updateOrmawa<?= $x->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateOrmawa">Edit Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Ormawa *</label>
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="nama" value="<?php echo $nama;?>" name="nama" placeholder="Nama Lengkap HMJ" required>
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas *</label>
                        <select name="fakultas" class="form-control">
                            <option value="">-- Pilih Fakultas atau UKM UKK --</option>
                            <?php if ($fakultas=='Ushuluddin'): ?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" selected>Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Tarbiyah dan Keguruan'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan" selected>Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Syariah dan Hukum'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum" selected>Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Dakwah dan Komunikasi'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi" selected>Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Adab dan Humaniora'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora"selected>Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Psikologi'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi"selected>Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Sains dan Teknologi'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi" selected>Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Ilmu Sosial dan Ilmu Politik'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik" selected>Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Eknomi dan Bisnis Islam'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam" selected>Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Unit Kegiatan Khusus'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus" selected>Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php elseif($fakultas=='Unit Kegiatan Mahasiswa'):?>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin" >Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa" selected>Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address *</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" name="username" id="username" value="<?php echo $username;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="text" name="password" value="sayaadminsimarwah"  readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Akses</label>
                        <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                        </div> -->
                        <input type="text" readonly class="form-control" value="member"> 
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup</button>
                        <button type="submit" class="btn btn-primary" ><i class="fa fa-paper-plane"></i> Perbaharui</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        

        <script type="text/javascript">
            $(document).ready(function(){
                $('#mydata').DataTable();
            });
        </script>
