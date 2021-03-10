<div>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Rutas') }}
        </h2>
    
    </x-slot>

    <script>
                function toast(){
                  $('.toast').toast('show');
                }
                </script>  

    <div aria-live="polite" aria-atomic="true" style="position: relative;z-index:999">
  <div class="toast" data-delay="2000" style="position: absolute; top: 10; right: 20px;">
    <div class="toast-header bg-success">
   
      <strong class="mr-auto text-white">Buses App</strong>
      <small></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="toast-body">
      Descargando Excel...
      </div>
    </div>
  </div>


   

<div class="container py-2 text-center">
                <p>
                @foreach($cars as $car)
                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapse{{$car->id}}" role="button" aria-expanded="false" aria-controls="multiCollapse{{$car->id}}">
                RUTA Nº: {{$car->id}}
                </a>
                @endforeach
                </p>

    @foreach($cars as $car)
          <div class="row py-2 collapse" id="multiCollapse{{$car->id}}">
                <div class="col-md-12 col-offset-3">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 table text-center">
                                        <thead class="bg-gray-50 text-center">
                                            <tr>
                                            <th scope="col" class=" pl-8 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          <h1 class="text-primary py-3">RUTA:{{$car->id}} </h1> Parada 
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Hora de ida
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Hora de vuelta  
                                            </th>
                                            <th><button onclick="toast()" class="btn-success btn hover:bg-green-300">Descargar Excel</button></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($car->paradas as $parada)
                                            <tr>
                                            <td class="px-10 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                    {{$parada->name}}
                                                    </div>
                                   

                                                </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"><?php echo date('H:i',strtotime($parada->hora_ida)) ?> h.</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900"><?php echo date('H:i',strtotime($parada->hora_vuelta)) ?> h.</div>
                                            </td>
                        <td></td>
                                          
                                            </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                    
                                    </div>
                                    
                                    </div>
                                  
                                </div>
                            </div>
                </div>
          </div>
  



    @endforeach


 </div>   
 <!-- <div class="col-md-6 col-sm-12" >
                      <h1>Disponibilidad de la ruta {{$car->id}}</h1>
                      <livewire:calendar :ruta="$car->id"></livewire:calendar>
        </div>  -->
        
</div>