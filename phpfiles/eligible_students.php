<?php
session_start();
ob_start();
include('header.php');
include("database.php");
if(!$_SESSION['user']){
	header('location:../index.php');
}
if(isset($_POST['students'])){
	$id=$_POST['students'];
	$prevQuery = "SELECT * FROM placements WHERE id='$id' ";
	$query=mysqli_query($conn,$prevQuery);
	While($row=mysqli_fetch_array($query))
	{
		
		$companyname=$row['companyname'];
		$companydate=date("d-m-Y", strtotime($row['date']));
		$selectdate=$companydate;
		$passoutyear=$row['passouts'];
		$branch=$row['branches'];
		$btechp=$row['btechp'];
		$interp=$row['interp'];
		$schoolp=$row['schoolp'];
		$backlogs=$row['backlogs'];
		$hbacklogs=$row['hbacklogs'];
		$ps=$row['previouslyplaced'];
		$sg=$row['studygap'];
		$gender=$row['gender'];
		$package=$row['package'];
		$eamcetrank=$row['eamcetrank'];
		
		
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRCET PLACEMENTS</title>
	
	<link href="" rel="stylesheet" type="text/css">
	
	
	
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
                        <li class="breadcrumb-item" aria-current="page">Eligible Students</li>
                    </ol>
                </nav>
                <h1 class="text-center">
					<?php echo $companyname." Eligible Students"; ?>
					
				</h1>
				<h3 class="text-center text-primary mb-5 text-decoration-underline"><?php echo $passoutyear." Passouts"; ?></h3>
				<div id="msg" class="text-center"></div>
					<table id="example" class="table table-striped" style="width:100%;">
						<thead>
							<tr class="bg-warning">
								<th>Roll_Number</th>
								<th>Full_Name</th>
								<th>Gender</th>
								<th>Btech_Batch</th>
								<th id='branches'>Branch</th>
								<th>Btech_Cgpa</th>
								<th>10th_Cgpa</th>
								<th>Inter/Diploma_Cgpa</th>
								<th>Backlogs</th>
								<th>HBacklogs</th>
								<th>Selected_date</th>
								<th>Package_Offered</th>
								<th>Selected/Not_Selected</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$noselected=0;
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
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
										else
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4) and rollno NOT IN(SELECT rollno FROM placed)";
									}
									else{
										if($gender!="ANY")
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
										else
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and rollno NOT IN(SELECT rollno FROM placed)";
									}
										
								}else{
									if($sg=="NO"){
										if($gender!="ANY")
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear'and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
										else
											$students="SELECT * FROM students WHERE passoutyear='$passoutyear'and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs'  and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 and schoolyear=SUBSTRING(interyear, 1, 4) and RIGHT(interyear, 4)=LEFT(btechbatch,4)";
									}
									else{
										if($gender!="ANY")
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and gender='$gender' and eamcetrank<='$eamcetrank'  and LOCATE(branch, '$branch') > 0 ";
										else
											$students=" SELECT * FROM students WHERE passoutyear='$passoutyear' and btechcgpa > '$btechp' and interp > '$interp' and schoolp > '$schoolp' and backlogs <= '$backlogs' and hbacklogs <= '$hbacklogs' and  eamcetrank<='$eamcetrank' and LOCATE(branch, '$branch') > 0";
										
									}
									
								}
								$studentsquery=mysqli_query($conn,$students);
								While($row=mysqli_fetch_array($studentsquery))
								{
									$rollno=$row['rollno'];
									echo "<tr>";
									echo "<td>".$row['rollno']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['gender']."</td>";
									echo "<td>".$row['btechbatch']."</td>";
									echo "<td>".$row['branch']."</td>";
									echo "<td>".$row['btechcgpa']."</td>";
									echo "<td>".$row['interp']."</td>";
									echo "<td>".$row['schoolp']."</td>";
									echo "<td>".$row['backlogs']."</td>";
									echo "<td>".$row['hbacklogs']."</td>";
									echo "<td>".$companydate."</td>";
								
									$check="Select * from placed where rollno='$rollno' and companyid='$id'";
									$cquery=mysqli_query($conn,$check);
									if(mysqli_num_rows($cquery)>0){
										$rows=mysqli_fetch_array($cquery);
										//echo "<td class='text-center'>".$rows['package']." LPA</td>";
										echo '<td class="text-center">
												<div class="form-group">
													<div class="input-group mb-3">
														<input type="text" id="'.$row['rollno'].'_package" value="'.$rows['package'].'" class="form-control" aria-describedby="basic-addon1" name="btechp" onkeypress="marks(event)" required disabled>
														<span class="input-group-text" id="basic-addon1">LPA</span>
													</div>
												</div>
											</td>';
										echo '<td class="text-center">
													<button class="btn btn-primary not_selected db_notselect" id="'.$row['rollno'].'_notselected">Not_Selected</button>
													<button class="btn btn-primary selected db_select" id="'.$row['rollno'].'_selected">Selected</button>
												</td>';	
										$noselected++;		
									
									}else{		
										echo '<td class="text-center">
												<div class="form-group">
													<div class="input-group mb-3">
														<input type="text" id="'.$row['rollno'].'_package"  value="'.$package.'" class="form-control" aria-describedby="basic-addon1" name="btechp" onkeypress="marks(event)"  required>
														<span class="input-group-text" id="basic-addon1">LPA</span>
													</div>
												</div>
											</td>';
										echo '<td class="text-center">
												<button class="btn btn-primary selected" id="'.$row['rollno'].'_selected">Selected</button>
											
												<button class="btn btn-primary not_selected" id="'.$row['rollno'].'_notselected">Not_Selected</button>
											</td>';	
									}
									echo "</tr>";
								}
							?>
						</tbody>
						<tfoot>
						<tr>
							<td class="text-end">
							<h4>Selected:<span  class="mySpanId"></span>
							<button class="ms-4 btn btn-primary completed" id="<?php echo $id; ?>">Completed</button></h4>
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
	$('.not_selected').hide();
	$('.db_select').hide();
	$('.db_notselect').show();
	$('.mySpanId').html(<?php echo $noselected; ?>);
	var groupColumn=4;
    var table = $('#example').DataTable( {
		scrollY:        '80vh',
        scrollCollapse: true,
        paging:         false,
		scrollX:true,
		select:true,
        "columnDefs": [
            { "visible": true, "targets": groupColumn },
			{ "visible": false, "targets":[4,5,6,7,8,9,10] }
        ],
		buttons: [
			{
                extend: 'colvisGroup',
                text: 'Basic',
                hide: [4,5,6,7,8,9,10]
            },
            {
                extend: 'colvisGroup',
                text: 'Marks',
                show: ':hidden'
            },
			{
				extend: 'collection',
				text: 'Branch',
				buttons: [
					{ text: 'ALL',    action: function () {table.columns("#branches").search('', true, false).draw();  } },
					{ text: 'CSE',   action: function () { table.columns("#branches").search('^CSE$', true, false).draw();} },
					{ text: 'IT', action: function () { table.columns("#branches").search('^IT$', true, false).draw(); } },
					{ text: 'ECE',    action: function () {table.columns("#branches").search('^ECE$', true, false).draw();  } },
					{ text: 'EEE',    action: function () {table.columns("#branches").search('^EEE$', true, false).draw();  } },
					{ text: 'MECH',    action: function () {table.columns("#branches").search('^MECH$', true, false).draw();  } },
					{ text: 'ANE',    action: function () {table.columns("#branches").search('^ANE$', true, false).draw();  } }
					
					
				],
			}
		],
		fixedHeader: {
			header:true,
            footer: true
        },
		
        "aaSorting": [[ groupColumn,'asc' ]],
        
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group bg-primary text-light"><td colspan="13">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
			
        },
		
    } );
	
    table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
	var buttons = new $.fn.dataTable.Buttons(table, {
		buttons: [
			'csvHtml5',
			{
				extend:'excelHtml5',
				title:'Studens List',
				messageTop:'Eligible Students'
			},
				'pdfHtml5','print'
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
	
	var companyid=<?php echo $id; ?>; 
	$('.selected').click( function () {
		  var srow =table.row($(this).closest('tr'));
		  var data_row =srow.data();
		 
			$('#'+data_row[0]+'_notselected').show();
			$('#'+data_row[0]+'_selected').hide();
			
          var packages=$('#'+data_row[0]+'_package').val();
		  //srow.cell(':eq(11)').data(+packages+" LPA");
		  
		   $('#'+data_row[0]+'_package').prop("disabled", true);
          var name=data_row[1]; 
          var gender=data_row[2]; 
          var branch=data_row[4]; 
          
          
          
		 
          var passoutyear=<?php echo $passoutyear; ?>; 
          var companyname='<?php echo $companyname; ?>'; 
		  
		  
		  $.ajax({  
				url:"selected_or_not.php",  
				method:"POST",  
				data:{insert:1,deleted:0,rollno:data_row[0],name:name,gender:gender,branch:branch,companyid:companyid,companyname:companyname,selecteddate:data_row[10],passoutyear:passoutyear,packages:packages},
				success:function(data){
					$('#msg').show();
					$('#msg').html(data);
					$('#msg').delay(3000).fadeOut('slow');
					var newNumber = Number($('.mySpanId').html()) + 1;
		  		
		  
					$('.mySpanId').html(newNumber);
					
				},  
		});
		   

    });
	
	$('.not_selected').click( function () {
		  var srow = table.row($(this).closest('tr'));
		  var data_row = table.row($(this).closest('tr')).data();
			$('#'+data_row[0]+'_notselected').hide();
			$('#'+data_row[0]+'_selected').show();
			var rollno=data_row[0];
           $('#'+data_row[0]+'_package').removeAttr("disabled");
		   $.ajax({  
				url:"selected_or_not.php",  
				method:"POST",  
				data:{insert:0,deleted:1,rollno:rollno,companyid:companyid},
				success:function(data){
					$('#msg').show();
					$('#msg').html(data);
					$('#msg').delay(3000).fadeOut('slow');
					var newNumber = Number($('.mySpanId').html()) - 1;
		  		
		  
					$('.mySpanId').html(newNumber);
					
				},  
		});
		   

    });
	$('.completed').click( function () {
		$.ajax({  
				url:"completed.php",  
				method:"POST",  
				data:{completed:1,companyid:companyid},
				success:function(data){
					$.confirm({
						title: 'Success',
						content: 'Successfully Drive Completed',
						buttons: {
							confirm: function () {
								window.location = 'upcoming_drives.php';
							}
						}
					});
					
				},  
		});
		
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