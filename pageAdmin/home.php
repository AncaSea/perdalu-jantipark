<section id="main-content">
        <section class="wrapper">

          <div class="row">
            <div class="col-lg-9">
              <div class="row" style="margin-left:1pc;margin-right:1pc;">
                <h1>DASHBOARD</h1>
                <hr>
                <?php $income = $lihat -> omset();?>
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
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=supplier'>Tabel Supplier  <i class='fa fa-angle-double-right'></i></a></h4>
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
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=stok'>Tabel Barang  <i class='fa fa-angle-double-right'></i></a></h4>
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
                        <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='admin.php?page=penjualan'>Tabel laporan  <i class='fa fa-angle-double-right'></i></a></h4>
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
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=penjualan'>Tabel Laporan  <i class='fa fa-angle-double-right'></i></a></h4>
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