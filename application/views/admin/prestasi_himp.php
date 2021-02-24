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
                            <th>Waktu Pelaksanaan</th>
                            <th>Nama Prestasi</th>
                            <th>Jenis Prestasi</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Foto Prestasi</th>
                        </tr>
                        </thead>
                        
                    <tbody>
                        <?php $j=1; ?>
                        <?php 
                        foreach($prestasi->result_array() as $i):
                        $id_prestasi = $i['id_prestasi'];
                        $waktu=$i['waktu'];
                        $nama_prestasi=$i['nama_prestasi'];
                        $jenis_prestasi=$i['jenis_prestasi'];
                        $desc_prestasi=$i['desc_prestasi'];
                        $lokasi=$i['lokasi'];
                        $image=$i['image'];                        
                        $parent_himpunan=$i['parent_himpunan'];
                        ?>
                        <tr>
                            <td><?php echo $parent_himpunan ?></td>
                            <td><?php echo $waktu ?> </td>
                            <td><?php echo $nama_prestasi ?></td>
                            <td><?php echo $jenis_prestasi ?></td>
                            <td><?php echo $desc_prestasi ?></td>
                            <td><?php echo $lokasi ?></td>                            
                            <td>
                                <img width="100" height="100" src="<?php echo base_url('assets/img/prestasi/').$image?>">
                            </td>                            
                        </tr>
                        <?php endforeach;?>
                    </tbody>
       
                    </table>
                </div>
            </div>
        </div>
    </div>

    