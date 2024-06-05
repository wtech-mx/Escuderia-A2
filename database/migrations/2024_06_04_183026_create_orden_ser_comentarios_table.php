<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenSerComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_ser_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_cotizacion')
                ->references('id')->on('orden_servicio')
                ->inDelete('set null');

            $table->text('estatus')->nullable();
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('orden_ser_comentarios');
    }
}
