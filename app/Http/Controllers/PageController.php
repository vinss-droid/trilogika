<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Program;
use App\Models\Article;
use App\Models\Course;

class PageController extends Controller
{
    //
    public function home()
    {
        $cards = Card::all();
        $programs = Program::orderBy('created_at', 'desc')->take(3)->get();
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        $courses = Course::all();
        // dd($article);
        return view('home', compact(['cards', 'programs', 'articles', 'courses',]));
    }

    public function contact()
    {
        return view('contact_us');
    }

    public function show_galeri()
    {
        return view('show_galeri');
    }
    public function programs()
    {
        return view('programs');
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
        $related = Article::whereDate('created_at', '<=', $article->created_at)
            ->where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->take(3)->get();
        // dd($related);
        if (!$article) {
            abort(404);
        }
        return view('show_article', compact(['article', 'related']));
    }
}
