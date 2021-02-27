<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgTcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_tcs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tc')->nullable();
            $table->string('img')->nullable();

            $table->foreign('id_tc')
                ->references('id')->on('tarjeta_circulacion')
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
        Schema::dropIfExists('img_tcs');
    }
}
