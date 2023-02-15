<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        return view('inicio', compact('films'));
    }

    public function show(Film $film)
    {
        $comments = Comment::Where('film_id', $film->id)->orderBy('created_at', 'DESC')->get();
//        dd($comments);

        return view('pelicula', compact('film', 'comments'));
    }

    public function post(Request $request)
    {
//        dd($request->film);

        $validated = $request->validate([
            'comentar' => 'required',
        ]);
        if ($validated){
            $comment = new Comment();
            $comment->film_id = $request->film;
            $comment->comment = $request->comentar;
            $comment->save();
        }
        return redirect()->route('show', ['film' => $request->film]);
    }
}
