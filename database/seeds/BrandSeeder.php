<?php

use Illuminate\Database\Seeder;
use App\Vehicles\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json= File::get('database/dataJson/brand.json');
        $data= json_decode($json);
        foreach ($data as $campo) {
           $brand = new App\Vehicles\Brand([
                'name'=> $campo->name,
                'slug'=> $campo->slug,
                'image_url'=> "images/logos-marcas/logo-".$campo->slug.".jpg",
            ]);
            $brand->save();
            $brand->vehicle_categories()->sync(1);
        }
    }
}
// ->each(function(VehicleModel $vehicle_model){
//     //     $vehicle_model->veicle_sub_models()->attach([
//     //         rand(1,4),
//     //         rand(5,8),
//     //         rand(9,10)
//     //     ]);
