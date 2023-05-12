<?php 
include('database.php');

if($_POST['placement']==1){
	
	$query = "select a.rollno,a.name,a.companyname,max(a.package) as packages,a.selecteddate,a.branch,count(a.rollno) as count,b.gmail from placed a LEFT JOIN students b on a.rollno=b.rollno  where  a.passoutyear='".$_POST['year']."' group By a.rollno ORDER By packages DESC LIMIT 0,3 ";
	$result = mysqli_query($conn,$query);
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
	mysqli_close($conn);
	echo json_encode($data);
}

?>