<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nit')->comment('Número de identificación tributaria del tercero');
            $table->string('razon_social')->comment('Nombre de la compañía del tercero');
            $table->string('tipo')->comment('Tipo de cliente que es el tercero');
            $table->string('activo')->comment('Campo que indica si esta o no activo del tercero');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terceros');
    }
}
