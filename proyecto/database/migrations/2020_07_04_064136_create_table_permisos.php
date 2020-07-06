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

        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->timestamps();
        });

        Schema::create('dependencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->timestamps();
        });

        Schema::create('espacios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->timestamps();
        });

        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->unsignedInteger('dni')->nullable();
            $table->unsignedInteger('legajo')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('sector')->nullable();
            $table->foreign('sector')->references('id')->on('sectors');
            $table->unsignedInteger('superior')->nullable();
            $table->foreign('superior')->references('id')->on('superiors');   
            $table->unsignedInteger('dependencia')->nullable();
            $table->foreign('dependencia')->references('id')->on('dependencias');
            $table->unsignedInteger('espacio')->nullable();
            $table->foreign('espacio')->references('id')->on('espacios');
            $table->boolean('habilitado')->nullable();
            $table->timestamps();
            $table->string('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
        Schema::dropIfExists('superiors');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('dependencias');
        Schema::dropIfExists('espacios');
        
    }
}
