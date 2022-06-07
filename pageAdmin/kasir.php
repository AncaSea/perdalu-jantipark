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
<section id="main-content">
    <section class="wrapper">
    <div class="container" style="margin-top: 2em;">
        <?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
            <script type="text/javascript">

            swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error");

            </script>
		<?php }
                $_SESSION['error'] = '';
        ?>
		
			<div class="row">
				<div class="col-md-12">
				<h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
					<h1>Kasir</h1>
					<!-- <h2>Hai <?=$_SESSION['namakasir']?></h2> -->
					<!-- <a href="logout.php">Logout</a> | -->
					<a href="keranjang_reset.php"class="btn btn-danger btn-md pull-left">Reset Keranjang</a> &ensp;  
					<a href="admin.php?page=lap_penjualan/penjualan"class="btn btn-info btn-md margin-left 50px">Riwayat Transaksi </a>
				</div>
				&ensp;
			</div>
			&ensp;
			<br>
			<div class="row">
				<div class="col-md-8">
					<form method="post" action="keranjang_add.php">
						<div class="form-group">
						&ensp;
						&ensp;

							<div class="col-md-4">
							
							<input id="nama_brg" style="margin-left: -1em;" type="text" name="nama_brg" class="form-control" placeholder="Masukkan Nama Barang" autofocus required>
							
							<!-- KI LHO HEEENNNNNN JATAHMUUU-->
							<!-- li class = "auto-kasir" -->
							<ol style="position:absolute; background-color:#feb101;" id="search-result"></ol>
							</div>
							
							<div class="col-md-4">
							<input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Barang" autofocus required>
							</div>
							<button type="submit" class="btn btn-success">Masukan</button>
						</div>
					</form>
					<br>
					<br>
					<br>
					<br>
					<form method="post" action="keranjang_update.php">
					<table class="table table-bordered">
						<tr>
							<th>Nama</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Sub Total</th>
							<th></th>
						</tr>
						<?php if (isset($_SESSION['cart'])): ?>
						<?php foreach ($_SESSION['cart'] as $key => $value) { ?>
							<tr>
								<td>
									<?=$value['nama']?>
								</td>
								<td align="right"><?=number_format($value['harga'])?></td>
								<td class="col-md-2">
									<input type="number" name="qty[<?=$key?>]" value="<?=$value['qty']?>" class="form-control" max="<?=$value['stok']?>">
								</td>
								<!-- line 67 stlh $value['harga']) "-$value['diskon']" -->
								<td align="right"><?=number_format(($value['qty'] * $value['harga']))?></td>
								<td>
									<a href="keranjang_hapus.php?kd=<?=$value['kd']?>">
										<button type="button" class="btn btn-outline-danger">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 17 20">
												<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
											</svg>
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
					<h3>Total Rp. <?=number_format($sum)?></h3>
					<form action="keranjang_update.php" method="POST">
						<input type="hidden" name="total" value="<?=$sum?>">
					<div class="form-group" style="margin-bottom: 1em;">
						<label>Bayar</label>
						<input type="text" id="bayar" name="bayar" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" onkeypress="" >Selesai</button>
					</form>
				</div>
			</div>
		</div>
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

		// $( "#nama_brg" ).autocomplete({
       	// 	source: '../fungsi/autocomplete/autocomplete.php',
     	// });
	</script>
	<script>
		$(document).ready(function(){
			$("#nama_brg").keyup(function(){
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({  
						url :"fungsi/autocomplete/autocomplete.php",  
						type:"POST",  
						cache:false,
						data:{kasir:search},
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

			// $(document).on("click","li", function(){
			// 	$('#nama_brg').val($(this).text());
			// 	$('#search-result').fadeOut("fast");
			// });

			// $( "#nama_brg" ).autocomplete({
			// 	source: function( request, response ) {
			// 		// Fetch data
			// 		$.ajax({
			// 			url: "fungsi/autocomplete/autocomplete.php",
			// 			type: "POST",
			// 			dataType: "json",
			// 			data: {search: request.term, type: "nmbrg"},
			// 			success: function( data ) {
			// 				console.log(data);
			// 				response( data );
			// 			}
			// 		});
			// 	},
			// 	select: function (event, ui) {
			// 		// Set selection
			// 		$("#search-result").val(ui.item.label); // display the selected text
			// 		// $('#selectuser_id').val(ui.item.value); // save selected id to input
			// 		return false;
			// 	},
			// 	focus: function(event, ui){
			// 		$( "#search-result" ).val( ui.item.label );
			// 		// $( "#selectuser_id" ).val( ui.item.value );
			// 		return false;
			// 	},
			// });
		});
		function selectBarang(val) {
			$("#nama_brg").val(val);
			$("#search-result").hide();
		}
	</script>
    </section>