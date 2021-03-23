<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->foreign('id_empresa')
                ->references('id')->on('empresa')
                ->inDelete('set null');


            $table->string('image')->nullable();
            $table->string('title');
            $table->text('descripcion');
            $table->string('color');
            $table->integer('estatus');
            $table->integer('check')->nullable();
            $table->date('start');
            $table->date('end');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alertas');
    }
}
