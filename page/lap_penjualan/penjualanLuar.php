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
      <section id="main-content">
          <section class="wrapper">
			<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
				<script type="text/javascript">

				swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error");

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
							<?php }elseif(!empty($_GET['minggu'])){?>
								Data Laporan Penjualan tanggal <?= $_POST['minggu'];?>
							<?php }elseif(!empty($_GET['hari'])){?>
								Data Laporan Penjualan tanggal <?= $_POST['hari'];?>
							<?php }else{?>
								Data Laporan Penjualan <?= date('Y');?>
							<?php }?>
						</h3>
						<hr>
						
						

						<h4>Cari Laporan Per Bulan</h4>
						<form method="post" action="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes&bulan=ok">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Bulan
									</th>
									<th>
										Pilih Tahun
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
								<select name="bln" class="form-control">
									<option selected="selected">Bulan</option>
									<?php
										$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
										$jlh_bln=count($bulan);
										$bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12');
										$no=1;
										for($c=0; $c<$jlh_bln; $c+=1){
											echo"<option value='$bln1[$c]'> $bulan[$c] </option>";
										$no++;}
									?>
									</select>
								</td>
								<td>
								<?php
									$now=date('Y');
									echo "<select required name='thn' class='form-control'>";
									echo '
									<option selected="selected">Tahun</option>';
									for ($a=2017;$a<=$now;$a++)
									{
										echo "<option value='$a'>$a</option>";
									}
									echo "</select>";
									?>
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['cari'])){?>
										<a href="excel.php?cari=yes&bln=<?=$_POST['bln'];?>&thn=<?=$_POST['thn'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						
						<div class="clearfix" style="margin-top:1em;"></div>

						<h4>Cari Laporan Per Minggu</h4>
						<form method="post" action="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes&minggu=ok">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Tanggal Awal & Tanggal Akhir
									</th>
									<!-- <th>
										Pilih Tanggal Akhir
									</th> -->
									<th>
										Aksi
									</th>
								</tr>
								<tr>
									<td>
										<input name="minggu" type="text" id="demo" class="form-control">
										<input name="tgl1" type="text" id="demo" class="form-control">
										<input name="tgl2" type="text" id="demo" class="form-control">
										<!-- <select name="tgl" class="form-control">
										<option selected="selected">Tanggal Awal</option>
										<?php
											$tgl=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
											$jlh_tgl=count($tgl);
											// $bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12'); 
											$no=1;
											for($c=0; $c<$jlh_tgl; $c+=1){
												echo"<option value='$tgl[$c]'> $tgl[$c] </option>";
											$no++;}
										?>
										</select> -->
									</td>
									<!-- <td>
									<select name="tgl2" class="form-control">
										<option selected="selected">Tanggal Akhir</option>
										<?php
											$tgl2=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
											$jlh_tgl2=count($tgl2);
											// $bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12');
											$no=1;
											for($c2=0; $c2<$jlh_tgl2; $c2+=1){
												echo"<option value='$tgl2[$c2]'> $tgl2[$c2] </option>";
											$no++;}
										?>
										</select>
									</td> -->
									<td>
										<input type="hidden" name="periode" value="ya">
										<button class="btn btn-primary">
											<i class="fa fa-search"></i> Cari
										</button>
										<a href="admin.php?page=lap_penjualan/penjualan" class="btn btn-success">
											<i class="fa fa-refresh"></i> Refresh</a>
											
										<?php if(!empty($_GET['cari'])){?>
											<a href="excel.php?cari=yes&bln=<?=$_POST['bln'];?>&thn=<?=$_POST['thn'];?>" class="btn btn-info"><i class="fa fa-download"></i>
											Excel</a>
										<?php }else{?>
											<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
											Excel</a>
										<?php }?>
									</td>
								</tr>
							</table>
						</form>

						<div class="clearfix" style="margin-top:1em;"></div>
						
						<h4>Cari Laporan Per Hari</h4>
						<form method="post" action="admin.php?page=lap_penjualan/penjualan&hari=cek">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Hari
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
									<input type="date" value="<?= date('Y-m-d');?>" class="form-control" name="hari">
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="admin.php?page=lap_penjualan/penjualan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['hari'])){?>
										<a href="excel.php?hari=cek&tgl=<?= $_POST['hari'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						
						<div class="clearfix" style="border-top:1px solid #ccc;"></div>
	
						<br/>
						<br/>
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr style="background:#FFF000;color:#333;">
										<th> No.</th>
										<th style="width:10%;"> No Nota</th>
										<th> Nama Kasir</th>
										<th> Tgl Penjualan</th>
										<th style="width:10%;"> Kode Barang</th>
										<th> Nama Barang</th>
										<th style="width:10%;"> Jumlah</th>
										<th> Harga Jual</th>
										<th> Harga</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no=1; 
										if(!empty($_GET['bulan'])){
											$M = $_POST['bln'];
											$Y = $_POST['thn'];
											if ($M !== 'Bulan' && $Y !== 'Tahun') {
												$no=1;
												$omset = 0;
												$jumlah = 0;
												// $bayar = 0;
												$hasil = $lihat -> periode_jual($Y, $M);
												$transaksi = $lihat -> laptransperiode($Y, $M);
												// print_r($hasil);
											} else {
												header('location:admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes&pesan=error1');
											}
										} else if(!empty($_GET['minggu'])) {
											$ranges = explode(' - ', $_POST['minggu']);
											$tgl1 = $ranges[0];
											$tgl2 = $ranges[1];
											// echo $tgl1;
											// if ($tgl1 !== 'Tanggal Awal' && $tgl2 !== 'Tanggal Akhir') {
											// 	$no=1;
											// 	$omset = 0;
											// 	$jumlah = 0;
											// 	// $bayar = 0;
											// 	$hasil = $lihat -> minggu_jual($tgl1, $tgl2);
											// 	// print_r($hasil);
											// } else {
											// 	header('location:admin.php?page=lap_penjualan/penjualan&pesan=error2');
											// }
										} else if(!empty($_GET['hari'])){
											$hari = $_POST['hari'];
											$no=1; 
											$jumlah = 0;
											$omset = 0;
											$hasil = $lihat -> hari_jual($hari);
										} else {
											$hasil = $lihat -> lapjual();
											$transaksi = $lihat -> laptrans();
										}
									?>
									<?php 
										$omset = 0;
										$jumlah = 0;
										error_reporting(E_ERROR | E_PARSE);
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
						</div>
						<div class="clearfix" style="padding-top:5pc;"></div>
					</div>
				  </div>
              </div>
          </section>