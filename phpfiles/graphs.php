
<?php
include('database.php');
if($_POST['bargraph']==1){
	$sqlQuery = "SELECT DISTINCT branch,count(*) OVER (PARTITION BY branch) as pls FROM placed where passoutyear='".$_POST['year']."'";

	$result = mysqli_query($conn,$sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}
	
	
mysqli_close($conn);
echo json_encode($data);

}
if($_POST['piegraph']==1){
	$query = "SELECT count(DISTINCT(rollno)) as plc FROM Placed where passoutyear='".$_POST['year']."'";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$placed=$row['plc'];
	
	$query1 = "SELECT count(*) FROM students s where passoutyear='".$_POST['year']." ' and s.rollno NOT IN(Select rollno from placed where passoutyear='".$_POST['year']." ') ";
	$result1 = mysqli_query($conn,$query1);
	$row1=mysqli_fetch_array($result1);
	$nonplaced=$row1['count(*)'];
	
	
mysqli_close($conn);
echo json_encode(array("placed"=>$placed,"nonplaced"=>$nonplaced));

}
if($_POST['mychart']==1){
	$data1=array();
	$data2=array();
	$data=array();
$sql="Select Distinct branch from students";
$query=mysqli_query($conn,$sql);
$i=0;
foreach($query as $row)
{
	$branch=$row['branch'];
	$sql1="select count(*)as plc from placements where branches like '%$branch%' and passouts='".$_POST['year']."' and status='COMPLETED'";
	$query1=mysqli_query($conn,$sql1);
	foreach($query1 as $row1)
	{
		$data1[]=$row;
		$data2[]=$row1;
	}
}
$data['data1']=$data1;
$data['data2']=$data2;

mysqli_close($conn);
echo json_encode($data);


}
?>