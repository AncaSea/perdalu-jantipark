<?php 
   
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=data-laporan-".date('Y-m-d').".xlsx");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 

    require 'db_con.php';
    include $view;
    $lihat = new view($dbconnect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<!-- view barang -->	
    <!-- view barang -->	
    <div class="modal-view">
        <h3 style="text-align:center;">
            <?php if($_GET['lap'] == 'dalam'){?>
                <?php if(!empty($_GET['cari'])){?>
                    Data Laporan Penjualan Dalam <?= $_GET['cari'];?>
                <?php }else{?>
                    Data Laporan Penjualan Dalam <?= date('Y');?>
                <?php }?>
            <?php }else if ($_GET['lap'] == 'luar') {?>
                <?php if(!empty($_GET['cari'])){?>
                    Data Laporan Penjualan Luar <?= $_GET['cari'];?>
                <?php }else{?>
                    Data Laporan Penjualan Luar <?= date('Y');?>
                <?php }?>
            <?php } else if ($_GET['lap'] == 'msk') {?>
                <?php if(!empty($_GET['cari'])){?>
                    Data Laporan Barang Masuk <?= $_GET['cari'];?>
                <?php }else{?>
                    Data Laporan Barang Masuk <?= date('Y');?>
                <?php }?>
            <?php } else { ?>
                <?php if(!empty($_GET['cari'])){?>
                    Data Laporan Barang Kembali <?= $_GET['cari'];?>
                <?php }else{?>
                    Data Laporan Barang Kembali <?= date('Y');?>
                <?php }?>
            <?php } ?>
        </h3>
        <?php if($_GET['lap'] == 'dalam'){?>
            <table border="1" width="100%" cellpadding="3" cellspacing="4">
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
                            $ranges = explode(' - ', $_GET['cari']);
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
                            $cekdata = $lihat -> lapjualdlm();
                            if (!empty($cekdata)) {
                                $hasil = $cekdata;
                            } else {
                                $hasil = [];
                            }
                            $transaksi = $lihat -> laptransdlm();
                        }
                    ?>
                    <?php 
                        $omset = 0;
                        $jumlah = 0;
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
        <?php }else if($_GET['lap'] == 'luar'){?>
            <table border="1" width="100%" cellpadding="3" cellspacing="4">
                <thead>
                    <tr style="background:#FFF000;color:#333;">
                        <th> No.</th>
                        <th style="width:10%;"> No Nota</th>
                        <th> Nama Kasir</th>
                        <th> Tgl Penjualan</th>
                        <th style="width:10%;"> Kode Barang</th>
                        <th> Nama Barang</th>
                        <th style="width:1%;"> Jumlah</th>
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
                        if(!empty($_GET['cari'])) {
                            $ranges = explode(' - ', $_GET['cari']);
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
                                        $cekdata = $lihat -> minggu_jual($tgl1, $tgl2);
                                        if (!empty($cekdata)) {
                                            $hasil = $cekdata;
                                        } else {
                                            $hasil = [];
                                        }
                                        $transaksi = $lihat -> laptransminggu($tgl1, $tgl2);
                                } else {
                                    $no=1; 
                                    $jumlah = 0;
                                    $omset = 0;
                                    $cekdata = $lihat -> hari_jual($tgl1);
                                    // print_r($cekdata);
                                    if (!empty($cekdata)) {
                                        $hasil = $cekdata;
                                    } else {
                                        $hasil = [];
                                    }
                                    $transaksi = $lihat -> laptranshari($tgl1);
                                }
                        } else {
                            $cekdata = $lihat -> lapjual();
                            if (!empty($cekdata)) {
                                $hasil = $cekdata;
                            } else {
                                $hasil = [];
                            }
                            $transaksi = $lihat -> laptrans();
                        }
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
        <?php } else if($_GET['lap'] == 'msk'){?>
            <table border="1" width="100%" cellpadding="3" cellspacing="4">
                <thead>
                    <tr style="background:#fff000;color:#333;">
                        <th>No.</th>
                        <th>ID Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=1;
                    $totalBeli = 0;
                    $totalJual = 0;
                    $totalStok = 0;
                    if(!empty($_GET['cari'])) {
                        $ranges = explode(' - ', $_GET['cari']);
                        $tgl1 = $ranges[0];
                        $tgl2 = $ranges[1];
                        $D1 = date("d",strtotime($tgl1));
                        $D2 = date("d",strtotime($tgl2));
                        $M1 = date("m",strtotime($tgl1));
                        $M2 = date("m",strtotime($tgl2));
                        $Y = date("Y",strtotime($tgl1));
                        // echo $tgl1;
                            if ($D1 !== $D2) {
                                    $cekdata = $lihat -> minggu_jualbrgmsk($tgl1, $tgl2);
                                    if (!empty($cekdata)) {
                                        $hasil = $cekdata;
                                    } else {
                                        $hasil = [];
                                    }
                                    // $transaksi = $lihat -> laptransminggubrgmsk($tgl1, $tgl2);
                            } else {
                                $no=1; 
                                $jumlah = 0;
                                $omset = 0;
                                $cekdata = $lihat -> hari_jualbrgmsk($tgl1);
                                // print_r($cekdata);
                                if (!empty($cekdata)) {
                                    $hasil = $cekdata;
                                } else {
                                    $hasil = [];
                                }
                                // $transaksi = $lihat -> laptransharidlm($tgl1);
                            }
                    } else {
                        // $cekdata = $lihat -> lapjualdlm();
                        $cekdata = $lihat -> barangmsk();
                        if (!empty($cekdata)) {
                            $hasil = $cekdata;
                        } else {
                            $hasil = [];
                        }
                        // $transaksi = $lihat -> laptransdlm();
                    }
                ?>
                <?php 
                    // $no=1;
                    foreach($hasil as $isi) {
                        $_SESSION['id'] = $isi[0];
                        // echo($_SESSION['id']);
                ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $isi[2];?></td>
                        <td><?php echo $isi[4];?></td>
                        <td><?php echo $isi[1];?></td>
                        <td><?php echo $isi[5];?></td>
                        <td><?php echo $isi[3];?></td>
                        <td><?php echo $isi[6];?></td>
                        <!-- <td>
                            <?php if($isi[3] == '0'){?>
                                <button class="btn btn-danger"> Habis</button>
                            <?php }else{?>
                                <?php echo $isi[3];?>
                            <?php }?>
                        </td> -->
                        <td>Rp.<?php echo number_format($isi[7]);?>,-</td>
                        <td>Rp.<?php echo number_format($isi[8]);?>,-</td>
                    </tr>
                <?php 
                        $no++; 
                        $totalBeli += $isi[6] * $isi[7]; 
                        $totalJual += $isi[6] * $isi[8];
                        // $totalStok += $isi['3'];
                    }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">Total </td>
                        <th style="background:red;color:#fff;">Modal</th>
                        <th style="background:red;color:#fff;">Rp.<?php echo number_format($totalBeli);?>,-</td>
                        <th>Rp.<?php echo number_format($totalJual);?>,-</td>
                        <!-- <th colspan="1" style="background:#ddd"></th> -->
                    </tr>
                </tfoot>
            </table>
        <?php } else { ?>
            <table border="1" width="100%" cellpadding="3" cellspacing="4">
                <thead>
                    <tr style="background:#FFF000;color:#333;">
                        <th>No.</th>
                        <th>ID Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Sisa Barang</th>
                        <th>Harga Supplier</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=1;
                    $totalBeli = 0;
                    $totalJual = 0;
                    $totalStok = 0;
                    if(!empty($_GET['cari'])) {
                        $ranges = explode(' - ', $_GET['cari']);
                        $tgl1 = $ranges[0];
                        $tgl2 = $ranges[1];
                        $D1 = date("d",strtotime($tgl1));
                        $D2 = date("d",strtotime($tgl2));
                        $M1 = date("m",strtotime($tgl1));
                        $M2 = date("m",strtotime($tgl2));
                        $Y = date("Y",strtotime($tgl1));
                        // echo $tgl1;
                            if ($D1 !== $D2) {
                                    $cekdata = $lihat -> minggu_jualbrgkmbl($tgl1, $tgl2);
                                    if (!empty($cekdata)) {
                                        $hasil = $cekdata;
                                    } else {
                                        $hasil = [];
                                    }
                                    // $transaksi = $lihat -> laptransminggudlm($tgl1, $tgl2);
                            } else {
                                $cekdata = $lihat -> hari_jualbrgkmbl($tgl1);
                                // print_r($cekdata);
                                if (!empty($cekdata)) {
                                    $hasil = $cekdata;
                                } else {
                                    $hasil = [];
                                }
                                // $transaksi = $lihat -> laptransharidlm($tgl1);
                            }
                    } else {
                        // $cekdata = $lihat -> lapjualdlm();
                        $cekdata = $lihat -> barangkmbl();
                        if (!empty($cekdata)) {
                            $hasil = $cekdata;
                        } else {
                            $hasil = [];
                        }
                        // $transaksi = $lihat -> laptransdlm();
                    }
                ?>
                <?php 
                    // $no=1;
                    foreach($hasil as $isi) {
                        $_SESSION['id'] = $isi[0];
                ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $isi[2];?></td>
                        <td><?php echo $isi[3];?></td>
                        <td><?php echo $isi[1];?></td>
                        <td><?php echo $isi[8];?></td>
                        <td><?php echo $isi[5];?></td>
                        <td><?php echo $isi[4];?></td>

                        <td>Rp.<?php echo number_format($isi[7]);?>,-</td>
                        <td>Rp.<?php echo number_format($isi[4] * $isi[7]);?>,-</td>
                    </tr>
                <?php 
                        $no++; 
                        $totalBeli += $isi[4] * $isi[7]; 
                        // $totalJual += $isi[10];
                        // $totalStok += $isi['3'];
                    }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8">Total </td>
                        <th>Rp.<?php echo number_format($totalBeli);?>,-</td>
                        <!-- <th>Rp.<?php echo number_format($totalJual);?>,-</td> -->
                        <!-- <th colspan="1" style="background:#ddd"></th> -->
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
    </div>
</body>
</html>