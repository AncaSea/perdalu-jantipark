<?php
$host = 'localhost';
$user = 'rey';
// $user = 'root';
$pass = '';
$db = 'db_perdalu';

$dbconnect = new mysqli("$host", "$user", "$pass", "$db");

if ($dbconnect-> connect_error) {
    echo 'Koneksi gagal -> ' . $dbconnect->connect_error;
} else {
    // echo 'Koneksi Berhasil';
}

$view = 'view/view.php';