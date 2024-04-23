<?php

namespace App\Http\Controllers;

use App\Models\DataSertifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class DataSertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::select('users.*','schemas.judul as judul_schema','schemas.nomor as nomor_schema','data_sertifikasis.tujuan as tujuan')
        ->join('data_sertifikasis', 'users.id', '=', 'data_sertifikasis.user_id')
        ->join('schemas', 'data_sertifikasis.schema_id', '=', 'schemas.id')
        ->get();
        dd($datas);
        return view('dataSertifikasi.index');
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
    public function show(DataSertifikasi $dataSertifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataSertifikasi $dataSertifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataSertifikasi $dataSertifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataSertifikasi $dataSertifikasi)
    {
        //
    }

    public function getDataSertifikasis()
    {
        if (request()->ajax()) {
            $schemas = DataSertifikasi::orderBy('created_at','desc');
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
                ->make(true);
        }
        
    }
}
