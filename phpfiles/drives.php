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
		.submit,#update{
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
		.card{
			  border-radius: .80rem;
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
                          <a class="nav-link active" aria-current="page" href="drives.php">
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
                        <li class="breadcrumb-item">Drives</li>
                    </ol>
                </nav>
                <h1 class="text-center">
					DRIVES
				</h1>
				<?php
					$rcompanyname='';
						$rdate='';
						$rpassouts='';
						$rpackage='';
						
						$rbranches='';
						
						$rbtechp='';
						$rinterp='';
						$rschoolp='';
						$rbacklogs='';
						$rhbacklogs='';
						$gander='';
						$eamcetrank='';
					//
					$date=date("Y-m-d");
					$recentcompany="Select * from placements where date <'$date' and status='COMPLETED' Order by date DESC  limit 1";
					$companyquery=mysqli_query($conn,$recentcompany);
					While($row=mysqli_fetch_array($companyquery))
					{
						$rid=$row['id'];
						$rcompanyname=$row['companyname'];
						$rdate=date("d/m/Y", strtotime($row['date']));
						$rpassouts=$row['passouts'];
						$rpackage=$row['package'];
						if($row['branches']=="CSE IT ECE EEE MECH ANE"){
							$rbranches="ALL";
						}
						else{
							$rbranches=$row['branches'];
						}
						$rbtechp=$row['btechp'];
						$rinterp=$row['interp'];
						$rschoolp=$row['schoolp'];
						$rbacklogs=$row['backlogs'];
						$rhbacklogs=$row['hbacklogs'];
						$gander=$row['gender'];
						$eamcetrank=$row['eamcetrank'];
						
					}
				?>
				<div class="container">
					<div class="row">
						<div class="col-md-6 mt-5">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body py-2 add" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('.submit').show(); $('#update').hide();  $('#drive_form')[0].reset();">
											<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cloud-plus-fill text-primary p-0" viewBox="0 0 16 16">
												<path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
											</svg>
											<span class="p-0">ADD DRIVE</span>
										</div>
									</div>
								</div>
								<div class="col-md-12 mt-4">
									<div class="card">
										<h5 class="card-header">Recently Visited Company</h5>
										<div class="card-body">
											<div class="row">
												<div class="col-md-3">
													<img src="https://3.imimg.com/data3/FH/CY/MY-10539386/placement-services-250x250.png" class="round-50" height="100%" width="100%">
												</div>
												<div class="col-md-9">
													<h1><?php echo $rcompanyname; ?></h1>
													<div class="row">
														<div class="col-md-5">
															Date: <span class="text-primary text-decoration-underline"><?php echo $rdate; ?></span>
														</div>
														<div class="col-md-7 p-0">
															Passouts: <span class="text-info text-decoration-underline"><?php echo $rpassouts; ?></span>
														</div>
														<div class="col-md-5">
															Package: <span class="text-primary text-decoration-underline"><?php echo $rpackage; ?></span>
														</div>
														<div class="col-md-7 p-0">
															Branches:<span class="text-success text-decoration-underline"><?php echo $rbranches; ?></span>
														</div>
													</div>	
												</div>
											</div>
											<div class="row bg-light mt-2">
												<div class="col-md-4">
													10th &ge; <span class="text-primary"><?php echo $rschoolp; ?></span>
												</div>
												<div class="col-md-4">
													INTER/DIPLOMA &ge; <span class="text-primary"><?php echo $rinterp; ?></span>
												</div>
												<div class="col-md-4">
													BTECH &ge;<span class="text-primary"><?php echo $rbtechp; ?></span>
												</div>
												<div class="col-md-6">
													<span>Backlogs &le; </span> <span class="text-primary"><?php echo $rbacklogs; ?></span>
												</div>
												<div class="col-md-6">
													<span>HBacklogs &le; </span><span class="text-primary"><?php echo $rhbacklogs; ?></span>
												</div>
											</div>
											<div class="mt-3">
												<form action="eligible_students.php" method="Post"><button type="submit" class="btn btn-primary" name="students" value="<?php echo $rid; ?>">Students</button></form>
												
											
												<div class="text-end">
													<span>Status:</span><span class="text-success text-decoration-underline">Completed</span>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-md-6 mt-5">
							<div class="card">
								<h5 class="card-header text-center">Upcoming Drives</h5>
								<div class="card-body" style="height: 330px; overflow-y: scroll">
									<div class="table-responsive">
										<table class="table table table-striped">
											<thead>
											<tr>
												<th scope="col">Comapany_Name</th>
												<th scope="col">Date</th>
												<th scope="col">Passoutyear</th>
												<th scope="col">Eligible Branches</th>
											</tr>
											</thead>
											<tbody>
												<?php
													$date=date("Y-m-d");
													$students="Select * from placements where date >'$date' and status='PENDING' Order by date  limit 5";
													$studentsquery=mysqli_query($conn,$students);
													While($row=mysqli_fetch_array($studentsquery))
													{
														echo "<tr>";
														echo "<th scope='row'>".$row['companyname']."</th>";
														echo "<td>".date("d/m/Y", strtotime($row['date']))."</td>";
														echo "<td>".$row['passouts']."</td>";
														echo "<td>".$row['branches']."</td>";
														echo "</tr>";
														
													}
												?>
											
											
											</tbody>
										</table>
									</div>
									
								</div>
								<a href="upcoming_drives.php" class="btn btn-block card-footer btn-light w-100 m-0 p-1">View all</a>
						
							</div>
						</div>
					</div>
				</div>
				<div class="container">
		
					<div class="row">
						
						<?php
							$dates=date('Y-m-d',strtotime("-30 days"));
							$companys="Select * from placements where date >='$dates' and status='PENDING' Order by date  limit 6";
							$companysquery=mysqli_query($conn,$companys);
							While($row=mysqli_fetch_array($companysquery))
							{
								?>
								<div class="col-md-6 mt-2 mx-auto" id="company">
									<div class="row">
										<div class="au-card p-2">
										<div class="card">
										<div class="card-body">
											<button class="btn-close close float-end"  data-target="#company" aria-expanded="false" onclick="$(this).parents('#company').fadeOut()";></button>
											<div class="row">
												<div class="col-md-3">
													<img src="https://3.imimg.com/data3/FH/CY/MY-10539386/placement-services-250x250.png" class="round-50" height="100%" width="100%">
												</div>
												<div class="col-md-9">
													<h1><?php echo $row['companyname']; ?></h1>
													<div class="row">
														<div class="col-md-5 p-0">
															Date:<span class="text-primary text-decoration-underline"><?php echo date("d/m/Y", strtotime($row['date'])); ?></span>
														</div>
														<div class="col-md-7 p-0">
															Passouts:<span class="text-info text-decoration-underline"><?php echo $row['passouts']; ?></span>
														</div>
														<div class="col-md-5 p-0">
															Package:<span class="text-primary text-decoration-underline"><?php echo $row['package']; ?></span>
														</div>
														<div class="col-md-7 p-0">
															Branches:<span class="text-success text-decoration-underline branches"><?php if($row['branches']=="CSE IT ECE EEE MECH ANE"){ echo "ALL"; }else{ echo $row['branches'];} ?></span>
														</div>
													</div>	
												</div>
											</div>
											<div class="row bg-light mt-2">
												<div class="col-md-4">
													10th &ge; <span class="text-primary"><?php echo $row['schoolp']; ?></span>
												</div>
												<div class="col-md-4">
													INTER/DIPLOMA &ge; <span class="text-primary"><?php echo $row['interp']; ?></span>
												</div>
												<div class="col-md-4">
													BTECH &ge; <span class="text-primary"><?php echo $row['btechp']; ?></span>
												</div>
												<div class="col-md-6">
													<span>Backlogs &le;</span> <span class="text-primary"> <?php echo $row['backlogs']; ?></span>
												</div>
												<div class="col-md-6">
													<span>HBacklogs &le;</span><span class="text-primary"> <?php echo $row['hbacklogs']; ?></span>
												</div>
											</div>
											<div class="mt-3 pb-0">
												<form class="d-inline" action="eligible_students.php" method="POST"><button type="submit" class="btn btn-primary students" name="students" value="<?php echo $row['id']; ?> ">Students</button></form>
												<button type="button" class="btn btn-primary update d-inline" value="<?php echo $row['id']; ?> " data-bs-toggle="modal" data-bs-target="#myModal">Update</button>
												
											
												<div class="text-end pb-0">
													<span>Status:</span><span class="text-warning text-decoration-underline"><?php echo $row['status']; ?></span>
												</div>
											</div>
										</div>
									</div>
									</div>
									</div>
								</div>
								<?php
							
							}	
						?>
					</div>
					
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
									<h2 class="text-center mb-5 mt-3 title">ADD DRIVE</h2>
									<div id="inserted" class="text-center mx-auto my-auto mb-3">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
										<span id='msg'>
											
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
												$sql = "SELECT distinct passoutyear from students order by passoutyear DESC LIMIT 6 ";
												$query=mysqli_query($conn,$sql);
												While($row=mysqli_fetch_array($query))
												{
													echo "<option>".$row['passoutyear']."</option>";
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
												<span class="input-group-text" id="basic-addon1"> &gt </span>
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
										<input class="btn btn-primary submit" type="submit" name="submit" value="submit">
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
function marks(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9.]/.test(ch))){
            evt.preventDefault();
        }
        
    }
$(document).ready(function () {
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
	$('#schoolp').focusout(function(){
		var marks=$(this).val();
		if(marks>10){
			$(this).addClass('is-invalid');
			
		}else{
			$(this).removeClass('is-invalid');
			

	
		}
	 });

	 
	$('#interp').focusout(function(){
		var marks=$(this).val();
		if(marks>10){
			$(this).addClass('is-invalid');
		}else{
			$(this).removeClass('is-invalid');
	
		}
	 });
	 $('#btechp').focusout(function(){
		var marks=$(this).val();
		if(marks>10){
			$(this).addClass('is-invalid');
		}else{
			$(this).removeClass('is-invalid');
			
		}
		
	 });
	 $('.submit').click(function(e){
		 e. preventDefault();
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
                data:{insert:1,update:0,deleted:0,companyname:companyname,date:date,packages:packages,passoutyear:passoutyear,btechp:btechp,interp:interp,schoolp:schoolp,branch:branch,backlogs:backlogs,hbacklogs:hbacklogs,ps:ps,sg:sg,gender:gender,eamcetrank:eamcetrank},    
                success:function(data){
					$('#myModal').scrollTop(0);
					$('#msg').html(data);
					 $("#inserted").show().delay(5000).fadeOut();  
                      
                }  
         });
		 
		 
	 });
	 $('.update').click(function(e){
		 $('#drive_form')[0].reset();
		 var id=$(this).val();
		 $('.submit').hide();
		 $('#update').show();
		 $.ajax({
           url:'company_details.php',
           method:'POST',
           data:{id:id},
		   dataType:"JSON",
           success:function(data){
			  $('#companyname').val(data.companyname);
			  $('#date').val(data.date);
			  $('#package').val(data.package);
			  $('#passoutyear').val(data.passouts).change();
			  $('#btechp').val(data.btechp);
			  $('#interp').val(data.interp);
			  $('#schoolp').val(data.schoolp);
			  $('#gender').val(data.gender);
			  $('#eamcet_rank').val(data.eamcetrank);
			  if(data.branches=="CSE IT ECE EEE MECH ANE"){
				  $('.all').click();
			  }else{
				  
				$('.branch').each(function () {
					if (data.branches.includes($(this).val())) {
						$(this).click();
					}
					else{
						$(this).prop("checked", false);
					}
				});
			  }
			  $('#backlogs').val(data.backlogs);
			  $('#hbacklogs').val(data.hbacklogs);
			  $('#ps').val(data.previouslyplaced).change();
			  $('#sg').val(data.studygap).change();
			  $('#update').val(id);
		   }
		});
	 });
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
		 var ps=$('#ps').val();
		 var sg=$('#sg').val();
		 var gender=$('#gender').val();
		 var eamcetrank=$('#eamcet_rank').val();
		 $.ajax({  
                url:"adddrive.php",  
                method:"POST",  
                data:{update:1,id:id,insert:0,deleted:0,companyname:companyname,date:date,packages:packages,passoutyear:passoutyear,btechp:btechp,interp:interp,schoolp:schoolp,branch:branch,backlogs:backlogs,hbacklogs:hbacklogs,ps:ps,sg:sg,gender:gender,eamcetrank:eamcetrank},    
                success:function(data){
					$('#myModal').scrollTop(0);
					$('#msg').html(data);
					$("#inserted").show().delay(5000).fadeOut();  
                      window.setTimeout(function(){location.reload()},6000) 
                }  
         });
		 
		 
	 });
});
</script>
    
       

</html>