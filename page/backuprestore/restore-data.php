<?php
// date_default_timezone_set("Asia/Jakarta");
// $file = date("Y-m-d(H.i.s)") . '_backup_database.sql';
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "success-restore") {
        $_SESSION['error'] = 'Berhasil Restore Database';
    }
    if ($_GET['pesan'] == "failed-restore") {
        $_SESSION['error'] = 'Gagal Restore Database';
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
                        <form method="post" action="" enctype="multipart/form-data" id="frm-restore">
                            <div class="form-row">
                                <div>Choose Backup File</div>
                                <div>
                                    <input type="file" name="backup_file" class="input-file" />
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Masukan</button>
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
    <?php
    $conn = mysqli_connect("localhost", "root", "", "db_perdalu");
    if (!empty($_FILES)) {
        // Validating SQL file type by extensions
        if (!in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
            "sql"
        ))) {
            $response = array(
                "type" => "error",
                "message" => "Invalid File Type"
            );
        } else {
            if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
                move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
                $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
            }
        }
    }

    function restoreMysqlDB($filePath, $conn)
    {
        $sql = '';
        $error = '';

        if (file_exists($filePath)) {
            $lines = file($filePath);

            foreach ($lines as $line) {

                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }

                $sql .= $line;

                if (substr(trim($line), -1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        $error .= mysqli_error($conn) . "\n";
                    }
                    $sql = '';
                }
            } // end foreach

            if ($error) {
                // $response = array(
                //     "type" => "error",
                //     "message" => $error
                // );
                header('location:../../../../admin.php?page=backuprestore/backup-data&accordion3=on&active=yes&pesan=failed-backup');
            } else {
                // $response = array(
                //     "type" => "success",
                //     "message" => "Database Restore Completed Successfully."
                // );
                header('location:../../../../admin.php?page=backuprestore/restore-data&accordion3=on&active=yes&pesan=success-restore');
            }
        }
    }
    ?>