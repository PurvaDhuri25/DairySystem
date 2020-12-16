

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
//$uname = mysqli_real_escape_string($link, $_REQUEST['uname']);
$ucontact = mysqli_real_escape_string($link, $_REQUEST['ucontact']);
$uemail = mysqli_real_escape_string($link, $_REQUEST['uemail']);
 //$password = mysqli_real_escape_string($link,$_REQUEST['password']);
$repeat_password = mysqli_real_escape_string($link, $_REQUEST['repeat_password']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);

$city = mysqli_real_escape_string($link, $_REQUEST['city']);

$zip_code = mysqli_real_escape_string($link, $_REQUEST['zip_code']);

$country = mysqli_real_escape_string($link, $_REQUEST['country']);



$uname = stripslashes($_REQUEST['uname']); 
$uname = mysqli_real_escape_string($link, $_REQUEST['uname']);
$password= stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($link, $_REQUEST['password']);


$q="SELECT * FROM user where uname='$uname'";
$r=mysqli_query($link,$q);
$row=mysqli_fetch_row($r);
if($row[0]>=1)
{
$msg="User Exist";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='Signup.html';
</script>");
}
elseif($_POST['password']!=$_POST['repeat_password'])
{

$msg="OOPS Password Didnot Matched";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='Signup.html';
</script>");
mysql_close();
}
else
{

$sql = "INSERT INTO user (uname, ucontact, uemail, password,address,city,zip_code,country) VALUES ('$uname', $ucontact, '$uemail' , '$password','$address','$city','$zip_code','$country')";

if(mysqli_query($link, $sql)){
$msg="Records added successfully.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='log.html';
</script>");
}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}
?>

