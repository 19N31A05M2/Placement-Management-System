<?php  
 include('database.php');
 
 //export.php  
 if($_POST['insert1']==1)  
 {
	
	 $rollno = $_POST['rollno'];  
	 $name = $_POST['name'];
	 $dateofbirth =$_POST['dob'];
	 $gender =$_POST['gender']; 						
	 $fathername=$_POST['fathername'];
	 $fathernumber=$_POST['fathernumber'];
	 $gmail=$_POST['gmail'];
	 $altgmail=$_POST['altgmail'];
	 $clgmail=$_POST['clgmail'];
	 $mobilenumber1=$_POST['mobile1'];  
	 $mobilenumber2=$_POST['mobile2'];  
	 $caste=$_POST['caste'];
	 $adharnumber=$_POST['adharno'];  
	 $pancard=$_POST['panno'];
	 if($pancard=='NA')
	 	$pancard=null;
	 $schoolp=$_POST['schoolp'];
	 if($schoolp>100)
	 	$schoolp=ceil(((float)($schoolp)/1000)*100);
	 if($schoolp<10)
	 	$schoolp=ceil(((float)($schoolp))*10);
	 
	 $schoolname=str_replace("'","''",$_POST['schoolname']); 
	 $schoolboard=$_POST['schoolboard'];						
	 $schoolyear= $_POST['schoolyear'];
	 $inter=trim($_POST['after10th']);
	 $interp=$_POST['interp'];
	 if($interp>100)
	 	$interp=ceil(((float)($interp)/1000)*100);
	 if($interp<10)
	 	$interp=ceil(((float)($interp))*10);
	 $board=$_POST['board'];
	 $interyear= $_POST['interyear'];
	 $eamcetrank=$_POST['eamcetrank'];
	 $branch=$_POST['branch'];
	 $section=$_POST['section'];
	 $btechbatch=$_POST['btechbatch']; 
	 $btechcgpa=$_POST['btechp'];
	 $backlogs=preg_replace('/[^0-9.]+/', '',$_POST['backlogs']);
	 $hbacklogs=preg_replace('/[^0-9.]+/', '',$_POST['hbacklogs']); 
	 $passoutyear=$_POST['passoutyear'];
	 $address=$_POST['address'];
	 $placeofbirth=$_POST['placeofbirth'];
	
	 
	 // Check whether member already exists in the database with the same email
	$prevQuery = "SELECT * FROM students WHERE rollno ='$rollno'";
	$prevResult =mysqli_query($conn,$prevQuery);
	 if(mysqli_num_rows($prevResult) > 0){
		// Update member data in the database
		//$db->query("UPDATE members SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'");
		echo '<label class="text-danger">'.$rollno.' Already Exist</label><br>';
		
	}else{
		// Insert member data in the database
	 
		$query = "INSERT INTO  students VALUES('$rollno','$name','$dateofbirth','$gender','$fathername','','$fathernumber','$gmail','$altgmail','$clgmail','$mobilenumber1','$mobilenumber2','$caste','$adharnumber','$pancard','$schoolp','$schoolname','$schoolboard','$schoolyear','$inter','$interp','$board','$interyear','$placeofbirth','$eamcetrank','$branch','$section','$btechbatch','$btechcgpa','$backlogs','$hbacklogs','$passoutyear','$address')";
		// $query = "INSERT INTO students         (`rollno`, `name`, `dateofbirth`, `gender`, `fathername`, `mothername`, `fathermobile`, `gmail`, `altgmail`, `clgmail`, `mobilenumber`, `mobilenumber2`, `caste`, `adharnumber`, `pancard`, `schoolp`, `schoolname`, `schoolboard`, `schoolyear`, `after10th`, `interp`, `board`, `interyear`, `placeofbirth`, `eamcetrank`, `branch`, `section`, `btechbatch`, `btechcgpa`, `backlogs`, `hbacklogs`, `passoutyear`, `address`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]','[value-29]','[value-30]','[value-31]','[value-32]','[value-33]')"
		if(mysqli_query($conn, $query)){
			echo '<label class="text-success">Data Inserted</label> ';
			echo '<script> $("#newstudent")[0].reset(); </script>';
		}else{
			echo "error";
		}
	}
 }
 ?>