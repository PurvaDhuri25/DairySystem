
<?php

// php code to Delete data from mysql database 

if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "id11189794_root";
    $password = "root123";
    $databaseName = "id11189794_dairyy";
    // get id to delete
    $pid = $_POST['pid'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname,$username,$password,$databaseName);
    
    // mysql delete query 
    $query = "DELETE FROM `product` WHERE `pid` = $pid";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
    mysqli_close($connect);
}

?>