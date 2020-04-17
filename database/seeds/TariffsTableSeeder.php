<?php

use Illuminate\Database\Seeder;

class TariffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tariff::create([
            'name'=> 'Gratis',
            'title' => 'Sin Apuro',
            'price'=> 0,
            'currency_id'=> 1
        ]);
        App\Tariff::create([
            'name'=> 'Exposición Moderada',
            'title' => 'Mostrarlo Más',
            'price'=> 300,
            'currency_id'=> 1
        ]);
        App\Tariff::create([
            'name'=> 'Exposición Alta',
            'title' => 'Cuanto antes Mejor',
            'price'=> 700,
            'currency_id'=> 1
        ]);
        App\Tariff::create([
            'name'=> 'Maxima Exposició',
            'title' => 'Urgente!',
            'price'=> 1400,
            'currency_id'=> 1
        ]);

    }
}
