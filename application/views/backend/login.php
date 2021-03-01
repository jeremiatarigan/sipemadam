

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-6 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat datang Admin <Strong></Strong></h1>
                    <h3 class="h4 text-gray-900 mb-4">Silahkan Login Dulu</h3>
                  </div>
                    <?= $this->session->flashdata('pesan'); ?>
                  <form class="user" action="<?= site_url('auth') ?>" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user"  name="email" value="<?= set_value('email')?>"   placeholder="Masukkan Username..." >
                      <?= form_error('email','  <small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password..." >
                      <?= form_error('password','  <small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" value ="submit" name="submit" class="btn btn-warning btn-user btn-block">Login</button>
                    
                </div>
                <div class="text-center">
              </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 