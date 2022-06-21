<?php
require '../db_con.php';
session_start();
// include 'authcheckkasir.php';

include $viewksrdlm;
$lihat = new view($dbconnect);

$barangdlm = mysqli_query($dbconnect, 
"SELECT makanan.id, makanan.nama, makanan.role, makanan.jenis, 1 AS jumlah, makanan.harga FROM makanan UNION
 SELECT minuman.id, minuman.nama, minuman.role, minuman.jenis, 1 AS jumlah, minuman.harga FROM minuman UNION
 SELECT * FROM paket_barbar");
// print_r($_SESSION);

$sum = 0;
if (isset($_SESSION['cartdlm'])) {
    foreach ($_SESSION['cartdlm'] as $key => $value) {
		// line 13 stlh $value['qty']) "- $value['diskon']"
        $sum += ((int)$value['harga'] * (int)$value['qty']);
    }
}

if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "sameitem") {
			$_SESSION['error'] = 'Barang sudah ada di keranjang';
	}

	if($_GET['pesan'] == "notindatabase") {
		$_SESSION['error'] = 'Barang tidak ada di database';
	}

	if($_GET['pesan'] == "updatefailed") {
		$_SESSION['error'] = 'Gagal Mengupdate Stok Barang';
	}

	if($_GET['pesan'] == "emptycart") {
		$_SESSION['error'] = 'Keranjang Kosong';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kasir Perdagangan Dalam</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
	rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


    <!--external css-->
    <link href="../assets/font-awesome/css/all.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/datatables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">
    
    <!-- SweetAlert Popup -->
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <!-- Custom styles for this template -->
    <!-- <link href="../assets/css/style.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/style-responsive.css" rel="stylesheet"> -->
        
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>

    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

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
				window.location = "admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes";
			});

		</script>
	<?php }
		$_SESSION['error'] = '';
	?>
	<div class="container" style="margin-top: 2em;">
	<!-- <div id="main-content">
		<div class="wrapper"> -->
			<div class="row">
				<div class="col-lg-12 main-chart">
				  <h4 style="float: right; display: inline-block;margin-top:1em"><?php echo date('d F Y'); ?></h4>
					  <h3>
						  <!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
							  <button class="btn btn-danger">RESET</button>
						  </a>-->
						  <?php if(!empty($_GET['cari'])){?>
							  Data Laporan Penjualan <?= $_POST['cari'];?>
						  <?php }else{?>
							  Data Laporan Penjualan <?= date('Y');?>
						  <?php }?>
					  </h3>
					  <hr>
					  
					  <!-- <div class="clearfix" style="margin-top:1em;"></div> -->
					  
					  <!-- <h4>Cari Laporan</h4>
					  <form method="post" action="admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes&cari=ok">
						  <table class="table table-striped">
							  <tr>
								  <th>
									  Pilih Tanggal
								  </th>
								  <th>
									  Aksi
								  </th>
							  </tr>
							  <tr>
								  <td>
									  <input name="cari" type="text" id="demo" class="form-control">
								  </td>
								  <td>
									  <input type="hidden" name="periode" value="ya">
									  <button class="btn btn-primary">
										  <i class="fa fa-search"></i> Cari
									  </button>
									  <a href="admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes" class="btn btn-success">
										  <i class="fa fa-refresh"></i> Refresh</a>
										  
									  <?php if(!empty($_GET['cari'])){?>
										  <a href="excel.php?cari=yes&bln=" class="btn btn-info"><i class="fa fa-download"></i>
										  Excel</a>
									  <?php }else{?>
										  <a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										  Excel</a>
									  <?php }?>
								  </td>
							  </tr>
						  </table>
					  </form> -->
					  
					  <!-- <div class="clearfix" style="border-top:1px solid #ccc;"></div> -->
					  
					  <!-- view barang -->	
					  <div class="modal-view">
						  <table class="table table-bordered" id="example1">
							  <thead>
								  <tr style="background:#FFF000;color:#333;">
									  <th> No.</th>
									  <th style="width:10%;"> No Nota</th>
									  <th> Nama Kasir</th>
									  <th> Tgl Penjualan</th>
									  <th> Nama Pesanan</th>
									  <th style="width:10%;"> jenis</th>
									  <th style="width:10%;"> Jumlah</th>
									  <th> Harga Jual</th>
									  <th> Harga</th>
								  </tr>
							  </thead>
							  <tbody>
								  <?php 
									  $no=1; 
									  if(!empty($_GET['cari'])) {
										  $ranges = explode(' - ', $_POST['cari']);
										  $tgl1 = $ranges[0];
										  $tgl2 = $ranges[1];
										  $D1 = date("d",strtotime($tgl1));
										  $D2 = date("d",strtotime($tgl2));
										  $M1 = date("m",strtotime($tgl1));
										  $M2 = date("m",strtotime($tgl2));
										  $Y = date("Y",strtotime($tgl1));
										  // echo $tgl1;
											  if ($D1 !== $D2) {
													  $no=1;
													  $omset = 0;
													  $jumlah = 0;
													  // $bayar = 0;
													  $cekdata = $lihat -> minggu_jualdlm($tgl1, $tgl2);
													  if (!empty($cekdata)) {
														  $hasil = $cekdata;
													  } else {
														  $hasil = [];
													  }
													  $transaksi = $lihat -> laptransminggudlm($tgl1, $tgl2);
											  } else {
												  $no=1; 
												  $jumlah = 0;
												  $omset = 0;
												  $cekdata = $lihat -> hari_jualdlm($tgl1);
												  // print_r($cekdata);
												  if (!empty($cekdata)) {
													  $hasil = $cekdata;
												  } else {
													  $hasil = [];
												  }
												  $transaksi = $lihat -> laptransharidlm($tgl1);
											  }
									  } else {
										  $cekdata = $lihat -> lapjualksrdlm();
										  if (!empty($cekdata)) {
											  $hasil = $cekdata;
										  } else {
											  $hasil = [];
										  }
										  $transaksi = $lihat -> laptransksrdlm();
									  }
								  ?>
								  <?php 
									  $omset = 0;
									  $jumlah = 0;
									  // error_reporting(E_ERROR | E_PARSE);
									  foreach($hasil as $isi){
										  // print_r($isi);
										  $omset += $isi[10];
										  // $modal += $isi['harga_beli']* $isi['jumlah'];
										  // $jumlah += $isi['jumlah'];
								  ?>
								  <tr>
									  <td><?php echo $no;?></td>
									  <td><?php echo $isi[1];?></td>
									  <td><?php echo $isi[3];?></td>
									  <td><?php echo $isi[4];?> </td>
									  <td><?php echo $isi[5];?> </td>
									  <td><?php echo $isi[7];?> </td>
									  <td><?php echo $isi[8];?> </td>
									  <td>Rp.<?php echo number_format($isi[10]);?>,-</td>
									  <td>Rp.<?php echo number_format($isi[11]);?>,-</td>
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
					  </div>
					  <div class="clearfix" style="padding-top:5pc;"></div>
				  </div>
				</div>
			</div>
		<!-- </div>
	</div> -->
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
	<script>
		$(document).ready(function(){
			$("#nama_pesan").keyup(function(){
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({  
						url :"../fungsi/autocomplete/autocomplete.php",  
						type:"POST",  
						cache:false,
						data:{kasirdlm:search},
						success:function(data){
							console.log(data);
							$("#search-result").html(data);
							$("#search-result").fadeIn();
						},  
					});
				} else {
					$("#search-result").html("");  
					$("#search-result").fadeOut();
				}
			});
		});
		function selectBarang(val) {
			$("#nama_pesan").val(val);
			$("#search-result").hide();
		}
		$(document).click(function(){
			$("#search-result").hide();
		});
	</script>
	<script>
		$(document).ready(function(){
			$("#checkcont").click(function(){
				// var search = $(this).val();
				$('input[type="checkbox"]:checked').each(function() {        // $(':checkbox:checked')
					$('#nama_pesan').val(this.value);
                    // $(this).val()
    			});
			});
		});
	</script>
	<script type="text/javascript">
		// datatable
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable();
			$('#example3').DataTable();
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