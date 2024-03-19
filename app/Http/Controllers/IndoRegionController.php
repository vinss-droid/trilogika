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
        $regencies = Regency::where('province_id',$provinceId)->pluck('name','id');
        return response()->json($regencies);
    }

    public function getDistricts(Request $request){
        $regencyId = $request->id_regency;
        $districts = District::where('regency_id',$regencyId)->pluck('name','id');
        return response()->json($districts);
    }

    public function getVillages(Request $request){
        $districtId = $request->id_district;
        $villages = Village::where('district_id',$districtId)->pluck('name','id');
        return response()->json($villages);
    }
}
