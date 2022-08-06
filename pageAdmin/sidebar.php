<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a><img src="assets/img/user/logo.png" class="img-rectangle" width="100px" height="100px"></a></p>
            <h5 class="centered">Admin</h5>
            <h5 class="centered"><?= $_SESSION['namaadmin'] ?></h5>

            <li class="mt">
                <a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'dashboard/home' ? 'active' : '' : ''; ?>" href="admin.php?page=dashboard/home">
                    <i class="fa fa-dashboard <?php if ($_GET['page'] == 'dashboard/home') echo 'fa-fade'; ?>"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="mt" style="margin-top: 0">
                <a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'reservasi/reservasi' ? 'active' : '' : ''; ?>" href="admin.php?page=reservasi/reservasi">
                    <i class="fa fa-ticket <?php if ($_GET['page'] == 'reservasi/reservasi') echo 'fa-fade'; ?>"></i>
                    <span>Reservasi</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:void(0);" class="<?php echo isset($_GET['accordion']) ? $_GET['accordion'] == 'on' ? 'active' : '' : ''; ?>">
                    <i class="fa fa-desktop"></i>
                    <span> Perdagangan Luar <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                </a>
                <ul class="sub">
                    <li>
                        <a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'dashboard/homeLuar' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=dashboard/homeLuar&accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-dashboard <?php if ($_GET['page'] == 'dashboard/homeLuar') echo 'fa-fade'; ?>"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'brg_masuk/brg_masuk' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=brg_masuk/brg_masuk&accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-boxes-stacked <?php if ($_GET['page'] == 'brg_masuk/brg_masuk') echo 'fa-fade'; ?>"></i><span>Barang Masuk</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'brg_kembali/brg_kembali' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=brg_kembali/brg_kembali&accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-hand-holding-hand <?php if ($_GET['page'] == 'brg_kembali/brg_kembali') echo 'fa-fade'; ?>"></i><span>Barang Kembali</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'kasir/kasirLuar' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=kasir/kasirLuar& accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-cash-register <?php if ($_GET['page'] == 'kasir/kasirLuar') echo 'fa-fade'; ?>"></i><span>Kasir</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'lap_penjualan/penjualanLuar' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=lap_penjualan/penjualanLuar&accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fas fa-balance-scale <?php if ($_GET['page'] == 'lap_penjualan/penjualanLuar') echo 'fa-fade'; ?>"></i><span>Laporan Penjualan</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'supplier/supplier' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=supplier/supplier&accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-people-carry-box <?php if ($_GET['page'] == 'supplier/supplier') echo 'fa-fade'; ?>"></i><span>Supplier</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'user/user' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=user/user&accordion=on&active=yes" style="padding-top: 1px;margin-right: 0.5em; border-width:1px;border-color: #9b6d02;    border-radius: 0px 0px 5px 5px">
                            <i class="fa fa-user-group <?php if ($_GET['page'] == 'user/user') echo 'fa-fade'; ?>"></i><span>User</span></a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:void(0);" class="<?php echo isset($_GET['accordion2']) ? $_GET['accordion2'] == 'on' ? 'active' : '' : ''; ?>">
                    <i class="fa fa-desktop"></i>
                    <span> Perdagangan Dalam <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                </a>
                <ul class="sub">
                    <li>
                        <a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'dashboard/homeDalam' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=dashboard/homeDalam&accordion2=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-dashboard <?php if ($_GET['page'] == 'dashboard/homeDalam') echo 'fa-fade'; ?>"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'kasir/kasirDalam' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=kasir/kasirDalam&accordion2=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa fa-cash-register <?php if ($_GET['page'] == 'kasir/kasirDalam') echo 'fa-fade'; ?>"></i><span>Kasir</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'menu/menu' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=menu/menu&accordion2=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa-solid fa-clipboard-list <?php if ($_GET['page'] == 'menu/menu') echo 'fa-fade'; ?>"></i><span>Menu</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'role/role' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=role/role&accordion2=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fas fa-layer-group fa-3x <?php if ($_GET['page'] == 'role/role') echo 'fa-fade'; ?>"></i><span>Role</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'lap_penjualan/penjualanDalam' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=lap_penjualan/penjualanDalam&accordion2=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;border-width:1px;border-color: #9b6d02;border-radius: 0px 0px 5px 5px">
                            <i class='fas fa-balance-scale <?php if ($_GET['page'] == 'lap_penjualan/penjualanDalam') echo 'fa-fade'; ?>'></i><span>Laporan Penjualan</span></a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:void(0);" class="<?php echo isset($_GET['accordion3']) ? $_GET['accordion3'] == 'on' ? 'active' : '' : ''; ?>">
                    <i class="fa fa-gears"></i>
                    <span> Backup and Restore <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                </a>
                <ul class="sub">
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'backuprestore/backup-data' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=backuprestore/backup-data&accordion3=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa-solid fa-download <?php if ($_GET['page'] == 'backuprestore/backup-data') echo 'fa-fade'; ?>"></i><span>Backup Database</span></a></li>
                    <li><a class="<?php echo isset($_GET['page']) ? $_GET['page'] == 'backuprestore/restore-data' ? $_GET['active'] == 'yes' ? 'active' : '' : '' : ''; ?>" href="admin.php?page=backuprestore/restore-data&accordion3=on&active=yes" style="padding-top: 1px;margin-right: 0.5em;  border-style: ridge;border-width:1px;border-color: #9b6d02;">
                            <i class="fa-solid fa-cloud-arrow-up <?php if ($_GET['page'] == 'backuprestore/restore-data') echo 'fa-fade'; ?>"></i><span>Restore Database</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>