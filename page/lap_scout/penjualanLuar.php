 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	  <?php 
			$bulan_tes =array(
				'01'=>"Januari",
				'02'=>"Februari",
				'03'=>"Maret",
				'04'=>"April",
				'05'=>"Mei",
				'06'=>"Juni",
				'07'=>"Juli",
				'08'=>"Agustus",
				'09'=>"September",
				'10'=>"Oktober",
				'11'=>"November",
				'12'=>"Desember"
			);

			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "error1") {
						$_SESSION['error'] = 'Pilih Tanggal dan Tahun';
				}
			
				if($_GET['pesan'] == "error2") {
					$_SESSION['error'] = 'Pilih Tanggal Awal dan Tanggal Akhir';
				}
			
				if($_GET['pesan'] == "updatefailed") {
					$_SESSION['error'] = 'Gagal Mengupdate Stok Barang';
				}
			
				if($_GET['pesan'] == "emptycart") {
					$_SESSION['error'] = 'Keranjang Kosong';
				}
			}
		?>

		  <script>
			$(document).ready(function () {
				$('#demo').daterangepicker({
					// locale: {
            		// 	format: 'YYYY-MM-DD'
        			// },
					"showDropdowns": true,
					"autoApply": true,
					"startDate": new Date(),
					"endDate": new Date(),
					"opens": "right",
					"drops": "auto"
				}, function(start, end, label) {
					console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
				});
			});
		  </script>
      <section id="main-content" style="margin-left: 0px;">
          <section class="wrapper">
			<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
				<script type="text/javascript">

					swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
						window.location = "admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes";
					});

				</script>
			<?php }
					$_SESSION['error'] = '';
			?>
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

						<h4>Cari Laporan</h4>
						<form method="post" action="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes&cari=ok">
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
									<td>
										<input type="hidden" name="periode" value="ya">
										<button class="btn btn-primary">
											<i class="fa fa-search"></i> Cari
										</button>
										<a href="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes" class="btn btn-success">
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
						</form>
						<hr>

						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-striped table-bordered nowrap" style="width: 100%;" id="example1">
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
							<a href="scout.php" class="btn btn-warning btn-md">Kembali</a>
						</div>
						<div class="clearfix" style="padding-top:5pc;"></div>
					</div>
				  </div>
              </div>
          </section>