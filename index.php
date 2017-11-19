<!DOCTYPE html>
<?php session_start();?>
<?php include 'header.php';?>
<script>
  function movieDetails(MovieID)
  {
    document.cookie = "MovieID="+MovieID;
    window.open("movieDetails.php",'_self');
  }
  </script>
  <?php
  require 'db.class.php';
  function getOneMovie($id)
  {
      $MovieID =$id;
      $sql = "SELECT Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, imdbID,Language,Awards,Poster,Ratings,Metascore,imdbRating,
      imdbVotes,Type,totalSeasons,Response,Price FROM movie Where MovieID = " .$MovieID;
      $result = DB::get()->query($sql);
        while($row = $result->fetch())
        {
          $Poster=$row["Poster"];
          $Price=$row["Price"];
          $Title=$row["Title"];
        }
        $result=null;
        echo '
            <img class="card-img-top"onClick="movieDetails('.$id.')"  src='. htmlspecialchars($Poster).' alt="Poster">
            <div class="card-body">
              <h4 class="card-title">
               <p  onClick="movieDetails('.$id.')" value='. htmlspecialchars($id).' id ="MovieID" name ="MovieID">' .htmlspecialchars($Title).'</p>
              </h4>
              <h5>'.$Price.'</h5>
            </div>
          </div>
        </div>';
  }
  ?>
  </head>
    <?php include'body.php';?>
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
  <?php include 'footer.php';?>
