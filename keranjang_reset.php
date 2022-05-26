<?php
session_start();

$_SESSION['cart'] = [];
header('location:kasir_page.php');
?>