<?php
if (!empty($_GET['nama_file'])) {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_perdalu';
  // $host = 'sql100.epizy.com';
  // $user = 'epiz_32053978';
  // $pass = 'MxhGF4sbHkebG';
  // $db = 'epiz_32053978_db_perdalu';
  $nama_file = $_GET['nama_file'];
  $connection = mysqli_connect("$host", "$user", "$pass", "$db");
  $tables = array();
  $result = mysqli_query($connection, "SHOW TABLES");
  while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
  }
  $return = '';
  foreach ($tables as $table) {
    $result = mysqli_query($connection, "SELECT * FROM " . $table);
    $num_fields = mysqli_num_fields($result);

    $return .= 'DROP TABLE ' . $table . ';';
    $row2 = mysqli_fetch_row(mysqli_query($connection, "SHOW CREATE TABLE " . $table));
    $return .= "\n\n" . $row2[1] . ";\n\n";

    for ($i = 0; $i < $num_fields; $i++) {
      while ($row = mysqli_fetch_row($result)) {
        $return .= "INSERT INTO " . $table . " VALUES(";
        for ($j = 0; $j < $num_fields; $j++) {
          $row[$j] = addslashes($row[$j]);
          if (isset($row[$j])) {
            $return .= '"' . $row[$j] . '"';
          } else {
            $return .= '""';
          }
          if ($j < $num_fields - 1) {
            $return .= ',';
          }
        }
        $return .= ");\n";
      }
    }
    $return .= "\n\n\n";
  }
  // save as .sql file
  //give additional description
  // $content_="\n-- Database Janti Park Backup --\n";
  // $content_ .="-- Ver. : 1.0.1\n";
  // $content_ .="-- Host : app.infinityfree.net/\n";
  // $content_ .="-- Generating Tim~e : ".date("M d").", ".date("Y")." at ".date("H:i:s:").date("A")."\n";
  // $content_ .=$content;
  //save the file
  // $backup_file_name = $db_name." ".date("Y-m-d H-i-s").".sql";
  $fp = fopen($nama_file, 'w+');
  $result = fwrite($fp, $return);
  fclose($fp);
  //download file directly from browser
  $file_path = $nama_file;
  if (!empty($file_path) && file_exists($file_path)) {
    header("Pragma:public");
    header("Expired:0");
    header("Cache-Control:must-revalidate");
    header("Content-Control:public");
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition:attachment; filename=\"" . basename($file_path) . "\"");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length:" . filesize($file_path));
    flush();
    readfile($file_path);
    exit();
    // header('location:../../../../admin.php?page=backuprestore/backup-data&accordion3=on&active=yes&pesan=success-backup');
  }
} else {
  header('location:../../../../admin.php?page=backuprestore/backup-data&accordion3=on&active=yes&pesan=failed-backup');
}
