<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Computer;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Component::factory()->times(20)->create();

        $components = Component::all();
        Computer::all()->each(function ($computer) use ($components) {
            $computer->components()->attach(
                $components->random(rand(4, 4))->pluck('id')->toArray()
            );
        });
    }
}
