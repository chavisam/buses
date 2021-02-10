<?php

namespace App\Http\Livewire;
use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class Buses extends Component
{
    use WithPagination;

    public $car_id;
    public $plazas;
    public $isOpen = 0;
    public $selectedItem;
    public $search;
    protected $queryString = ['search'];
    public $camp = 'id';
    public $order = 'desc';
    public $icon = '-arrow-circle-down';
   

  
    public function sortable ($camp){
      switch ($this->order){
        //   case null:
        //     $this->order = 'asc';
        //     $this->icon = '-arrow-circle-up';
        //     break;
        case 'asc':
            $this->order = 'desc';
            $this->icon = '-arrow-circle-down';
            break;
        case 'desc':
            $this->order = 'asc';
            $this->icon = '-arrow-circle-up';
            break;
      }
      $this->camp = $camp;
    }

    public function render()
    {
        $cars = Car::where('plazas', 'like', '%'.$this->search.'%');
        
        if($this->camp && $this->order)
        {
            $cars = $cars->orderBy($this->camp , $this->order);
        }

        $cars = $cars->paginate(10);


        return view('livewire.buses', [

            'cars' => $cars
        ]);
    }

 


    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $this->car_id = $id;
        $this->plazas = $car->plazas;
     
        $this->openModal();
    }


    public function openModal(){
        $this->isOpen = true;
    }




    public function closeModal(){
        $this->isOpen = false;
    }




    public function store()
    {
        $this->validate([

            'plazas' => 'required',

        ]);
   
        car::updateOrCreate(['id' => $this->car_id], [
            'plazas' => $this->plazas,

        ]);
  
        session()->flash('message', 
            $this->car_id ? 'Autocar actualizado correctamente.' : 'Nuevo autocar creado correctamente.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->plazas = '';
   
    }

        public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }



    

    public function selectItem($itemId){
        $this->selectedItem = $itemId;
        $this->dispatchBrowserEvent('openModal');

    }

    public function closeDeleteModal(){
    
        $this->dispatchBrowserEvent('closeModal');

    }

    public function delete()
    {      
            Car::destroy($this->selectedItem);
            $this->closeDeleteModal();
            session()->flash('message', 'Autocar eliminado correctamente.');
        
    }
}
