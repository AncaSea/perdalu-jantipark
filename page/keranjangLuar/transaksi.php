<?php
include '../../db_con.php';
session_start();
// include "authcheckkasir.php";

//menghilangkan Rp pada nominal
$bayar = preg_replace('/\D/', '', $_SESSION['byr']);
// print_r(preg_replace('/\D/', '', $_POST['total']));

// print_r($_SESSION['cart']) ;

$tanggal_waktu = date('Y-m-d');
$nomor = rand(111111,999999);
$total = $_SESSION['ttl'];
$nama = $_SESSION['namaadmin'];
$kembali = (int)$bayar - (int)$total;
$_SESSION['kmbl'] = $kembali;

//insert ke tabel transaksi

foreach ($_SESSION['cart'] as $key => $value) {
	$kdbrg = $value['kd'];
	$nmbrg = $value['nama'];
	$jmlh = $value['qty'];
	$hrgjual = $value['harga'];
	$hrg = (int)$hrgjual*(int)$jmlh;
	
	$dataadmin = mysqli_query($dbconnect, "SELECT * FROM admin_acc WHERE nama_admin='$nama'");
	$getadmin = mysqli_fetch_array($dataadmin);
	$user = $getadmin['username'];

	mysqli_query($dbconnect, "INSERT INTO penjualan (id_nota, no_nota,username,nama_kasir,tgl_penjualan,kode_brg,nama_brg,jumlah,hrg_jual,hrg,total) 
	VALUES (NULL,'$nomor','$user','$nama','$tanggal_waktu','$kdbrg','$nmbrg','$jmlh','$hrgjual','$hrg','$total')");

}

// //mendapatkan id transaksi baru
// $no_nota = mysqli_insert_id($dbconnect);

// //insert ke detail transaksi
// foreach ($_SESSION['cart'] as $key => $value) {

// 	$id_barang = $value['id'];
// 	$harga = $value['harga'];
// 	$qty = $value['qty'];
// 	$tot = $harga*$qty;
// 	$disk = $value['diskon'];

// 	mysqli_query($dbconnect,"INSERT INTO transaksi_detail (id_transaksi_detail,id_transaksi,id_barang,harga,qty,total,diskon) VALUES (NULL,'$id_transaksi','$id_barang','$harga','$qty','$tot','$disk')");

// 	// $sum += $value['harga']*$value['qty'];
// }

$_SESSION['cart'] = [];

//redirect ke halaman transaksi selesai
header("location:../../../../page/keranjangLuar/transaksi_selesai.php?idtrx=".$nomor);



?>