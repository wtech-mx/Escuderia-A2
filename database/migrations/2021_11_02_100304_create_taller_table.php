<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_cotizacion')
                ->references('id')->on('cotizacion')
                ->inDelete('set null');

            $table->string('vendedor')->nullable();
            $table->string('refaccion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('importe_unitario')->nullable();
            $table->string('importe_total')->nullable();
            $table->string('mano_obra')->nullable();
            $table->string('total')->nullable();

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
        Schema::dropIfExists('taller');
    }
}
