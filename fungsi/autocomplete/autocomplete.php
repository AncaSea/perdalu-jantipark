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
    }
?>