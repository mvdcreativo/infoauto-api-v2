<?php

use Illuminate\Database\Seeder;
use App\Vehicles\VehicleCategory;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $count = 4;
        VehicleCategory::create([
            'name'=> 'Autos y Camionetas',
            'slug'=> 'autos-y-camionetas',
            // 'image_url'=> ""
        ]);

        VehicleCategory::create([
            'name'=> 'Camiones',
            'slug'=> 'camiones',
            // 'image_url'=> ""
        ]);

        VehicleCategory::create([
            'name'=> 'Motos',
            'slug'=> 'motos',
            // 'image_url'=> ""
        ]);
    }
}
