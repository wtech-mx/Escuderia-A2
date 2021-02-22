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
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->string('servicio')->nullable();
            $table->string('current_auto')->nullable();
            $table->integer('llantas_delanteras');
            $table->integer('llantas_traseras');
            $table->unsignedBigInteger('id_marca');
            $table->string('descripcion', 500);
            $table->string('garantia');
            $table->string('vida_llantas');
            $table->string('km_actual');
            $table->string('video_interior',900);
            $table->string('video_exterior', 900);

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->foreign('id_empresa')
                ->references('id')->on('empresa')
                ->inDelete('set null');

            $table->foreign('id_marca')
                ->references('id')->on('marca')
                ->inDelete('RESTRICT');

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
