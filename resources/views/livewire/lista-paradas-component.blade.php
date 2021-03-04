<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Paradas') }}
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
               <x-create-parada :id="$parada_id" ></x-create-parada>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Crear nueva Parada</button>


            <input wire:model="search" type="text" placeholder="Busca por nombre...">

            <table class="table-fixed w-full text-center">
                <thead class="text-center">
                    <tr class="bg-gray-100">
                    <th>Nº <button wire:click="sortable('id')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>
                    <th>NOMBRE <button wire:click="sortable('name')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>
                    <th>IDA <button wire:click="sortable('hora_ida')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>
                    <th>VUELTA <button wire:click="sortable('hora_vuelta')">
                        <span class="fa fa{{ $camp === 'id' ? $icon : '-arrow-circle-down' }}"></span>
                        
                    </button></th>
                    <th>ACCIONES</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($paradas as $parada)
                    <tr>

                        <td scope="row" class="border px-4 py-2">{{ $parada->id }}</td>
                        <td class="border px-4 py-2">{{ $parada->name }}</td>
                        <td class="border px-4 py-2"><?php echo date('H:i',strtotime($parada->hora_ida)) ?> h.</td>
                        <td class="border px-4 py-2"><?php echo date('H:i',strtotime($parada->hora_vuelta)) ?> h.</td>
                        <td>
                        <x-jet-button wire:click="edit({{ $parada->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Editar </x-jet-button>
                        
                        <x-jet-button wire:click="selectItem({{ $parada->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</x-jet-button>
                        </td>
                    </tr>


                                <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Parada</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quieres eliminar esta parada?
                                    <br>
                                    Se eliminará también de todas las rutas.
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

         {{ $paradas->links() }}
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