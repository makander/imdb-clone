<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
</head>
<body>
    <input type="text" id="searchField" /> <button onclick="searchMovie()">Search</button>
  <ul style="list-style-type:noné">
    @foreach ($movies as $match)
    	<li>
				<div style="margin:10px">
          <img src="http://image.tmdb.org/t/p/w45//{{$match->poster_path}}">
      	  <a href="/movies/{{ $match->id}}" style="text-decoration:none;color:black"><b>{{ $match->title }}</b> ({{ $match->release_date }})</a>
      	<div> 
      </li>
    @endforeach
  </ul>
</body>
</html>
<script>

function searchMovie() {
    let query = document.querySelector('#searchField').value;
    window.location.replace(`http://dimb.test/movies/search/${query}`);
}

</script>