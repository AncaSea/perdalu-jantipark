
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
						<hr/>
						<?php if(isset($_GET['success-stok'])){?>
						<div class="alert alert-success">
							<p>Tambah Stok Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
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
										// echo($_SESSION['id']);
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td class="kode"><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td><?php echo $isi[3];?></td>
										<td>Rp.<?php echo number_format($isi[4]);?>,-</td>
										<td>Rp.<?php echo number_format($isi[5]);?>,-</td>
										<td>
										<button id="li-modal" type="button" class="btn btn-primary btn-xs li-modal" data-toggle="modal" data-target="#myModal2" >Edit</button>
										<!-- <button id="li-modal" type="button" class="btn btn-primary btn-xs li-modal">Edit</button> -->
											<!-- <a href="../page/stok/edit.php" type="button" data-toggle="modal" data-target="#myModal2" class="li-modal"><button class="btn btn-warning btn-xs">Edit</button></a> -->
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
									<div id="modalForm">
										<form enctype="application/x-www-form-urlencoded" action="../../fungsi/edit/edit.php" method="POST">
											<div class="modal-body">
													<table class="table table-striped bordered">
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
															<td><input id="jumlah" type="number" required Placeholder="Jumlah" value="" class="form-control"  name="jumlah"></td>
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
													<div class="modal-footer">
														<button type="submit" name="updateStok" class="btn btn-primary"><i class="fa fa-plus"></i> Update Data</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</form>
									</div>										
								</div>
							</div>
						</div>
              		</div>
          	</section>
      	</section>
		<script type="text/javascript">
			$(document).ready(function () {
				$(document).on("click",".li-modal",function(){  
                // var kd = $(this).attr('data-id');  
				var kode = $(this).closest('tr').find('.kode').text();
						// console.log(kode);
    
				$.ajax({  
                     url :"page/stok/edit_ajax.php",  
                     type:"POST",  
                     cache:false,
					 dataType:'json',  
                     data:{editId:kode},  
                     success:function(response){
						// console.log(response);
						$.each(response, function (key, value) { 
							// console.log(value['kode_brg']);
							$('#kdbrg').val(value['kode_brg']);
							$('#nmsupp').val(value['nama_supp']);
							$('#nmbrg').val(value['nama_brg']);
							$('#jumlah').val(value['jumlah']);
							$('#beli').val(value['hrg_beli']);
							$('#jual').val(value['hrg_jual']);
						});
                     },  
                });
           		});
			});
		</script>