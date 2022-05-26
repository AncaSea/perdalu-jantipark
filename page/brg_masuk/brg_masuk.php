
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Barang Masuk</h3>
						<br/>
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
							<a href="admin.php?page=brg_masuk/brg_masuk" style="margin-right :0.5pc;" 
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
										<th>Jumlah</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									$hasil = $lihat -> barangmsk();
									$no=1;
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
										<td>Rp.<?php echo number_format($isi[10]);?>,-</td>
										<td>
											<a href="index.php?page=barang/details&barang=<?php echo $isi[2];?>"><button class="btn btn-primary btn-xs">Details</button></a>
											<a href="index.php?page=barang/edit&barang=<?php echo $isi[2];?>"><button class="btn btn-warning btn-xs">Edit</button></a>
											<a href="../fungsi/hapus/hapus.php?barangmsk=hapus&id=<?php $_SESSION['id'];?>"><button class="btn btn-danger btn-xs">Hapus</button></a>
										</td>
									</tr>
								<?php 
										$no++; 
										$totalBeli += $isi[6] * $isi[7]; 
										$totalJual += $isi[6] * $isi[10];
										// $totalStok += $isi['3'];
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="7">Total </td>
										<th>Rp.<?php echo number_format($totalBeli);?>,-</td>
										<th>Rp.<?php echo number_format($totalJual);?>,-</td>
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
								<form enctype="application/x-www-form-urlencoded" action="../../fungsi/tambah/tambah.php?barangmsk=tambah" method="POST">
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
												<td>Tanggal Input</td>
												<td><input class="form-control" type="text" required readonly="readonly" value="<?php echo date("Y-m-d");?>" name="tgl"></td>
											</tr>
											<tr>
												<td>Jumlah</td>
												<td><input type="number" required Placeholder="Jumlah" class="form-control"  name="jmlh"></td>
											</tr>
											<tr>
												<td>Harga Beli</td>
												<td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
											</tr>
											<tr>
												<td>Harga Jual</td>
												<td><input type="number" placeholder="Harga Jual" required class="form-control"  name="jual"></td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
								<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
								<script type="text/javascript">
									function auto(){
										var nama = $("#nmsupp").val(); 
										$.ajax({
											type : "POST",
											url : '../ajax.php.php', // file proses penginputan
											data : "nama="+nama,
										}).success(function (data){
										var json = data,
										obj = json;
										$('#idsupp').val(obj.idsupp);
										});
									}
								</script>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
      	</section>