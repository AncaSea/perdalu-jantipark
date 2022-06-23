<?php
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "samerole") {
			$_SESSION['error'] = 'Role Sudah Ada';
	}
}
?>
 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
				  		<button  type="button" class="btn btn-primary btn-md pull-right" style="margin-top:1em;" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
							<a href="admin.php?page=supplier/supplier&accordion=on&active=yes" style="margin-right :0.5pc;margin-top: 1em;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a>
						<h3>Data Role</h3>
						<hr>
						<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
							<script type="text/javascript">

							swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
								window.location = "admin.php?page=role/role&accordion2=on&active=yes";
							});

							</script>
						<?php }
							$_SESSION['error'] = '';
						?>
						<?php if(isset($_GET['success-role'])){?>
						<div class="alert alert-success">
							<p>Tambah Role Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success-edit'])){?>
						<div class="alert alert-success">
							<p>Edit Role Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Role Berhasil !</p>
						</div>
						<?php }?>

						<!-- Trigger the modal with a button -->
						
						<!-- <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
							<a href="admin.php?page=supplier/supplier" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a> -->
						<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#fff000;color:#333;">
										<th>No.</th>
										<th>ID Role</th>
										<th>Nama Role</th>
										<th>Jenis</th>
										<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$hasil = $lihat -> role();
									$no=1;
									foreach($hasil as $isi) {
										$_SESSION['id'] = $isi[0];
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td class="id"><?php echo $isi[0];?></td>
										<td><?php echo $isi[1];?></td>
										<td><?php echo $isi[2];?></td>
										<td class="text-center">
										<button id="li-modal" type="button" class="btn btn-warning btn-md li-modal" data-toggle="modal" data-target="#myModal2" ><i class="fa-solid fa-pen"></i></button>
											<a href="../fungsi/hapus/hapus.php?role=hapus&id=<?php $_SESSION['id'];?>">
											<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
										</td>
									</tr>
								<?php 
										$no++;
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
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Role</h4>
								</div>										
									<form enctype="application/x-www-form-urlencoded" action="fungsi/tambah/tambah.php?role=tambah" method="POST">
										<div class="modal-body">
											<table class="table table-striped bordered">
												<tr>
													<td>ID Role</td>
													<td><input id="idrole" readonly type="text" placeholder="ID Role" required class="form-control" name="idrole"></td>
												</tr>
												<tr>
													<td>Nama Role</td>
													<td><input id="nmrole" type="text" placeholder="Nama Role" required class="form-control" name="nmrole"></td>
												</tr>
												<tr>
													<td>Jenis</td>
													<td><input id="jenis" type="text" placeholder="Jenis" required class="form-control" name="jenis"></td>
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
										<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Role</h4>
									</div>										
									<form enctype="application/x-www-form-urlencoded" action="../../fungsi/edit/edit.php" method="POST">
										<div class="modal-body">
									
											<table class="table table-striped bordered">
                                                <tr>
													<td>ID Role</td>
													<td><input id="idrole2" readonly type="text" placeholder="ID Role" required class="form-control" name="idrole2"></td>
												</tr>
												<tr>
													<td>Nama Role</td>
													<td><input id="nmrole2" type="text" placeholder="Nama Role" required class="form-control" name="nmrole2"></td>
												</tr>
												<tr>
													<td>Jenis</td>
													<td><input id="jenis2" type="text" placeholder="Jenis" required class="form-control" name="jenis2"></td>
												</tr>
											</table>
										</div>
										<div class="modal-footer">
											<button type="submit" name="updateRole" class="btn btn-primary"><i class="fa fa-plus"></i> Update Data</button>
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
				$(document).on("click",".li-modal",function(){  
                // var kd = $(this).attr('data-id');  
				var kode = $(this).closest('tr').find('.id').text();
						// console.log(kode);
				$.ajax({  
                     url :"page/role/edit_ajax.php",  
                     type:"POST",  
                     cache:false,
					 dataType:'json',  
                     data:{editId:kode},  
                     success:function(response){
						console.log(response);
						$.each(response, function (key, value) { 
							// console.log(value['kode_brg']);
							$('#idrole2').val(value['id_role']);
							$('#nmrole2').val(value['nama']);
							$('#jenis2').val(value['jenis']);
						});
                     },  
                });
           		});

				$(document).on("change","#nmrole",function(){
					// console.log(nmsp);
					$.ajax({  
						url :"page/role/get_ajax.php",  
						type:"POST",  
						cache:false,
						dataType:'json',  
						data:{getNmRole:$("#nmrole").val()},
						success:function(response){
							console.log(response);
							$.each(response, function (key, value) { 
								// console.log(value['id_supp']);
								$('#idrole').val(value['id_role']);
							});
						},  
					});
					});
			});
		</script>