<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Car;
use App\Models\Parada;

class CrearReserva extends Page
{
    public static $icon = 'heroicon-o-document-text';

    public $cars, $paradas;
    public $isOpen = 0;

    
    public function openModal(){
       
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function mount(){
        $this->cars = Car::all();
        $this->paradas = Parada::all();
    }

    public static $view = 'livewire.listado-rutas';

   
}
