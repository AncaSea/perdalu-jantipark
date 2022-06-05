<?php
    include '../../db_con.php';
    $term = mysqli_real_escape_string($dbconnect,$_GET['term']);
    $sql = "SELECT * FROM stok_brg WHERE nama_brg LIKE '$term%'";
    $query = mysqli_query($dbconnect, $sql);
    $result = [];
    while($data = mysqli_fetch_array($query))
    {
        $result[] = $data['nama_brg'];
    }
    echo json_encode($result);
?>