<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpIneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exp_ine', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->string('current_auto')->nullable();
            $table->string('ine', 900);

            $table->string('titulo');
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
        Schema::dropIfExists('exp_ine');
    }
}
