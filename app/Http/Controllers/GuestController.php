<?php

namespace App\Http\Controllers;

use App\Models\BuktiPersyaratan;
use App\Models\DataSertifikasi;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Schema;
use App\Models\UserData;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class GuestController extends Controller
{
    public function formApp()
    {
        $userData = UserData::where('user_id', auth()->user()->id)->first();
        $provinces = Province::pluck('name', 'id');
        if ($userData) {
            $regencies = Regency::where('province_id', $userData->provinsi)->pluck('name', 'id');
            $districts = District::where('regency_id', $userData->kabupaten)->pluck('name', 'id');
            $villages = Village::where('district_id', $userData->kecamatan)->pluck('name', 'id');
            return view('guest.form_app_edit', compact(['userData', 'provinces', 'regencies', 'districts', 'villages']));
        } else {
            return view('guest.form_app', compact('provinces'));
        }
    }

    public function formAppStore(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'nik' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kalurahan' => 'required',
            'kode_pos' => 'required',
            'pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'warga_negara' => 'required',
        ]);
        $validate['user_id'] = auth()->user()->id;

        UserData::create($validate);
        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }

    public function formAppupdate(UserData $userData, Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'nik' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kalurahan' => 'required',
            'kode_pos' => 'required',
            'pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'warga_negara' => 'required',
        ]);

        $userData->update($validate);
        return redirect()->back()->with('success', 'Data berhasil di update');
    }
    public function berkas()
    {
        $berkas = BuktiPersyaratan::where('user_id', auth()->user()->id)->first();
        if (!$berkas) {
            return view('guest.berkas');
        } else {
            return view('guest.berkas_edit', compact('berkas'));
        }
    }

    public function berkasStore(Request $request)
    {
        $validate = $request->validate([
            'ktp' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'ijazah' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'cv' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'sk_kerja' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'pas_foto' => 'required|mimes:jpg,jpeg,png|max:1024',
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

        BuktiPersyaratan::create([
            'ktp' => $path_ktp,
            'ijazah' => $path_ijazah,
            'cv' => $path_cv,
            'sk_kerja' => $path_skKerja,
            'pas_foto' => $path_pasFoto,
            'user_id' => auth()->user()->id,
        ]);
        if ($request->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        return response()->json(['message' => 'Data berhasil ditambahkan']);
    }

    public function berkasUpdate(Request $request, BuktiPersyaratan $buktiPersyaratan)
    {
        $berkas = $buktiPersyaratan;
        $validate = Validator::make($request->all(), [
            'ktp' => 'mimes:pdf,jpg,jpeg,png|max:1024',
            'ijazah' => 'mimes:pdf,jpg,jpeg,png|max:1024',
            'cv' => 'mimes:pdf,jpg,jpeg,png|max:1024',
            'sk_kerja' => 'mimes:pdf,jpg,jpeg,png|max:1024',
            'pas_foto' => 'mimes:jpg,jpeg,png|max:1024',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            if (Storage::disk('private')->exists($berkas->ktp)) {
                Storage::disk('private')->delete($berkas->ktp);
            }
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_ktp = Storage::disk('private')->putFileAs('berkas/ktp', $file, $fileName);
            $berkas->update([
                'ktp' => $path_ktp
            ]);
        }
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            if (Storage::disk('private')->exists($berkas->ijazah)) {
                Storage::disk('private')->delete($berkas->ijazah);
            }
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_ijazah = Storage::disk('private')->putFileAs('berkas/ijazah', $file, $fileName);
            $berkas->update([
                'ijazah' => $path_ijazah
            ]);
        }
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            if (Storage::disk('private')->exists($berkas->cv)) {
                Storage::disk('private')->delete($berkas->cv);
            }
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_cv = Storage::disk('private')->putFileAs('berkas/cv', $file, $fileName);
            $berkas->update([
                'cv' => $path_cv
            ]);
        }
        if ($request->hasFile('sk_kerja')) {
            $file = $request->file('sk_kerja');
            if (Storage::disk('private')->exists($berkas->sk_kerja)) {
                Storage::disk('private')->delete($berkas->sk_kerja);
            }
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_skKerja = Storage::disk('private')->putFileAs('berkas/skKerja', $file, $fileName);
            $berkas->update([
                'sk_kerja' => $path_skKerja
            ]);
        }
        if ($request->hasFile('pas_foto')) {
            $file = $request->file('pas_foto');
            if (Storage::disk('private')->exists($berkas->pas_foto)) {
                Storage::disk('private')->delete($berkas->pas_foto);
            }
            $fileName = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $path_pasFoto = Storage::disk('private')->putFileAs('berkas/pasFoto', $file, $fileName);
            $berkas->update([
                'pas_foto' => $path_pasFoto
            ]);
        }

        // $berkas->update([
        //     'ktp' => $path_ktp,
        //     'ijazah' => $path_ijazah,
        //     'cv' => $path_cv,
        //     'sk_kerja' => $path_skKerja,
        //     'pas_foto' => $path_pasFoto,
        // ]);

        return redirect('dashboard')->with('success', 'data berhasil di update');
    }

    public function allSertifikasi()
    {
        $schemas = Schema::all();
        return view('guest.daftar_sertifikasi', compact('schemas'));
    }

    public function showSertifikasi($id)
    {
        $data = DataSertifikasi::where('user_id', auth()->user()->id)->first();
        // dd($data);
        if ($data == null) {
            $schemas = Schema::with('unitKompetensis')->where('id', $id)->first();
            return view('guest.show_sertifikasi', compact('schemas'));
        } else if ($data->status == 'daftar') {
            return redirect('dashboard')->with('success', 'anda sudah mendaftar sertifikasi tunggu konfirmasi dari admin');
        } else {
            $schemas = Schema::with('unitKompetensis')->where('id', $id)->first();
            return view('guest.show_sertifikasi', compact('schemas'));
        }
    }

    public function daftarSertifikasi(Request $request)
    {
        $sertifikasi = $request->validate([
            'tujuan' => 'required',
        ]);

        $sertifikasi['user_id'] = auth()->user()->id;
        $sertifikasi['schema_id'] = $request->schema_id;
        $sertifikasi['status'] = 'daftar';

        $schema = Schema::findOrFail($request->schema_id)->first();
        // dd($sertifikasi);
        DataSertifikasi::create($sertifikasi);
        return redirect('dashboard')->with('success', 'berhasil mendaftar sertifikasi ' . $schema->judul);
    }
}
