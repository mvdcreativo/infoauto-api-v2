<?php

use Illuminate\Database\Seeder;

class PriceConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\PriceCondition::create([
            'name'=> 'Financio',
            'slug'=> 'financio'
        ]);
        App\PriceCondition::create([
            'name'=> 'Posible Permuta',
            'slug'=> 'posible-permuta'
        ]);
        App\PriceCondition::create([
            'name'=> 'Contado',
            'slug'=> 'contado'
        ]);
        App\PriceCondition::create([
            'name'=> 'Negociable',
            'slug'=> 'negociable'
        ]);
    }
}
