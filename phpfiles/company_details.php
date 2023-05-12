<?php 
include('database.php');
if($_POST['id']){
	$query = "SELECT * FROM placements where id='".$_POST['id']."'";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	
	
mysqli_close($conn);
echo json_encode($row);

}
?>