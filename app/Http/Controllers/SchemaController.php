<?php

namespace App\Http\Controllers;

use App\Models\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class SchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('schema.index');
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
        // dd($request->all());

        $validate=$request->validate([
            'judul' => 'required',
            'nomor' => 'required',
            'jenis' => 'required',
        ]);

        Schema::create($validate);
        return redirect()->back()->with('success', 'Schema berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Schema $schema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schema $schema)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $schema  
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schema $schema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schema $schema)
    {
        //
    }

    public function getSchema(){
        if (request()->ajax()) {
            $schemas = Schema::orderBy('created_at','desc');
            $counter = 1;
            return datatables()->of($schemas)
                ->addColumn('DT_RowIndex',  function() use (&$counter){
                    return $counter++;
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="javascript:void(0)" id="btn-edit-post" class="btn icon btn-success btn-edit" data-id=' .$row->id.'><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn icon btn-danger" onclick="deletePost('.$row->id.')"><i class="bi bi-trash"></i></a>
                    <a href="#" class="btn icon btn-primary">UK</a>
                    ';
                    return new HtmlString($button);
                })
                ->rawColumns(['image'])
                ->make(true);
        }
    }
}
