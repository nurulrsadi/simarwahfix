<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
          <?= $msg; ?>
            <form action="<?= base_url('c_admin/Edit_Password');?>" method="post">
                <div class="form-group">
                    <label for="staticEmail" >Email</label>
                    <input type="text" readonly class="form-control" id="staticEmail" value="<?= $admin["username"];?>">
                </div>
                <div class="form-group">
                    <label for="current_password">Password Lama</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">Password Baru</label>
                    <input type="password" class="form-control" id="new_password" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Ulangi Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password </button>
                </div>
            </form>
        </div>
    </div>
</div>