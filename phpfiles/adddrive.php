<?php  
 include('database.php');
 //export.php  
 if($_POST['insert']==1)  
 {
	 $companyname=$_POST['companyname'];
	 $date=$_POST['date'];
	 $packages=$_POST['packages'];
	 $passoutyear=$_POST['passoutyear'];
	 $btechp=$_POST['btechp'];
	 $schoolp=$_POST['schoolp'];
	 $interp=$_POST['interp'];
	 $branch=$_POST['branch'];
	 $backlogs=$_POST['backlogs'];
	 $hbacklogs=$_POST['hbacklogs'];
	 $ps=$_POST['ps'];
	 $sg=$_POST['sg'];
	 $gender=$_POST['gender'];
	 $eamcetrank=$_POST['eamcetrank'];
	 
	 if($eamcetrank==0)
		 $eamcetrank=500000;
	 if($interp<10)
	 	$interp=ceil(((float)($interp))*10);
	 if($schoolp<10)
	 	$schoolp=ceil(((float)($schoolp))*10);
	 if($btechp>10)
	 	$btechp=round(((float)($btechp/10)+0.5),2);
	 // Check whether member already exists in the database with the same email
	$prevQuery = "SELECT * FROM placements WHERE companyname ='$companyname' and date='$date' and passouts='$passoutyear' ";
	$prevResult =mysqli_query($conn,$prevQuery);
	
	 if(mysqli_num_rows($prevResult) > 0){
		// Update member data in the database
		//$db->query("UPDATE members SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'");
		echo '<label class="text-danger">Drive Already Exist</label><br>';
		
	}else{
		if($ps=="NO"){
			if($sg=="NO"){
				if($gender!="ANY")
					$students="SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
				else
					$students="SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
			}
			else{
				if($gender!="ANY")
					$students=" SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
				else
					$students=" SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
			}
				
		}else{
			if($sg=="NO"){
				if($gender!="ANY")
					$students="SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear'and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
				else
					$students="SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear'and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs'  and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
			}
			else{
				if($gender!="ANY")
					$students=" SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 ";
				else
					$students=" SELECT branch,count(*) as el FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 ";
			}
			
		}
	
		
		$nResult =mysqli_query($conn,$students);
		//$totaleligible=mysqli_num_rows($nResult);
		$totaleligible="{";
		$total=0;
		While($row=mysqli_fetch_array($nResult))
		{
			$totaleligible.="".$row['branch'].":".$row['el'].",";
			$total+=$row['el'];
		}
		$totaleligible.="}"." total:".$total;
		
		// Insert member data in the database
		$query = "  
		INSERT INTO placements(companyname, passouts, package, date, gender, branches, btechp, interp, schoolp, backlogs, hbacklogs, totaleligible, selected, previouslyplaced, studygap, eamcetrank, status) VALUES('$companyname','$passoutyear','$packages','$date','$gender','$branch','$btechp','$interp','$schoolp','$backlogs','$hbacklogs','$totaleligible',0,'$ps','$sg','$eamcetrank','PENDING') ";
		if(mysqli_query($conn, $query)){
			echo '<label class="text-success">Data Inserted</label> ';
			echo '<script> $("#drive_form")[0].reset(1); </script>';
		}else{
			 echo mysqli_error($conn);
		}
	}
 }
 if($_POST['update']==1)  
 {
	 
	 $companyname=$_POST['companyname'];
	 $date=$_POST['date'];
	 $packages=$_POST['packages'];
	 $passoutyear=$_POST['passoutyear'];
	 $btechp=$_POST['btechp'];
	 $schoolp=$_POST['schoolp'];
	 $interp=$_POST['interp'];
	 $branch=$_POST['branch'];
	 $backlogs=$_POST['backlogs'];
	 $hbacklogs=$_POST['hbacklogs'];
	 $ps=$_POST['ps'];
	 $sg=$_POST['sg'];
	 $gender=$_POST['gender'];
	 $eamcetrank=$_POST['eamcetrank'];
	 
	 if($eamcetrank==0)
		 $eamcetrank=500000;
	 if($interp<10)
	 	$interp=ceil(((float)($interp))*10);
	 if($schoolp<10)
	 	$schoolp=ceil(((float)($schoolp))*10);
	 if($btechp>10)
	 	$btechp=round(((float)($btechp/10)+0.5),2);
		if($ps=="NO"){
			if($sg=="NO"){
				if($gender!="ANY")
					$students="SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
				else
					$students="SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
			}
			else{
				if($gender!="ANY")
					$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
				else
					$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
			}
				
		}else{
			if($sg=="NO"){
				if($gender!="ANY")
					$students="SELECT * FROM students WHERE passoutyear='$passoutyear'and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
				else
					$students="SELECT * FROM students WHERE passoutyear='$passoutyear'and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs'  and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
			}
			else{
				if($gender!="ANY")
					$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 ";
				else
					$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0";
				
			}
			
		}
	
		
		$nResult =mysqli_query($conn,$students);
		$totaleligible=mysqli_num_rows($nResult);
		
		
		// Insert member data in the database
		$query = "  
		UPDATE placements SET companyname='$companyname',passouts='$passoutyear',package='$packages',date='$date',gender='$gender',branches='$branch',btechp='$btechp',interp='$interp',schoolp='$schoolp',backlogs='$backlogs',hbacklogs='$hbacklogs',totaleligible='$totaleligible',selected=0,previouslyplaced='$ps',studygap='$sg',eamcetrank='$eamcetrank',status='PENDING' WHERE id='".$_POST['id']."' ";
		if(mysqli_query($conn, $query))
			echo '<label class="text-success">Updated Sucessfully</label> ';
		else
			echo mysqli_error($conn);
 }
 if($_POST['deleted']==1)  
 {
	 $id=$_POST['id'];
	// delete member data in the database
	$query = "Delete From placements where id='$id' ";
	if(mysqli_query($conn, $query)){
		echo '<label class="text-success">Drive Deleted</label> ';
	}
		
	
 }