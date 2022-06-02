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
            $table->integer('id_usuario');
            $table->string('name');
            $table->string('email');
            $table->string('precio_total');
            $table->string('pais');
            $table->string('provincia');
            $table->string('ciudad');
            $table->string('codigoPostal');
            $table->string('calle');
            $table->string('portal');
            $table->string('piso');
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
        Schema::dropIfExists('pedidos');
    }
}