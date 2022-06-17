<script>
        // $(document).ready(function() {
        //     rel = 0;


        //     $('.dcjq-parent').hover(function(){ // findind mouse postion
        //             rel = 1; // if mouse on submenu
        //         }, function(){ 
        //             rel = 0;  // if mouse out submanu
        //     });
        //     $('.sub-menu > li').live("click",function(){


        //             if(!$(this).hasClass("active")){ // if not already opened
        //                 $('.dcjq-parent').slideUp();    // hide all other submenu
        //                 $('.dcjq-parent',this).slideDown();  // show which your clicked
        //                 $(".sub-menu > li").remove('active');  //  remove all active class in li
        //                 $(this).addClass('active'); //adding active class which your clicked li
        //             }
        //             else{
        //                 if(rel==0){
        //                     $('.dcjq-parent').slideUp(); // if clicked already opend parent that will close
        //                     $(this).removeClass('active'); // remove all active class
        //                 }
        //                 else{

        //                 }
        //             }
        //     });
        // });
</script>
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
                    <a href="javascript:void(0);" class="<?php echo isset($_GET['accordion']) ? $_GET['accordion']=='on' ? 'active' : '' : ''; ?>">
                        <i class="fa fa-desktop"></i>
                        <span> Perdagangan Luar <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="<?php echo isset($_GET['page']) ? $_GET['page']=='dashboard/homeLuar' ? 'active' : '' : ''; ?>" href="admin.php?page=dashboard/homeLuar&accordion=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='brg_masuk/brg_masuk' ? 'active' : '' : ''; ?>" href="admin.php?page=brg_masuk/brg_masuk&accordion=on" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa fa-boxes-stacked"></i><span>Barang Masuk</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='brg_kembali/brg_kembali' ? 'active' : '' : ''; ?>" href="admin.php?page=brg_kembali/brg_kembali&accordion=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa fa-hand-holding-hand"></i><span>Barang Kembali</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='kasir/kasirLuar' ? 'active' : '' : ''; ?>" href="admin.php?page=kasir/kasirLuar&accordion=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa fa-cash-register"></i><span>Kasir</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='lap_penjualan/penjualanLuar' ? $_GET['active']=='yes' ? 'active' : '' : '' : '' ; ?>" href="admin.php?page=lap_penjualan/penjualanLuar&&accordion=on&active=yes"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa-solid fa-clipboard-list"></i><span>Laporan Penjualan</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='supplier/supplier' ? $_GET['active']=='yes' ? 'active' : '' : '' : '' ; ?>" href="admin.php?page=supplier/supplier&accordion=on&active=yes"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa fa-people-carry-box"></i><span>Supplier</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='user/user' ? 'active' : '' : ''; ?>" href="admin.php?page=user/user&accordion=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa fa-user-group"></i><span>User</span></a></li>
                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="javascript:void(0);" class="<?php echo isset($_GET['accordion2']) ? $_GET['accordion2']=='on' ? 'active' : '' : ''; ?>">
                      <i class="fa fa-desktop"></i>
                      <span> Perdagangan Dalam <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="<?php echo isset($_GET['page']) ? $_GET['page']=='dashboard/homeDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=dashboard/homeDalam&accordion2=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='kasir/kasirDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=kasir/kasirDalam&accordion2=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa fa-cash-register"></i><span>Kasir</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='menu/menu' ? 'active' : '' : ''; ?>" href="admin.php?page=menu/menu&accordion2=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa-solid fa-clipboard-list"></i><span>Menu</span></a></li>
                        <li><a class="<?php echo isset($_GET['page']) ? $_GET['page']=='lap_penjualan/penjualanDalam' ? 'active' : '' : ''; ?>" href="admin.php?page=lap_penjualan/penjualanDalam&accordion2=on"style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;"><i class="fa-solid fa-clipboard-list"></i><span>Laporan Penjualan</span></a></li>
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