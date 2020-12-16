<?php 

require "checkout.php";
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Purchase Process";
	require "./template/header.php";
	$conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	extract($_SESSION['ship']);

	// validate post section
	$card_number = $_POST['card_number'];
	$card_PID = $_POST['card_PID'];
	$card_expire = strtotime($_POST['card_expire']);
	$card_owner = $_POST['card_owner'];
	

	// find customer
	$uid = getCustomerId($uname, $address, $city, $zip_code, $country,$uname,$password);
	$date = date("Y-m-d H:i:s");

	insertIntoOrder($conn, $uid, $_SESSION['total_price'], $date, $uname, $address, $city, $zip_code, $country);

	// take orderid from order to insert order items
	$orderid = getOrderId($conn, $uid);

foreach($_SESSION['cart'] as $pid => $qty){
		$productprice = getproductprice($pid);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$pid', '$productprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($conn);
			exit;		}
	}

	session_unset();
?>
	<p class="lead text-success">Your order has been processed sucessfully. Please check your email to get your order confirmation and shipping detail!. 
	Your cart has been empty.</p>

<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>