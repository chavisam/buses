<div>
<link href={{asset('css/main.css')}} rel='stylesheet' />
<script src={{asset('js/main.js')}}></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar<?php echo $ruta ?>');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'es',
          firstDay: 1,
          header: {
          left:   'prev,next',
          center: 'title',
          right:  'basicDay'
        },

        events:[ 
  
          <?php   $i=0;
          foreach($diashabiles as $dia){ 
                $disponibles =  $plazas_totales - $ocupacion[$i];
                if($disponibles == 0)
                {
                  ?>
                          {
                             
                              backgroundColor:"red",
                              textColor:"white",
                              title: "<?php echo $disponibles ?>",
                              start: "<?php echo $dia ?>",
                              editable: false
                          },  

                         
               <?php }else{ ?>

                          {
                             
                              backgroundColor:"green",
                              textColor:"white",
                              title: "<?php echo $disponibles ?>",
                              start: "<?php echo $dia ?>",
                              editable: false
                          },  

                          <?php   } 
                          $i++;
               } // endforeach  ?>

          ],



        });
        calendar.render();
      });

    </script>

<h1>Disponibilidad de la ruta: {{$ruta}}</h1>

    <div class="container">
      <div id='calendar{{$ruta}}'></div>
      
    </div>
</div>
