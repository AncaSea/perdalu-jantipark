<?php
include 'db_con.php';
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
<section id="main-content">
	<section class="wrapper">
		<div class="container" style="margin-top: 2em;">
			<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
				<script type="text/javascript">
					swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
						window.location = "admin.php?page=kasir/kasirLuar&accordion=on&active=yes";
					});
				</script>
			<?php }
			$_SESSION['error'] = '';
			?>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-12">
					<h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
					<h1>Kasir</h1>
					<!-- <h2>Hai <?= $_SESSION['namakasir'] ?></h2> -->
					<!-- <a href="logout.php">Logout</a> | -->
					<a href="../../page/keranjangLuar/keranjang_reset.php" class="btn btn-danger btn-md pull-left">Reset Keranjang</a> &ensp;
					<a href="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes" class="btn btn-info btn-md margin-left 50px">Riwayat Transaksi </a>
				</div>
				&ensp;
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="form-group" style="margin-bottom: 30px;">
						<div class="row">
							<form method="post" action="../page/keranjangLuar/keranjang_add.php">
								<div class="col-md-4">
									<input id="nama_brg" type="text" name="nama_brg" class="form-control" placeholder="Masukkan Nama Barang" autofocus required>
									<!-- KI LHO HEEENNNNNN JATAHMUUU-->
									<!-- li class = "auto-kasir" -->
									<ul class="auto-result" id="search-result"></ul>
								</div>
								<div class="col-md-4">
									<input type="number" name="jumlah" min="1" value="1" class="form-control" placeholder="Masukkan Jumlah Barang" autofocus required>
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-success">Masukan</button>
								</div>
							</form>
						</div>
					</div>

					<form method="post" action="../page/keranjangLuar/keranjang_update.php">
						<table class="table table-bordered">
							<tr>
								<th>Nama</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Sub Total</th>
								<th>Aksi</th>
							</tr>
							<?php if (isset($_SESSION['cart'])) : ?>
								<?php foreach ($_SESSION['cart'] as $key => $value) { ?>
									<tr>
										<td>
											<?= $value['nama'] ?>
										</td>
										<td align="right"><?= number_format($value['harga']) ?></td>
										<td class="col-md-2">
											<input type="number" min="1" name="qty[<?= $key ?>]" value="<?= $value['qty'] ?>" class="form-control" max="<?= $value['stok'] ?>">
										</td>
										<!-- line 67 stlh $value['harga']) "-$value['diskon']" -->
										<td align="right"><?= number_format(($value['qty'] * $value['harga'])) ?></td>
										<td class="text-center">
											<a href="../page/keranjangLuar/keranjang_hapus.php?kd=<?= $value['kd'] ?>">
												<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
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
					<h3 style="margin:0px 0px 15px 0px">Total Rp. <?= number_format($sum) ?></h3>
					<form action="../page/keranjangLuar/keranjang_update.php" method="POST">
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
				$("#nama_brg").keyup(function() {
					var search = $(this).val();
					// console.log(search);
					if (search !== "") {
						$.ajax({
							url: "fungsi/autocomplete/autocomplete.php",
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
	</section>