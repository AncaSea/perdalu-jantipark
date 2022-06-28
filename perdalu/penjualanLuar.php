<?php
require '../db_con.php';
session_start();
// include 'authcheckkasir.php';

include $viewksrdlm;
$lihat = new view($dbconnect);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kasir Perdagangan Dalam</title>

		<!-- Bootstrap core CSS -->
		<!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
		
		<!--external css-->
		<link href="assets/font-awesome/css/all.css" rel="stylesheet" />
		<link href="assets/font-awesome/css/fontawesome.css" rel="stylesheet" />
		<!-- <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap.css"/> -->
		<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
		
		<!-- SweetAlert Popup -->
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

		<!-- Custom styles for this template -->
		<link href="assets/css/style.css" rel="stylesheet">
		<!-- <link href="assets/css/style-responsive.css" rel="stylesheet"> -->
			
			<!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->
			<!-- <script type="text/javascript" src="assets/datatables/jquery.dataTables.js"></script>
			<script type="text/javascript" src="assets/datatables/dataTables.bootstrap.js"></script> -->
			<!-- <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script> -->

		<!--  jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
		
		<!-- Date Range Picker -->
		<!-- Include Required Prerequisites -->
		<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> -->
		<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> -->
		<!-- Include Date Range Picker -->
		<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

		<!-- pretty-checkbox -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>

		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
				font-size: 3.5rem;
				}
			}
			/* .daterangepicker .input-mini.active {
			background-color: #faf37b;
			}
			.daterangepicker td.in-range {
			background-color: #faf37b;
			}
			.daterangepicker td.active, .daterangepicker td.active:hover {
			background-color: #feb101;
			}
			.btn:focus {
				outline: none;
			} */
			.pretty {
				margin-right: 2.5em;
				margin-left: 2.5em;
			}
			/* .active{
				color: #F0F8FF;
				background-color:#000000;
			} */
			.auto-kasir{
				width: 100%;
				padding: 10px 15px;
				text-transform: capitalize;
				transition: 0.3s;
				display: flex;
				/* margin-left: 3em; */
				color: #000000;
			}
			.auto-kasir:hover{
				color: #F0F8FF;
				background-color:#000000;
				padding: 10px 18px;
				/* margin-left: -4em; */
			}

			.auto-result{
				padding: 0px;
				width: auto;
			}

			#search-result, #search-result2{
				cursor: pointer;
				position:absolute; 
				z-index: 2;
				background-color:#feb101;
				/* margin-left: -1em; */}
			.header{
				background:#000000;
				color:#F0F8FF;}
			#main-content{
				background:#fff;}
			#hidden{
				display:none
			}
		</style>
	</head>
	<body>
	<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
		<script type="text/javascript">

			swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
				window.location = "admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes";
			});

		</script>
	<?php }
			$_SESSION['error'] = '';
	?>
	<div style="margin:2em;" content="width=device-width, initial-scale=1.0">
		<div class="row">
			<div class="col-lg-12 main-chart"><h4 style="float: right; display: inline-block;margin-top:1em"><?php echo date('d F Y'); ?></h4>
				<h3>
					<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
						<button class="btn btn-danger">RESET</button>
					</a>-->
					<?php if(!empty($_GET['bulan'])){ ?>
						Data Laporan Penjualan <?= $bulan_tes[$_POST['bln']];?> <?= $_POST['thn'];?>
					<?php }elseif(!empty($_GET['cari'])){?>
						Data Laporan Penjualan <?= $_POST['cari'];?>
					<?php }elseif(!empty($_GET['hari'])){?>
						Data Laporan Penjualan tanggal <?= $_POST['hari'];?>
					<?php }else{?>
						Data Laporan Penjualan <?= date('Y');?>
					<?php }?>
				</h3>
				<hr>
				
				<div class="clearfix" style="margin-top:1em;"></div>

				<!-- view barang -->	
				<div class="modal-view">
					<table class="table table-striped table-bordered nowrap" style="width: 100%;" id="example1">
						<thead>
							<tr style="background:#FFF000;color:#333;">
								<th> No.</th>
								<th > No Nota</th>
								<th> Nama Kasir</th>
								<th> Tgl Penjualan</th>
								<th> Kode Barang</th>
								<th> Nama Barang</th>
								<th> Jumlah</th>
								<th> Harga Jual</th>
								<th> Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no=1; 
								// if(!empty($_GET['bulan'])){
								// 	$M = $_POST['bln'];
								// 	$Y = $_POST['thn'];
								// 	if ($M !== 'Bulan' && $Y !== 'Tahun') {
								// 		$no=1;
								// 		$omset = 0;
								// 		$jumlah = 0;
								// 		// $bayar = 0;
								// 		$hasil = $lihat -> periode_jual($Y, $M);
								// 		$transaksi = $lihat -> laptransperiode($Y, $M);
								// 		// print_r($hasil);
								// 	} else {
								// 		header('location:admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes&pesan=error1');
								// 	}
								// } else 

								// if(!empty($_GET['cari'])) {
								// 	$ranges = explode(' - ', $_POST['cari']);
								// 	$tgl1 = $ranges[0];
								// 	$tgl2 = $ranges[1];
								// 	$D1 = date("d",strtotime($tgl1));
								// 	$D2 = date("d",strtotime($tgl2));
								// 	$M1 = date("m",strtotime($tgl1));
								// 	$M2 = date("m",strtotime($tgl2));
								// 	$Y = date("Y",strtotime($tgl1));
								// 	// echo $tgl1;
								// 		if ($D1 !== $D2) {
								// 				$no=1;
								// 				$omset = 0;
								// 				$jumlah = 0;
								// 				// $bayar = 0;
								// 				$cekdata = $lihat -> minggu_jual($tgl1, $tgl2);
								// 				if (!empty($cekdata)) {
								// 					$hasil = $cekdata;
								// 				} else {
								// 					$hasil = [];
								// 				}
								// 				$transaksi = $lihat -> laptransminggu($tgl1, $tgl2);
								// 		} else {
								// 			$no=1; 
								// 			$jumlah = 0;
								// 			$omset = 0;
								// 			$cekdata = $lihat -> hari_jual($tgl1);
								// 			// print_r($cekdata);
								// 			if (!empty($cekdata)) {
								// 				$hasil = $cekdata;
								// 			} else {
								// 				$hasil = [];
								// 			}
								// 			$transaksi = $lihat -> laptranshari($tgl1);
								// 		}
								// } else {
									$cekdata = $lihat -> lapjualksrluar();
									if (!empty($cekdata)) {
										$hasil = $cekdata;
									} else {
										$hasil = [];
									}
									$transaksi = $lihat -> laptransksrluar();
								// }
							?>
							<?php 
								$omset = 0;
								$jumlah = 0;
								// error_reporting(E_ERROR | E_PARSE);
								foreach($hasil as $isi){
									$omset += $isi[9];
									// $modal += $isi['harga_beli']* $isi['jumlah'];
									// $jumlah += $isi['jumlah'];
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $isi[1];?></td>
								<td><?php echo $isi[3];?></td>
								<td><?php echo $isi[4];?> </td>
								<td><?php echo $isi[5];?> </td>
								<td><?php echo $isi[6];?> </td>
								<td><?php echo $isi[7];?> </td>
								<td>Rp.<?php echo number_format($isi[8]);?>,-</td>
								<td>Rp.<?php echo number_format($isi[9]);?>,-</td>
							</tr>
							<?php $no++; }?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="6">Total Terjual</td>
								<th><?php echo $transaksi;?></td>
								<!-- <th>Rp.<?php echo number_format($modal);?>,-</th>
								<th>Rp.<?php echo number_format($bayar);?>,-</th> -->
								<th style="background:#0bb365;color:#fff;">Omset</th>
								<th style="background:#0bb365;color:#fff;">
									Rp.<?php echo number_format($omset);?>,-</th>
							</tr>
						</tfoot>
					</table>
					<a href="kasir_page.php"class="btn btn-warning btn-md">Kembali</a> &ensp;
				</div>
				<div class="clearfix" style="padding-top:5pc;"></div>
			</div>
		</div>
		<!-- </div> -->
	</div>
	<!-- Datatable Script -->
	<script src="../assets/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		//inisialisasi inputan
		var bayar = document.getElementById('bayar');

		bayar.addEventListener('keyup', function (e) {
			bayar.value = formatRupiah(this.value, 'Rp. ');
			// harga = cleanRupiah(dengan_rupiah.value);
			// calculate(harga,service.value);
		});

		//generate dari inputan angka menjadi format rupiah

		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

		//generate dari inputan rupiah menjadi angka

		function cleanRupiah(rupiah) {
			var clean = rupiah.replace(/\D/g, '');
			return clean;
			// console.log(clean);
		}

	</script>
	<script type="text/javascript">
		// datatable
		$(function () {
			var table1 = $("#example1").DataTable({
				responsive: true
			});
            new $.fn.dataTable.FixedHeader( table1 );
			var table2 = $('#example2').DataTable({
				responsive: true
			});
            new $.fn.dataTable.FixedHeader( table2 );
			var table3 = $('#example3').DataTable({
				responsive: true
			});
            new $.fn.dataTable.FixedHeader( table3 );
		});
    </script>
	<script>
        $(".modal-create").hide();
        $(".bg-shadow").hide();
        $(".bg-shadow").hide();
        function clickModals(){
            $(".bg-shadow").fadeIn();
            $(".modal-create").fadeIn();
        }
        function cancelModals(){
            $('.modal-view').fadeIn();
            $(".modal-create").hide();
            $(".bg-shadow").hide();
        }
    </script>	
	</body>
</html>