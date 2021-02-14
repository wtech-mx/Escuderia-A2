<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosExpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_exp', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('fecha_expedicion', 900);
            $table->string('current_auto')->nullable();

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
        Schema::dropIfExists('documentos_exp');
    }
}
