
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Stok Barang</h3>
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
						
						<!-- <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button> -->
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
										<!-- <th>ID Supplier</th> -->
										<th>Kode Barang</th>
										<th>Nama Supplier</th>
										<th>Nama Barang</th>
										<!-- <th>Tanggal Masuk</th> -->
										<th>Stok</th>
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
									$hasil = $lihat -> stok();
									$no=1;
									foreach($hasil as $isi) {
										$_SESSION['id'] = $isi[0];
										echo($_SESSION['id']);
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td id="kode"><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td><?php echo $isi[3];?></td>
										<td>Rp.<?php echo number_format($isi[4]);?>,-</td>
										<td>Rp.<?php echo number_format($isi[5]);?>,-</td>
										<td>
										<button id="li-modal" type="button" class="btn btn-primary btn-xs li-modal">Edit</button>
											<!-- <a href="../stok/edit.php" type="button" data-toggle="modal" data-target="#myModal2" class="li-modal"><button class="btn btn-warning btn-xs">Edit</button></a> -->
											<a href="../fungsi/hapus/hapus.php?stok=hapus&id=<?php echo $isi[0];?>"><button class="btn btn-danger btn-xs">Hapus</button></a>
										</td>
									</tr>
								<?php 
										$no++; 
										$totalBeli += $isi[3] * $isi[4]; 
										$totalJual += $isi[3] * $isi[5];
										// $totalStok += $isi['3'];
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total </td>
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

                        <div id="myModal2" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
									<div class="modal-header" style="background:#285c64;color:#fff;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Barang</h4>
									</div>										
										<div class="modal-body">
											<form enctype="application/x-www-form-urlencoded" action="" method="POST">
												<!-- <td><input id="kdbrg" type="hidden" name="kdbrg"></td> -->
											
												<table class="table table-striped bordered">
													
												<?php
												// if (isset($_POST['kd'])) {
                                                    // include ('db_con.php');
													// $formatbrg = $lihat -> barang_id();
													// $formatsupp = $lihat -> supp_id();
                                                    // $kode = $_GET['data-id'];
													// echo $kode;
                                                    // $query_edit = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg='$kode'");
                                                    // while ($row = mysqli_fetch_array($query_edit)) {     
												// }
												?>
													<tr>
														<td>Kode Barang</td>
														<td><input id="kdbrg" type="text" required placeholder="Kode Barang" value="" class="form-control"  name="kdbrg"></td>
													</tr>
													<tr>
														<td>Nama Supplier</td>
														<td><input id="nmsupp" type="text" placeholder="Nama Supplier" value="" required class="form-control" name="nmsupp"></td>
													</tr>
													<tr>
														<td>Nama Barang</td>
														<td><input id="nmbrg" type="text" placeholder="Nama Barang" value="" required class="form-control" name="nmbrg"></td>
													</tr>
													<tr>
														<td>Jumlah Stok</td>
														<td><input id="jumlah" type="number" required Placeholder="Jumlah" value="" class="form-control"  name="jmlh"></td>
													</tr>
													<tr>
														<td>Harga Beli</td>
														<td><input id="beli" type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
													</tr>
													<tr>
														<td>Harga Jual</td>
														<td><input id="jual" type="number" placeholder="Harga Jual" required class="form-control"  name="jual"></td>
													</tr>
                                        <?php
                                        //  } 
                                        ?>
												</table>
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</form>
										</div>
								</div>
							</div>
						</div>
              		</div>
          	</section>
      	</section>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 					   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
						<script type="text/javascript">
        $(document).ready(function () {

            $('.li-modal').on('click', function () {

                $('#myModal2').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#kdbrg').val(data[1]);
                $('#nmsupp').val(data[2]);
                $('#nmbrg').val(data[3]);
                $('#jumlah').val(data[4]);
                $('#beli').val(data[5]);
                $('#jual').val(data[6]);
            });
        });
						</script>