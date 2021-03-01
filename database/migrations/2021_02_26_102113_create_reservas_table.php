<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('hijo_name');
            $table->string('parada_name');
            $table->UnsignedBiginteger('car_id');
            $table->string('curso');
            $table->softDeletes();
            $table->timestamps();

             // Este es el que hace la relación de la llave foranea con la tabla cars
             $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

              // Este es el que hace la relación de la llave foranea con la tabla paradas
              $table->foreign('parada_name')->references('name')->on('paradas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
