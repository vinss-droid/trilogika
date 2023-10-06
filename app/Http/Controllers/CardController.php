<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cards = Card::all();
        // dd($cards);
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'icon' => 'required',
        ]);
        // dd($validatedData);
        $card = new Card();
        $card->fill($validatedData);
        $card->save();

        return redirect()->back()->with('success', 'Card berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(card $card)
    {
        //
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Assessment',
            'data'    => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, card $card)
    {
        //
        // dd($card);
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'icon' => 'required',
        ]);
        $card->update($validatedData);
        $card->save();
        return redirect()->back()->with('success', 'card berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card $card)
    {
        $card->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
