<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_perdalu';

$dbconnect = new \MySQLi("$host", "$user", "$pass", "$db");

if ($dbconnect-> connect_error) {
    echo 'Koneksi gagal -> ' . $dbconnect->connect_error;
} else {
    // echo 'Koneksi Berhasil';
}

$view = 'view/view.php';
$viewksr = '../view/view.php';
$viewnota = '../../view/view.php';