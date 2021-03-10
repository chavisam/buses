<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Reserva;
use Livewire\Component;

class Calendar extends Component
{
    public $ruta;
    public $ocupadas;
    public $plazas_totales;
    public $hoy;
    public $fin_curso;
    public $diasferiados = array();
    public $diashabiles = array();
    public $ocupacion = array();
    // Incremento en 1 dia
    public $diainc = 24*60*60;



    public function mount($ruta){
        $this->ruta = $ruta;
        $this->hoy = strtotime(date('Y-m-d'));
        $this->fin_curso = strtotime('2021-06-19') ;

        // Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
        for ($midia = $this->hoy; $midia <= $this->fin_curso; $midia += $this->diainc) {
            // Si el dia indicado, no es sabado o domingo es habil
            if (!in_array(date('N', $midia), array(6,7))) { // DOC: http://www.php.net/manual/es/function.date.php
                    // Si no es un dia feriado entonces es habil
                    if (!in_array(date('Y-m-d', $midia), $this->diasferiados)) {
                            array_push($this->diashabiles, date('Y-m-d', $midia));

                            $this->ocupadas = Reserva::where(['fecha' => date('Y-m-d', $midia) , 'car_id' => $ruta ])->count();

                            array_push($this->ocupacion, $this->ocupadas);

                    }
            }
    }
  
     $this->plazas_totales = Car::find($this->ruta)->plazas;
    }


    public function render()
    {
        
        return view('livewire.calendar');
    }
}
