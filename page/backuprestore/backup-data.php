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
          <h1 style="display: inline-block;">Backup Database</h1>
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
          <div class="row sat" style="margin-left: 200px ; font-size:20px;"> <br>
            <b>Silahkan klik tombol download dibawah untuk melakukan Backup file database</b> <br>
            <a style="margin: 40px 0px 0px 300px ;" href="page/backuprestore/download-backup-data.php?nama_file=<?php echo $file; ?>" class="btn btn-success">
              <i class="fa fa-download"></i> Download</a>
          </div>

          <div style="margin: 40px 0px 0px 400px ;color:red;">
            <b>Saran : Lakukan Backup Database 1 minggu sekali !!</b>
          </div>
        </div>
      </div>

      <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->

    </div>
    <! --/row -->
  </section>