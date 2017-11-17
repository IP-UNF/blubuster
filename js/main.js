$(document).ready(()=>{
  $('#searchForm').on('submit', (e)=> {
    let searchText = $('#searchText').val();
    getMovies(searchText);
    e.preventDefault();
  });
});

function getMovies(searchText)
{
  axios.get('http://www.omdbapi.com?s='+searchText+'&apikey=6bce83a9')
  .then((response)=>{
    console.log(response);
    let movies =response.data.Search;
    let output='';
    $.each(movies, (index, movie) =>{
      output+=`
      <div class ="col-md-3">
        <div class"well text-center">
        <img src="${movie.Poster}">
        <h5>${movie.Title}</h5>
        <a onclick="movieSelected('${movie.imdbID}')" class="btn btn-primary" href='#'>Movie Details/Add Movie</a>
        </div>
      </div>
      `;
    });
    $('#movies').html(output);
  })
  .catch((err)=>{
    console.log(err);
  });
}//end getMovie function

function movieSelected(id)
{
  sessionStorage.setItem('movieId', id);
  window.location="movie.html";
  return false;
}
//used for information panel if needed
function getMovie()
{
    let movieId=sessionStorage.getItem('movieId');
    axios.get('http://www.omdbapi.com?i='+movieId+'&apikey=6bce83a9')
    .then((response)=>{
      console.log(response);
      let movie=response.data;
      let output=`
      <div class="row">
        <div class="col-md-4">
          <img src="${movie.Poster}" class="thumbnail">
        </div>
        <div class="col-md-8">
        <h2>${movie.Title}</h2>
        <ul class="list-group">
          <li class="list-group-item"><strong>Genre: </strong>${movie.Genre}</li>
          <li class="list-group-item"><strong>Date Released: </strong>${movie.Released}</li>
          <li class="list-group-item"><strong>Movie Rating: </strong>${movie.Rated}</li>
          <li class="list-group-item"><strong>IMDB Rating: </strong>${movie.imdbRating}</li>
          <li class="list-group-item"><strong>Director: </strong>${movie.Director}</li>
          <li class="list-group-item"><strong>Writer: </strong>${movie.Writer}</li>
          <li class="list-group-item"><strong>Actors: </strong>${movie.Actors}</li>
        </ul>
        </div>
      </div>
      <div class="row">
        <div class="well">
          <h3>Plot</h3>
          ${movie.Plot}
          <hr>
          <a href="http://imdb.com/title/${movie.imdbID}" target="_blank" class ="btn btn-primary">View IMDB</a>
          <a href="movieindex.html" class="btn btn-default">Go Back to Search</a>
      `;
      $('#movie').html(output);
    })
    .catch((err)=>{
      console.log(err);
    });
}

function addMovie()
{
    let movieId=sessionStorage.getItem('movieId');
    axios.get('http://www.omdbapi.com?i='+movieId+'&apikey=6bce83a9')
    .then((response)=>{
      console.log(response);
      let movie=response.data;
      let output=`<form action='insert.php' method='get'>
      <table>
        <tr>
          <td>Movie Title:</td><td><input type='text' name='Title' value='${movie.Title}'></td>
        </tr>
        <tr>
          <td>Year Released:</td><td><input type='text' name='Year' value='${movie.Year}'></td>
        </tr>
        <tr>
          <td>Director:</td><td><input type='text' name='Director' value='${movie.Director}'></td>
        </tr>
        <tr>
          <td>Rating:</td><td><input type='text' name='Rating'value='${movie.Rated}'></td>
        </tr>
        <tr>
          <td>Genre:</td><td><input type='text' name='Genre' value='${movie.Genre}'></td>
        </tr>
        <tr>
          <td>Runtime:</td><td><input type='text' name='Runtime' value='${movie.Runtime}'></td>
        </tr>
        <tr>
          <td>Writer:</td><td><input type='text' name='Writer' value='${movie.Writer}'></td>
        </tr>
        <tr>
          <td>Actor:</td><td><input type='text' name='Actor' value='${movie.Actors}'></td>
        </tr>
        <tr>
          <td>Production Comapany:</td><td><input type='text' name='Country'value='${movie.Country}'></td>
        </tr>
        <tr>
          <td>IMDB Number:</td><td><input type='text' name='imdbID'value='${movie.imdbID}'></td>
        </tr>
        <tr>
          <td>Released:</td><td><input type='text' name='Released'value='${movie.Released}'></td>
        </tr>
        <tr>
          <td>Plot:</td><td><input type='text' name='Plot'value='${movie.Plot}'></td>
        </tr>
        <tr>
          <td>Language:</td><td><input type='text' name='Language'value='${movie.Language}'></td>
        </tr>
        <tr>
          <td>Awards:</td><td><input type='text' name='Awards'value='${movie.Awards}'></td>
        </tr>
        <tr>
          <td>Poster:</td><td><input type='text' name='Poster'value='${movie.Poster}'></td>
        </tr>
        <tr>
          <td>Ratings:</td><td><input type='text' name='Ratings'value='${movie.Ratings}'></td>
        </tr>
        <tr>
          <td>Metascore:</td><td><input type='text' name='Metascore'value='${movie.Metascore}'></td>
        </tr>
        <tr>
          <td>imdbRating:</td><td><input type='text' name='imdbRating'value='${movie.imdbRating}'></td>
        </tr>
        <tr>
          <td>imdbVotes:</td><td><input type='text' name='imdbVotes'value='${movie.imdbVotes}'></td>
        </tr>
        <tr>
          <td>Type:</td><td><input type='text' name='Type'value='${movie.Type}'></td>
        </tr>
        <tr>
          <td>totalSeasons:</td><td><input type='text' name='totalSeasons'value='${movie.totalSeasons}'></td>
        </tr>
        <tr>
          <td>Response:</td><td><input type='text' name='Response'value='${movie.Response}'></td>
        </tr>
        <tr>
          <td>Add Movie to Shopping Cart:</td><td><input type='radio' name='addToCart' value='1'></td>
        </tr>
        <tr>
          <td>Is Movie Owned:</td><td><input type='checkbox' name='Owned' value='1'></td>
        </tr>
        <tr>
          <td>Price:</td><td><input type='text' name='Price'value=''></td>
        </tr>
        <tr>
          <td colspan='2'><input type='submit' value='Add Record' ></td>
        </tr>
      </table>
      </form>`;
      $('#movie').html(output);
    })
    .catch((err)=>{
      console.log(err);
    });
}
