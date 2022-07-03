<?php
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "unique") {
			$_SESSION['error'] = 'Masukkan Nama Barang Unik';
	}
	if($_GET['pesan'] == "nullsupp") {
		$_SESSION['error'] = 'Masukkan Supplier Terlebih Dahulu';
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
			"drops": "auto",
			locale: {
				cancelLabel: 'Clear'
			}
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
						<h3>Data Barang Masuk</h3>
						<hr/>
						<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
							<script type="text/javascript">

							swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
								window.location = "admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes";
							});

							</script>
						<?php }
							$_SESSION['error'] = '';
						?>
						<?php if(isset($_GET['success-stok'])){?>
						<div class="alert alert-success">
							<p>Tambah Stok Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success'])){?>
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
							<a href="admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a> -->
						<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
						<div class="clearfix"></div>
						<div class="clearfix" style="margin-top:1em;"></div>
						
						<h4>Cari Laporan</h4>
						<form method="post" action="admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes&cari=ok">
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
										<a href="admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes" class="btn btn-success">
											<i class="fa fa-refresh"></i> Refresh</a>
											
										<?php if(!empty($_GET['cari'])){?>
											<a href="../../excel.php?cari=<?php echo $_POST['cari'];?>&lap=msk" class="btn btn-info"><i class="fa fa-download"></i>
											Excel</a>
										<?php }else{?>
											<a href="../../excel.php?lap=msk" class="btn btn-info"><i class="fa fa-download"></i>
											Excel</a>
										<?php }?>
										<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-plus"></i> Insert Data</button>
										<!-- <a href="admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes" style="margin-right :0.5pc;" 
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
										<td class="text-center">
										<!-- <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal2">Edit</button> -->
											<!-- <a href="index.php?page=barang/edit&barang=<?php echo $isi[2];?>" data-toggle="modal" data-target="myModal2"><button class="btn btn-warning btn-xs">Edit</button></a> -->
											<a href="../fungsi/hapus/hapus.php?barangmsk=hapus&id=<?php echo $isi[0];?>">
											<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
											<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
										</td>
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
										<th colspan="1" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						
						<div class="clearfix" style="margin-top:7pc;"></div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
						<?php 
							        $rand = mt_rand(0000,9999);
									$randid = 'sp'.$rand.'';
        							$arrid = array('id_supp'=>"$randid");
									// print_r($arrid);
						?>
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
									<div class="modal-header" style="background:#285c64;color:#fff;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
									</div>										
									<form enctype="application/x-www-form-urlencoded" action="../../fungsi/tambah/tambah.php?barangmsk=tambah" method="POST">
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
													<td><input id="idsupp" type="text" readonly placeholder="ID Supplier" required="on" class="form-control" name="idsupp"></td>
												</tr>
												<tr>
													<td>Nama Barang</td>
													<td>
														<input class="nmbrg form-control" id="nmbrg" type="text" placeholder="Nama Barang" required class="form-control" name="nmbrg">
														<ul class="auto-result" id="search-result2"></ul>
													</td>
												</tr>
												<tr>
													<td>Kode Barang</td>
													<td><input id="kdbrg" type="text" readonly required="on" placeholder="Kode Barang" class="form-control"  name="kdbrg"></td>
												</tr>
												<tr>
													<td>Tanggal Input</td>
													<td><input id="tgl" class="form-control" type="text" required readonly="readonly" value="<?php echo date("Y-m-d");?>" name="tgl"></td>
												</tr>
												<tr>
													<td>Jumlah</td>
													<td><input id="jmlh" type="number" min="1" required Placeholder="Jumlah" class="form-control"  name="jmlh"></td>
												</tr>
												<tr>
													<td>Harga Beli</td>
													<td><input id="beli" type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
												</tr>
												<tr>
													<td>Harga Jual</td>
													<td><input id="jual" type="number" placeholder="Harga Jual" required class="form-control"  name="jual"></td>
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
							url :"page/brg_masuk/get_ajax.php",  
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
							url :"page/brg_masuk/get_ajax.php",  
							type:"POST",  
							cache:false,
							dataType:'json',  
							data:{getNmBrg:$("#nmbrg").val()},
							success:function(response){
								// console.log(response);
								$.each(response, function (key, value) { 
									// console.log(value['id_supp']);
									$('#kdbrg').val(value['kode_brg']);
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
								data:{brgmsk:search},
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
								data:{brgmsk2:search},
								success:function(data){
									console.log(data);
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
						url :"page/brg_masuk/get_ajax.php",  
						type:"POST",  
						cache:false,
						dataType:'json',  
						data:{getNmSupp:$("#nmsupp").val()},
						success:function(response){
							console.log(response);
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
						url :"page/brg_masuk/get_ajax.php",  
						type:"POST",  
						cache:false,
						dataType:'json',  
						data:{getNmBrg:$("#nmbrg").val()},
						success:function(response){
							// console.log(response);
							$.each(response, function (key, value) { 
								// console.log(value['id_supp']);
								$('#kdbrg').val(value['kode_brg']);
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