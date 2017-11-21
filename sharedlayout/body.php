<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="./index.php">BluBuster</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./inventory.php">Add Inventory</a>
        </li>
          <?php
        if(isset($_SESSION['validated']) !="")
          {
            echo'
          <li class="nav-item">
              <a class="nav-link" href="./logout.php">Logout</a>
          </li>';
          } else
          {
            echo'
        <li class="nav-item">
          <a class="nav-link" href="./CreateAccount.php">Create Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>';
          }
        ?>
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
        <a href="./genre.php?genre=action" class="list-group-item">Action</a>
        <a href="./genre.php?genre=adventure" class="list-group-item">Adventure</a>
        <a href="./genre.php?genre=comedy" class="list-group-item">Comedy</a>
        <a href="./genre.php?genre=crime" class="list-group-item">Crime</a>
        <a href="./genre.php?genre=drama" class="list-group-item">Drama</a>
        <a href="./genre.php?genre=fantasy" class="list-group-item">Fantasy</a>
        <a href="./genre.php?genre=thriller" class="list-group-item">Thriller</a>
        <a href="./genre.php?genre=sci-fi" class="list-group-item">Sci-Fi</a>
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
            <img class="d-block img-fluid"src="./images/magnum.jpg" src="" alt="Magnum PI">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="./images/btf.jpg" alt="Back to the Futre">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="./images/nfl.jpg" alt="NFL">
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
