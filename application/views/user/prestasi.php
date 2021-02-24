    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/usermain.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css.map')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.min.css')?>"/>
    <title>Prestasi Organisasi</title>
</header>
<body>
    <section>
        <header class="main">
        </header>
        <center>
            <h1 style="font-size: 40px;">Data Prestasi</h1>
            <!-- <p><?php echo $kode_himpunan?> </p> -->
        </center>

        <?php if($this->session->userdata('role') == 0):?>
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_prestasi_hmj" >Tambah Daftar Prestasi</a>                    
                    <?php elseif($this->session->userdata('role') == 2):?>
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_prestasi_ukmukk" >Tambah Daftar Prestasi</a>                        
                    <?php else:?>
                        
                    <?php endif;?>
        
        <div class="table-responsive">
            <?php if($this->session->userdata('role') == 0):?>
                <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Waktu acara</th>
                        <th>Nama prestasi</th>
                        <th>Jenis prestasi</th>
                        <th>Deskripsi</th>
                        <th>Lokasi acara</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($prestasi->result_array() as $i):
                    $id_prestasi = $i['id_prestasi'];
                    $waktu=$i['waktu'];
                    $nama_prestasi=$i['nama_prestasi'];
                    $jenis_prestasi=$i['jenis_prestasi'];
                    $desc_prestasi=$i['desc_prestasi'];
                    $image=$i['image'];    
                    $lokasi=$i['lokasi']; 
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $waktu ?> </td>
                            <td><?php echo $nama_prestasi ?></td>
                            <td><?php echo $jenis_prestasi ?></td>
                            <td><?php echo $desc_prestasi ?></td>
                            <td><?php echo $lokasi ?></td>
                            <td>
                                <img width="100" height="100" src="<?php echo base_url('assets/img/prestasi/').$image?>">
                            </td>                         
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_prestasi<?php echo $id_prestasi;?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_prestasi<?php echo $id_prestasi;?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>   
                    </tbody>
                <?php endforeach;?>
            </table>                
            <?php elseif($this->session->userdata('role') == 2):?>
                <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Waktu acara</th>
                        <th>Nama Prestasi</th>
                        <th>Jenis Prestasi</th>
                        <th>Deskripsi</th>
                        <th>Lokasi Acara</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($uprestasi->result_array() as $i):
                    $id_uprestasi = $i['id_uprestasi'];
                    $waktu=$i['waktu'];
                    $nama_uprestasi=$i['nama_uprestasi'];
                    $jenis_uprestasi=$i['jenis_uprestasi'];
                    $desc_uprestasi=$i['desc_uprestasi'];
                    $image=$i['image']; 
                    $ulokasi=$i['ulokasi'];
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $waktu ?> </td>
                            <td><?php echo $nama_uprestasi ?></td>
                            <td><?php echo $jenis_uprestasi ?></td>
                            <td><?php echo $desc_uprestasi ?></td>
                            <td><?php echo $ulokasi; ?></td>
                            <td>
                                <img width="100" height="100" src="<?php echo base_url('assets/img/prestasi/').$image?>">
                            </td>
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_uprestasi<?php echo $id_uprestasi;?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_uprestasi<?php echo $id_uprestasi;?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>   
                    </tbody>
                <?php endforeach;?>
            </table>
                    <?php else:?>
                        
                    <?php endif;?>
            
        </div>
</section>
        <!-- Modal Tambah Prestasi Himpunan -->
     <div class="modal fade" id="modal_add_prestasi_hmj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Input Daftar Prestasi</h3>
                </div>
                    <div class="modal-body">
                       <form method="post" action="<?php echo base_url().'c_user/tambah_prestasi_himp'?>" enctype="multipart/form-data">
                            <div class="form-group " >
                                <label>Waktu Acara</label>
                                <input type="date" name="waktu" class="form-control" autocomplete="off" id="datepicker" required>
                            </div> 
                            <div class="form-group">
                                <label>Nama Prestasi</label>
                                <input type="text" name="nama_prestasi" class="form-control" autocomplete="off" value="" required>
                            </div> 
                            <div class="form-group">
                                <label>Jenis Prestasi</label>
                                <select name="jenis_prestasi" class="form-control" required="">
                                  <option>No Selected</option>    
                                  <option>Organisasi</option>  
                                  <option>Bidang</option>
                                  <option>Anggota</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="desc_prestasi" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Lokasi Acara</label>
                                <input type="text" name="lokasi" class="form-control" autocomplete="off" required="">
                            </div>               
                            <div class="form-group ">
                                <label>Foto Prestasi</label>
                                <input type="file" name="image" class="form-control" value="">
                            </div>
                                <button type="button" class="btn " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn ">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Modal Daftar Prestasi -->

    <!-- Modal Tambah Daftar Prestasi UKM/UKK-->
     <div class="modal fade" id="modal_add_prestasi_ukmukk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Input Daftar Prestasi</h3>
                </div>
                    <div class="modal-body">
                       <form method="post" action="<?php echo base_url().'c_user/tambah_prestasi_ukmukk'?>" enctype="multipart/form-data">
                            <div class="form-group " >
                                <label>Waktu Acara</label>
                                <input type="date" name="waktu" class="form-control" autocomplete="off" id="datepicker" required>
                            </div> 
                            <div class="form-group">
                                <label>Nama Prestasi</label>
                                <input type="text" name="nama_uprestasi" class="form-control" autocomplete="off" value="" required>
                            </div> 
                            <div class="form-group">
                                <label>Jenis Prestasi</label>
                                <select name="jenis_uprestasi" class="form-control" required="">
                                  <option>No Selected</option>    
                                  <option>Organisasi</option>  
                                  <option>Bidang</option>
                                  <option>Anggota</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="desc_uprestasi" class="form-control" autocomplete="off">
                            </div>               
                            <div class="form-group">
                                <label>Lokasi Acara</label>
                                <input type="text" name="ulokasi" class="form-control" autocomplete="off">
                            </div>               
                            <div class="form-group ">
                                <label>Foto Prestasi</label>
                                <input type="file" name="image" class="form-control" value="" required>
                            </div>
                                <button type="button" class="btn " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn ">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Modal Daftar Prestasi -->

        <!-- Modal Edit Prestasi Himpunan -->
        <?php
        foreach($prestasi->result_array() as $i):
            $id_prestasi=$i['id_prestasi'];
            $waktu=$i['waktu'];
            $nama_prestasi=$i['nama_prestasi'];
            $jenis_prestasi=$i['jenis_prestasi'];
            $desc_prestasi=$i['desc_prestasi'];
            $image=$i['image'];
            $lokasi=$i['lokasi'];

            ?>
            <div class="modal fade" id="modal_edit_prestasi<?php echo $id_prestasi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Edit Prestasi <?php echo $nama_prestasi;?></h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_prestasi_himp'?>" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Waktu Acara</label>
                                    <div class="col-xs-8">
                                        <input name="waktu" value="<?php echo $waktu;?>" class="form-control" type="date" placeholder="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Nama Prestasi</label>
                                    <div class="col-xs-8">
                                        <input name="nama_prestasi" value="<?php echo $nama_prestasi;?>" class="form-control" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Jenis Prestasi</label>
                                    <div class="col-xs-8">
                                        <select name="jenis_prestasi" value="<?php echo $jenis_prestasi;?>" class="form-control" required>
                                        <?php if($jenis_prestasi == 'Organisasi'):?>
                                          <option value="Organisasi" selected>Organisasi</option>                                          
                                          <option value="Bidang">Bidang</option>
                                          <option value="Anggota">Anggota</option>
                                        <?php elseif($jenis_prestasi == 'Bidang'):?>
                                          <option value="Organisasi">Organisasi</option>                                          
                                          <option value="Bidang" selected>Bidang</option>
                                          <option value="Anggota">Anggota</option>
                                        <?php elseif($jenis_prestasi == 'Anggota'):?>
                                          <option value="Organisasi">Organisasi</option>                                          
                                          <option value="Bidang">Bidang</option>
                                          <option value="Anggota" selected>Anggota</option>
                                        <?php else:?>
                                        <option value="Organisasi">Organisasi</option>                                          
                                          <option value="Bidang">Bidang</option>
                                          <option value="Anggota">Anggota</option>
                                        <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Deskripsi</label>
                                    <div class="col-xs-8">
                                        <input name="desc_prestasi" value="<?php echo $desc_prestasi;?>" class="form-control" autocomplete="off" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Lokasi Acara</label>
                                    <div class="col-xs-8">
                                        <input name="lokasi" value="<?php echo $lokasi;?>" class="form-control" autocomplete="off" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Foto Prestasi</label>
                                    <div class="col-xs-8">
                                      <input class="form-control" type="file" name="image">
                                    </div>
                                </div>

                                <input name="id_prestasi" value="<?php echo $id_prestasi;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>       

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn ">Update changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
        <!-- End Modal Edit Prestasi Himpunan -->

        <!-- Modal Edit Prestasi UKM/UKK -->
        <?php
        foreach($uprestasi->result_array() as $i):
            $id_uprestasi=$i['id_uprestasi'];
            $waktu=$i['waktu'];
            $nama_uprestasi=$i['nama_uprestasi'];
            $jenis_uprestasi=$i['jenis_uprestasi'];
            $desc_uprestasi=$i['desc_uprestasi'];
            $image=$i['image'];
            $ulokasi=$i['ulokasi'];
            ?>
            <div class="modal fade" id="modal_edit_uprestasi<?php echo $id_uprestasi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Edit Prestasi <?php echo $nama_uprestasi;?></h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_prestasi_ukmukk'?>" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Waktu Acara</label>
                                    <div class="col-xs-8">
                                        <input name="waktu" value="<?php echo $waktu;?>" class="form-control" type="date" placeholder="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Nama Prestasi</label>
                                    <div class="col-xs-8">
                                        <input name="nama_uprestasi" value="<?php echo $nama_uprestasi;?>" class="form-control" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Jenis Prestasi</label>
                                    <div class="col-xs-8">
                                        <select name="jenis_uprestasi" value="<?php echo $jenis_uprestasi;?>" class="form-control" required>
                                        <?php if($jenis_uprestasi == 'Organisasi'):?>
                                          <option value="Organisasi" selected>Organisasi</option>                                          
                                          <option value="Bidang">Bidang</option>
                                          <option value="Anggota">Anggota</option>
                                        <?php elseif($jenis_uprestasi == 'Bidang'):?>
                                          <option value="Organisasi">Organisasi</option>                                          
                                          <option value="Bidang" selected>Bidang</option>
                                          <option value="Anggota">Anggota</option>
                                        <?php elseif($jenis_uprestasi == 'Anggota'):?>
                                          <option value="Organisasi">Organisasi</option>                                          
                                          <option value="Bidang">Bidang</option>
                                          <option value="Anggota" selected>Anggota</option>
                                        <?php else:?>
                                        <option value="Organisasi">Organisasi</option>                                          
                                          <option value="Bidang">Bidang</option>
                                          <option value="Anggota">Anggota</option>
                                        <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Deskripsi Prestasi</label>
                                    <div class="col-xs-8">
                                        <input name="desc_uprestasi" value="<?php echo $desc_uprestasi;?>" class="form-control" autocomplete="off" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Lokasi Acara</label>
                                    <div class="col-xs-8">
                                        <input name="ulokasi" value="<?php echo $ulokasi;?>" class="form-control" autocomplete="off" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Foto Prestasi</label>
                                    <div class="col-xs-8">
                                      <input class="form-control" type="file" name="image">
                                    </div>
                                </div>

                                <input name="id_uprestasi" value="<?php echo $id_uprestasi;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>       

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn ">Update changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
        <!-- End Modal Edit Proker UKM/UKK-->

        <!-- Modal Delete Prestasi Himpunan-->
        <?php
        foreach($prestasi->result_array() as $i):
            $id_prestasi=$i['id_prestasi'];
            $waktu=$i['waktu'];            
            $nama_prestasi=$i['nama_prestasi'];
            ?>
            <div class="modal fade" id="modal_delete_prestasi<?php echo $id_prestasi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Delete Prestasi</h3>
                        </div>
                        <div class="modal-body">
                            <h4>Nama Prestasi : <?php echo $nama_prestasi;?></h4>
                            <h4>Waktu Acara : <?php echo $waktu;?></h4>                            
                            <center>
                                <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_prestasi_himp/'.$id_prestasi); ?>">Lanjutkan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <!-- End Modal Delete Prestasi Himpunan-->

        <!-- Modal Delete Prestasi UKM/UKK -->
        <?php
        foreach($uprestasi->result_array() as $i):
            $id_uprestasi=$i['id_uprestasi'];
            $waktu=$i['waktu'];
            $nama_uprestasi=$i['nama_uprestasi'];
            ?>
            <div class="modal fade" id="modal_delete_uprestasi<?php echo $id_uprestasi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Delete Prestasi</h3>
                        </div>
                        <div class="modal-body">
                            <h4>Nama Prestasi : <?php echo $nama_uprestasi;?></h4>
                            <h4>Waktu Acara : <?php echo $waktu;?></h4>
                            <center>
                                <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_prestasi_ukmukk/'.$id_uprestasi); ?>">Lanjutkan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <!-- End Modal Delete -->

        <script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
        <script>
            $(document).ready(function(){
                $('#mydata').DataTable();
            });
        </script>
<!-- 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script> -->
    <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/active.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>"></script>
    <script>
        $(function () {
            $('#datepicker').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
        });
    </script>
</div>
</div>
</body>
</html>