<?php  
 include('database.php');
 include "xlxs.php";
 //export.php  
 if(!empty($_FILES["excel_file"]["name"]))  
 {  
	$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    $output = ''; 
	$insert= ' ';
	$updated= ' ';
	$error=' ';
		$output .= "  
           <label class='text-success'>Data Inserted</label>  ";
	 $file_array = explode(".", $_FILES["excel_file"]["name"]); 				 
    // Validate whether selected file is a CSV file
    if($file_array[1]=="xlsx" && preg_match("/[0-9]{4}[-][0-9]{4}/",substr(trim($file_array[0]),0,9))){
			
		if($conn){
			$excel=SimpleXLSX::parse($_FILES['excel_file']['tmp_name']);
			
			for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
				$rowcol=$excel->dimension($sheet);
				$i=0;
				if($rowcol[0]!=1 && $rowcol[1]!=1 && $rowcol[0]==34){
					$arr=$excel->rows($sheet);
					$rowno=ceil(sizeof($excel->rows($sheet))/2);
					if($rowno>100){
						$str= $arr[$rowno][1];
						$passoutyear='20'.(int)substr($str, 0, 2)+4;
						
					}else{
						$passoutyear=(int)substr($file_array[0],5,9);
					}
					foreach ($excel->rows($sheet) as $key => $line) {
						if($i<1){ //upto line number skipped in excel
							$i++;
							continue;
						}
						$rollno = strtoupper($line[1]);  
						$name = strtoupper($line[2]);
						$dateofbirth =date('Y-m-d',strtotime($line[3]));
						$gender =strtoupper($line[4]) ; 						
						$fathername= strtoupper($line[5]);
						$fathernumber= substr($line[6],-10);
						$gmail=$line[7];
						$altgmail=$line[8];
						$clgmail=$line[9];
						$mobilenumber1=$line[10];  
						$mobilenumber2=$line[11];  
						$caste=$line[12];
						$adharnumber=$line[13];  
						$pancard= $line[14];
						if($pancard=='NA')
							$pancard=null;
						$schoolp=$line[15];
						if($schoolp>100)
							$schoolp=ceil(((float)($schoolp)/1000)*100);
						if($schoolp<10)
							$schoolp=ceil(((float)($schoolp))*10);
						
						$schoolname=str_replace("'","''",$line[16]); 
						$schoolboard=$line[17];						
						$schoolyear= $line[18];
						$inter=trim($line[19]);
						$interp=$line[20];
						if($interp>100)
							$interp=ceil(((float)($interp)/1000)*100);
						if($interp<10)
							$interp=ceil(((float)($interp))*10);
						$board=$line[21];
						$interyear= $line[22];
						$placeofbirth=$line[23];
						if(trim(strtoupper($line[24]))=="Management category")
							$eamcetrank=0;
						else
							$eamcetrank=$line[25];
						$branch=$line[26];
						$section=$line[27];
						//$btechbatch=$line[28]; 
						$btechcgpa=$line[29];
						$btechpercentage=$line[30];
						$backlogs=preg_replace('/[^0-9.]+/', '',$line[31]);
						$hbacklogs=preg_replace('/[^0-9.]+/', '',$line[32]); 
						
						$address= str_replace("'","''",$line[33]);
						
						
							$btech='20'.(int)substr($rollno, 0, 2);;
							if(strtolower($inter)=='intermediate'){
								
								$btechbatch=$btech .'-'.(int)$btech+4;
							}else{
								
								$btechbatch=$btech .'-'.(int)$btech+3;
							}
						
						
						// Check whether member already exists in the database with the same email
						$prevQuery = "SELECT * FROM students WHERE rollno = '".$line[1]."'";
						$prevResult =mysqli_query($conn,$prevQuery);
						
						if(mysqli_num_rows($prevResult) > 0){
							// Update member data in the database
							$query = "UPDATE students SET name='$name',dateofbirth='$dateofbirth',gender='$gender',fathername='$fathername',fathermobile='$fathernumber',gmail='$gmail',altgmail='$altgmail',clgmail='$clgmail',mobilenumber='$mobilenumber1',mobilenumber2='$mobilenumber2',caste='$caste',adharnumber='$adharnumber',pancard='$pancard',schoolp='$schoolp',schoolname='$schoolname',schoolboard='$schoolboard',schoolyear='$schoolyear',after10th='$inter',interp='$interp',board='$board',interyear='$interyear',placeofbirth='$placeofbirth',eamcetrank='$eamcetrank',branch='$branch',section='$section',btechbatch='$btechbatch',btechcgpa='$btechcgpa',backlogs='$backlogs',hbacklogs='$hbacklogs',passoutyear='$passoutyear',address='$address' WHERE rollno='$rollno'";
							//$db->query("UPDATE members SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'");
							if(mysqli_query($conn, $query)){  
								$updated.=$rollno.' ';
							}else
								$error.=$rollno." ";
							
						}else{
							if($schoolp<=0 || $interp<=0 || $btechcgpa<=0){
								$error.=$rollno." ";
								echo $rollno."--marks missing <br>";
							}else{
								// Insert member data in the database
								$query = "INSERT INTO  students VALUES('$rollno','$name','$dateofbirth','$gender','$fathername','$fathernumber','$gmail','$altgmail','$clgmail','$mobilenumber1','$mobilenumber2','$caste','$adharnumber','$pancard','$schoolp','$schoolname','$schoolboard','$schoolyear','$inter','$interp','$board','$interyear','$placeofbirth','$eamcetrank','$branch','$section','$btechbatch','$btechcgpa','$backlogs','$hbacklogs','$passoutyear','$address')";
								if(mysqli_query($conn, $query)) 
									$insert.=$rollno.' ';
								else{
									echo $rollno."--adharno missing </br>";
									$error.=$rollno." ";
								}
							}
						} 
					}
					echo 'inserted=['.$insert.'] <br> Updated=['.$updated."]<br>"; 
					echo $output;
				}else{
					if($rowcol[0]!=1 && $rowcol[1]!=1)
						echo '<label class="text-warning">Wrong File Uploaded</label><br>';
				}
			}
			
		}
		
	}
	else{
		echo '<label class="text-danger">Invalid File</label>';
	}
}
else{
	 echo 'file not read';
 }       