<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovil', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->unsignedBigInteger('id_marca');
            $table->string('submarca');
            $table->string('tipo');
            $table->string('subtipo');
            $table->string('año');
            $table->string('numero_serie');
            $table->string('color');
            $table->string('placas');
            $table->string('kilometraje');

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
        Schema::dropIfExists('automovil');
    }
}
