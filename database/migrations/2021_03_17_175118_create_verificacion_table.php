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

            $table->unsignedBigInteger('id_user')->nullable();

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_empresa')->nullable();

            $table->foreign('id_empresa')
                ->references('id')->on('empresa')
                ->inDelete('set null');

            $table->unsignedBigInteger('current_auto')->nullable();

            $table->foreign('current_auto')
                ->references('id')->on('automovil')
                ->inDelete('set null');

            $table->date('primer_semestre')->nullable();

            $table->string('title')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->integer('estatus')->nullable();
            $table->integer('check')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('image')->nullable();

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
