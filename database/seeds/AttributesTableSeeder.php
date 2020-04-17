<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Attribute::create([
            'name'=> 'Seguridad',
            'slug'=> 'seguridad',
            'multi_option'=> 1,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Confort',
            'slug'=> 'confort',
            'multi_option'=> 1,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Combustible',
            'slug'=> 'combustible',
            'multi_option'=> 1,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Transmisión',
            'slug'=> 'transmision',
            'multi_option'=> 1,
            'image_id'=> 1
        ]);
        /////////////5-10
        App\Attribute::create([
            'name'=> 'Aire Acondicionado',
            'slug'=> 'aire-acondicionado',
            'attribute_id' => 2,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Climatizador',
            'slug'=> 'climatizador',
            'attribute_id' => 2,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Asientos de Cuero',
            'slug'=> 'asientos-de-cuero',
            'attribute_id' => 2,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Asiento conductor regulable en altura',
            'slug'=> 'asiento-conductor-regulable-en-altura',
            'attribute_id' => 2,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Asientos regulable en altura',
            'slug'=> 'asientos-regulable-en-altura',
            'attribute_id' => 2,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Sensor de lluvia',
            'slug'=> 'sensor-de-lluvia',
            'attribute_id' => 2,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        //////////

        ////seguridad 11-16
        App\Attribute::create([
            'name'=> 'Airbag',
            'slug'=> 'airbag',
            'attribute_id' => 1,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'ABS',
            'slug'=> 'abs',
            'attribute_id' => 1,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Control de tracción',
            'slug'=> 'control-de-traccion',
            'attribute_id' => 1,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Distribución inteligente de frenado',
            'slug'=> 'distribucion-inteligente-de-frenado',
            'attribute_id' => 1,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Airbag Pasajero',
            'slug'=> 'airbag-pasajero',
            'attribute_id' => 1,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Airbag de cortina',
            'slug'=> 'airbag-de-cortina',
            'attribute_id' => 1,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        /////////

        ////////combustible 17-20
        App\Attribute::create([
            'name'=> 'Nafta',
            'slug'=> 'nafta',
            'attribute_id' => 3,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Diesel',
            'slug'=> 'diesel',
            'attribute_id' => 3,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Eléctrico',
            'slug'=> 'electrico',
            'attribute_id' => 3,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Hibrido',
            'slug'=> 'hibrido',
            'attribute_id' => 3,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);


        ///////// Transmision 21-23
        App\Attribute::create([
            'name'=> 'Manual',
            'slug'=> 'manual',
            'attribute_id' => 4,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Automática',
            'slug'=> 'automatica',
            'attribute_id' => 4,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
        App\Attribute::create([
            'name'=> 'Secuencial',
            'slug'=> 'secuencial',
            'attribute_id' => 4,
            'multi_option'=> 0,
            'image_id'=> 1
        ]);
    }
}
