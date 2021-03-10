<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Parada;
use Livewire\Component;

class ListadoRutas extends Component
{
    public $cars, $paradas;
    public $isOpen = 0;
    public $ruta;
    public $car;

    
    public function openModal($car){
        $this->car = $car;
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function mount(){
        
        $this->cars = Car::all();
        $this->paradas = Parada::all();
    }



    public function render()
    {   
        return view('livewire.listado-rutas');
    }
}
