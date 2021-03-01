<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  <?php $this->load->view('message/message_note') ?>
  <div class="card shadow mb-4">
    <div>
      <a class="btn btn-primary m-2 center" href="<?= base_url('auth/registrationPage') ?>"><span class="fa fa-plus"></span> Tambah User Baru</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kode User</th>
              <th>email / username</th>
              <th>Nama</th>
              <th>Password</th>
              <th>Kantor</th>
              <th>Level</th>
              <th>Is Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allUser->result() as $user) {  ?>
              <?php
              $kd_user = $user->kd_user;
              ?>
              <tr>
                <td> <?= $kd_user ?> </td>
                <td> <?= $user->email ?> </td>
                <td> <?= $user->nama ?> </td>
                <td> <?= 'hide' ?> </td>
                <td> <?= $user->keterangan ?> </td>
                <td> <?= $user->role_id ?> </td>
                <td>
                  <?php if ($user->is_active == 1) {  ?>
                    <?= '<span class="fa fa-check-circle">Aktif</span>' ?>
                  <?php } else {  ?>
                    <?= '<span class="fa fa-times-circle">No</span>' ?>
                  <?php } ?>

                </td>
                <td>
                  <a class="btn btn-warning" href="<?= site_url('User/user_resetPassword/') . $kd_user; ?>" data-toggle="tooltip" data-placement="bottom" title="Reset Password"><span class="fa fa-info"></span></a>
                  <a class="btn btn-danger" href="<?= site_url('User/user_diactivated/') . $kd_user; ?>" data-toggle=" tooltip" data-placement="bottom" title="Diactivated User"><span class="fa fa-lock"></span></a>
                  <a class="btn btn-success" href="<?= site_url('User/user_activated/') . $kd_user; ?>" data-toggle=" tooltip" data-placement="bottom" title="Activated User"><span class="fa fa-lock-open"></span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Kode User</th>
              <th>email / username</th>
              <th>Nama</th>
              <th>Password</th>
              <th>Kantor</th>
              <th>Level</th>
              <th>Is Active</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>

</div>
</div>