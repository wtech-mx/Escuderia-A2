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

            $table->string('descripcion', 500);
            $table->string('vida_llantas');
            $table->string('km_actual');
            $table->string('km_estimado');
            $table->string('video',900)->nullable();
            $table->string('video2', 900)->nullable();

            /* Llantas */
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('current_auto2')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->string('current_auto')->nullable();

            /* Banda */
            $table->unsignedBigInteger('id_userfr')->nullable();
            $table->string('current_autofr')->nullable();
            $table->unsignedBigInteger('id_empresafr')->nullable();
            $table->string('current_autofr2')->nullable();

            /* Frenos */
            $table->unsignedBigInteger('id_userbn')->nullable();
            $table->string('current_autobn')->nullable();
            $table->unsignedBigInteger('id_empresabn')->nullable();
            $table->string('current_autobn2')->nullable();

            /* aceite */
            $table->unsignedBigInteger('id_userac')->nullable();
            $table->string('current_autoac2')->nullable();
            $table->unsignedBigInteger('id_empresaac')->nullable();
            $table->string('current_autoac')->nullable();

            /* afinacion */
            $table->unsignedBigInteger('id_useraf')->nullable();
            $table->string('current_autoaf2')->nullable();
            $table->unsignedBigInteger('id_empresaaf')->nullable();
            $table->string('current_autoaf')->nullable();

            /* amortiguadores */
            $table->unsignedBigInteger('id_useram')->nullable();
            $table->string('current_autoam2')->nullable();
            $table->unsignedBigInteger('id_empresaam')->nullable();
            $table->string('current_autoam')->nullable();

            /* Bateria */
            $table->unsignedBigInteger('id_userbt')->nullable();
            $table->string('current_autobt')->nullable();
            $table->unsignedBigInteger('id_empresabt')->nullable();
            $table->string('current_autobt2')->nullable();

            /* Relacion DB Users */
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->foreign('id_userbn')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->foreign('id_userfr')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->foreign('id_userac')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->foreign('id_useraf')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->foreign('id_useram')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->foreign('id_userbt')
                ->references('id')->on('users')
                ->inDelete('set null');

            /* Relacion DB Empresas */
            $table->foreign('id_empresa')
                ->references('id')->on('empresa')
                ->inDelete('set null');
            $table->foreign('id_empresabn')
                ->references('id')->on('empresa')
                ->inDelete('set null');
            $table->foreign('id_empresafr')
                ->references('id')->on('empresa')
                ->inDelete('set null');
            $table->foreign('id_empresaac')
                ->references('id')->on('empresa')
                ->inDelete('set null');
            $table->foreign('id_empresaaf')
                ->references('id')->on('empresa')
                ->inDelete('set null');
            $table->foreign('id_empresaam')
                ->references('id')->on('empresa')
                ->inDelete('set null');
            $table->foreign('id_empresabt')
                ->references('id')->on('empresa')
                ->inDelete('set null');

            $table->foreign('id_marca')
                ->references('id')->on('marca_product')
                ->inDelete('RESTRICT');

            /*Calendario*/
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('color');
            $table->integer('estatus');
            $table->integer('check')->nullable();
            $table->date('start');
            $table->date('end');

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
