<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('Nombre de la ciudad de colombia');
            $table->unsignedBigInteger('id_departamento')->comment('Id del departamento de colombia')->unsigned();
            $table->foreign('id_departamento')->references('id')->on('ciudades');
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
        Schema::table('ciudades', function (Blueprint $table) {
            $table->dropForeign(['id_ciudad']);
        });

        Schema::dropIfExists('ciudades');
    }
}
