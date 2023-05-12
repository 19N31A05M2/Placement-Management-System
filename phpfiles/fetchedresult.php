<?php
session_start();
ob_start(); 
include('header.php');
include("database.php");
if(!$_SESSION['user']){
	header('location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Simple Admin Dashboard</title>
    
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link"  href="dashboard.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="ms-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="students.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ms-2">Students</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link"  href="drives.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span class="ms-2">Drives</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link"  href="batch.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span class="ms-2">Add Batch</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="results.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                            <span class="ms-2">Results</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link  active" href="fetch.php"  aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <span class="ms-2">Fetch</span>
                          </a>
                        </li>
                        
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 offset-md-3 offset-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-1">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item active">Fetch</li>
                        <li class="breadcrumb-item" aria-current="page">Fetch Results</li>
                    </ol>
                </nav>
                <h1 class="text-center mt-5 mb-5 heading">
					Results
				</h1>
				<table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr class="bg-warning">
								<th>Roll_Number</th>
								<th>Full_Name</th>
								<th>Gender</th>
								<th>Date_of_Birth</th>
								<th>10th_percentage/Cgpa</th>
								<th>Year_of_10th</th>
								<th>Inter/Diploma_Percentage/Cgpa</th>
								<th>Inter/Diploma_Batch</th>
								<th>Btech_Batch</th>
								<th>Branch</th>
								<th>Btech_Cgpa</th>
								<th>Backlogs</th>
								<th>HBacklogs</th>
								<th>Passoutyear</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(isset($_POST['lesubmit'])){
								echo "<script> $('.heading').html('LE STUDENTS'); </script>";
								$passoutyear=$_POST['lepassouts'];
								
								
								$students="SELECT * FROM students where passoutyear='$passoutyear' and RIGHT(btechbatch, 4)-LEFT(btechbatch,4)=3";
								$studentsquery=mysqli_query($conn,$students);
								While($row=mysqli_fetch_array($studentsquery))
								{
									echo "<tr>";
									echo "<td>".$row['rollno']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".date("d-m-Y", strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['schoolyear']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['interyear']."</td>";
									echo "<td>".$row['btechbatch']."</td>";
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "</tr>";
								}
							}
							if(isset($_POST['dsubmit'])){
								echo "<script> $('.heading').html('D10 STUDENTS'); </script>";
								$passoutyear=$_POST['dpassouts'];
								
								
								
								$students="SELECT * FROM students where passoutyear='$passoutyear' and RIGHT(btechbatch, 4)!=passoutyear";
								$studentsquery=mysqli_query($conn,$students);
								While($row=mysqli_fetch_array($studentsquery))
								{
									echo "<tr>";
									echo "<td>".$row['rollno']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".date("d-m-Y", strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['schoolyear']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['interyear']."</td>";
									echo "<td>".$row['btechbatch']."</td>";
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "</tr>";
								}
							}
							if(isset($_POST['year'])){
								echo "<script> $('.heading').html('Students With Backlogs'); </script>";
								$passoutyear=$_POST['year'];
								
								
								
								$students="SELECT * FROM students where passoutyear='$passoutyear' and backlogs>0";
								$studentsquery=mysqli_query($conn,$students);
								While($row=mysqli_fetch_array($studentsquery))
								{
									echo "<tr>";
									echo "<td>".$row['rollno']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".date("d-m-Y", strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['schoolyear']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['interyear']."</td>";
									echo "<td>".$row['btechbatch']."</td>";
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "</tr>";
								}
							}
							if(isset($_POST['submit'])){
								$passoutyear=$_POST['passouts'];
								$branch=$_POST['branch'];
								if($branch=="ALL")
									$branch="CSE ECE EEE IT MECH ANE";
								$btechp=$_POST['btechp'];
								$interp=$_POST['interp'];
								$schoolp=$_POST['schoolp'];
								$backlogs=$_POST['backlogs'];
								$hbacklogs=$_POST['hbacklogs'];
								if($hbacklogs=="Negligible")
									$hbacklogs=50;
								$ps=$_POST['ps'];
								$sg=$_POST['sg'];
								$eamcetrank=$_POST['eamcetrank'];
								$gender=$_POST['gender'];
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
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
										else
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
									}
									else{
										if($gender!="ANY")
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
										else
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
									}
										
								}else{
									if($sg=="NO"){
										if($gender!="ANY")
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear'and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
										else
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear'and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs'  and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
									}
									else{
										if($gender!="ANY")
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 ";
										else
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa >= '$btechp' and interp >= '$interp' and schoolp >= '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 ";
									}
									
								}
								
								
								$studentsquery=mysqli_query($conn,$students);
								While($row=mysqli_fetch_array($studentsquery))
								{
									echo "<tr>";
									echo "<td>".$row['rollno']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".date("d-m-Y", strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['schoolyear']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['interyear']."</td>";
									echo "<td>".$row['btechbatch']."</td>";
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "</tr>";
								}
							}
							?>
						</tbody>
					</table>
					<div id='buttons' class="mt-3">
					
					</div>
				
            </main>
        </div>
    </div>
    
    
</body>
<script>
$(document).ready(function(e) {

	var table = $('#example').DataTable( {
        lengthChange: true,
		select: true,
		scrollX:true,
	} );
	var buttons = new $.fn.dataTable.Buttons(table, {
		buttons: [
			'csvHtml5',
			{
				extend:'excelHtml5',
				title:'Searched Results',
				messageTop:'Results'
			},'pdfHtml5','print'
		]
	}).container().appendTo($('#buttons'));
		
		$( ".buttons-csv" ).removeClass( "btn-secondary" );
		$( ".buttons-csv" ).addClass( "btn-primary" );
		$( ".buttons-excel" ).removeClass( "btn-secondary" );
		$( ".buttons-excel" ).addClass( "btn-primary" );
		$( ".buttons-pdf" ).removeClass( "btn-secondary" );
		$( ".buttons-pdf" ).addClass( "btn-primary" );
		$( ".buttons-print" ).removeClass( "btn-secondary" );
		$( ".buttons-print" ).addClass( "btn-primary" );
	
});
</script>
    
       

</html>