<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Program;
use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home()
    {
        $cards = Card::all();
        $programs = Program::take(3)->get();
        $articles = Article::take(4)->get();
        // dd($article);
        return view('home', compact(['cards', 'programs', 'articles']));
    }

    public function programSlug($slug)
    {
        $program = Program::where('slug', $slug)->first();
        if (!$program) {
            abort(404);
        }
        return view('show_program', compact('program'));
    }
    public function articleSlug($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!$article) {
            abort(404);
        }
        return view('show_article', compact('article'));
    }
}
