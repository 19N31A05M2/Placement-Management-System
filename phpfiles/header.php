<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRCET Placement Management</title>
	
	
	
	<link rel="stylesheet" href="../css/header.css">
	
	<!--Bootstrap css-->
    <link href="../bootstrap@5.0.2/css/bootstrap.min.css" rel="stylesheet">
	
	<!---Datatables CSS-->
	<link href="../DataTables/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
	<link href="../DataTables/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css">
	<link href="../DataTables/css/select.dataTables.min.css" rel="stylesheet" type="text/css">
	
	<!--Bootstrap icons css-->
		
		<link rel="stylesheet" href="../bootstrap-icons-1.3.0/bootstrap-icons.css">
	
   <!--  Bootstrap Bundle with Popper -->
    <script src="../bootstrap@5.0.2/js/bootstrap.bundle.min.js"></script>
	
	<!--jquery.js-->
   <script src="../js/jquery.js" ></script>
   
   <!-- Chart js Scripts-->
   <script src="../js/chartjs.js"></script>
	<script src="../js/ajax.js"></script>	
	<script src="../js/chartjs-datalabels.js" ></script>
	
	<!--Datatables srcipts-->
    <script type="text/javascript" charset="utf8" src="../DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/jszip.min.js"></script>
   
    <script type="text/javascript" charset="utf8" src="../DataTables/js/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/js/dataTables.select.min.js"></script>
	
	
	
    <!--Jquery Confirm------------->
	<link rel="stylesheet" href="../css/jquery-confirm.css">
	<script type="text/javascript" src="../js/jquery-confirm.js"></script>
	
   
</head>
<body>
	<nav class="navbar navbar-light bg-light p-3 position-sticky">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="../images/logo.jpg" height="40px" width="50px " />MRCET PLACEMENTS
            </a>
            <button  id='toggle' class="navbar-toggler d-md-none collapsed mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" onclick="overflow();" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
					Admin
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="../index.php">Sign out</a></li>
                </ul>
              </div>
        </div>
    </nav>

  
</body>
<script>
function overflow()
{
	
	var x=$('#toggle').attr('aria-expanded');
	if (x=='true') {
		$('html').css('overflow','hidden');
	}
	else 
	{
		$('html').css('overflow','visible');
	}
	
}
</script>
</html>