<?php 
include('header.php');
include("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Simple Admin Dashboard</title>
	<!---Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css">
	<link href="" rel="stylesheet" type="text/css">
	
	<!--Datatables srcipts-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" charset="utf8" src=""></script>
    <script type="text/javascript" charset="utf8" src=""></script>
   
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
                          <a class="nav-link active" aria-current="page" href="students.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ms-2">Students</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="drives.php">
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
                          <a class="nav-link" href="fetch.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <span class="ms-2">Fetch</span>
                          </a>
                        </li>
                        
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 offset-md-3 offset-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="text-center mt-5 mb-5">
					<select id="passoutyears" >
						<option value=" ">All</option>
					<?php
						$sql = "SELECT distinct passoutyear from students order by passoutyear DESC LIMIT 6 ";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							echo "<option>".$row['passoutyear']."</option>";
						}
					?>
					</select>
					<span>PASSED_OUTS</span>
				</h1>
					<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr class="bg-warning">
								<th>Roll_Number</th>
								<th>Full_Name</th>
								<th>Gender</th>
								<th>Date_of_Birth</th>
								<th>Father_Name</th>
								
								<th>Mobile_Number</th>
								<th>Gmail</th>
								<th>Adhar_Number</th>
								<th>Pancard_Number</th>
								<th>Address</th>
								<th>School_Name</th>
								<th>10th_percentage/Cgpa</th>
								<th>Year_of_10th</th>
								<th>Inter/Diploma_Board</th>
								<th>Inter/Diploma_Percentage/Cgpa</th>
								<th>Inter/Diploma_Batch</th>
								<th>Btech_Batch</th>
								<th>Branch</th>
								<th>Btech_Cgpa</th>
								<th>Backlogs</th>
								<th>HBacklogs</th>
								<th id='batch'>Passoutyear</th>
								<th>Action</th>
							</tr>
        </thead>
        <tbody>
            <?php
								$students="Select * from Students";
								$studentsquery=mysqli_query($conn,$students);
								While($row=mysqli_fetch_array($studentsquery))
								{
									echo "<tr>";
									echo "<td>".$row['rollno']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".$row['dateofbirth']."</td>";
									echo "<td>".$row['fathername']."</td>";
									
									echo "<td>".$row['mobilenumber']."</td>";
									echo "<td>".$row['gmail']."</td>";
									echo "<td>".$row['adharnumber']."</td>";
									echo "<td>".$row['pancard']."</td>";
									echo "<td>".$row['address']."</td>";
									echo "<td>".$row['schoolname']."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['schoolyear']."</td>";
									echo "<td>".$row['board']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['interyear']."</td>";
									echo "<td value=".$row['passoutyear'].">".$row['btechbatch']."</td>";
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "</tr>";
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
$(document).ready(function() {
	var groupColumn=21;
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [  'colvis' ],
		scrollX:true,
		"columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group bg-primary text-light"><td colspan="23">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
	var buttons = new $.fn.dataTable.Buttons(table, {
		buttons: [
			'csvHtml5','excelHtml5','pdfHtml5','print'
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
	$("#passoutyears").change(function() {
         table.columns("#batch").search(this.value ).draw();
	});	
		
} );
</script>
    
       

</html>