<?php
include '../db_con.php';
session_start();
// include 'authcheckkasir.php';

$barangdlm = mysqli_query(
	$dbconnect,
	"SELECT makanan.id, makanan.nama, makanan.role, makanan.jenis, 1 AS jumlah, makanan.harga FROM makanan UNION
 SELECT minuman.id, minuman.nama, minuman.role, minuman.jenis, 1 AS jumlah, minuman.harga FROM minuman UNION
 SELECT * FROM paket_barbar"
);
// print_r($_SESSION);

$sum = 0;
if (isset($_SESSION['cartdlm'])) {
	foreach ($_SESSION['cartdlm'] as $key => $value) {
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
	<title>Kasir Perdagangan Dalam</title>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- <script src="assets/js/common-scripts.js"></script> -->

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" />

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

		.col-md-4 {
			float: left;
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
			display: none;
		}

		.menu {
			height: 0;
			width: 0;
			visibility: hidden;
		}

		.menu:checked+label:after {
			transform: scale(4.2);
		}


		.nmmenu {
			outline: none;
			user-select: none;
			color: #000;
			font-family: 'Lato', sans-serif;
			font-size: 1rem;
			letter-spacing: 0.04rem;
			margin: 0.5em;
			padding: 1.5rem 1rem;
			cursor: pointer;
			border-radius: .3rem;
			border: .3rem solid #000;
			background: #fff;
			position: relative;
			overflow: hidden;
			box-shadow: 0 3px 0 0 #000;
		}

		.nmmenu::after {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			transform: scale(0);
			transition: transform .3s ease-in;
			mix-blend-mode: difference;
			/* //Gradient start values are somewhat arbitrary. But this seemed a good fit to avoid overly-blurry circle edge */
			background: radial-gradient(circle at center,
					#fff 24%,
					#000 25%,
					#000 100%);
		}

		.nmmenu:active {
			top: 3px;
			box-shadow: none;
		}
	</style>
</head>

<body>
	<div class="container" style="margin-top: 2em;">
		<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
			<script type="text/javascript">
				swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
					window.location = "kasir_page.php";
				});
			</script>
		<?php }
		$_SESSION['error'] = '';
		?>
		<div class="row">
			<div class="col-md-12">
				<h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
				<h1>Kasir Perdagangan Dalam</h1>
				<h2>Hai <?= $_SESSION['namakasir'] ?></h2>
				<a href="fungsi/keranjang_reset.php" class="btn btn-warning btn-md ">Reset Keranjang</a> &ensp;
				<a href="penjualanDalam.php" class="btn btn-info btn-md">Riwayat Transaksi </a> &ensp;
				<a href="../logout.php" class="btn btn-danger btn-md pull-right">Logout</a>
			</div>
			&ensp;
			<hr>
			<tr>
				<td class="text-center" colspan="2">
					<!-- <div id="checkcont" class="checkbox-group required">
							<div class="pretty p-icon p-round p-jelly">
							<input type="radio" id="menupkt" class="menu" name="menu" value="paket lele goreng"/>
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
								<label>Paket Lele Goreng</label>
								</div>
							</div>
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket kakap goreng"/>
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Kakap Goreng</label>
								</div>
							</div>
							<div class="pretty p-icon p-round p-jelly">
							<input type="radio" id="menupkt" class="menu" name="menu" value="paket ayam goreng"/>
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
								<label>Paket Ayam Goreng</label>
								</div>
							</div>
							<br>
							<div class="pretty p-icon p-round p-jelly">
							<input type="radio" id="menupkt" class="menu" name="menu" value="paket lele bakar"/>
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
								<label>Paket Lele Bakar</label>
								</div>
							</div>&ensp;
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket kakap bakar"/>
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Kakap Bakar</label>
								</div>
							</div> &ensp;&ensp;
							<div class="pretty p-icon p-round p-jelly">
							<input type="radio" id="menupkt" class="menu" name="menu" value="paket ayam bakar"/>
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
								<label>Paket Ayam Bakar</label>
								</div>
							</div>
						</div> -->
					<div>
						<b>Menu Porsi :</b><br>
						<div id="checkcont" class="btn-group">
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<input type="radio" class="menu" name="rb" id="cb1" value="porsi lele goreng" />
								<label class="nmmenu" for="cb1" style="background: #ff6e21; border:#feb101;">Porsi Lele Goreng</label>

								<input type="radio" class="menu" name="rb" id="cb3" value="porsi kakap goreng" />
								<label class="nmmenu" for="cb3" style="background:#40af49; border:#feb101;">Porsi Kakap Goreng</label>

								<input type="radio" class="menu" name="rb" id="cb5" value="porsi ayam goreng" />
								<label class="nmmenu" for="cb5" style="background: #957DFD ; border:#feb101;">Porsi Ayam Goreng</label>
							</div>
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<input type="radio" class="menu" name="rb" id="cb2" value="porsi lele bakar" />
								<label class="nmmenu" for="cb2" style="background: #ffdfba; border:#feb101;">Porsi Lele Bakar</label>

								<input type="radio" class="menu" name="rb" id="cb4" value="porsi kakap bakar" />
								<label class="nmmenu" for="cb4" style="background: #baffc9 ; border:#feb101;">Porsi Kakap Bakar</label>

								<input type="radio" class="menu" name="rb" id="cb6" value="porsi ayam bakar" />
								<label class="nmmenu" for="cb6" style="background: #bae1ff ; border:#feb101;">Porsi Ayam Bakar</label>
							</div>
						</div>
						<br><b>Paket Bar-bar :</b> <br>
						<div id="checkcont2" class="btn-group">
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<input type="radio" class="menu" name="rb" id="cb1.2" value="paket lele goreng" />
								<label class="nmmenu" for="cb1.2" style="background: #ff6e21 ; border:#feb101;">Paket Lele Goreng</label>

								<input type="radio" class="menu" name="rb" id="cb3.2" value="paket kakap goreng" />
								<label class="nmmenu" for="cb3.2" style="background: #40af49 ; border:#feb101;">Paket Kakap Goreng</label>

								<input type="radio" class="menu" name="rb" id="cb5.2" value="paket ayam goreng" />
								<label class="nmmenu" for="cb5.2" style="background: #957DFE ; border:#feb101;">Paket Ayam Goreng</label>
							</div>
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<input type="radio" class="menu" name="rb" id="cb2.2" value="paket lele bakar" />
								<label class="nmmenu" for="cb2.2" style="background: #ffdfba ; border:#feb101;">Paket Lele Bakar</label>

								<input type="radio" class="menu" name="rb" id="cb4.2" value="paket kakap bakar" />
								<label class="nmmenu" for="cb4.2" style="background: #baffc9 ; border:#feb101;">Paket Kakap Bakar</label>

								<input type="radio" class="menu" name="rb" id="cb6.2" value="paket ayam bakar" />
								<label class="nmmenu" for="cb6.2" style="background:#bae1ff ; border:#feb101;">Paket Ayam Bakar</label>
							</div>
						</div>
						<br><b>Minuman :</b> <br>
						<div id="checkcont2" class="btn-group">
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<input type="radio" class="menu" name="rb" id="cb1.3" value="es teh" />
								<label class="nmmenu" for="cb1.3" style="background: #ff6e21 ; border:#feb101;">Es Teh</label>

								<input type="radio" class="menu" name="rb" id="cb2.3" value="teh anget" />
								<label class="nmmenu" for="cb2.3" style="background: #40af49 ; border:#feb101;">Teh Anget</label>

								<input type="radio" class="menu" name="rb" id="cb3.3" value="es jeruk" />
								<label class="nmmenu" for="cb3.3" style="background: #957DFE ; border:#feb101;">Es Jeruk</label>

								<input type="radio" class="menu" name="rb" id="cb4.3" value="jeruk anget" />
								<label class="nmmenu" for="cb4.3" style="background: #ffdfba ; border:#feb101;">Jeruk Anget</label>

								<input type="radio" class="menu" name="rb" id="cb5.3" value="es lemontea" />
								<label class="nmmenu" for="cb5.3" style="background: #ffdfba ; border:#feb101;">Es Lemontea</label>

								<input type="radio" class="menu" name="rb" id="cb6.3" value="lemontea anget" />
								<label class="nmmenu" for="cb6.3" style="background: #ffdfba ; border:#feb101;">Lemontea Anget</label>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</div>
		&ensp;
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<form method="post" action="fungsi/keranjang_add.php">
						<div class="col-md-4">
							<input id="nama_pesan" type="text" name="nama_pesan" class="form-control" placeholder="Masukkan Nama Pesanan" autofocus required>
							<!-- KI LHO HEEENNNNNN JATAHMUUU-->
							<!-- li class = "auto-kasir" -->
							<ul class="auto-result" id="search-result"></ul>
						</div>
						<div class="col-md-4">
							<input style="margin-left: 1em;" type="number" name="jumlah" min="1" class="form-control" placeholder="Masukkan Jumlah Barang" autofocus required>
						</div>
						<div class="col-md-4">
							<button style="margin-left: 1.5em;" type="submit" class="btn btn-success">Masukan</button>
						</div>
					</form>
				</div>
				<br>
				<form method="post" action="fungsi/keranjang_update.php">
					<table class="table table-bordered">
						<tr>
							<th>Nama</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Sub Total</th>
							<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
						</tr>
						<?php if (isset($_SESSION['cartdlm'])) : ?>
							<?php foreach ($_SESSION['cartdlm'] as $key => $value) { ?>
								<tr>
									<td>
										<?= $value['nama'] ?>
									</td>
									<td align="right"><?= number_format($value['harga']) ?></td>
									<td class="col-md-2">
										<input type="number" min="1" name="qty[<?= $key ?>]" value="<?= $value['qty'] ?>" class="form-control">
									</td>
									<!-- line 67 stlh $value['harga']) "-$value['diskon']" -->
									<td align="right"><?= number_format(($value['qty'] * $value['harga'])) ?></td>
									<td class="text-center">
										<a href="fungsi/keranjang_hapus.php?id=<?= $value['id'] ?>">
											<button type="button" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></button>
											</button>
										</a>
									</td>
								</tr>
							<?php } ?>
						<?php endif; ?>
					</table>
					<button type="submit" class="btn btn-success">Perbaruhi</button>
				</form>
			</div>
			<div class="col-md-4">
				<h3 style="margin:0px 0px 8px 0px">Total Rp. <?= number_format($sum) ?></h3>
				<form action="fungsi/keranjang_update.php" method="POST">
					<input type="hidden" name="total" value="<?= $sum ?>">
					<div class="form-group" style="margin-bottom: 1em;">
						<label>Bayar</label>
						<input type="text" id="bayar" name="bayar" class="form-control" required>
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
			$("#nama_pesan").keyup(function() {
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({
						url: "../fungsi/autocomplete/autocomplete.php",
						type: "POST",
						cache: false,
						data: {
							kasirdlm: search
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
			$("#nama_pesan").val(val);
			$("#search-result").hide();
		}
		$(document).click(function() {
			$("#search-result").hide();
		});
		// $('input.menu').on('change', function() {
		// 	$('input.menu').not(this).prop('checked', false);  
		// });
	</script>
	<script>
		$(document).ready(function() {
			$("#checkcont").click(function() {
				// var search = $(this).val();
				$('input[type="radio"]:checked').each(function() { // $(':checkbox:checked')
					$('#nama_pesan').val(this.value);
					// $(this).val()
				});
			});
			$("#checkcont2").click(function() {
				// var search = $(this).val();
				$('input[type="radio"]:checked').each(function() { // $(':checkbox:checked')
					$('#nama_pesan').val(this.value);
					// $(this).val()
				});
			});
		});
	</script>
</body>

</html>