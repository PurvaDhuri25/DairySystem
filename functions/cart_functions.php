<?php
	/*
		loop through array of $_SESSION['cart'][product_isbn] => number
		get isbn => take from database => take product price
		price * number (quantity)
		return sum of price
	*/
	function total_price($cart){
		$price = 0.0;
		if(is_array($cart)){
		  	foreach($cart as $pid => $qty){
		  		$productprice = getproductprice($pid);
		  		if($productprice){
		  			$price += $productprice * $qty;
		  		}
		  	}
		}
		return $price;
	}

	/*
		loop through array of $_SESSION['cart'][pid] => number
		$_SESSION['cart'] is associative array which is [product_isbn] => number of products for each pid
		calculate sum of products 
	*/
	function total_items($cart){
		$items = 0;
		if(is_array($cart)){
			foreach($cart as $pid => $qty){
				$items += $qty;
			}
		}
		return $items;
	}
?>