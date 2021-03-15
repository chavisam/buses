<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Reserva;
use App\Models\User;
use Livewire\Component;

class Listados extends Component
{
    // esto es route model binding de la docum de livewire
    public  Car $ruta;
    public $listados = [];

    protected $listeners = ['postAdded'];
  
   public function postAdded($fecha){
  
        $this->listados = Reserva::where(['fecha' => $fecha , 'car_id' => $this->ruta->id ])->get();
       
   }

    public function render()
    {

    
               return view('livewire.listados', [
                   'listados' => $this->listados
               ]);
    }
}
