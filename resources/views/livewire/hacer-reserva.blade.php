<div>
@if($isOpen)

    <x-create-booking :stop="$stop" :ruta="$ruta" :hijos="$hijos"></x-create-booking>
    @endif 
<x-jet-button wire:click="openModal">RESERVAR PLAZAS</x-jet-button>





</div>