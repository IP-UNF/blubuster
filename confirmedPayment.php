<?php
session_start();
require 'db.class.php';
echo $_POST['CustomerID'];
//insert new item into database using prepared statements

$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = DB::get()->prepare("INSERT INTO orders (OrderDetail,CustomerID, BillingFirstName,BillingLastName,BTConfirmNumber, Total)
VALUES (:OrderDetail,:CustomerID,:BillingFirstName,:BillingLastName,:BTConfimNumber,:Total)");
$sth ->bindParam(':OrderDetail',$_POST['OrderDetail']);
$sth ->bindParam(':CustomerID',$_POST['CustomerID']);
$sth ->bindParam(':BillingFirstName',$_POST['BillingFirstName']);
$sth ->bindParam(':BillingLastName',$_POST['BillingLastName']);
$sth ->bindParam(':BTConfimNumber',$_POST['BTConfimNumber']);
$sth ->bindParam(':Total',$_POST['Total']);
$sth ->execute();
unset($_SESSION['cart']);
unset($_SESSION['subTotal']);
unset($_SESSION['total']);
header('Location: accountOrders.php');
$sth =null;
?>
