<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class HacerReserva extends Component
{
   
    public $isOpen = 0;
    public $stop;
    public $ruta;
    public $hijos;
    public $fecha1;
    public $fecha2;
    public $hijo1;
    public $hijo2;
    public $hijo3;
    public $hijo4;
    public $curso_h1;
    public $c;

    
    public function openModal(){
       
        $this->isOpen = true;
    }

    public function closeModal(){
       
        $this->isOpen = false;
    }

    public function mount($stop,$ruta){
        
        $this->stop = $stop;
        $this->ruta = $ruta;
        
        $this->hijos = User::OrderByRaw('hijo1')
                    ->get();

    }


    public function store(){

        $this->validate([
           'fecha1' => 'required|date',
           'fecha2' => 'after_or_equal:fecha1',
            'hijo1' => 'required' ,   
            ]);


            $nombre= explode (',' , $this->hijo1);
                            $hijo_name = $nombre[0];
                            $hijo_numero = $nombre[1];
                   

                            

                            if($hijo_numero==1){

                            $datos_hijo = User::where('hijo1', '=', $hijo_name)->get();
                            foreach($datos_hijo as $datos)
                                {
                                $c = $datos->curso_h1 ;
                             
                                }

                            }else if($hijo_numero==2){
                                
                               $datos_hijo = User::where('hijo2', '=', $hijo_name)->get();
                                 foreach($datos_hijo as $datos)
                                    {
                                    $c = $datos->curso_h2 ;
                                    
                                    }

                            }else if($hijo_numero==3){
                                $datos_hijo = User::where('hijo3', '=', $hijo_name)->get();
                                 foreach($datos_hijo as $datos)
                                    {
                                    $c = $datos->curso_h3 ;
                                    }
                            }else if($hijo_numero==4){ 
                                $datos_hijo = User::where('hijo4', '=', $hijo_name)->get();
                                foreach($datos_hijo as $datos)
                                   {
                                   $c = $datos->curso_h4 ;
                                   }  
                                   
                                
                            };


    if($this->fecha1 != $this->fecha2){
                        
                        // CALCULO DE LOS DÍAS LABORABLES ENTRE LAS DOS FECHAS 
                        $fecha1=strtotime($this->fecha1);
                        $fecha2=strtotime($this->fecha2);
                        $diasferiados = array();

                        // Incremento en 1 dia
                            $diainc = 24*60*60;
                
                
                        // Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
                        for ($midia = $fecha1; $midia <= $fecha2; $midia += $diainc) {


                                // Si el dia indicado, no es sabado o domingo es habil
                                if (!in_array(date('N', $midia), array(6,7))) { // DOC: http://www.php.net/manual/es/function.date.php
                                        // Si no es un dia feriado entonces es habil
                                        if (!in_array(date('Y-m-d', $midia), $diasferiados)) {


                                            Reserva::create([
                                                'fecha' => date("Y-m-d", $midia),
                                                'car_id' => $this->ruta,
                                                'parada_name' => $this->stop,
                                                'hijo_name' => strtoUpper($hijo_name),
                                                'curso' => $c
                                    
                                            ]);
                                        }
                                }
                            
                        }
       
                    } //fin del if fecha 2
            else{
                        $fecha1=strtotime($this->fecha1);
                        $fecha_inicial = $this->fecha1;
                        $ruta = $this->ruta;
                   

                     $ocupadas = Reserva::where(['fecha' => $fecha_inicial , 'car_id' => $ruta ])->count();
                     $plazas_totales = Car::find($this->ruta)->plazas;
                     $disponibles = $plazas_totales - $ocupadas;

                        if($disponibles > 0){

                            Reserva::updateOrCreate(['fecha' => date("Y-m-d", $fecha1) , 'hijo_name' => strtoUpper($hijo_name)], [
                                'fecha' => date("Y-m-d", $fecha1),
                                'car_id' => $this->ruta,
                                'parada_name' => $this->stop,
                                'hijo_name' => strtoUpper($hijo_name),
                                'curso' => $c
                            ]);
                           

                              session()->flash('status', 'PLAZAS RESERVADAS CORRECTAMENTE');

                                return redirect()->to('/listadorutas');
                        

                                }else{
                                    return back()->with('status' , 'NO HAY PLAZAS DISPONIBLES PARA ESE DÍA');
                                }
                        }




           
        $this-> resetFiles();
        $this->closeModal();
    }




    private function resetFiles(){

        $this->hijo1 = '';
        $this->fecha1 = '';
        $this->fecha2 = '';

    }

    
    public function render()
    {
        return view('livewire.hacer-reserva');
    }
}
