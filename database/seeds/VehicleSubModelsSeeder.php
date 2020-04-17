<?php

use Illuminate\Database\Seeder;
use App\Vehicles\VehicleSubModel;

class VehicleSubModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Camioneta',
            'slug'=> 'camioneta',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Convertible',
            'slug'=> 'convertible',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Coupé',
            'slug'=> 'coupe',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Crossover',
            'slug'=> 'crossover',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Familiar',
            'slug'=> 'familiar',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Hatchback',
            'slug'=> 'hatchback',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Unico dueño',
            'slug'=> 'unico-dueno',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Microbus',
            'slug'=> 'microbus',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Monovolumen',
            'slug'=> 'monovolumen',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Pick-Up',
            'slug'=> 'pick-up',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Sedán',
            'slug'=> 'sedan',
            'vehicle_model_id' => rand(1,1008)
        ]);
        App\Vehicles\VehicleSubModel::create([
            'name'=> 'Utilitario',
            'slug'=> 'utilitario',
            'vehicle_model_id' => rand(1,1008)
        ]);
    }
}
