
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

         <div class="row">
             <div class="col-lg-6">
                <?= $this->session->flashdata('pesan'); ?>
                 <form action="<?= base_url('backend/auth/ubahPassword') ?>" method="post">
                 <div class="form-group">
                        <label for="password_sekarang">Password Saat Ini</label>
                        <input type="password" class="form-control" id="password_sekarang" name="password_sekarang" placeholder="Password Saat ini">
                        <?= form_error('password_sekarang','  <small class="text-danger pl-3">','</small>'); ?>
                    </div>
                 <div class="form-group">
                        <label for="new_password1">Password Baru </label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Password 1">
                        <?= form_error('new_password1','  <small class="text-danger pl-3">','</small>'); ?>
                </div>
                 <div class="form-group">
                        <label for="new_password2">Ulangi Password Baru</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Password 1">
                        <?= form_error('new_password2','  <small class="text-danger pl-3">','</small>'); ?>
                </div>
                 <div class="form-group">
                       <button type="submit" class="btn btn-primary">Ubah Sekarang</button>
                </div>
                 </form>
             </div>
         </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    