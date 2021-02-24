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
                        foreach($proker->result_array() as $i):
                        $id_kegiatan = $i['id_kegiatan'];
                        $start_date=$i['start_date'];
                        $end_date=$i['end_date'];
                        $image=$i['image'];
                        $nama_kegiatan=$i['nama_kegiatan'];
                        $parent_himpunan=$i['Parent_himpunan'];
                        ?>
                        <tr>
                            <td><?php echo $parent_himpunan ?></td>
                            <td><?php echo p_bulanindo($start_date) ?> s/d <?php echo p_bulanindo($end_date) ?> </td>
                            <td><?php echo $nama_kegiatan ?></td>
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

    