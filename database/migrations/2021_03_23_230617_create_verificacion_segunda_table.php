<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificacionSegundaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificacion_segunda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_verificacion')->nullable();

            $table->foreign('id_verificacion')
                ->references('id')->on('verificacion')
                ->inDelete('set null');

            $table->date('segundo_semestre')->nullable();

            $table->string('title')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->integer('estatus')->nullable();
            $table->integer('check')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();

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
        Schema::dropIfExists('verificacion_segunda');
    }
}
