<?php

namespace Database\Seeders;


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
        $this->call(
            [
                BrandSeeder::class,
                ComputerSeeder::class,
                RoleSeeder::class,
                UserSeeder::class,
                ComponentSeeder::class
            ]
        );
    }
}
