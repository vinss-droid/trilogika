<?php

namespace App\Http\Controllers;

use App\Models\DataPekerjaan;
use App\Models\DataSertifikasi;
use App\Models\Schema;
use App\Models\User;
use App\Models\UserData;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\HtmlString;

class DataSertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::select(
            'users.*',
            'schemas.judul as judul_schema',
            'schemas.nomor as nomor_schema',
            'data_sertifikasis.tujuan as tujuan',
            'data_sertifikasis.status as status',
            'user_data.nama as nama',
            'data_sertifikasis.id as data_id',
        )
            ->join('data_sertifikasis', 'users.id', '=', 'data_sertifikasis.user_id')
            ->join('schemas', 'data_sertifikasis.schema_id', '=', 'schemas.id')
            ->join('user_data', 'users.id', '=', 'user_data.user_id')
            ->orderBy('data_sertifikasis.created_at', 'desc')
            ->get();
        // dd($datas);
        return view('dataSertifikasi.index', compact('datas'));
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
            $datas = User::select('users.*', 'schemas.judul as judul_schema', 'schemas.nomor as nomor_schema', 'data_sertifikasis.tujuan as tujuan', 'data_sertifikasis.status as status')
                ->join('data_sertifikasis', 'users.id', '=', 'data_sertifikasis.user_id')
                ->join('schemas', 'data_sertifikasis.schema_id', '=', 'schemas.id')
                ->orderBy('data_sertifikasis.created_at', 'desc')
                ->get();

            $counter = 1;
            return datatables()->of($datas)
                ->addColumn('DT_RowIndex',  function () use (&$counter) {
                    return $counter++;
                })
                ->addColumn('action', function ($row) {
                    $button =  ($row->status == 'active') ?
                        '<a href="javascript:void(0)" class="btn icon btn-primary updateStatusBtn" data-id=' . $row->id . '><i class="bi bi-eye"></i></a>' :
                        '<a href="javascript:void(0)" class="btn icon btn-secondary updateStatusBtn" data-id=' . $row->id . '><i class="bi bi-eye-slash"></i></a>';

                    $button .= '
                    <a href="javascript:void(0)" id="btn-edit-post" class="btn icon btn-success btn-edit" data-id=' . $row->id . '><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn icon btn-danger" onclick="deleteSchema(' . $row->id . ')"><i class="bi bi-trash"></i></a>
                    <a href="' . route('unit-kompetensi.index', $row->id) . '" class="btn icon btn-primary">UK</a>
                    ';
                    return new HtmlString($button);
                })
                ->make(true);
        }
    }

    public function updateStatus(Request $request)
    {
        // $data = DataSertifikasi::find($id);
        if (request()->ajax()) {
            $data = DataSertifikasi::find($request->id);
            $data->status = $request->status;
            $data->save();
            return response()->json(['success' => true]);
        }
    }

    public function downloadPdf($id)
    {
        $dataSertif = DataSertifikasi::find($id);
        $schema = Schema::with('unitKompetensis')->find($dataSertif->schema_id);
        $dataKerja = DataPekerjaan::where('user_id', $dataSertif->user_id)->first();
        // $user = UserData::where('user_id',$dataSertif->user_id)->first();
        // dd($schema);
        $user = UserData::select(
            'user_data.*',
            'provinces.name as provinsi',
            'regencies.name as kabupaten',
            'districts.name as kecamatan',
            'villages.name as kalurahan',
            'users.email as email',

        )
            ->join('provinces', 'user_data.provinsi', '=', 'provinces.id')
            ->join('regencies', 'user_data.kabupaten', '=', 'regencies.id')
            ->join('districts', 'user_data.kecamatan', '=', 'districts.id')
            ->join('villages', 'user_data.kalurahan', '=', 'villages.id')
            ->join('users', 'user_data.user_id', '=', 'users.id')
            ->where('user_id', $dataSertif->user_id)
            ->first();
        // dd($user);
        $pdf = Pdf::loadView('dataSertifikasi.pdf', compact(['schema', 'user', 'dataSertif','dataKerja']));
        return $pdf->stream();
        // return view('dataSertifikasi.pdf', compact('data'));
    }
}
