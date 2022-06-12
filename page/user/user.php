
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
						<hr/>
						<a href="admin.php?page=user/user" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#FFF000 ;color:#333;">
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
										<td class="nama"><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td class="text-center">
										<button id="li-modal" type="button" class="btn btn-warning btn-md li-modal" data-toggle="modal" data-target="#myModal2" ><i class="fa-solid fa-pen"></i></button>
											<!-- <a href="fungsi/hapus/hapus.php?user=hapus&id=<?php echo $isi[1];?>" onclick="javascript:return confirm('Hapus Data barang ?');">
											<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button> -->
											<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
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
						<hr/>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example2">
								<thead>
									<tr style="background:#FFF000;color:#333;">
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
										<td class="nama2"><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td class="text-center">
										<button id="li-modal2" type="button" class="btn btn-warning btn-md li-modal2" data-toggle="modal" data-target="#myModal3" ><i class="fa-solid fa-pen"></i></button>
											<!-- <a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi[1];?>" onclick="javascript:return confirm('Hapus Data barang ?');">
											<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button> -->
											<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
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

                        <div id="myModal2" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
									<div class="modal-header" style="background:#285c64;color:#fff;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Edit User Admin</h4>
									</div>
									<div id="modalForm">
										<form enctype="application/x-www-form-urlencoded" action="../../fungsi/edit/edit.php" method="POST">
											<div class="modal-body">
												<table class="table table-striped bordered">
													<tr>
														<td>Nama</td>
														<td><input id="nama" type="text" required placeholder="Nama" value="" class="form-control"  name="nama"></td>
													</tr>
													<tr>
														<td>Username</td>
														<td><input id="user" type="text" placeholder="Username" value="" required class="form-control" name="user"></td>
													</tr>
													<tr>
														<td>Password</td>
														<td><input id="pwd" type="text" placeholder="Password" value="" required class="form-control" name="pwd"></td>
													</tr>
												</table>
												<div class="modal-footer">
													<button type="submit" name="updateUserAdmin" class="btn btn-primary"><i class="fa fa-plus"></i> Update Data</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</form>
									</div>										
								</div>
							</div>
						</div>

						<div id="myModal3" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
									<div class="modal-header" style="background:#285c64;color:#fff;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Edit User Kasir</h4>
									</div>
									<div id="modalForm">
										<form enctype="application/x-www-form-urlencoded" action="../../fungsi/edit/edit.php" method="POST">
											<div class="modal-body">
												<table class="table table-striped bordered">
													<tr>
														<td>Nama</td>
														<td><input id="nama2" type="text" required placeholder="Nama" value="" class="form-control"  name="nama2"></td>
													</tr>
													<tr>
														<td>Username</td>
														<td><input id="user2" type="text" placeholder="Username" value="" required class="form-control" name="user2"></td>
													</tr>
													<tr>
														<td>Password</td>
														<td><input id="pwd2" type="text" placeholder="Password" value="" required class="form-control" name="pwd2"></td>
													</tr>
												</table>
												<div class="modal-footer">
													<button type="submit" name="updateUserKasir" class="btn btn-primary"><i class="fa fa-plus"></i> Update Data</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</form>
									</div>										
								</div>
							</div>
						</div>
					</div>
              	</div>
          	</section>
		<script type="text/javascript">
			var rowCount1 = document.getElementById("example1").rows.length;
			// var rowCount1 = $("#example1").length;
			var rowCount2 = document.getElementById("example2").rows.length;

			document.getElementById("rowcount1").innerHTML = rowCount1-2;
			document.getElementById("rowcount2").innerHTML = rowCount2-2;
		</script> 
		<script type="text/javascript">
		$(document).ready(function () {
			$(document).on("click",".li-modal",function(){  
			// var kd = $(this).attr('data-id');  
			var kode = $(this).closest('tr').find('.nama').text();
					console.log(kode);
			$.ajax({  
				url :"page/user/edit_admin.php",  
				type:"POST",  
				cache:false,
				dataType:'json',  
				data:{editId:kode},  
				success:function(response){
					console.log(response);
					$.each(response, function (key, value) { 
						// console.log(value['kode_brg']);
						$('#nama').val(value['nama_admin']);
						$('#user').val(value['username']);
						$('#pwd').val(value['password']);
					});
				},  
			});
			});

			$(document).on("click",".li-modal2",function(){  
			// var kd = $(this).attr('data-id');  
			var kode = $(this).closest('tr').find('.nama2').text();
					// console.log(kode);
			$.ajax({  
				url :"page/user/edit_kasir.php",  
				type:"POST",  
				cache:false,
				dataType:'json',  
				data:{editId:kode},  
				success:function(response){
					console.log(response);
					$.each(response, function (key, value) { 
						// console.log(value['kode_brg']);
						$('#nama2').val(value['nama_kasir']);
						$('#user2').val(value['username']);
						$('#pwd2').val(value['password']);
					});
				},  
			});
			});
		});
	</script>