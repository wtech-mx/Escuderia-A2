<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKmToTallerCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taller_cotizacion', function (Blueprint $table) {
            $table->text('km_inicial')->nullable();
            $table->text('km_taller')->nullable();
            $table->text('km_entrega')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taller_cotizacion', function (Blueprint $table) {
            //
        });
    }
}
