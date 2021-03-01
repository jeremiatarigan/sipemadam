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
              <th>Kode Kantor</th>
              <th>Keterangan</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($alloffice->result() as $office) {  ?>
              <tr>
                <td> <?= $office->damkar_id ?> </td>
                <td> <?= $office->keterangan ?> </td>
                <td> <?= $office->latitude ?> </td>
                <td> <?= $office->longitude ?> </td>
                <td>
                  <a class="btn btn-warning" href="" data-toggle="tooltip" data-placement="bottom" title=""><span class="fa fa-info"></span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Kode Kantor</th>
              <th>Keterangan</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>

</div>
</div>