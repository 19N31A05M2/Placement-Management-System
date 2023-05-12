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
		.submit{
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
		@media(max-width:480px){
			.select{
				width:150px;
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
                          <a class="nav-link " href="batch.php">
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
                          <a class="nav-link active" aria-current="page"  href="fetch.php">
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
                        <li class="breadcrumb-item">Fetch</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5">
					Fetch Students
				</h1>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8">
							<div class="card">
									<div class="card-body">
										<div class="container">
											<form method="POST" action="fetchedresult.php">
												<h2 class="text-center mb-5">STUDENTS</h2>
												<div class="row mt-2 mb-3">
												<div class="col-md-12 text-center">
													<div class="form-group">
														<label for="passoutyear">PASSOUT YEAR</label>
														<select id="passoutyear" class="input-text select" name="passouts" required>
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
												</div>
												<div class="row mt-2 mb-3">
												<!--  col-md-6   -->
											
												<div class="col-md-6">
													<div class="form-group">
														<label for="branch">BRANCH</label>
														<select id="branch" class="form-select input-text " name="branch">
														<option>ALL</option>
														<?php
															$sql = "SELECT distinct branch from students order by branch  ";
															$query=mysqli_query($conn,$sql);
															While($row=mysqli_fetch_array($query))
															{
																echo "<option>".$row['branch']."</option>";
															}
														?>
															
														</select>
													</div>
												</div>
												<!--  col-md-6   -->
												<div class="col-md-6">
													<div class="form-group">
														<label for="btechp">BTECH CGPA</label>
														<div class="input-group mb-3">
															<span class="input-group-text" id="basic-addon1">&ge;</span>
															<input type="text" id="btechp" class="form-control" aria-describedby="basic-addon1" name="btechp" onkeypress="marks(event)" required>
														</div>
													</div>
												</div>
												</div>
											
											
												<div class="row mb-3">
												
												<!--  col-md-6   -->
											
												<div class="col-md-6">
											
													<div class="form-group">
														<label for="interp">INTER/DIPLOMA CGPA</label>
														<div class="input-group mb-3">
															<span class="input-group-text" id="basic-addon1">&ge;</span>
															<input type="text" id="interp" class="form-control"  aria-describedby="basic-addon1" name="interp" onkeypress="marks(event)" required>
														</div>
													</div>
												</div>
												<!--  col-md-6   -->
												<div class="col-md-6">
											
													<div class="form-group">
														<label for="schoolp">10th CGPA</label>
														<div class="input-group mb-3">
															<span class="input-group-text" id="basic-addon1">&ge;</span>
															<input type="text" id="schoolp" class="form-control" aria-describedby="basic-addon1" name="schoolp" onkeypress="marks(event)" required>
														</div>
													</div>
												</div>
												</div>
												<!--  row   -->
											
											
												
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
															<option>Negligible</option>
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
														<select id="gender" class="form-select input-text" name="gender">
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
															<span class="input-group-text" id="basic-addon1">&le;</span>
															<input VALUE="0" type="text" id="eamcet_rank" name='eamcetrank' class="form-control" aria-describedby="basic-addon1"  onkeypress="marks(event)" required>
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
													<input class="btn btn-primary submit" type="submit" name="submit" value="submit" onclick="function(e){ e.preventDefault; }">
												</div>
											</form>
										</div>
										
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
								<div class="col-md-12 mb-3">
									<div class="au-card mb-5">
									<div class="card">
										<div class="card-body">
											<h2 class="text-center mb-5">Lateral entry Students</h2>
										<form method="POST" action="fetchedresult.php">
											<div class="row mt-2 mb-3">
												<div class="col-md-12 text-center">
													<div class="form-group">
														<label for="passoutyear">PASSOUT YEAR</label>
														<select id="lepassoutyear" class="input-text w-25" name="lepassouts" required>
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
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="text-dark font-weight-bold">Total Lateral-Entry Students:</label><span class="lestudents">0</span>
												</div>	
												<div class="col-md-6 text-center">
													<label class="text-dark font-weight-bold">Boys:</label><span class="leboys">0</span>
												</div>	
												<div class="col-md-6 text-center">
													<label class="text-dark font-weight-bold">Girls:</label><span class="legirls">0</span>
												</div>	
											</div>
											<div class="text-end mt-2">	
												<input type="submit" name="lesubmit" value="View Students"  class="lesubmit text-primary" style="outline:0; text-decoration:underline; background:#fff; border:0">
											</div>
										</form>	
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="au-card mt-5">
									<div class="card">
										<div class="card-body">
										<h2 class="text-center mb-5">D-10 Students</h2>
										<form method="POST" action="fetchedresult.php">
											<div class="row mt-2 mb-3">
												<div class="col-md-12 text-center">
													<div class="form-group">
														<label for="passoutyear">PASSOUT YEAR</label>
														<select id="dpassoutyear" class="input-text w-25"  name="dpassouts" required>
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
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="text-dark font-weight-bold">D-10 Students:</label><span class="dstudents"></span>
												</div>	
												<div class="col-md-6 text-center">
													<label class="text-dark font-weight-bold">Boys:</label><span class="dboys"></span>
												</div>	
												<div class="col-md-6 text-center">
													<label class="text-dark font-weight-bold">Girls:</label><span class="dgirls"></span>
												</div>	
											</div>
											<div class="text-end mt-2">	
												<input type="submit" name="dsubmit" value="View Students"  class="dsubmit text-primary" style="outline:0; text-decoration:underline; background:#fff; border:0">
											</div>
										</form>	
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
	function marks(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9.]/.test(ch))){
            evt.preventDefault();
        }
        
    }
 $(document).ready(function(){
	 var month=new Date().getMonth()+1;
	 var year=new Date().getFullYear();
			
			
	 
	$('#schoolp').focusout(function(){
		var marks=$(this).val();
		if(marks>100){
			$(this).addClass('is-invalid');
			
		}else{
			$(this).removeClass('is-invalid');
			

	
		}
	 });

	 
	$('#interp').focusout(function(){
		var marks=$(this).val();
		if(marks>100){
			$(this).addClass('is-invalid');
		}else{
			$(this).removeClass('is-invalid');
	
		}
	 });
	 $('#btechp').focusout(function(){
		var marks=$(this).val();
		if(marks>100){
			$(this).addClass('is-invalid');
		}else{
			$(this).removeClass('is-invalid');
			
		}
		
	 });
	 $("#lepassoutyear").change(function() {
	
				
		var year=$(this).val();
		$.ajax({
           url:'fetchstudents.php',
           method:'POST',
           data:{ledetails:1,ddetails:0,year:year},
		   dataType:"JSON",
           success:function(data){
			  $('.lestudents').html(data.total);
			  $('.leboys').html(data.boys);
			  $('.legirls').html(data.girls);
		   }
		});
	 });
	 $("#dpassoutyear").change(function() {
	
				
		var year=$(this).val();
		$.ajax({
           url:'fetchstudents.php',
           method:'POST',
           data:{ledetails:0,ddetails:1,year:year},
		   dataType:"JSON",
           success:function(data){
			  $('.dstudents').html(data.total);
			  $('.dboys').html(data.boys);
			  $('.dgirls').html(data.girls);
		   }
		});
	 });
	if(month<7){
		$('#dpassoutyear').val(year).change();
		$('#lepassoutyear').val(year).change();
	}else{
		$('#dpassoutyear').val(year+1).change();
		$('#lepassoutyear').val(year+1).change();
	} 
	 
 });
</script>
    
       

</html>