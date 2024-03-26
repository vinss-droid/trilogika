<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndoRegionController extends Controller
{
    public function getRegencies(Request $request){
        $provinceId = $request->id_province;
        $regency = Regency::where('province_id',$provinceId)->pluck('name','id');
        $regencies = collect($regency)->prepend('Pilih Kota/Kabupaten',0);
        return response()->json($regencies);
    }

    public function getDistricts(Request $request){
        $regencyId = $request->id_regency;
        $district = District::where('regency_id',$regencyId)->pluck('name','id');
        $districts = collect($district)->prepend('Pilih Kecamatan',0);
        return response()->json($districts);
    }

    public function getVillages(Request $request){
        $districtId = $request->id_district;
        $village = Village::where('district_id',$districtId)->pluck('name','id');
        $villages = collect($village)->prepend('Pilih Kalurahan',0);
        return response()->json($villages);
    }
}
