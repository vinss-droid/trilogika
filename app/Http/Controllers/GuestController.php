<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    public function formApp(){
        $provinces = Province::pluck('name', 'id');

        return view('guest.form_app',compact('provinces'));
    }

}
