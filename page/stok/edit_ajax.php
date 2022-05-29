<?php
if (isset($_POST['kd'])) {
	include ('db_con.php');
	$kode = $_POST['kd'];//define the employee ID


	// Set the INSERT SQL data
	$sql = mysqli_query($dbconnect, "SELECT * FROM stok_brg WHERE kode_brg='$kode'");

	// Process the query so that we will save the date of birth
	// $results = $mysqli->query($sql);

	// Fetch Associative array
	$row = mysqli_fetch_all($sql);

	// Free result set
	// $sql->free_result();

	// Close the connection after using it
	// $mysqli->close();

	echo json_encode($row);
}
?>