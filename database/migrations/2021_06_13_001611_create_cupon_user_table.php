<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cupon')->nullable();
            $table->foreign('id_cupon')
                ->references('id')->on('cupon')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('check')->nullable();
            $table->integer('enviado')->nullable();
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
        Schema::dropIfExists('cupon_user');
    }
}
