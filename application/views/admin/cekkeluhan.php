<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
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
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Isi Keluhan</th>
                            <th>Tanggal</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled">Status</th>
                            <th class="th-no-border sorting_asc_disabled sorting_desc_disabled"></th>
                            <th class="th-no-border sorting_asc_disabled sorting_desc_disabled" style="text-align:right">Aksi</th>
                            <th class="th-no-border sorting_asc_disabled sorting_desc_disabled"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1625</td>
                            <td>himatif</td>
                            <td>Himpunan Mahasiswa Teknik Informatika</td>
                            <td>Kenapa halaman pinjam aula tidak muncul ?</td>
                            <td>23/05/2020</td>
                            <td>
                                <span class="btn btn-sm btn-success">Ditanggapi</span>
                            </td>
                            <td class="td-no-border">
                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalDetail"><i class="fas fa-search"></i>
                                    Detail
                                </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Detail Keluhan</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="" action="">
                                                <div class="form-group ">
                                                    <label">
                                                        Id. Keluhan </t></label>
                                                        </t><input type="text" name="username" readonly class="form-control" value="1625">
                                                </div>
                                                <div class="form-group ">
                                                    <label">
                                                        Username </t></label>
                                                        </t><input type="text" name="username" readonly class="form-control" value="himatif">
                                                </div>
                                                <div class="form-group ">
                                                    <label">
                                                        Nama </t></label>
                                                        </t><input type="text" name="username" readonly class="form-control" value="Himpunan Mahasiswa Teknik Informatika">
                                                </div>
                                                <div class="form-group ">
                                                    <label">
                                                        Isi Keluhan </t></label>
                                                        </t><input type="text" name="keluhan" readonly class="form-control" value="Kenapa halaman pinjam aula tidak muncul ?">
                                                </div>
                                                <div class="form-group ">
                                                    <label">
                                                        Tanggapan </t></label>
                                                        </t><input type="text" name="keluhan" readonly class="form-control" value="Halaman sudah diperbaiki">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary btn-sm card-shadow-2" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td class="td-no-border">
                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm" data-toggle="modal" data-target="#ModalBalas"><i class="fa fa-pen"></i>
                                    Balas
                                </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="ModalBalas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Balas Keluhan</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="" action="">
                                                <div class="form-group ">
                                                    <label">
                                                        Username </t></label>
                                                        </t><input type="text" name="username" readonly class="form-control" value="himatif">
                                                </div>
                                                <div class="form-group ">
                                                    <label">
                                                        Isi Keluhan </t></label>
                                                        </t><input type="text" name="keluhan" readonly class="form-control" value="Kenapa halaman pinjam aula tidak muncul ?">
                                                </div>

                                                <div class="form-group">
                                                    <p><b>Tanggapan :</b></p>
                                                    <textarea class="form-control" name="isi_tanggapan" placeholder="Isi Tanggapan" required></textarea>
                                                </div>


                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-sm card-shadow-2" name="Hapus" value="Balas">
                                            <button type="button" class="btn btn-secondary btn-sm card-shadow-2" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td class="td-no-border">
                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#ModalHapus"><i class="fa fa-trash"></i>
                                    Hapus
                                </button>
                            </td>
                            <!--Modal Hapus-->
                            <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-sm " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title text-center">Hapus Keluhan</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Hapus Pengaduan</p>
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