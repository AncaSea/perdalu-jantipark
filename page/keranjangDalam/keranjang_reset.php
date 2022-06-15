<?php
session_start();

$_SESSION['cartdlm'] = [];
header('location:../../../../admin.php?page=kasir/kasirDalam');
?>