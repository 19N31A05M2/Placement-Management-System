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
    if($file_array[1]=="xlsx"){
			
		if($conn){
			$excel=SimpleXLSX::parse($_FILES['excel_file']['tmp_name']);
			
			for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
				$rowcol=$excel->dimension($sheet);
				$i=0;
				if($rowcol[0]!=1 && $rowcol[1]!=1){
					$arr=$excel->rows($sheet);
					$rowno=ceil(sizeof($excel->rows($sheet))/2);
					if($rowno>100){
						$str= $arr[$rowno][1];
						$passoutyear='20'.(int)substr($str, 0, 2)+4;
						
					}else{
						$passoutyear=substr(preg_replace('/[^0-9.]+/', '',$file_array[0]),-4);
					}
					foreach ($excel->rows($sheet) as $key => $line) {
						if($i<1){ //upto line number skipped in excel
							$i++;
							continue;
						}
						$rollno = strtoupper($line[1]);  
						echo $line[30]; 
					}
				}
			}
			echo 'inserted=['.$insert.'] <br> Updated=['.$updated."]<br>"; 
			echo $output;
		}
		
	}
	else{
		echo '<label class="text-danger">Invalid File</label>';
	}
}
else{
	 echo 'file not read';
 }       