<?php
$link = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

	
	$eid=$_GET['eid'];
	$query = "DELETE FROM employee WHERE eid=$eid"; 
	$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	header("Location: home_employee.php"); 
 ?>