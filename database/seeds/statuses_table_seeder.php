<?php

use Illuminate\Database\Seeder;

class statuses_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Status::create([
            'name'=> 'Activo',
        ]);
        App\Status::create([
            'name'=> 'Pausado',
        ]);
        App\Status::create([
            'name'=> 'Inactivo',
        ]);
        App\Status::create([
            'name'=> 'Finalizado',
        ]);
        App\Status::create([
            'name'=> 'Pendiente',
        ]);
        App\Status::create([
            'name'=> 'Plantilla',
        ]);
        App\Status::create([
            'name'=> 'Plantilla Pendiente',
        ]);
        App\Status::create([
            'name'=> 'Incompleto',
        ]);
    }
}
