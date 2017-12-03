<?php session_start();?>
<?php include './sharedlayout/header.php';?>
<?php include './sharedlayout/body.php';?>
<?php require "db.class.php";

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
    $CustomerID=$row['CustomerID'];
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $address= $row['StreetAddress'];
    $city=$row['City'];
    $state=$row['State'];
    $zipCode=$row['ZipCode'];
  }
  $results=null;

}
?>
<?php $status = 0;
 if($status == 1){
    echo '<div class="alert alert-success">
          <strong>Success!</strong> Your information was updated.
          </div>
        ';
}
?>
<h1>Use this area to update your account information</h1>
<fieldset>
  <legend>Personal Information</legend>
  <form action="/updateAccount.php" method="post" >
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" value="<?php echo $Email ?>" required>
  </div><br>
  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="firstName" class="form-control" name="fname" value="<?php echo $FirstName ?>" required>
  </div><br>
  <div class="form-group">
    <label for="LastName">Last Name:</label>
    <input type="LastName" class="form-control" name="lname" value="<?php echo $LastName ?>" required>
  </div><br>
</fieldset>
<fieldset>
<legend>Shipping Information</legend>
<div class="form-group">
  <label for="shippingAddress">Shipping Address:</label>
  <input type="address" class="form-control" name="shipadd" value="<?php echo $address ?>" required>
</div><br>
<div class="form-group">
  <label for="city">City:</label>
  <input type="City" class="form-control" name="city" value="<?php echo $city ?>" required>
</div><br>
<div class="form-group">
  <label for="State">State:</label>
  <input type="state" class="form-control" name="state" value="<?php echo $state ?>" required>
</div><br>
<div class="form-group">
  <label for="zip">Zip Code:</label>
  <input type="Zip" class="form-control" name="zip" value="<?php echo $zipCode ?>" required>
</div><br>
<div class="form-group">
  <label for="id">Your Unique ID</label>
  <input type="text" class="form-control" name="CustomerID" value="<?php echo $CustomerID ?>" disabled>
</div><br>

<button type="submit" class="btn btn-primary">Update</button>
</form>
</fieldset>
