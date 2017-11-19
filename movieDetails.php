<html>
<head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>BluBuster Blu-Ray Sales</title>

      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/shop-homepage.css" rel="stylesheet">
<?php
session_start();
$MovieID=$_COOKIE["MovieID"];
require 'db.class.php';


$sql = "SELECT Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, imdbID,Language,Awards,Poster,Ratings,Metascore,imdbRating,imdbVotes,Type,totalSeasons,Response,Price FROM movie Where MovieID = " .$MovieID;
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
      $Ratings=$row["Ratings"];
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
<body>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">BluBuster</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./inventory.php">Add Inventory</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <div class="col-lg-3">

            <h1 class="my-4">BluBuster</h1>
            <div class="list-group">
              <a href="#" class="list-group-item">Comedy</a>
              <a href="#" class="list-group-item">Horror</a>
              <a href="#" class="list-group-item">Sci-Fi</a>
            </div>

          </div>
          <!-- /.col-lg-3 -->

          <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>


  <form action='' method='get'>
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
    <td>Language:</td><td><input type='text' name='Language'value='<?php echo $Language; ?>'></td>
  </tr>
  <tr>
    <td>Awards:</td><td><input type='text' name='Awards'value='<?php  echo $Awards; ?>'></td>
  </tr>
  <tr>
    <td>Poster:</td><td><input type='text' name='Poster'value='<?php echo $Poster; ?>'></td>
  </tr>
  <tr>
    <td>Ratings:</td><td><input type='text' name='Ratings'value='<?php echo $Ratings; ?>'></td>
  </tr>
  <tr>
    <td>Metascore:</td><td><input type='text' name='Metascore'value='<?php echo $Metascore; ?>'></td>
  </tr>
  <tr>
    <td>imdbRating:</td><td><input type='text' name='imdbRating'value='<?php echo $imdbRating; ?>'></td>
  </tr>
  <tr>
    <td>imdbVotes:</td><td><input type='text' name='imdbVotes'value='<?php echo $imdbVotes; ?>'></td>
  </tr>
  <tr>
    <td>Type:</td><td><input type='text' name='Type'value='<?php echo $Type; ?>'></td>
  </tr>
  <tr>
    <td>totalSeasons:</td><td><input type='text' name='totalSeasons'value='<?php echo $totalSeasons; ?>'></td>
  </tr>
  <tr>
    <td>Response:</td><td><input type='text' name='Response' value='<?php echo $Response; ?>'></td>
  </tr>
    <tr>
      <td>Price:</td><td><input type='text' name='Price' value='<?php echo $Price; ?>'></td>
    </tr>
    <tr>
  </table>
  </form>
</form>

<footer class="py-5 bg-dark">
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; BluBuster 2017</p>
</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
