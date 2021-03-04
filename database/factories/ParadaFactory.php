<?php

namespace Database\Factories;

use App\Models\Parada;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParadaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parada::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'hora_ida' => $this->faker->dateTimeThisMonth()->format('H:i:s'),
            'hora_vuelta' => $this->faker->dateTimeThisMonth()->format('H:i:s')
        ];
    }
}
