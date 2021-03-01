<?php if($this->session->has_userdata('gagal')) {  ?>

<div class="alert alert-danger" role="alert">
    <?= $this->session->flashdata('gagal'); ?>
</div>

<?php } ?>