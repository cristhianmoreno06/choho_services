<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_pedido')->comment('Fecha en la cual se realizo el pedido');
            $table->string('prefijo')->comment('Prefijo del pedido');
            $table->bigInteger('num_pedido')->comment('Número del pedido');
            $table->bigInteger('nit')->comment('Número de identificación tributaria para el pedido');
            $table->string('razon_social')->comment('Nombre de la compañía para el pedido');
            $table->string('vendedor')->comment('Nombre del vendedor que hizo pedido');
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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign(['id_ciudad']);
        });

        Schema::dropIfExists('pedidos');
    }
}
