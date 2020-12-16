<?php
$link = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

		
		@$id 			= $_POST['ot_id'];
		@$overtime		= $_POST['rate'];


		$sql = mysqli_query($link,"UPDATE overtime SET rate='$overtime' WHERE ot_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Overtime rate per hour successfully changed...');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>