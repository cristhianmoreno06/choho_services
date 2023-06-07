<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nit')->comment('Número de identificación tributaria de la sucursal');
            $table->string('telefono')->comment('Número de teléfono de la sucursal');
            $table->string('direccion')->comment('Dirección de la sucursal');
            $table->unsignedBigInteger('id_ciudad')->comment('Id de la Ciudad donde se encuentra la sucursal')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
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
        Schema::table('sucursales', function (Blueprint $table) {
            $table->dropForeign(['id_ciudad']);
        });

        Schema::dropIfExists('sucursales');
    }
}
