<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    public function index()
    {
        $movies = ["Titanic", "Lion King", "X-men"];

        return view('movies', compact('movies'));
    }

    /*     public function searchMovies($query)
        {
            $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
            $baseImgUrl = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/nVN7Dt0Xr78gnJepRsRLaLYklbY.jpg';
            $baseUrl =  "http://api.themoviedb.org/3/search/movie?api_key=$apiKey&query=$query";
            $client = new Client();
            $result = $client->get("$baseUrl");
            $response = json_decode($result->getBody());
            return $response;
        }
        public function searchTvShows($query)
        {
            $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
            $baseImgUrl = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/nVN7Dt0Xr78gnJepRsRLaLYklbY.jpg';
            $baseUrl = "https://api.themoviedb.org/3/search/tv?api_key=$apiKey&language=en-US&page&query=$query";
            $client = new Client();
            $result = $client->get("$baseUrl");
            $response = json_decode($result->getBody());
            return $response;
        } */
}
