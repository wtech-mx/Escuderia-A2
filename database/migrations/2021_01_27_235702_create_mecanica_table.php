<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mecanica', function (Blueprint $table) {
            $table->id();
            $table->string('servicio')->nullable();
            $table->integer('llantas_delanteras')->nullable();
            $table->integer('llantas_traseras')->nullable();
            $table->integer('amortig_delanteras')->nullable();
            $table->integer('amortig_traseras')->nullable();
            $table->integer('frenos_delanteras')->nullable();
            $table->integer('frenos_traseras')->nullable();
            $table->integer('precio')->nullable();

            $table->string('descripcion', 500);
            $table->string('vida_llantas');
            $table->string('km_actual');
            $table->string('km_estimado');
            $table->string('video',900)->nullable();
            $table->string('video2', 900)->nullable();
            $table->date('fecha_servicio');

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
        Schema::dropIfExists('mecanica');
    }
}
