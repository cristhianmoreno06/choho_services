<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('prefijo')->comment('Prefijo del pedido');
            $table->bigInteger('num_pedido')->comment('Número del pedido');
            $table->integer('perfil')->comment('Perfil del pedido');
            $table->integer('familia')->comment('Familia del pedido');
            $table->string('grupo')->comment('Familia del pedido');
            $table->string('subgrupo')->comment('Familia del pedido');
            $table->unsignedBigInteger('id_producto')->comment('Id del producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->bigInteger('subtotal')->comment('Subtotal del pedido');
            $table->bigInteger('iva')->comment('Iva del pedido');
            $table->bigInteger('total')->comment('Total del pedido');
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
        Schema::table('detalle_pedidos', function (Blueprint $table) {
            $table->dropForeign(['id_producto']);
        });

        Schema::dropIfExists('detalle_pedidos');
    }
}
