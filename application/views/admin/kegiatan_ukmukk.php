    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modaltambahuser"><i class="fa fa-user-plus"></i> Tambah User Himpunan</a> -->
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
                <div class="flash-data-update" data-flashdata="<?= $this->session->flashdata('flashormawahimp');  ?>"></div>
                <?php if($this->session->flashdata('flashormawahimp')): ?>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Organisasi</th>
                            <th>Perkiraan pelaksanaan</th>
                            <th>Nama Kegiatan</th>
                            <th>Foto Kegiatan (*)</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                        </thead>
                        
                    <tbody>
                        <?php $j=1; ?>
                        <?php 
                        foreach($uproker->result_array() as $i):
                        $id_ukegiatan = $i['id_ukegiatan'];
                        $ustart_date=$i['ustart_date'];
                        $uend_date=$i['uend_date'];
                        $image=$i['image'];
                        $nama_ukegiatan=$i['nama_ukegiatan'];
                        $parent_ukmukk=$i['parent_ukmukk'];
                        ?>
                        <tr>
                            <td><?php echo $parent_ukmukk ?></td>
                            <td><?php echo p_bulanindo($ustart_date) ?> s/d <?php echo p_bulanindo($uend_date) ?> </td>
                            <td><?php echo $nama_ukegiatan ?></td>
                            <td>
                                <img width="100" height="100" src="<?php echo base_url('assets/img/kegiatan/').$image?>">
                            </td>                            
                        </tr>
                        <?php endforeach;?>
                    </tbody>
       
                    </table>
                </div>
            </div>
        </div>
    </div>

    