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
		@media(max-width:480px){
			.studentcard{
				margin-top:40px;
			}
	
		}
	

		.get_in_touch_{
			max-width:800px;
			margin:50px auto;
			position:relative;
			box-shadow:0 10px 30px 0px rgba(0,0,0,0.1);
			padding:30px;
		}
		.get_in_touch .title{
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
		.contact-form .submit{
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
                          <a class="nav-link active" aria-current="page" href="batch.php">
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
                        <li class="breadcrumb-item">Add Batch</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5">
					New Batch
				</h1>
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
				
				<div class="container">
					<div class="row  text-center">
						<div class="col-md-4 mx-auto my-auto">
							<div class="card h-100 ">
							<img src="../images/mrcet.jpg" class="card-img-top" alt="..." width="100%" height="300px">
							<div class="card-body">
								<h5 class="card-title text-primary">Add New Batch</h5>
								<hr>
								 <form method="post" id="export_excel">  
									<div class="row g-3 align-items-center">
										<div class="text-end m-1 p-0">
											<a href="../excel/MRCET Placement Database.xlsx" class="">Excel Template</a>
										</div>
										<div class="col-auto">
											<label for="inputPassword6" class="col-form-label fs-4">Upload Excel:</label>
										</div>
										<div class="input-group col-auto">
											<input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xlsx, .xls, .csv" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
											<p class="text-danger pt-0 fs-6">File name:(Batch) details, Eg:2018-2022 details</p>
										</div>
										<div class="input-group col-auto text-center">
											<button type="button" id='export' class="btn btn-primary mx-auto">Upload</button>
										</div>
										
									</div>
								</form> 
							</div>
							</div>
						</div>
						<div class="col-md-4 mx-auto studentcard">
							<div class="card h-100 ">
								<img src="../images/student.jpg" class="card-img-top" width="100%" height="300px" alt="...">
								<div class="card-body">
									<h5 class="card-title text-primary">Add New Student</h5>
									<hr>
									<div class="text">
										<img src="../images/addstudent.png" height="130px" width="120px"/>
									</div>
									<div class="input-group col-auto">
										<button type="button" id='addstudent' class="btn btn-primary mx-auto"   data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
									</div>
		
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal" tabindex="-1" aria-hidden="true" id='success'>
					<div class="modal-dialog modal-dialog-centered modal-800">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center">DATA INSERTED SUCCESSFULLY</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body" id='result'>
							
						</div>
						
						</div>
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						
							<div class="modal-body">
								<button type="button" class="btn-close float-right" data-bs-dismiss="modal" aria-label="Close"></button>
								<section class="get_in_touch">
									<h1 class="title mb-5">Student Details</h1>
									<div id="inserted" class="text-center mx-auto my-auto mb-3">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
										<span id='msg'>
											An example success alert with an icon
										</span>
									</div>
								<form id="newstudent" method='POST'>	
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
												<label for="fathernumber" class="label">FATHER MOBILE NUMBER</label>
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
												<input class="btn btn-primary submit" type="submit" value="submit" disabled>
											</div>
										</div>
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
 $(document).ready(function(){ 
	
	var gmail=schoolp=interp=btechp=number=adhar=pan=false;
	$('#inserted').hide();
	
      $('#export').click(function(){  
           $('#export_excel').submit();  
      });  
      $('#export_excel').on('submit', function(event){  
           event.preventDefault();  
           $.ajax({  
                url:"import.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){ 
					
					 $('#success').modal('show');
                     $('#result').html(data);  
                     $('#excel_file').val('');  
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
	 $('#number1').focusout(function(){
		
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
		
		 if(adharvalid<14){
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
	 $('#rollno').focusout(function(){
		$('#btechbatch').empty();
		var year1=20+$(this).val().substring(0,2);
		var year2=Number(year1)+Number(4);
		var year3=Number(year1)+Number(3);
		$('#btechbatch').append('<option></option>');
		$('#btechbatch').append('<option>'+year1+'-'+year2+'</option>');
		$('#btechbatch').append('<option>'+year1+'-'+year3+'</option>');
		$('#btechbatch').val(year1+'-'+year2).change();
		
	 });
	 
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
				 var year1=Number(last[0])-Number(2);
				 var second=Number(last[0])-Number(i);
				 var year2=Number(last[0])-Number(0);
				 var option='<option>';
				 option+=second;
				 option+='</option>';
				 $('#interyear').append(option);
			 }
			 
		 }
		 $('#interyear').val(year2).change();
				 
	 });
	 $('#interyear').change(function(){
		 var interyear=$(this).val();
		 var first=interyear.split("-");
		 $('#schoolyear').empty();
		for(var j=0;j<4;j++){
			var year=Number(first[0])-Number(j);
			var option='<option>';
			option+=year;
			option+='</option>';
			$('#schoolyear').append(option);
		}
			 
		 
	 });
	 $('.input-text').focusout(function(){
		 if(true){
			 $('.submit').removeAttr("disabled"); 
		 }else{
			$('.submit').attr('disabled','disabled');
		 }			
	 });
	 $('.submit').click(function(e){
		  e. preventDefault();
		 var rollno=$('#rollno').val();
		 var name=$('#name').val();
		 var gender=$('#gender').val();
		 var dob=$('#dob').val();
		 var mobile1=$('#number1').val();
		 var mobile2=$('#number2').val();
		 var fathername=$('#fathername').val();
		 var fathernumber=$('#fathernumber').val();
		 var adharno=$('#adhar').val().split("-").join("");
		 var panno=$('#pan').val();
		 var gmail=$('#gmail').val();
		 var altgmail=$('#altgmail').val();
		 var clgmail=$('#clgmail').val();
		 var caste=$('#caste').val();
		 var schoolname=$('#schoolname').val();
		 var schoolp=$('#schoolp').val();
		 var schoolboard=$('#schoolboard').val();
		 var schoolyear=$('#schoolyear').val();
		 var after10th=$('#after10th').val();
		 var board=$('#board').val();
		 var interp=$('#interp').val();
		 var interyear=$('#interyear').val();
		 var placeofbirth=$('#placeofbirth').val();
		 var mode=$('#mode').val();
		 if(mode=='Management Category')
			 var eamcetrank=0;
		 else
			var eamcetrank=$('#eamcetrank').val()
		 var btechbatch=$('#btechbatch').val();
		 var branch=$('#branch').val();
		 var section=$('#section').val();
		 var btechp=$('#btechp').val();
		 var backlogs=$('#backlogs').val();
		 var hbacklogs=$('#hbacklogs').val();
		 var passoutyear=$('#passoutyear').val();
		 var address=($('#street').val())+","+($('#state').val())+","+($('#country').val());
		 if(schoolp>10){
			 var schoolp=parseFloat(schoolp/10).toFixed(2);
		 }
		 if(interp > 10){
			var interp=parseFloat(interp/10).toFixed(2);
		 }
		 
		 $.ajax({  
                url:"addstudent.php",  
                method:"POST",  
                data:{insert1:1,rollno:rollno,name:name,gender:gender,dob:dob,mobile1:mobile1,mobile2:mobile2,fathername:fathername,fathernumber:fathernumber,gmail:gmail,altgmail:altgmail,clgmail:clgmail,adharno:adharno,panno:panno,caste:caste,schoolname:schoolname,schoolp:schoolp,schoolboard:schoolboard,schoolyear:schoolyear,after10th:after10th,board:board,interp:interp,interyear:interyear,eamcetrank:eamcetrank,btechbatch:btechbatch,branch:branch,section:section,btechp:btechp,backlogs:backlogs,hbacklogs:hbacklogs,passoutyear:passoutyear,address:address,placeofbirth:placeofbirth},    
                success:function(data){
					$('#exampleModal').scrollTop(0);
					$('#msg').html(data);
					 $("#inserted").show().delay(5000).fadeOut(); 
                      
                }  
           });
	 });
	
 }); 

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