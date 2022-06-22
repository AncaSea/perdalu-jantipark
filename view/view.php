<?php
	/*
	 * PROSES TAMPIL  
	 */ 
	 class view {
		protected $db;
		function __construct($db){
			$this->db = $db;
		}
			
			function useradmin(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT * FROM admin_acc");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function userkasir(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT * FROM kasir_acc");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			// function member_edit($id){
			// 	$sql = "select member.*, login.*
			// 			from member inner join login on member.id_member = login.id_member
			// 			where member.id_member= ?";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute(array($id));
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }
			
			// function toko(){
			// 	$sql = "select*from toko where id_toko='1'";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }

			// function kategori(){
			// 	$sql = "select*from kategori";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetchAll();
			// 	return $hasil;
			// }

			function barangmsk(){
				include 'db_con.php';
				// $sql = mysqli_query($dbconnect, "SELECT brg_masuk.*, stok_brg.kode_brg, stok_brg.hrg_jual
				// 					 FROM brg_masuk INNER JOIN stok_brg on brg_masuk.kode_brg=stok_brg.kode_brg 
				// 					 ORDER BY nama_brg ASC");
				$sql = mysqli_query($dbconnect, "SELECT * FROM brg_masuk ORDER BY nama_brg ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r ($hasil);
						return $hasil;
					}
				}
			}

			function barangkmbl(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT brg_kembali.*, stok_brg.kode_brg, stok_brg.hrg_beli, stok_brg.nama_brg
									 FROM brg_kembali INNER JOIN stok_brg on brg_kembali.kode_brg=stok_brg.kode_brg 
									 ORDER BY nama_brg ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r ($hasil);
						return $hasil;
					}
				}
			}
			
			// function barang_stok(){
			// 	$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
			// 			from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
			// 			where stok <= 3 
			// 			ORDER BY id DESC";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetchAll();
			// 	return $hasil;
			// }

			// function barang_edit($id){
			// 	$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
			// 			from barang inner join kategori on barang.id_kategori = kategori.id_kategori
			// 			where id_barang=?";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute(array($id));
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }

			// function barang_cari($cari){
			// 	$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
			// 			from barang inner join kategori on barang.id_kategori = kategori.id_kategori
			// 			where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetchAll();
			// 	return $hasil;
			// }

			function barang_id(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT * FROM brg_masuk ORDER BY id ASC");
				$row = mysqli_fetch_array($sql);
				$hasil = $row;
				
				$urut = substr($hasil['kode_brg'], 2, 3);
				$tambah = (int) $urut + 1;
				if(strlen($tambah) == 1){
					 $format = 'kb00'.$tambah.'';
				}else if(strlen($tambah) == 2){
					 $format = 'kb0'.$tambah.'';
				}else{
					$ex = explode('KB',$hasil['kode_brg']);
					$no = (int) $ex[1] + 1;
					$format = 'kb'.$no.'';
				}
				return $format;
			}

			function addsupp_id(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT * FROM brg_masuk ORDER BY id ASC");
				$row = mysqli_fetch_array($sql);
				$hasil = $row;
				
				$urut = substr($hasil['kode_brg'], 2, 3);
				$tambah = (int) $urut + 1;
				if(strlen($tambah) == 1){
					 $format = 'sp00'.$tambah.'';
				}else if(strlen($tambah) == 2){
					 $format = 'sp0'.$tambah.'';
				}else{
					$ex = explode('KB',$hasil['kode_brg']);
					$no = (int) $ex[1] + 1;
					$format = 'sp'.$no.'';
				}
				return $format;
			}

			function getsupp_id(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT admin_acc.*, stok_brg.kode_brg, stok_brg.hrg_beli, stok_brg.nama_brg
									 FROM brg_kembali INNER JOIN stok_brg on brg_kembali.kode_brg=stok_brg.kode_brg 
									 ORDER BY nama_brg ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r ($hasil);
						return $hasil;
					}
				}
			}

			function supplier() {
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM supplier");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function role() {
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM role");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			// function kategori_edit($id){
			// 	$sql = "select*from kategori where id_kategori=?";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute(array($id));
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }

			// function kategori_row(){
			// 	$sql = "select*from kategori";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> num_rows;
			// 	return $hasil;
			// }

			// function penjualan_row(){
			// 	$sql = "select*from penjualan";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> num_rows;
			// 	return $hasil;
			// }

			// function barang_row(){
			// 	$sql = "select*from stok_brg";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> num_rows;
			// 	return $hasil;
			// }
			
			function live_lele(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE jenis='lele' AND CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY jenis");
				if ($sql -> num_rows > 0) {
					$row = mysqli_fetch_array($sql);
					$hasil = $row['ttlpsn'];
				} else {
					$hasil = 0;
				}
				return $hasil;
			}

			function live_nila(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE jenis='nila' AND CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY jenis");
				if ($sql -> num_rows > 0) {
					$row = mysqli_fetch_array($sql);
					$hasil = $row['ttlpsn'];
				} else {
					$hasil = 0;
				}
				return $hasil;
			}

			function live_ayam(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE jenis='ayam' AND CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY jenis");
				if ($sql -> num_rows > 0) {
					$row = mysqli_fetch_array($sql);
					$hasil = $row['ttlpsn'];
				} else {
					$hasil = 0;
				}
				return $hasil;
			}

			function supp_row() {
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT COUNT(id_supp) AS supplier FROM supplier");
				$row = mysqli_fetch_assoc($sql);
				$hasil = $row['supplier'];
				return $hasil;
			}

			function barang_stok_row(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT SUM(jumlah) AS jmlh FROM stok_brg");
				$row = mysqli_fetch_array($sql);
				$hasil = $row['jmlh'];
				return $hasil;
			}

			function stok(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM stok_brg ORDER BY nama_brg DESC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function mnmkn(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM makanan ORDER BY nama DESC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function mnmnmn(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM minuman ORDER BY nama DESC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function mnpkt(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM paket_barbar ORDER BY nama DESC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function jual_row(){
				include 'db_con.php';
				$sql = "SELECT COUNT(id_nota) AS jmlh FROM penjualan WHERE CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY no_nota ";
				if ($result = mysqli_query($dbconnect, $sql)) {
					// print_r($result);
					$hasil = mysqli_num_rows($result);
					return $hasil;
				}
			}

			function omsetluar() {
				include 'db_con.php';
				// $date = date("Y-m-d");
				$sql123 = mysqli_query($dbconnect, "SELECT SUM(hrg) AS omset FROM penjualan where CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE)");
				$row = mysqli_fetch_array($sql123);
				// print_r($sql123);
				if ($row['omset']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['omset'];
				}
				return $hasil;
			}
			
			function omsetdlm() {
				include 'db_con.php';
				// $date = date("Y-m-d");
				$sql123 = mysqli_query($dbconnect, "SELECT SUM(hrg) AS omset FROM penjualan_dalam where CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE)");
				$row = mysqli_fetch_array($sql123);
				// print_r($sql123);
				if ($row['omset']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['omset'];
				}
				return $hasil;
			}

			function lapjual(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan ORDER BY no_nota ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function laptrans(){
				include 'db_con.php';

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}
			
			function periode_jual($Y, $M1){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' ORDER BY no_nota");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}
			
			function laptransperiode($Y, $M1){
				include 'db_con.php';

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}


			function minggu_jual($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				// $mnggAwl = date('Y-m-"%'.$tgl1.'%"');
				// $mnggAkhr = date('Y-m-"%'.$tgl2.'%"');
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' ORDER BY no_nota");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function laptransminggu($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				// $mnggAwl = date('Y-m-"%'.$tgl1.'%"');
				// $mnggAkhr = date('Y-m-"%'.$tgl2.'%"');
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}
			
			function hari_jual($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));
				// $mnggAwl = date('Y-m-"%'.$tgl1.'%"');
				// $mnggAkhr = date('Y-m-"%'.$tgl2.'%"');
				// $mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE tgl_penjualan = '$now' GROUP BY no_nota");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function laptranshari($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));
				// $mnggAwl = date('Y-m-"%'.$tgl1.'%"');
				// $mnggAkhr = date('Y-m-"%'.$tgl2.'%"');
				// $mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan WHERE tgl_penjualan = '$now' GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}

			function periode_jualdlm($Y, $M1){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' ORDER BY no_nota");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}
			
			function laptransperiodedlm($Y, $M1){
				include 'db_con.php';

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan_dalam WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}


			function minggu_jualdlm($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' ORDER BY no_nota");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function laptransminggudlm($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan_dalam WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}
			
			function hari_jualdlm($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE tgl_penjualan = '$now' GROUP BY no_nota");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function laptransharidlm($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan_dalam WHERE tgl_penjualan = '$now' GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}

			function lapjualdlm(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam ORDER BY no_nota ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function laptransdlm(){
				include 'db_con.php';

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan_dalam GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}

			function lapjualksrdlm(){
				include '../db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam ORDER BY no_nota ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function laptransksrdlm(){
				include '../db_con.php';

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan_dalam GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}

			function lapjualksrluar(){
				include '../db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan ORDER BY no_nota ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function laptransksrluar(){
				include '../db_con.php';

				$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$hasil = mysqli_num_rows($result);
					// print_r($hasil);
					return $hasil;
				}
			}

			// function hari_jual($hari){
			// 	$ex = explode('-', $hari);
			// 	$monthNum  = $ex[1];
			// 	$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
			// 	if($ex[2] > 9)
			// 	{
			// 		$tgl = $ex[2];
			// 	}else{
			// 		$tgl1 = explode('0',$ex[2]);
			// 		$tgl = $tgl1[1];
			// 	}
			// 	$cek = $tgl.' '.$monthName.' '.$ex[0];
			// 	$param = "%{$cek}%";
			// 	$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang,  barang.harga_beli, member.id_member,
			// 			member.nm_member from nota 
			// 		   left join barang on barang.id_barang=nota.id_barang 
			// 		   left join member on member.id_member=nota.id_member WHERE nota.tanggal_input LIKE ? 
			// 		   ORDER BY id_nota ASC";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute(array($param));
			// 	$hasil = $row -> fetchAll();
			// 	return $hasil;
			// }

			// function penjualan(){
			// 	$sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, member.id_member,
			// 			member.nm_member from penjualan 
			// 		   left join barang on barang.id_barang=penjualan.id_barang 
			// 		   left join member on member.id_member=penjualan.id_member
			// 		   ORDER BY id_penjualan";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetchAll();
			// 	return $hasil;
			// }

			// function jumlah(){
			// 	$sql ="SELECT SUM(total) as bayar FROM penjualan";
			// 	$row = $this -> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }

			// function jumlah_nota(){
			// 	$sql ="SELECT SUM(total) as bayar FROM nota";
			// 	$row = $this -> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }

			// function jml(){
			// 	$sql ="SELECT SUM(harga_beli*stok) as byr FROM barang";
			// 	$row = $this -> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }
	 }
