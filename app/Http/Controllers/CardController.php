<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function showCards()
    {
        // Fetch paginated data from the database
        $contents = Content::all(); // Adjust the number to control pagination size

        // Pass the data to the view
        return view('home', ['contents' => $contents]);
    }
}
