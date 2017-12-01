<?php require 'movieClass.php';
session_start();
include './sharedlayout/header.php';
include './sharedlayout/body.php';
require 'db.class.php';
?>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- braintree -->
<script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

<!-- setting up braintree -->
<script>
    $.ajax({
        url: "token.php",
        type: "get",
        dataType: "json",
        success: function (data) {
                braintree.setup(data,'dropin', { container: 'dropin-container'});
        }
    })
</script>



<style>
    label.heading {
        font-weight: 600;
    }
    .payment-form {
        width: 300px;
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
        border: 1px #333 solid;
    }
</style>

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
  <body style="text-align: center; margin-top: 100px;">
      <form action="payment.php" method="post" class="payment-form">
          <label for="firstName" class="heading">First Name</label><br>
          <input type="text" name="firstName" id="firstName"><br><br>

          <label for="lastName" class="heading">Last Name</label><br>
          <input type="text" name="lastName" id="lastName"><br><br>

          <label for="amount" class="heading">Amount (USD)</label><br>
          <input type="text" name="amount" id="amount" value ="<?php echo $_SESSION['subTotal']?> " readonly><br><br>

          <div id="dropin-container"></div>
          <br><br>
          <button type="submit">Pay with BrainTree</button>

      </form>
  <a class="btn btn-primary" onclick="clearCart()">Cancel Order</a><br>
