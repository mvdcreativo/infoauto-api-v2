<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            statuses_table_seeder::class,
            ImageSeeder::class,
            VehicleCategorySeeder::class,
            BrandSeeder::class,
            CurrencySeeder::class,
            VehicleModelsSeeder::class,
            // VehicleSubModelsSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            NeighborhoodsTableSeeder::class,
            UsersSeeder::class,
            AttributesTableSeeder::class,
            ExtrasTableSeeder::class,
            AnoTableSeeder::class,
            PriceConditionTableSeeder::class,
            ConditionTableSeeder::class,
            TariffsTableSeeder::class,
            ProductsTableSeeder::class,
            ]);

    }
}
