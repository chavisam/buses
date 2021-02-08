<?php

namespace Database\Seeders;

use App\Models\Ruta;
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
         \App\Models\User::factory(10)->padre()->create();
         
        
         \App\Models\Parada::factory(10)->create();

         \App\Models\Car::factory(10)->create([
              'plazas' => '30',
           
         ]);



    }

}
