<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\District;
use App\Models\Province;

class AddressController extends Controller
{
    public function getDistricts ($id)
    {
        $districts = District::where('province_code', $id)->pluck('name', 'district_code');

        return json_encode($districts);
    }

    public function getWards ($id)
    {
        $wards = Ward::where('district_code', $id)->pluck('name', 'ward_code');

        return json_encode($wards);
    }
}