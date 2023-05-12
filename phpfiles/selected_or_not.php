<?php  
 include('database.php');
 //export.php  
 if($_POST['deleted']==1 && $_POST['insert']==0 )  
 {
	 $rollno=$_POST['rollno'];
	 $companyid=$_POST['companyid'];
	// delete member data in the database
	$query = "Delete From placed where rollno='$rollno' and companyid='$companyid' ";
	if(mysqli_query($conn, $query)){
		echo '<label class="text-success">Data Deleted</label> ';
	}
	else{
			 echo mysqli_error($conn);
			 
		}
		
	
 }
  if($_POST['deleted']==0 && $_POST['insert']==1)  
 {
	 $rollno=$_POST['rollno'];
	 $name=$_POST['name'];
	 $gender=$_POST['gender'];
	 $branch=$_POST['branch'];
	 $passoutyear=$_POST['passoutyear'];
	 $companyid=$_POST['companyid'];
	 $companyname=$_POST['companyname'];
	 $selected_date=date("Y-m-d", strtotime($_POST['selecteddate']));
	 $package=$_POST['packages'];
	 
		// update member data in the database
		$placedquery = "INSERT INTO placed(rollno,name ,  gender ,  branch ,  companyid ,  companyname ,  package ,  selecteddate ,  passoutyear ) VALUES ('$rollno','$name','$gender','$branch','$companyid','$companyname','$package','$selected_date','$passoutyear') ";
		if(mysqli_query($conn, $placedquery))
		{
			echo '<label class="text-success">inserted</label> ';
			
		}else{
			 echo mysqli_error($conn);
			 
		}
	
 }
 ?>