<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
    </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $subtitle; ?></h6>
        </div>
        <div class="card-body">
                <?= form_open('data/tambahUser'); ?>
                    <div class="form-group">
                        <label for="nama">Nama Ormawa *</label>
                        <input type="text" name="nama" value="<?php echo set_value('nama'); ?>"  class="form-control" placeholder="Himpunan Mahasiswa Teknologi Informatika" required>
                        <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas *</label>
                        <select name="fakultas" id="fakultas" class="form-control">
                            <option value="">-- Pilih Fakultas atau UKM UKK --</option>
                            <optgroup label="Fakultas">
                                <option value="Ushuluddin">Ushuluddin</option>
                                <option value="Tarbiyah dan Keguruan">Tarbiyah dan Keguruan</option>
                                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                                <option value="Adab dan Humaniora">Adab dan Humaniora</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                                <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Eknomi dan Bisnis Islam">Eknomi dan Bisnis Islam</option>
                            </optgroup>
                            <optgroup label="UKM">
                                <option value="Unit Kegiatan Khusus">Unit Kegiatan Khusus</option>
                                <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
                            </optgroup>
                        </select>
                        <?= form_error('fakultas', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address *</label>
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('Email'); ?> "  aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" name="username" value="<?php echo set_value('Username'); ?>" class="form-control" required>
                        <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="text" name="password" value="sayaadminsimarwah"  readonly class="form-control">
                        <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="role">Akses</label>
                        <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                        </div> -->
                        <input type="text" readonly class="form-control" value="member"> 
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" value=submit><i class="fa fa-paper-plane"></i> Tambah</button>
                </form>
                <?=form_close(); ?>
                </div>
            </div>
            </div>
        </div>
        
