<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('rol',60);
            $table->integer('telefono1')->default('000000000');
            $table->integer('telefono2');
            $table->string('hijo1')->unique()->nullable();
            $table->string('curso_h1')->default('---');
            $table->string('hijo2')->defaul('---');
            $table->string('curso_h2')->default('---');
            $table->string('hijo3')->nullable();
            $table->string('curso_h3')->default('---');
            $table->string('hijo4')->nullable();
            $table->string('curso_h4')->default('---');
            $table->string('parada_casa')->nullable();
            $table->boolean('activo')->default(1);
           

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
