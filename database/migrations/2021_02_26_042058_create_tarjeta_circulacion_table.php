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
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->integer('current_auto')->unsigned()->index()->nullable();

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->foreign('id_empresa')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->integer('id_tc')->unsigned()->index()->nullable();

            $table->string('nombre')->nullable();
            $table->string('tipo_placa')->nullable();
            $table->string('lugar_expedicion')->nullable();
            $table->date('fecha_emision' )->nullable();

            $table->date('start')->nullable();
            $table->date('end')->nullable();

            $table->integer('num_placa' )->nullable();
            $table->string('img')->nullable();
            $table->integer('estatus');
            $table->integer('check')->nullable();

            $table->string('title')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('device_token')->nullable();

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
