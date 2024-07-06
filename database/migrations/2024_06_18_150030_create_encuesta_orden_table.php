<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_encuesta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_cotizacion')
                ->references('id')->on('orden_servicio')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_taller')->nullable();
            $table->foreign('id_taller')
                ->references('id')->on('talleres')
                ->inDelete('set null');

            $table->text('pregunta_1')->nullable();
            $table->text('pregunta_2')->nullable();
            $table->text('pregunta_3')->nullable();
            $table->text('pregunta_4')->nullable();
            $table->text('pregunta_5')->nullable();
            $table->text('pregunta_6')->nullable();
            $table->text('pregunta_7')->nullable();
            $table->text('pregunta_8')->nullable();
            $table->text('pregunta_9')->nullable();
            $table->text('pregunta_10')->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('encuesta_orden');
    }
}
