<?php
// $user = 'rey';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_perdalu';
// $host = 'sql104.epizy.com';
// $user = 'epiz_32045382';
// $pass = 'a0PKmrAokT';
// $db = 'epiz_32045382_db_perdalu';

$dbconnect = new \MySQLi("$host", "$user", "$pass", "$db");

if ($dbconnect-> connect_error) {
    echo 'Koneksi gagal -> ' . $dbconnect->connect_error;
} else {
    // echo 'Koneksi Berhasil';
}

$view = 'view/view.php';
$viewksr = '../view/view.php';
$viewnota = '../../view/view.php';