<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Currency::class, 1)->create();
        DB::table('currencies')->insert(
            [
            'name' => 'Pesos Uruguayos',
            'symbol' => '$U',
            'abbreviation' => 'UYU',
            'value' => 1,
            'primary' => 1
            ]);
        DB::table('currencies')->insert(
            [
                'name' => 'Dólares Americanos',
                'symbol' => 'U$S',
                'abbreviation' => 'USD',
                'value' => 0.0277,
                'primary' => 0 
            ]
        );
    }
}
