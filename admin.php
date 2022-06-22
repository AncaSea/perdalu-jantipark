<?php
@ob_start();
session_start();

// if(!empty($_SESSION['admin'])){
    require 'db_con.php';
    include $view;
    $lihat = new view($dbconnect);
    //  admin
        include 'pageAdmin/header.php';
        include 'pageAdmin/sidebar.php';
            if(!empty($_GET['page'])){
                include 'page/'.$_GET['page'].'.php';
            } else if (!empty($_GET['pageAdmin'])) {
                include 'pageAdmin/'.$_GET['pageAdmin'].'.php';
            } else {
                // include 'pageAdmin/home.php';
            }
        include 'pageAdmin/footer.php';
    // end admin
// }else{
//     echo '<script>window.location="login.php";</script>';
// }
?>