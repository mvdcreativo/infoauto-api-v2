<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10000;
        
        $product = factory(Product::class, $count)
            ->create()
            ->each(function(Product $product){
                $product->extras()->sync([
                    rand(1,3),
                    rand(4,5),
                    rand(6,7)
                ]);

                $product->attributes()->sync([
                    //confort
                    rand(5,7),
                    rand(5,6),
                    rand(7,10),
                    rand(8,9),
                    /////seguridad
                    rand(11,16),
                    rand(13,16),
                    rand(11,14),
                    rand(12,15),
                    /////combustible
                    rand(17,20),
                    ///transmision
                    rand(21,23),


                ]);
                for ($i=0; $i < 10; $i++) { 
                    $product->images()->save(factory(App\Image::class)->make());
                }
            });

        
    }
}
