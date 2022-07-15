<?php
date_default_timezone_set("Asia/Jakarta");
$file = date("Y-m-d(H.i.s)") . '_backup_database.sql';
if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "success-backup") {
    $_SESSION['error'] = 'Berhasil Backup Database';
  }
  if ($_GET['pesan'] == "failed-backup") {
    $_SESSION['error'] = 'Gagal Backup Database';
  }
}
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="row" style="margin-left:1pc;margin-right:1pc;">
          <h1 style="display: inline-block;">Backup Datbase</h1>
          <h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
          <hr>
          <?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
            <script type="text/javascript">
              swal("SUCCESS!", "<?php echo $_SESSION['error']; ?>", "success").then(function() {
                window.location = "admin.php?page=backuprestore/backup-data&accordion3=on&active=yes";
              });
            </script>
          <?php }
          $_SESSION['error'] = '';
          ?>
          <div class="row sat">
            <a href="page/backuprestore/download-backup-data.php?nama_file=<?php echo $file; ?>" class="btn btn-success">
              <i class="fa fa-refresh"></i> Download Backup Database File</a>
          </div>
        </div>
      </div>

      <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->

    </div>
    <! --/row -->
  </section>