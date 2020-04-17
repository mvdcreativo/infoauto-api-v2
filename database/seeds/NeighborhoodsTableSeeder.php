<?php

use Illuminate\Database\Seeder;

class NeighborhoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json= File::get('database/dataJson/barriosMVD.json');
        $data= json_decode($json);
        foreach ($data as $campo) {
            App\Ubications\Neighborhood::create([
                'name'=> $campo->name,
                'code'=> $campo->id,
                'city_id'=> 1
            ]);          
        }
    }
}
