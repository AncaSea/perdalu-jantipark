<?php
// date_default_timezone_set("Asia/Jakarta");
// $file = date("Y-m-d(H.i.s)") . '_backup_database.sql';
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "success-restore") {
        $_SESSION['success'] = 'Berhasil Restore Database';
    }
    if ($_GET['pesan'] == "failed-restore") {
        $_SESSION['error'] = 'Gagal Restore Database';
    }
    if ($_GET['pesan'] == "invalid-restore") {
        $_SESSION['error'] = 'File bukan SQL';
    }
}
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-left:1pc;margin-right:1pc;">
                    <h1 style="display: inline-block;">Restore Database</h1>
                    <h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
                    <hr>
                    <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
                        <script type="text/javascript">
                            swal("SUCCESS!", "<?php echo $_SESSION['success']; ?>", "success").then(function() {
                                window.location = "admin.php?page=backuprestore/restore-data&accordion3=on&active=yes";
                            });
                        </script>
                    <?php } else if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
                        <script type="text/javascript">
                            swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
                                window.location = "admin.php?page=backuprestore/restore-data&accordion3=on&active=yes";
                            });
                        </script>
                    <?php }
                    $_SESSION['error'] = '';
                    $_SESSION['success'] = '';
                    ?>
                    <div class="row sat">
                        <form method="post" action="page/backuprestore/upload-restore-data.php" enctype="multipart/form-data" id="frm-restore">
                            <div class="form-row">
                                <div style="margin-left: 30px ;">
                                    <b style="color:red;">PERINGATAN !!! <br>Sebelum melakukan upload database pastikan telah DISETUJUI OLEH DIREKTUR BUMDES dan telah melakukan BACKUP DATABASE Terlebih dahulu !! </b> <br><br> Pilih Backup File Database
                                </div>

                                <div style="margin-left: 30px ;">
                                    <input type="file" name="backup_file" class="input-file" id="backup_file" />
                                </div>
                                <br>
                                <div class="col-md-4" style="margin-left: 110px ;">
                                    <button type="submit" name="submit" value="Upload Data" class="btn btn-success fa-solid fa-cloud-arrow-up">&ensp; UPLOAD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->

        </div>
        <! --/row -->
    </section>