<?php

use Illuminate\Database\Seeder;

class ConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Condition::create([
            'name'=> '0Km.',
            'slug'=> '0km'
        ]);
        App\Condition::create([
            'name'=> 'Usado',
            'slug'=> 'usado'
        ]);
    }
}
