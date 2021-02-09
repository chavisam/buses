<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Paradas activas') }}
        </h2>
    </x-slot>
       
       <x-lista-paradas-component></x-lista-paradas-component>

</x-app-layout>