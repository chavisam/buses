


<div class="flex items-start justify-center  px-4 pb-40 text-center " >
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
     
        @if(session('status'))
  <div id="messages" class="bg-red-300 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('status') }}</p>
                    </div>
                  </div>
                </div>
  @endif
       
            <form>
              
            <div class="bg-white px-4 pt-3 ">
                        <div class="mb-4">
                            <label for="ruta" class="block text-gray-700 text-sm font-bold mb-2">RUTA Nº: {{$ruta}}</label>
                            <input type="hidden" value="{{$ruta}}" wire:model="ruta">
                      </div>
                </div>


                <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="stop" class="block text-gray-700 text-sm font-bold mb-2">PARADA:</label>
                            <input type="text" placeholder="{{$stop}}" value="{{$stop}}" id="stop"  wire:model="stop" disabled class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                </div>


 
 
    <div id='calendar'></div>


          

                <!-- <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="plazas" class="block text-gray-700 text-sm font-bold mb-2">Nº PLAZAS:</label>
                            <select onchange="ver($('#plazas').val())" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="plazas" >
                            <option value="" selected>---</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                            </select>
                        </div>
                </div> -->

                <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" id="hijo1">
                        <div class="mb-4">
                            <label for="al1" class="block text-gray-700 text-sm font-bold mb-2">ALUMNO 1:</label>
                            <select wire:model="hijo1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="al1" >
                            <option value="" selected>---</option>
                        @foreach($hijos as $hijo)
                                    @if($hijo->hijo1!=null)
                                <option value="{{$hijo->hijo1}},1">{{$hijo->hijo1}} -- {{$hijo->curso_h1}}</option>
                                    @endif
                                    @if($hijo->hijo2!=null)
                                <option value="{{$hijo->hijo2}},2">{{$hijo->hijo2}} -- {{$hijo->curso_h2}}</option>
                                @endif
                                    @if($hijo->hijo3!=null)
                                <option value="{{$hijo->hijo3}},3">{{$hijo->hijo3}} -- {{$hijo->curso_h3}}</option>
                                @endif
                                    @if($hijo->hijo4!=null)
                                <option value="{{$hijo->hijo4}},4">{{$hijo->hijo4}} -- {{$hijo->curso_h4}}</option>
                                @endif
                        @endforeach  
                            </select>
                            @error('hijo1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                </div>

        

                <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" id="hijo2" style="display: none;">
                        <div class="mb-4">
                            <label for="al2" class="block text-gray-700 text-sm font-bold mb-2">ALUMNO 2:</label>
                            <select wire:model="hijo2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="al2" >
                            <option value="" selected>---</option>
                            @foreach($hijos as $hijo)
                                    @if($hijo->hijo1!=null)
                                <option value="{{$hijo->hijo1}}">{{$hijo->hijo1}} -- {{$hijo->curso_h1}}</option>
                                    @endif
                                    @if($hijo->hijo2!=null)
                                <option value="{{$hijo->hijo2}}">{{$hijo->hijo2}} -- {{$hijo->curso_h2}}</option>
                                @endif
                                    @if($hijo->hijo3!=null)
                                <option value="{{$hijo->hijo3}}">{{$hijo->hijo3}} -- {{$hijo->curso_h3}}</option>
                                @endif
                                    @if($hijo->hijo4!=null)
                                <option value="{{$hijo->hijo4}}">{{$hijo->hijo4}} -- {{$hijo->curso_h4}}</option>
                                @endif
                        @endforeach  
                            </select>
                        </div>
                </div>

                <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" id="hijo3" style="display: none;">
                        <div class="mb-4">
                            <label for="al3" class="block text-gray-700 text-sm font-bold mb-2">ALUMNO 3:</label>
                            <select wire:model="hijo3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="al3" >
                            <option value="" selected>---</option>
                            @foreach($hijos as $hijo)
                                    @if($hijo->hijo1!=null)
                                <option value="{{$hijo->hijo1}}">{{$hijo->hijo1}} -- {{$hijo->curso_h1}}</option>
                                    @endif
                                    @if($hijo->hijo2!=null)
                                <option value="{{$hijo->hijo2}}">{{$hijo->hijo2}} -- {{$hijo->curso_h2}}</option>
                                @endif
                                    @if($hijo->hijo3!=null)
                                <option value="{{$hijo->hijo3}}">{{$hijo->hijo3}} -- {{$hijo->curso_h3}}</option>
                                @endif
                                    @if($hijo->hijo4!=null)
                                <option value="{{$hijo->hijo4}}">{{$hijo->hijo4}} -- {{$hijo->curso_h4}}</option>
                                @endif
                        @endforeach  
                            </select>
                        </div>
                </div>


                <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" id="hijo4" style="display: none;">
                        <div class="mb-4">
                            <label for="al4" class="block text-gray-700 text-sm font-bold mb-2">ALUMNO 4:</label>
                            <select wire:model="hijo4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="al4" >
                            <option value="" selected>---</option>
                            @foreach($hijos as $hijo)
                                    @if($hijo->hijo1!=null)
                                <option value="{{$hijo->hijo1}}">{{$hijo->hijo1}} -- {{$hijo->curso_h1}}</option>
                                    @endif
                                    @if($hijo->hijo2!=null)
                                <option value="{{$hijo->hijo2}}">{{$hijo->hijo2}} -- {{$hijo->curso_h2}}</option>
                                @endif
                                    @if($hijo->hijo3!=null)
                                <option value="{{$hijo->hijo3}}">{{$hijo->hijo3}} -- {{$hijo->curso_h3}}</option>
                                @endif
                                    @if($hijo->hijo4!=null)
                                <option value="{{$hijo->hijo4}}">{{$hijo->hijo4}} -- {{$hijo->curso_h4}}</option>
                                @endif
                        @endforeach  
                            </select>
                        </div>
                </div>

      


                    <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" >
                        <label for="fecha1" class="block text-gray-700 text-sm font-bold mb-2">DESDE:
                             ( <small>Si solo marca una fecha en éste campo, se hará la reserva para este día solamente)</small></label>
                       
                        <input type="date"  class="form-control datepicker" id="fecha1" wire:model="fecha1">
                        @error('fecha1') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>


                    <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" >
                        <label for="fecha2" class="block text-gray-700 text-sm font-bold mb-2" id="fecha2">HASTA:
                            ( <small>Si marca el mismo día que en el campo anterior, solo se reservará plaza para ese día. Si no, se hará la reserva para todos los días LABORABLES en ese rango de fechas)</small>
                        </label>
                        <input type="date"  class="form-control "  wire:model="fecha2">
                        @error('fecha2') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>





                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <div class="d-flex justify-content-center" >
                <div class="spinner-border" role="status" wire:loading>
                <span class="sr-only">Danos unos segundos...</span>
                </div>
                </div>
                    <span class="mt-3 mx-2 flex w-full rounded-md shadow-sm sm:ml-0 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        GUARDAR  
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            CANCELAR
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
