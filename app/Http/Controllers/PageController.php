<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    // function to get 5 quotes from rest api and return to index view
    public function quotes()
    {
        $quotes = [];
        for ($i = 0; $i < 5; $i++) {
            $response = Http::post('https://api.kanye.rest');
            $quotes[] = $response->json()['quote'];
        }
        
        return view('quotes', [
            'quotes' => $quotes
        ]);
    }
}