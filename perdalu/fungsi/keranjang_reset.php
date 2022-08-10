<?php
session_start();

$_SESSION['cart'] = [];
header('location:../../perdalu/kasir_page.php');
?>