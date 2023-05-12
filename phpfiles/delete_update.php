<?php  
 include('database.php');
 //export.php  
 if($_POST['deleted']==1 && $_POST['update']==0 )  
 {
	 $rollno=$_POST['rollno'];
	// delete member data in the database
	$query = "Delete From Students where rollno='$rollno' ";
	mysqli_query($conn, $query);
	echo '<label class="text-success">Data Deleted</label> ';
		
	
 }
  if($_POST['deleted']==0 && $_POST['update']==1)  
 {
	 $rollno = $_POST['rollno'];  
	 $name = $_POST['name'];
	 $dateofbirth =$_POST['dob'];
	 $gender =$_POST['gender']; 						
	 $fathername=$_POST['fathername'];
	 $fathernumber="";//$_POST['fathernumber'];
	 $gmail=$_POST['gmail'];
	 $altgmail=$_POST['altgmail'];
	 $clgmail="NA";//$_POST['clgmail'];
	 $mobilenumber1=$_POST['mobile1'];  
	 $mobilenumber2=$_POST['mobile2'];  
	 $caste="NA";//$_POST['caste'];
	 $adharnumber=$_POST['adharno'];  
	 $pancard=$_POST['panno'];
	 if($pancard=='NA' || $pancard=='')
	 	$pancard=null;
	 $schoolp=$_POST['schoolp'];
	 if($schoolp>100)
	 	$schoolp=ceil(((float)($schoolp)/1000)*100);
	 if($schoolp<10)
	 	$schoolp=ceil(((float)($schoolp))*10);
	 
	 $schoolname="";//str_replace("'","''",$_POST['schoolname']); 
	 $schoolboard="NA";//$_POST['schoolboard'];						
	 $schoolyear= "";//$_POST['schoolyear'];
	 $inter="NA";//trim($_POST['after10th']);
	 $interp=$_POST['interp'];
	 if($interp>100)
	 	$interp=ceil(((float)($interp)/1000)*100);
	 if($interp<10)
	 	$interp=ceil(((float)($interp))*10);
	 $board="NA";//$_POST['board'];
	 $interyear= "";//$_POST['interyear'];
	 $eamcetrank="NA";//$_POST['eamcetrank'];
	 $branch=$_POST['branch'];
	 $section=$_POST['section'];
	 $btechbatch=$_POST['btechbatch']; 
	 $btechcgpa=$_POST['btechp'];
	 $backlogs=preg_replace('/[^0-9.]+/', '',$_POST['backlogs']);
	 $hbacklogs=0;//preg_replace('/[^0-9.]+/', '',$_POST['hbacklogs']); 
	 $passoutyear=$_POST['passoutyear'];
	 $address=$_POST['address'];
	 $placeofbirth="NA";//$_POST['placeofbirth'];
	 
		// update member data in the database
		$updatequery = "  
		UPDATE students SET name='$name',dateofbirth='$dateofbirth',gender='$gender',fathername='$fathername',fathermobile='$fathernumber',gmail='$gmail',altgmail='$altgmail',clgmail='$clgmail',mobilenumber='$mobilenumber1',mobilenumber2='$mobilenumber2',caste='$caste',adharnumber='$adharnumber',pancard='$pancard',schoolp='$schoolp',schoolname='$schoolname',schoolboard='$schoolboard',schoolyear='$schoolyear',after10th='$inter',interp='$interp',board='$board',interyear='$interyear',placeofbirth='$placeofbirth',eamcetrank='$eamcetrank',branch='$branch',section='$section',btechbatch='$btechbatch',btechcgpa='$btechcgpa',backlogs='$backlogs',hbacklogs='$hbacklogs',passoutyear='$passoutyear',address='$address' WHERE rollno='$rollno'";
		if(mysqli_query($conn, $updatequery))
		{
			echo '<label class="text-success">Data Updated</label> ';
			
		}else{
			 echo '<label class="text-danger">Data Not Updated</label> ';
			 
		}
	
 }
 ?>