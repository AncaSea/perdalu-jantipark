<?php
include '../../db_con.php';
session_start();
// include 'authcheckkasir.php';

date_default_timezone_set('Asia/Jakarta');
$datetime = date('d-m-Y H:i:s');
$id_trx = $_GET['idtrx'];
$bayar = $_SESSION['byrdlm'];
$kembali = $_SESSION['kmbl'];

$detail = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE no_nota='$id_trx'");
$trx = mysqli_fetch_assoc($detail);

// $detailbrg = mysqli_query($dbconnect, "SELECT penjualan_dalam.*, stok_brg.nama_brg FROM `penjualan` INNER JOIN stok_brg ON penjualan.kode_brg=stok_brg.kode_brg WHERE penjualan.no_nota='$id_trx'");
$detailbrg = mysqli_query($dbconnect, "SELECT * FROM penjualan_dalam WHERE no_nota='$id_trx'");

?>

<!DOCTYPE html>
<html>

<head>
	<title>Kasir Selesai</title>
	<style type="text/css">
		body {
			color: #a7a7a7;
		}
	</style>
</head>

<body onload="window.print(); self.close();">
	<div align="center">
		<div class="clearfix" style="margin-top:1em;"></div>
		<table width="250" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<th>Janti Park<br>
					NGENDO, JANTI, KECAMATAN POLANHARJO, <br>
					KABUPATEN KLATEN, JAWA TENGAH 57474</th>
			</tr>
			<tr align="center">
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td>#<?= $trx['no_nota'] ?> | <?= $datetime ?> <?= $trx['nama_kasir'] ?></td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
		</table>
		<!-- jipuk pangangan -->
		<table width="250" border="0" cellpadding="3" cellspacing="0">
			<?php while ($row = mysqli_fetch_array($detailbrg)) { ?>
				<tr>
					<td valign="top">
						<?= $row['nama_pesanan'] ?>
						<!-- <?php if ($row['diskon'] > 0) : ?>
					<br>
					<small>Diskon</small>
					<?php endif; ?> -->
					</td>
					<td valign="top"><?= $row['jumlah'] ?></td>
					<td valign="top" align="right"><?= number_format($row['hrg_jual']) ?></td>
					<td valign="top" align="right">
						<?= number_format($row['hrg']) ?>
						<!-- <?php if ($row['diskon'] > 0) : ?>
					<br>
					<small>-<?= number_format($row['diskon']) ?></small>
					<?php endif; ?> -->
					</td>
				</tr>
			<?php } ?>
		</table>
		<!-- jipuk ombe  -->
		<table width="250" border="0" cellpadding="3" cellspacing="0">
			<tr>
				<td>
					<hr>
				</td>
			</tr>
		</table>
		<table>
			<b>jatahmu rek ombennan ro Keterangan kene deleh e</b>
		</table>
		<table width="250" border="0" cellpadding="3" cellspacing="0">
			<tr>
				<td colspan="5">
					<hr>
				</td>
			</tr>
			<tr>
				<td align="right" colspan="3">Total</td>
				<td align="right">Rp. <?= number_format($trx['total']) ?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Bayar</td>
				<td align="right"><?= ($bayar) ?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Kembali</td>
				<td align="right">Rp. <?= number_format($kembali) ?></td>
			</tr>
		</table>
		<table width="250" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<th>Terimakasih, Selamat Belanja Kembali</th>
			</tr>
			<tr>
				<th>== Layanan Konsumen ==</th>
			</tr>
			<tr>
				<th>WA : 0812-1500-7979 <br>
					IG : jantipark.klaten <br></th>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>