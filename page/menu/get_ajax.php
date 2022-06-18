<?php  
      // create database connectivity  
    include('../../db_con.php');  
    if (isset($_POST['getJenis'])) {  
      $nmjenis = $_POST['getJenis'];
      $result_array = [];
      // fetch data from student table..  
      $mkn = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmjenis'");
      // $mnm = mysqli_query($dbconnect, "SELECT * FROM minuman WHERE jenis = '$jenis'");
      // $query = $con->query($sql);
      if ($mkn->num_rows == 1) {
        foreach ($mkn as $row) {
          array_push($result_array, $row);
          header("Content-type: application/json");
          echo json_encode($result_array);
        }
      }
    } else if (isset($_POST['getJenispkt'])) {
      $nmjenispkt = $_POST['getJenispkt'];
      $result_array = [];
      // fetch data from student table..  
      $pkt = mysqli_query($dbconnect, "SELECT * FROM role WHERE nama = '$nmjenispkt'");
      // $query = $con->query($sql);
      if ($pkt->num_rows == 1) {
        foreach ($pkt as $row) {
          array_push($result_array, $row);
          header("Content-type: application/json");
          echo json_encode($result_array);
        }
      }
    } 
    // else if (isset($_POST['getNmBrg'])) {
    //   $nmbrg = $_POST['getNmBrg'];
    //   $result_array = [];    
    //   // fetch data from student table..  
    //   $sql = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE nama_brg = '$nmbrg'");  
    //   // $query = $con->query($sql);  
    //   if ($sql->num_rows == 1) {
    //     foreach ($sql as $row) {
    //       array_push($result_array, $row);
    //       header("Content-type: application/json");
    //       echo json_encode($result_array);
    //     }
    //   }
    //   else if ($sql->num_rows != 1) {
    //     $rand = mt_rand(0000,9999);
    //     $randid = 'sp'.$rand.'';
    //     $arrid = array('kode_brg'=>"$randid");
    //     foreach ($arrid as $row) {
    //       array_push($result_array, array('kode_brg'=>"$randid"));
    //       header("Content-type: application/json");
    //       echo json_encode($result_array);
    //     }
    //   }
    // }
 ?>  