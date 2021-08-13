<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_servicio', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cotizacion')->nullable();
            $table->foreign('id_cotizacion')
                ->references('id')->on('cotizacion')
                ->inDelete('set null');

            $table->string('servicio')->nullable();
            $table->string('pieza')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('mano_o')->nullable();
            

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
        Schema::dropIfExists('cotizacion_servicio');
    }
}
