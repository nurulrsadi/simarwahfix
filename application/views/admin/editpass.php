<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <form action="ganti_pass_act.php" method="post">
                <div class="form-group">
                    <input name="user" type="hidden" value="">
                </div>
                <div class="form-group">
                    <label>Password Lama</label>
                    <input name="lama" type="password" class="form-control" placeholder="Password Lama ..">
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input name="baru" type="password" class="form-control" placeholder="Password Baru ..">
                </div>
                <div class="form-group">
                    <label>Ulangi Password</label>
                    <input name="ulang" type="password" class="form-control" placeholder="Ulangi Password ..">
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-info" value="Simpan">
                    <input type="reset" class="btn btn-danger" value="reset">
                </div>
            </form>
        </div>
    </div>
</div>