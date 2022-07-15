<!--sidebar end-->

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<!--main content start-->
<?php

if (isset($_GET['pesan'])) {
	if ($_GET['pesan'] == "nullrole") {
		$_SESSION['error'] = 'Masukkan Role Terlebih Dahulu';
	}
	if ($_GET['pesan'] == "nullcheckbox") {
		$_SESSION['error'] = 'Pilih Jenis Terlebih Dahulu';
	}
}

?>
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-lg-12 main-chart">
				<a href="admin.php?page=menu/menu&accordion2=on&active=yes" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
					<i class="fa fa-refresh"></i> Refresh Data</a>
				<h3>Data Menu Makanan & Data Menu Minuman</h3>
				<hr />
				<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
					<script type="text/javascript">
						swal("ERROR!", "<?php echo $_SESSION['error']; ?>", "error").then(function() {
							window.location = "admin.php?page=menu/menu&accordion2=on&active=yes";
						});
					</script>
				<?php }
				$_SESSION['error'] = '';
				?>
				<?php if (isset($_GET['success-menu'])) { ?>
					<div class="alert alert-success">
						<p>Tambah Menu Berhasil !</p>
					</div>
				<?php } ?>
				<?php if (isset($_GET['success-menupkt'])) { ?>
					<div class="alert alert-success">
						<p>Tambah Menu Paket Berhasil !</p>
					</div>
				<?php } ?>
				<?php if (isset($_GET['success-edit'])) { ?>
					<div class="alert alert-success">
						<p>Edit Data Berhasil !</p>
					</div>
				<?php } ?>
				<?php if (isset($_GET['error-edit'])) { ?>
					<div class="alert alert-success">
						<p>Edit Data Gagal !</p>
					</div>
				<?php } ?>
				<?php if (isset($_GET['remove'])) { ?>
					<div class="alert alert-danger">
						<p>Hapus Data Berhasil !</p>
					</div>
				<?php } ?>

				<!-- Trigger the modal with a button -->

				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-plus"></i> Insert Data</button>
				<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
				<div class="clearfix"></div>
				<br />
				<!-- view barang -->
				<div class="modal-view">
					<table class="table table-bordered table-striped" id="example1">
						<thead>
							<tr style="background:#FFF000;color:#333;">
								<th>No.</th>
								<th>Nama Makanan</th>
								<th>Jenis</th>
								<th>Harga</th>
								<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$totalBeli = 0;
							$totalJual = 0;
							$totalStok = 0;
							$hasil = $lihat->mnmkn();
							$no = 1;
							foreach ($hasil as $isi) {
								$_SESSION['id'] = $isi[0];
								// echo($_SESSION['id']);
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td hidden><?php echo $isi[0]; ?></td>
									<td class='id'><?php echo $isi[1]; ?></td>
									<td><?php echo $isi[3]; ?></td>
									<td>Rp.<?php echo number_format($isi[4]); ?>,-</td>
									<td class="text-center">
										<button id="li-modal" type="button" class="btn btn-warning btn-md li-modal" data-toggle="modal" data-target="#myModal2"><i class="fa-solid fa-pen"></i></button>
										<!-- <button id="li-modal" type="button" class="btn btn-primary btn-xs li-modal">Edit</button> -->
										<!-- <a href="../page/stok/edit.php" type="button" data-toggle="modal" data-target="#myModal2" class="li-modal"><button class="btn btn-warning btn-xs">Edit</button></a> -->
										<a href="../fungsi/hapus/hapus.php?mkn=hapus&id=<?php echo $isi[0]; ?>">
											<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
											<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
									</td>
								</tr>
							<?php
								$no++;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="3">Jumlah </td>
								<th id="rowcount1">
									</td>
								<th colspan="1" style="background:#ddd"></th>
							</tr>
						</tfoot>
					</table>
				</div>

				<div class="row">
					<div class="col-lg-12 main-chart">
						<!-- <h3>Data Menu Minuman</h3> -->
						<hr />
						<!-- Trigger the modal with a button -->

						<!-- <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button> -->
						<!-- <a href="admin.php?page=stok/stok" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a> -->
						<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
						<div class="clearfix"></div>
						<br />

						<!-- view barang -->
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example2">
								<thead>
									<tr style="background:#FFF000;color:#333;">
										<th>No.</th>
										<th>Nama Minuman</th>
										<th>Jenis</th>
										<th>Harga</th>
										<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									$hasil = $lihat->mnmnmn();
									$no = 1;
									foreach ($hasil as $isi) {
										$_SESSION['id'] = $isi[0];
										// echo($_SESSION['id']);
									?>
										<tr>
											<td><?php echo $no; ?></td>
											<td hidden><?php echo $isi[0]; ?></td>
											<td class='id'><?php echo $isi[1]; ?></td>
											<td><?php echo $isi[3]; ?></td>
											<td>Rp.<?php echo number_format($isi[4]); ?>,-</td>
											<td class="text-center">
												<button id="li-modal" type="button" class="btn btn-warning btn-md li-modal" data-toggle="modal" data-target="#myModal2"><i class="fa-solid fa-pen"></i></button>
												<!-- <button id="li-modal" type="button" class="btn btn-primary btn-xs li-modal">Edit</button> -->
												<!-- <a href="../page/stok/edit.php" type="button" data-toggle="modal" data-target="#myModal2" class="li-modal"><button class="btn btn-warning btn-xs">Edit</button></a> -->
												<a href="../fungsi/hapus/hapus.php?mnm=hapus&id=<?php echo $isi[0]; ?>">
													<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
													<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
											</td>
										</tr>
									<?php
										$no++;
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="3">Jumlah </td>
										<th id="rowcount2">
											</td>
										<th colspan="1" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="row">
							<div class="col-lg-12 main-chart">
								<h3>Data Paket Bar-Bar</h3>
								<hr />
								<!-- Trigger the modal with a button -->

								<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#pktModal">
									<i class="fa fa-plus"></i> Insert Data</button>
								<!-- <a href="admin.php?page=stok/stok" style="margin-right :0.5pc;" 
								class="btn btn-success btn-md pull-right">
								<i class="fa fa-refresh"></i> Refresh Data</a> -->
								<!-- <a href="login_admin.php?page=barang&stok=yes" style="margin-right :0.5pc;" 
							class="btn btn-warning btn-md pull-right">
							<i class="fa fa-list"></i> Sortir Stok Kurang</a> -->
								<div class="clearfix"></div>
								<br />

								<!-- view barang -->
								<div class="modal-view">
									<table class="table table-bordered table-striped" id="example3">
										<thead>
											<tr style="background:#FFF000;color:#333;">
												<th>No.</th>
												<th>Nama Minuman</th>
												<th>Jenis</th>
												<th>Jumlah Isi</th>
												<th>Harga</th>
												<th class="text-center"><i class="fa fa-cog fa-spin"></i> Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php
											$totalBeli = 0;
											$totalJual = 0;
											$totalStok = 0;
											$hasil = $lihat->mnpkt();
											$no = 1;
											foreach ($hasil as $isi) {
												$_SESSION['id'] = $isi[0];
												// echo($_SESSION['id']);
											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td hidden><?php echo $isi[0]; ?></td>
													<td class='id'><?php echo $isi[1]; ?></td>
													<td><?php echo $isi[3]; ?></td>
													<td><?php echo $isi[4]; ?></td>
													<td>Rp.<?php echo number_format($isi[5]); ?>,-</td>
													<td class="text-center">
														<button id="li-modal" type="button" class="btn btn-warning btn-md li-modal" data-toggle="modal" data-target="#pktModal2"><i class="fa-solid fa-pen"></i></button>
														<!-- <button id="li-modal" type="button" class="btn btn-primary btn-xs li-modal">Edit</button> -->
														<!-- <a href="../page/stok/edit.php" type="button" data-toggle="modal" data-target="#myModal2" class="li-modal"><button class="btn btn-warning btn-xs">Edit</button></a> -->
														<a href="../fungsi/hapus/hapus.php?pkt=hapus&id=<?php echo $isi[0]; ?>">
															<!-- <button class="btn btn-danger btn-xs">Hapus</button></a> -->
															<button type="button" class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
													</td>
												</tr>
											<?php
												$no++;
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="4">Jumlah </td>
												<th id="rowcount3">
													</td>
												<th colspan="1" style="background:#ddd"></th>
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
												<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Menu</h4>
											</div>
											<form enctype="application/x-www-form-urlencoded" action="fungsi/tambah/tambah.php?menu=tambah" method="POST">
												<div class="modal-body">
													<table class="table table-striped bordered">
														<tr>
															<td>ID Role</td>
															<td><input id="idrole" readonly type="text" placeholder="ID Role" required class="form-control" name="idrole"></td>
														</tr>
														<tr>
															<td>Nama Menu</td>
															<td><input id="nmmenu" type="text" placeholder="Nama Menu" required class="form-control" name="nmmenu"></td>
														</tr>
														<tr>
															<td>Nama Jenis</td>
															<td>
																<input id="jenis" type="text" placeholder="Jenis" required class="form-control" name="jenis">
																<ul class="auto-result" id="search-result"></ul>
															</td>
														</tr>
														<tr>
															<td>Harga</td>
															<td><input id="hrg" type="number" placeholder="Harga" required class="form-control" name="hrg"></td>
														</tr>
														<tr>
															<td class="text-center" colspan="2">
																<div class="checkbox-group required">
																	<div class="pretty p-icon p-round p-jelly">
																		<input type="checkbox" class="jnsmenu" name="menu" value="mkn" />
																		<div class="state p-success">
																			<i class="icon fa fa-check"></i>
																			<label>Makanan</label>
																		</div>
																	</div>
																	<div class="pretty p-icon p-round p-jelly">
																		<input type="checkbox" class="jnsmenu" name="menu" value="mnm" />
																		<div class="state p-success">
																			<i class="icon fa fa-check"></i>
																			<label>Minuman</label>
																		</div>
																	</div>
																</div>
															</td>
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

								<div id="pktModal" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content" style=" border-radius:0px;">
											<div class="modal-header" style="background:#285c64;color:#fff;">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data Paket</h4>
											</div>
											<form enctype="application/x-www-form-urlencoded" action="fungsi/tambah/tambah.php?menupkt=tambah" method="POST">
												<div class="modal-body">
													<table class="table table-striped bordered">
														<tr>
															<td>ID Role</td>
															<td><input id="idrolepkt" readonly type="text" placeholder="ID Role" required class="form-control" name="idrolepkt"></td>
														</tr>
														<tr>
															<td>Nama Paket</td>
															<td><input id="nmpkt" type="text" placeholder="Nama Menu" required class="form-control" name="nmpkt"></td>
														</tr>
														<tr>
															<td>Nama Jenis</td>
															<td>
																<input id="jenispkt" type="text" placeholder="Jenis" required class="form-control" name="jenispkt">
																<ul class="auto-result" id="search-result2"></ul>
															</td>
														</tr>
														<tr>
															<td>Jumlah</td>
															<td><input id="jmlh" type="text" placeholder="Jumlah" required class="form-control" name="jmlh"></td>
														</tr>
														<tr>
															<td>Harga</td>
															<td><input id="hrgpkt" type="number" placeholder="Harga" required class="form-control" name="hrgpkt"></td>
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

								<div id="pktModal2" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content" style=" border-radius:0px;">
											<div class="modal-header" style="background:#285c64;color:#fff;">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Supplier</h4>
											</div>
											<form enctype="application/x-www-form-urlencoded" action="../../fungsi/edit/edit.php" method="POST">
												<div class="modal-body">

													<table class="table table-striped bordered">
														<tr hidden>
															<td>ID</td>
															<td><input id="idpkt" type="number" class="form-control" name="idpkt"></td>
														</tr>
														<tr>
															<td>ID Role</td>
															<td><input id="idrolepkt2" readonly type="text" placeholder="ID Role" required class="form-control" name="idrolepkt2"></td>
														</tr>
														<tr>
															<td>Nama Paket</td>
															<td><input id="nmpkt2" type="text" placeholder="Nama Menu" required class="form-control" name="nmpkt2"></td>
														</tr>
														<tr>
															<td>Jenis</td>
															<td>
																<input id="jenispkt2" type="text" placeholder="Jenis" required class="form-control" name="jenispkt2">
																<ul class="auto-result" id="search-result4"></ul>
															</td>
														</tr>
														<tr>
															<td>Jumlah</td>
															<td><input id="jmlh2" type="text" placeholder="Jumlah" required class="form-control" name="jmlh2"></td>
														</tr>
														<tr>
															<td>Harga</td>
															<td><input id="hrgpkt2" type="number" placeholder="Harga" required class="form-control" name="hrgpkt2"></td>
														</tr>
													</table>
												</div>
												<div class="modal-footer">
													<button type="submit" name="updateMenupkt" class="btn btn-primary"><i class="fa fa-plus"></i> Update Data</button>
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
												<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Menu</h4>
											</div>
											<form enctype="application/x-www-form-urlencoded" action="../../fungsi/edit/edit.php" method="POST">
												<div class="modal-body">

													<table class="table table-striped bordered">
														<tr hidden>
															<td>ID</td>
															<td><input id="id" type="number" class="form-control" name="id"></td>
														</tr>
														<tr>
															<td>ID Role</td>
															<td><input id="idrole2" readonly type="text" placeholder="ID Role" required class="form-control" name="idrole2"></td>
														</tr>
														<tr>
															<td>Nama Menu</td>
															<td><input id="nmmenu2" type="text" placeholder="Nama Menu" required class="form-control" name="nmmenu2"></td>
														</tr>
														<tr>
															<td>Jenis</td>
															<td>
																<input id="jenis2" type="text" placeholder="Jenis" required class="form-control" name="jenis2">
																<ul class="auto-result" id="search-result3"></ul>
															</td>
														</tr>
														<tr>
															<td>Harga</td>
															<td><input id="hrg2" type="number" placeholder="Harga" required class="form-control" name="hrg2"></td>
														</tr>
														<tr>
															<td class="text-center" colspan="2">
																<div class="checkbox-group required">
																	<div class="pretty p-icon p-round p-jelly">
																		<input type="checkbox" class="jnsmenu" name="menu" value="mkn" />
																		<div class="state p-success">
																			<i class="icon fa fa-check"></i>
																			<label>Makanan</label>
																		</div>
																	</div>
																	<div class="pretty p-icon p-round p-jelly">
																		<input type="checkbox" class="jnsmenu" name="menu" value="mnm" />
																		<div class="state p-success">
																			<i class="icon fa fa-check"></i>
																			<label>Minuman</label>
																		</div>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class="modal-footer">
													<button type="submit" name="updateMenu" class="btn btn-primary"><i class="fa fa-plus"></i> Update Data</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
	</section>
	<script>
		var rowCount1 = document.getElementById("example1").rows.length;
		var rowCount2 = document.getElementById("example2").rows.length;
		var rowCount3 = document.getElementById("example3").rows.length;

		document.getElementById("rowcount1").innerHTML = rowCount1 - 2;
		document.getElementById("rowcount2").innerHTML = rowCount2 - 2;
		document.getElementById("rowcount3").innerHTML = rowCount3 - 2;
	</script>
	<script>
		$(document).ready(function() {
			$(document).on("click", ".li-modal", function() {
				// var kd = $(this).attr('data-id');  
				var idmenu = $(this).closest('tr').find('.id').text();
				// console.log(kode);
				$.ajax({
					url: "page/menu/edit_ajax.php",
					type: "POST",
					cache: false,
					dataType: 'json',
					data: {
						editId: idmenu
					},
					success: function(response) {
						console.log(response);
						$.each(response, function(key, value) {
							// console.log(value['nama']);
							$('#id').val(value['id']);
							$('#idrole2').val(value['role']);
							$('#nmmenu2').val(value['nama']);
							$('#jenis2').val(value['jenis']);
							$('#hrg2').val(value['harga']);
							$('#idpkt').val(value['id']);
							$('#idrolepkt2').val(value['role']);
							$('#nmpkt2').val(value['nama']);
							$('#jenispkt2').val(value['jenis']);
							$('#jmlh2').val(value['jumlah']);
							$('#hrgpkt2').val(value['harga']);
						});
					},
				});
			});

			$(document).on("change", "#jenis", function() {
				var nmsp = $("#jenis").val();
				console.log(nmsp);
				$.ajax({
					url: "page/menu/get_ajax.php",
					type: "POST",
					cache: false,
					dataType: 'json',
					data: {
						getJenis: $("#jenis").val()
					},
					success: function(response) {
						console.log(response);
						$.each(response, function(key, value) {
							// console.log(value['id_supp']);
							$('#idrole').val(value['id_role']);
						});
					},
				});
			});

			$(document).on("change", "#jenispkt", function() {
				// console.log(nmsp);
				$.ajax({
					url: "page/menu/get_ajax.php",
					type: "POST",
					cache: false,
					dataType: 'json',
					data: {
						getJenispkt: $("#jenispkt").val()
					},
					success: function(response) {
						// console.log(response);
						$.each(response, function(key, value) {
							// console.log(value['id_supp']);
							$('#idrolepkt').val(value['id_role']);
						});
					},
				});
			});

			$("#jenis").keyup(function() {
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({
						url: "fungsi/autocomplete/autocomplete.php",
						type: "POST",
						cache: false,
						data: {
							jenis: search
						},
						success: function(data) {
							console.log(data);
							$("#search-result").html(data);
							$("#search-result").fadeIn();
						},
					});
				} else {
					$("#search-result").html("");
					$("#search-result").fadeOut();
				}
			});

			$("#jenis2").keyup(function() {
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({
						url: "fungsi/autocomplete/autocomplete.php",
						type: "POST",
						cache: false,
						data: {
							jenisEdit: search
						},
						success: function(data) {
							console.log(data);
							$("#search-result3").html(data);
							$("#search-result3").fadeIn();
						},
					});
				} else {
					$("#search-result3").html("");
					$("#search-result3").fadeOut();
				}
			});

			$("#jenispkt").keyup(function() {
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({
						url: "fungsi/autocomplete/autocomplete.php",
						type: "POST",
						cache: false,
						data: {
							jenispkt: search
						},
						success: function(data) {
							// console.log(data);
							$("#search-result2").html(data);
							$("#search-result2").fadeIn();
						},
					});
				} else {
					$("#search-result2").html("");
					$("#search-result2").fadeOut();
				}
			});

			$("#jenispkt2").keyup(function() {
				var search = $(this).val();
				// console.log(search);
				if (search !== "") {
					$.ajax({
						url: "fungsi/autocomplete/autocomplete.php",
						type: "POST",
						cache: false,
						data: {
							jenispktEdit: search
						},
						success: function(data) {
							// console.log(data);
							$("#search-result4").html(data);
							$("#search-result4").fadeIn();
						},
					});
				} else {
					$("#search-result4").html("");
					$("#search-result4").fadeOut();
				}
			});
		});

		function selectJenis(val) {
			$("#jenis").val(val);
			$.ajax({
				url: "page/menu/get_ajax.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data: {
					getJenis: $("#jenis").val()
				},
				success: function(response) {
					console.log(response);
					$.each(response, function(key, value) {
						// console.log(value['id_supp']);
						$('#idrole').val(value['id_role']);
					});
				},
			});
			$("#search-result").hide();
		}

		function selectJenisEdit(val) {
			$("#jenis2").val(val);
			$.ajax({
				url: "page/menu/get_ajax.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data: {
					getJenis: $("#jenis2").val()
				},
				success: function(response) {
					console.log(response);
					$.each(response, function(key, value) {
						// console.log(value['id_supp']);
						$('#idrole2').val(value['id_role']);
					});
				},
			});
			$("#search-result3").hide();
		}

		function selectJenispkt(val) {
			$("#jenispkt").val(val);
			$.ajax({
				url: "page/menu/get_ajax.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data: {
					getJenispkt: $("#jenispkt").val()
				},
				success: function(response) {
					// console.log(response);
					$.each(response, function(key, value) {
						// console.log(value['id_supp']);
						$('#idrolepkt').val(value['id_role']);
					});
				},
			});
			$("#search-result2").hide();
		}

		function selectJenispktEdit(val) {
			$("#jenispkt2").val(val);
			$.ajax({
				url: "page/menu/get_ajax.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data: {
					getJenispkt: $("#jenispkt2").val()
				},
				success: function(response) {
					// console.log(response);
					$.each(response, function(key, value) {
						// console.log(value['id_supp']);
						$('#idrolepkt2').val(value['id_role']);
					});
				},
			});
			$("#search-result2").hide();
		}

		$('input.jnsmenu').on('change', function() {
			$('input.jnsmenu').not(this).prop('checked', false);
		});

		$(document).click(function() {
			$("#search-result").hide();
			$("#search-result2").hide();
			$("#search-result3").hide();
			$("#search-result4").hide();
		});
	</script>