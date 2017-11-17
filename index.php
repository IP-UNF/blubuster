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
  <form action='insert.php' method='get'>
    <h1>Add a Movie to Your Database</h1>
  <table aligin="center">
  	<tr>
  		<td>Movie Title:</td><td><input type='text' name='Title'></td>
  	</tr>
    <tr>
      <td>Year Released:</td><td><input type='text' name='Year'></td>
    </tr>
    <tr>
      <td>Director:</td><td><input type='text' name='Director'></td>
    </tr>
    <tr>
    <td>Rating:</td><td>
    <select name="Rating">
    <?php
    require 'db.class.php';
    $sql = "SELECT Rating FROM rating";
    $result = DB::get()->query($sql);
    while ($row = $result->fetch())
    {
    echo '<option value="'.$row['Rating'].'">' . $row['Rating'] . "</option>";
    }
    $result=null;
    ?>
    </select></td>
    </tr>
    <tr>
      <td>Genre:</td><td><input type='text' name='Genre'></td>
    </tr>
    <tr>
      <td>Runtime:</td><td><input type='text' name='Runtime'></td>
    </tr>
    <tr>
      <td>Writer:</td><td><input type='text' name='Writer'></td>
    </tr>
    <tr>
      <td>Actor:</td><td><input type='text' name='Actor'></td>
    </tr>
    <tr>
      <td>Production Comapany:</td><td><input type='text' name='Country'></td>
    </tr>
    <tr>
      <td>IMDB Number (*required if you want poster):</td><td><input type='text' name='imdbID'></td>
    </tr>
    <tr>
      <td>Is Movie Owned:</td><td><input type='checkbox' value="1" name='Owned'></td>
    </tr>
    <tr>
      <td>Add to Shopping Cart:</td><td><input type='radio' value="1" name='addToCart'></td>
    </tr>
    <tr>
      <td colspan='2'><input type='submit' value='Add Movie'></td>
    </tr>
    <tr>
      <td colspan='2'><a href="../blubuster/movieindex.html" class ="button">Search OMDB Database</a></td>
    </tr>
  </table>
  </form>
</form>
<div class="container col-md-12">
<form action='' method='get' name='myForm'>
<?php
//get number of items in table
$res = DB::get()->prepare('SELECT COUNT(*) FROM movie');
$res->execute();
$num_rows = $res->fetchColumn();

$sql = "SELECT MovieID, Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, Owned, imdbID, addToCart FROM movie";
$result =DB::get()->query($sql);
  if ($num_rows > 0) {
    echo "<table border='1'>";
    echo '<tr><td>Select</td><td></td><td>Title</td><td>Year</td><td>Director</td><td>Rating</td><td>Genre</td><td>Runtime</td><td>Writer</td><td>Actor</td><td>Country</td><td>IMDB #</td><td>In Shopping Cart</td><td>Owned</td></tr>';
    while($row = $result->fetch())
    {

      $radio=$row["MovieID"];
      $poster=$row["imdbID"];
      echo "<tr>";
      echo "<td><input type='radio' name='MovieID' value='$radio'></td>";
      //gets poster for each item in database to display
      if($poster!=NULL)
      {
        $api =file_get_contents('http://www.omdbapi.com?i='.$poster.'&apikey=6bce83a9');
        $json = json_decode($api, true);
        $moviePoster = $json['Poster'];
        echo "<td><img src =". $moviePoster. "</td>";
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
      //if 1 print yes 0=no
      if (($row['addToCart'])>0)
      {
        echo "<td>Yes</td>";
      }
      else {
        echo "<td>No</td>";
      }
      //if 1 print yes 0=no
      if (($row['Owned'])>0)
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
<a href="../assign6/movieindex.html" class ="button">Search OMDB Database</a></button>
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
