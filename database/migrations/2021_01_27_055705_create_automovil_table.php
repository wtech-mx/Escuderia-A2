<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovil', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user');
            $table->string('marca');
            $table->string('tipo');
            $table->string('version');
            $table->integer('puertas');
            $table->string('numero_serie');
            $table->string('placas');
            $table->string('kilometraje');
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
        Schema::dropIfExists('automovil');
    }
}
