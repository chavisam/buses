<?php

namespace App\Http\Livewire;
use App\Models\Parada;
use Livewire\Component;
use Livewire\WithPagination;


class ListaParadasComponent extends Component
{
    use WithPagination;

    public $parada_id;
    public $name, $hora_ida, $hora_vuelta;
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
        $paradas = Parada::where('name', 'like', '%'.$this->search.'%');
        
        if($this->camp && $this->order)
        {
            $paradas = $paradas->orderBy($this->camp , $this->order);
        }

        $paradas = $paradas->paginate(10);


        return view('livewire.lista-paradas-component', [

            'paradas' => $paradas
        ]);
    }

 


    public function edit($id)
    {
        $parada = Parada::findOrFail($id);
        $this->parada_id = $id;
        $this->name = $parada->name;
        $this->hora_ida = $parada->hora_ida;
        $this->hora_vuelta = $parada->hora_vuelta;
    
        $this->openModal();
    }


    public function openModal(){
        $this->isOpen = true;
    }




    public function closeModal(){
        $this->isOpen = false;
    }




    public function store($id)
    {
        $this->validate([
            'name' => 'required|unique:paradas,name,'.$id ,
            'hora_ida' => 'required',
            'hora_vuelta' => 'required|after:hora_ida',
        ]);
   
        Parada::updateOrCreate(['id' => $this->parada_id], [
            'name' => $this->name,
            'hora_ida' => $this->hora_ida,
            'hora_vuelta' => $this->hora_vuelta
        ]);
  
        session()->flash('message', $this->parada_id ? 'Parada guardada correctamente.' : '');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->name = '';
        $this->hora_ida = '';
        $this->hora_vuelta = '';
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
            Parada::destroy($this->selectedItem);
            $this->closeDeleteModal();
            session()->flash('message', 'Parada eliminada correctamente.');
        
    }
}
