<!DOCTYPE html>
<?php
 session_start();
 if(isset($_GET["genre"]))
  {
      $Genre = $_GET["genre"];
  }
?>
<?php include './sharedlayout/header.php';?>
<script>
  function movieDetails(MovieID)
  {
    document.cookie = "MovieID="+MovieID;
    window.open("movieDetails.php",'_self');
  }
  </script>
  <?php

  require 'db.class.php';

  //gets all the movies one by one and inserts them into the html table
  function getOneMovie($Genre)
  {
      $res = DB::get()->prepare('SELECT COUNT(*) FROM movie');
      $res->execute();
      $num_rows = $res->fetchColumn();
      //$MovieID =$id;
      $sql = "SELECT MovieID, Title, Year, Director, Rating, Genre, Runtime, Writer, Actor, Country, imdbID,Language,Awards,Poster,Ratings,Metascore,imdbRating,
      imdbVotes,Type,totalSeasons,Response,Price FROM movie where Genre like '%{$Genre}%'";
      $result = DB::get()->prepare($sql);
      $result = DB::get()->query($sql);
      if ($num_rows > 0){
        while($row = $result->fetch())
        {
          echo ' <div class="col-lg-4 col-md-6 mb-4">';
          echo '  <div class="card h-100">';
          echo '  <img class="card-img-top"onClick="movieDetails('.$row["MovieID"].')"  src='. $row["Poster"].' alt="Poster">';
          echo '   <div class="card-body">';
          echo '     <h4 class="card-title">';
          echo '      <p  onClick="movieDetails('.$row["MovieID"].')"  id ="MovieID" name ="MovieID">' .$row["Title"].'</p>';
          echo '     </h4>';
          echo '    <h5>'.$row["Price"].'</h5>';
          echo '  </div>';
          echo ' </div>';
          echo ' </div>';
        }
        $result=null;
      }
    }
  ?>
  </head>
    <?php include'./sharedlayout/body.php';?>
          <div class="row">
              <?php getOneMovie($Genre);?>
  <?php include './sharedlayout/footer.php';?>
