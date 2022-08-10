<?php 
session_start();
if(!empty($_SESSION['namaadmin'])){
	require '../../db_con.php';
	if(isset($_POST['updateStok'])){
		$kdbrg = $_POST['kdbrg'];
		$nmsupp = $_POST['nmsupp'];
		$nmbrg = $_POST['nmbrg'];
		$jmlh = $_POST['jumlah'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		
		$updb =  "UPDATE stok_brg SET nama_supp='$nmsupp', nama_brg='$nmbrg', jumlah='$jmlh', hrg_beli='$beli', hrg_jual='$jual' WHERE kode_brg='$kdbrg'";
		$query = mysqli_query($dbconnect, $updb);
		
		if ($query) {
			echo '<script>window.location="../../admin.php?page=stok/stok&accordion=on&active=yes&success-edit=edit-data"</script>';
		} else {

		}		
		// echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&success=tambah-data"</script>';
	}
	if(isset($_POST['updateSupp'])){
		$idsupp = $_POST['idsupp2'];
		$nmsupp = $_POST['nmsupp2'];
		$nohp = $_POST['nohp2'];
		$almt = $_POST['almt2'];

		$updb =  "UPDATE supplier SET nama_supp='$nmsupp', no_hp='$nohp', alamat='$almt' WHERE id_supp='$idsupp'";
		$query = mysqli_query($dbconnect, $updb);
		//babi
		if ($query) {
			echo '<script>window.location="../../admin.php?page=supplier/supplier&accordion=on&active=yes&success-edit=edit-data"</script>';
		} else {

		}		
		// echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&success=tambah-data"</script>';
	}
	if(isset($_POST['updateRole'])){
		$idrole = $_POST['idrole2'];
		$nmrole = $_POST['nmrole2'];
		$jenis = $_POST['jenis2'];
		

		$updb =  "UPDATE role SET nama='$nmrole', jenis='$jenis' WHERE id_role='$idrole'";
		$query = mysqli_query($dbconnect, $updb);
		
		if ($query) {
			echo '<script>window.location="../../admin.php?page=role/role&accordion2=on&active=yes&success-edit=edit-data"</script>';
		} else {

		}		
		// echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&success=tambah-data"</script>';
	}
	if(isset($_POST['updateUserAdmin'])){
		$nama = $_POST['nama'];
		$user = $_POST['user'];
		$pwd = $_POST['pwd'];
		
		$updb =  "UPDATE admin_acc SET username='$user', password='$pwd' WHERE nama_admin='$nama'";
		$query = mysqli_query($dbconnect, $updb);
		
		if ($query) {
			echo '<script>window.location="../../admin.php?page=user/user&accordion=on&active=yes&success-editadmin=edit-data"</script>';
		} else {

		}		
		// echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&success=tambah-data"</script>';
	}
	if(isset($_POST['updateUserKasir'])){
		$nama = $_POST['nama2'];
		$user = $_POST['user2'];
		$pwd = $_POST['pwd2'];
		
		$updb =  "UPDATE Kasir_acc SET username='$user', password='$pwd' WHERE nama_kasir='$nama'";
		$query = mysqli_query($dbconnect, $updb);
		
		if ($query) {
			echo '<script>window.location="../../admin.php?page=user/user&accordion=on&active=yes&success-editkasir=edit-data"</script>';
		} else {

		}		
		// echo '<script>window.location="../../admin.php?page=brg_masuk/brg_masuk&success=tambah-data"</script>';
	}
	if(isset($_POST['updateMenu'])){
		$id = $_POST['id'];
		$idrole = $_POST['idrole2'];
		$nmmenu = $_POST['nmmenu2'];
		$nmjenis = $_POST['jenis2'];
		$hrg = $_POST['hrg2'];
		$branch = $_POST['menu'];

		$cluster = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmjenis'");
		$clust = mysqli_fetch_assoc($cluster);
		$jenis = $clust['jenis'];
		if ($cluster->num_rows == 1) {
			if ($branch === 'mkn') {
				$updb =  "UPDATE makanan SET nama='$nmmenu', role='$idrole', jenis='$jenis', harga='$hrg' WHERE id ='$id'";
				$query = mysqli_query($dbconnect, $updb);
				
				if ($query) {
					echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&success-edit=edit-data"</script>';
				} else {
					echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&error-edit=edit-data"</script>';
				}
			} else if ($branch === 'mnm') {
				$updb =  "UPDATE minuman SET nama='$nmmenu', role='$idrole', jenis='$jenis', harga='$hrg' WHERE id='$id'";
				$query = mysqli_query($dbconnect, $updb);
				
				if ($query) {
					echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&success-edit=edit-data"</script>';
				} else {
					echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&error-edit=edit-data"</script>';
				}
			} else {
				header("location:../../admin.php?page=menu/menu&accordion2=on&active=yes&pesan=nullcheckbox");
			}
		} else {
			header("location:../../admin.php?page=menu/menu&accordion2=on&active=yes&pesan=nullrole");
		}
	}
	if(isset($_POST['updateMenupkt'])){
		$id = $_POST['idpkt'];
		$idrole = $_POST['idrolepkt2'];
		$nmmenu = $_POST['nmpkt2'];
		$jmlh = $_POST['jmlh2'];
		$nmjenis = $_POST['jenispkt2'];
		$hrg = $_POST['hrgpkt2'];
		
		$cluster = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmjenis'");
		$clust = mysqli_fetch_assoc($cluster);
		$jenis = $clust['jenis'];
		if ($cluster->num_rows == 1) {
			$pkt = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE id = '$id'");
			//   $query = $con->query($sql);  
			  if ($pkt->num_rows > 0) {
					$updb =  "UPDATE paket_barbar SET nama='$nmmenu', role='$idrole', jenis='$jenis', jumlah='$jmlh', harga='$hrg' WHERE id ='$id'";
					$query = mysqli_query($dbconnect, $updb);
					
					if ($query) {
						echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&success-edit=edit-data"</script>';
					} else {
						echo '<script>window.location="../../admin.php?page=menu/menu&accordion2=on&active=yes&error-edit=edit-data"</script>';
		
					}
			  }
		} else {
			header("location:../../admin.php?page=menu/menu&accordion2=on&active=yes&pesan=nullrole");
		}
	}
}
