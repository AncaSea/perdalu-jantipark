<?php 
session_start();
if(!empty($_SESSION['namaadmin']) || !empty($_SESSION['namakasir'])){
	include '../../db_con.php';
	if(!empty($_GET['supplier'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM supplier WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=supplier/supplier&accordion=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['barangmsk'])){
		 $id= $_GET['id'] ;
		// $data[] = $id;
		$sql = "DELETE FROM brg_masuk WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['barangkmbl'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM brg_kembali WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=brg_kembali/brg_kembali&accordion=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['stok'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM stok_brg WHERE kode_brg='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=stok/stok&accordion=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['user'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM stok_brg WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=user/user&accordion=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['role'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM role WHERE id_role='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=role/role&accordion2=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['mkn'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM makanan WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['mnm'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM minuman WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['pkt'])){
		$id= $_GET['id'];
		// $data[] = $id;
		$sql = "DELETE FROM paket_barbar WHERE id='$id'";
		$del = mysqli_query($dbconnect, $sql);
		echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&remove=hapus-data"</script>';
	}
	if(!empty($_GET['lapluar'])){
		$nota = $_GET['nota'];

		$sqllapluar = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE no_nota = '$nota'");
		if ($sqllapluar->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($sqllapluar)) {
				// foreach ($row as $value) {
					$stokkmbl = $row['jumlah'];
					$kodebrgkmbl = $row['kode_brg'];
					$sqlstok = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg = '$kodebrgkmbl'");
					$stok = mysqli_fetch_assoc($sqlstok);
					$stokold = $stok['jumlah'];
					$jumstok = (int)$stokkmbl + (int)$stokold;
					// echo($jumstok);
					$updtstok = mysqli_query($dbconnect, "UPDATE stok_brg SET jumlah = '$jumstok' WHERE kode_brg='$kodebrgkmbl'");
				// }
			}
		}

		$sql = "DELETE FROM penjualan WHERE no_nota='$nota'";
		$del = mysqli_query($dbconnect, $sql);

		echo '<script>window.location="../../admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes&remove=hapus-data"</script>';
	}

	if (!empty($_GET['lapdlm'])) {
		$nota = $_GET['nota'];

		$sql = "DELETE FROM penjualan_dalam WHERE no_nota='$nota'";
		$del = mysqli_query($dbconnect, $sql);

		echo '<script>window.location="../../admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes&remove=hapus-data"</script>';
	}

	if (!empty($_GET['lapluarksr'])) {
		$nota = $_GET['nota'];

		$sqllapluar = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE no_nota = '$nota'");
		if ($sqllapluar->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($sqllapluar)) {
				// foreach ($row as $value) {
				$stokkmbl = $row['jumlah'];
				$kodebrgkmbl = $row['kode_brg'];
				$sqlstok = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg = '$kodebrgkmbl'");
				$stok = mysqli_fetch_assoc($sqlstok);
				$stokold = $stok['jumlah'];
				$jumstok = (int)$stokkmbl + (int)$stokold;
				// echo($jumstok);
				$updtstok = mysqli_query($dbconnect, "UPDATE stok_brg SET jumlah = '$jumstok' WHERE kode_brg='$kodebrgkmbl'");
				// }
			}
		}

		$sql = "DELETE FROM penjualan WHERE no_nota='$nota'";
		$del = mysqli_query($dbconnect, $sql);

		echo '<script>window.location="../../perdalu/penjualanLuar.php"</script>';
	}

	if (!empty($_GET['lapdlmksr'])) {
		$nota = $_GET['nota'];

		$sql = "DELETE FROM penjualan_dalam WHERE no_nota='$nota'";
		$del = mysqli_query($dbconnect, $sql);

		echo '<script>window.location="../../perdalam/penjualanDalam.php"</script>';
	}
}

