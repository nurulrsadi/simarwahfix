    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaltambah_ukmukk"><i class="fa fa-user-plus"></i> Tambah UKM/UKK</a>
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
                                <th>Kode UKM/UKK</th>
                                <th>Nama UKM/UKK</th>
                                <th>Deskripsi</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php 
                  foreach($ukmukk->result_array() as $i):
                    $kode_ukmukk=$i['kode_ukmukk'];
                    $nama_ukmukk=$i['nama_ukmukk'];
                    $desc_ukmukk=$i['desc_ukmukk'];
                    $visi_ukmukk=$i['visi_ukmukk'];
                    $misi_ukmukk=$i['misi_ukmukk'];
                    $image=$i['image'];
                    ?>
                    <tbody>
                        <tr>
                          <!-- <td><center><?php echo $no++ ?></center></td> -->
                          <td><?php echo $kode_ukmukk ?></td>
                          <td><?php echo $nama_ukmukk ?></td>
                          <td><?php echo $desc_ukmukk ?></td>
                          <td><?php echo $visi_ukmukk ?></td>
                          <td><?php echo $misi_ukmukk ?></td>                          
                          <td>
                            <img width="100" height="100" src="<?php echo base_url('assets/img/jurusan/').$image?>">
                          </td>
                          <td><center>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#modaledit_ukmukk<?php echo $kode_ukmukk;?>">Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#modaldelete_ukmukk<?php echo $kode_ukmukk;?>">Delete</a>
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

    <!-- Modal Tambah UKM/UKK -->
<div class="modal fade" id="modaltambah_ukmukk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Input UKM/UKK</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="<?php echo base_url().'c_admin/tambahdata_ukmukk'?>" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <label>Kode UKM/UKK</t></label>
                                            </t><input type="text" name="kode_ukmukk" class="form-control" value="" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Nama UKM/UKK</t></label>
                                                </t><input type="text" name="nama_ukmukk" class="form-control" value="" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Deskripsi</t></label>
                                                </t><input type="text" name="desc_ukmukk" class="form-control" value="">
                                            </div>  
                                            <div class="form-group " >
                                            <label>Visi</t></label>
                                                </t><input type="text" name="visi_ukmukk" class="form-control" value="">
                                            </div> 
                                            <div class="form-group " >
                                            <label>Misi</t></label>
                                                </t><input type="text" name="misi_ukmukk" class="form-control" value="">
                                            </div>                                            
                                            
                                            <div class="form-group " >
                                            <label>Logo UKM/UKK</t></label>
                                                </t><input type="file" name="image" class="form-control" value="" required>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- Akhir Modal Tambah  -->

<!-- Edit Modal Fakultas -->
    <?php
        foreach($ukmukk->result_array() as $i):
            $kode_ukmukk=$i['kode_ukmukk'];
            $nama_ukmukk=$i['nama_ukmukk'];
            $desc_ukmukk=$i['desc_ukmukk'];
            $visi_ukmukk=$i['visi_ukmukk'];
            $misi_ukmukk=$i['misi_ukmukk'];
            $image=$i['image'];
    ?>
 <div class="modal fade" id="modaledit_ukmukk<?php echo $kode_ukmukk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update UKM/UKK</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="<?php echo base_url().'c_admin/editdata_ukmukk'?>"  enctype="multipart/form-data">
                                            <div class="form-group">
                                            <label>Kode UKM/UKK</t></label>
                                            </t><input type="text" name="kode_ukmukk" class="form-control" value="<?php echo $kode_ukmukk;?>" required readonly>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Nama UKM/UKK</t></label>
                                                </t><input type="text" name="nama_ukmukk" class="form-control" value="<?php echo $nama_ukmukk;?>" required>
                                            </div> 
                                            <div class="form-group " >
                                            <label>Deskripsi</t></label>
                                                </t><input type="text" name="desc_ukmukk" class="form-control" value="<?php echo $desc_ukmukk;?>">
                                            </div>  
                                            <div class="form-group " >
                                            <label>Visi</t></label>
                                                </t><input type="text" name="visi_ukmukk" class="form-control" value="<?php echo $visi_ukmukk;?>">
                                            </div> 
                                            <div class="form-group " >
                                            <label>Misi</t></label>
                                                </t><input type="text" name="misi_ukmukk" class="form-control" value="<?php echo $misi_ukmukk;?>">
                                            </div> 
                                            <div class="form-group " >
                                            <label>Logo UKM/UKK</t></label>
                                                </t><input type="file" name="image" class="form-control" value="<?php echo $image;?>">
                                            </div> 
                                            <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
<!-- Akhir Modal Edit -->

<!-- Modal Delete -->
 <?php
        foreach($ukmukk->result_array() as $i):
            $kode_ukmukk=$i['kode_ukmukk'];
            $nama_ukmukk=$i['nama_ukmukk'];
            $desc_ukmukk=$i['desc_ukmukk'];
            $visi_ukmukk=$i['visi_ukmukk'];
            $misi_ukmukk=$i['misi_ukmukk'];
            $image=$i['image'];
        ?>
<div class="modal fade" id="modaldelete_ukmukk<?php echo $kode_ukmukk;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Delete Data UKM/UKK</h3>
            </div>
                <div class="modal-body">
                    <h4>Nama UKM/UKK : <?php echo $nama_ukmukk;?></h4>
                    <center>
                     <a class="btn btn-danger" href="<?php echo base_url('c_admin/delete_data_ukmukk/'.$kode_ukmukk); ?>">Lanjutkan</a>
                    </center>
                </div>
            </div>
            </div>
        </div>
    <?php endforeach;?>
<!-- Akhir Modal Delete -->