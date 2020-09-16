<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="" action="">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Id. Pinjam</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="5327">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="himatif">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ormawa</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Himpunan Mahasiswa Teknik Informatika">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Muskom Himpunan Mahasiswa Teknik Informatika">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mulai</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="12 Juni 2020">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Selesai</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control-plaintext" id="staticEmail" placeholder="13 Juni 2020">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Aula</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Aula A">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Book</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="20 Mei 2020">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Surat Pengajuan</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="pengajuan1.pdf">
                    </div>
                </div>

                <a href="<?= base_url('/c_admin/Cek_Pagu'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> Kembali</a>
                <button type="submit" class="d-none d-lg-inline-block btn btn-sm btn-danger shadow-lg" onclick="return confirm('Alasan Anda Tidak Menyetujui');">Tidak Setuju</button>
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="return confirm('Yakin Ingin Menyetujui Pengajuan Ini');"><i class="fa fa-check"></i>
                    Setuju</button>
        </div>
        </form>
    </div>
</div>
</div>