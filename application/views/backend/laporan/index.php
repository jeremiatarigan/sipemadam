<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?php $this->load->view('message/message_note') ?>
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Laporan</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Pelapor</th>
                            <th>Tanggal Lapor</th>
                            <th>Status Laporan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alllaporan->result() as $office) {  ?>
                            <tr>
                                <td> <?= $office->id_kejadian ?> </td>
                                <td> <?= $office->alamat ?> </td>
                                <td> <?= $office->latitude ?> </td>
                                <td> <?= $office->longitude ?> </td>
                                <td> <?= $office->user ?> </td>
                                <td> <?= $office->tgl_laporan ?> </td>
                                <td> <?= ($office->status_laporan == 1 ) ? 'Sudah Direspon' : 'Belum Direspon' ?> </td>
                                <td> <?= $office->ket ?> </td>
                                <td>
                                    <a class="btn btn-warning" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Reset Password"><span class="fa fa-back"></span>respon</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode Laporan</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Pelapor</th>
                            <th>Tanggal Lapor</th>
                            <th>Status Laporan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

</div>
</div>