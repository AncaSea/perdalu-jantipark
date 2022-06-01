
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Supplier</h3>
						<hr>
					
						<?php if(isset($_GET['success-stok'])){?>
						<div class="alert alert-success">
							<p>Tambah Stok Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Supplier Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Supplier Berhasil !</p>
						</div>
						<?php }?>

						<!-- Trigger the modal with a button -->
						
						<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
							<a href="admin.php?page=supplier/supplier" style="margin-right :0.5pc;" 
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
										<th>Nomer HP</th>
										<th>Alamat</th>
										<!-- <th>Tanggal Masuk</th>
										<th>Jumlah</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th> -->
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									$hasil = $lihat -> supplier();
									$no=1;
									foreach($hasil as $isi) {
										$_SESSION['id'] = $isi[0];
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td><?php echo $isi[3];?></td>
										<td><?php echo $isi[4];?></td>
										<!-- <td><?php echo $isi[3];?></td> -->
										<!-- <td><?php echo $isi[6];?></td> -->
										<!-- <td>
											<?php if($isi[3] == '0'){?>
												<button class="btn btn-danger"> Habis</button>
											<?php }else{?>
												<?php echo $isi[3];?>
											<?php }?>
										</td> -->
										<!-- <td>Rp.<?php echo number_format($isi[7]);?>,-</td> -->
										<!-- <td>Rp.<?php echo number_format($isi[10]);?>,-</td> -->
										<td>
											<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal2">Edit</button>
											<a href="../fungsi/hapus/hapus.php?supplier=hapus&id=<?php $_SESSION['id'];?>"><button class="btn btn-danger btn-xs">Hapus</button></a>
										</td>
									</tr>
								<?php 
										$no++; 
										// $totalBeli += $isi[6] * $isi[7]; 
										// $totalJual += $isi[6] * $isi[10];
										// $totalStok += $isi['3'];
									}
								?>
								</tbody>
								<!-- <tfoot>
									<tr>
										<th colspan="7">Total </td>
										<th>Rp.<?php echo number_format($totalBeli);?>,-</td>
										<th>Rp.<?php echo number_format($totalJual);?>,-</td>
										<th colspan="2" style="background:#ddd"></th>
									</tr>
								</tfoot> -->
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
									<form enctype="application/x-www-form-urlencoded" action="fungsi/tambah/tambah.php?supplier=tambah" method="POST">
										<div class="modal-body">
									
											<table class="table table-striped bordered">
												
												<?php
													// $formatbrg = $lihat -> barang_id();
													// $formatsupp = $lihat -> addsupp_id();
												?>
												<tr>
													<td>ID Supplier</td>
													<td><input id="idsupp" type="text" placeholder="ID Supplier" required class="form-control" name="idsupp" ></td>
												</tr>
												<tr>
													<td>Nama Supplier</td>
													<td><input id="nmsupp" type="text" placeholder="Nama Supplier" required class="form-control" name="nmsupp"></td>
												</tr>
												<tr>
													<td>No. HP</td>
													<td><input type="number" placeholder="nohp" required class="form-control" name="nohp"></td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td><input type="text" placeholder="alamat" required class="form-control"  name="alamat"></td>
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

						<div id="myModal2" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
									<div class="modal-header" style="background:#285c64;color:#fff;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Barang</h4>
									</div>										
									<form enctype="application/x-www-form-urlencoded" action="../../fungsi/tambah/tambah.php?barangmsk=tambah" method="POST">
										<div class="modal-body">
									
											<table class="table table-striped bordered">
												
												<?php
													// $formatbrg = $lihat -> barang_id();
													// $formatsupp = $lihat -> supp_id();
												?>
												<tr>
													<td>ID Supplier</td>
													<td><input type="text" required placeholder="Kode Barang" value="" class="form-control"  name="kdbrg"></td>
												</tr>
												<tr>
													<td>Nama Supplier</td>
													<td><input id="nmsupp" type="text" placeholder="Nama Supplier" onkeyup="auto()" required class="form-control" name="nmsupp"></td>
												</tr>
												<tr>
													<td>Nama Barang</td>
													<td><input type="text" placeholder="Nama Barang" required class="form-control"  name="nmbrg"></td>
												</tr>
												<tr>
													<td>No. HP</td>
													<td><input type="number" required Placeholder="Jumlah" class="form-control"  name="jmlh"></td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
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
      	</section>