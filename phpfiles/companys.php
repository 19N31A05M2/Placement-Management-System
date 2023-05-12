<?php
include('database.php');
$date=date("Y-m-d");
if($_POST['details']==1){
	$students="Select companyname,date,passouts,branches,selected from placements where status='COMPLETED' and passouts='".$_POST['year']."' Order by date DESC limit 5";
	$result=mysqli_query($conn,$students);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
	
	
mysqli_close($conn);
echo json_encode($data);

}
	
	
	
?>