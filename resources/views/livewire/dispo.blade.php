<div class="container">
  <div class="row">
@foreach($cars as $car)             
                <div class="col-md-4">
                    <livewire:calendar :ruta="$car->id"></livewire:calendar>

                </div>
 @endforeach
         
  </div>   
</div>
