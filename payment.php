<?php
session_start();
include './sharedlayout/header.php';

require "boot.php";
require "db.class.php";

    $Email = $_SESSION['Email'];
    $sqlCount ="SELECT COUNT(Email) FROM customers where Email ='$Email'";
    $res = DB::get()->prepare($sqlCount);
    $res->execute();
    $num_rows = $res->fetchColumn();
    $sql = "SELECT * FROM customers where Email='$Email'";
    $results = DB::get()->prepare($sql);
    $results = DB::get()->query($sql);
    if ($num_rows > 0){
      while($row = $results->fetch())
      {
        $FirstName=$row['FirstName'];
        $LastName=$row['LastName'];
        $address= $row['StreetAddress'];
        $city=$row['City'];
        $state=$row['State'];
        $zipCode=$row['ZipCode'];
      }
      $results=null;
    }

if (empty($_POST['payment_method_nonce'])) {
    header('location: index.php');
}

$result = Braintree_Transaction::sale([
  'amount' => $_POST['amount'],
  'paymentMethodNonce' => $_POST['payment_method_nonce'],
  'customer' => [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
  ],
  'options' => [
    'submitForSettlement' => true
  ]
]);

if ($result->success === true) {

} else
{
    print_r($result->errors);
    die();
}

//Now, i think all done. Let's test it out.
?>


</head>
<?php include './sharedlayout/body.php';?>
<!-- displays the list of billing and customer information for confirmation -->
<body style="text-align: center; margin-top: 100px;">
    <form class="payment-form">
        <label for="ID" class="heading">Transaction ID</label><br>
        <input type="text" disabled="disabled" name="ID" id="ID" value="<?php echo $result->transaction->id ;?>"><br><br>

        <label for="bFirstName" class="heading">Billing First Name</label><br>
        <input type="text" disabled="disabled" name="bFirstName" id="bFirstName" value="<?php echo $result->transaction->customer['firstName'] ;?>"><br><br>

        <label for="blastName" class="heading">Billing Last Name</label><br>
        <input type="text" disabled="disabled" name="bLastName" id="bLastName" value="<?php echo $result->transaction->customer['lastName'] ;?>"><br><br>

        <label for="FirstName" class="heading">Account First Name</label><br>
        <input type="text" disabled="disabled" name="FirstName" id="FirstName" value="<?php echo $FirstName?>"><br><br>

        <label for="lastName" class="heading">Account Last Name</label><br>
        <input type="text" disabled="disabled" name="LastName" id="LastName" value="<?php echo $LastName?>"><br><br>

        <label for="amount" class="heading">Amount (USD)</label><br>
        <input type="text" disabled="disabled" name="amount" id="amount" value="<?php echo $result->transaction->amount ." " . $result->transaction->currencyIsoCode ;?>"><br><br>

        <label for="amount" class="heading">Street Address</label><br>
        <input type="text" disabled="disabled" name="amount" id="address" value="<?php echo $address; ?>"><br><br>

        <label for="city" class="heading">City</label><br>
        <input type="text" disabled="disabled" name="city" id="city" value="<?php echo $city; ?>"><br><br>

        <label for="state" class="heading">State</label><br>
        <input type="text" disabled="disabled" name="state" id="state" value="<?php echo $state; ?>"><br><br>

        <label for="zipcode" class="heading">Zip Code</label><br>
        <input type="text" disabled="disabled" name="zipcode" id="zipcode" value="<?php echo $zipCode; ?>"><br><br>

        <label for="status" class="heading">Status</label><br>
        <input type="text" disabled="disabled" name="status" id="status" value="Successful"><br><br>


        <br><br>


    </form>
<?php include './sharedlayout/footer.php'; ?>
</body>
</html>
