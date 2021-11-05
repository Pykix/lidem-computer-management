<?php

namespace Database\Factories;

use App\Models\Computer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComputerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Computer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number' => $this->faker->bothify('######-????'),
            'slug' => Str::slug($this->faker->name()),
            'comment' => $this->faker->text(200),
            'is_avaible' => $this->faker->boolean(),
            'brand_id' => $this->faker->numberBetween(1, 5),
            'picture' => $this->faker->url()
        ];
    }
}
