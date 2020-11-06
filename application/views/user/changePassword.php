</header>

<!-- modal for information at header -->

<!-- Content -->
<section>
	<header class="main">

	</header>
    <div id="content">
      <article>
          <?= $msg;?>
          <form action="<?= base_url('c_user/ChangePassword');?>" method="post"> 
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="staticEmail" value="<?= $user["username"];?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="current_password" name="current_password">
                  <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="new_password1" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="new_password" name="new_password1">
                  <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="new_password2" class="col-sm-2 col-form-label">Confrim Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="new_password" name="new_password2">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                <button type="submit" class="button primary" style="background-color:#007bff;">Change Password
                  </button>
                </div>
              </div>
          </form>
      </article>    
    </div>

</section>
</div>
</div>
