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

            $table->integer('carroceria')->nullable();
            $table->integer('suspencion_d')->nullable();
            $table->integer('suspencion_t')->nullable();
            $table->integer('frenos_d')->nullable();
            $table->integer('frenos_t')->nullable();
            $table->integer('llantas_d')->nullable();
            $table->integer('llantas_t')->nullable();
            $table->integer('mangueras')->nullable();
            $table->integer('luces')->nullable();
            $table->integer('aceite')->nullable();
            $table->integer('afinacion_b')->nullable();
            $table->integer('afinacion_f')->nullable();
            $table->text('observaciones')->nullable();


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
