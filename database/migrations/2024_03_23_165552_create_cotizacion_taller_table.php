<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_cotizacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->unsignedBigInteger('current_auto')->nullable();
            $table->foreign('current_auto')
                ->references('id')->on('automovil')
                ->inDelete('set null');

            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();
            $table->text('foto3')->nullable();
            $table->text('foto4')->nullable();
            $table->text('importe_sin')->nullable();
            $table->text('importe_con')->nullable();
            $table->text('comentarios')->nullable();
            $table->text('estatus');
            $table->date('fecha_creacion');

            $table->date('fecha_atorizacion')->nullable();
            $table->date('fecha_reparacion')->nullable();
            $table->date('fecha_entregar')->nullable();
            $table->date('fecha_factura')->nullable();
            $table->date('fecha_pagado')->nullable();
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
        Schema::dropIfExists('cotizacion_taller');
    }
}
