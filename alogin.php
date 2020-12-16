<?php
$con =  mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['aname'])){
		
		$aname = stripslashes($_REQUEST['aname']);
		$aname = mysqli_real_escape_string($con,$aname); //escapes special characters in a string
		$pass = stripslashes($_REQUEST['pass']);
		$pass = mysqli_real_escape_string($con,$pass);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE aname='$aname' and pass='$pass'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['aname'] = $aname;
			header("Location: index1.php"); // Redirect user to index.php
            }else{
			$msg="Wrong Username or Password.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='alog.html';
</script>");

				}
    }
?>
