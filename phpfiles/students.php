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
		
	

		.get_in_touch_{
			max-width:800px;
			margin:50px auto;
			position:relative;
			box-shadow:0 10px 30px 0px rgba(0,0,0,0.1);
			padding:30px;
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
		.contact-form .form-field{
			position:relative;
			margin:32px 0;
		}
		.contact-form .input-text{
			display:block;
			width:100%;
			height:100%;
			border-width:0 0 2px 0;
			border-color:#5543ca;
			font-size:18px;
			line-height:26px;
			font-weight:400;
			
		}
		.contact-form .input-text:focus{
			outline:none;
		}
		.contact-form .label{
			position:absolute;
			left:20px;
			bottom:11px;
			font-size:18px;
			line-height:26px;
			font-weight:26px;
			color:#5543ca;
			cursor:text;
			transition:transform 0.2s ease-in-out;
			text-transform:capitalize;
		}
		.contact-form .update_submit{
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
		
			
		.contact-form .input-text:focus +.label,
		.contact-form .input-text:valid +.label,
		.contact-form .input-text.not-empty+ .label{
			transform:translateY(-27px);
		}
		.btn-close{
			float:right;
			top:-10px;
		}
		.dob{
			transform:translateY(-24px);
		}
		.rollno{
			transform:translateY(-24px);
		}
.progress {
    position: relative;
    overflow: inherit;
    height: 6px;
    margin: 30px 0px 15px;
    width: 100%;
    display: inline-block;
    border-radius: 10px;
}

.progress .progress-bar {
    height: 6px;
    background: #009b72;
    border-radius: 10px;
}

.progress .progress-bar-title {
    position: absolute;
    left: 0;
    top: -30px;
    color: #818181;
    font-size: 16px;
}

.progress .progress-bar-number {
    position: absolute;
    right: 0;
    color: #888888;
    top: -30px;
    font-weight: 600;
    font-size: 14px;
}
.media {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
}

.media-body {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
}

.text-black {
    color: #000000;
}

.font-weight-normal {
    font-weight: 500 !important;
}
.w-25 {
    width: 25% !important;
}
.text-muted {
    color: #b2b2b2 !important;
}
.mr-1, .mx-1 {
    margin-right: 0.625rem !important;
}
.right{
	text-align:right;
}
	@media(max-width:480px){
			.line{
				border-bottom:1px solid grey;
			}
			.right{
				text-align:left;
			}
				
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
                    <ol class="breadcrumb p-1">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item" aria-current="page">Students</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5">
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
				<div id="msg" class="text-center"></div>
					<table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr class="bg-warning">
								<th>Roll_Number</th>
								<th>Full_Name</th>
								<th>Gender</th>
								<th>Date_of_Birth</th>
								<th>Father_Name</th>
								<!--<th>Father_Mobile</th>-->
								<th>Mother_Name</th>
								<th>Gmail</th>
								<th>Alternative_Gmail</th>
								<!--<th>College_mail</th>-->
								<th>Mobile_Number1</th>
								<th>Mobile_Number2</th>
								<!--<th>Caste</th>-->
								<th>Adhar_Number</th>
								<th>Pancard_Number</th>
								<th>10th_percentage/Cgpa</th>
								<!--<th>School_Name</th>
								<th>10th_Board</th>
								<th>Year_of_10th</th>
								<th>After_10th</th>
								<th>Inter/Dipolma_Board</th>
								<th>Inter/Diploma_Year</th>
								<th>Place_of_Birth</th>
								<th>Eamcet_Rank</th>
								<th>Histroy_Backlogs</th>
								-->
								<th>Inter/Diploma_Percentage/Cgpa</th>
								<th id='branches'>Branch</th>
								<th id='sections'>Section</th>
								<th>Btech_Batch</th>
								<th>Btech_Cgpa</th>
								<th>Backlogs</th>
								<th id='batch'>Passoutyear</th>
								<th>Address</th>
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
									echo "<td>".date("d-m-Y", strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$row['fathername']."</td>";
									echo "<td>".$row['mothername']."</td>";
									//echo "<td>".$row['fathermobile']."</td>";
									echo "<td>".$row['gmail']."</td>";
									echo "<td>".$row['altgmail']."</td>";
									//echo "<td>".$row['clgmail']."</td>";
									echo "<td>".$row['mobilenumber']."</td>";
									echo "<td>".$row['mobilenumber2']."</td>";
									//echo "<td>".$row['caste']."</td>";
									echo "<td>".wordwrap($row['adharnumber'], 4, '-',true)."</td>";
									echo "<td>".$row['pancard']."</td>";
									echo "<td>".$row['schoolp']."</td>";
									/*echo "<td>".$row['schoolname']."</td>";
									echo "<td>".$row['schoolboard']."</td>";
									echo "<td>".$row['schoolyear']."</td>";
									echo "<td>".$row['after10th']."</td>";*/
									echo "<td>".$row['interp']."</td>";
									/*echo "<td>".$row['board']."</td>";
									echo "<td>".$row['interyear']."</td>";
									echo "<td>".$row['placeofbirth']."</td>";
									echo "<td>".$row['eamcetrank']."</td>";*/
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['section']."</td>";
									echo "<td value=".$row['passoutyear'].">".$row['btechbatch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									//echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$row['passoutyear']."</td>";
									echo "<td>".$row['address']."</td>";
									echo '<td>
											<a href="#" class="me-1 text-primary text-decoration-none view" data-bs-toggle="modal" data-bs-target="#myModal">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
												<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
												<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
											</svg>
											</a>
											<a href="#" class="me-1 text-dark text-decoration-none edit" id="" data-bs-toggle="modal" data-bs-target="#exampleModal">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
												<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
												<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
											</svg>
											</a>
											<a href="#" class="text-danger text-decoration-none delete">
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
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<button type="button" class="btn-close float-right" data-bs-dismiss="modal" aria-label="Close"></button>
								<section class="get_in_touch">
									<h1 class="title mb-5">Student Details</h1>
									<div id="inserted" class="text-center mx-auto my-auto mb-3">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
										<span id='updatemsg'>
											
										</span>
									</div>	
								<form method="post">
									<div class="container">
										<div class="contact-form row">
											<div class="form-field col-lg-4">
												<input id="rollno" class="input-text" type="text" required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="rollno" class="label">ROLL NO</label>
											</div>
											<div class="form-field col-lg-8">
												<input id="name" class="input-text" type="text" required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="name" class="label">FULL NAME</label>
											</div>
											<div class="form-field col-lg-4">
												<select id="gender" class="input-text" required="">
													<option>MALE</option>
													<option>FEMALE</option>
												</select>	
												<label for="gender" class="label">GENDER</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="dob" class="input-text" type="date" required="">
												<label for="dob" class="label dob">DATE OF BIRTH</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="number1" class="input-text form-control" type="number_format" maxlength='10' onkeypress="isInputNumber(event)"   required="">
												<label for="number1" class="label">MOBILE NUMBER</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="number2" class="input-text form-control" type="number_format" maxlength='10' onkeypress="isInputNumber(event)"   required="">
												<label for="number2" class="label">ALTERNATIVE MOBILE NUMBER</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="fathername" class="input-text" type="text"  required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="fathername" class="label">FATHER NAME</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="fathernumber" class="input-text form-control" type="number_format" maxlength='10' onkeypress="isInputNumber(event)"   required="">
												<label for="fathernumber" class="label">MOTHER NAME</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="gmail" class="input-text form-control" type="email"  required="">
												<label for="gmail" class="label">GMAIL</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="altgmail" class="input-text form-control" type="email"  required="">
												<label for="altgmail" class="label">ALTERNATIVE GMAIL</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="clgmail" class="input-text form-control" type="text"  required="">
												<label for="clggmail" class="label">COLLEGE MAIL</label>
											</div>
											
											<div class="form-field col-lg-4">
												<input id="caste" class="input-text form-control" type="number_format"  required="">
												<label for="caste" class="label">CASTE</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="adhar" class="input-text form-control" type="number_format" onkeypress="isInputNumber(event)" onkeyup="addHyphen(this)" maxlength='14'  required="">
												<label for="adhar" class="label">ADHAR NUMBER</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="pan" class="input-text" type="number_format" maxlength='10'  required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="pan" class="label">PANCARD NUMBER</label>
											</div>
											
											<hr>
											<h4>EDUCATION DETAILS</h4>
											<div class="form-field col-lg-3">
												<input id="schoolp" class="input-text form-control mb-0" type="number_format" maxlength='4' onkeypress="marks(event)" required="">
												
												<label for="schoolp" class="label">10TH PERCENTAGE/CGPA</label>
												
											</div>
											<div class="form-field col-lg-6">
												<input id="schoolname" class="input-text" type="text" required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="schoolname" class="label">SCHOOL NAME</label>
											</div>
											<div class="form-field col-lg-3 ">
												<select id="schoolboard" class="input-text"  required="">
													<option>SSC Board</option>
													<option>CBSE Board</option>
													<option>ICSE Board</option>
													<option>Other State Board</option>
													
												</select>	
												<label for="schoolboard" class="label">SSC Board</label>
											</div>
											
											<div class="form-field col-lg-4 ">
												<select id="schoolyear" class="input-text"  required="">
													<option></option>
													
												</select>	
												<label for="schoolyear" class="label">YEAR OF PASS</label>
											</div>
											<div class="form-field col-lg-4 ">
												<select id="after10th" class="input-text"  required="">
													<option>Intermediate</option>
													<option>Diploma</option>
													<option>Other</option>
													
													
												</select>	
												<label for="after10th" class="label">After 10Th/SSC</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="interp" class="input-text form-control mb-0" type="number_format" maxlength='4' onkeypress="marks(event)"  required="">
												
												<label for="interp" class="label">INTER/DIPLOMA PERCENTAGE/CGPA</label>
												
											</div>
											<div class="form-field col-lg-6">
												<input id="board" class="input-text" type="text" required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="board" class="label">INTERMEDIATE/DIPOLMA Board</label>
											</div>
											
											
											<div class="form-field col-lg-2 ">
												<select id="interyear" class="input-text" required="">
												
													
												</select>	
												<label for="interyear" class="label">YEAR OF PASS</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="placeofbirth" class="input-text" type="text" required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="placeofbirth" class="label">Place of Birth</label>
											</div>
											<div class="form-field col-lg-4 ">
												<select id="mode" class="input-text"  required="">
													<option>EAMCET</option>
													<option>ECET(Diploma)</option>
													<option>Management Category</option>
													
													
												</select>	
												<label for="mode" class="label">Btech Admission Category</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="eamcetrank" class="input-text form-control" type="number_format" maxlength='10' onkeypress="isInputNumber(event)"   required="">
												<label for="eamcetrank" class="label">EAMCET/ECET RANK</label>
											</div>
											<div class="form-field col-lg-4">
												<select id="branch" class="input-text" required="">
													<option>CSE</option>
													<option>IT</option>
													<option>ECE</option>
													<option>EEE</option>
													<option>MECH</option>
													<option>ANE</option>
												</select>
												<label for="branch" class="label">BRANCH</label>
											</div>
											<div class="form-field col-lg-4">
												<select id="section" class="input-text" required="">
													<option> </option>
													<option>A</option>
													<option>B</option>
													<option>C</option>
													<option>D</option>
													
												</select>
												<label for="section" class="label">SECTION</label>
											</div>
											<div class="form-field col-lg-4">
												<select id="btechbatch" class="input-text" required="">
													
													
												</select>
												<label for="btechbatch" class="label">BATCH</label>
											</div>
											
											<div class="form-field col-lg-4">
												<input id="btechp" class="input-text form-control mb-0" type="number_format" maxlength='4' onkeypress="marks(event)" required="">
												
												<label for="btechp" class="label">BTECH CGPA</label>
												
											</div>
											
											<div class="form-field col-lg-4">
												<input id="backlogs" class="input-text" type="number" min="0" value="0" max="15" maxlength="2" onkeypress="isInputNumber(event)" required="">
												<label for="backlogs" class="label">BACKLOGS</label>
											</div>
											<div class="form-field col-lg-4">
												<input id="hbacklogs" class="input-text" type="number" min="0"  value="0" max="15" maxlength="2" onkeypress="isInputNumber(event)" required="">
												<label for="hbacklogs" class="label">HISTORY BACKLOGS</label>
											</div>
											
											<div class="form-field col-lg-4">
												<select id="passoutyear" class="input-text"  required="">
													
													
												</select>
												<label for="passoutyear" class="label">PASSOUT YEAR</label>
											</div>
											<hr>
											<h4>ADDRESS </h4>
											<div class="form-field col-lg-6">
												<input id="street" class="input-text" type="text"  required="">
												<label for="street" class="label">ADDRESS</label>
											</div>
											<div class="form-field col-lg-3">
												<input id="state" class="input-text" type="text" required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="state" class="label">STATE</label>
											</div>
											<div class="form-field col-lg-3">
												<input id="country" class="input-text" type="text"  required="" onkeyup="this.value = this.value.toUpperCase();">
												<label for="country" class="label">COUNTRY</label>
											</div>
											<div class="form-field col-lg-12 text-center">
												<input class="btn btn-primary update_submit" type="submit" value="submit">
											</div>
										</div>
									</div>
								</form>
								</section>
							</div>
						
						</div>
					</div>
				</div>
				<!-- set up the modal to start hidden and fade in and out -->
				<div id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- dialog body -->
							<div class="modal-body">
								<button type="button" class="btn-close float-right" data-bs-dismiss="modal" aria-label="Close"></button>
								<h1 class="title mb-5">Student Details</h1>
								
								<div class="container">
									<div class="row">
										<div class="col-lg-5 col-md-6">
											<div class="mb-2">
											<img class="w-100 simage" src="" onerror="this.src='https://www.bootdey.com/img/Content/avatar/avatar7.png'" height="350px" alt="">
											</div>
											<div class="mb-2 d-flex">
											<h4 class="font-weight-normal  text-primary mx-auto srollno">John Doe</h4>
											
											</div>
											<div class="mb-2">
												<div class="row">
												
													<p class="col-md-4 p-0 font-weight-normal right">FULL NAME:</p><p class="line col-md-8 p-0 sname"></p>
													<p class="col-md-4 p-0 font-weight-normal right">GENDER:</p><p class="line col-md-8 p-0 sgender"></p>
													<p class="col-md-4 p-0 font-weight-normal right">DATE OF BIRTH:</p><p class="line col-md-8 p-0 sdob"></p>
													<p class="col-md-4 p-0 font-weight-normal right">FATHER NAME:</p><p class="line col-md-8 p-0 sfathername"></p>
													
												
												
											</div>
										
											</div>
										</div>
										<div class="col-lg-7 col-md-6 pl-xl-3">
											<h5 class="font-weight-normal">COMMUNICATION DETAILS</h5>
											<ul class="list-unstyled">
												<li class="media">
												<span class="text-black font-weight-normal">ADDRESS:</span>
												<label class="media-body saddress"></label>
												</li>
												<li class="media">
												<span class="text-black font-weight-normal ">Mobile Number: </span>
												<label class="media-body smobile">10  Years</label>
												</li>
												<li class="media">
												<span class="w-25 text-black font-weight-normal ">GMAIL: </span>
												<label class="media-body sgmail"></label>
												</li>
												<li class="media">
												<span class="text-black font-weight-normal">ADHAR NUMBER: </span>
												<label class="media-body sadharno"></label>
												</li>
												<li class="media">
												<span class="text-black font-weight-normal">PANCARD NUMBER: </span>
												<label class="media-body spanno"></label>
												</li>
												
											</ul>
											<hr>
											<h4 class="font-weight-normal text-center">EDUCATION DETAILS</h4>
											<div class="my-2 bg-light p-2">
											<div class="row">
												<h5>SCHOOL DETAILS</h5>
												<div class="col-md-12">
													<span class="text-black font-weight-normal">NAME OF THE SCHOOL: </span><label class="sschoolname text-uppercase"> </label>
												</div>
												<div class="col-md-6">
													<span class="text-black font-weight-normal">10th PERCENTAGE/CGPA: </span><label class="sschoolp"></label>
												</div>
												<div class="col-md-6">
													<span class="text-black font-weight-normal">10th PASSOUTYEAR: </span><label class="sschoolyear"></label>
												</div>
											</div>
											</div>
											<div class="row">
												<h5>AFTER_10TH DETAILS</h5>
												<div class="col-md-12">
													<span class="text-black font-weight-normal">INTERMEDIATE/DIPLOMA: </span><label class="sintername text-bold text-uppercase"></label>
												</div>
												<div class="col-md-6">
													<span class="text-black font-weight-normal">PERCENTAGE/CGPA: </span><label class="sinterp"></label>
												</div>
												<div class="col-md-6">
													<span class="text-black font-weight-normal">BATCH: </span><label class="sinteryear"></label>
												</div>
											</div>
											<div class="my-2 bg-light p-2 ">
											<h5 class="font-weight-normal">BTECH DETAILS</h5>
											<div class="row">
												<div class="col-md-6">
													<span class="text-black font-weight-normal">BATCH: </span><label class="sbtechbatch"></label>
												</div>
												<div class="col-md-6">
													<span class="text-black font-weight-normal">BRANCH: </span><label class="sbranch"></label>
												</div>
												<div class="col-md-4">
													<span class="text-black font-weight-normal">CGPA: </span><label class="sbtechp"></label>
												</div>
												<div class="col-md-3">
													<span class="text-black font-weight-normal">BACKLOGS: </span><label class="sbacklogs"></label>
												</div>
												<div class="col-md-5">
													<span class="text-black font-weight-normal">HISTORY BACKLOGS: </span><label class="shbacklogs"></label>
												</div>
											</div>
											</div>
											<div class="mb-2 mt-2 pt-1">
												<h5 class="font-weight-normal">Skill</h5>
											</div>
											<div class="py-1">
											<div class="progress">
												<div class="progress-bar cbtechp" role="progressbar" style="width:10%" aria-valuenow="8.5" aria-valuemin="0" aria-valuemax="10">
												<div class="progress-bar-title">BTECH CGPA</div>
												<span class="progress-bar-number sbtechp"></span>
												</div>
											</div>
											</div>
											<div class="py-1">
											<div class="progress">
												<div class="progress-bar cinterp" role="progressbar" style="width:95%" aria-valuenow="9.5" aria-valuemin="0" aria-valuemax="10">
												<div class="progress-bar-title">INTER/DIPLOMA CPGA</div>
												<span class="progress-bar-number sinterp"></span>
												</div>
											</div>
											</div>
											<div class="py-1">
											<div class="progress">
												<div class="progress-bar cschoolp" role="progressbar" style="width:77%" aria-valuenow="7.7" aria-valuemin="0" aria-valuemax="10">
												<div class="progress-bar-title">10TH CGPA</div>
												<span class="progress-bar-number sschoolp"></span>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
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
	var groupColumn=19;
    var table = $('#example').DataTable( {
        lengthChange: false,
		select: true,
		buttons: [
			 {
                extend: 'colvisGroup',
                text: 'Basic info',
                hide: [12,13,17,18],
				show:[1,2,3,4,5,6,7,8,9,10,14,15,16,19,20]
            },
            {
                extend: 'colvisGroup',
                text: 'Education info',
                hide: [6,7,8,9,10,11,20],
				show:[1,2,3,4,5,12,13,14,15,16,17,18,19]
            },
			{
                extend: 'colvisGroup',
                text: 'Marks info',
                hide: [3,4,5,6,7,8,9,10,11,20],
				show:[1,2,12,13,14,15,16,17,18,19]
            },
            {
                extend: 'colvisGroup',
                text: 'All',
                show: ':hidden',
				
            },
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
							?>{ text: <?php echo "'".$row['branch']."'"; ?>,   action: function () { table.columns("#branches").search(<?php echo "'".$search."'"; ?>, true, false).draw();} },<?php
					
						}
					?>
					
				],
				fade: true
			},
			{
				extend: 'collection',
				text: 'Section',
				buttons: [
					<?php
						$sql = "SELECT distinct section from students order by section";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							$search="^".$row['section']."$";
							?>{ text: <?php echo "'".$row['section']."'"; ?>,   action: function () { table.columns("#sections").search(<?php echo "'".$search."'"; ?>, true, false).draw();} },<?php
					
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
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group bg-primary text-light"><td colspan="33">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
	var printCounter=0;
    table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
	var buttons = new $.fn.dataTable.Buttons(table, {
		buttons: [
			{
			 extend: 'print',
			 messageTop: function () {
				 var batch=$("#passoutyears").val();
				 if(batch==" ")
					batch="All"
                 return batch+' Batch Details'; 
			 },
			 title:"MRCET"
			},
			{
				
				extend:'csvHtml5',
				title:function () {
				 var batch=$("#passoutyears").val();
				 if(batch==" ")
					batch="All"
                 return batch+' Batch Details'; 
				},
				messageTop:"MRCET"
				
			},
			{
				
				extend:'excelHtml5',
				title:function () {
				 var batch=$("#passoutyears").val();
				 if(batch==" ")
					batch="All"
                 return batch+' Batch Details'; 
				},
				messageTop:"MRCET"
				
			},
			{
				
				extend:'pdfHtml5',
				title:function () {
				 var batch=$("#passoutyears").val();
				 if(batch==" ")
					batch="All"
                 return batch+' Batch Details'; 
				},
				messageTop:"MRCET"
				
			},
			
			
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
		const d = new Date();
		let year = d.getFullYear();
		$("#passoutyears").val(year).change();
	$("#passoutyears").change(function() {
         table.columns("#batch").search(this.value ).draw();
	});
	var gmail=schoolp=interp=btechp=number=adhar=pan=true;
	$('.view').on('click', function () {
		var data_row = table.row($(this).closest('tr')).data();
		$('.sbtechbatch').html(data_row[16]);
		$('.srollno').html(data_row[0]);
		$('.sname').html(data_row[1]);
		$('.sgender').html(data_row[2]);
		$('.sdob').html(data_row[3]);
		$('.snumber').html(data_row[8]);
		$('.sfathername').html(data_row[4]);
		$('.sgmail').html(data_row[6]);
		$('.sadharno').html(data_row[10].replace(/\B(?=(\d{4})+(?!\d))/g, "-"));
		$('.spanno').html(data_row[11]);
		$('.saddress').html(data_row[20]);
		//$('.sschoolname').html(data_row[15]);
		$('.sschoolp').html(data_row[12]);
		//$('.sintername').html(data_row[18]);
		$('.sinterp').html(data_row[13]);
		//$('.sinteryear').html(data_row[21]);
		$('.sbranch').html(data_row[14]);
		$('.sbtechp').html(data_row[17]);
		$('.sbacklogs').html(data_row[18]);
		//$('.shbacklogs').html(data_row[29]);
		$('.spassoutyear').html(data_row[19]);
		//$('.sschoolyear').html(data_row[17]);
		if(data_row[17] <10 ){
			var bpercentage=(Number(data_row[17])+Number(0.5))*10;
		}else{
			bpercentage=data_row[17];
		}
		if(data_row[13] <10){
			var ipercentage=(Number(data_row[13])+Number(0.5))*10;
		}
		else{
			ipercentage=data_row[13];
			
		}
		if(data_row[12] <10){
			var spercentage=(Number(data_row[12])+Number(0.5))*10;
		}
		else{
			spercentage=data_row[12];
		}
		$('.cbtechp').css("width", bpercentage+"%");
		$('.cinterp').css("width", ipercentage+"%");
		$('.cschoolp').css("width", spercentage+"%");
		$('.simage').attr('src','../images/'+data_row[0]+'.jpg');
	});
	$('.edit').on('click', function () {
		var data_row = table.row($(this).closest('tr')).data();
		batch(data_row[0]);
		$('#btechbatch').append('<option value="${data_row[16]}">${data_row[16]}</option>');
		$('#btechbatch').val(data_row[16]).change();
		$('#rollno').val(data_row[0]);
		$('#name').val(data_row[1]);
		$('#gender').val(data_row[2]);
		$('#dob').val(data_row[3].split("-").reverse().join("-"));
		$('#number1').val(data_row[8]);
		$('#number2').val(data_row[9]);
		$('#fathername').val(data_row[4]);
		$('#fathernumber').val(data_row[5]);
		$('#gmail').val(data_row[6]);
		$('#altgmail').val(data_row[7]);
		$('#clgmail').val(data_row[8]);
		$('#adhar').val(data_row[10]);
		$('#pan').val(data_row[11]);
		//$('#caste').val(data_row[11]);
		$('#street').val(data_row[20]);
		//$('#schoolboard').val(data_row[16]);
		//$('#schoolname').val(data_row[15]);
		$('#schoolp').val(data_row[12]);
		//$('#after10th').val(data_row[18]);
		//$('#board').val(data_row[20]);
		$('#interp').val(data_row[13]);
		$('#interyear').val(data_row[21]).change();
		//$('#placeofbirth').val(data_row[22]);
		//$('#eamcetrank').val(data_row[23]);
		$('#branch').val(data_row[14]);
		$('#section').val(data_row[15]);
		$('#btechp').val(data_row[17]);
		$('#backlogs').val(data_row[18]);
		//$('#hbacklogs').val(data_row[29]);
		
		$('#passoutyear').val(data_row[19]);
		$('#schoolyear').val(data_row[17]).change();
		
	} );
	function batch(rollno){
		$('#btechbatch').empty();
		var year1=20+rollno.substring(0,2);
		var year2=Number(year1)+Number(4);
		var year3=Number(year1)+Number(3);
		$('#btechbatch').append('<option></option>');
		$('#btechbatch').append('<option>'+year1+'-'+year2+'</option>');
		$('#btechbatch').append('<option>'+year1+'-'+year3+'</option>');
	}
	$('.update_submit').click(function(e){
		 e. preventDefault();
		
		 var rollno=$('#rollno').val();
		 var name=$('#name').val();
		 var gender=$('#gender').val();
		 var dob=$('#dob').val();
		 var mobile1=$('#number1').val();
		 var mobile2=$('#number2').val();
		 var fathername=$('#fathername').val();
		 var mothername=$('#fathernumber').val();
		 var adharno=$('#adhar').val().split("-").join("");
		 var panno=$('#pan').val();
		 var gmail=$('#gmail').val();
		 var altgmail=$('#altgmail').val();
		 var clgmail=$('#clgmail').val();
		 //var caste=$('#caste').val();
		 //var schoolname=$('#schoolname').val();
		 var schoolp=$('#schoolp').val();
		 //var schoolboard=$('#schoolboard').val();
		 //var schoolyear=$('#schoolyear').val();
		 //var after10th=$('#after10th').val();
		 //var board=$('#board').val();
		 var interp=$('#interp').val();
		 //var interyear=$('#interyear').val();
		 //var placeofbirth=$('#placeofbirth').val();
		 //var mode=$('#mode').val();
		 //if(mode=='Management Category')
		//	 var eamcetrank=0;
		 //else
		//	var eamcetrank=$('#eamcetrank').val()
		 var btechbatch=$('#btechbatch').val();
		 var branch=$('#branch').val();
		 var section=$('#section').val();
		 var btechp=$('#btechp').val();
		 var backlogs=$('#backlogs').val();
		 //var hbacklogs=$('#hbacklogs').val();
		 var passoutyear=$('#passoutyear').val();
		 var address=($('#street').val())+","+($('#state').val())+","+($('#country').val());
		 if(schoolp>10){
			 var schoolp=parseFloat(schoolp/10).toFixed(2);
		 }
		 if(interp>10){
			 var schoolp=parseFloat(interp/10).toFixed(2);
		 }
		 
		 $.ajax({  
                url:"delete_update.php", 
                method:"POST",  
                data:{deleted:0,update:1,rollno:rollno,name:name,gender:gender,dob:dob,fathername:fathername,mobile1:mobile1,mobile2:mobile2,gmail:gmail,altgmail:altgmail,adharno:adharno,panno:panno,schoolp:schoolp,interp:interp,btechbatch:btechbatch,branch:branch,section:section,btechp:btechp,backlogs:backlogs,passoutyear:passoutyear,address:address},//,caste:"NA",interyear:interyear,schoolname:"NA",placeofbirth:"NA",hbacklogs:0,eamcetrank:0,schoolyear:schoolyear,after10th:"NA",board:"NA",fathernumber:fathernumber,clgmail:clgmail,schoolboard:"NA",},    
                success:function(data){
					
					$('#exampleModal').scrollTop(0);
					$('#updatemsg').html(data);
					 $("#inserted").show().delay(5000).fadeOut();  
                      
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
						url:"delete_update.php",  
						method:"POST",  
						data:{deleted:1,update:0,rollno:data_row[0]},
						success:function(data){
							$(window).scrollTop(0);
							$('#msg').html(data);
							$("#msg").show().delay(5000).fadeOut(); 
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
	$('#gmail').focusout(function(){
		 var email=$(this).val();
		 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!emailReg.test(email)){
			$(this).addClass('is-invalid');
			
			gmail=false;
		 }else{
			$(this).removeClass('is-invalid');
			
			gmail=true;
			
			
		 }
	 });
	 $('#schoolp').focusout(function(){
		var marks=$(this).val();
		if((marks>10 && marks<40) || marks>100){
			$(this).addClass('is-invalid');
			schoolp=false;
		}else{
			$(this).removeClass('is-invalid');
			
			schoolp=true;
	
		}
	 });
	 $('#number').focusout(function(){
		
		 var numbervalid=$(this).val().length;
		 
		 if(numbervalid<10){
			$(this).addClass('is-invalid');
			number=false;
		}else{
			$(this).removeClass('is-invalid');
			number=true;
		
		}
	 });
	 $('#adhar').focusout(function(){
		 var adharvalid=$(this).val().length;
		
		 if(adharvalid < 14){
			$(this).addClass('is-invalid');
			adhar=false;
		}else{
			$(this).removeClass('is-invalid');
			adhar=true;
			
		}
	 });
	 $('#pan').focusout(function(){
		 var panvalid=$(this).val().length;
		
		 if(panvalid<10){
			$(this).addClass('is-invalid');
			pan=false;
			
		}else{
			$(this).removeClass('is-invalid');
			pan=true;
			
		}
	 });
	 $('#interp').focusout(function(){
		var marks=$(this).val();
		if((marks>10 && marks<40) || marks>100){
			$(this).addClass('is-invalid');
			interp=false;
		}else{
			$(this).removeClass('is-invalid');
			interp=true;
	
		}
	 });
	 $('#btechp').focusout(function(){
		var marks=$(this).val();
		if((marks>10 && marks<40) || marks>100){
			$(this).addClass('is-invalid');
			btechp=false;
		}else{
			$(this).removeClass('is-invalid');
			btechp=true;
			
		}
		
	 });
	 /*$('#interyear').change(function(){
		 var interyear=$(this).val();
		 var first=interyear.split("-");
		 $('#schoolyear').empty();
		 $('#schoolyear').append('<option></option>');
		for(var j=0;j<4;j++){
			var year=Number(first[0])-Number(j);
			var option='<option>';
			option+=year;
			option+='</option>';
			$('#schoolyear').append(option);
		}
			 
		 
	 });*/
	 $('#btechbatch').change(function(){
		 var year=$(this).val();
		 
		 var last=year.split("-");
		 $('#passoutyear').empty();
		 for(var i=0;i<5;i++){
			var first=Number(last[1])+Number(i);
			var option='<option>';
			option+=first;
			option+='</option>';
			
			$('#passoutyear').append(option);
			 
			 
		 }
		 $('#interyear').empty();
		 $('#interyear').append('<option></option>');
		 for(var i=0;i<3;i++){
			 for(var j=2;j<4;j++){
				 var first=Number(last[0])-(Number(j)+Number(i));
				 var second=Number(last[0])-Number(i);
				 var option='<option>';
				 option+=second;
				 option+='</option>';
				 $('#interyear').append(option);
			 }
			 
		 }
				 
	 });
	 $('.input-text').focusout(function(){
		 if(true){
			 $('.update_submit').removeAttr("disabled"); 
		 }else{
			$('.update_submit').attr('disabled','disabled');
		 }			
	 });
	
} );
	function addHyphen (element) {
		//----------------ADHAR FORMAT--------------------
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    } 
	function marks(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9.]/.test(ch))){
            evt.preventDefault();
        }
        
    }
</script>
    
       

</html>