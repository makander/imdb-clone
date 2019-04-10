<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Movie;

class SearchController extends Controller
{

    public function index()
    {
        $genres = [
            '28' => 'Action', 
            '12' => 'Adventure',
            '16' => 'Animation', 
            '35' => 'Comedy', 
            '80' => 'Crime', 
            '99' => 'Documentary', 
            '18' => 'Drama', 
            '10751' => 'Family', 
            '14' => 'Fantasy', 
            '36' => 'History', 
            '27' => 'Horror', 
            '10402' => 'Music', 
            '9648' => 'Mystery', 
            '10749' => 'Romance', 
            '878' => 'Science Fiction', 
            '10770' => 'TV Movie', 
            '53' => 'Thriller', 
            '10752' => 'War',
            '37' => 'Western'
        ];

        return view('advancedsearch', [
            'genres' => $genres
        ]);
    }

    public function advancedsearch(Request $request)
    {
        
        
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $query = $request->genre;
        $baseUrl = "https://api.themoviedb.org/3/discover/movie?api_key=$apiKey&with_genres=$query";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $movies = json_decode($result->getBody())->results;

        if ($movies == []) {
            return view('fallback');
        } else {
            return view('search', [
                'movies' => $movies
            
            ]);
        }

    }
}
