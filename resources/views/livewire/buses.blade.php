<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de autobuses') }}
        </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div id="messages" class="bg-green-300 border-t-4 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
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
               <x-create-cars></x-create-cars>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Crear nuevo Autocar</button>


            <table class="table-fixed w-full text-center">
                <thead class="text-center">
                    <tr class="bg-gray-100">
                    <th>Nº BUS <button wire:click="sortable('number')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>
                    <th>Nº PLAZAS <button wire:click="sortable('plazas')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>

                    <th>ACCIONES</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>

                        <td scope="row" class="border px-4 py-2">{{ $car->id }}</td>
                        <td class="border px-4 py-2">{{ $car->plazas }}</td>

                        <td>
                        <x-jet-button wire:click="edit({{ $car->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Editar </x-jet-button>
                        
                        <x-jet-button wire:click="selectItem({{ $car->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</x-jet-button>
                        </td>
                    </tr>


                                <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Autocar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quieres eliminar este Autocar?
                                    <br>
                                    Se eliminarán también todas las rutas y reservas de plaza del mismo.
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

         {{ $cars->links() }}
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