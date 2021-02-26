<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetaCirculacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_circulacion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
             $table->integer('current_auto')->unsigned()->index()->nullable();
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');


            $table->string('nombre')->nullable();
            $table->string('tipo_placa')->nullable();
            $table->string('lugar_expedicion')->nullable();
            $table->string('fecha_emision' )->nullable();
            $table->string('fecha_vencimiento' )->nullable();
            $table->integer('num_placa' )->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('tarjeta_circulacion');
    }
}
