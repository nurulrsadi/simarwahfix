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
                            <th>No</th>
                            <th>Nama Fakultas</th>
                            <th>Nama Ormawa</th>
                            <th>Tanggal Kegiatan selesai</th>
                            <th>Pengajuan ke- </th>
                            <th>Laporan Kegiatan</th>
                            <th>Laporan Rincian Belanja </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Saintek</td>
                            <td>KM-HB</td>
                            <td>02/04/2020</td>
                            <td class="text-center">1</td>
                            <td>LaporanKegiatanKM-HB1.pdf</td>
                            <td>LaporanRincianBelanjaKM-HB1.pdf</td>
                            <td class="text-center">
                                <button type="submit" class="d-none d-lg-inline-block btn btn-sm btn-primary shadow-lg" onclick="return confirm('Anda Yakin Menerima Laporan Tersebut? ');"><i class="fa fa-check"></i>Terima Laporan</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Saintek</td>
                            <td>HIMAGI</td>
                            <td>05/04/2020</td>
                            <td class="text-center">1</td>
                            <td>LaporanKegiatanHimagi1.pdf</td>
                            <td>LaporanRincianBelanjaHimagi1.pdf</td>
                            <td class="text-center">
                                <button type="submit" class="d-none d-lg-inline-block btn btn-sm btn-primary shadow-lg" onclick="return confirm('Anda Yakin Menerima Laporan Tersebut? ');"><i class="fa fa-check"></i>Terima Laporan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>