<aside>
        <div id="sidebar"  class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a><img src="assets/img/user/ppp.png" class="img-circle" width="100" height="100"></a></p>
                <h5 class="centered">Admin</h5>
                <h5 class="centered"><?=$_SESSION['namaadmin']?></h5>
                  
                <li class="mt">
                    <a class="<?php echo $_SERVER['REQUEST_URI'] == "/admin.php" ? 'active' : ''; ?>" href="admin.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-desktop"></i>
                        <span> Perdagangan Luar <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="<?php echo isset($_GET['page']) ? $_GET['page']=='dashboard/homeLuar' ? 'active' : '' : ''; ?>" href="admin.php?page=dashboard/homeLuar">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='brg_masuk/brg_masuk' ? 'active' : '' : ''; ?>" href="admin.php?page=brg_masuk/brg_masuk"><i class="fa fa-boxes-stacked"></i><span>Barang Masuk</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='brg_kembali/brg_kembali' ? 'active' : '' : ''; ?>" href="admin.php?page=brg_kembali/brg_kembali"><i class="fa fa-hand-holding-hand"></i><span>Barang Kembali</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='kasir/kasirLuar' ? 'active' : '' : ''; ?>" href="admin.php?page=kasir/kasirLuar"><i class="fa fa-cash-register"></i><span>Kasir</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='lap_penjualan/penjualanLuar' ? 'active' : '' : ''; ?>" href="admin.php?page=lap_penjualan/penjualanLuar"><i class="fa-solid fa-clipboard-list"></i><span>Laporan Penjualan</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='supplier/supplier' ? 'active' : '' : ''; ?>" href="admin.php?page=supplier/supplier"><i class="fa fa-people-carry-box"></i><span>Supplier</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='user/user' ? 'active' : '' : ''; ?>" href="admin.php?page=user/user"><i class="fa fa-user-group"></i><span>User</span></a></li>
                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="javascript:;" >
                      <i class="fa fa-desktop"></i>
                      <span> Perdagangan Dalam <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="<?php echo isset($_GET['page']) ? $_GET['page']=='dashboard/homeDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=dashboard/homeDalam">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='kasir/kasirDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=kasir/kasirDalam"><i class="fa fa-cash-register"></i><span>Kasir</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='kasir/kasirDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=menu/menu"><i class="fa-solid fa-clipboard-list"></i><span>Menu</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='lap_penjualan/penjualanDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=lap_penjualan/penjualanDalam"><i class="fa-solid fa-clipboard-list"></i><span>Laporan Penjualan</span></a></li>
                    </ul>
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
    <script>
        $(document).ready(function() {
            // Get saved data from sessionStorage
            let selectedCollapse = sessionStorage.getItem('selectedCollapse');
            if(selectedCollapse != null) {
                $('.accordion .collapse').removeClass('show');
                $(selectedCollapse).addClass('show');
            }
            //To set, which one will be opened
            $('.accordion .btn-link').on('click', function(){ 
                let target = $(this).data('target');
                //Save data to sessionStorage
                sessionStorage.setItem('selectedCollapse', target);
            });
        });
    </script>