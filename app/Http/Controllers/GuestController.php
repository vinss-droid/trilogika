<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\UserData;
use App\Models\Village;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    public function formApp(){
        $provinces = Province::pluck('name', 'id');

        return view('guest.form_app',compact('provinces'));
    }

    public function formAppStore(Request $request){
        $validate = $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
            'nik'=>'required',
            'provinsi'=>'required',
            'kabupaten'=>'required',
            'kecamatan'=>'required',
            'kelurahan'=>'required',
            'kode_pos'=>'required',
            'pendidikan'=>'required',
            'nama_sekolah'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'warga_negara'=>'required',
        ]);
        $validate['id_user'] = auth()->user()->id;

        UserData::create($validate);
        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }

}
