<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-100 mx-auto sm:px-3 lg:px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2 py-4">
            @if (session()->has('message'))
                <div id="messages" class="bg-green-300 border-t-4 border-green-500 rounded-b text-teal-900 px-2 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>

                <script>
                    // OCULTAR LOS MENSAJES PASADOS UN SEG Y MEDIO
                $(document).ready(function() {
                    setTimeout(function() {
                        $("#messages").fadeOut(1500);
                    },3000);
                });
                </script>
               
            @endif

            @if($isOpen)
                 <x-modify-user :paradas="$paradas" :id="$user_id"></x-modify-user>
            @endif

            @if($isOpenCreate)
                 <x-create-user :paradas="$paradas"></x-create-user>
            @endif


            <button wire:click="isOpenCreate()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded my-3">Crear nuevo Usuario</button>


            <input wire:model="search" type="text" placeholder="Busca por nombre...">

            <table class="table-fixed w-full text-center content-center">
                <thead class="text-center">
                    <tr class="bg-gray-100">
                    <th>NOMBRE <button wire:click="sortable('id')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>    
                    </button> <br>EMAIL
                    </th>

                    <th>TELÉFONOS </th>

                    <th>HIJOS</th>

                    <th>PARADA <button wire:click="sortable('parada_casa')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>

                    <th>ESTADO <button wire:click="sortable('activo')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>

                    <th>ACCIONES</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)


                    <tr>

                        <td scope="row" class="border px-1 py-2 text-left"><p class="overflow-clip text-xl font-bold">{{ $usuario->name }}</p>
                    <p class="truncate hover:overflow-clip  ">{{ $usuario->email}}</p></td>
                        <td class="border px-2 py-2">{{ $usuario->telefono1}} <br> {{ $usuario->telefono2 }}</td>

                        <td class="border px-2 py-2">{{ $usuario->hijo1}} - {{ $usuario->curso_h1 }}
                            <br>{{ $usuario->hijo2}} - {{ $usuario->curso_h2 }}
                            <br>{{ $usuario->hijo3}} - {{ $usuario->curso_h3 }}
                            <br>{{ $usuario->hijo4}} - {{ $usuario->curso_h4 }}
                        </td>
                        
                        <td class="border px-2 py-2">{{ $usuario->parada_casa}}</td>
                        <td class="border px-2 py-2">
                            @if($usuario->activo == true)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-white-800">    
                                ACTIVO
                                </span>
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-white-800">    
                                INACTIVO
                            </span>
                            @endif
                        </td>
                        <td>
                        <x-jet-button wire:click="edit({{ $usuario->id }})" class="bg-blue-500 w-40 hover:bg-blue-700"> Editar </x-jet-button>
                        <br>
                        <x-jet-button wire:click="selectItem({{ $usuario->id }})" class="bg-red-500 w-40 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">Eliminar</x-jet-button>
                        </td>
                    </tr>


                                <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quieres eliminar este usuario?
                                    <br>
                                    Se eliminarán también todas las plazas reservadas.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click="closeDeleteModal" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    
                                    <button type="button" wire:click="delete" class="btn btn-danger">ELIMINAR</button>
                                </div>
                                </div>
                            </div>
                            </div>
                    @endforeach
                </tbody>
               
            </table>

         {{ $usuarios->links() }}
        </div>
    </div>
</div>

<script>
window.addEventListener('openModal', event => {
  $("#exampleModal").modal('show');
  
})

window.addEventListener('closeModal', event => {
  $("#exampleModal").modal('hide');
  
})




</script>