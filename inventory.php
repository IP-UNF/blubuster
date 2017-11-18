<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Info</title>
    <link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">
    <link rel ="stylesheet" href="css/style.css">
  <script>
  	function updateRecord()
  	{
  		document.myForm.action='update.php';
  		document.myForm.submit();
  	}
    function deleteRecord()
    {
      document.myForm.action='delete.php';
      document.myForm.submit();
    }
  </script>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div clas="navbar-header">
      <a class="navbar-brand" href="../blubuster/index.php">BluBuster</a>
        <a class="navbar-brand" href="../blubuster/erd.html" target="_blank">Movie ERD</a>
      </div>
    </div>
  </nav>
  <div class="container">
  <div id="movies" class="row"></div>
  </div>
  <div class="container" id ="movies">

<div class="container col-md-12">
<form action='' method='get' name='myForm'>
<?php
require 'db.class.php';
//get number of items in table
$res = DB::get()->prepare('SELECT COUNT(*) FROM movie');
$res->execute();
$num_rows = $res->fetchColumn();

$sql = "SELECT MovieID,Poster, Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, imdbID, addToCart, Price FROM movie";
$result =DB::get()->query($sql);
  if ($num_rows > 0) {
    echo "<table border='1'>";
    echo '<tr><td>Select</td><td></td><td>Title</td><td>Year</td><td>Director</td><td>Rating</td><td>Genre</td><td>Runtime</td><td>Writer</td><td>Actor</td><td>Country</td><td>IMDB #</td><td>Price</td><td>In Shopping Cart</td></tr>';
    while($row = $result->fetch())
    {
      $radio=$row["MovieID"];
      echo "<tr>";
      echo "<td><input type='radio' name='MovieID' value='$radio'></td>";
      //gets poster for each item in database to display
      if($row["Poster"]!=NULL)
      {
        echo "<td><img src =". $row["Poster"]. "</td>";
      }//end if
      else
      {
        echo "<td><img src ="."No img". "</td>";
      }//end else
      echo "<td>".$row["Title"]."</td>";
      echo "<td>".$row["Year"]."</td>";
      echo "<td>".$row["Director"]."</td>";
      echo "<td>".$row["Rating"]."</td>";
      echo "<td>".$row["Genre"]."</td>";
      echo "<td>".$row["Runtime"]."</td>";
      echo "<td>".$row["Writer"]."</td>";
      echo "<td>".$row["Actor"]."</td>";
      echo "<td>". $row["Country"]."</td>";
      echo "<td>". $row["imdbID"]."</td>";
      echo "<td>". $row["Price"]."</td>";
      //if 1 print yes 0=no
      if (($row['addToCart'])>0)
      {
        echo "<td>Yes</td>";
      }
      else {
        echo "<td>No</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
    } else {
    echo "0 results";
    }
    $result=null;
?>
<input type='button' value='Delete Record' onClick='deleteRecord()'>
<input type='button' value='Update Record' onClick='updateRecord()'>
<a href="../blubuster/movieindex.html">Add New Items  OMDB Database</a>
</form>
</div>
</div>
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
