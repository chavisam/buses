<div class="flex items-start justify-center  px-4 pb-40 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
              
                <div class="bg-white px-4 pt-1 pb-4 sm:p-6 sm:pb-4">
                    <div class="">

                
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                             id="exampleFormControlInput1"  wire:model="name">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
                            <input type="text"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                             id="exampleFormControlInput2"  wire:model="email">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        
                        <div class="mb-4">
                            <label for="exampleFormControlInput3" class="block text-gray-700 text-sm font-bold mb-2">Tipo de cuenta:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput3"  wire:model="rol">
                            <option value=null>---</option> 
                                <option value="PADRE">PADRE</option>
                                <option value="MONITOR RUTA">MONITOR RUTA</option>
                                <option value="PROFESOR">PROFESOR</option>
                                <option value="ADMIN">ADMIN</option>
                            </select>
                            @error('rol') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefono1" class="block text-gray-700 text-sm font-bold mb-2">Teléfono 1:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                             id="telefono1"  wire:model="telefono1">
                            @error('telefono1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput5" class="block text-gray-700 text-sm font-bold mb-2">Teléfono 2:</label>
                            <input type="number"   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                             id="exampleFormControlInput5"  wire:model="telefono2">
                            @error('telefono2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput6" class="block text-gray-700 text-sm font-bold mb-2">Apellidos y Nombre del primer hijo:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput6"  wire:model="hijo1">
                            @error('hijo1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput10" class="block text-gray-700 text-sm font-bold mb-2">Curso del primer hijo:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput10"  wire:model="curso_h1">
                                <option value=""  selected>---</option>   
                                <option value="1ºINF-A">1ºINF-A</option>
                                <option value="1ºINF-B">1ºINF-B</option>
                                <option value="1ºINF-C">1ºINF-C</option>
                                <option value="2ºINF-A">2ºINF-A</option>
                                <option value="2ºINF-B">2ºINF-B</option>
                                <option value="2ºINF-C">2ºINF-C</option>
                                <option value="3ºINF-A">3ºINF-A</option>
                                <option value="3ºINF-B">3ºINF-B</option>
                                <option value="3ºINF-C">3ºINF-C</option>

                                <option value="1ºPRI-A">1ºPRI-A</option>
                                <option value="1ºPRI-B">1ºPRI-B</option>
                                <option value="1ºPRI-C">1ºPRI-C</option>

                                <option value="2ºPRI-A">2ºPRI-A</option>
                                <option value="2ºPRI-B">2ºPRI-B</option>
                                <option value="2ºPRI-C">2ºPRI-C</option>

                                <option value="3ºPRI-A">3ºPRI-A</option>
                                <option value="3ºPRI-B">3ºPRI-B</option>
                                <option value="3ºPRI-C">3ºPRI-C</option>

                                <option value="4ºPRI-A">4ºPRI-A</option>
                                <option value="4ºPRI-B">4ºPRI-B</option>
                                <option value="4ºPRI-C">4ºPRI-C</option>

                                <option value="5ºPRI-A">5ºPRI-A</option>
                                <option value="5ºPRI-B">5ºPRI-B</option>
                                <option value="5ºPRI-C">5ºPRI-C</option>

                                <option value="6ºPRI-A">6ºPRI-A</option>
                                <option value="6ºPRI-B">6ºPRI-B</option>
                                <option value="6ºPRI-C">6ºPRI-C</option>
                            </select>

                            @error('curso_h1') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>


                        <div class="mb-4">
                            <label for="exampleFormControlInput7" class="block text-gray-700 text-sm font-bold mb-2">Apellidos y Nombre del Segundo hijo:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput7"  wire:model="hijo2">
                            @error('hijo2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput11" class="block text-gray-700 text-sm font-bold mb-2">Curso del Segundo hijo:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                             id="exampleFormControlInput11"  wire:model="curso_h2">
                            <option value="---" selected>---</option> 
                                <option value="1ºINF-A">1ºINF-A</option>
                                <option value="1ºINF-B">1ºINF-B</option>
                                <option value="1ºINF-C">1ºINF-C</option>
                                <option value="2ºINF-A">2ºINF-A</option>
                                <option value="2ºINF-B">2ºINF-B</option>
                                <option value="2ºINF-C">2ºINF-C</option>
                                <option value="3ºINF-A">3ºINF-A</option>
                                <option value="3ºINF-B">3ºINF-B</option>
                                <option value="3ºINF-C">3ºINF-C</option>

                                <option value="1ºPRI-A">1ºPRI-A</option>
                                <option value="1ºPRI-B">1ºPRI-B</option>
                                <option value="1ºPRI-C">1ºPRI-C</option>

                                <option value="2ºPRI-A">2ºPRI-A</option>
                                <option value="2ºPRI-B">2ºPRI-B</option>
                                <option value="2ºPRI-C">2ºPRI-C</option>

                                <option value="3ºPRI-A">3ºPRI-A</option>
                                <option value="3ºPRI-B">3ºPRI-B</option>
                                <option value="3ºPRI-C">3ºPRI-C</option>

                                <option value="4ºPRI-A">4ºPRI-A</option>
                                <option value="4ºPRI-B">4ºPRI-B</option>
                                <option value="4ºPRI-C">4ºPRI-C</option>

                                <option value="5ºPRI-A">5ºPRI-A</option>
                                <option value="5ºPRI-B">5ºPRI-B</option>
                                <option value="5ºPRI-C">5ºPRI-C</option>

                                <option value="6ºPRI-A">6ºPRI-A</option>
                                <option value="6ºPRI-B">6ºPRI-B</option>
                                <option value="6ºPRI-C">6ºPRI-C</option>
                            </select>
                            @error('curso_h2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput8" class="block text-gray-700 text-sm font-bold mb-2">Apellidos y Nombre del tercer hijo:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                             id="exampleFormControlInput8"  wire:model="hijo3">
                            @error('hijo3') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput12" class="block text-gray-700 text-sm font-bold mb-2">Curso del tercer hijo:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput12"  wire:model="curso_h3">
                            <option value="---" selected>---</option> 
                                <option value="1ºINF-A">1ºINF-A</option>
                                <option value="1ºINF-B">1ºINF-B</option>
                                <option value="1ºINF-C">1ºINF-C</option>
                                <option value="2ºINF-A">2ºINF-A</option>
                                <option value="2ºINF-B">2ºINF-B</option>
                                <option value="2ºINF-C">2ºINF-C</option>
                                <option value="3ºINF-A">3ºINF-A</option>
                                <option value="3ºINF-B">3ºINF-B</option>
                                <option value="3ºINF-C">3ºINF-C</option>

                                <option value="1ºPRI-A">1ºPRI-A</option>
                                <option value="1ºPRI-B">1ºPRI-B</option>
                                <option value="1ºPRI-C">1ºPRI-C</option>

                                <option value="2ºPRI-A">2ºPRI-A</option>
                                <option value="2ºPRI-B">2ºPRI-B</option>
                                <option value="2ºPRI-C">2ºPRI-C</option>

                                <option value="3ºPRI-A">3ºPRI-A</option>
                                <option value="3ºPRI-B">3ºPRI-B</option>
                                <option value="3ºPRI-C">3ºPRI-C</option>

                                <option value="4ºPRI-A">4ºPRI-A</option>
                                <option value="4ºPRI-B">4ºPRI-B</option>
                                <option value="4ºPRI-C">4ºPRI-C</option>

                                <option value="5ºPRI-A">5ºPRI-A</option>
                                <option value="5ºPRI-B">5ºPRI-B</option>
                                <option value="5ºPRI-C">5ºPRI-C</option>

                                <option value="6ºPRI-A">6ºPRI-A</option>
                                <option value="6ºPRI-B">6ºPRI-B</option>
                                <option value="6ºPRI-C">6ºPRI-C</option>
                            </select>
                            @error('curso_h3') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="exampleFormControlInput9" class="block text-gray-700 text-sm font-bold mb-2">Apellidos y Nombre del cuarto hijo:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput9"  wire:model="hijo4">
                            @error('hijo4') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput13" class="block text-gray-700 text-sm font-bold mb-2">Curso del cuarto hijo:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput13"  wire:model="curso_h4">
                            <option value="" selected>---</option> 
                                <option value="1ºINF-A">1ºINF-A</option>
                                <option value="1ºINF-B">1ºINF-B</option>
                                <option value="1ºINF-C">1ºINF-C</option>
                                <option value="2ºINF-A">2ºINF-A</option>
                                <option value="2ºINF-B">2ºINF-B</option>
                                <option value="2ºINF-C">2ºINF-C</option>
                                <option value="3ºINF-A">3ºINF-A</option>
                                <option value="3ºINF-B">3ºINF-B</option>
                                <option value="3ºINF-C">3ºINF-C</option>

                                <option value="1ºPRI-A">1ºPRI-A</option>
                                <option value="1ºPRI-B">1ºPRI-B</option>
                                <option value="1ºPRI-C">1ºPRI-C</option>

                                <option value="2ºPRI-A">2ºPRI-A</option>
                                <option value="2ºPRI-B">2ºPRI-B</option>
                                <option value="2ºPRI-C">2ºPRI-C</option>

                                <option value="3ºPRI-A">3ºPRI-A</option>
                                <option value="3ºPRI-B">3ºPRI-B</option>
                                <option value="3ºPRI-C">3ºPRI-C</option>

                                <option value="4ºPRI-A">4ºPRI-A</option>
                                <option value="4ºPRI-B">4ºPRI-B</option>
                                <option value="4ºPRI-C">4ºPRI-C</option>

                                <option value="5ºPRI-A">5ºPRI-A</option>
                                <option value="5ºPRI-B">5ºPRI-B</option>
                                <option value="5ºPRI-C">5ºPRI-C</option>

                                <option value="6ºPRI-A">6ºPRI-A</option>
                                <option value="6ºPRI-B">6ºPRI-B</option>
                                <option value="6ºPRI-C">6ºPRI-C</option>
                            </select>
                            @error('curso_h4') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                
                        <div class="mb-4">
                            <label for="exampleFormControlInput14" class="block text-gray-700 text-sm font-bold mb-2">Parada de casa:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput14"  wire:model="parada_casa">
                            <option value=""  selected>---</option> 
                            @foreach($paradas as $parada)
                                 <option value="{{$parada->name}}">{{$parada->name}}</option>
                            @endforeach


                            </select>
                            @error('parada_casa') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>


                      

                        <div class="mb-4">
                            <label for="exampleFormControlInput15" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="exampleFormControlInput15"  wire:model="activo">
                                <option value="" disabled>---</option> 
                                <option value="1" selected>ACTIVO</option>
                                <option value="0">INACTIVO</option>
                            </select>
                            @error('activo') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        


                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                   
                        <button wire:click.prevent="store({{$id}})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        GUARDAR
                        </button>
                      
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancelar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>