<?php
include '../../db_con.php';
include $viewnota;
$lihat = new view($dbconnect);
session_start();
// include "authcheckkasir.php";

//menghilangkan Rp pada nominal
$bayar = preg_replace('/\D/', '', $_SESSION['byrdlm']);
// print_r(preg_replace('/\D/', '', $_POST['total']));

// print_r($_SESSION['cart']) ;

$tanggal_waktu = date('Y-m-d');
// $nomor = rand(111111,999999);
$antrian = $lihat->nota_id();
$nomor = date('dmY') . '/' . $antrian;
$total = $_SESSION['ttl'];
$nama = $_SESSION['namakasir'];
$kembali = (int)$bayar - (int)$total;
$_SESSION['kmbl'] = $kembali;

//insert ke tabel transaksi

foreach ($_SESSION['cartdlm'] as $key => $value) {
	$idpsn = $value['id'];
	$nmpsn = $value['nama'];
	$role = $value['role'];
	$jenis = $value['jenis'];
	$hrgjual = $value['harga'];
	$jmlh = $value['qty'];
	$hrg = (int)$hrgjual*(int)$jmlh;

	$datakasir = mysqli_query($dbconnect, "SELECT * FROM kasir_acc WHERE nama_kasir='$nama'");
	$getkasir = mysqli_fetch_array($datakasir);
	$user = $getkasir['username'];

	$sql = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE role='$role'");
	// $getrolepkt = mysqli_fetch_assoc($rolepkt);
	// print_r($getpenle);

	if ($sql -> num_rows > 0) {
		while ($data = mysqli_fetch_assoc($sql)) {
			// if ($role = $data['role']) {
				// $paket = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE role='$role'");
				// if ($paket -> num_rows > 0) {
					// while ($row = mysqli_fetch_assoc($paket)) {
						if ($nmpsn == $data['nama']) {
							// $spesdata = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE role='$role' AND nama='$nmpsn'");
							// $data = mysqli_fetch_all($spesdata);
							// while ($data = mysqli_fetch_all($spesdata)) {
								$ttlpsn = $jmlh*$data['jumlah'];
								// $hrg = (int)$hrgjual*(int)$ttlpsn;
		
								mysqli_query($dbconnect, "INSERT INTO penjualan_dalam (id_nota, no_nota,username,nama_kasir,tgl_penjualan,nama_pesanan,role,jenis,jumlah,total_pesan,hrg_jual,hrg,total) 
								VALUES (NULL,'$nomor','$user','$nama','$tanggal_waktu','$nmpsn','$role','$jenis','$jmlh','$ttlpsn','$hrgjual','$hrg','$total')");
							// }	
						}
					// }
				// }
			// }
		}
	} else {
		$ttlpsn = $jmlh;
		// $hrg = (int)$hrgjual*(int)$ttlpsn;

		mysqli_query($dbconnect, "INSERT INTO penjualan_dalam (id_nota, no_nota,username,nama_kasir,tgl_penjualan,nama_pesanan,role,jenis,jumlah,total_pesan,hrg_jual,hrg,total) 
		VALUES (NULL,'$nomor','$user','$nama','$tanggal_waktu','$nmpsn','$role','$jenis','$jmlh','$ttlpsn','$hrgjual','$hrg','$total')");
	}
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

$_SESSION['cartdlm'] = [];

//redirect ke halaman transaksi selesai
header("location:transaksi_selesai.php?idtrx=".$nomor);



?>