<?php
$con = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    // If form submitted, insert values into the database.
    if (isset($_POST['ename'])){
		
		$ename = stripslashes($_REQUEST['ename']);
		$ename = mysqli_real_escape_string($con,$ename); //escapes special characters in a string
		$epassword = stripslashes($_REQUEST['epassword']);
		$epassword = mysqli_real_escape_string($con,$epassword);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `employee` WHERE ename='$ename' and epassword='$epassword'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['ename'] = $ename;
			header("Location: pro.html"); // Redirect user to index.php
            }else{
			$msg="Wrong Username or password.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='slogin.html';
</script>");

				}
    }
?>

