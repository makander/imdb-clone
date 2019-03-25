<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class MovieController extends Controller
{
    // $baseImgUrl = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/nVN7Dt0Xr78gnJepRsRLaLYklbY.jpg';
    public function index()
    {
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $query = "batman";
        $baseUrl =  "https://api.themoviedb.org/3/movie/popular?api_key=$apiKey&language=en-US&page=1";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $movies = json_decode($result->getBody())->results; //This should be halfed when on mobile so users can load faster


        return view('movies', [
            'movies' => $movies
        ]);
    }

    public function getSingleMovie(Request $request)
    {
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $id = $request['id'];
        $baseUrl = "https://api.themoviedb.org/3/movie/$id?api_key=$apiKey&language=en-US";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $movie = json_decode($result->getBody()); 

        $baseUrl = "https://api.themoviedb.org/3/movie/$id/credits?api_key=$apiKey";
        $result = $client->get("$baseUrl");
        $credits = json_decode($result->getBody()); 

        var_dump($credits);
        // return view('movies', [
        //     'movies' => $movies
        // ]);
    }



    public function searchMovies(Request $request)
    {
        $query = $request['query'];
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $baseUrl =  "http://api.themoviedb.org/3/search/movie?api_key=$apiKey&query=$query";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $response = json_decode($result->getBody())->results;
        
        return view('movies', [
            'movies' => $response
        ]);
    }

    public function searchTvShows($query)
    {
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";

        $baseUrl = "https://api.themoviedb.org/3/search/tv?api_key=$apiKey&language=en-US&page&query=$query";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $response = json_decode($result->getBody());
        return $response;
    }
}
