<?
	session_start();
if(isset($_SESSION['uname'])){
$msg="Welcome User.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='cart.php';
</script>");

}else {
$msg="Please Login to Continue.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='log.html';
</script>");
}
?>