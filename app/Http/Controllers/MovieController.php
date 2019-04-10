<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Lists;
use App\Review;
use App\User;

class MovieController extends Controller
{
    // $baseImgUrl = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/nVN7Dt0Xr78gnJepRsRLaLYklbY.jpg';
    public function index()
    {
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $baseUrl =  "https://api.themoviedb.org/3/movie/popular?api_key=$apiKey&language=en-US&page=1";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $movies = json_decode($result->getBody())->results; //This should be halfed when on mobile so users can load faster
        return view('movies', [
            'movies' => $movies
        ]);
    }
    public function searchMovies(Request $request)
    {
        if ($request->search == null) {
            return redirect('/');
        } else {
            $query = $request['query'];
            $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
            $query = $request->input('search');
            $baseUrl =  "http://api.themoviedb.org/3/search/movie?api_key=$apiKey&query=$query";
            $client = new Client();
            $result = $client->get("$baseUrl");
            $movies = json_decode($result->getBody())->results;
    
            if ($movies == []) {
                return view('fallback');
            } else {
                return view('search', [
                    'movies' => $movies
                    ]
                );
            }
        }
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

    public function show($id)
    {
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $baseUrl = "https://api.themoviedb.org/3/movie/$id?api_key=$apiKey&language=en-US";
        $detailClient = new Client();
        $result = $detailClient->get("$baseUrl");
        $details = json_decode($result->getBody());

        $castsUrl = "http://api.themoviedb.org/3/movie/$id/casts?api_key=$apiKey";
        $castsClient = new Client();
        $castResult  = $castsClient->get("$castsUrl");
        $cast = json_decode($castResult->getBody());

        $director = [];

        foreach ($cast->crew as $key => $job) {
            if ($job->job == "Director") {
                array_push($director, $job->name);
            }
        }
        
        
        if (auth()->user()) {
            $userId = auth()->user()->id;
            $watchlists = Lists::where("list_owner", "=", $userId)->get();
        } else {
            $watchlists = '';
        }

        $reviews = Review::where('movie_id', "=", $id)->where('approved', '=', 1)->get();

        return view(
            'details',
            compact(
                'director',
                'cast',
                'details',
                'reviews',
                'watchlists'
            )
        );
    }
}
