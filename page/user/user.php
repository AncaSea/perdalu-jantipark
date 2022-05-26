
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data User Admin</h3>
						<br/>
						<a href="admin.php?page=user/user" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Password</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$hasil = $lihat -> useradmin();
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td>
											<a href="index.php?page=barang/details&barang=<?php echo $isi[1];?>"><button class="btn btn-primary btn-xs">Details</button></a>
											<a href="index.php?page=barang/edit&barang=<?php echo $isi[1];?>"><button class="btn btn-warning btn-xs">Edit</button></a>
											<a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi[1];?>" onclick="javascript:return confirm('Hapus Data barang ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
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
								<tfoot>
									<tr>
										<th colspan="3">Jumlah </td>
										<th id="rowcount1"></td>
										<th colspan="1" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					</div>
				</div>

			  <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data User Kasir</h3>
						<br/>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example2">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Password</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$hasil = $lihat -> userkasir();
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td>
											<a href="index.php?page=barang/details&barang=<?php echo $isi[1];?>"><button class="btn btn-primary btn-xs">Details</button></a>
											<a href="index.php?page=barang/edit&barang=<?php echo $isi[1];?>"><button class="btn btn-warning btn-xs">Edit</button></a>
											<a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi[1];?>" onclick="javascript:return confirm('Hapus Data barang ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
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
								<tfoot>
									<tr>
										<th colspan="3">Jumlah </td>
										<th id="rowcount2"></td>
										<th colspan="1" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					</div>
              	</div>
				<script type="text/javascript">
						var rowCount1 = document.getElementById("example1").rows.length;
						// var rowCount1 = $("#example1").length;
						var rowCount2 = document.getElementById("example2").rows.length;

						document.getElementById("rowcount1").innerHTML = rowCount1-2;
						document.getElementById("rowcount2").innerHTML = rowCount2-2;
				</script> 
          	</section>
      	</section>