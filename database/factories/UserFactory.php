<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     public function padre(){
         return $this->state([
             'rol' => "PADRE",
             'curso_h1' => "4ºPRIM-C",
             'curso_h2' => "5ºPRIM-C",
             'curso_h3' => "6ºPRIM-C",
             'curso_h4' => "1ºPRIM-C",
             'telefono1' => '000000000',
             'telefono2' => '000000000'
         ]);
        
     }


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'hijo1' => $this->faker->name,
            'hijo2' => $this->faker->name,
            'hijo3' => $this->faker->name,
            'hijo4' => $this->faker->name,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
