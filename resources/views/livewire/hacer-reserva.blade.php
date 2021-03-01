<div>
@if($isOpen)
    <x-create-booking :stop="$stop" :ruta="$ruta" :hijos="$hijos"></x-create-booking>
    @endif 
<x-jet-button wire:click="openModal">RESERVAR PLAZAS</x-jet-button>

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
</div>