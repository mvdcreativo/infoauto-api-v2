<?php

use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Extra::create([
            'name'=> 'Unico dueño',
            'slug'=> 'unico-dueno',
            'image_id'=> 1
        ]);
        App\Extra::create([
            'name'=> 'Motor recientemente ajustado',
            'slug'=> 'motor-recientemente-ajustado',
            'image_id'=> 1
        ]);
        App\Extra::create([
            'name'=> 'No taxi',
            'slug'=> 'no-taxi',
            'image_id'=> 1
        ]);
        App\Extra::create([
            'name'=> 'Cubiertas Nuevas',
            'slug'=> 'cubiertas-nuevas',
            'image_id'=> 1
        ]);
        App\Extra::create([
            'name'=> 'Patente paga todo el año',
            'slug'=> 'patente-paga-todo-el-ano',
            'image_id'=> 1
        ]);
        App\Extra::create([
            'name'=> 'Seguro pago por todo el año',
            'slug'=> 'seguro-pago-por-todo-el-ano',
            'image_id'=> 1
        ]);
        App\Extra::create([
            'name'=> 'Muy cuidado',
            'slug'=> 'muy-cuidado',
            'image_id'=> 1
        ]);
    }
}
