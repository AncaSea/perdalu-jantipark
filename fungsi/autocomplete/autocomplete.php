<?php
    include '../../db_con.php';
    if (isset($_POST['kasir'])) {
        $search = mysqli_real_escape_string($dbconnect,$_POST['kasir']);

        $query = "SELECT * FROM stok_brg WHERE nama_brg like'%".$search."%'";
        $result = mysqli_query($dbconnect,$query);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result) ){
              $response = $row['nama_brg'];
            }
        } else {
            $response = "empty";
        }
       
        echo json_encode($response);
    }
    
    // $term = mysqli_real_escape_string($dbconnect,$_GET['term']);
    // $sql = "SELECT * FROM stok_brg WHERE nama_brg LIKE '$term%'";
    // $query = mysqli_query($dbconnect, $sql);
    // $result = [];
    // while($data = mysqli_fetch_array($query))
    // {
    //     $result[] = $data['nama_brg'];
    // }
    // echo json_encode($result);
?>