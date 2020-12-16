<?php
	
		
  $conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
		
		@$id 			= $_POST['salary_id'];
		@$salary		= $_POST['salary_rate'];


		$sql = mysqli_query($conn,"UPDATE salary SET salary_rate='$salary' WHERE salary_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Salary rate successfully changed...');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>