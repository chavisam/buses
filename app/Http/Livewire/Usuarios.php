<?php

namespace App\Http\Livewire;

use App\Models\Parada;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;




class Usuarios extends Component
{use WithPagination;

    public $user_id;
    public $name, $email, $rol, $telefono1, $telefono2, $hijo1, $curso_h1,$password, $hijo2, $curso_h2;
    public $hijo3, $curso_h3, $hijo4, $curso_h4, $parada_casa, $activo;
    public $isOpen = 0;
    public $isOpenCreate = 0;
    public $selectedItem;


    //esto para la busqueda
    public $search;
    protected $queryString = ['search'];

    //esto para ordenar por columnas
    public $camp = 'id';
    public $order = 'desc';
    public $icon = '-arrow-circle-down';
 
    public $paradas;

    

    public function store($id)
    {
        $this->validate([
            'name' => 'required|unique:users,name,' .$id,
            //el email debe ser único excepto el de el usuario que se está editando
            'email' => 'required|email|unique:users,email,'.$id,
            'telefono1' => 'required|digits:9|',
            'activo' => 'required',
            'hijo1' => 'required|different:hijo2|different:hijo3|different:hijo4|unique:users,hijo1,' .$id ,
            'curso_h1' => 'required',
            ]);

            if($this->telefono2!="0"){
                $this->validate([
                    'telefono2' => 'numeric|digits:9',
                ]);
         
            }else{$this->telefono2="000000000";}

            if($this->hijo2!= ""){
        $this->validate([
           
            'hijo2' => 'different:hijo1|different:hijo3|different:hijo4|unique:users,hijo2,' .$id ,
            'curso_h2' => 'required',
  
            ]);
        }

        if($this->hijo3!= ""){
            $this->validate([
               
                
                'curso_h3' => 'required',
                'hijo3' => 'different:hijo2|different:hijo1|different:hijo4|unique:users,hijo3,' .$id ,
                
                ]);
            }

            if($this->hijo4!= ""){
                $this->validate([
                    'curso_h4' => 'required',
                    'hijo4' => 'different:hijo2|different:hijo3|different:hijo1|unique:users,hijo4,' .$id ,   
                    ]);
                }
           
          

       
   
         User::find($id)->update([
            'name' => $this->name,
            'email' => $this->email,

            'rol' => $this->rol,
            'hijo1' => strtoUpper($this->hijo1),
            'hijo2' => strtoUpper($this->hijo2),
            'hijo3' => strtoUpper($this->hijo3),
            'hijo4' => strtoUpper($this->hijo4),
            'curso_h1' => $this->curso_h1,
            'curso_h2' => $this->curso_h2,
            'curso_h3' => $this->curso_h3,
            'curso_h4' => $this->curso_h4,
            'parada_casa' => $this->parada_casa,
            'activo' => $this->activo,
            'telefono1' => $this->telefono1,
            'telefono2' => $this->telefono2,
         ]);

     //   session()->flash('message', 
         //   $this->user_id ? 'Usuario actualizado correctamente.' : 'Nuevo usuario creado correctamente.');
  
        $this->closeModal();
       $this->resetInputFields();
    }

    public function mount()
    {
        $this->paradas = Parada::all();
       
     
    }
    
   

  
    public function sortable ($camp){
      switch ($this->order){
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
        
        $usuarios = User::where('name', 'like', '%'.$this->search.'%');
        
        if($this->camp && $this->order)
        {
            $usuarios = $usuarios->orderBy($this->camp , $this->order);
        }

        $usuarios = $usuarios->paginate(5);


        return view('livewire.usuarios', [
           
            'usuarios' => $usuarios
        ]);
    }

 


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->rol = $user->rol;
        $this->telefono1 = $user->telefono1;
        $this->telefono2 = $user->telefono2;
        $this->hijo1 = $user->hijo1;
        $this->hijo2 = $user->hijo2;
        $this->hijo3 = $user->hijo3;
        $this->hijo4 = $user->hijo4;
        $this->curso_h1 = $user->curso_h1;
        $this->curso_h2 = $user->curso_h2;
        $this->curso_h3 = $user->curso_h3;
        $this->curso_h4 = $user->curso_h4;
        $this->parada_casa = $user->parada_casa;
        $this->activo = $user->activo;

    
        $this->openModal();
    }


    public function openModal(){
        $this->isOpen = true;
    }

    public function isOpenCreate(){
        $this->isOpenCreate = true;
    }

    public function closeModalCreate(){
        $this->isOpenCreate = false;
    }




    public function closeModal(){
        $this->isOpen = false;
    }




    private function resetInputFields(){
        $this->name = '';
        $this->telefono1 = '';
        $this->telefono2 = '';
        $this->hijo1 = '';
        $this->hijo2 = '';
        $this->hijo3 = '';
        $this->hijo4 = '';
        $this->curso_h1 = '';
        $this->curso_h2 = '';
        $this->curso_h3 = '';
        $this->curso_h4 = '';
        $this->parada_casa = '';
        $this->activo = '';
    }

        public function create()
    {

        $this->validate([
            'name' => 'required|unique:users,name',
            //el email debe ser único excepto el de el usuario que se está editando
            'email' => 'required|email|unique:users,email',
            'telefono1' => 'required|digits:9|',
            'activo' => 'required',
            'hijo1' => 'required|different:hijo2|different:hijo3|different:hijo4|unique:users,hijo1' ,
            'curso_h1' => 'required',
    
            ]);

            if($this->telefono2!="0"){
                $this->validate([
                    'telefono2' => 'numeric|digits:9',
                ]);
         
            }else{$this->telefono2="000000000";}

            if($this->hijo2!=""){
        $this->validate([
           
            'hijo2' => 'different:hijo1|different:hijo3|different:hijo4|unique:users,hijo2',
            'curso_h2' => 'required',
  
            ]);
        }

        if($this->hijo3!=""){
            $this->validate([
               
                
                'curso_h3' => 'required',
                'hijo3' => 'different:hijo2|different:hijo1|different:hijo4|unique:users,hijo3' ,
                
                ]);
            }

            if($this->hijo4!=""){
                $this->validate([
                    'curso_h4' => 'required',
                    'hijo4' => 'different:hijo2|different:hijo3|different:hijo1|unique:users,hijo4' ,  
                    ]);
                }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'rol' => $this->rol,
            'hijo1' => strtoUpper($this->hijo1),
            'hijo2' => strtoUpper($this->hijo2),
            'hijo3' => strtoUpper($this->hijo3),
            'hijo4' => strtoUpper($this->hijo4),
            'curso_h1' => $this->curso_h1,
            'curso_h2' => $this->curso_h2,
            'curso_h3' => $this->curso_h3,
            'curso_h4' => $this->curso_h4,
            'parada_casa' => $this->parada_casa,
            'activo' => $this->activo,
            'telefono1' => $this->telefono1,
            'telefono2' => $this->telefono2,
         ]);
        
        $this->closeModalCreate();
        $this->resetInputFields();
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
            User::destroy($this->selectedItem);
            $this->closeDeleteModal();
            session()->flash('message', 'Usuario eliminado correctamente.');
        
    }
}

