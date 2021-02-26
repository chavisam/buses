<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Parada;
use Livewire\Component;


class Rutas extends Component
{   
    public $parada_id,$car_id,$buses;

    protected $listeners = ['Add','Remove','cambiar'];
    
    public function cambiar($e){

       
    }
  
   
     public function render()
    {
        
        $paradas = Parada::orderBy('hora_ida','asc')->get();
        
        $cars = Car::all();
       
        

        return view('livewire.rutas',[
            'paradas' => $paradas,
           'cars' => $cars,
            
           
            
        ]);
    }

    public function Add($data,$ruta){
         
        // CarParada::create(['car_id' => $ruta, 
        //     'parada_id' => $data
        // ]);  
        
        $car = Car::findOrFail($ruta);

       
        $car->paradas()->syncWithoutDetaching($data);
        

        return redirect('/rutas');
    }

    public function Remove($parada,$ruta){
         
        $car = Car::findOrFail($ruta);
        $car->paradas()->detach($parada);
        return redirect('/rutas');

        // CarParada::where([['parada_id', '=', $parada],['car_id','=',$ruta]])
        // ->delete();
    }


}
