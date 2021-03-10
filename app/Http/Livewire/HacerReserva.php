<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Parada;
use App\Models\Reserva;
use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Break_;

class HacerReserva extends Component
{
   
    public $isOpen = 0;
    public $stop=9999;
    public $ruta= 1;
    public $hijos;
    public $fecha1;
    public $fecha2;
    public $hijo1;
    public $hijo2;
    public $hijo3;
    public $hijo4;
    public $curso_h1;
    public $c;
    public $paradas;
    public $cars;
    public $parada_id;
 

    
    public function openModal(){
       
        $this->isOpen = true;
    }

    public function closeModal(){
       
        $this->isOpen = false;
    }



    public function mount(){
    
        $this->hijos = User::OrderByRaw('hijo1')->get();
        $this->cars = Car::all();
        $this->paradas = Parada::OrderByRaw('hora_ida')->get();   
}

public function render()

{

    if($this->stop != 9999){
        $this->parada_id = Parada::find($this->stop);

}


    return view('livewire.hacer-reserva', [
        'stop' => $this->stop,
    ]);
}




    public function store(){

        $this->validate([
            'ruta' => 'required',
           'fecha1' => 'required|date',
           'fecha2' => 'after_or_equal:fecha1',
            'hijo1' => 'required' ,   
            ]);


            $parada_name = Parada::where('id' ,$this->stop)->get();
            foreach($parada_name as $name){
                $n = $name->name;
            }


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


            if($this->fecha1 != $this->fecha2)
            {
                        
                        // CALCULO DE LOS DÍAS LABORABLES ENTRE LAS DOS FECHAS 
                        $fecha1=strtotime($this->fecha1);
                        $fecha2=strtotime($this->fecha2);
                        $diasferiados = array();
                        $nombre= explode (',' , $this->hijo1);
                        $hijo_name = $nombre[0];
                        $hijo_numero = $nombre[1];

                        // Incremento en 1 dia
                            $diainc = 24*60*60;
                
                
                            for ($midia = $fecha1; $midia <= $fecha2; $midia += $diainc) 
                            {
                                //mira si el alumno ya tiene reservada alguna de estas fechas
                                $alumno_reservado = Reserva::where(['fecha' => date("Y-m-d", $midia) , 'car_id' => $this->ruta ,'hijo_name' => $hijo_name])->count();
                                
                                if($alumno_reservado == 0)
                                {
                                    //               
                                }else{
                                   
                                    session()->flash('error' ,  'El alumno '. $hijo_name . ', ya tiene plaza para el día '. date("d-M", $midia) . ' en la ruta '. $this->ruta);
                                    return redirect()->to('/book');
                                }
                            }  // FIN DEL FOR PARA VER SI SE ESTÁ DUPLICANDO
                       




                        // Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
                        for ($midia = $fecha1; $midia <= $fecha2; $midia += $diainc) 
                        {
                                //mira si ese día está disponible
                                $ocupadas = Reserva::where(['fecha' => date("Y-m-d", $midia) , 'car_id' => $this->ruta ])->count();
                                $plazas_totales = Car::find($this->ruta)->plazas;
                                $disponibles = $plazas_totales - $ocupadas;
                     
           
                                   if($disponibles > 0)
                                   { 
                                              //
                                           
                                   }else
                                   {
                                    session()->flash('error' , 'NO HAY PLAZAS DISPONIBLES PARA el día ' . date("d-M", $midia));
                                    return redirect('/book');
                                   } // FIN DEL ELSE SI ESTÁ DISPONIBLE  
                                
                         } // fin del for si disponible   

                     
                                  
                         for ($midia = $fecha1; $midia <= $fecha2; $midia += $diainc) 
                         { 
                                // Si el dia indicado, no es sabado o domingo es habil
                                if (!in_array(date('N', $midia), array(6,7))) 
                                { // DOC: http://www.php.net/manual/es/function.date.php
                                        // Si no es un dia feriado entonces es habil
                                        if (!in_array(date('Y-m-d', $midia), $diasferiados)) 
                                        {


                                            Reserva::create([
                                                'fecha' => date("Y-m-d", $midia),
                                                'car_id' => $this->ruta,
                                                'parada_name' => $n,
                                                'hijo_name' => strtoUpper($hijo_name),
                                                'curso' => $c
                                                ]);

                                            
                                               

                                        } // FIN DEL IF IN ARRAY  PARA VER SI ES LECTIVO
                                                                            

                                            
                                        
                                }  //  FIN DEL IF IN ARRAY PARA VER SI ES FIN DE SEMANA
            
                        }  // fin del for para reservar
                                   
                        session()->flash('status', 'PLAZAS RESERVADAS CORRECTAMENTE');
                        return redirect('/book');
                              
                                 
       
            } //fin del if fecha 2

















            else{
                        $fecha1=strtotime($this->fecha1);
                        $fecha_inicial = $this->fecha1;
                        $nombre= explode (',' , $this->hijo1);
                            $hijo_name = $nombre[0];
                            $hijo_numero = $nombre[1];
          
         

                     $ocupadas = Reserva::where(['fecha' => $fecha_inicial , 'car_id' => $this->ruta ])->count();
                     $plazas_totales = Car::find($this->ruta)->plazas;
                     $disponibles = $plazas_totales - $ocupadas;
                     $alumno_ya_reservado = Reserva::where(['fecha' => $fecha_inicial , 'car_id' => $this->ruta ,'hijo_name' => $hijo_name])->count();

                 
                     if($alumno_ya_reservado!=0){
                        session()->flash('error' ,  'El alumno '. $hijo_name . ', ya tiene plaza para el día '. $fecha_inicial . ' en la ruta '. $this->ruta);

                        return redirect()->to('/book');
                     }

                     
                        if($disponibles > 0){



                            Reserva::updateOrCreate(['fecha' => date("Y-m-d", $fecha1) , 'hijo_name' => strtoUpper($hijo_name)], [
                                'fecha' => date("Y-m-d", $fecha1),
                                'car_id' => $this->ruta,
                                'parada_name' => $n,
                                'hijo_name' => strtoUpper($hijo_name),
                                'curso' => $c
                            ]);
                           

                              session()->flash('status', 'PLAZAS RESERVADAS CORRECTAMENTE');

                                return redirect()->to('/book');
                        

                                }else{
                                    return back()->with('status' , 'NO HAY PLAZAS DISPONIBLES PARA EL DÍA ' . date("d-M", $fecha1));
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

    

}
