<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_diagnostico', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cotizacion_servicio');
            $table->foreign('id_cotizacion_servicio')
                ->references('id')->on('cotizacion_servicio')
                ->inDelete('set null');

            $table->integer('liquido_f')->nullable();
            $table->integer('anticongelante')->nullable();
            $table->integer('aceite_d')->nullable();
            $table->integer('aceite_t')->nullable();
            $table->integer('limpia_p')->nullable();
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
        Schema::dropIfExists('cotizacion_diagnostico');
    }
}
