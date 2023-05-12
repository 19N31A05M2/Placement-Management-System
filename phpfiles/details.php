<?php 
include('database.php');

if($_POST['details']==1){
	
	$query = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."'";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$total=$row['count(*)'];
	
	$query1 = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."' and gender='MALE'";
	$result1 = mysqli_query($conn,$query1);
	$row1=mysqli_fetch_array($result1);
	$boys=$row1['count(*)'];
	
	$girls=$total-$boys;
	
	$query2 = "SELECT count(*) FROM placements where passouts='".$_POST['year']."' and status='COMPLETED'";
	$result2 = mysqli_query($conn,$query2);
	$row2=mysqli_fetch_array($result2);
	$companys=$row2['count(*)'];
	
	$query3 = "SELECT count(*) FROM placed where passoutyear='".$_POST['year']."'";
	$result3 = mysqli_query($conn,$query3);
	$row=mysqli_fetch_array($result3);
	$selected=$row['count(*)'];
	
	$query4 = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."' and backlogs!=0";
	$result4 = mysqli_query($conn,$query4);
	$row4=mysqli_fetch_array($result4);
	$backlogs=$row4['count(*)'];
	

	echo json_encode(array("total"=>$total,"boys"=>$boys,"girls"=>$girls,"companys"=>$companys,"selected"=>$selected,"backlogs"=>$backlogs));

}
?>