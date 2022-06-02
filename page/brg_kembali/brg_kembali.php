
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Barang Kembali</h3>
						<hr/>
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
						
						<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
							<a href="admin.php?page=brg_kembali/brg_kembali" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a>
						<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>ID Supplier</th>
										<th>Nama Supplier</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Tanggal Masuk</th>
										<th>Sisa Barang</th>
										<th>Harga Supplier</th>
										<th>Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									$hasil = $lihat -> barangkmbl();
									$no=1;
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
										<td class="aksi">
											<a href="../fungsi/hapus/hapus.php?barangkmbl=hapus&id=<?php echo $_SESSION['id']; ?>"><button class="btn btn-danger btn-xs">Hapus</button></a>
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
										<th colspan="2" style="background:#ddd"></th>
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
											
											<?php
												// $formatbrg = $lihat -> barang_id();
												// $formatsupp = $lihat -> supp_id();
											?>
											<tr>
												<td>Nama Supplier</td>
												<td><input id="nmsupp" type="text" placeholder="Nama Supplier" onkeyup="auto()" required class="form-control" name="nmsupp"></td>
											</tr>
											<tr>
												<td>ID Supplier</td>
												<td><input id="idsupp" type="text" placeholder="ID Supplier" required class="form-control" name="idsupp"></td>
											</tr>
											<tr>
												<td>Kode Barang</td>
												<td><input type="text" required placeholder="Kode Barang" value="" class="form-control"  name="kdbrg"></td>
											</tr>
											<tr>
												<td>Nama Barang</td>
												<td><input type="text" placeholder="Nama Barang" required class="form-control"  name="nmbrg"></td>
											</tr>
											<tr>
												<td>Tanggal Masuk</td>
												<td><input class="form-control" type="text" required readonly="readonly" value="<?php echo date("Y-m-d");?>" name="tgl"></td>
											</tr>
											<tr>
												<td>Sisa Barang</td>
												<td><input type="number" required Placeholder="Jumlah" class="form-control"  name="jmlh"></td>
											</tr>
											<tr>
												<td>Harga Supplier</td>
												<td><input type="number" placeholder="Harga Supplier" required class="form-control" name="beli"></td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
								<script type="text/javascript">
									function supp_id(str){
										if (str.length == 0) {
											document.getElementById("idsupp").innerHTML = "";
											return;
										} else {
							
											// Creates a new XMLHttpRequest object
											var xmlhttp = new XMLHttpRequest();
											xmlhttp.onreadystatechange = function () {
													document.getElementById("idsupp").innerHTML = this.responseText;
												}
											};
							
											// xhttp.open("GET", "filename", true);
											xmlhttp.open("GET", "ajax.php?supp_id=" + str, true);
											
											// Sends the request to the server
											xmlhttp.send();
									}
								</script>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>