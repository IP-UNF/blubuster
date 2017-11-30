<?php
class Movie {
  function Movie($MovieID){
    $sql = "SELECT Title,Poster,Price FROM movie Where MovieID = " .$MovieID;
    $result = DB::get()->query($sql);
    while($row = $result->fetch()){
      $this->price = $row["Price"];
      $this->poster =$row["Poster"];
      $this->title = $row["Title"];
    }
    
    return $this;
  }
}
 ?>
