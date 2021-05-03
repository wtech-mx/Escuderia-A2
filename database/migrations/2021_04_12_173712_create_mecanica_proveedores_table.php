<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicaProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mecanica_proveedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_servicio');
            $table->string('mecanica');
            $table->string('garantia');
            $table->string('marca');
            $table->string('proveedor');
            $table->integer('cantidad');
            $table->integer('costo');
            $table->integer('costo_total');
            $table->integer('mano_o');
            $table->string('nombre');
            $table->timestamps();

            $table->foreign('id_servicio')
                ->references('id')->on('mecanica')
                ->inDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
