<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasolinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasolina', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->unsignedBigInteger('id_sector')->nullable();

            $table->string('current_auto')->nullable();
            $table->date('fecha_actual')->nullable();
            $table->string('taque_inicial')->nullable();
            $table->string('km_actual')->nullable();
            $table->string('importe')->nullable();
            $table->string('litros')->nullable();
            $table->string('gasolina')->nullable();
            $table->string('tipo_pago')->nullable();
            $table->string('estatus')->nullable();

            $table->date('fecha_estatus')->nullable();

            $table->integer('img1');
            $table->integer('img2');

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
        Schema::dropIfExists('gasolina');
    }
}
