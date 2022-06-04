<?php  
      // create database connectivity  
      include('../../db_con.php');  
      if (isset($_POST['editId'])) {  
           $editId = $_POST['editId'];
           $result_array = [];    
      // fetch data from student table..  
      $sql = mysqli_query($dbconnect, "SELECT * FROM supplier WHERE id_supp = '$editId'");  
    //   $query = $con->query($sql);  
      if ($sql->num_rows > 0) {
        foreach ($sql as $row) {
          array_push($result_array, $row);
          header("Content-type: application/json");
          echo json_encode($result_array);
        }  
      } else {
        
        // echo $return; 
      }
    }
 ?>  