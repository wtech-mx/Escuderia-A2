<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller_orden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_cotizacion')
                ->references('id')->on('taller_cotizacion')
                ->inDelete('set null');

            $table->text('nombre_taller')->nullable();
            $table->text('encargado')->nullable();
            $table->text('telefono')->nullable();
            $table->text('correo')->nullable();
            $table->text('direccion')->nullable();
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
        Schema::dropIfExists('taller_orden');
    }
}
