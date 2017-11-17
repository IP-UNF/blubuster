<?php
require 'db.class.php';

//testing, works but does not prevent sql injection
//$sql = "INSERT INTO movie (Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, Owned, imdbID, addToCart)
//VALUES ('$Title', '$Year', '$Director', '$Rating', '$Genre', '$Runtime', '$Writer', '$Actor', '$Country', '$Owned', '$imdbID', '$addToCart')";

//insert new item into database using prepared statements
$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = DB::get()->prepare("INSERT INTO movie (Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, Owned, imdbID, addToCart)
VALUES (:Title, :Year, :Director,:Rating, :Genre,:Runtime,:Writer,:Actor,:Country,:Owned,:imdbID,:addToCart)");
$sth ->bindParam(':Title',$_GET['Title']);
$sth ->bindParam(':Year',$_GET['Year']);
$sth ->bindParam(':Director',$_GET['Director']);
$sth ->bindParam(':Rating',$_GET['Rating']);
$sth ->bindParam(':Genre',$_GET['Genre']);
$sth ->bindParam(':Runtime',$_GET['Runtime']);
$sth ->bindParam(':Writer',$_GET['Writer']);
$sth ->bindParam(':Actor',$_GET['Actor']);
$sth ->bindParam(':Country',$_GET['Country']);
$sth ->bindParam(':Owned',$_GET['Owned']);
$sth ->bindParam(':imdbID',$_GET['imdbID']);
$sth ->bindParam(':addToCart',$_GET['addToCart']);
$sth ->execute();
header('Location: index.php');
$sth =null;
?>
