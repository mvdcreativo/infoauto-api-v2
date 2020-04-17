<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 20;
        factory(User::class, $count)->create();

        $name = 'Emir Mendez';
        User::create([
            'name' => $name,
            'slug' => str_slug($name),
            'email' => 'superemir82@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('dan23608'), // password
            'neighborhood_id'=> 46,
            'state_id' => 10,
            'city_id' => 1,
            'remember_token' => Str::random(10)
        ]);
        $name2 = 'Daniel Admin';
        User::create([
            'name' => $name2,
            'slug' => str_slug($name2),
            'email' => 'danielmenedez82@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('dan23608'), // password
            'role' => 'USER',
            'neighborhood_id'=> 46,
            'state_id' => 10,
            'city_id' => 1,
            'remember_token' => Str::random(10)
        ]);

        $name3 = 'Super Admin';
        User::create([
            'name' => $name3,
            'slug' => str_slug($name3),
            'email' => 'mvdcreativo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('superAdminInfoauto'), // password
            'role' => 'SADM',
            'neighborhood_id'=> 46,
            'state_id' => 10,
            'city_id' => 1,
            'remember_token' => Str::random(10)
        ]);

    }
}
