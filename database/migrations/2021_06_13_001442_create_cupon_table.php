<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('validez')->nullable();
            $table->string('aplicacion')->nullable();
            $table->string('qr')->nullable();
            $table->integer('precio')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('cupon');
    }
}
