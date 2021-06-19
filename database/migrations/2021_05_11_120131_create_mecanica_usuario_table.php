<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicaUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mecanica_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mecanica');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_automovil');
            $table->timestamps();

            $table->foreign('id_mecanica')
                ->references('id')->on('mecanica')
                ->inDelete('set null');

            $table->foreign('id_usuario')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->foreign('id_automovil')
                ->references('id')->on('automovil')
                ->inDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mecanica_usuario');
    }
}
