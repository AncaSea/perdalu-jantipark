<?php
include 'db_con.php';
// session_start();
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
<section id="main-content" style="position: relative; min-width:1180px;">
	<section class="wrapper">
		<div class="container" style="margin-top: 2em;">
			<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
				<script type="text/javascript">
					swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
						window.location = "admin.php?page=kasir/kasirDalam&accordion2=on&active=yes";
					});
				</script>
			<?php }
			$_SESSION['error'] = '';
			?>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-12">
					<h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
					<h1>Kasir</h1>
					<!-- <a href="logout.php">Logout</a> | -->
					<a href="page/keranjangDalam/keranjang_reset.php" class="btn btn-info btn-md pull-left">Reset Keranjang</a> &ensp;
					<a href="admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes" class="btn btn-info btn-md margin-left 50px">Riwayat Transaksi </a>
				</div>
				&ensp;
				<tr>
					<td class="text-center" colspan="2">
						<!-- <div id="checkcont" class="checkbox-group required">
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket lele goreng" />
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Lele Goreng</label>
								</div>
							</div>
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket kakap goreng" />
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Kakap Goreng</label>
								</div>
							</div>
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket ayam goreng" />
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Ayam Goreng</label>
								</div>
							</div>
							<br>
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket lele bakar" />
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Lele Bakar</label>
								</div>
							</div>&ensp;
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket kakap bakar" />
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Kakap Bakar</label>
								</div>
							</div>&ensp;&ensp;
							<div class="pretty p-icon p-round p-jelly">
								<input type="radio" id="menupkt" class="menu" name="menu" value="paket ayam bakar" />
								<div class="state p-success">
									<i class="icon fa fa-check"></i>
									<label>Paket Ayam Bakar</label>
								</div>
							</div>
						</div> -->
						<div class="clearfix" style="margin-top:1em;"></div>
						<div>
							<b>Menu Porsi :</b><br>
							<div id="checkcont" class="btn-group" style="text-align:center ;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
									<input type="radio" class="menu" name="rb" id="cb1" value="Nasi+Lele Goreng+Sambel Lalap" />
									<label class="nmmenu" for="cb1" style="background: #FFFF00; border:#feb101;">Paket Lele Goreng</label>

									<input type="radio" class="menu" name="rb" id="cb3" value="Nasi+Kakap Goreng+Sambel Lalap" />
									<label class="nmmenu" for="cb3" style="background: #FFFF00; border:#feb101;">Paket Kakap Goreng</label>

									<input type="radio" class="menu" name="rb" id="cb5" value="Nasi+Ayam Goreng+Sambel Lalap" />
									<label class="nmmenu" for="cb5" style="background: #FFFF00 ; border:#feb101;">Paket Ayam Goreng</label>
								</div>
								<div class="btn-group mr-2" role="group" aria-label="Second group">
									<input type="radio" class="menu" name="rb" id="cb2" value="Nasi+Lele Bakar+Sambel Lalap" />
									<label class="nmmenu" for="cb2" style="background: #FF8C00 ; border:#feb101;">Paket Lele Bakar</label>

									<input type="radio" class="menu" name="rb" id="cb4" value="Nasi+Kakap Bakar+Sambel Lalap" />
									<label class="nmmenu" for="cb4" style="background: #FF8C00 ; border:#feb101;">Paket Kakap Bakar</label>

									<input type="radio" class="menu" name="rb" id="cb6" value="Nasi+Ayam Bakar+Sambel Lalap" />
									<label class="nmmenu" for="cb6" style="background: 	#FF8C00 ; border:#feb101;">Paket Ayam Bakar</label>
								</div>
							</div>
							<br><b>Paket Bar-bar :</b> <br>
							<div id="checkcont2" class="btn-group" style="text-align:center ;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
									<input type="radio" class="menu" name="rb" id="cb1.2" value="Porsi lele goreng (isi 6)" />
									<label class="nmmenu" for="cb1.2" style="background: #FFFF00 ; border:#feb101;">Porsi Lele Goreng (isi 6)</label>

									<input type="radio" class="menu" name="rb" id="cb3.2" value="Porsi kakap goreng (isi 4)" />
									<label class="nmmenu" for="cb3.2" style="background: #FFFF00 ; border:#feb101;">Porsi Kakap Goreng (isi 4)</label>

									<input type="radio" class="menu" name="rb" id="cb2.2" value="Porsi lele bakar (isi 6)" />
									<label class="nmmenu" for="cb2.2" style="background: #FF8C00 ; border:#feb101;">Porsi Lele Bakar (isi6)</label>

									<input type="radio" class="menu" name="rb" id="cb4.2" value="Porsi kakap bakar (isi 4)" />
									<label class="nmmenu" for="cb4.2" style="background: #FF8C00 ; border:#feb101;">Porsi Kakap Bakar (isi 4)</label>
								</div>
								<div class="btn-group mr-2" role="group" aria-label="Second group">
									<input type="radio" class="menu" name="rb" id="cb6.2" value="sambel+lalap" />
									<label class="nmmenu" for="cb6.2" style="background: #32CD32 ; border:#feb101;">Sambel + Lalap</label>

									<input type="radio" class="menu" name="rb" id="cb7.2" value="Cah Kangkung" />
									<label class="nmmenu" for="cb7.2" style="background: #32CD32 ; border:#feb101;">Cah Kangkung</label>

									<input type="radio" class="menu" name="rb" id="cb8.2" value="Trancam" />
									<label class="nmmenu" for="cb8.2" style="background: #32CD32 ; border:#feb101;">Trancam </label>

									<input type="radio" class="menu" name="rb" id="cb5.2" value="Nasi Ceting" />
									<label class="nmmenu" for="cb5.2" style="background: #FAF0E6 ; border:#feb101;">Nasi Ceting</label>
								</div>
							</div>
							<br><b>Minuman :</b> <br>
							<div id="checkcont3" class="btn-group" style="text-align:center ;">
								<div class="btn-group mr-2" role="group" aria-label="First group">
									<input type="radio" class="menu" name="rb" id="cb2.3" value="Teh Panas" />
									<label class="nmmenu" for="cb2.3" style="background: #FF1493 ; border:#feb101;">Teh Panas</label>

									<input type="radio" class="menu" name="rb" id="cb4.3" value="Jeruk Panas" />
									<label class="nmmenu" for="cb4.3" style="background: #FF1493 ; 	border:#feb101;">Jeruk Panas</label>

									<input type="radio" class="menu" name="rb" id="cb1.3" value="Es Teh" />
									<label class="nmmenu" for="cb1.3" style="background: #00BFFF ; border:#feb101;">Es Teh</label>

									<input type="radio" class="menu" name="rb" id="cb3.3" value="Es Jeruk" />
									<label class="nmmenu" for="cb3.3" style="background: #00BFFF ; border:#feb101;">Es Jeruk</label>

									<input type="radio" class="menu" name="rb" id="cb5.3" value="Es Lemon Tea" />
									<label class="nmmenu" for="cb5.3" style="background: #00BFFF ; border:#feb101;">Es Lemontea</label>

									<input type="radio" class="menu" name="rb" id="cb6.3" value="Es Nutrisari" />
									<label class="nmmenu" for="cb6.3" style="background:#00BFFF; border:#feb101;">ES Nutrisari</label>

									<input type="radio" class="menu" name="rb" id="cb7.3" value="Es Susu Coklat" />
									<label class="nmmenu" for="cb7.3" style="background: #00BFFF ; border:#feb101;">Es Susu Coklat</label>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="form-group" style="margin-bottom: 30px;">
						<div class="row">
							<form method="post" action="page/keranjangDalam/keranjang_add.php">
								<div class="col-md-4">
									<input id="nama_pesan" type="text" name="nama_pesan" class="form-control" placeholder="Masukkan Nama Pesanan" autofocus required>
									<!-- KI LHO HEEENNNNNN JATAHMUUU-->
									<!-- li class = "auto-kasir" -->
									<ul class="auto-result" id="search-result"></ul>
								</div>
								<div class="col-md-4">
									<input type="number" name="jumlah" min="1" value="1" class="form-control jumlah" placeholder="Masukkan Jumlah Barang" autofocus required>
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-success">Masukan</button>
								</div>
							</form>
						</div>
					</div>
					<form method="post" action="">
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
											<input type="number" id="<?= $value['id'] ?>" min="1" name="qty[<?= $key ?>]" value="<?= $value['qty'] ?>" class="form-control jum">
										</td>
										<!-- line 67 stlh $value['harga']) "-$value['diskon']" -->
										<td align="right"><?= number_format(($value['qty'] * $value['harga'])) ?></td>
										<td class="text-center">
											<a href="page/keranjangDalam/keranjang_hapus.php?id=<?= $value['id'] ?>">
												<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
												</button>
											</a>
										</td>
									</tr>
								<?php } ?>
							<?php endif; ?>
						</table>
						<!-- <button type="submit" class="btn btn-success">Perbaruhi</button> -->
					</form>
				</div>
				<div class="col-md-4">
					<h3 id="byr" style="margin:0px 0px 15px 0px">Total Rp. <?= number_format($sum) ?></h3>
					<form action="page/keranjangDalam/keranjang_update.php" method="POST">
						<input type="hidden" id="total" name="total" value="<?= $sum ?>">
						<div class="form-group" style="margin-bottom: 1em; margin-top:3em;">
							<!-- <label>Bayar</label> -->
							<input type="text" id="bayar" name="bayar" class="form-control" placeholder="Bayar" required><br>
							<input type="text" id="identitas" name="identitas" class="form-control" placeholder="Nama Pemesan & Tempat" autofocus required>
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

			function formatNumber(nStr) {
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
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
							url: "fungsi/autocomplete/autocomplete.php",
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
				$("#checkcont3").click(function() {
					// var search = $(this).val();
					$('input[type="radio"]:checked').each(function() { // $(':checkbox:checked')
						$('#nama_pesan').val(this.value);
						// $(this).val()
					});
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$(".jum").keyup(function() {
					var row = $(this);
					var idmenu = $(this).attr('id');
					var valmenu = $(this).val();
					var sumttl = 0;
					// console.log(idmenu);
					// console.log(jumnow);
					var cart = <?php echo json_encode($_SESSION['cartdlm']); ?>;
					// console.log(cart)
					$.each(cart, function(key, value) {
						// console.log(value)

						var id = value['id'];
						if (id === idmenu) {
							var qty = valmenu;
							// console.log(id);
							// console.log(qty);
							var subttl = row.closest('tr').find('.subttl').attr('id');
							// console.log(subttl);
							$.ajax({
								url: "page/keranjangDalam/keranjang_update.php",
								type: "POST",
								cache: false,
								data: {
									id: id,
									qty: qty
								},
								success: function(data) {
									// console.log(data);
									$.each(data, function(key, value) {
										// console.log(value['kd']);
										sumttl += parseInt(value['harga']) * parseInt(value['qty']);
										let sumttltext = sumttl.toString();
										// console.log(sumttl);
										$('#byr').text('Total Rp. ' + formatNumber(sumttltext));
										$('#total').val(sumttltext);
										if (value['id'] === id) {
											var jumlah = value['qty'];
											var harga = value['harga'];
											var sum = jumlah * harga;
											let sumtext = sum.toString();
											// console.log(sumtext);
											row.closest('tr').children('td:eq(3)').text(formatNumber(sumtext));
										}
									});
								},
							});
						}
					});
				});
			});
		</script>
	</section>