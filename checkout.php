<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				pid (get from $_GET['pid']) => number of products
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Checking out";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
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
			<td><?php echo $product['pname'];?></td>
			<td><?php echo "$" . $product['price']; ?></td>
			<td><?php echo $qty; ?></td>
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
	<form method="post" action="purchase.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
			<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="uname" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-4">Address</label>
			<div class="col-md-4">
				<input type="text" name="address" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-4">City</label>
			<div class="col-md-4">
				<input type="text" name="city" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-4">Zip Code</label>
			<div class="col-md-4">
				<input type="text" name="zip_code" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-4">Country</label>
			<div class="col-md-4">
				<input type="text" name="country" class="col-md-4" class="form-control">
			</div>
		</div>

<div class="form-group">
			<label for="uname" class="control-label col-md-4">Login Name</label>
			<div class="col-md-4">
				<input type="text" name="uname" class="col-md-4" class="form-control">
			</div>
		</div>
<div class="form-group">
			<label for="password" class="control-label col-md-4">Password</label>
			<div class="col-md-4">
				<input type="password" name="password" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Purchase" class="btn btn-primary">
		</div>
<p class="lead">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some products in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>
