<?php
if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "error1") {
                $_SESSION['error'] = 'Pilih Tanggal dan Tahun';
        }
    
        if($_GET['pesan'] == "error2") {
            $_SESSION['error'] = 'Pilih Tanggal Awal dan Tanggal Akhir';
        }
    }
?>

<script>
    $(document).ready(function () {
        $('#demo').daterangepicker({
            // locale: {
            // 	format: 'YYYY-MM-DD'
            // },
            "showDropdowns": true,
            "autoApply": true,
            "startDate": new Date(),
            "endDate": new Date(),
            "opens": "right",
            "drops": "auto"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    });
</script>
<section id="main-content" style="margin-left: 0px">
        <section class="wrapper">

          <div class="row">
            <div class="col-lg-12">
              <div class="row" style="margin-left:1pc;margin-right:1pc;">
                <h1 style="display: inline-block;">DASHBOARD PERDAGANGAN LUAR</h1>
                <h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
                <hr>
                <?php $stok = $lihat -> barang_stok_row();?>
                <?php $supp = $lihat -> supp_row();?>
                <div class="row">
                  <!--STATUS PANELS -->
                  <!-- <div class="col-md-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Supplier</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php print_r ($supp);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=supplier/supplier&accordion=on&active=yes'>Tabel Supplier  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div>
                  </div> -->
                  <!-- /col-md-3-->
                  <!-- STATUS PANELS -->
                  <!-- <div class="col-md-3">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Jumlah Stok</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($stok);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=stok/stok&accordion=on'>Tabel Barang  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div>
                  </div> -->
                  <!-- /col-md-3-->
              
                    <h4>Cari Laporan</h4>
                    <form method="post" action="scout.php?page=dashboard/scoutHomeLuar&cari=ok">
                        <table class="table table-striped">
                        <tr>
                            <th>
                            Pilih Tanggal
                            </th>
                            <th>
                            Aksi
                            </th>
                        </tr>
                        <tr>
                            <td>
                            <input name="cari" type="text" id="demo" class="form-control">
                            </td>
                            <td>
                            <input type="hidden" name="periode" value="ya">
                            <button class="btn btn-primary">
                                <i class="fa fa-search"></i> Cari
                            </button>
                            <a href="scout.php?page=dashboard/scoutHomeLuar" class="btn btn-success">
                                <i class="fa fa-refresh"></i> Refresh</a>
                            </td>
                        </tr>
                        </table>
                    </form>

                    <div class="clearfix" style="margin-top:1em;"></div>
                    <div class="clearfix" style="margin-bottom:1em; border-top:1px solid #ccc;"></div>
                    <?php 
                        $no=1; 
                        if(!empty($_GET['cari'])) {
                            $ranges = explode(' - ', $_POST['cari']);
                            $tgl1 = $ranges[0];
                            $tgl2 = $ranges[1];
                            $D1 = date("d",strtotime($tgl1));
                            $D2 = date("d",strtotime($tgl2));
                            $M1 = date("m",strtotime($tgl1));
                            $M2 = date("m",strtotime($tgl2));
                            $Y = date("Y",strtotime($tgl1));
                            // echo $tgl1;
                                if ($D1 !== $D2) {
                                        $modal = $lihat -> liveScoutModalMinggu($tgl1, $tgl2);
                                        $income = $lihat -> liveScoutIncomeMinggu($tgl1, $tgl2);
                                } else {
                                    $modal = $lihat -> liveScoutModalHari($tgl1);
                                    $income = $lihat -> liveScoutIncomeHari($tgl1);
                                }
                        } else {
                            $modal = $lihat -> modal();
                            $income = $lihat -> omsetluar();
                        }
                    ?>
                    <!-- STATUS PANELS -->
                  <div class="col-md-3">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h5><i class="fa fa-desktop"></i> Penjualan Hari ini</h5>
                      </div>
                      <div class="panel-body">
                        <center><h1><?php echo ($modal);?></h1></center>
                      </div>
                      <div class="panel-footer">
                        <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='scout.php?page=lap_scout/penjualanLuar'>Tabel laporan  <i class='fa fa-angle-double-right'></i></a></h4>
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
                        <h4 style="font-size:15px;font-weight:700;"><a href='scout.php?page=lap_scout/penjualanLuar'>Tabel Laporan  <i class='fa fa-angle-double-right'></i></a></h4>
                      </div>
                    </div><!--/grey-panel -->
                  </div><!-- /col-md-3-->
                </div>
              </div>
            </div><!-- /col-lg-9 END SECTION MIDDLE -->
            <a href="scout.php" class="btn btn-warning btn-md " style="margin-left: 2em ;">Kembali</a>    
                
    <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->                  

          </div><! --/row -->
        </section>