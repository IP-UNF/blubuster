<?php
  require 'db.class.php';

// not protected against sql injection
//$sql ="UPDATE movie SET Title='$Title', Year='$Year', Director='$Director', Rating ='$Rating', Genre='$Genre', Runtime='$Runtime', Writer='$Writer', Actor='$Actor', Country='$Country', Owned='$Owned', imdbID='$imdbID', addToCart='$addToCart' WHERE MovieID = " . $MovieID;

//open conn and update record to prevent sql injection
$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE movie SET Title=:Title, Year=:Year, Director=:Director, Rating =:Rating, Genre=:Genre, Runtime=:Runtime, Writer=:Writer,
Actor=:Actor, Country=:Country,Owned=:Owned, imdbID=:imdbID, addToCart=:addToCart WHERE MovieID =:MovieID";
$sth = DB::get()->prepare($sql);
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
$sth ->bindParam(':MovieID',$_GET['MovieID']);
$sth ->execute();
// execute the query
header('Location: index.php');
$sth = null;
?>
