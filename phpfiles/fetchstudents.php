<?php 
include('database.php');

if($_POST['ledetails']==1 && $_POST['ddetails']==0 ){
	
	$query = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."' and RIGHT(btechbatch, 4)-LEFT(btechbatch,4)=3";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$total=$row['count(*)'];
	
	$query1 = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."' and gender='MALE' and RIGHT(btechbatch, 4)-LEFT(btechbatch,4)=3";
	$result1 = mysqli_query($conn,$query1);
	$row1=mysqli_fetch_array($result1);
	$boys=$row1['count(*)'];
	
	$girls=$total-$boys;
	
	
	

	echo json_encode(array("total"=>$total,"boys"=>$boys,"girls"=>$girls));

}
if($_POST['ledetails']==0 && $_POST['ddetails']==1 ){
	
	$query = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."' and RIGHT(btechbatch, 4)!=passoutyear";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$total=$row['count(*)'];
	
	$query1 = "SELECT count(*) FROM students where passoutyear='".$_POST['year']."' and gender='MALE' and RIGHT(btechbatch, 4)!=passoutyear";
	$result1 = mysqli_query($conn,$query1);
	$row1=mysqli_fetch_array($result1);
	$boys=$row1['count(*)'];
	
	$girls=$total-$boys;
	
	
	

	echo json_encode(array("total"=>$total,"boys"=>$boys,"girls"=>$girls));

}
?>