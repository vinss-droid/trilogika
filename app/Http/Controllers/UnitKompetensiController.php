<?php

namespace App\Http\Controllers;

use App\Models\UnitKompetensi;
use Illuminate\Http\Request;
use App\Models\Schema;

class UnitKompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($schemaId)
    {
        $schema = Schema::findOrFail($schemaId);
        $units = UnitKompetensi::where('schema_id', $schemaId)->get();
        if (!$units) {
            return view('schema.unitKom');
        }
        return view('schema.unitKom', compact(['units','schema']));
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
        $validate = $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'jenis_standar' => 'required',
        ]);

        $validate['schema_id'] = $request->schema_id;
        UnitKompetensi::create($validate);

        return redirect()->back()->with('success', 'Unit Kompetensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKompetensi $unitKompetensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKompetensi $unitKompetensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKompetensi $unitKompetensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKompetensi $unitKompetensi)
    {
        $unitKompetensi->delete();
        return redirect()->back()->with('success', 'Unit Kompetensi berhasil di hapus');
    }

    
}
