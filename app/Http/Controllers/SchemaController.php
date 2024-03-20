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
        if (request()->ajax()) {
            $schemas = Schema::orderBy('created_at','desc');
            $counter = 1;
            return datatables()->of($schemas)
                ->addColumn('DT_RowIndex',  function() use (&$counter){
                    return $counter++;
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="'.route('schema.edit',$row->id).'" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn icon btn-danger" onclick="deletePost('.$row->id.')"><i class="bi bi-trash"></i></a>
                    ';
                    return new HtmlString($button);
                })
                ->rawColumns(['image'])
                ->make(true);
        }
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
        //
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
}
