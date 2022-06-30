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

			function barangmsk(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT * FROM brg_masuk ORDER BY tgl_masuk DESC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r ($hasil);
						return $hasil;
					}
				}
			}

			function minggu_jualbrgmsk($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT * FROM brg_masuk WHERE tgl_masuk BETWEEN '$mnggAwl' AND '$mnggAkhr' ORDER BY tgl_masuk DESC");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function hari_jualbrgmsk($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT * FROM brg_masuk WHERE tgl_masuk = '$now' ORDER BY tgl_masuk DESC");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function barangkmbl(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT brg_kembali.*, stok_brg.kode_brg, stok_brg.hrg_beli, stok_brg.nama_brg
									 FROM brg_kembali INNER JOIN stok_brg on brg_kembali.kode_brg=stok_brg.kode_brg
									 ORDER BY tgl_kembali DESC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r ($hasil);
						return $hasil;
					}
				}
			}
			
			function minggu_jualbrgkmbl($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT brg_kembali.*, stok_brg.kode_brg, stok_brg.hrg_beli, stok_brg.nama_brg
									FROM brg_kembali INNER JOIN stok_brg on brg_kembali.kode_brg=stok_brg.kode_brg
									WHERE tgl_kembali BETWEEN '$mnggAwl' AND '$mnggAkhr' ORDER BY brg_kembali.tgl_kembali DESC");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function hari_jualbrgkmbl($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT brg_kembali.*, stok_brg.kode_brg, stok_brg.hrg_beli, stok_brg.nama_brg
									FROM brg_kembali INNER JOIN stok_brg on brg_kembali.kode_brg=stok_brg.kode_brg
									WHERE tgl_kembali = '$now' ORDER BY brg_kembali.tgl_kembali DESC");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

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

			function live_kakap(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE jenis='kakap' AND CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY jenis");
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
				$sql = "SELECT COUNT(id_nota) AS jmlh FROM penjualan WHERE CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY no_nota";
				if ($result = mysqli_query($dbconnect, $sql)) {
					// print_r($result);
					$hasil = mysqli_num_rows($result);
					return $hasil;
				}
			}
			
			function livemodalhari(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT SUM(total) AS modal FROM brg_masuk WHERE CAST(tgl_masuk AS DATE) = CAST(NOW() AS DATE)");
				$row = mysqli_fetch_array($sql);
				// if ($row = mysqli_query($dbconnect, $sql)) {
					// print_r($result);
					if ($row['modal']<=0) {
						$hasil = 0;
					}else{
						$hasil = $row['modal'];
					}
					return $hasil;
				// }
			}

			function modal(){
				include 'db_con.php';
				$sql = mysqli_query($dbconnect, "SELECT SUM(total) AS modal FROM brg_masuk");
				$row = mysqli_fetch_array($sql);
				// if ($row = mysqli_query($dbconnect, $sql)) {
					// print_r($result);
					if ($row['modal']<=0) {
						$hasil = 0;
					}else{
						$hasil = $row['modal'];
					}
					return $hasil;
				// }
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

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan ORDER BY tgl_penjualan DESC");
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
			
			// function periode_jual($Y, $M1){
			// 	include 'db_con.php';

			// 	$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' ORDER BY no_nota");
			// 	// $row =  $sql);
			// 	if ($sql -> num_rows > 0) {
			// 		while ($lap = mysqli_fetch_all($sql)) {
			// 			$hasil = $lap;
			// 			// print_r($hasil);
			// 			return $hasil;
			// 		}
			// 	}
			// }
			
			// function laptransperiode($Y, $M1){
			// 	include 'db_con.php';

			// 	$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' GROUP BY no_nota";
			// 	if ($result = mysqli_query($dbconnect, $sql)) {
			// 		$hasil = mysqli_num_rows($result);
			// 		// print_r($hasil);
			// 		return $hasil;
			// 	}
			// }
			
			// function periode_jualdlm($Y, $M1){
			// 	include 'db_con.php';

			// 	$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' ORDER BY no_nota");
			// 	// $row =  $sql);
			// 	if ($sql -> num_rows > 0) {
			// 		while ($lap = mysqli_fetch_all($sql)) {
			// 			$hasil = $lap;
			// 			// print_r($hasil);
			// 			return $hasil;
			// 		}
			// 	}
			// }
			
			// function laptransperiodedlm($Y, $M1){
			// 	include 'db_con.php';

			// 	$sql = "SELECT COUNT(id_nota) AS trans FROM penjualan_dalam WHERE MONTH(tgl_penjualan) = '$M1' AND YEAR(tgl_penjualan) = '$Y' GROUP BY no_nota";
			// 	if ($result = mysqli_query($dbconnect, $sql)) {
			// 		$hasil = mysqli_num_rows($result);
			// 		// print_r($hasil);
			// 		return $hasil;
			// 	}
			// }

			function minggu_jual($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				// $mnggAwl = date('Y-m-"%'.$tgl1.'%"');
				// $mnggAkhr = date('Y-m-"%'.$tgl2.'%"');
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' ORDER BY tgl_penjualan DESC");
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

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE tgl_penjualan = '$now' ORDER BY tgl_penjualan DESC");
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

			function minggu_jualdlm($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' ORDER BY tgl_penjualan DESC");
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

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE tgl_penjualan = '$now' ORDER BY tgl_penjualan DESC");
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

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam ORDER BY tgl_penjualan DESC");
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

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam ORDER BY tgl_penjualan DESC");
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

				$sql = mysqli_query($dbconnect, "SELECT * FROM penjualan ORDER BY tgl_penjualan DESC");
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

			function livejualdlm(){
				include 'db_con.php';

				$sql = mysqli_query($dbconnect, "SELECT jenis, SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE) GROUP BY jenis ASC");
				if ($sql -> num_rows > 0) {
					while ($row = mysqli_fetch_all($sql)) {
						$hasil = $row;
						// print_r($row);
						return $hasil;
					}
				}
			}

			function livetransdlm(){
				include 'db_con.php';

				$sql = "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE CAST(tgl_penjualan AS DATE) = CAST(NOW() AS DATE)";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$ttlpsn = mysqli_fetch_assoc($result);
					if (!empty($ttlpsn['ttlpsn'])) {
						$hasil = $ttlpsn['ttlpsn'];
					} else {
						$hasil = 0;
					}
					return $hasil;
					// print_r($hasil);
				}
			}

			function liveminggu_jualdlm($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT jenis, SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr' GROUP BY jenis ASC");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function livelaptransminggudlm($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr'";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$ttlpsn = mysqli_fetch_assoc($result);
					if (!empty($ttlpsn['ttlpsn'])) {
						$hasil = $ttlpsn['ttlpsn'];
					} else {
						$hasil = 0;
					}
					return $hasil;
					// print_r($hasil);
				}
			}
			
			function livehari_jualdlm($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT jenis, SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE tgl_penjualan = '$now' GROUP BY jenis ASC");
				// $row =  $sql);
				if ($sql -> num_rows > 0) {
					while ($lap = mysqli_fetch_all($sql)) {
						$hasil = $lap;
						// print_r($hasil);
						return $hasil;
					}
				}
			}

			function livelaptransharidlm($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = "SELECT SUM(total_pesan) AS ttlpsn FROM penjualan_dalam WHERE tgl_penjualan = '$now'";
				if ($result = mysqli_query($dbconnect, $sql)) {
					$ttlpsn = mysqli_fetch_assoc($result);
					if (!empty($ttlpsn['ttlpsn'])) {
						$hasil = $ttlpsn['ttlpsn'];
					} else {
						$hasil = 0;
					}
					return $hasil;
					// print_r($hasil);
				}
			}

			function liveScoutModalMinggu($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT SUM(total) AS modal FROM brg_masuk WHERE tgl_masuk BETWEEN '$mnggAwl' AND '$mnggAkhr'");
				// $row =  $sql);
				$row = mysqli_fetch_array($sql);
				// print_r($sql123);
				if ($row['modal']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['modal'];
				}
				return $hasil;
			}

			function liveScoutIncomeMinggu($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT SUM(hrg) AS omset FROM penjualan WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr'");
				$row = mysqli_fetch_array($sql);
				// print_r($sql123);
				if ($row['omset']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['omset'];
				}
				return $hasil;
			}
			
			function liveScoutModalHari($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT SUM(total) AS modal FROM brg_masuk WHERE tgl_masuk = '$now'");
				$row = mysqli_fetch_array($sql);
				// print_r($sql123);
				if ($row['modal']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['modal'];
				}
				return $hasil;
			}

			function liveScoutIncomeHari($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT SUM(hrg) AS omset FROM penjualan WHERE tgl_penjualan = '$now'");
				$row = mysqli_fetch_array($sql);
				// print_r($sql123);
				if ($row['omset']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['omset'];
				}
				return $hasil;
			}

			function liveScoutIncomeMingguDalam($tgl1, $tgl2){
				include 'db_con.php';

				$mnggAwl = date('Y-m-d', strtotime($tgl1));
				$mnggAkhr = date('Y-m-d', strtotime($tgl2));

				$sql = mysqli_query($dbconnect, "SELECT SUM(hrg) AS omset FROM penjualan_dalam WHERE tgl_penjualan BETWEEN '$mnggAwl' AND '$mnggAkhr'");
				$row = mysqli_fetch_array($sql);
				// print_r($sql123);
				if ($row['omset']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['omset'];
				}
				return $hasil;
			}

			function liveScoutIncomeHariDalam($tgl1){
				include 'db_con.php';

				$now = date('Y-m-d', strtotime($tgl1));

				$sql = mysqli_query($dbconnect, "SELECT SUM(hrg) AS omset FROM penjualan_dalam WHERE tgl_penjualan = '$now'");
				$row = mysqli_fetch_array($sql);
				// print_r($sql123);
				if ($row['omset']<=0) {
					$hasil = 0;
				}else{
					$hasil = $row['omset'];
				}
				return $hasil;
			}
	 }
