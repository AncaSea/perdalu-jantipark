<?php 
include '../../db_con.php';
session_start();
// include "authcheckkasir.php";

$id = $_GET['id'];

$cart = $_SESSION['cartdlm'];
// print_r($cart);

//berfungsi untuk mengambil data secara spesifik
$k = array_filter($cart,function ($var) use ($id){
	return ($var['id']==$id);
});
print_r($k);

foreach ($k as $key => $value) {
	unset($_SESSION['cartdlm'][$key]);
}

//mengembalikan urutan data
$_SESSION['cartdlm'] = array_values($_SESSION['cartdlm']);

header('location:../../admin.php?page=kasir/kasirDalam&accordion2=on&active=yes');

?>