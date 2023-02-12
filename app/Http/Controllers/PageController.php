<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class PageController extends Controller
{
    // function to get 5 quotes from rest api and return to index view
    public function index()
    {
        $quotes = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest');
            $quotes[] = $response->json()['quote'];
        }
        
        return view('index', [
            'quotes' => $quotes
        ]);
    }
}