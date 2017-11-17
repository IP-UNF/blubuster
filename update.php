<html>
<head>
<?php
require 'db.class.php';
$MovieID=$_GET['MovieID'];

$sql = "SELECT Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, Owned, imdbID,Language,Awards,Poster,Ratings,Metascore,imdbRating,imdbVotes,Type,totalSeasons,Response FROM movie Where MovieID = " .$MovieID;
$result = DB::get()->query($sql);
    while($row = $result->fetch())
    {
      $Title=$row["Title"];
      $Year=$row["Year"];
      $Director=$row["Director"];
      $Rating=$row["Rating"];
      $Genre=$row["Genre"];
      $Runtime=$row["Runtime"];
      $Writer=$row["Writer"];
      $Actor=$row["Actor"];
      $Country=$row["Country"];
      $Owned=$row["Owned"];
      $imdbID=$row["imdbID"];
      $Language=$row["Language"];
      $Awards=$row["Awards"];
      $Poster=$row["Poster"];
      $Ratings=$row["Ratings"];
      $Metascore=$row["Metascore"];
      $imdbRating=$row["imdbRating"];
      $imdbVotes=$row["imdbVotes"];
      $Type=$row["Type"];
      $totalSeasons=$row["totalSeasons"];
      $Response=$row["Response"];
    }
    $result=null;
?>
</head>
<body>
  <form action='update_p.php' method='get'>
    <input type='hidden' value='<?php echo $MovieID; ?>' name='MovieID'>
  <table>
    <tr>
      <td>Movie Title:</td><td><input type='text' name='Title' value='<?php echo $Title; ?>'></td>
    </tr>
    <tr>
      <td>Year Released:</td><td><input type='text' name='Year' value='<?php echo $Year; ?>'></td>
    </tr>
    <tr>
      <td>Director:</td><td><input type='text' name='Director' value='<?php echo $Director; ?>'></td>
    </tr>
    <tr>
      <td>Rating:</td><td><input type='text' name='Rating'value='<?php echo $Rating; ?>'></td>
    </tr>
    <tr>
      <td>Genre:</td><td><input type='text' name='Genre' value='<?php echo $Genre; ?>'></td>
    </tr>
    <tr>
      <td>Runtime:</td><td><input type='text' name='Runtime' value='<?php echo $Runtime; ?>'></td>
    </tr>
    <tr>
      <td>Writer:</td><td><input type='text' name='Writer' value='<?php echo $Writer; ?>'></td>
    </tr>
    <tr>
      <td>Actor:</td><td><input type='text' name='Actor' value='<?php echo $Actor; ?>'></td>
    </tr>
    <tr>
      <td>Production Comapany:</td><td><input type='text' name='Country'value='<?php echo $Country; ?>'></td>
    </tr>
    <tr>
      <td>IMDB Number:</td><td><input type='text' name='imdbID'value='<?php echo $imdbID; ?>'></td>
    </tr>
    <tr>
    <td>Language:</td><td><input type='text' name='Language'value='<?php $Language; ?>'></td>
  </tr>
  <tr>
    <td>Awards:</td><td><input type='text' name='Awards'value='<?php $Awards; ?>'></td>
  </tr>
  <tr>
    <td>Poster:</td><td><input type='text' name='Poster'value='<?php $Poster; ?>'></td>
  </tr>
  <tr>
    <td>Ratings:</td><td><input type='text' name='Ratings'value='<?php $Ratings; ?>'></td>
  </tr>
  <tr>
    <td>Metascore:</td><td><input type='text' name='Metascore'value='<?php $Metascore; ?>'></td>
  </tr>
  <tr>
    <td>imdbRating:</td><td><input type='text' name='imdbRating'value='<?php $imdbRating; ?>'></td>
  </tr>
  <tr>
    <td>imdbVotes:</td><td><input type='text' name='imdbVotes'value='<?php $imdbVotes; ?>'></td>
  </tr>
  <tr>
    <td>Type:</td><td><input type='text' name='Type'value='<?php $Type; ?>'></td>
  </tr>
  <tr>
    <td>totalSeasons:</td><td><input type='text' name='totalSeasons'value='<?php $totalSeasons; ?>'></td>
  </tr>
  <tr>
    <td>Response:</td><td><input type='text' name='Response' value='<?php $Response; ?>'></td>
  </tr>
  <tr>
    <td>Add Movie to Shopping Cart:</td><td><input type='radio' name='addToCart' value='1'></td>
  </tr>
    <tr>
      <td>Is Movie Owned:</td><td><input type='checkbox' name='Owned' value='1' ></td>
    </tr>
    <tr>
      <td>Add to Shopping Cart:</td><td><input type='radio' name='addToCart' value='1' ></td>
    </tr>

    <tr>
      <td colspan='2'><input type='submit' value='Update Record' ></td>
    </tr>
  </table>
  </form>
</form>
</body>
</html>
