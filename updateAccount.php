<?php
session_start();
require 'db.class.php';

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$ship = $_POST['shipadd'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$customerID = $_POST['CustomerID'];
var_dump($customerID);
var_dump($firstname, $email);

$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE customers SET FirstName=:FirstName, LastName=:LastName, Email=:Email, StreetAddress=:StreetAddress, City=:City,
State=:State, ZipCode=:ZipCode WHERE CustomerID= '".$customerID."'";
$sth ->bindParam(':FirstName',$firstname);
$sth ->bindParam(':LastName',$lastname);
$sth ->bindParam(':Email',$email);
$sth ->bindParam(':StreetAddress', $ship);
$sth ->bindParam(':City', $city);
$sth ->bindParam(':State', $state);
$sth ->bindParam(':ZipCode', $zip);
$sth ->execute();
header('Location: client.php?status=1');
 ?>
