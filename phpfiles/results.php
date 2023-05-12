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
    <link rel="stylesheet" href="../css/Dashboard.css">
   <style>
   .close{
			font-size:11px;
			top:-10px;
		}
	.card{
			  border-radius: .80rem;
			  margin-bottom:30px;
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
                          <a class="nav-link active" aria-current="page" href="results.php">
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
                        <li class="breadcrumb-item " aria-current="page">Results</li>
                    </ol>
                </nav>
                <h1 class="text-center mb-5">
					<select id="passoutyears" >
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
				<div class="container mt-5">
				<div class="row">
						<div class="col-md-6">
							<div class="card">
								
								<div class="card-body" style="height:380px; ">
									<h2 class="title-2 text-center">Branch Wise Palcements</h2>
								
								<div class="recent-report__chart">
									<canvas id="barChart"></canvas>
								</div>
								</div>
								
							</div>
						</div>
						<div class="col-md-6">
							
							<div class="card">
								<h5 class="card-header text-center">Completed Drives</h5>
								<div class="card-body" style="height: 300px; overflow-y: scroll">
									<div class="table-responsive">
										<table class="table table table-striped">
											<thead>
											<tr>
												<th scope="col">Comapany_Name</th>
												<th scope="col">Date</th>
												<th scope="col">Eligible Branches</th>
												<th scope="col">Selected</th>
											</tr>
											</thead>
											<tbody id='tbody'>
												
											
											
											</tbody>
										</table>
									</div>
									
								</div>
								<form class="d-inline" action="completed_drives.php" method="POST"><button type="submit" class="btn btn-block card-footer btn-light w-100 m-0 p-1" name="year"  id="view_year">Students</button></form>
								
						
							</div>
						</div>
					</div>
				
				<div class="row">
					<div class="col-md-12">
							<div class="card">
								
								<div class="card-body" >
									<h2 class="title-2 text-center">Section Wise Palcements</h2>
								
								<div class="recent-report__chart">
									<canvas id="AllbarChart"></canvas>
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
$(document).ready(function () {
	
	$("#passoutyears").change(function() {
		$('#view_year').val($(this).val());
		$('#tbody').html('');
		
		var year=$(this).val();
		 $.ajax({
            url: "companys.php",
            method:'POST',
            data:{details:1,year:year},
			dataType:"JSON",
            success: function (data) {
                var trHTML = '';
               
                    for (i = 0; i < data.length; i++) {
                        trHTML +=
                            '<tr><td>'
                            + data[i].companyname
                            + '</td><td>'
                            + data[i].date.split('-').reverse().join('/')
                            + '</td><td>'
                            + data[i].branches 
							+ '</td><td>'
                            + data[i].selected 
                            + '</td></tr>';
                    }
                
                $('#tbody').append(trHTML);
            },
		 });
		 		
		 $.ajax({
            url:'placed_graphs.php',
            method:'POST',
            data:{placed:1,year:year,allplaced:0},
		 	dataType:"JSON",
            success:function(data){
		 		var data1=data['data1'];
		 		var data2=data['data2'];
		 		var data3=data['data3'];
				var branches=[];
				var boys=[];
				var girls=[];
				
                for (var i in data1) {
					branches.push(data1[i].branch);
                      
		 		
                }
				for (var i in data2) {
					boys.push(data2[i].plc);
				}
				for (var i in data3) {
					girls.push(data3[i].plc);
				}
				stackedBar.data.labels=branches;
				stackedBar.data.datasets[0].data=boys;
				stackedBar.data.datasets[1].data=girls;
				stackedBar.update();
		 
                   
		 
                   
			}
		});	
		$.ajax({
            url:'placed_graphs.php',
            method:'POST',
            data:{allplaced:1,placed:0,year:year},
		 	dataType:"JSON",
            success:function(data){
				
		 		var data1=Object.keys(data.sections);
		 		var data2=data.sections;
		 		
				
				var section=[];
				var data3=[];
				var branches=data.branches;

				for(var i in data1){
						var each_data=[];
						for(var j in branches){
							each_data[j]=data2[data1[i]][branches[j]];
						}
						data3[i]=each_data;
				}
				
				
					
					
				
				//for (var i in ) {
					//boys.push(data2[i].plc);
				//}
				//for (var i in data3) {
					//girls.push(data3[i].plc);
				//}
				var bgcolor=['pink','lightblue',"lightgreen","yellow","orange"];
				var color=["red","blue","green","orange","yellow"];
				for(var i in data1){
					
					SectionBar.data.datasets[i]={label: "",backgroundColor: bgcolor[i],
						borderColor: color[i],
						borderWidth: 1,
						data: []
					}
				
					SectionBar.data.datasets[i].label=data1[i];
				}
				SectionBar.data.labels=branches;
				for(var i in data3){
					SectionBar.data.datasets[i].data=data3[i];
				}
				
				
				SectionBar.update();
		 
                   
		 
                   
			}
		});	
			
	
	
	
});
			var month=new Date().getMonth()+1;
			var year=new Date().getFullYear();
			
			if(month<7){
				$('#passoutyears').val(year).change();
			}else{
				$('#passoutyears').val(year+1).change();
			}
var ctx = document.getElementById('barChart').getContext('2d');
var stackedBar = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Red', 'Blue', 'Yellow'],
    datasets: [{
        label: 'Boys',
        data: [12, 19, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1,

      },
      {
        label: 'Girls',
        data: [10, 28, 23],
        borderWidth: 1,
		backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
      }
    ]
  },
  plugins: [ChartDataLabels],
  options: {
	  layout: {
			padding: 20
		},
		plugins: {
			
			legend: {
				display:false											
			},
			
			
		},
        scales: {
		  x:{
		    stacked:true,
			 grid:{
				display:false				
           }
		  },
          y: {
			stacked:true,
			grid:{
				display:false
           }
          }
        }
      }
});

  var ct = document.getElementById("AllbarChart").getContext("2d");
  var SectionBar = new Chart(ct, {
    type: "bar",
    data: {
		labels: [
    "Absence of OB",
    "Closeness",
    "Credibility",
    "Heritage",
    "M Disclosure",
    "Provenance",
    "Reliability",
    "Transparency"
  ],
  datasets: [
    
  ]
	},
    plugins: [ChartDataLabels],
  options: {
	  responsive: true,
  legend: {
    position: "top"
  },
  title: {
    display: true,
    text: "Chart.js Bar Chart"
  },
  scales: {
    y: {
      ticks: {
        beginAtZero: true
      }
    }
  }
  }
  });
});
</script>
    
       

</html>