<?php  
      // create database connectivity  
    include('../../db_con.php');  
    if (isset($_POST['getNmSupp'])) {  
      $nmsupp = $_POST['getNmSupp'];
      $result_array = [];
      // fetch data from student table..  
      $sql = mysqli_query($dbconnect, "SELECT * FROM supplier WHERE nama_supp = '$nmsupp'");
      if ($sql->num_rows == 1) {
        // foreach ($sql as $row) {
        //   array_push($result_array, $row);
        //   header("Content-type: application/json");
        //   echo json_encode($result_array);
        // }
        header("location:admin.php?page=supplier/supplier&pesan=samesupp");
      } else if ($sql->num_rows != 1) {
        $rand = mt_rand(0000,9999);
        $randid = 'sp'.$rand.'';
        $arrid = array('id_supp'=>"$randid");
        foreach ($arrid as $row) {
          array_push($result_array, array('id_supp'=>"$randid"));
          header("Content-type: application/json");
          echo json_encode($result_array);
        }
      }
    } else {
      // if (isset($_POST['getNmBrg']))
      // $nmbrg = $_POST['getNmBrg'];
      // $result_array = [];    
      // // fetch data from student table..  
      // $sql = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE nama_brg = '$nmbrg'");  
      // // $query = $con->query($sql);  
      // if ($sql->num_rows == 1) {
      //   foreach ($sql as $row) {
      //     array_push($result_array, $row);
      //     header("Content-type: application/json");
      //     echo json_encode($result_array);
      //   }
      // } else if ($sql->num_rows != 1) {
      //   $rand = mt_rand(0000,9999);
      //   $randid = 'sp'.$rand.'';
      //   $arrid = array('kode_brg'=>"$randid");
      //   foreach ($arrid as $row) {
      //     array_push($result_array, array('kode_brg'=>"$randid"));
      //     header("Content-type: application/json");
      //     echo json_encode($result_array);
      //   }
      // }
    }
 ?>  