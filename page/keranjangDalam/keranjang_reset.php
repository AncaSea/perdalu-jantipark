<?php
session_start();

$_SESSION['cartdlm'] = [];
header('location:../../admin.php?page=kasir/kasirDalam&accordion2=on&active=yes');
?>