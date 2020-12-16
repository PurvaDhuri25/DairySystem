<?php
$conn =mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  $select_db = mysqli_select_db($conn,'id11189794_dairyy');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysql_error());
  }

  if(isset($_POST['submit'])!="")
  {
    $ename      = $_POST['ename'];
    $econtact      = $_POST['econtact'];
    $eemail     = $_POST['eemail'];
    $epassword       = $_POST['epassword'];

    $sql = mysqli_query($conn,"INSERT into employee(ename, econtact, eemail, epassword)VALUES('$ename','$econtact','$eemail', '$epassword')");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index1.php';
        </script>
      <?php 
    }
  }
?>