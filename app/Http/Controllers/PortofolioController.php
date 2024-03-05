<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $portofolios = Portofolio::orderBy('created_at','desc')->get();
        return view('portofolio.index', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $date . '_' . $file->getClientOriginalName();
            $filePath = public_path() . '/image/portofolio/';
            $file->move($filePath, $fileName);
        }

        Portofolio::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $fileName,
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        //
        // dd($portofolio);
        return view('portofolio.edit_portofolio', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (file_exists(public_path('image/program/' . $portofolio->image))) {
                unlink(public_path('image/portofolio/' . $portofolio->image));
            }
            $newImage = $date . '_' . $image->getClientOriginalName();
            $image->move(public_path('image/portofolio'), $newImage);
            $validatedData['image'] = $newImage;
        } else {
            $validatedData['image'] = $portofolio->image;
        }

        $portofolio->update($validatedData);
        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        if (file_exists(public_path('image/portofolio/' . $portofolio->image))) {
            unlink(public_path('image/portofolio/' . $portofolio->image));
        }
        $portofolio->delete();
        return redirect()->back()->with('success', 'Portofolio berhasil dihapus');
    }
}
