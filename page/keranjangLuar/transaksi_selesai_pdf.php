<?php
include '../../db_con.php';
// include 'authcheckkasir.php';

$id_trx = $_GET['idtrx'];
$bayar = $_SESSION['byr'];
$kembali = $_SESSION['kmbl'];

$detail = mysqli_query($dbconnect, "SELECT * FROM penjualan WHERE no_nota='$id_trx'");
$trx = mysqli_fetch_assoc($data);

// $detail = mysqli_query($dbconnect, "SELECT transaksi_detail.*, barang.nama FROM `transaksi_detail` INNER JOIN barang ON transaksi_detail.id_barang=barang.id_barang WHERE transaksi_detail.id_transaksi='$id_trx'");

?>

<!DOCTYPE html>
<html>
<head>
	<!-- <title>Kasir Selesai</title> -->
	<style type="text/css">
		body{
			color: #a7a7a7;
		}
	</style>
</head>
<body>
	<div align="center">
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<th>Janti Park<br>
					Jl Rokan Kiri 28 Bowongan Arjowinangun <br>
				Pacitan, Jawa Timur, 60822</th>
			</tr>
			<tr align="center"><td><hr></td></tr>
			<tr>
				<td>#<?=$trx['no_nota']?> | <?=date('d-m-Y H:i:s', strtotime($trx['tgl_penjualan']))?> <?=$trx['nama_kasir']?></td>
			</tr>
			<tr><td><hr></td></tr>
		</table>
		<table width="500" border="0" cellpadding="3" cellspacing="0">
			<?php while ($row = mysqli_fetch_array($detail)) { ?>
			<tr>
				<td valign="top">
					<?=$row['nama_brg']?>
					<?php if ($row['diskon'] > 0): ?>
					<br>
					<small>Diskon</small>
					<?php endif; ?>
				</td>
				<td valign="top"><?=$row['jumlah']?></td>
				<td  valign="top" align="right"><?=number_format($row['harga'])?></td>
				<td valign="top" align="right">
					<?=number_format($row['total'])?>
					<?php if ($row['diskon'] > 0): ?>
					<br>
					<small>-<?=number_format($row['diskon'])?></small>
					<?php endif; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Total</td>
				<td align="right"><?=number_format($trx['total'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Bayar</td>
				<td align="right"><?=number_format($bayar)?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Kembali</td>
				<td align="right"><?=number_format($kembali)?></td>
			</tr>
		</table>
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr><td><hr></td></tr>
			<tr>
				<th>Terimkasih, Selamat Belanja Kembali</th>
			</tr>
			<tr>
				<th>===== Layanan Konsumen ====</th>
			</tr>
			<tr>
				<th>SMS/CALL 085895986529 </th>
			</tr>
		</table>
	</div>
</body>
</html>