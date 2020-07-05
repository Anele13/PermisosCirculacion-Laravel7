<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superiors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->unsignedInteger('dni')->nullable();
            $table->unsignedInteger('legajo')->nullable();
            $table->string('email')->nullable();
            $table->string('sector')->nullable();
            $table->unsignedInteger('superior')->nullable();
            $table->foreign('superior')->references('id')->on('superiors');   
            $table->string('dependencia')->nullable();
            $table->string('espacio')->nullable();
            $table->boolean('autorizado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superiors');
        Schema::dropIfExists('permisos');
    }
}
