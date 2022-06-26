<?php 
session_start();
// if(!empty($_SESSION['admin'])){
	require '../../db_con.php';
	// if(!empty($_GET['kategori'])){
	// 	$nama= $_POST['kategori'];
	// 	$tgl= date("j F Y, G:i");
	// 	$data[] = $nama;
	// 	$data[] = $tgl;
	// 	$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
	// 	$row = $config -> prepare($sql);
	// 	$row -> execute($data);
	// 	echo '<script>window.location="../../index.php?page=kategori&success=tambah-data"</script>';
	// }
	if(!empty($_GET['supplier'])){
		$idsupp = $_POST['idsupp'];
		$nmsupp = $_POST['nmsupp'];
		$nohp = $_POST['nohp'];
		$almt = $_POST['alamat'];

		$sql = mysqli_query($dbconnect, "SELECT * FROM supplier WHERE nama_supp = '$nmsupp'");
		if ($sql->num_rows == 1) {
			header("location:../../admin.php?page=supplier/supplier&accordion=on&active=yes&pesan=samesupp");
		} else if ($sql->num_rows != 1) {
			$sql = mysqli_query($dbconnect, "INSERT INTO supplier (id, id_supp, nama_supp, no_hp, alamat) 
			VALUES('', '$idsupp', '$nmsupp', '$nohp', '$almt')");

			echo '<script>window.location="../../admin.php?page=supplier/supplier&accordion=on&active=yes&success-supp=tambah-data"</script>';
		}
	}
	if(!empty($_GET['role'])){
		$idrole = $_POST['idrole'];
		$nmrole = $_POST['nmrole'];
		$jenis = $_POST['jenis'];

		$cek = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmrole'");
		// $data = mysqli_fetch_assoc($cluster);
		// $jenis = $clust['jenis'];
		if ($cek->num_rows !== 1) {
				$sql = mysqli_query($dbconnect, "INSERT INTO role (id_role, nama, jenis) 
				VALUES('$idrole', '$nmrole', '$jenis')");
	
				echo '<script>window.location="../../admin.php?page=role/role&accordion2=on&active=yes&success-role=tambah-data"</script>';

		} else {
			header("location:../../admin.php?page=role/role&accordion2=on&active=yes&pesan=samerole");
		}
	}
	if(!empty($_GET['menu'])){
		$idrole = $_POST['idrole'];
		$nmmenu = $_POST['nmmenu'];
		$nmjenis = $_POST['jenis'];
		$hrg = $_POST['hrg'];
		$branch = $_POST['menu'];

		$cluster = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmjenis'");
		$clust = mysqli_fetch_assoc($cluster);
		$jenis = $clust['jenis'];
		if ($cluster->num_rows == 1) {
			if ($branch == 'mkn') {
				$sql = mysqli_query($dbconnect, "INSERT INTO makanan (id, nama, role, jenis, harga) 
				VALUES('', '$nmmenu', '$idrole', '$jenis', '$hrg')");
	
				echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&success-menu=tambah-data"</script>';
			} else if ($branch == 'mnm') {
				$sql = mysqli_query($dbconnect, "INSERT INTO minuman (id, nama, role, jenis, harga) 
				VALUES('', '$nmmenu', '$idrole', '$jenis', '$hrg')");
	
				echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&success-menu=tambah-data"</script>';
			} else {
				header("location:../../admin.php?page=menu/menu&accordion2=on&active=yes&pesan=nullcheckbox");
			}
		} else {
			header("location:../../admin.php?page=menu/menu&accordion2=on&active=yes&pesan=nullrole");
		}
	}
	if(!empty($_GET['menupkt'])){
		$idrole = $_POST['idrolepkt'];
		$nmmenu = $_POST['nmpkt'];
		$nmjenis = $_POST['jenispkt'];
		$jumlah = $_POST['jmlh'];
		$hrg = $_POST['hrgpkt'];

		$cluster = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmjenis'");
		$clust = mysqli_fetch_assoc($cluster);
		$jenis = $clust['jenis'];
		if ($cluster->num_rows == 1) {
				$sql = mysqli_query($dbconnect, "INSERT INTO paket_barbar (id, nama, role, jenis, jumlah, harga) 
				VALUES('', '$nmmenu', '$idrole', '$jenis', '$jumlah', '$hrg')");
	
				echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&success-menupkt=tambah-data"</script>';

		} else {
			header("location:../../admin.php?page=menu/menu&accordion2=on&active=yes&pesan=nullrole");
		}
	}
	if(!empty($_GET['barangmsk'])){
		$idsupp = $_POST['idsupp'];
		$nmsupp = $_POST['nmsupp'];
		$kodebrg = $_POST['kdbrg'];
		$nmbrg = $_POST['nmbrg'];
		$tgl = $_POST['tgl'];
		$jmlh = $_POST['jmlh'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$ttl = $beli * $jmlh;

		// JATAHMU REKKK
		
		$cekdb =  mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg = '$kodebrg'");
		$q = mysqli_fetch_array($cekdb);

		$ceksupp =  mysqli_query($dbconnect, "SELECT * FROM supplier WHERE id_supp = '$idsupp'");
		$s = mysqli_fetch_array($cekdb);

		// print_r($kode);
		
		if ($kodebrg == $q['kode_brg'] && $nmsupp == $s['nama_supp']) {
			$kode = $q['kode_brg'];
			// $jum = $q['jumlah'];
			// $j = $q['hrg_jual'];
			$tmbh = $jum + $jmlh;
			
			$sql1 = mysqli_query($dbconnect, "UPDATE stok_brg SET jumlah='$tmbh', hrg_beli='$beli', hrg_jual='$jual' WHERE kode_brg='$kode'");

			$sql = mysqli_query($dbconnect, "INSERT INTO 
			brg_masuk (id,kode_brg,id_supp,tgl_masuk,nama_supp,nama_brg,jumlah,hrg_satuan, hrg_jual, total) 
			VALUES ('', '$kodebrg','$idsupp','$tgl','$nmsupp','$nmbrg','$jmlh','$beli','$jual','$ttl')");

			echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes&accordion=on&active=yes&success=tambah-data"</script>';
		} else if ($kodebrg == $q['kode_brg'] && $nmsupp !== $s['nama_supp']) {
			echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes&pesan=unique"</script>';
		} else if ($kodebrg !== $q['kode_brg'] && $nmsupp == $s['nama_supp']) {
			$sql1 = mysqli_query($dbconnect, "INSERT INTO 
			stok_brg (kode_brg,nama_supp,nama_brg,jumlah,hrg_beli,hrg_jual) 
			VALUES ('$kodebrg','$nmsupp','$nmbrg','$jmlh','$beli','$jual')");

			echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes&accordion=on&active=yes&success=tambah-data"</script>';
		} else {
			echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes&pesan=nullsupp"</script>';
		}
	}	
	if(!empty($_GET['barangkmbl'])){
		$idsupp = $_POST['idsupp'];
		$nmsupp = $_POST['nmsupp'];
		$kodebrg = $_POST['kdbrg'];
		$nmbrg = $_POST['nmbrg'];
		$tgl = $_POST['tgl'];
		$jmlh = $_POST['sisa'];
		$beli = $_POST['beli'];
		$ttl = $beli * $jmlh;

		$sql = mysqli_query($dbconnect, "INSERT INTO 
		brg_kembali (id,kode_brg,id_supp,nama_supp,sisa_brg,tgl_kembali) 
		VALUES ('', '$kodebrg','$idsupp','$nmsupp','$jmlh','$tgl')");

		$cekdb =  mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg = '$kodebrg'");
		$q = mysqli_fetch_array($cekdb);
		$kode = $q['kode_brg'];
		$jum = $q['jumlah'];
		$tmbh = $jum - $jmlh;
		$sql1 = mysqli_query($dbconnect, "UPDATE stok_brg SET jumlah='$tmbh' WHERE kode_brg='$kode'");

		echo '<script>window.location="../../admin.php?page=brg_kembali/brg_kembali&accordion=on&active=yes&success-kmbl=tambah-data"</script>';
	}

	// if(!empty($_GET['jual'])){
	// 	$id = $_GET['id'];
		
	// 	// get tabel barang id_barang 
	// 	$sql = 'SELECT * FROM barang WHERE id_barang = ?';
	// 	$row = $config->prepare($sql);
	// 	$row->execute(array($id));
	// 	$hsl = $row->fetch();

	// 	if($hsl['stok'] > 0)
	// 	{
	// 		$kasir =  $_GET['id_kasir'];
	// 		$jumlah = 1;
	// 		$total = $hsl['harga_jual'];
	// 		$tgl = date("j F Y, G:i");
			
	// 		$data1[] = $id;
	// 		$data1[] = $kasir;
	// 		$data1[] = $jumlah;
	// 		$data1[] = $total;
	// 		$data1[] = $tgl;
			
	// 		$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
	// 		$row1 = $config -> prepare($sql1);
	// 		$row1 -> execute($data1);

	// 		echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';

	// 	}else{
	// 		echo '<script>alert("Stok Barang Anda Telah Habis !");
	// 				window.location="../../index.php?page=jual#keranjang"</script>';
	// 	}
	// }
// }