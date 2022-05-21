<?php 
include 'db_con.php';
session_start();
// include "authcheckkasir.php";

$kd = $_GET['kd'];

$cart = $_SESSION['cart'];
// print_r($cart);

//berfungsi untuk mengambil data secara spesifik
$k = array_filter($cart,function ($var) use ($kd){
	return ($var['kd']==$kd);
});
print_r($k);

foreach ($k as $key => $value) {
	unset($_SESSION['cart'][$key]);
}

//mengembalikan urutan data
$_SESSION['cart'] = array_values($_SESSION['cart']);

header('location:login_kasir.php');

?>