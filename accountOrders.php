<?php session_start();?>
<?php include './sharedlayout/header.php';?>
<?php include './sharedlayout/body.php';?>
<?php require "db.class.php";

$Email = $_SESSION['Email'];
$sqlCount ="SELECT COUNT(Email) FROM customers where Email ='$Email'";
$res = DB::get()->prepare($sqlCount);
$res->execute();
$num_rows = $res->fetchColumn();
$sql = "select * from customers as c
inner join orders as o on c.customerID =o.customerID
where Email ='$Email'";
echo'<h1>Your Order Information</h1>
      <table class ="table" border="1" ><tr><th>Order<br>Confirmation<br>Number</th><th>Billed To</th><th>Shipped To</th><th>Total</th></tr>';
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
    $OrderDetail=$row['OrderDetail'];
    $BillingFirstName=$row['BillingFirstName'];
    $BillingLastName=$row['BillingLastName'];
    $BTConfirmNumber=$row['BTConfirmNumber'];
    $Total=$row['Total'];
    echo '<tr><td>'.$BTConfirmNumber.'</td><td>'.$BillingFirstName.' '.$BillingLastName.'</td><td>'.  $address.'<br> '.  $city.'<br> '.  $state.'<br> '.$zipCode.'</td><td>'.$Total.'</td></tr>';
  }
  $results=null;
  echo'</table>';
}
