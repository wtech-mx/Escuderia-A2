<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes_fisicos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('facturas', 900);
            $table->string('tenencias', 900);
            $table->string('responsiva', 900);
            $table->string('ine', 900);
            $table->string('seguro', 900);
            $table->string('circulacion', 900);
            $table->string('reemplacamiento', 900);
            $table->string('baja_placas', 900);
            $table->string('domicilio', 900);
            $table->string('rfc', 900);

            $table->foreign('id_user')
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
        Schema::dropIfExists('expedientes_fisicos');
    }
}
