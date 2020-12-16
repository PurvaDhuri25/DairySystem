<?php
	session_start();
$conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	if(isset($_POST['add'])){
		$pname = trim($_POST['pname']);
		$pname = mysqli_real_escape_string($conn, $pname);
		
		$price = trim($_POST['price']);
		$price = mysqli_real_escape_string($conn, $price);

		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$stock = trim($_POST['stock']);
		$stock = mysqli_real_escape_string($conn, $stock);

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}



		$query = "INSERT INTO product VALUES (null,'" . $pname . "', '" . $price . "', '" . $descr . "', '" . $stock . "', '" . $image . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new product " . mysqli_error($conn);
			exit;
		} else {
			header("Location: vpro.php");
		}
	}
?>
<head>
<style>

input[type=text], select {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 60%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #073e00;
}
input[type=reset] {
  width: 60%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset]:hover {
  background-color: #073e00;
}
.espace {
  padding: 10px;

  padding-left: 0px;
}

</style>
</head>
<body background="p.jpg"><center><br><br>
<h4><label style="color: rgb(96, 101, 95); font-size: 30px;">"Add New Products"</label></h4>

<form method="post" action="add.php" enctype="multipart/form-data">
		<table class="table">
<tr>
<input type="text" name="pname" Placeholder="Product name"
required style="
                        
                        padding: 12px 12px;
                        margin: 0px 0px;
                        display: inline-block;
                        border-radius: 40px;
                        box-sizing: border-box;" value=""><br>
</tr>
<tr>
<input type="text" name="price" Placeholder="Product price"
required style="
                        
                        padding: 12px 12px;
                        margin: 0px 0px;
                        display: inline-block;
                        border-radius: 40px;
                        box-sizing: border-box;" value=""><br>
</tr>

<tr>
<input type="text" name="descr" Placeholder="Product descr"
required style="                        padding: 12px 12px;
                        margin: 0px 0px;
                        display: inline-block;
                        border-radius: 40px;
                        box-sizing: border-box;" value=""><br>
</tr>

<tr>
<input type="text" name="stock" Placeholder="Product stock"
required style="  
                        padding: 12px 12px;
                        margin: 0px 0px;
                        display: inline-block;
                        border-radius: 40px;
                        box-sizing: border-box;" value=""><br>
</tr>

<tr>
<input type="file" name="image" ><br>
</tr>

            <center>  <p><div class="espace">
		<input type="submit" name="add" value="Add new product" class="btn btn-primary">
<input type="reset" value="Cancel" class="btn btn-default"></center>
</table>	
</center>
        </div></form>

<?php
	if(isset($conn)) {mysqli_close($conn);
}
?>