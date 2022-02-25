<?php

namespace Database\Seeders;

use App\Models\Istat;
use App\Models\Comune;
use App\Models\Region;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/data.json");
        $data = json_decode($json);

        foreach($data as $row){
            
            //insert regions
            $get_region = Region::where('name', $row->REGIONE)->first();
            
            if(!$get_region){
                Region::create([
                    'name'       => $row->REGIONE
                ]);
            }

            //insert province
            $get_povince = Province::where('name', $row->PROVINCIA)->first();

            if(!$get_povince){
                Province::create([
                    'name'       => $row->PROVINCIA,
                    'region_id'  => $get_region->id
                ]);
            }

            //insert comune
            $get_comune = Comune::where('name', $row->COMUNE)->first();

            if(!$get_comune){
                Comune::create([
                    'name'       => $row->COMUNE,
                    'code' => $row->CODICE_ISTAT,
                    'province_id'  => $get_povince->id
                ]);
            }
            
         }
    }
}
