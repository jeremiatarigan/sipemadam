        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="col-md-6">
            <div class="card mb-3">
              <div class="row p-3">
                <div class="card-body">
                  <h5 class="card-title"><span>Nama : </span><?= $user['nama'] ?></h5>
                  <h5 class="card-title"><span>Email : </span><?= $user['email'] ?></h5>
                  <a href="<?= base_url('Auth/editProfile') ?>" class="btn btn-primary">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->