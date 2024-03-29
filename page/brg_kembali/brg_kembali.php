<?php
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "unique") {
			$_SESSION['error'] = 'Masukkan Nama Barang Unik';
	}
	if($_GET['pesan'] == "nullsupp") {
		$_SESSION['error'] = 'Supplier Tidak Ada';
	}
	if($_GET['pesan'] == "nullbrg") {
		$_SESSION['error'] = 'Barang Tidak Ada';
	}
	if($_GET['pesan'] == "nulldata") {
		$_SESSION['error'] = 'Data Tidak Ada';
	}
	if($_GET['pesan'] == "error1") {
		$_SESSION['error'] = 'Pilih Tanggal dan Tahun';
	}

	if($_GET['pesan'] == "error2") {
		$_SESSION['error'] = 'Pilih Tanggal Awal dan Tanggal Akhir';
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
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
				  <h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
						<h3>Data Barang Kembali</h3>
						<hr/>
						<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
							<script type="text/javascript">

							swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
								window.location = "admin.php?page=brg_kembali/brg_kembali&accordion=on&active=yes";
							});

							</script>
						<?php }
							$_SESSION['error'] = '';
						?>
						<?php if(isset($_GET['success-kmbl'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>

						<!-- Trigger the modal with a button -->
						
						<!-- <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
							<a href="admin.php?page=brg_kembali/brg_kembali" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a> -->
						<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
						<div class="clearfix"></div>
						<div class="clearfix" style="margin-top:1em;"></div>
						
						<h4>Cari Laporan</h4>
						<form method="post" action="admin.php?page=brg_kembali/brg_kembali&accordion=on&active=yes&cari=ok">
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
									</td>
									<td>
										<input type="hidden" name="periode" value="ya">
										<button class="btn btn-primary">
											<i class="fa fa-search"></i> Cari
										</button>
										<a href="admin.php?page=brg_kembali/brg_kembali&accordion=on&active=yes" class="btn btn-success">
											<i class="fa fa-refresh"></i> Refresh</a>
											
										<?php if(!empty($_GET['cari'])){?>
											<a href="excel.php?cari=<?php echo $_POST['cari'];?>&lap=kmbl" class="btn btn-info"><i class="fa fa-download"></i>
											Excel</a>
										<?php }else{?>
											<a href="excel.php?lap=kmbl" class="btn btn-info"><i class="fa fa-download"></i>
											Excel</a>
										<?php }?>
										<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-plus"></i> Insert Data</button>
										<!-- <a href="admin.php?page=brg_kembali/brg_kembali" style="margin-right :0.5pc;" 
											class="btn btn-success btn-md pull-right">
											<i class="fa fa-refresh"></i> Refresh Data</a> -->
									</td>
								</tr>
							</table>
						</form>

						<div class="clearfix" style="margin-top:1em;"></div>
						
						<div class="clearfix" style="border-top:1px solid #ccc;"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
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
										<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$no=1;
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									if(!empty($_GET['cari'])) {
										$ranges = explode(' - ', $_POST['cari']);
										$tgl1 = $ranges[0];
										$tgl2 = $ranges[1];
										$D1 = date("d",strtotime($tgl1));
										$D2 = date("d",strtotime($tgl2));
										$M1 = date("m",strtotime($tgl1));
										$M2 = date("m",strtotime($tgl2));
										$Y = date("Y",strtotime($tgl1));
										echo $_POST['cari'];
										// echo $tgl2;
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
										<td class="aksi text-center">
											<a href="fungsi/hapus/hapus.php?barangkmbl=hapus&id=<?php echo $_SESSION['id']; ?>">
											<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
											<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
										</td>
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
										<th colspan="1" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
								</div>										
								<form enctype="application/x-www-form-urlencoded" action="fungsi/tambah/tambah.php?barangkmbl=tambah" method="POST">
									<div class="modal-body">
										<table class="table table-striped bordered">
											<tr>
												<td>Nama Supplier</td>
												<td>
													<input id="nmsupp" type="text" placeholder="Nama Supplier" required class="form-control" name="nmsupp">
													<ul class="auto-result" id="search-result"></ul>
												</td>
											</tr>
											<tr>
												<td>ID Supplier</td>
												<td><input id="idsupp" type="text" readonly placeholder="ID Supplier" required class="form-control" name="idsupp"></td>
											</tr>
											<tr>
												<td>Nama Barang</td>
												<td>
													<input id="nmbrg" type="text" placeholder="Nama Barang" required class="form-control"  name="nmbrg">
													<ul class="auto-result" id="search-result2"></ul>
												</td>
											</tr>
											<tr>
												<td>Kode Barang</td>
												<td><input id="kdbrg" type="text" required readonly placeholder="Kode Barang" value="" class="form-control" name="kdbrg"></td>
											</tr>
											<tr>
												<td>Tanggal Masuk</td>
												<td><input id="tgl" class="form-control" type="text" required readonly value="<?php echo date("Y-m-d");?>" name="tgl"></td>
											</tr>
											<tr>
												<td>Sisa Barang</td>
												<td><input id="sisa" type="number" required Placeholder="Jumlah" min="1" class="form-control" name="sisa"></td>
											</tr>
											<tr>
												<td>Harga Supplier</td>
												<td><input id="beli" type="number" readonly placeholder="Harga Supplier" required class="form-control" name="beli"></td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
			<script type="text/javascript">
				$(document).ready(function () {
						$(document).on("change","#nmsupp",function(){
							// console.log(nmsp);
							$.ajax({  
								url :"page/brg_kembali/get_ajax.php",  
								type:"POST",  
								cache:false,
								dataType:'json',  
								data:{getNmSupp:$("#nmsupp").val()},
								success:function(response){
									// console.log(response);
									$.each(response, function (key, value) { 
										// console.log(value['id_supp']);
										$('#idsupp').val(value['id_supp']);
									});
								},  
							});
						});

						$(document).on("change","#nmbrg",function(){
							// console.log(kode);
							$.ajax({  
								url :"page/brg_kembali/get_ajax.php",  
								type:"POST",  
								cache:false,
								dataType:'json',  
								data:{getNmBrg:$("#nmbrg").val()},
								success:function(response){
									// console.log(response);
									$.each(response, function (key, value) { 
										// console.log(value['id_supp']);
										$('#kdbrg').val(value['kode_brg']);
										$('#beli').val(value['hrg_beli']);
									});
								},  
							});
						});
				});
			</script>
			<script>
				$(document).ready(function(){
					$("#nmsupp").keyup(function(){
						var search = $(this).val();
						// console.log(search);
						if (search !== "") {
							$.ajax({  
								url :"fungsi/autocomplete/autocomplete.php",  
								type:"POST",  
								cache:false,
								data:{brgkmbl:search},
								success:function(data){
									// console.log(data);
									$("#search-result").html(data);
									$("#search-result").fadeIn();
								},  
							});
						} else {
							$("#search-result").html("");  
							$("#search-result").fadeOut();
						}
					});
					$("#nmbrg").keyup(function(){
						var search = $(this).val();
						// console.log(search);
						if (search !== "") {
							$.ajax({  
								url :"fungsi/autocomplete/autocomplete.php",  
								type:"POST",  
								cache:false,
								data:{brgkmbl2:search},
								success:function(data){
									// console.log(data);
									$("#search-result2").html(data);
									$("#search-result2").fadeIn();
								},  
							});
						} else {
							$("#search-result2").html("");  
							$("#search-result2").fadeOut();
						}
					});
				});
				function selectSupp(val) {
					$("#nmsupp").val(val);
					$.ajax({  
						url :"page/brg_kembali/get_ajax.php",  
						type:"POST",  
						cache:false,
						dataType:'json',  
						data:{getNmSupp:$("#nmsupp").val()},
						success:function(response){
							// console.log(response);
							$.each(response, function (key, value) { 
								// console.log(value['id_supp']);
								$('#idsupp').val(value['id_supp']);
							});
						},  
					});
					$("#search-result").hide();
				}
				function selectBarang(val) {
					$("#nmbrg").val(val);
					$.ajax({  
						url :"page/brg_kembali/get_ajax.php",  
						type:"POST",  
						cache:false,
						dataType:'json',  
						data:{getNmBrg:$("#nmbrg").val()},
						success:function(response){
							// console.log(response);
							$.each(response, function (key, value) { 
								// console.log(value['id_supp']);
								$('#kdbrg').val(value['kode_brg']);
								$('#beli').val(value['hrg_beli']);
							});
						},  
					});
					$("#search-result2").hide();
				}
				$(document).click(function(){
						$("#search-result").hide();
						$("#search-result2").hide();
				});
			</script>