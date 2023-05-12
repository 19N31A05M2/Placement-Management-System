<?php
session_start();
ob_start();
include('header.php');
include("database.php");
if(!$_SESSION['user']){
	header('location:../index.php');
}
if(isset($_POST['year'])){
	$year=$_POST['year'];

}else{
	$year='';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Simple Admin Dashboard</title>
	
	<link href="" rel="stylesheet" type="text/css">
	
    <script type="text/javascript" charset="utf8" src=""></script>
	<style>
	div.dt-button-collection div.dropdown-menu{
		background-color:#0c68f0;
	}
	.dropdown-item {
		display: block;
		width: 100%;
		padding: .30rem 1rem;
		clear: both;
		font-weight: 400;
		color: #f8f9fa;
		text-align: inherit;
		text-decoration: none;
		white-space: nowrap;
		background-color:#0c68f0;
		border: 0;
		onhover: pointer;
	}
	
		@media (min-width: 576px){
		.modal-dialog {
			min-width: 1000px;
			margin: 1.75rem auto;
		}
		
		}
		.add{
			cursor:pointer;
		}
		 .input-text{
			border-width:0 0 2px 0;
			border-color:#5543ca;
			font-size:18px;
			line-height:26px;
			font-weight:400;
			
		}
		.input-text:focus{
			outline:none;
		}
		#update{
			display:inline-block;
			background-image:linear-gradient(125deg,#a72879,#064497);
			color:#fff;
			text-transform:uppercase;
			line-spacing:2px;
			font-size:16px;
			padding:8px 16px;
			border:none;
			width:200px;
			cursor:pointer;
		}
		.select{
			width:200px;
		}
		.title{
			text-transform:uppercase;
			text-align:center;
			letter-spacing:3px;
			font-size:3em;
			line-height:48px;
			padding-bottom:20px;
			color:#5543ca;
			background:linear-gradient(to right,#f4524d 0%,#5543ca 100%);
			-webkit-background-clip:text;
			-webkit-text-fill-color:transparent;
		}
		.close{
			font-size:11px;
			top:-10px;
		}
	

		
	</style>
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
                          <a class="nav-link active" href="results.php">
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
                    <ol class="breadcrumb p-1">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item active">Results</li>
                        <li class="breadcrumb-item">Completed Drives</li>
                    </ol>
                </nav>
               
				<div id="msg" class="text-center"></div>
					<table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr class="bg-warning">
								<th>ID</th>
								<th>Company_name</th>
								<th>Drive_date</th>
								<th>Package_Offered</th>
								<th id='batch'>Passouts</th>
								<th id='branches'>Branches_Eligible</th>
								<th>Total_Eligible</th>
								<th>Selected</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$drives="Select * from placements where status='COMPLETED' and passouts like '%$year%'";
								$drivesquery=mysqli_query($conn,$drives);
								While($row=mysqli_fetch_array($drivesquery))
								{
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['companyname']."</td>";
									echo "<td>".date("d-m-Y", strtotime($row['date']))."</td>";
									echo "<td>".$row['package']."</td>";
									echo "<td>".$row['passouts']."</td>";
									echo "<td>".$row['branches']."</td>";
									echo "<td>".$row['totaleligible']."</td>";
									echo "<td>".$row['selected']."</td>";
									echo '<td>
											<form method="POST" action="selected_students.php" class=" text-primary text-decoration-none view d-inline">
											<button class="border-0 px-3 text-primary bg-transparent" type="submit" name="students" value="'.$row['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
												<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
												<path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
											</svg>
											</button>
											</form>
											
										</td>';
									echo "</tr>";
								}
							?>
						</tbody>
						<tfoot>
						<tr>
							<td class="text-end">
							
							<form class="d-inline" action="allselected.php" method="POST"><button type="submit" class="btn btn-block card-footer btn-light w-100 m-0 p-1" name="year"  value='<?php echo $year; ?>' id="view_year">Students</button></form>
								
							</td>
						</tr>
						</tfoot>
					</table>
					<div id='buttons' class="mt-3">
					
					</div>
			
				
            </main>
			
        </div>
    </div>
   
</body>
<script>
$(document).ready(function() {
	$('#inserted').hide();
	var groupColumn=4;
    var table = $('#example').DataTable( {
        lengthChange: false,
		select: true,
		buttons: [
			 
            {
				extend: 'collection',
				text: 'Branch',
				buttons: [
					 
					<?php
						$sql = "SELECT distinct branch from students order by branch";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							$search="^".$row['branch']."$";
							$branch=$row['branch'];
							?>{ text: <?php echo "'".$row['branch']."'"; ?>,   action: function () { table.columns("#branches").search(<?php echo "'".$search."'"; ?>, true, false).draw();} },
							
							<?php
					
						}
					?>	
				],
				fade: true
			},
        ],
       
		scrollX:true,
		"columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'desc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group bg-primary text-light"><td colspan="24">'+group+'</td></tr>'
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
function marks(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9.]/.test(ch))){
            evt.preventDefault();
        }
        
    }
	
</script>
    
       

</html>