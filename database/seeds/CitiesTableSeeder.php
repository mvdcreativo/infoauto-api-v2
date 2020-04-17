<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Ubications\City::create([
            'name'=> 'Montevideo',
            'code'=> 'MVD',
            'state_id'=> 10
        ]);
    }
}
