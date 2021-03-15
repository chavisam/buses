<div>
    
    <div class="container-fluid">
   <h1 class="text-white-800 text-xl-center text-2xl font-bold bg-gray-300 py-4">    Listados de la ruta {{$ruta->id}}

                     <div class="d-flex justify-content-center" >
                     <div class="spinner-border" role="status" wire:loading></div>
                             </div>
                

   </h1>
    </div>
    

    <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    themeSystem: 'bootstrap',
    showNonCurrentDates: false,
    weekends:false,
    dateClick: function(fecha) {
     Livewire.emit('postAdded',fecha.dateStr)
    },
    selectable: true,
    locale:'es',
          firstDay: 1,
          header: {
          left:   'prev,next',
          center: 'title',
          right:  'basicDay'
        },


        
  });

  
  calendar.render();
});





</script>

<div class="container">

<button class="btn btn-secondary px-3 py-3">VER LISTADO DE OTRO DÍA</button>


    <div class="row">
        <div class="col-md-6">
     
            <div id='calendar'></div>
        </div>

@if($listados)
        <div class="col-md-6">
        <div class="row text-right">
          <button class="btn btn-success px-3 py-3 ">Descargar Excel</button>
        </div>
       <table class="table">
  <thead>
    <tr>
      <th>Plaza</th>
      <th>Nombre del alumno</th>
      <th>Curso</th>
      <th>Teléfonos</th>
    </tr>
    
  </thead>
  <tbody>
    @if(count($listados) > 0)
    <?php $i=1; ?>
          @foreach($listados as $listado)
            
                <tr>
                <td>{{ $i++ }}</td>
                  <td scope="row">{{$listado->hijo_name}}</td>
                  <td>{{$listado->curso}}</td>
                  <td>{{$listado->telefono1}} <br>{{$listado->telefono2}}</td>
                </tr>  
          @endforeach
    @elseif(count($listados) == 0)
    <tr>
    <td colspan="3" style="color:red"><p>NO HAY PLAZAS RESERVADAS PARA ESTE DÍA</p></td></tr>
    @endif
    </tbody>
  </table>
        </div>

@endif

    </div>
</div>

</div>
