<?php 

  $conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());

  include("auth.php");
$id=$_POST['id'];
$ename      = $_POST['ename'];
    $econtact      = $_POST['econtact'];
    $eemail     = $_POST['eemail'];
    $password       = $_POST['emp_password'];

  $sql = mysql_query("UPDATE employee SET ename='$ename', econtact='$econtact', emai;='$email', password='$password' WHERE ed='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Employee successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
?>