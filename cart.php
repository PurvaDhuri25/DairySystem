<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				pid (get from $_POST['pid']) => number of products
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/database_functions.php";
	require_once "./functions/cart_functions.php";

	// pid got from form post method, change this place later.
	if(isset($_POST['pid'])){
		$pid = $_POST['pid'];
	}

	if(isset($pid)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that pid => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$pid])){
			$_SESSION['cart'][$pid] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$pid]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each pid
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $pid =>$qty){
			if($_POST[$pid] == '0'){
				unset($_SESSION['cart']["$pid"]);
			} else {
				$_SESSION['cart']["$pid"] = $_POST["$pid"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
   	<form action="cart.php" method="post">
	   	<table class="table">
	   		<tr>
	   			<th>Item</th>
	   			<th>Price</th>
	  			<th>Quantity</th>
	   			<th>Total</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $pid => $qty){
			
$conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$product = mysqli_fetch_assoc(getproductpid($conn, $pid));
			?>
			<tr>
				<td><?php echo $product['pname']; ?></td>
				<td><?php echo "$" . $product['price']; ?></td>
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $pid; ?>"></td>
				<td><?php echo "$" . $qty * $product['price']; ?></td>
			</tr>
			<?php } ?>
		    <tr>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    	<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		    </tr>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="checkout.php" class="btn btn-primary">Go To Checkout</a> 
	<a href="vpro.php" class="btn btn-primary">Continue Shopping</a>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some products in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>
