<?php
header('Content-Type: application/json');

include "../connection.php";

$sqlQuery = "SELECT full_name, point FROM users";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
