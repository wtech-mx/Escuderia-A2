<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechasToTallerCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taller_cotizacion', function (Blueprint $table) {
            $table->date('fecha_asignacion_taller')->nullable();
            $table->date('fecha_por_pagar')->nullable();
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
