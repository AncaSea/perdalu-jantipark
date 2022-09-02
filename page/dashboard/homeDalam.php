<script>
  $(document).ready(function() {
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
<section id="main-content">
  <section class="wrapper">

    <div class="row">
      <div class="col-lg-12">
        <div class="row" style="margin-left:1pc;margin-right:1pc;">
          <h1 style="display: inline-block;">DASHBOARD PERDAGANGAN DALAM</h1>
          <h4 style="float: right; display: inline-block; margin-top: 2pc"><?php echo date('d F Y'); ?></h4>
          <hr>
          <?php $income = $lihat->omsetdlm(); ?>
          <?php $livelele = $lihat->live_lele(); ?>
          <?php $livenila = $lihat->live_kakap(); ?>
          <?php $liveayam = $lihat->live_ayam(); ?>
          <div class="row">
            <!--STATUS PANELS -->
            <div class="col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h5><i class="fa fa-desktop"></i> Penjualan Lele</h5>
                </div>
                <div class="panel-body">
                  <center>
                    <h1><?php echo ($livelele); ?></h1>
                  </center>
                </div>
                <div class="panel-footer">
                  <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes'>Tabel Laporan <i class='fa fa-angle-double-right'></i></a></h4>
                </div>
              </div>
              <!--/grey-panel -->
            </div><!-- /col-md-3-->
            <!-- STATUS PANELS -->
            <div class="col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h5><i class="fa fa-desktop"></i> Penjualan Kakap</h5>
                </div>
                <div class="panel-body">
                  <center>
                    <h1><?php echo ($livenila); ?></h1>
                  </center>
                </div>
                <div class="panel-footer">
                  <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes'>Tabel Laporan <i class='fa fa-angle-double-right'></i></a></h4>
                </div>
              </div>
              <!--/grey-panel -->
            </div><!-- /col-md-3-->
            <!-- STATUS PANELS -->
            <div class="col-md-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h5><i class="fa fa-desktop"></i> Penjualan Ayam</h5>
                </div>
                <div class="panel-body">
                  <center>
                    <h1><?php echo ($liveayam); ?></h1>
                  </center>
                </div>
                <div class="panel-footer">
                  <h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='admin.php?page=lap_penjualan/penjualanDalam&accordion2=on'>Tabel Laporan <i class='fa fa-angle-double-right'></i></a></h4>
                </div>
              </div>
              <!--/grey-panel -->
            </div><!-- /col-md-3-->
            <div class="col-md-3">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h5><i class="fa fa-desktop"></i> Penjualan Hari ini</h5>
                </div>
                <div class="panel-body">
                  <center>
                    <h1><?php echo ($income); ?></h1>
                  </center>
                </div>
                <div class="panel-footer">
                  <h4 style="font-size:15px;font-weight:700;"><a href='admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes'>Tabel Laporan <i class='fa fa-angle-double-right'></i></a></h4>
                </div>
              </div>
              <!--/grey-panel -->
            </div><!-- /col-md-3-->
          </div>
        </div>
      </div><!-- /col-lg-9 END SECTION MIDDLE -->
      <div class="col-lg-12">
        <div class="clearfix" style="margin-top:1em;"></div>

        <h4>Cari Laporan</h4>
        <form method="post" action="admin.php?page=dashboard/homeDalam&accordion2=on&active=yes&cari=ok">
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
                <a href="admin.php?page=dashboard/homeDalam&accordion2=on&active=yes" class="btn btn-success">
                  <i class="fa fa-refresh"></i> Refresh</a>
              </td>
            </tr>
          </table>
        </form>

        <div class="clearfix" style="margin-top:1em;"></div>
        <div class="clearfix" style="border-top:1px solid #ccc;"></div>

        <br />
        <br />
        <!-- view barang -->
        <div class="modal-view">
          <table class="table table-bordered" id="example1">
            <thead>
              <tr style="background:#FFF000;color:#333;">
                <th style="width:10%;"> No.</th>
                <!-- <th style="width:10%;"> No Nota</th>
                      <th> Nama Kasir</th>
                      <th> Tgl Penjualan</th> -->
                <!-- <th> Nama Pesanan</th> -->
                <th style="width:20%;"> jenis</th>
                <th style="width:20%;"> Jumlah Terjual</th>
                <!-- <th> Harga Jual</th> -->
                <!-- <th> Harga</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              if (!empty($_GET['cari'])) {
                $ranges = explode(' - ', $_POST['cari']);
                $tgl1 = $ranges[0];
                $tgl2 = $ranges[1];
                $D1 = date("d", strtotime($tgl1));
                $D2 = date("d", strtotime($tgl2));
                $M1 = date("m", strtotime($tgl1));
                $M2 = date("m", strtotime($tgl2));
                $Y = date("Y", strtotime($tgl1));
                // echo $tgl1;
                if ($D1 !== $D2) {
                  $no = 1;
                  $omset = 0;
                  $jumlah = 0;
                  $cekdata = $lihat->liveminggu_jualdlm($tgl1, $tgl2);
                  if (!empty($cekdata)) {
                    $hasil = $cekdata;
                  } else {
                    $hasil = [];
                  }
                  $transaksi = $lihat->livelaptransminggudlm($tgl1, $tgl2);
                } else {
                  $no = 1;
                  $jumlah = 0;
                  $omset = 0;
                  $cekdata = $lihat->livehari_jualdlm($tgl1);
                  // print_r($cekdata);
                  if (!empty($cekdata)) {
                    $hasil = $cekdata;
                  } else {
                    $hasil = [];
                  }
                  $transaksi = $lihat->livelaptransharidlm($tgl1);
                }
              } else {
                $cekdata = $lihat->livejualdlm();
                if (!empty($cekdata)) {
                  $hasil = $cekdata;
                } else {
                  $hasil = [];
                }
                $transaksi = $lihat->livetransdlm();
              }
              ?>
              <?php
              $omset = 0;
              $jumlah = 0;
              // error_reporting(E_ERROR | E_PARSE);
              foreach ($hasil as $isi) {
                // print_r($isi);
                // $omset += $isi[10];
                // $modal += $isi['harga_beli']* $isi['jumlah'];
                // $jumlah += $isi['jumlah'];
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <!-- <td><?php echo $isi[1]; ?></td> -->
                  <!-- <td><?php echo $isi[3]; ?></td> -->
                  <!-- <td><?php echo $isi[4]; ?> </td> -->
                  <!-- <td><?php echo $isi[5]; ?> </td> -->
                  <td><?php echo $isi[0]; ?> </td>
                  <td><?php echo $isi[1]; ?> </td>
                  <!-- <td>Rp.<?php echo number_format($isi[10]); ?>,-</td> -->
                  <!-- <td>Rp.<?php echo number_format($isi[11]); ?>,-</td> -->
                </tr>
              <?php $no++;
              } ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2">Total Terjual</th>
                <th><?php echo $transaksi; ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->

    </div> <!-- /row -->
  </section>