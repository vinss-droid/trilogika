<?php

namespace App\Http\Controllers;

use App\Models\BuktiPersyaratan;
use App\Models\DataPekerjaan;
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
        $dataPekerjaan = DataPekerjaan::where('user_id', auth()->user()->id)->first();
        $provinces = Province::pluck('name', 'id');
        if ($userData) {
            $regencies = Regency::where('province_id', $userData->provinsi)->pluck('name', 'id');
            $districts = District::where('regency_id', $userData->kabupaten)->pluck('name', 'id');
            $villages = Village::where('district_id', $userData->kecamatan)->pluck('name', 'id');
            return view('guest.form_app_edit', compact(['userData', 'dataPekerjaan', 'provinces', 'regencies', 'districts', 'villages']));
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
        $validate2 = $request->validate([
            'nama_institusi' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
            'tlp_kantor' => 'nullable|string',
            'kode_pos_kantor' => 'nullable|string',
            'fax_kantor' => 'nullable|string',
            'email_kantor' => 'nullable|string',
        ]);
        $validate['user_id'] = auth()->user()->id;
        $validate2['user_id'] = auth()->user()->id;
        // dd($validate2);
        UserData::create($validate);
        DataPekerjaan::create($validate2);
        return redirect('dashboard')->with('success', 'Data anda berhasil di simpan');
    }

    public function formAppupdate(UserData $userData, Request $request)
    {
        // dd($request->all());
        $dataPekerjaan = DataPekerjaan::where('user_id', auth()->user()->id)->first();
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
        $validate2 = $request->validate([
            'jabatan' => 'nullable|string',
            'nama_institusi' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
            'tlp_kantor' => 'nullable|string',
            'kode_pos_kantor' => 'nullable|string',
            'fax_kantor' => 'nullable|string',
            'email_kantor' => 'nullable|string',

        ]);
        $userData->update($validate);
        $dataPekerjaan->update($validate2);
        return redirect('dashboard')->with('success', 'Data Anda berhasil di update');
    }

    public function buktiPersyaratan()
    {
        $datas = BuktiPersyaratan::where('user_id', auth()->user()->id)->get();
       
        $inputs = collect(
            [
                [
                    'type' => 'ijazah',
                    'name' => 'ijazah',
                    'label' => 'Ijazah',
                    'description' => 'File Maksimal 1 MB format pdf',
                ],
                [
                    'type' => 'sk_kerja',
                    'name' => 'sk_kerja',
                    'label' => 'Surat Pengalaman Kerja',
                    'description' => 'File Maksimal 1 MB format pdf',
                ],
                [
                    'type' => 'ktp',
                    'name' => 'ktp',
                    'label' => 'KTP',
                    'description' => 'File Maksimal 1 MB format pdf',
                ],
                [
                    'type' => 'foto',
                    'name' => 'foto',
                    'label' => 'Pas Foto 3x4',
                    'description' => 'File Maksimal 1 MB format pdf',
                ],
                [
                    'type' => 'cv',
                    'name' => 'cv',
                    'label' => 'Curiculum Vitae ',
                    'description' => 'File Maksimal 1 MB format pdf',
                ],
            ]
        )->map(function ($item) {
            return (object) $item;
        });
// dd($inputs);
        if($datas->count() > 0){
            return view('guest.bukti_persyaratan_edit', compact(['datas', 'inputs']));
        }else{
            return view('guest.bukti_persyaratan', compact('inputs'));
        }
    }

    public function buktiPersyaratanStore(Request $request)
    {
        $request->validate([
            'type' => 'required|array',
            'type.*' => 'required|string',
            'file' => 'required|array',
            'file.*' => 'mimes:pdf,jpg,png|max:1024',
        ]);

        $files = $request->file;
        $types = $request->type;
        // dd($files);
        foreach ($types as $key => $type) {
            // $files[$key]->storeAs('private/bukti_persyaratan', $files[$key]->getClientOriginalName());
            if (isset($files[$key])) {
                $file = $files[$key];
                $fileName = Carbon::now()->format('YmdHis') . '_' . $files[$key]->getClientOriginalName();
                $path = Storage::disk('private')->putFileAs('bukti_persyaratan/' . $type, $file, $fileName);
                BuktiPersyaratan::create([
                    'user_id' => auth()->user()->id,
                    'path' => $path,
                    'type' => $type,
                ]);
            } else {
                BuktiPersyaratan::create([
                    'user_id' => auth()->user()->id,
                    'path' => null,
                    'type' => $type,
                ]);
            }
        }
        return redirect('dashboard')->with('success', 'Data Anda berhasil di simpan');
    }

    public function buktiPersyaratanUpdate(Request $request){
        $buktiPersyaratan = BuktiPersyaratan::where('user_id', auth()->user()->id)->get();
        // dd($buktiPersyaratan);
        $request->validate([
            'type' => 'required|array',
            'type.*' => 'required|string',
            'file' => 'required|array',
            'file.*' => 'mimes:pdf,jpg,png|max:1024',
        ]);
        $files = $request->file;
        $types = $request->type;
        foreach ($types as $key => $type) {
            if (isset($files[$key])) {
                $file = $files[$key];
                $fileExist = $buktiPersyaratan[$key]->path ?? 'null';
                if (Storage::disk('private')->exists($fileExist)) {
                    Storage::disk('private')->delete($buktiPersyaratan[$key]->path);
                }
                $fileName = Carbon::now()->format('YmdHis') . '_' . $files[$key]->getClientOriginalName();
                $path = Storage::disk('private')->putFileAs('bukti_persyaratan/' . $type, $file, $fileName);

                if ($buktiPersyaratan[$key]->path == null) {
                    $path = Storage::disk('private')->putFileAs('bukti_persyaratan/' . $type, $file, $fileName);
                    BuktiPersyaratan::where('user_id', auth()->user()->id)
                    ->where('type', $type)
                    ->update([
                        'path' => $path,
                    ]);
                }else{
                    BuktiPersyaratan::where('user_id', auth()->user()->id)
                    ->where('type', $type)
                    ->update([
                        'path' => $path,
                    ]);
                }
            }
        }
        return redirect('dashboard')->with('success', 'Data Anda berhasil di update');
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
