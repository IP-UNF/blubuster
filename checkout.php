<?php require 'movieClass.php';
session_start();
include './sharedlayout/header.php';
include './sharedlayout/body.php';
require 'db.class.php';

?>
<head>
<script type="text/javascript" src="js/checkout.js" ></script>
</head>

<body>
  <table class="table">
    <thead>
      <tr>
        <th>
          <div class="yourCart">
            <h2>Your Shopping Cart:</h2>
          </div>
          <table class="table" name="movieSelected">
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

              } ?>
            </tbody>
          </table>
        </th><!---Inside Table 1 / cart -->
        <td><!-- Order Summary Column Begin -->
          <table class="table-active">
              <tr>
                <td>
                  <div class="totals">
                    <h2>Order Summary</h2>
                  </div>
                </td>
                <tr>
                  <td>
                      <h4>Subtotal: </h4>
                    </td>
                    <td>
                      <h4>$<?php  echo $_SESSION['subTotal'];?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4>Special Offers:</h4>
                    </td>
                    <td>
                      <h4>$0.00</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4>Estimated Tax:</h4>
                    </td>
                    <td>
                      <h4>$0.00</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4>Your Total:</h4>
                    </td>
                    <td>
                      <h4>$<?php  echo $_SESSION['subTotal'];?></h4>
                  </tr>

            </table> <!--End Order Summary Table !-->
        </td><!--End Order Summary Column -->
      </tr>
    </thead>
  </table>
  <a class="btn btn-primary" onclick="clearCart()">Cancel Order</a><br>
