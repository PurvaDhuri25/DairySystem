<?php
  session_start();
  $pid = $_GET['pid'];
$conn = mysqli_connect("localhost", "id11189794_root", "root123", "id11189794_dairyy");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



  $query = "SELECT * FROM product WHERE pid = '$pid'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty product";
    exit;
  }

  $title = $row['pname'];
  require "./template/header.php";
?>

      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="vpro.php">Products</a> > <?php echo $row['pname']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Product Description</h4>
          <p><?php echo $row['descr']; ?></p>
          <h4>Product Details</h4>
<p><?php echo $row['price']; ?><?php echo 'Rs' ?></p>

          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "descr" || $key == "image" || $key == "price" || $key == "stock"){
                continue;
              }
              switch($key){
                case "pid":
                  $key = "pid";
                  break;
                case "pname":
                  $key = "pname";
                  break;
                case "descr":
                  $key = "descr";
                  break;
                case "price":
                  $key = "price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="pid" value="<?php echo $pid;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>
