<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Program;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home()
    {
        $cards = Card::all();
        $programs = Program::take(3)->get();
        // dd($programs);
        return view('home', compact(['cards', 'programs']));
    }

    public function programSlug($slug)
    {
        $program = Program::where('slug', $slug)->first();
        if (!$program) {
            abort(404);
        }
        return view('show_program', compact('program'));
    }
}
