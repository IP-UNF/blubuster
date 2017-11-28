<?php include './sharedlayout/header.php';
include './sharedlayout/body.php';
session_start();
require 'db.class.php';
$MovieID=$_COOKIE["MovieID"];
$sql = "SELECT Title,Poster,Price FROM movie Where MovieID = " .$MovieID;
$result = DB::get()->query($sql);
while($row = $result->fetch()){
  $price = $row["Price"];
  $poster =$row["Poster"];
  $title = $row["Title"];
}

?>
<head>
<script type="text/javascript" src="js/checkout.js">

var price = <?php echo $price ?>;
var quantity = document.getElementById("quantity").value;

</script>
</head>

<body>
  <table class="table table-bordered" name="movieSelected">
    <thead>
      <tr>
        <th scope="col">Movie</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total For Item</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="<?php echo $poster ?>" width="100" height="150"></td>
        <td style="center;"><?php echo $title ?></td>
        <td><p id="price"><?php echo $price ?></p></td>
        <td><input type="textbox" id="quantity" value="1"><button type="btn btn-primary" onclick="updateQuantity(price, quantity)">Update</button></td>
        <td><p id="itemTotal"><script>document.getElementById("itemTotal").innerHTML = itemTotal(price,quantity);</script></p></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div class="complete_cart">
    <div class="checkout">
      <div class="total">
      <h2>Subtotal:</h2>
      </div>
      <span class="subtotal">
        $ <script>subTotal(price, quantity)</script>
      </span>
      <div class="bfb"><br>
        <a class="btn btn-primary" href="/checkout">Checkout</a>
      </div>
    </div><br>

    </div>


</body>


<?php include './sharedlayout/footer.php';?>
