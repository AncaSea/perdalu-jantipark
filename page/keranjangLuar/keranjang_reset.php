<?php
session_start();

$_SESSION['cart'] = [];
header('location:../../../../admin.php?page=kasir/kasirLuar&accordion=on');
?>