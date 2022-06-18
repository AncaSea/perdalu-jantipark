<?php  
      // create database connectivity  
      include('../../db_con.php');  
      if (isset($_POST['editNm'])) {  
           $editNm = $_POST['editNm'];
           $result_array = [];    
      // fetch data from student table..  
      $mkn = mysqli_query($dbconnect, "SELECT * FROM makanan WHERE nama = '$editNm'");  
      $mnm = mysqli_query($dbconnect, "SELECT * FROM minuman WHERE nama = '$editNm'");  
      $pkt = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE nama = '$editNm'");  
    //   $query = $con->query($sql);  
      if ($mkn->num_rows > 0) {
        foreach ($mkn as $row) {
          array_push($result_array, $row);
          header("Content-type: application/json");
          echo json_encode($result_array);
        }  
      } else if ($mnm->num_rows > 0) {
        foreach ($mnm as $row) {
          array_push($result_array, $row);
          header("Content-type: application/json");
          echo json_encode($result_array);
        }   
      } else {
        foreach ($pkt as $row) {
          array_push($result_array, $row);
          header("Content-type: application/json");
          echo json_encode($result_array);
        }
      }
    }
 ?>  