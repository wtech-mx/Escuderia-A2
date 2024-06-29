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
        Schema::create('orden_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->unsignedBigInteger('current_auto')->nullable();
            $table->foreign('current_auto')
                ->references('id')->on('automovil')
                ->inDelete('set null');

            $table->text('total')->nullable();
            $table->text('km_actual')->nullable();
            $table->text('km_taller')->nullable();
            $table->text('km_entrega')->nullable();
            $table->text('ubicacion')->nullable();
            $table->text('estatus')->nullable();
            $table->text('cotizacion_taller')->nullable();

            $table->text('titulo_img')->nullable();
            $table->text('img')->nullable();

            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_asignacion_taller')->nullable();
            $table->dateTime('fecha_ingreso_taller')->nullable();
            $table->dateTime('fecha_cotizacion')->nullable();
            $table->dateTime('fecha_autorizada')->nullable();
            $table->dateTime('fecha_reparado')->nullable();
            $table->dateTime('fecha_entregado')->nullable();
            $table->dateTime('fecha_factura')->nullable();
            $table->dateTime('fecha_pagado')->nullable();

            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->foreign('id_empresa')
                ->references('id')->on('users')
                ->inDelete('set null');
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
