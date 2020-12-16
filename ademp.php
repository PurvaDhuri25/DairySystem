<?php
	session_start();
$conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	if(isset($_POST['submit'])){
		$ename = trim($_POST['ename']);
		$ename = mysqli_real_escape_string($conn, $ename);
		
		$econtact = trim($_POST['econtact']);
		$econtact = mysqli_real_escape_string($conn, $econtact);

		$eemail = trim($_POST['eemail']);
		$eemail = mysqli_real_escape_string($conn, $eemail);
		
		$epassword = trim($_POST['epassword']);
		$epassword = mysqli_real_escape_string($conn, $epassword);


		$query = "INSERT INTO employee VALUES (null,'" . $ename . "', '" . $econtact . "', '" . $eemail . "', '" . $epassword . "',null,null,null)";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new employee " . mysqli_error($conn);
			exit;
		} else {
			header("Location: home_employee.php");
		}
	}
	if(isset($conn)) {mysqli_close($conn);
}
?>