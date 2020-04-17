<?php

use Illuminate\Database\Seeder;
use App\Vehicles\VehicleModel;

class VehicleModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json= File::get('database/dataJson/models.json');
        $data= json_decode($json);
        foreach ($data as $campo) {
            App\Vehicles\VehicleModel::create([
                'brand_id'=> $campo->brand_id,
                'name'=> $campo->name,
                'slug'=> $campo->slug,
                // 'image_url'=> 1,
            ]);          
        }

        // $count = 100;
        // factory(VehicleModel::class, $count)->create()->each(function(VehicleModel $vehicle_model){
        //     $vehicle_model->veicle_sub_models()->attach([
        //         rand(1,4),
        //         rand(5,8),
        //         rand(9,10)
        //     ]);
        // });
    }
}
