
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Aplikasi Pendaftaran PAUD Al-Iklhas - 2023</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin logout ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda akan keluar dari Aplikasi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= $base_url ?>/logout_control.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- js datepicker -->
  <script src="../assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

  <!-- https://code.jquery.com/jquery-3.5.1.js -->



  <script type="text/javascript">
    $(function(){
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
        });

        new DataTable('#data-tabel-pendaftaran')
        new DataTable('#data-tabel-wali')
        new DataTable('#data-tabel-kelas')
        new DataTable('#data-tabel-kegiatan')
        new DataTable('#data-tabel-kegiatan-siswa')
        new DataTable('#data-tabel-siswa', {
          initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    if (column.index() === 2 || column.index() == 3) { 
                      // Create select element
                      let select = document.createElement('select');
                      select.add(new Option(''));
                      column.footer().replaceChildren(select);
      
                      // Apply listener for user change in value
                      select.addEventListener('change', function () {
                          var val = DataTable.util.escapeRegex(select.value);
      
                          column
                              .search(val ? '^' + val + '$' : '', true, false)
                              .draw();
                      });
      
                      // Add list of options
                      column
                          .data()
                          .unique()
                          .sort()
                          .each(function (d, j) {
                              select.add(new Option(d));
                          });
                    }
                });
          }
        });
    });
  </script>

</body>

</html>