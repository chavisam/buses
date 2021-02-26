<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;

class ListadoRutas extends Component
{
    public $cars;

    public function mount(){
        $this->cars = Car::all();
    }

    public function render()
    {
              
        return view('livewire.listado-rutas');
    }
}
