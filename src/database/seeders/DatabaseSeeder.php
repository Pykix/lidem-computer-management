<?php

namespace Database\Seeders;

use App\Models\Role;
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
                UserSeeder::class
            ]
        );
    }
}
