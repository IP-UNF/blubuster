<?php require 'movieClass.php';
$MovieID=$_COOKIE["MovieID"];
session_start();
include './sharedlayout/header.php';
include './sharedlayout/body.php';
require 'db.class.php';


//checks if any movies are in the cart yet
if (!isset($_SESSION['cart']))
{
 $_SESSION['cart'] = array();
 $_SESSION['subTotal'] = 0;
}

$newMovie = new Movie($MovieID);

array_push($_SESSION['cart'],$newMovie);

?>
<head>
<?php function lineItemTotal($price)
{


    $_SESSION['subTotal'] = $_SESSION['subTotal']+ $price;
}

?>
<script type="text/javascript" src="js/checkout.js" ></script>
</head>

<body>
  <table class="table table-bordered" name="movieSelected">
    <thead>
      <tr>
        <th scope="col">Movie</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($_SESSION['cart'] as $movie ) {

        echo '
                  <tr>
                  <td><img src='.$movie->poster.' width="100" height="150"></td>
                  <td>'.$movie->title.'</td>
                  <td><p id="price">'.$movie->price.'</td>
                  </tr>';

      } lineItemTotal($movie->price); //calculates subTotal?>
    </tbody>
  </table>
  <div class="complete_cart">
    <div class="checkout">
      <div class="total">
      <h2>Subtotal:</h2>
      </div>
      <span class="subtotal" id ="subtotal">
      <?php  echo $_SESSION['subTotal'];?>
      </span>
      <div class="bfb"><br>
        <a class="btn btn-primary" href="./index.php">Add More to Cart </a>
        <a class="btn btn-primary" href="/checkout">Checkout</a>
        <a class="btn btn-primary" onclick="clearCart()">Empty Cart</a>

      </div>
    </div><br>

    </div>


</body>


<?php include './sharedlayout/footer.php';?>
