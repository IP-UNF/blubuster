<?php
session_start();
require 'db.class.php';

//insert new item into database using prepared statements
$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = DB::get()->prepare("INSERT INTO customers (FirstName,LastName, StreetAddress,City,State,ZipCode,Email,Password)
VALUES (:FirstName,:LastName,:StreetAddress,:City,:State,:ZipCode,:Email,:Password)");
$sth ->bindParam(':FirstName',$_POST['FirstName']);
$sth ->bindParam(':LastName',$_POST['LastName']);
$sth ->bindParam(':StreetAddress',$_POST['StreetAddress']);
$sth ->bindParam(':City',$_POST['City']);
$sth ->bindParam(':State',$_POST['State']);
$sth ->bindParam(':ZipCode',$_POST['ZipCode']);
$sth ->bindParam(':Email',$_POST['Email']);
$sth ->bindParam(':Password',$_POST['Password']);
$sth ->execute();
header('Location: index.php');
$sth =null;
?>
