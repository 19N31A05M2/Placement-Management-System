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
                          <a class="nav-link active" href="drives.php">
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
                    <ol class="breadcrumb p-1">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item active">Drives</li>
                        <li class="breadcrumb-item">Upcoming Drives</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5">
					<select id="passoutyears" >
						<option value=" ">All</option>
					<?php
						$sql = "SELECT distinct passouts from placements order by passouts DESC LIMIT 6 ";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							echo "<option>".$row['passouts']."</option>";
						}
					?>
					</select>
					<span>PASSED_OUTS</span>
					
				</h1>
				<div id="msg" class="text-center"></div>
					<table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr class="bg-warning">
								<th>ID</th>
								<th>Company_name</th>
								<th>Drive_date</th>
								<th>ELIGIBLE_GENDER</th>
								<th>Package_Offered</th>
								<th id='batch'>Passouts</th>
								<th id='branches'>Branches_Eligible</th>
								<th>Btech_Cgpa</th>
								<th>Inter/Diploma_Percentage/Cgpa</th>
								<th>10th_Cgpa</th>
								<th>Backlogs</th>
								<th>HBacklogs</th>
								<th>Previously_Selected_Eligible</th>
								<th>Study_gap_Eligible</th>
								<th>EAMCET/ECET RANK</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$drives="Select * from placements where status='PENDING'";
								$drivesquery=mysqli_query($conn,$drives);
								While($row=mysqli_fetch_array($drivesquery))
								{
									echo "<tr>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['companyname']."</td>";
									echo "<td>".date("d-m-Y", strtotime($row['date']))."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".$row['package']."</td>";
									echo "<td>".$row['passouts']."</td>";
									echo "<td>".$row['branches']."</td>";
									echo "<td>".$row['btechp']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['previouslyplaced']."</td>";
									echo "<td>".$row['studygap']."</td>";
									echo "<td>".$row['eamcetrank']."</td>";
									echo '<td>
											<form method="POST" action="eligible_students.php" class="me-1 text-primary text-decoration-none view d-inline">
											<button class="border-0 p-0 text-primary bg-transparent" type="submit" name="students" value="'.$row['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
												<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
												<path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
											</svg>
											</button>
											</form>
											<a href="#" class="me-1 text-dark text-decoration-none edit d-inline" id="" data-bs-toggle="modal" data-bs-target="#myModal">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
												<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
												<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
											</svg>
											</a>
											<a href="#" class="text-danger text-decoration-none delete d-inline" >
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
												<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
											</svg>
											</a>
										</td>';
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
					<div id='buttons' class="mt-3">
					
					</div>
			
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
								<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
								</symbol>
								<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
									<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
								</symbol>
								<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
									<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
								</symbol>
							</svg>
							<div class="modal-body">
								<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
								<section class="company_details">
									<form id="drive_form" method="POST">
									<h2 class="text-center mb-5 mt-3 title">UPDATE DRIVE</h2>
									<div id="inserted" class="text-center mx-auto my-auto mb-3">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
										<span id='msgs'>
											
										</span>
									</div>
									<div class="row mt-2 mb-3">
										<div class="col-md-6">
											<div class="form-group">
												<label for="companyname">COMPANY NAME</label>
												<input id="companyname" class="input-text form-control" type="text" name="" required="" autofocus="true" onkeyup="this.value = this.value.toUpperCase();">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="date">DATE</label>
												<input id="date" class="input-text form-control" type="date" name="" required="" >
											</div>
										</div>
									</div>
									<div class="row mt-2 mb-3">
									<!--  col-md-6   -->
									<div class="col-md-6">
										<div class="form-group">
											<label for="package">PACKAGE</label>
											<div class="input-group mb-3">
												<input type="text" id="package" class="form-control" aria-describedby="basic-addon1" name="btechp" onkeypress="marks(event)" required>
												<span class="input-group-text" id="basic-addon1">LPA</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="passoutyear">PASSOUTYEAR</label>
											<select id="passoutyear" class="form-select input-text " name="branch">
											<option value=""></option>
											<?php
												$sql = "SELECT distinct passouts from placements order by passouts DESC LIMIT 6 ";
												$query=mysqli_query($conn,$sql);
												While($row=mysqli_fetch_array($query))
												{
													echo "<option>".$row['passouts']."</option>";
												}
											?>
												
											</select>
										</div>
									</div>
									<!--  col-md-6   -->
									
									</div>
									
									
									<div class="row mb-3">
									
									<!--  col-md-6   -->
									<div class="col-md-4">
									
										<div class="form-group">
											<label for="btechp">BTECH CGPA</label>
											<div class="input-group mb-3">
												<span class="input-group-text" id="basic-addon1">></span>
												<input type="text" id="btechp" class="form-control"  aria-describedby="basic-addon1" name="interp" onkeypress="marks(event)" required>
											</div>
										</div>
									</div>
									<div class="col-md-4">
									
										<div class="form-group">
											<label for="interp">INTER/DIPLOMA CGPA</label>
											<div class="input-group mb-3">
												<span class="input-group-text" id="basic-addon1">></span>
												<input type="text" id="interp" class="form-control"  aria-describedby="basic-addon1" name="interp" onkeypress="marks(event)" required>
											</div>
										</div>
									</div>
									<!--  col-md-6   -->
									<div class="col-md-4">
									
										<div class="form-group">
											<label for="schoolp">10th CGPA</label>
											<div class="input-group mb-3">
												<span class="input-group-text" id="basic-addon1">></span>
												<input type="text" id="schoolp" class="form-control" aria-describedby="basic-addon1" name="schoolp" onkeypress="marks(event)" required>
											</div>
										</div>
									</div>
									</div>
									<!--  row   -->
									<div class="row mb-3">
										<div class="col-md-12">
											<label for="Branches">ELIGIBLE BRANCHES</label>
											<div class="border w-100 p-3">
												<input class="form-check-input all" id="all" type="checkbox" value="CSE IT ECE EEE MECH ANE">
												<label class="form-check-label me-3" for="flexCheckDefault">
													ALL
												</label>
												<input class="form-check-input branch" type="checkbox" value="CSE" >
												<label class="form-check-label me-3" for="flexCheckDefault">
													CSE
												</label>
												<input class="form-check-input branch" type="checkbox" value="IT">
												<label class="form-check-label me-3" for="flexCheckDefault">
													IT
												</label>
												<input class="form-check-input branch" type="checkbox" value="ECE">
												<label class="form-check-label me-3" for="flexCheckDefault">
													ECE
												</label>
												<input class="form-check-input branch" type="checkbox" value="EEE">
												<label class="form-check-label me-3" for="flexCheckDefault">
													EEE
												</label>
												<input class="form-check-input branch" type="checkbox" value="MECH">
												<label class="form-check-label me-3" for="flexCheckDefault">
													MECH
												</label>
												<input class="form-check-input branch" type="checkbox" value="ANE">
												<label class="form-check-label" for="flexCheckDefault">
													ANE
												</label>
											</div>
										</div>
									</div>
									<!--  row   -->
									<div class="row mb-3">
									<div class="col-md-6">
									
										<div class="form-group">
											<label for="backlogs">BACKLOGS UPTO</label>
											<select id="backlogs" class="form-select input-text" name="backlogs" >
												<option>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>
									<!--  col-md-6   -->
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="hbacklogs">HISTORY BACKLOGS UPTO</label>
											<select id="hbacklogs" class="form-select input-text" name="hbacklogs">
												<option>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									
									</div>
									<!--  col-md-6   -->
									</div>
									<div class="row mb-3">
												
										<!--  col-md-6   -->
										
										<div class="col-md-6">
											<div class="form-group">
												<label for="gender">Gender</label>
												<select id="gender" class="form-select input-text" name="ps">
													<option>ANY</option>
													<option>MALE</option>
													<option>FEMALE</option>
												</select>
											</div>
										
										</div>
										<!--  col-md-6   -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="eamcet_rank">EAMCET RANK UPTO</label>
												<div class="input-group mb-3">
													<span class="input-group-text" id="basic-addon1"><</span>
													<input type="text" id="eamcet_rank" class="form-control" aria-describedby="basic-addon1" name="schoolp" onkeypress="marks(event)" required>
												</div>
											</div>
										
										</div>
									</div>
									<div class="row mb-5">
									
									<!--  col-md-6   -->
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="ps">PREVIOUSLY SELECTED ELIGIBLE</label>
											<select id="ps" class="form-select input-text" name="ps">
												<option>YES</option>
												<option>NO</option>
											</select>
										</div>
									
									</div>
									<!--  col-md-6   -->
									<div class="col-md-6">
										<div class="form-group">
											<label for="sg">STUDY GAP ELIGIBLE</label>
											<select id="sg" class="form-select input-text" name="sg">
												<option>YES</option>
												<option>NO</option>
											</select>
										</div>
									
									</div>
									</div>
									<div class="form-field col-lg-12 text-center">
										<button class="btn btn-primary" id='update' type="submit" name="update" >Updtae</button>
									</div>
									</form>
								</section>	
								
							</div>
						
						</div>
					</div>
				</div>
            </main>
			
        </div>
    </div>
   
</body>
<script>
$(document).ready(function() {
	$('#inserted').hide();
	var groupColumn=5;
    var table = $('#example').DataTable( {
        lengthChange: false,
		select: true,
		buttons: [
			 
            {
				extend: 'collection',
				text: 'Branch',
				buttons: [
					{ text: 'CSE',   action: function () { table.columns("#branches").search('CSE', true, false).draw();} },
					{ text: 'IT', action: function () { table.columns("#branches").search('IT', true, false).draw(); } },
					{ text: 'ECE',    action: function () {table.columns("#branches").search('ECE', true, false).draw();  } },
					{ text: 'EEE',    action: function () {table.columns("#branches").search('EEE', true, false).draw();  } },
					{ text: 'MECH',    action: function () {table.columns("#branches").search('MECH', true, false).draw();  } },
					{ text: 'ANE',    action: function () {table.columns("#branches").search('ANE', true, false).draw();  } }
					
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
			'csvHtml5',
			{
				extend:'excelHtml5',
				title:'Drives',
				messageTop:'Upcoming-Drives'
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
	$("#passoutyears").change(function() {
         table.columns("#batch").search(this.value ).draw();
	});
	var gmail=schoolp=interp=btechp=number=adhar=pan=true;
	$('.view').on('click', function () {
		var data_row = table.row($(this).closest('tr')).data();
		$('.sbtechbatch').html(data_row[17]);
		$('.srollno').html(data_row[0]);
		$('.sname').html(data_row[1]);
		$('.sgender').html(data_row[2]);
		$('.sdob').html(data_row[3].split("-").reverse().join("-"));
		$('.snumber').html(data_row[6]);
		$('.sfathername').html(data_row[4]);
		$('.smothername').html(data_row[5]);
		$('.sgmail').html(data_row[7]);
		$('.sadharno').html(data_row[8].replace(/\B(?=(\d{4})+(?!\d))/g, "-"));
		$('.spanno').html(data_row[9]);
		$('.saddress').html(data_row[10]);
		$('.sschoolname').html(data_row[11]);
		$('.sschoolp').html(data_row[12]);
		$('.sintername').html(data_row[14]);
		$('.sinterp').html(data_row[15]);
		$('.sinteryear').html(data_row[16]);
		$('.sbranch').html(data_row[18]);
		$('.sbtechp').html(data_row[19]);
		$('.sbacklogs').html(data_row[20]);
		$('.shbacklogs').html(data_row[21]);
		$('.spassoutyear').html(data_row[22]);
		$('.sschoolyear').html(data_row[13]);
		if(data_row[19] <10 ){
			var bpercentage=data_row[19]*10;
		}else{
			bpercentage=data_row[19];
		}
		if(data_row[15] <10){
			var ipercentage=data_row[15]*10;
		}
		else{
			ipercentage=data_row[15];
		}
		if(data_row[12] <10){
			var spercentage=data_row[12]*10;
		}
		else{
			spercentage=data_row[12];
		}
		$('.cbtechp').css("width", bpercentage+"%");
		$('.cinterp').css("width", ipercentage+"%");
		$('.cschoolp').css("width", spercentage+"%");
		$('.simage').attr('src','../images/'+data_row[0]+'.jpg');
	});
	$("#inserted").hide();
    var ckbox = $('.all');

    $('.all').on('click',function () {
        if (ckbox.is(':checked')) {
            $(".branch").prop('disabled', true);
        } else {
            $(".branch").prop('disabled', false);
        }
    });
	$(".branch").on('click',function () {
		var box = $('.branch');
		if($(box[0]).is(':checked') && $(box[1]).is(':checked') && $(box[2]).is(':checked') && $(box[3]).is(':checked') && $(box[4]).is(':checked') && $(box[5]).is(':checked')){
			$(".branch").prop("checked", false);
			$(".all").click()
			 
		}
	});
	$('.edit').on('click', function () {
		$("#drive_form")[0].reset();
		var data_row = table.row($(this).closest('tr')).data();
		$('#companyname').val(data_row[1]);
		$('#date').val(data_row[2].split("-").reverse().join("-"));
		$('#package').val(data_row[4]);
		$('#passoutyear').val(data_row[5]).change();
		$('#btechp').val(data_row[7]);
		$('#interp').val(data_row[8]);
		$('#schoolp').val(data_row[9]);
		if(data_row[5]=="CSE IT ECE EEE MECH ANE"){
			$('.all').click();
		}else{
		 
			$('.branch').each(function () {
				if (data_row[6].includes($(this).val())) {
					$(this).click();
				}
				else{
					$(this).prop("checked", false);
				}
			});
		}
		$('#backlogs').val(data_row[10]);
		$('#hbacklogs').val(data_row[11]);
		$('#ps').val(data_row[12]).change();
		$('#sg').val(data_row[13]).change();
		$('#eamcet_rank').val(data_row[14]);
		$('#gender').val(data_row[3]).change();
		$('#update').val(data_row[0]);
		
	} );
	$('#update').click(function(e){
		 e. preventDefault();
		 var id=$(this).val();
		 var companyname=$('#companyname').val();
		 var packages=$('#package').val();
		 var date=$('#date').val();
		 var passoutyear=$('#passoutyear').val();
		 var btechp=$('#btechp').val();
		 var interp=$('#interp').val();
		 var schoolp=$('#schoolp').val();
		 var branch="";
		 if($('#all').prop('checked') == true){
			 branch+=$('#all').val();
		 }
		 else{
			$('.branch').each(function () {
				if (this.checked) {
					branch+=$(this).val()+" "; 
				}
			});
		 }
		 
		 var backlogs=$('#backlogs').val();
		 var hbacklogs=$('#hbacklogs').val();
		 var gender=$('#gender').val();
		 var eamcetrank=$('#eamcet_rank').val();
		 var ps=$('#ps').val();
		 var sg=$('#sg').val();
		 $.ajax({  
                url:"adddrive.php",  
                method:"POST",  
                data:{update:1,id:id,insert:0,deleted:0,companyname:companyname,date:date,packages:packages,passoutyear:passoutyear,btechp:btechp,interp:interp,schoolp:schoolp,branch:branch,backlogs:backlogs,hbacklogs:hbacklogs,ps:ps,sg:sg,gender:gender,eamcetrank:eamcetrank},    
                success:function(data){
					$('#myModal').scrollTop(0);
					$('#msgs').html(data);
					$("#inserted").show().delay(5000).fadeOut();  
                      window.setTimeout(function(){location.reload()},6000) 
                }  
         });
		 
		 
	 });
	$(document).on("click", ".delete", function(){
		var data_row = table.row($(this).closest('tr')).data();
		var x=$(this).parents("tr");
		
		$.confirm({
			title: 'Confirm!',
			content: 'Are You Sure to Delete Rollno:'+data_row[0]+'?',
			buttons: {
				confirm: function () {
					$.ajax({  
						url:"adddrive.php",  
						method:"POST",  
						data:{deleted:1,update:0,insert:0,id:data_row[0]},
						success:function(data){
							$(window).scrollTop(0);
							$('#msg').html(data);
							$("#msg").show().delay(5000).fadeOut(); 
							setTimeout(function(){location.reload();}, 5000); 
							x.remove();
						
						},  
					});
				},
				cancel: function () {
					return 1;
				},
        
			}	
		});
		
		
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