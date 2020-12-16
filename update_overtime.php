<?php
	
		  $connection = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

		
		@$id 			= $_POST['ot_id'];
		@$rate	= $_POST['rate'];


		$sql = mysqli_query($connection,"UPDATE overtime SET rate='$rate' WHERE ot_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Overtime rate successfully changed...');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>