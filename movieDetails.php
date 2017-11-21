<script>
  function addToCart()
  {

  }
</script>
<?php
include './sharedlayout/header.php';
require 'db.class.php';
session_start();
$MovieID=$_COOKIE["MovieID"];
$sql = "SELECT Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, imdbID,Language,Awards,Poster,Metascore,imdbRating,imdbVotes,Type,totalSeasons,Response,Price FROM movie Where MovieID = " .$MovieID;
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
      $imdbID=$row["imdbID"];
      $Language=$row["Language"];
      $Awards=$row["Awards"];
      $Poster=$row["Poster"];
      $Metascore=$row["Metascore"];
      $imdbRating=$row["imdbRating"];
      $imdbVotes=$row["imdbVotes"];
      $Type=$row["Type"];
      $totalSeasons=$row["totalSeasons"];
      $Response=$row["Response"];
      $Price=$row["Price"];
    }
    $result=null;
?>
</head>
  <?php include'./sharedlayout/body.php';?>

  <form action='' method='get'>
    <input type='hidden' value='<?php echo $MovieID; ?>' name='MovieID'>
  <table class="table">
    <tr>
      <td>Poster:</td><td><img src="<?php echo $Poster; ?>"</td>
    </tr>
    <tr>
      <td>Movie Title:</td><td><?php echo $Title; ?></td>
    </tr>
    <tr>
      <td>Year Released:</td><td><?php echo $Year; ?></td>
    </tr>
    <tr>
      <td>Director:</td><td><?php echo $Director; ?></td>
    </tr>
    <tr>
      <td>Rating:</td><td><?php echo $Rating; ?></td>
    </tr>
    <tr>
      <td>Genre:</td><td><?php echo $Genre; ?></td>
    </tr>
    <tr>
      <td>Runtime:</td><td><?php echo $Runtime; ?></td>
    </tr>
    <tr>
      <td>Writer:</td><td><?php echo $Writer; ?></td>
    </tr>
    <tr>
      <td>Actor:</td><td><?php echo $Actor; ?></td>
    </tr>
    <tr>
      <td>Production Comapany:</td><td><?php echo $Country; ?></td>
    </tr>
    <tr>
      <td>IMDB Number:</td><td><?php echo $imdbID; ?></td>
    </tr>
    <tr>
    <td>Language:</td><td><?php echo $Language; ?></td>
  </tr>
  <tr>
    <td>Awards:</td><td><?php  echo $Awards; ?></td>
  </tr>
  <tr>
    <td>Metascore:</td><td><?php echo $Metascore; ?></td>
  </tr>
  <tr>
    <td>imdbRating:</td><td><?php echo $imdbRating; ?></td>
  </tr>
  <tr>
    <td>imdbVotes:</td><td><?php echo $imdbVotes; ?></td>
  </tr>
  <tr>
    <td>Type:</td><td><?php echo $Type; ?></td>
  </tr>
  <tr>
    <td>totalSeasons:</td><td><?php echo $totalSeasons; ?></td>
  </tr>
  <tr>
    <td>Response:</td><td><?php echo $Response; ?></td>
  </tr>
    <tr>
      <td>Price:</td><td><?php echo $Price; ?></td>
    </tr>
  </table>
  </form>
  <table class =table>
    <tr>
      <input type='button' value='Add to Cart' onClick='addToCart()'>
    </tr>
<?php include './sharedlayout/footer.php';?>
