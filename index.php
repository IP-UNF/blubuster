<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script>
    	function movieDetails()
    	{
    		document.myForm.action='movieDetails.php';
    		document.myForm.submit();
    	}
      </script>
    <?php
    require 'db.class.php';
    function getOneMovie($id)
    {
      $MovieID =$id;
      $sql = "SELECT Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, imdbID,Language,Awards,Poster,Ratings,Metascore,imdbRating,imdbVotes,Type,totalSeasons,Response,Price FROM movie Where MovieID = " .$MovieID;
      $result = DB::get()->query($sql);
        while($row = $result->fetch())
        {
          $Poster=$row["Poster"];
          $Price=$row["Price"];
          $Title=$row["Title"];
        }
        $result=null;
        echo '  <form action="" method="get" name="myForm">
            <a href="#"><img class="card-img-top" src='.$Poster.' alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
               <p onClick="movieDetails()" value='.$MovieID.' name ="MovieID">'.$Title.'</p>
              </h4>
              <h5>'.$Price.'</h5>
              <p class="card-text"></p>
            </div></form>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>';
      }
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
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
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

          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
              <?php getOneMovie(92);?>

          <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                  <?php getOneMovie(93);?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                  <?php getOneMovie(94);?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <?php getOneMovie(95);?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <?php getOneMovie(96);?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <?php getOneMovie(97);?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
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
