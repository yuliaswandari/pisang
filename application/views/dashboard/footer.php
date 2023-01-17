<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Developed by <?= $sys->developer; ?>.
  </div>
  <!-- Default to the left -->
  <div class="copyright">&copy; <?= $sys->year; ?> All rights reserved.</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>/assets/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function() {

    $('#messageConsult').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });

    $('#replyConsult').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });



    $('#example2').DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });

    $('#pengguna').DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });



  });

  $('#saveIdentifikasi').click(function() {
    checked = $("input[type=checkbox]:checked").length;

    if (!checked) {
      alert("Anda harus memilih setidaknya 1 pilihan.");
      return false;
    }

  });

  $('#savequestion').click(function() {
    if ($('#subject').val() != '' && $('#messageConsult').val().trim().length > 0) {
      saveQuestion($('#subject').val(), $('#messageConsult').val(), $('#id_user').val());
    } else if ($('#subject').val() == '' && $('#messageConsult').val().trim().length == 0) {
      $("#err").html("Subject dan pesan tidak boleh kosong").show().fadeOut(2500);;
    } else if ($('#subject').val() == '') {
      $("#err").html("Subject tidak boleh kosong").show().fadeOut(2500);;
    } else if ($('#messageConsult').val().trim().length == 0) {
      $("#err").html("Pesan tidak boleh kosong").show().fadeOut(2500);;
    }

  });

  function saveQuestion(subject = '', messageConsult = '', id_user = '') {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('dashboard/savequestion') ?>',
      data: {
        id_user: id_user,
        subject: subject,
        message: messageConsult
      },
      success: function(savingStatus) {
        $("#modal-berhasil-simpan").modal('toggle');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        $('#err').text("Error encountered while saving the messages. Reload the page and then try again.");
      }
    });
  }

  $('#modal-berhasil-simpan').on('hidden.bs.modal', function() {
    location.reload();
  })
</script>


</body>

</html>