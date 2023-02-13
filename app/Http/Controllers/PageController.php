<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    // function to get 5 unique quotes from rest api and return to 'quote' view.
    public function quotes()
    {
        $quotes = [];
        // loop adds quotes to array until there are 5 unique values.
        for ($i = 0; $i < 5; $i++) {
            $response = Http::get('https://api.kanye.rest');
            $newQuote = $response->json()['quote'];
            $isDuplicate = false;
            if ($i != 0) { // first quote always placed into array
                // looping through array to check if quotes are duplicates
                for ($j = 0; $j < count($quotes); $j++) {
                    if ($newQuote == $quotes[$j]) {
                        $i--; // don't progess in parent for loop
                        $isDuplicate = true; // prevents duplicate from being added
                        continue;
                    }
                }
            }
            if ($isDuplicate == true) {
                continue;
            } else {
                $quotes[] = $newQuote;
            }
        }
        
        return view('quotes', [
            'quotes' => $quotes
        ]);
    }
}