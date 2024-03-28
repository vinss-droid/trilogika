<?php

namespace App\Http\Controllers;

use App\Models\BuktiPersyaratan;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\UserData;
use App\Models\Village;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    public function formApp(){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        $provinces = Province::pluck('name', 'id');
        // $provinces = collect($province)->prepend('Pilih Provinsi',0);
        $regencies = Regency::where('province_id',$userData->provinsi)->pluck('name', 'id');
        // dd($regencies);
        $districts = District::where('regency_id',$userData->kabupaten)->pluck('name', 'id');
        $villages = Village::where('district_id',$userData->kecamatan)->pluck('name', 'id');
        if ($userData) {
            return view('guest.form_app_edit',compact(['userData','provinces','regencies','districts','villages']));
        }else{
           
            // dd($provinces);
            return view('guest.form_app',compact('provinces'));
        }

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
            'kalurahan'=>'required',
            'kode_pos'=>'required',
            'pendidikan'=>'required',
            'nama_sekolah'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'warga_negara'=>'required',
        ]);
        $validate['user_id'] = auth()->user()->id;

        UserData::create($validate);
        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }

    public function formAppupdate(UserData $userData, Request $request){
    // dd($request->all());
    $validate = $request->validate([
        'nama'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
            'nik'=>'required',
            'provinsi'=>'required',
            'kabupaten'=>'required',
            'kecamatan'=>'required',
            'kalurahan'=>'required',
            'kode_pos'=>'required',
            'pendidikan'=>'required',
            'nama_sekolah'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'warga_negara'=>'required', 
    ]);

    $userData->update($validate);
    return redirect()->back()->with('success', 'Data berhasil di update');
    
    }
    public function berkas(){
        return view('guest.berkas');
    }

    public function berkasStore(Request $request){
        $validate = $request->validate([
            'ktp'=>'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'ijazah'=>'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'cv'=>'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'sk_kerja'=>'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'pas_foto'=>'required|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        $validate['ktp'] = $request->file('ktp')->store('ktp');
        $validate['ijazah'] = $request->file('ijazah')->store('ijazah');
        $validate['cv'] = $request->file('cv')->store('cv');
        $validate['sk_kerja'] = $request->file('sk_kerja')->store('sk_kerja');
        $validate['pas_foto'] = $request->file('pas_foto')->store('pas_foto');

        $validate['user_id'] = auth()->user()->id;
        BuktiPersyaratan::create($validate);
        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }

}
