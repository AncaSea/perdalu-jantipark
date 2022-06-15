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
        } else {
            echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        }
    }

    if (isset($_POST['kasirdlm'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['kasirdlm']);

            $query = "SELECT nama FROM makanan WHERE makanan.nama LIKE '%".$search."%' UNION
                     SELECT nama FROM minuman WHERE minuman.nama LIKE '%".$search."%' UNION 
                     SELECT nama FROM paket_barbar WHERE paket_barbar.nama like '%".$search."%'";
            $result = mysqli_query($dbconnect,$query);
            $response = array();
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result) ){
                    
                    echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama"].'")\'>'.$row["nama"].'</li>';
                    
                }
            } else {
                echo '<li class="auto-kasir">Data tidak ditemukan</li>';
            }
        
        // $sql = mysqli_query($dbconnect, "SELECT * FROM makanan");
        // $cek = mysqli_fetch_assoc($sql);

        // $sql2 = mysqli_query($dbconnect, "SELECT * FROM minuman");
        // $cek2 = mysqli_fetch_assoc($sql2);

        // if ($search = $cek['nama']) {
        //     $query = "SELECT * FROM makanan WHERE nama like'%".$search."%'";
        //     $result = mysqli_query($dbconnect,$query);
        //     $response = array();
        //     if (mysqli_num_rows($result) > 0) {
        //         while($row = mysqli_fetch_array($result) ){
                    
        //             echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama"].'")\'>'.$row["nama"].'</li>';
                    
        //         }
        //     } else {
        //         echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        //     }
        // } else if ($search = $cek2['nama']) {
        //     $query = "SELECT * FROM minuman WHERE nama like'%".$search."%'";
        //     $result = mysqli_query($dbconnect,$query);
        //     $response = array();
        //     if (mysqli_num_rows($result) > 0) {
        //         while($row = mysqli_fetch_array($result) ){
                    
        //             echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama"].'")\'>'.$row["nama"].'</li>';
                    
        //         }
        //     } else {
        //         echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        //     }
        // } else {
        //     $query = "SELECT * FROM paket_barbar WHERE nama like'%".$search."%'";
        //     $result = mysqli_query($dbconnect,$query);
        //     $response = array();
        //     if (mysqli_num_rows($result) > 0) {
        //         while($row = mysqli_fetch_array($result) ){
                    
        //             echo '<li class="auto-kasir" onClick=\'selectBarang("'.$row["nama"].'")\'>'.$row["nama"].'</li>';
                    
        //         }
        //     } else {
        //         echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        //     }
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
        } else {
            echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        }
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
        } else {
            echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        }
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
        } else {
            echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        }
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
        } else {
            echo '<li class="auto-kasir">Data tidak ditemukan</li>';
        }
    }
?>