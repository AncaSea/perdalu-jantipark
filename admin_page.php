<?php
include 'db_con.php';
include $view;
$lihat = new view($dbconnect);
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Kasir PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    
    <!--external css-->
    <link href="assets/font-awesome/css/all.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link href="assets/css/style-responsive.css" rel="stylesheet"> -->

        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    .header{
      background:#328f6b;
      color:#fff;}
		#main-content{
       background:#fff;}
		#hidden{
      display:none}
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <section id="container">
      <header class="header black-bg">
                  <div class="sidebar-toggle-box">
                      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                  </div>
                <!--logo start-->
                <a href="admin_page.php" class="logo"><b>Janti Park</b> <small style="padding-left:5px;font-size:13px;">Ngendo, Janti, Kecamatan Polanharjo, Kabupaten Klaten, Jawa Tengah 57474</small></a>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                      
                    <!--  notification end -->
                </div>
                <div class="top-menu">
                  <ul class="nav pull-right top-menu">
                        <li><a class="logout" onclick="javascript: return confirm('Ingin Logout ?');" href="logout.php">Logout</a></li>
                  </ul>
                </div>
            </header>
    <aside>
        <div id="sidebar"  class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a><img src="assets/img/user/unnamed.jpg" class="img-circle" width="100" height="100"></a></p>
                <h5 class="centered">Admin</h5>
                <h5 class="centered">kosek</h5>
                  
                <li class="mt">
                    <a href="admin_page.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                  <!-- <a href="javascript:;">
                      <i class="fa fa-desktop"></i>
                      <span>Master <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                  </a> -->
                  <li class="sub">
                      <li><a href="page/barang_masuk.php"><i class="fa fa-boxes-stacked"></i><span>Barang Masuk</span></a></li>
                      <li><a href="page/barang_kembali.php"><i class="fa fa-hand-holding-hand"></i><span>Barang Kembali</span></a></li>
                    </li>
                  </li>
                  <li class="sub-menu">
                    <!-- <a href="javascript:;" >
                      <i class="fa fa-desktop"></i>
                      <span>Transaksi <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a> -->
                    <li class="sub">
                      <li><a href="page/penjualan.php"><i class="fa-solid fa-clipboard-list"></i><span>Laporan Penjualan</span></a></li>
                      <li><a href="page/supplier.php"><i class="fa fa-people-carry-box"></i><span>Supplier</span></a></li>
                      <li><a href="page/user.php"><i class="fa fa-user-group"></i><span>User</span></a></li>
                    </li>
                </li>
                <!-- <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-cog"></i>
                        <span>Setting <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin_page?page=pengaturan">Pengaturan Toko</a></li>
                    </ul>
                </li> -->
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">

          <div class="row">
            <div class="col-lg-9">
              <div class="row" style="margin-left:1pc;margin-right:1pc;">
                <h1>DASHBOARD</h1>
                <hr>
                <?php $income = $lihat -> omsetdlm();?>
                <?php $stok = $lihat -> barang_stok_row();?>
                <?php $jual = $lihat -> jual_row();?>
                <?php $supp = $lihat -> supp_row();?>
                <div class="row">
                  <!--STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Supplier</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php print_r ($supp);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='page/supplier.php'>Tabel Supplier  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                  <!-- STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Jumlah Stok</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($stok);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='page/barang.php'>Tabel Barang  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                  <!-- STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Penjualan Hari ini</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($jual);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='page/penjualan.php'>Tabel laporan  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                  <div class="col-md-3">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Income Hari ini</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($income);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='page/penjualan.php'>Tabel Laporan  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                </div>
              </div>
            </div><!-- /col-lg-9 END SECTION MIDDLE -->
                
    <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->                  
                
          <div class="col-lg-3 ds">
            <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div><!-- / calendar -->
            </div><!-- /col-lg-3 -->
          </div><! --/row -->
        </section>
        <!-- <div class="clearfix" style="margin-top:25.5vh;"></div> -->
        <!--main content end-->
            <!--footer start-->
            <div >
              <footer class="footer">
                <div class="site-footer">
                  <div class="text-center">
                      <?php echo date('Y');?> - Sistem Penjualan Barang Berbasis Web | Perdangan Luar Janti Park
                      <a href="#" class="go-top">
                          <i class="fa fa-angle-up"></i>
                      </a>
                  </div>
                </div>
              </footer>
            </div>
            <!--footer end-->
      </section>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

	<script src="assets/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/datatables/dataTables.bootstrap.min.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
		//datatable
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable();
		});
	</script>	

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "",
                    modal: true
                },
                legend: [  ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
        
        
        //angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
		$(document).ready(function(){setTimeout(function(){$(".alert-danger").fadeIn('slow');}, 500);});
		//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
		setTimeout(function(){$(".alert-danger").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-success").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);

		$(document).ready(function(){setTimeout(function(){$(".alert-warning").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".alert-success").fadeOut('slow');}, 5000);
		
    </script>
		<script>
			$(".modal-create").hide();
			$(".bg-shadow").hide();
			$(".bg-shadow").hide();
			function clickModals(){
				$(".bg-shadow").fadeIn();
				$(".modal-create").fadeIn();
			}
			function cancelModals(){
				$('.modal-view').fadeIn();
				$(".modal-create").hide();
				$(".bg-shadow").hide();
			}
		</script>
</body>
</html>