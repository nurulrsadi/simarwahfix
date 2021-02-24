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
                        foreach($uprestasi->result_array() as $i):
                        $id_uprestasi = $i['id_uprestasi'];
                        $waktu=$i['waktu'];
                        $nama_uprestasi=$i['nama_uprestasi'];
                        $jenis_uprestasi=$i['jenis_uprestasi'];
                        $desc_uprestasi=$i['desc_uprestasi'];
                        $ulokasi=$i['ulokasi'];
                        $image=$i['image'];                        
                        $parent_ukmukk=$i['parent_ukmukk'];
                        ?>
                        <tr>
                            <td><?php echo $parent_ukmukk ?></td>
                            <td><?php echo $waktu ?> </td>
                            <td><?php echo $nama_uprestasi ?></td>
                            <td><?php echo $jenis_uprestasi ?></td>
                            <td><?php echo $desc_uprestasi ?></td>
                            <td><?php echo $ulokasi ?></td>                            
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

    