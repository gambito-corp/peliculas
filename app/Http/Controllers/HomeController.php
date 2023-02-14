<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $films = Film::withCount('comments')->get();
        return view('welcome', compact('films'));
    }
}
