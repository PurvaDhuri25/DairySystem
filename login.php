
<?php
$con =  mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    // If form submitted, insert values into the database.
    if (isset($_POST['uname'])){
		
		$uname = stripslashes($_REQUEST['uname']);
		$uname = mysqli_real_escape_string($con,$uname); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE uname='$uname' and password='$password'";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['uname'] = $uname;
	 echo '<script language="javascript">window.location.href="vpro.php"</script>';
            }else{
			$msg="Wrong Username or password.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='log.html';
</script>");

				}
    }
?>

