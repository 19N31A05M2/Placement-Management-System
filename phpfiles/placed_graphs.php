
<?php
include('database.php');
if($_POST['placed']==1){
	$data1=array();
	$data2=array();
	$data3=array();
	$data=array();
$sql="Select Distinct branch from placed Where passoutyear='".$_POST['year']."'";
$query=mysqli_query($conn,$sql);

foreach($query as $row)
{
	$branch=$row['branch'];
	$sql1="select count(*)as plc from placed where branch='$branch'	and passoutyear='".$_POST['year']."' and gender='MALE'";
	$query1=mysqli_query($conn,$sql1);
	foreach($query1 as $row1)
	{
		
		$data2[]=$row1;
	}
	$sql2="select count(*)as plc from placed where branch='$branch' and passoutyear='".$_POST['year']."' and gender='FEMALE'";
	$query2=mysqli_query($conn,$sql2);
	foreach($query2 as $row2)
	{
		
		$data3[]=$row2;
	}
	$data1[]=$row;
}
$data['data1']=$data1;
$data['data2']=$data2;
$data['data3']=$data3;

echo json_encode($data);


}
if($_POST['allplaced']==1){
	$branches=array();
	$data5=array();
	$data=array();
	$sql="Select Distinct section from placed Where passoutyear='".$_POST['year']."'";
	$query=mysqli_query($conn,$sql);
	$r=0;
	foreach($query as $row)
	{
		$data2=array();
		$section=$row['section'];
		$sql1="select branch,section,count(*)as plc from placed where section='$section' and passoutyear='".$_POST['year']."'  Group By branch";
		$query1=mysqli_query($conn,$sql1);
		foreach($query1 as $row1)
		{
			$branches[$r]=$row1['branch'];
			$data2[$row1['branch']]=$row1['plc'];
			$r++;
		}
		$data5[$section]=$data2;
		
	}
	
	$data['sections']=$data5;
	$data['branches']=array_unique($branches);
	mysqli_close($conn);
	echo json_encode($data);
}





?>