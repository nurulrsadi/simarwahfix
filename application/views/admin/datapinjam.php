<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-user-plus"></i> Tambah</a>
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
                            <th>Id</th>
                            <th>Nama Ormawa</th>
                            <th>Nama Kegiatan</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Nama Aula</th>
                            <th>Tanggal Book</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled text-center">Status</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled text-center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5327</td>
                            <td>Himatif</td>
                            <td>Muskom Himatif</td>
                            <td>12 Juni 2020</td>
                            <td>13 Juni 2020</td>
                            <td>Aula A</td>
                            <td>20 Mei 2020</td>
                            <td>
                                <span class="btn btn-sm btn-success">Disetujui</span>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('c_admin/Cek_Data_Pinjam') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search"></i>
                                    Detail</a>

                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#ModalHapus"><i class="fa fa-trash"></i>
                                    Hapus
                                </button>
                            </td>
                            <!--Modal Hapus-->
                            <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-sm " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title text-center">Hapus Peminjaman Aula</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Anda Yakin Ingin Menghapus Pengajuan</p>
                                            <p class="text-center">Dari <b>himatif</b> ?</p>
                                        </div>
                                        <div class="modal-footer">


                                            <input type="submit" class="btn btn-danger btn-sm card-shadow-2" name="Hapus" value="Hapus">
                                            <button type="button" class="btn btn-secondary btn-sm card-shadow-2" data-dismiss="modal">Batal</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./Modal Hapus-->


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>