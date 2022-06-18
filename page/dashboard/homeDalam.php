<section id="main-content">
        <section class="wrapper">

          <div class="row">
            <div class="col-lg-12">
              <div class="row" style="margin-left:1pc;margin-right:1pc;">
                <h1 style="display: inline-block;">DASHBOARD PERDAGANGAN DALAM</h1>
                <h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
                <hr>
                <?php $income = $lihat -> omsetdlm();?>
                <?php $livelele = $lihat -> live_lele();?>
                <?php $livenila = $lihat -> live_nila();?>
                <?php $liveayam = $lihat -> live_ayam();?>
                <div class="row">
                  <!--STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Penjualan Lele</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($livelele);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=supplier/supplier'>Tabel Supplier  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                  <!-- STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Penjualan Nila</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($livenila);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=stok/stok&accordion2=on'>Tabel Barang  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                  <!-- STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Penjualan Ayam</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($liveayam);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='admin.php?page=lap_penjualan/penjualan&accordion2=on'>Tabel laporan  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                  <div class="col-md-3">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Penjualan Hari ini</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($income);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=lap_penjualan/penjualan&accordion2=on'>Tabel Laporan  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                </div>
              </div>
            </div><!-- /col-lg-9 END SECTION MIDDLE -->
                
    <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->                  

          </div><! --/row -->
        </section>