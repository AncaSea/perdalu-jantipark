<?php  
      // create database connectivity  
      include('../../db_con.php');  
      if (isset($_POST['editId'])) {  
           $editId = $_POST['editId'];
           $result_array = [];    
      // fetch data from student table..  
      $mkn = mysqli_query($dbconnect, "SELECT * FROM makanan WHERE nama = '$editId'");  
      $mnm = mysqli_query($dbconnect, "SELECT * FROM minuman WHERE nama = '$editId'");  
      $pkt = mysqli_query($dbconnect, "SELECT * FROM paket_barbar WHERE nama = '$editId'");  
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