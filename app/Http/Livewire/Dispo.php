<?php

namespace App\Http\Livewire;

use App\Filament\Resources\CarResource;
use App\Models\Car;
use Livewire\Component;

class Dispo extends Component
{
   


   public $cars;



        public function render()
        {
                 $this->cars = Car::all();

                return view('livewire.dispo');
        }

    
}