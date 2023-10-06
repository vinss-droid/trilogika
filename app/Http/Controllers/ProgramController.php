<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('programs.add_program');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($date);
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newFileName = $date . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $newFileName);

        Program::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $newFileName,
        ]);

        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(program $program)
    {
        //
        // $image = Storage::disk('public')->exists('images/' . $program->image);
        // dd($image);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(program $program)
    {
        //
        return view('programs.edit_program', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, program $program)
    {
        //
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            if (Storage::disk('public')->exists('images/' . $program->image)) {
                Storage::disk('public')->delete('images/' . $program->image);
            }
            $newImage = $date . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $newImage);
            $validatedData['image'] = $newImage;
        } else {
            $validatedData['image'] = $program->image;
        }
        // dd($validatedData);
        $program->update($validatedData);
        return redirect()->route('program.index')->with('success', 'Program berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(program $program)
    {
        //
        if (Storage::disk('public')->exists('images/' . $program->image)) {
            Storage::disk('public')->delete('images/' . $program->image);
        }
        $program->delete();
        return redirect()->back()->with('success', 'Program berhasil dihapus');
    }
}
