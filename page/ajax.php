<?php
	include "db_con.php";
	$query = mysqli_query($dbconnect,"SELECT * FROM supplier WHERE nama_supp='$_GET[nama]'");
	$user = mysqli_fetch_array($query);
	$data = array(
		'idsupp' => $user['id_supp'],
		'nohp' => $user['no_hp'],
		'almt'=> $user['alamat'],
	);
    echo json_encode($data);
 ?>