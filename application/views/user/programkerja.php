    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/usermain.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css.map')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.min.css')?>"/>
    <title>Program Kerja</title>
</header>
<body>
    <section>
        <header class="main">
        </header>
        <center>
            <h1 style="font-size: 40px;">PROGRAM KERJA</h1>
            <!-- <p><?php echo $kode_himpunan?> </p> -->
        </center>

        <?php if($this->session->userdata('role') == 0):?>
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_kegiatan" >Tambah Daftar Kegiatan</a>                    
                    <?php elseif($this->session->userdata('role') == 2):?>
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_kegiatan_ukmukk" >Tambah Daftar Kegiatan</a>                        
                    <?php else:?>
                        
                    <?php endif;?>
        <h5>
            (*)Upload foto kegiatan setelah acara dilaksanakan
        </h5>
        <div class="table-responsive">
            <?php if($this->session->userdata('role') == 0):?>
                <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Perkiraan pelaksanaan</th>
                        <th>Nama Kegiatan</th>
                        <th>Foto Kegiatan (*)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($proker->result_array() as $i):
                    $id_kegiatan = $i['id_kegiatan'];
                    $start_date=$i['start_date'];
                    $end_date=$i['end_date'];
                    $image=$i['image'];
                    $nama_kegiatan=$i['nama_kegiatan'];
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo p_bulanindo($start_date) ?> s/d <?php echo p_bulanindo($end_date) ?> </td>
                            <td><?php echo $nama_kegiatan ?></td>
                            <td>
                                <img width="100" height="100" src="<?php echo base_url('assets/img/kegiatan/').$image?>">
                            </td>                         
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_kegiatan<?php echo $id_kegiatan;?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_kegiatan<?php echo $id_kegiatan;?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>   
                    </tbody>
                <?php endforeach;?>
            </table>                
            <?php elseif($this->session->userdata('role') == 2):?>
                <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Perkiraan pelaksanaan</th>
                        <th>Nama Kegiatan</th>
                        <th>Foto Kegiatan (*)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($uproker->result_array() as $i):
                    $id_ukegiatan = $i['id_ukegiatan'];
                    $ustart_date=$i['ustart_date'];
                    $uend_date=$i['uend_date'];
                    $image=$i['image'];
                    $nama_ukegiatan=$i['nama_ukegiatan'];
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo p_bulanindo($ustart_date) ?> s/d <?php echo p_bulanindo($uend_date) ?> </td>
                            <td><?php echo $nama_ukegiatan ?></td> 
                            <td>
                                <img width="100" height="100" src="<?php echo base_url('assets/img/kegiatan/').$image?>">
                            </td>                         
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_ukegiatan<?php echo $id_ukegiatan;?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_ukegiatan<?php echo $id_ukegiatan;?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>   
                    </tbody>
                <?php endforeach;?>
            </table>
                    <?php else:?>
                        
                    <?php endif;?>
            
        </div>
</section>
        <!-- Modal Tambah Daftar Kegiatan -->
     <div class="modal fade" id="modal_add_kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Input Daftar Kegiatan</h3>
                </div>
                    <div class="modal-body">
                       <form method="post" action="<?php echo base_url().'c_user/add_kegiatan'?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" autocomplete="off" value="" required>
                            </div> 
                            <div class="form-group " >
                                <label>Mulai Waktu Kegiatan</label>
                                <input type="date" name="start_date" class="form-control" autocomplete="off" id="datepicker" required>
                            </div> 
                            <div class="form-group " >
                                <label>Selesai Waktu Kegiatan</label>
                                <input type="date" name="end_date" class="form-control" value="" id="datepicker" required>
                            </div> 
                            <div class="form-group ">
                                <label>Foto Kegiatan</label>
                                <input type="file" name="image" class="form-control" value="" >
                            </div>
                                <button type="button" class="btn " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn ">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- End Modal Daftar Kegiatan -->

    <!-- Modal Tambah Daftar Kegiatan UKM/UKK-->
     <div class="modal fade" id="modal_add_kegiatan_ukmukk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Input Daftar Kegiatan</h3>
                </div>
                    <div class="modal-body">
                       <form method="post" action="<?php echo base_url().'c_user/add_kegiatan_ukmukk'?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_ukegiatan" class="form-control" autocomplete="off" value="" required>
                            </div> 
                            <div class="form-group " >
                                <label>Mulai Waktu Kegiatan</label>
                                <input type="date" name="ustart_date" class="form-control" autocomplete="off" id="datepicker" required>
                            </div> 
                            <div class="form-group " >
                                <label>Selesai Waktu Kegiatan</label>
                                <input type="date" name="uend_date" class="form-control" value="" id="datepicker" required>
                            </div> 
                            <div class="form-group ">
                                <label>Foto Kegiatan</label>
                                <input type="file" name="image" class="form-control" value="">
                            </div>
                            <button type="button" class="btn " data-dismiss="modal">Close</button>
                            <button type="submit" class="btn ">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- End Modal Daftar Kegiatan -->

        <!-- Modal Edit Proker Himpunan -->
        <?php
        foreach($proker->result_array() as $i):
            $id_kegiatan=$i['id_kegiatan'];
            $start_date=$i['start_date'];
            $end_date=$i['end_date'];
            $nama_kegiatan=$i['nama_kegiatan'];
            $image=$i['image'];
            ?>
            <div class="modal fade" id="modal_edit_kegiatan<?php echo $id_kegiatan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Edit Kegiatan <?php echo $nama_kegiatan;?></h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_kegiatan'?>" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Nama Kegiatan</label>
                                    <div class="col-xs-8">
                                        <input name="nama_kegiatan" value="<?php echo $nama_kegiatan;?>" class="form-control" type="text" placeholder="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Waktu Mulai Kegiatan</label>
                                    <div class="col-xs-8">
                                        <input name="start_date" value="<?php echo $start_date;?>" class="form-control" type="date" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Waktu Berakhir Kegiatan</label>
                                    <div class="col-xs-8">
                                        <input name="end_date" value="<?php echo $end_date;?>" class="form-control" autocomplete="off" type="date" placeholder="" required>
                                    </div>
                                </div>
                                <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Foto Kegiatan</label>
                                    <div class="col-xs-8">
                                      <input class="form-control" type="file" name="image">
                                    </div>
                                </div>

                                <input name="id_kegiatan" value="<?php echo $id_kegiatan;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>       

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
        <!-- End Modal Edit Proker Himpunan -->

        <!-- Modal Edit Proker UKM/UKK -->
        <?php
        foreach($uproker->result_array() as $i):
            $id_ukegiatan=$i['id_ukegiatan'];
            $ustart_date=$i['ustart_date'];
            $uend_date=$i['uend_date'];
            $nama_ukegiatan=$i['nama_ukegiatan'];
            $image=$i['image'];
            ?>
            <div class="modal fade" id="modal_edit_ukegiatan<?php echo $id_ukegiatan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Edit Kegiatan <?php echo $nama_ukegiatan;?></h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_kegiatan_ukmukk'?>" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Nama Kegiatan</label>
                                    <div class="col-xs-8">
                                        <input name="nama_ukegiatan" value="<?php echo $nama_ukegiatan;?>" class="form-control" type="text" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Waktu Mulai Kegiatan</label>
                                    <div class="col-xs-8">
                                        <input name="ustart_date" value="<?php echo $ustart_date;?>" class="form-control" type="date" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Waktu Berakhir Kegiatan</label>
                                    <div class="col-xs-8">
                                        <input name="uend_date" value="<?php echo $uend_date;?>" class="form-control" autocomplete="off" type="date" placeholder="" required>
                                    </div>
                                </div>
                                <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Foto Kegiatan</label>
                                    <div class="col-xs-8">
                                      <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <input name="id_ukegiatan" value="<?php echo $id_ukegiatan;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>       

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

        <!-- Modal Delete Kegiatan Himpunan-->
        <?php
        foreach($proker->result_array() as $i):
            $id_kegiatan=$i['id_kegiatan'];
            $start_date=$i['start_date'];
            $end_date=$i['end_date'];
            $nama_kegiatan=$i['nama_kegiatan'];
            ?>
            <div class="modal fade" id="modal_delete_kegiatan<?php echo $id_kegiatan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Delete Kegiatan</h3>
                        </div>
                        <div class="modal-body">
                            <h4>Nama Kegiatan : <?php echo $nama_kegiatan;?></h4>
                            <h4>Mulai Waktu Kegiatan : <?php echo $start_date;?></h4>
                            <h4>Selesai Waktu Kegiatan : <?php echo $end_date;?></h4>
                            <center>
                                <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_kegiatan/'.$id_kegiatan); ?>">Lanjutkan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <!-- End Modal Delete Kegiatan Himpunan-->

        <!-- Modal Delete Kegiatan UKM/UKK -->
        <?php
        foreach($uproker->result_array() as $i):
            $id_ukegiatan=$i['id_ukegiatan'];
            $ustart_date=$i['ustart_date'];
            $uend_date=$i['uend_date'];
            $nama_ukegiatan=$i['nama_ukegiatan'];
            ?>
            <div class="modal fade" id="modal_delete_ukegiatan<?php echo $id_ukegiatan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Delete Kegiatan</h3>
                        </div>
                        <div class="modal-body">
                            <h4>Nama Kegiatan : <?php echo $nama_ukegiatan;?></h4>
                            <h4>Mulai Waktu Kegiatan : <?php echo $ustart_date;?></h4>
                            <h4>Selesai Waktu Kegiatan : <?php echo $uend_date;?></h4>
                            <center>
                                <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_kegiatan_ukmukk/'.$id_ukegiatan); ?>">Lanjutkan</a>
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