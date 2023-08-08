<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepollaPaquetesNombreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repolla_paquetes_nombre', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('veces');
            $table->integer('cantidad');
            $table->integer('cifras');
            $table->date('vence');

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
        Schema::dropIfExists('repolla_paquetes_nombre');
    }
}
