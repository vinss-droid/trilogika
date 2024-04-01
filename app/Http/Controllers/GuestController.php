<?php

namespace App\Http\Controllers;

use App\Models\BuktiPersyaratan;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\UserData;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


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
        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_ktp = Storage::disk('private')->putFileAs('berkas/ktp', $file, $fileName);
        }
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_ijazah = Storage::disk('private')->putFileAs('berkas/ijazah', $file, $fileName);
        }
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_cv = Storage::disk('private')->putFileAs('berkas/cv', $file, $fileName);
        }
        if ($request->hasFile('sk_kerja')) {
            $file = $request->file('sk_kerja');
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_skKerja = Storage::disk('private')->putFileAs('berkas/skKerja', $file, $fileName);
        }
        if ($request->hasFile('pas_foto')) {
            $file = $request->file('pas_foto');
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_pasFoto = Storage::disk('private')->putFileAs('berkas/pasFoto', $file, $fileName);
        }

        // $validate['user_id'] = auth()->user()->id;
        BuktiPersyaratan::create([
            'ktp' => $path_ktp,
            'ijazah' => $path_ijazah,
            'cv' => $path_cv,
            'sk_kerja' => $path_skKerja,
            'pas_foto' => $path_pasFoto,
            'user_id' =>auth()->user()->id,
        ]);
        if ($request->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        
        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }


}
