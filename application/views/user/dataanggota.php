<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/usermain.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css.map')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.min.css')?>"/>
    <title>Data Anggota</title>
</header>
<body>
    <section>
        <header class="main">
        </header>
        <center>
            <h1 style="font-size: 40px;">Data Anggota</h1>
            <!-- <p><?php echo $kode_himpunan?> </p> -->
        </center>

        <?php if($this->session->userdata('role') == 0):?>
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_listanggota_hmj" >Tambah Data Anggota</a>                    
                    <?php elseif($this->session->userdata('role') == 2):?>
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_listanggota_ukmukk" >Tambah Data Anggota</a>                        
                    <?php else:?>
                        
                    <?php endif;?>
        
        <div class="table-responsive">
            <?php if($this->session->userdata('role') == 0):?>
                <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Akademik</th>
                        <th>File Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($list_anggota->result_array() as $i):
                    $id_listanggota = $i['id_listanggota'];
                    $tahun_akademik=$i['tahun_akademik'];
                    $file_excel=$i['file_excel'];
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $tahun_akademik ?> </td>
                            <td><?php echo $file_excel ?></td>
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_listanggota<?php echo $id_listanggota;?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_listanggota<?php echo $id_listanggota;?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>   
                    </tbody>
                <?php endforeach;?>
            </table>                
            <?php elseif($this->session->userdata('role') == 2):?>
                <table  class="content-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Akademik</th>
                        <th>File Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($ulist_anggota->result_array() as $i):
                    $id_ulistanggota = $i['id_ulistanggota'];
                    $tahun_akademik=$i['tahun_akademik'];
                    $file_excel=$i['file_excel'];
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $tahun_akademik ?> </td>
                            <td><?php echo $file_excel ?></td>
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_ulistanggota<?php echo $id_ulistanggota;?>"><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_ulistanggota<?php echo $id_ulistanggota;?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>   
                    </tbody>
                <?php endforeach;?>
            </table>
                    <?php else:?>
                        
                    <?php endif;?>
            
        </div>
</section>
        <!-- Modal Tambah list anggota Himpunan -->
     <div class="modal fade" id="modal_add_listanggota_hmj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Input Data Anggota</h3>
                    </div>
                    <div class="modal-body">
                       <form method="post" action="<?php echo base_url().'c_user/tambah_list_anggota_himp'?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <input type="text" name="tahun_akademik" class="form-control" autocomplete="off" value="" required>
                            </div> 
                            <div class="form-group ">
                                <label>File Excel List Anggota</label>
                                <input type="file" name="file_excel" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
    <!-- End Modal Daftar Prestasi -->
        <!-- Modal Tambah list anggota  -->
        <div class="modal fade" id="modal_add_listanggota_ukmukk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Input Data Anggota</h3>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'c_user/tambah_list_anggota_ukmukk'?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <input type="text" name="tahun_akademik" class="form-control" autocomplete="off" value="" required>
                            </div> 
                            <div class="form-group ">
                                <label>File Excel List Anggota</label>
                                <input type="file" name="file_excel" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Modal Daftar Prestasi -->

        <!-- Modal Edit List Anggota Himpunan -->
        <?php
          foreach($list_anggota->result_array() as $i):
              $id_listanggota = $i['id_listanggota'];
              $tahun_akademik=$i['tahun_akademik'];
              $file_excel=$i['file_excel'];
              $parent_himpunan=$i['parent_himpunan'];
              ?>
            <div class="modal fade" id="modal_edit_listanggota<?php echo $id_listanggota;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Edit List Anggota</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_list_anggota_himp'?>" enctype="multipart/form-data">
                        <!-- <input name="id_listanggota" value="<?php echo $id_listanggota;?>" class="form-control" autocomplete="off" type="hidden" placeholder="" required>        -->
                            <input type="hidden" id="id_listanggota" name="id_listanggota" value="<?= $id_listanggota?>">
                            <input type="hidden" id="parent_himpunan" name="parent_himpunan" value="<?= $parent_himpunan?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Tahun Akademik</label>
                                    <div class="col-xs-8">
                                        <input name="tahun_akademik" value="<?php echo $tahun_akademik;?>" class="form-control" placeholder="" required autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >File Excel</label>
                                    <div class="col-xs-8">
                                    <a href="<?=site_url().'assets/uploads/list_anggota/'.$file_excel;'.pdf' ?>"
								onclick="basicPopup(this.href); return false"><?=$file_excel?> </a>
                                    </div>
                                    <input type="hidden" id="file_excel"name="file_excel" value="<?= $file_excel?>">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-xs-3">Upload File Baru Excel List Anggota</label>
                                    <div class="col-xs-8">
                                        <input type="file" name="file_new_excel" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn-succes primary ">Update changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
        <!-- End Modal Edit Prestasi Himpunan -->

        <!-- Modal Edit Prestasi Himpunan -->
        <?php
          foreach($ulist_anggota->result_array() as $i):
              $id_ulistanggota = $i['id_ulistanggota'];
              $tahun_akademik=$i['tahun_akademik'];
              $file_excel=$i['file_excel'];
              $parent_ukmukk=$i['parent_ukmukk'];
              ?>
            <div class="modal fade" id="modal_edit_ulistanggota<?php echo $id_ulistanggota;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Edit List Anggota</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_list_anggota_ukmukk'?>" enctype="multipart/form-data">
                            <input type="hidden" id="id_ulistanggota" name="id_ulistanggota" value="<?= $id_ulistanggota?>">
                            <input type="hidden" id="parent_ukmukk" name="parent_ukmukk" value="<?= $parent_ukmukk?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Tahun Akademik</label>
                                    <div class="col-xs-8">
                                        <input name="tahun_akademik" value="<?php echo $tahun_akademik;?>" class="form-control" placeholder="" required autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >File Excel</label>
                                    <div class="col-xs-8">
                                    <a href="<?=site_url().'assets/uploads/list_anggota/'.$file_excel;'.pdf' ?>"
								onclick="basicPopup(this.href); return false"><?=$file_excel?> </a>
                                    </div>
                                    <input type="hidden" id="file_excel"name="file_excel" value="<?= $file_excel?>">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-xs-3">Upload File Baru Excel List Anggota</label>
                                    <div class="col-xs-8">
                                        <input type="file" name="file_new_excel" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn-succes primary ">Update changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
        <!-- End Modal Edit Prestasi Himpunan -->

        <!-- Modal Delete Prestasi Himpunan-->
        <?php
          foreach($list_anggota->result_array() as $i):
              $id_listanggota = $i['id_listanggota'];
              $tahun_akademik=$i['tahun_akademik'];
              $file_excel=$i['file_excel'];
              ?>
            <div class="modal fade" id="modal_delete_listanggota<?php echo $id_listanggota;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Delete List Anggota</h4>
                        </div>
                        <div class="modal-body">
                            Anda yakin hapus list anggota <?php echo $tahun_akademik;?> ?
                        </div>
                        <div class="modal-footer">
                            <center>
                                <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_list_anggota/'.$id_listanggota); ?>">Lanjutkan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <!-- End Modal Delete Prestasi Himpunan-->

        <!-- Modal Delete Prestasi Himpunan-->
        <?php
            foreach($ulist_anggota->result_array() as $i):
            $id_ulistanggota = $i['id_ulistanggota'];
            $tahun_akademik=$i['tahun_akademik'];
            $file_excel=$i['file_excel'];
            ?>
            <div class="modal fade" id="modal_delete_ulistanggota<?php echo $id_ulistanggota;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Delete List Anggota</h4>
                        </div>
                        <div class="modal-body">
                            Anda yakin hapus list anggota <?php echo $tahun_akademik;?> ?
                        </div>
                        <div class="modal-footer">
                            <center>
                                <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_list_uanggota/'.$id_ulistanggota); ?>">Lanjutkan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <!-- End Modal Delete Prestasi Himpunan-->

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