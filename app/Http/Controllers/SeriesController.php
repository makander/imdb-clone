<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index()
    {
        $apiKey = "f9948c89015a41a0a70d75d459c92e4f";
        $query = "batman";
        $baseUrl =  "https://api.themoviedb.org/3/tv/popular?api_key=$apiKey&language=en-US&page=1";
        $client = new Client();
        $result = $client->get("$baseUrl");
        $response = json_decode($result->getBody())->results; //This should be halfed when on mobile so users can load faster
        var_dump($response);

        $series = ["Sopranos", "Better call Saul", "South Park"];

        //return view('series', compact('series'));
    }
}
