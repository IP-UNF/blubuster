<?php
require 'db.class.php';

//testing, works but does not prevent sql injection
//$sql = "INSERT INTO movie (Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, Owned, imdbID, addToCart)
//VALUES ('$Title', '$Year', '$Director', '$Rating', '$Genre', '$Runtime', '$Writer', '$Actor', '$Country', '$Owned', '$imdbID', '$addToCart')";

//insert new item into database using prepared statements
$sth = DB::get()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sth = DB::get()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = DB::get()->prepare("INSERT INTO movie (Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, Owned, imdbID, addToCart,Released,Plot,Language,Awards,Poster,Ratings,Metascore,imdbRating,imdbVotes,Type,totalSeasons,Response,Price)
VALUES (:Title, :Year, :Director,:Rating, :Genre,:Runtime,:Writer,:Actor,:Country,:Owned,:imdbID,:addToCart,:Released,:Plot,:Language,:Awards,:Poster,:Ratings,:Metascore,:imdbRating,:imdbVotes,:Type,:totalSeasons,:Response,:Price)");
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
$sth ->bindParam(':Released',$_GET['Released']);
$sth ->bindParam(':Plot',$_GET['Plot']);
$sth ->bindParam(':Language',$_GET['Language']);
$sth ->bindParam(':Awards',$_GET['Awards']);
$sth ->bindParam(':Poster',$_GET['Poster']);
$sth ->bindParam(':Ratings',$_GET['Ratings']);
$sth ->bindParam(':Metascore',$_GET['Metascore']);
$sth ->bindParam(':imdbRating',$_GET['imdbRating']);
$sth ->bindParam(':imdbVotes',$_GET['imdbVotes']);
$sth ->bindParam(':Type',$_GET['Type']);
$sth ->bindParam(':totalSeasons',$_GET['totalSeasons']);
$sth ->bindParam(':Response',$_GET['Response']);
$sth ->bindParam(':Price',$_GET['Price']);
$sth ->execute();
header('Location: index.php');
$sth =null;
?>
