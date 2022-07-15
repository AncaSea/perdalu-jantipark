<?php
$conn = mysqli_connect("localhost", "root", "", "db_perdalu");
if (isset($_POST["submit"])) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array("sql"))) {
        // $response = array(
        //     "type" => "error",
        //     "message" => "Invalid File Type"
        // );
        header('location:../../../../admin.php?page=backuprestore/restore-data&accordion3=on&active=yes&pesan=invalid-restore');
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
} else {
    header('location:../../../../admin.php?page=backuprestore/restore-data&accordion3=on&active=yes&pesan=failed-restore');
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
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
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
            header('location:../../../../admin.php?page=backuprestore/restore-data&accordion3=on&active=yes&pesan=failed-restore');
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