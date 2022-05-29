<div class="modal-header" style="background:#285c64;color:#fff;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Barang</h4>
									</div>										
												<?php
                                                    include ('db_con.php');
													// $formatbrg = $lihat -> barang_id();
													// $formatsupp = $lihat -> supp_id();
                                                    $kode = $_GET['id'];
                                                    // echo $kode;
                                                    $query_edit = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg='$kode'");
                                                    // $result = mysqli_fetch_array($query_edit);
                                                    while ($row = mysqli_fetch_assoc($query_edit)) {     
												?>
										<div class="modal-body">
											<form enctype="application/x-www-form-urlencoded" action="" method="POST">
									
											<table class="table table-striped bordered">
												
                                                <tr>
                                                    <td>Kode Barang</td>
                                                    <td><input type="text" required placeholder="Kode Barang" value="<?php echo $row['kode_brg']; ?>" class="form-control"  name="kdbrg"></td>
                                                </tr>
												<tr>
													<td>Nama Supplier</td>
													<td><input id="nmsupp" type="text" placeholder="Nama Supplier" value="<?php echo $row[1]; ?>" required class="form-control" name="nmsupp"></td>
												</tr>
												<tr>
													<td>Nama Barang</td>
													<td><input type="text" placeholder="Nama Barang" value="" required class="form-control" name="nmbrg"></td>
												</tr>
												<tr>
													<td>Jumlah Stok</td>
													<td><input type="number" required Placeholder="Jumlah" value="" class="form-control"  name="jmlh"></td>
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
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</form>
										</div>
                                        <?php
                                         } 
                                        ?>