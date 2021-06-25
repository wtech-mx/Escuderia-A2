<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguros', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->string('current_auto')->nullable();
            $table->string('seguro')->nullable();
             $table->date('fecha_expedicion')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('tipo_cobertura')->nullable();
            $table->string('costo')->nullable();
            $table->string('costo_anual')->nullable();
            $table->integer('estatus');
            $table->integer('estado_last_week');
            $table->integer('estado_tomorrow');
            $table->integer('check')->nullable();

            $table->string('title')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->string('device_token')->nullable();

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->foreign('id_empresa')
                ->references('id')->on('users')
                ->inDelete('set null');

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
        Schema::dropIfExists('seguros');
    }
}
