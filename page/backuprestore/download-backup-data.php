<?php
if (!empty($_GET['nama_file'])) {
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'db_perdalu';
  // $host = 'sql104.epizy.com';
  // $user = 'epiz_32045382';
  // $pass = 'a0PKmrAokT';
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
  //save file
  $handle = fopen(getenv('HOMEDRIVE') . getenv('HOMEPATH') . '\Downloads\ ' . $nama_file, 'w+');
  fwrite($handle, $return);
  fclose($handle);
  header('location:../../../../admin.php?page=backuprestore/backup-data&accordion3=on&active=yes&pesan=success-backup');
} else {
  header('location:../../../../admin.php?page=backuprestore/backup-data&accordion3=on&active=yes&pesan=failed-backup');
}
