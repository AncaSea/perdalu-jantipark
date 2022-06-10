<?php
    include '../../db_con.php';
    if (isset($_POST['kasir'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['kasir']);

        $query = "SELECT * FROM stok_brg WHERE nama_brg like'%".$search."%'";
        $result = mysqli_query($dbconnect,$query);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result) ){
                
                echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama_brg"].'")\'>'.$row["nama_brg"].'</li>';
                
            }
        }
        // else {
        //     echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        // }
    }

    if (isset($_POST['brgmsk'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['brgmsk']);

        $query = "SELECT * FROM supplier WHERE nama_supp like'%".$search."%'";
        $result = mysqli_query($dbconnect,$query);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result) ){
                echo '<li style="list-item:none" class="auto-kasir" onClick=\'selectSupp("'.$row["nama_supp"].'")\'>'.$row["nama_supp"].'</li>';
            }
            // while($row = mysqli_fetch_array($result) ){
            //     $response[] = array('label'=>$row['nama_supp']);
            // }
            //   print_r ($response);
            //   echo json_encode($response);
        }
        // else {
        //     echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        // }
    }

    if (isset($_POST['brgmsk2'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['brgmsk2']);

        $query = "SELECT * FROM stok_brg WHERE nama_brg like'%".$search."%'";
        $result = mysqli_query($dbconnect,$query);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result) ){
                
                echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama_brg"].'")\'>'.$row["nama_brg"].'</li>';
                
            }
        } 
        // else {
        //     echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        // }
    }

    if (isset($_POST['brgkmbl'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['brgkmbl']);

        $query = "SELECT * FROM supplier WHERE nama_supp like'%".$search."%'";
        $result = mysqli_query($dbconnect,$query);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result) ){
                echo '<li style="list-item:none" class="auto-kasir" onClick=\'selectSupp("'.$row["nama_supp"].'")\'>'.$row["nama_supp"].'</li>';
            }
            // while($row = mysqli_fetch_array($result) ){
            //     $response[] = array('label'=>$row['nama_supp']);
            // }
            //   print_r ($response);
            //   echo json_encode($response);
        } 
        // else {
        //     echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        // }
    }

    if (isset($_POST['brgkmbl2'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['brgkmbl2']);

        $query = "SELECT * FROM stok_brg WHERE nama_brg like'%".$search."%'";
        $result = mysqli_query($dbconnect,$query);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result) ){
                
                echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama_brg"].'")\'>'.$row["nama_brg"].'</li>';
                
            }
        } 
        // else {
        //     echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        // }
    }
?>