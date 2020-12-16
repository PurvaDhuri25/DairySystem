<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $connect=mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
   
   // get values form input text and number
   
   $pid = $_POST['pid'];
   $pname = $_POST['pname'];
   $price = $_POST['price'];
   $descr = $_POST['descr'];
   $stock = $_POST['stock'];

   	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

	
	$query = "UPDATE product SET  
pname= '$pname', 
	price= '$price', 
	descr = '$descr', 
	stock= '$stock'";
	if(isset($image)){
		$query .= ", image='$image' WHERE pid= '$pid'";
        }
   $result = mysqli_query($connect, $query);
 
		if(!$result){
			echo "Can't Update product " . 
			mysqli_error($connect);
			exit;
		} else {
			$msg="Product Updated successfully.";
echo ("<script type='text/javascript'>alert('$msg');
window.location.href='vpro.php';
</script>");

		}
	}

?>

