<?php  
 include('database.php');
 //export.php  
 if($_POST['completed']==1)  
 {
	 
	 $companyid=$_POST['companyid'];
	// no of students selected
	$result = mysqli_query($conn, "SELECT branch,COUNT(*) AS count FROM placed where companyid='$companyid' group by branch");
	$count="{";
	$totalcount=0;
	While($row = mysqli_fetch_array($result)){
		$count .= $row['branch'].":".$row['count'].",";
		$totalcount+=$row['count'];
	}
	$count.="} total:".$totalcount;
	
	$query = "UPDATE placements SET selected='$count',status='COMPLETED' WHERE id='$companyid' ";
	if(mysqli_query($conn, $query)){
		echo '<label class="text-success">Successfully Completed</label> ';
	}
	else{
		echo mysqli_error($conn);
			 
	}
	
	
 }
 ?>