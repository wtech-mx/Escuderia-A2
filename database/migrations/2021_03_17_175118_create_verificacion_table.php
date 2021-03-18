<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificacion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_tc')->nullable();

            $table->foreign('id_tc')
                ->references('id')->on('tarjeta_circulacion')
                ->inDelete('set null');

            $table->string('title');
            $table->text('descripcion')->nullable();
            $table->string('color');
            $table->integer('estatus');
            $table->date('start')->nullable();
            $table->date('end')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verificacion');
    }
}
