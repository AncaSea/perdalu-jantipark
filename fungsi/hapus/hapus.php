<?php 
session_start();
if(!empty($_SESSION['namaadmin'])){
	include '../../db_con.php';
	// if(!empty($_GET['kategori'])){
	// 	$id= $_GET['id'];
	// 	$data[] = $id;
	// 	$sql = 'DELETE FROM kategori WHERE id_kategori=?';
	// 	$row = $config -> prepare($sql);
	// 	$row -> execute($data);
	// 	echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
	// }
	if(!empty($_GET['supplier'])){
		$id= $_SESSION['id'];
		// $data[] = $id;
		$sql = "DELETE FROM supplier WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=supplier/supplier&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['barangmsk'])){
		 $id= $_GET['id'] ;
		// $data[] = $id;
		$sql = "DELETE FROM brg_masuk WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['barangkmbl'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM brg_kembali WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=brg_kembali/brg_kembali&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['stok'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM stok_brg WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=supplier/supplier&&remove=hapus-data"</script>';
	}
	if(!empty($_GET['jual'])){
		
		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config -> prepare($sqlI);
		$rowI -> execute($dataI);
		$hasil = $rowI -> fetch();
		
		/*$jml = $_GET['jml'] + $hasil['stok'];
		
		$dataU[] = $jml;
		$dataU[] = $_GET['brg'];
		$sqlU = 'UPDATE barang SET stok =? where id_barang=?';
		$rowU = $config -> prepare($sqlU);
		$rowU -> execute($dataU);*/
		
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if(!empty($_GET['penjualan'])){
		
		$sql = 'DELETE FROM penjualan';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=jual"</script>';
	}
	if(!empty($_GET['laporan'])){
		
		$sql = 'DELETE FROM nota';
		$row = $config -> prepare($sql);
		$row -> execute();
		echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
	}
}

