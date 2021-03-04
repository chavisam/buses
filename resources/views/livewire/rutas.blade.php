       
   <script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,ruta) {
  ev.preventDefault();

  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));

  var cross=document.getElementById('p'+data);
  cross.style.display ="inline";

  delay();

   Livewire.emit('Add', data,ruta);

}

function Remove(parada,ruta){

  //   var cross=document.getElementById(parada+ruta);
  // cross.style.display ="none";

    Livewire.emit('Remove',parada,ruta);
}

function delay(){
  var spinner=document.getElementById('spinner');
  spinner.style.display='inline';
}

</script>



  <div class="container">
    <div class="row">
    <div class="col-md-4">
            <table class="table">
            <th>PARADAS ACTUALES
            <p class="small text-danger">Arrastre las paradas a las rutas deseadas <br>en el orden de horarios deseado</p>
            </th>
            
            <div class="d-flex justify-content-center" >
            
  <div class="spinner-border" role="status" id="spinner" style="display:none;">
    <span class="sr-only">Loading...</span>
  </div>
</div>
            @foreach($paradas as $parada)
                <tr>
                <td>
            <p draggable="true" class="px-2 " ondragstart="drag(event)" id="{{ $parada->id}}">
            {{$parada->name}}
             <span><?php echo date('H:i',strtotime($parada->hora_ida)) ?> h.</span>
             <button id="p{{ $parada->id}}"  onclick="Remove(<?php echo $parada->id ?>,$('#ruta').val())" style="display: none;" class="badge badge-danger"><i  class="fas fa-times"></i></button>
             </p>


                </td>
                </tr>

            @endforeach

            </table>
    </div>

  
<div class="col-md-8 text-left">


<table class="table">
  <thead>
    <tr>
      <th>BUS</th>
      <th>PARADA -- IDA -- VUELTA</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cars as $car)
    <tr>
      <td scope="row"> {{$car->id}}</td>
      <td ondrop="drop(event,<?php echo $car->id ?>)" ondragover="allowDrop(event) ">
        <ul>
        @foreach($car->paradas as $parada)
          <li draggable="true" id="{{$parada->id}}{{$car->id}}">
          <button id="p{{ $parada->id}}"  wire:click="remove"  onclick="Remove(<?php echo $parada->id ?>,<?php echo $car->id ?>),delay()"  class="badge badge-danger"><i  class="fas fa-times"></i></button>

          {{$parada->name}} -- <span><?php echo date('H:i',strtotime($parada->hora_ida)) ?> h.</span>
          -- <span><?php echo date('H:i',strtotime($parada->hora_vuelta)) ?> h.</span>
          </li>
        @endforeach
        </ul>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
 
    </div>
</div>



