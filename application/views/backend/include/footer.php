  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Sipemadam.com <?= date('Y') ?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" Untuk Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end logout Modal -->

  <!-- edit Pendaftar Modal -->

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!--end edit Pendaftar Modal -->
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/sbadmin/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/sbadmin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/sbadmin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/sbadmin/') ?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/sbadmin/') ?>js/demo/datatables-demo.js"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.all.min.js' ?>"></script>


  <script src="<?= base_url() . 'assets/formregister/vendor/datepicker/moment.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/formregister/vendor/datepicker/daterangepicker.js' ?>"></script>
  <script src="<?= base_url() . 'assets/formregister/js/global.js' ?>"></script>
  <script src="<?= base_url() . 'assets/plugin/cleave.js' ?>"></script>

  <script src="<?= base_url('assets/sbadmin/') ?>js/myscript.js"></script>

  <script src="<?= base_url('assets/bs-timepicker/') ?>js/bootstrap-timepicker.min.js"></script>
  </body>

  </html>

  <script>
    $('.timepicker1').timepicker({
      maxHours : 24,
      showMeridian :false,
      showSeconds : true
    });

    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });

    $('.uang-attr').each(function(index, ele) {
      var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
      });
    });

    $('.uang-pemb').each(function(index, ele) {
      var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
      });
    });

    $('.uang-kuliah').each(function(index, ele) {
      var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
      });
    });
  </script>