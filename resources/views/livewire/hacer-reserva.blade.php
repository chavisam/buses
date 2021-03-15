

<div class="container">
   <div class="row">

   <div class="col-md-6 flex items-center justify-center  px-4 pb-40 text-left sm:block sm:p-0">


    <form>    
        
        
        
        
        
        <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4">
                 <div class="mb-4">
                     <label for="stop" class="block text-gray-700 text-sm font-bold mb-2">PARADAS:</label>
                     <select wire:model="stop" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stop" >
                     <option value="" selected>---</option>
                 @foreach($paradas as $parada)

                         <option value="{{$parada->id}}">{{$parada->name}}</option>
                             
                 @endforeach  
                     </select>
                     @error('stop') <span class="text-red-500">{{ $message }}</span>@enderror</div>
         </div>


                   <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4">
                             <div class="mb-4">
                                 <label for="ruta" class="block text-gray-700 text-sm font-bold mb-2">RUTA:</label>
                                 <select wire:model="ruta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ruta" >
                                 <option value="" disabled>---</option>
                                 @if($stop != 9999)
                                    @forelse ($parada_id->cars as $car) 
     
                                     <option value="{{ $car->pivot->car_id }}" >{{ $car->pivot->car_id }}</option>
                                       
                                    @empty
                                 
                                       <option value="" disabled>PARADA NO INCORPORADA A NINGUNA RUTA POR AHORA</option>
                                   

                                    @endforelse
                                 
                                    
                                @endif
                                     </select>
                                     @error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
                                 </div>
                                
                     </div>                      
     
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
     
             
     
                   
           
           <?php



                      $hoy = date('Y-m-d');
           ?>
     
     
                         <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4" >
                             <label for="fecha1" class="block text-gray-700 text-sm font-bold mb-2">DESDE:
                                  ( <small>Si solo marca una fecha en éste campo, se hará la reserva para este día solamente)</small></label>
                            
                             <input type="date" min="<?php echo $hoy ?>" class="form-control datepicker" id="fecha1" wire:model="fecha1">
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
     
     
     
                         <span class="mt-3 mx-2 flex w-full rounded-md shadow-sm sm:ml-0 sm:w-auto" id="r" >
                             <button wire:click.prevent="store()"  type="button"  class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                             RESERVAR  
                             </button>
                         </span>
     
                     </div>
                 </form>
    </div>     

            
   </div>       
</div>

