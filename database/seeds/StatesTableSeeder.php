<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json= File::get('database/dataJson/statesUY.json');
        $data= json_decode($json);
        foreach ($data as $campo) {
            App\Ubications\State::create([
                'name'=> $campo->name,
                'code'=> $campo->id,
                'country_id'=> 1
            ]);          
        }

    }
}
