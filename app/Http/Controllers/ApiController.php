<?php

namespace App\Http\Controllers;

use App\Models\Istat;
use App\Models\Comune;
use App\Models\Region;
use App\Models\Province;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function regions(Request $request) {

        $regions = Region::query();

        if($request->search) {
            $regions->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($regions->get());
    }
    
    public function provinces(Request $request) {

        $provinces = Province::query();

        if($request->region_id) {
             $provinces->where('region_id', $request->region_id);
        }

        if($request->region) {
            $region = Region::where('name', $request->region)->first();

            if($region){
                $provinces->where('region_id', $region->id);
            }
        }
    
        if($request->search) {
            $provinces->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($provinces->get());
    }

    public function comuni(Request $request) {
        $comuni = Comune::query();

        if($request->province_id) {
            $comuni->where('province_id', $request->province_id);
        }

         if($request->province) {
            $province = Province::where('name', $request->province)->first();

            if($province){
                $comuni->where('province_id', $province->id);
            }
        }

        if($request->search) {
            $comuni->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($comuni->get());
    }
}
