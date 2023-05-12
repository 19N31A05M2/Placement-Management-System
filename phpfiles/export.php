 <?php  
 include('database.php');
 //export.php  
 if(!empty($_FILES["excel_file"]))  
 {  
	$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    $output = '';  
           $output .= "  
           <label class='text-success'>Data Inserted</label>  
                <table class='table table-bordered'>  
                     <tr>  
                          <th>rollno</th>  
                          <th>name</th>  
                          <th>gender</th>  
                          <th>fathername</th>  
                          <th>mothername</th>  
                     </tr>  
                     ";
	 $file_array = explode(".", $_FILES["excel_file"]["name"]); 				 
    // Validate whether selected file is a CSV file
    if($file_array[1]=="csv"){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['excel_file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['excel_file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
					$rollno = $line[0];  
                     $name = $line[1];  
                     $gender =$line[2] ;  
                     $dateofbirth =$line[3];  
                     $fathername=  $line[4];
                     $mothername=$line[5]; 
                     $mobilenumber=$line[6];  
                     $gmail=$line[7];
                     $adharnumber=$line[8];  
                     $pancard= $line[9];
                     $address= $line[10];
                     $schoolname= $line[11]; 
                     $schoolyear= $line[12];
                     $schoolp=$line[13];
                     $intername=$line[14];
                     $interyear= $line[15];
                     $interp=$line[16];
                     $btechbacth=$line[17]; 
                     $branch=$line[18];
                     $btechcgpa=$line[19];
                     $backlogs=$line[20];
                     $hbacklogs=$line[21]; 
                     $passoutyear= $line[22];  
                  
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT * FROM students WHERE rollno = '".$line[0]."'";
                $prevResult =mysqli_query($conn,$prevQuery);
                
                if(mysqli_num_rows($prevResult) > 0){
                    // Update member data in the database
                    //$db->query("UPDATE members SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'");
                }else{
                    // Insert member data in the database
                    $query = "  
                     INSERT INTO students(rollno, name, gender,dateofbirth,fathername,mothername,mobilenumber,gmail,adharnumber,pancard,address,schoolname,schoolyear,schoolp,intername,interyear,interp,btechbatch,branch,btechcgpa,backlogs,hbacklogs,passoutyear) VALUES ('$rollno','$name','$gender','$dateofbirth','$fathername','$mothername','$mobilenumber','$gmail','$adharnumber','$pancard','$address','$schoolname','$schoolyear','$schoolp','$intername','$interyear','$interp','$btechbacth','$branch','$btechcgpa','$backlogs','$hbacklogs','$passoutyear') ";
					 mysqli_query($conn, $query);  
                }
				
                     $output .= '  
                     <tr>  
                          <td>'.$rollno.'</td>  
                          <td>'.$name.'</td>  
                          <td>'.$gender.'</td>  
                          <td>'.$fathername.'</td>  
                          <td>'.$mothername.'</td>  
                     </tr>  
                     ';  
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            
			$output .= '</table>';  
           echo $output; 
       
		}
      else  
      {  
           echo '<label class="text-danger">Invalid File</label>';  
      }  
 } 
 else{
	 echo 'file not read';
 }
 }
 ?> 