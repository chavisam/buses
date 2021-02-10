<?php

namespace App\Http\Livewire;
use App\Models\Parada;
use Livewire\Component;
use Livewire\WithPagination;

class ListaParadasComponent extends Component
{
    use WithPagination;

    public  $parada_id;
    public $name, $hora_ida, $hora_vuelta;
    public $isOpen = 0;
    public $selectedItem;
    public $search;
    protected $queryString = ['search'];
  

    public function render()
    {

        return view('livewire.lista-paradas-component', [
            'paradas' => Parada::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
       
        //  return view('livewire.lista-paradas-component',[
        //      'paradas' => Parada::paginate(10),
        //  ]);

        //$this->paradas = Parada::all();
        // return view('livewire.lista-paradas-component');
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




    public function store()
    {
        $this->validate([
            'name' => 'required|unique:paradas',
            'hora_ida' => 'required',
            'hora_vuelta' => 'required|after:hora_ida',
        ]);
   
        Parada::updateOrCreate(['id' => $this->parada_id], [
            'name' => $this->name,
            'hora_ida' => $this->hora_ida,
            'hora_vuelta' => $this->hora_vuelta
        ]);
  
        session()->flash('message', 
            $this->parada_id ? 'Parada actualizada correctamente.' : 'Nueva parada creada correctamente.');
  
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
