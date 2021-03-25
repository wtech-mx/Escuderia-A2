<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('llantas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_mecanica')->nullable();

            $table->foreign('id_mecanica')
                ->references('id')->on('mecanica')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_user')->nullable();

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->string('title')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->integer('estatus')->nullable();
            $table->integer('check')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('llantas');
    }
}
