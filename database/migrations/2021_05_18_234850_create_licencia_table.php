<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('tipo')->nullable();
            $table->date('expedicion')->nullable();
            $table->date('antiguedad')->nullable();
            $table->date('vigencia')->nullable();
            $table->integer('permanente')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('sangre')->nullable();
            $table->string('rfc')->nullable();
            $table->string('numero')->nullable();
            $table->string('entidad')->nullable();

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
        Schema::dropIfExists('licencia');
    }
}
