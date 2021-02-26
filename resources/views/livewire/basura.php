<div class="container">
    <div class="row">
    <div class="col-md-4 h-40 bg-warning">
            <table class="table-responsive">
            <th>PARADAS</th>

            @foreach($paradas as $parada)
                <tr>
                <td>
            <p draggable="true" class="px-2 py-2 rounded" ondragstart="drag(event)" id="{{ $parada->name}}">{{$parada->name}} <span><?php echo date('H:i',strtotime($parada->hora_ida)) ?> h.</span></p>
                </td>
                </tr>

            @endforeach

            </table>
    </div>

    <div class="col-md-4 bg-success">
    <table class="table-stripped w-100">
            <th>Ruta número: <select name="" id="">
    @foreach($cars as $car)
                <option value="{{$car->id}}">{{$car->id}}</option>
        @endforeach
             </select>
             </th>
        <tr>
      <td id="div1" ondrop="drop(event)" ondragover="allowDrop(event) " class="bg-light w-100" style="height:300px"></td>
        
       </tr>

        </table>
    </div>
    </div>
</div>