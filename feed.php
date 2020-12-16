

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$company = mysqli_real_escape_string($link, $_REQUEST['company']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);


$sql = "INSERT INTO feedback (name, company, email, phone,message) VALUES ('$name', '$company', '$email' , '$phone','$message')";

if(mysqli_query($link, $sql)){
$msg="Feedback Submitted Successfully";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='homepage.html';
</script>");
}
else{$msg="Error in adding.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='feedback.html';
</script>");
mysqli_close($link);
}
?>

