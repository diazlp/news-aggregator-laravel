<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function fetchNewsApiHeadline(Request $request)
    {
        $query = $request->query();

        // Construct the NewsAPI URL with query parameters
        $url = 'https://newsapi.org/v2/top-headlines?' . http_build_query($query + ['apiKey' => config('services.news_api.key')]);
        
        // Make the HTTP request to the NewsAPI
        $response = Http::get($url);
        
        // Return the response from NewsAPI
        return $response->json();
    }

    public function fetchNewsApiFilter(Request $request)
    {
        $query = $request->query();

        // Construct the NewsAPI URL with query parameters
        $url = 'https://newsapi.org/v2/everything?' . http_build_query($query + ['apiKey' => config('services.news_api.key')]);
        
        // Make the HTTP request to the NewsAPI
        $response = Http::get($url);
        
        // Return the response from NewsAPI
        return $response->json();
    }

    public function fetchGuardianApi(Request $request)
    {
        $query = $request->query();

        // Construct the The Guardian API URL with query parameters
        $url = 'https://content.guardianapis.com/search?' . http_build_query($query + ['api-key' => config('services.guardian_api.key')]);
        
        // Make the HTTP request to the The Guardian API
        $response = Http::get($url);
        
        // Return the response from The Guardian API
        return $response->json();
    }

    public function fetchNYTApiHome()
    {
        // Construct the New York Times API URL with query parameters
        $url = 'https://api.nytimes.com/svc/topstories/v2/home.json?' . http_build_query(['api-key' => config('services.nyt_api.key')]);
        
        // Make the HTTP request to the New York Times API
        $response = Http::get($url);
        
        // Return the response from New York Times API
        return $response->json();
    }
}
