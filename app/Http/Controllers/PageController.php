<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Card;
use App\Models\Program;
use App\Models\Article;
use App\Models\Course;
use App\Models\Portofolio;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    //
    public function home()
    {
        $cards = Card::all();
        $programs = Program::orderBy('created_at', 'desc')->take(3)->get();
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        $portofolios = Portofolio::orderBy('created_at', 'desc')->take(3)->get();
        $courses = Course::orderBy('created_at','desc')->where('status','active')->take(6)->get();
        // dd($article);
        return view('home', compact(['cards', 'programs', 'articles', 'courses', 'portofolios']));
    }

    public function contact()
    {
        return view('contact_us');
    }

    public function show_galeri()
    {
        $portofolios = Portofolio::orderBy('created_at','desc')->paginate(12);
        return view('show_galeri',compact('portofolios'));
    }
    public function programs()
    {
        $programs = Program::paginate(6);
        return view('programs', compact('programs'));
    }
    public function articles()
    {
        $articles = Article::paginate(6);
        return view('articles', compact('articles'));
    }

    public function visiMisi(){
        return view('visi_misi');
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
        if ($related->count() === 0) {
            $related = Article::whereDate('created_at', '>=', $article->created_at)
                ->where('id', '!=', $article->id)
                ->orderBy('created_at', 'desc')
                ->take(3)->get();
        }

        // dd($related);
        if (!$article) {
            abort(404);
        }
        return view('show_article', compact(['article', 'related']));
    }
    public function courseSlug($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if (!$course) {
            abort(404);
        }
        return view('show_course', compact('course'));
    }
}
