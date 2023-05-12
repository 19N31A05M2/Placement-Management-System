<?php

include('database.php');

$sqlQuery = "SELECT DISTINCT passoutyear,count(*) OVER (PARTITION BY passoutyear) as pls FROM placed";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>

