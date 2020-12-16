<?php 

$con =  mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



  include("auth.php");

  $id           = $_POST['eid'];
  $deduction    = $_POST['deduction'];
  $overtime     = $_POST['overtime'];
  $bonus        = $_POST['bonus'];

  $sql = mysqli_query($con,"UPDATE employee SET deduction='$deduction', overtime='$overtime', bonus='$bonus' WHERE eid='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Invalid";
  }
?>