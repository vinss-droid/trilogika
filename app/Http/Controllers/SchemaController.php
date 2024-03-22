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
        $validate = $request->validate([
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
        $validate = $request->validate([
            'judul' => 'required',
            'nomor' => 'required',
            'jenis' => 'required',
        ]);

        $schema->update($validate);
        return redirect()->back()->with('success', 'Schema berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schema $schema)
    {
        $schema->delete();
        return redirect()->back()->with('success', 'Schema berhasil di hapus');
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
                    $button =  ($row->status == 'active') ? 
                    '<a href="javascript:void(0)" class="btn icon btn-primary updateStatusBtn" data-id=' .$row->id.'><i class="bi bi-eye"></i></a>' :
                    '<a href="javascript:void(0)" class="btn icon btn-secondary updateStatusBtn" data-id=' .$row->id.'><i class="bi bi-eye-slash"></i></a>';

                    $button .='
                    <a href="javascript:void(0)" id="btn-edit-post" class="btn icon btn-success btn-edit" data-id=' .$row->id.'><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn icon btn-danger" onclick="deleteSchema('.$row->id.')"><i class="bi bi-trash"></i></a>
                    <a href="'.route('unit-kompetensi.index',$row->id).'" class="btn icon btn-primary">UK</a>
                    ';
                    return new HtmlString($button);
                })
                ->rawColumns(['image'])
                ->make(true);
        }
    }

    public function status(Schema $schema){

        $newStatus = $schema->status == 'active' ? 'inactive' : 'active';
        $schema->update(['status' => $newStatus]);
        return response()->json(['message' => "Status updated to $newStatus"], 200);
    }
}
