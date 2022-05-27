<aside>
        <div id="sidebar"  class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a><img src="assets/img/user/unnamed.jpg" class="img-circle" width="100" height="100"></a></p>
                <h5 class="centered">Admin</h5>
                <h5 class="centered"><?=$_SESSION['namaadmin']?></h5>
                  
                <li class="mt">
                    <a href="admin.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- <li class="sub-menu"> -->
                  <!-- <a href="javascript:;">
                      <i class="fa fa-desktop"></i>
                      <span>Master <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                  </a> -->
                  <!-- <li class="sub"> -->
                      <li><a href="admin.php?page=brg_masuk/brg_masuk"><i class="fa fa-boxes-stacked"></i><span>Barang Masuk</span></a></li>
                      <li><a href="admin.php?page=brg_kembali/brg_kembali"><i class="fa fa-hand-holding-hand"></i><span>Barang Kembali</span></a></li>
                      <li><a href="admin.php?pageAdmin=kasir"><i class="fa fa-cash-register"></i><span>Kasir</span></a></li>
                    <!-- </li> -->
                  <!-- </li> -->
                  <!-- <li class="sub-menu"> -->
                    <!-- <a href="javascript:;" >
                      <i class="fa fa-desktop"></i>
                      <span>Transaksi <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a> -->
                    <!-- <li class="sub"> -->
                      <li><a href="admin.php?page=lap_penjualan/penjualan"><i class="fa-solid fa-clipboard-list"></i><span>Laporan Penjualan</span></a></li>
                      <li><a href="admin.php?page=supplier/supplier"><i class="fa fa-people-carry-box"></i><span>Supplier</span></a></li>
                      <li><a href="admin.php?page=user/user"><i class="fa fa-user-group"></i><span>User</span></a></li>
                    <!-- </li> -->
                <!-- </li> -->
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