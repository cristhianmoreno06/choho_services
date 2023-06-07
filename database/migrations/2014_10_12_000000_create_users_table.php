<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->comment('Nombre con el que el usuario ingresa al sistema');
            $table->string('password')->comment('Contraseña del usuario del sistema');
            $table->unsignedBigInteger('role_id')->comment('Id del rol asignado al usuario')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->enum('activo',[0,1])->comment('Estado del usuario en el sistema 0: inactivo / 1: activo');
            $table->string('email')->comment('Email con el que el usuario se registro en el sistema')->unique();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::dropIfExists('users');
    }
}
