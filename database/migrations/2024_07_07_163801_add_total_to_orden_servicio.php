<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToOrdenServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orden_servicio', function (Blueprint $table) {
            $table->text('total_iva')->nullable();
            $table->text('encuesta')->nullable();
            $table->text('ine')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_servicio', function (Blueprint $table) {
            //
        });
    }
}
