<?php
				include 'db_con.php';
				
				$nmsupp = $_REQUEST["supp_id"];

				if ($nmsupp !== "") {
					$sql = mysqli_query($dbconnect, "SELECT id_supp FROM supplier WHERE nama_supp=$nmsupp");
					// if ($sql -> num_rows > 0) {
						while ($row = mysqli_fetch_array($sql)) {
							$hasil = $row;
							// echo $row;
							echo $hasil;
						}
					// }
				}
?>