<?php
include '../db_con.php';
session_start();
// include 'authcheckkasir.php';


$barang = mysqli_query($dbconnect, 'SELECT * FROM stok_brg');
// print_r($_SESSION);

$sum = 0;
if (isset($_SESSION['cart'])) {
	// $kd = $value['kd'];
	foreach ($_SESSION['cart'] as $key => $value) {
		// line 13 stlh $value['qty']) "- $value['diskon']"
		$sum += ((int)$value['harga'] * (int)$value['qty']);
	}
}

if (isset($_GET['pesan'])) {
	if ($_GET['pesan'] == "sameitem") {
		$_SESSION['error'] = 'Barang sudah ada di keranjang';
	}

	if ($_GET['pesan'] == "notindatabase") {
		$_SESSION['error'] = 'Barang tidak ada di database';
	}

	if ($_GET['pesan'] == "updatefailed") {
		$_SESSION['error'] = 'Gagal Mengupdate Stok Barang';
	}

	if ($_GET['pesan'] == "emptycart") {
		$_SESSION['error'] = 'Keranjang Kosong';
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Kasir Perdagangan Luar</title>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- <script src="assets/js/common-scripts.js"></script> -->

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/> -->
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
		.col-md-4 {
			float: left;
		}

		.auto-kasir {
			width: 100%;
			padding: 10px 15px;
			text-transform: capitalize;
			transition: 0.3s;
			display: flex;
			/* margin-left: 3em; */
			color: #000000;
		}

		.auto-kasir:hover {
			color: #F0F8FF;
			background-color: #000000;
			padding: 10px 18px;
			/* margin-left: -4em; */
		}

		.auto-result {
			padding: 0px;
			width: auto;
		}

		#search-result,
		#search-result2 {
			cursor: pointer;
			position: absolute;
			z-index: 2;
			background-color: #feb101;
			/* margin-left: -1em; */
		}

		.header {
			background: #000000;
			color: #F0F8FF;
		}

		#main-content {
			background: #fff;
		}

		#hidden {
			display: none
		}
	</style>
</head>

<body>
	<div style="margin:2em;" content="width=device-width, initial-scale=1.0">
		<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
			<script type="text/javascript">
				swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
					window.location = "kasir_page.php";
				});
			</script>
		<?php }
		$_SESSION['error'] = '';
		?>
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-md-12">
				<h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
				<h1>Kasir Perdagangan Luar</h1>
				<h2>Hai <?= $_SESSION['namakasir'] ?></h2>
				<a href="fungsi/keranjang_reset.php" class="btn btn-warning btn-md ">Reset Keranjang</a> &ensp;
				<a href="penjualanLuar.php" class="btn btn-info btn-md">Riwayat Transaksi </a> &ensp;
				<a href="../logout.php" class="btn btn-danger btn-md pull-right">Logout</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-8">
				<div class="form-group" style="margin-bottom: 30px;">
					<div class="row">
						<form method="post" action="fungsi/keranjang_add.php">
							<div class="col-md-4">
								<input id="nama_brg" type="text" name="nama_brg" class="form-control" placeholder="Masukkan Nama Barang" autofocus required>
								<!-- KI LHO HEEENNNNNN JATAHMUUU-->
								<!-- li class = "auto-kasir" -->
								<ul class="auto-result" id="search-result"></ul>
							</div>
							<div class="col-md-4">
								<input style="margin-left: 1em;" type="number" name="jumlah" min="1" value="1" class="form-control jumlah" placeholder="Masukkan Jumlah Barang" autofocus required>
							</div>
							<div class="col-md-4">
								<button style="margin-left: 1.5em;" type="submit" class="btn btn-success">Masukan</button>
							</div>
						</form>
					</div>
				</div>
				<br>
				<!-- <form method="post" action="fungsi/keranjang_update.php"> -->
				<table class="table table-bordered">
					<tr>
						<th>Nama</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Sub Total</th>
						<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
					</tr>
					<?php
					print_r($_SESSION['cart'][0]);
					if (isset($_SESSION['cart'])) : ?>
						<?php foreach ($_SESSION['cart'] as $key => $value) { ?>
							<tr id="tr">
								<td>
									<?= $value['nama'] ?>
									<!-- <?php if ($value['diskon'] > 0) : ?>
										<br><small class="label label-danger">Diskon <?= number_format($value['diskon']) ?></small>
									<?php endif; ?> -->
								</td>
								<td align="right"><?= number_format($value['harga']) ?></td>
								<td class="col-md-2">
									<input type="number" id="qty[<?= $key ?>]" name="qty[<?= $key ?>]" value="<?= $value['qty'] ?>" class="form-control jum" max="<?= $value['stok'] ?>">
								</td>
								<!-- line 67 stlh $value['harga']) "-$value['diskon']" -->
								<?php
								$qty = intval(preg_replace('/[^0-9]/', '', $value['qty']));
								?>
								<td align="right" class="subttl" id="qty[<?= $key ?>]"><span><?= number_format(($qty * $value['harga'])) ?></span></td>
								<td class="text-center">
									<a href="fungsi/keranjang_hapus.php?kd=<?= $value['kd'] ?>">
										<button type="button" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></button>
										</button>
									</a>
								</td>
							</tr>
						<?php } ?>
					<?php endif; ?>
				</table>
				<!-- <button type="submit" class="btn btn-success">Perbaruhi</button> -->
				<!-- </form> -->
			</div>
			<div class="col-md-4">
				<h3 id="byr" style="margin:0px 0px 38px 0px">
					<p>Total Rp. <?= number_format($sum) ?></p>
				</h3>
				<form action="fungsi/keranjang_update.php" method="POST">
					<input type="hidden" name="total" value="<?= $sum ?>">
					<div class="form-group" style="margin-bottom: 1em;">
						<label>Bayar</label>
						<input type="text" id="bayar" name="bayar" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" onkeypress="">Selesai</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		//inisialisasi inputan
		var bayar = document.getElementById('bayar');

		bayar.addEventListener('keyup', function(e) {
			bayar.value = formatRupiah(this.value, 'Rp. ');
			// harga = cleanRupiah(dengan_rupiah.value);
			// calculate(harga,service.value);
		});

		$(".jumlah").keyup(function() {
			$('.jumlah').val(formatRupiah(this.value));
		});

		$(".jum").keyup(function() {
			var $this = $(this);
			$this.val(formatRupiah($this.val()));
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
		$(document).ready(function() {
			$("#nama_brg").keyup(function() {
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({
						url: "../fungsi/autocomplete/autocomplete.php",
						type: "POST",
						cache: false,
						data: {
							kasir: search
						},
						success: function(data) {
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
			$("#nama_brg").val(val);
			$("#search-result").hide();
		}
		$(document).click(function() {
			$("#search-result").hide();
		});
	</script>
	<script>
		$(document).ready(function() {
			$(".jum").keyup(function() {
				// var subttl = $(".subttl").text();
				// console.log(this.subttl);

				// $(".tr").on("keyup", "tr:nth-child(4)", function() {
				var jum = $(this);
				var jumnow = $(this).val();
				var harga = <?php echo (json_encode($value['harga'])); ?>;
				var sum = jumnow * harga;
				console.log(jumnow);
				// $(".subttl").each(function() {
				// console.log($(this));
				// var $this = $(this);
				let sumtext = sum.toString();
				// $(this).closest('tr').children('td:eq(3)').text(formatRupiah(sumtext));
				// var byr = $('#byr').text();
				// console.log(byr);
				// console.log(search);
				if (jumnow !== "") {
					$.ajax({
						url: "fungsi/keranjang_update.php",
						type: "POST",
						cache: false,
						data: {
							qty: jumnow
						},
						success: function(data) {
							console.log(data);
							$.each(data, function(key, value) {
								// console.log(value['nama']);
								jum.closest('tr').children('td:eq(3)').text(value['qty'] * value['harga']);
							});
							// $("#search-result").html(data);
							// $("#search-result").fadeIn();
						},
					});
				}
			});
		});
	</script>
</body>

</html>