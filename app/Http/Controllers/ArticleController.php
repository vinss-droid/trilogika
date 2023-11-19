<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::all();
        // dd($articles);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //
        return view('article.add_article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $newFileName = $date . '_' . $request->file('image')->getClientOriginalName();
        // $request->file('image')->storeAs('public/images/article', $newFileName);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $date . '_' . $file->getClientOriginalName();
            $filePath = public_path() . '/image/article/';
            $file->move($filePath, $fileName);
        }

        Article::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $fileName,
        ]);

        return redirect()->route('article.index')->with('success', 'Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        //
        return view('article.edit_article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, article $article)
    {
        //
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'created_at' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->file('image')) {
        //     if (Storage::disk('public')->exists('images/article/' . $article->image)) {
        //         Storage::disk('public')->delete('images/article/' . $article->image);
        //     }
        //     $newImage = $date . '_' . $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public/images/article', $newImage);
        //     $validatedData['image'] = $newImage;
        // } else {
        //     $validatedData['image'] = $article->image;
        // }
        // dd($validatedData);

        if ($request->hasFile('image')) {
            $image = $request->file();
            if (file_exists(public_path('image/article/' . $article->image))) {
                unlink(public_path('image/article/' . $article->image));
            }
            $newImage = $date . '_' . $image->getClientOriginalName();
            $image->move(public_path('image/article'), $newImage);
            $validatedData['image'] = $newImage;
        } else {
            $validatedData['image'] = $article->image;
        }

        $article->update($validatedData);
        return redirect()->route('article.index')->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        //
        // if (Storage::disk('public')->exists('images/article/' . $article->image)) {
        //     Storage::disk('public')->delete('images/article/' . $article->image);
        // }

        if (file_exists(public_path('image/article/' . $article->image))) {
            unlink(public_path('image/article/' . $article->image));
        }
        $article->delete();
        return redirect()->back()->with('success', 'Artikel berhasil dihapus');
    }
}
