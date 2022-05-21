<?php
session_start();

$_SESSION['cart'] = [];
header('location:login_kasir.php');
?>