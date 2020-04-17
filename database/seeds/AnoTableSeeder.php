<?php

use Illuminate\Database\Seeder;

class AnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($ano=1920; $ano<=2025 ; $ano++) { 
            App\Ano::Create([
                "ano"=> $ano
            ]);
        };
    }
}
