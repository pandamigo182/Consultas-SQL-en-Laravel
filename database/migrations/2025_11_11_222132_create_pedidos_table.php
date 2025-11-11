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
            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('total', 8, 2); // 8 dígitos totales, 2 decimales
            $table->foreignId('id_usuario')
                  ->constrained('usuarios')
                  ->onDelete('cascade'); // Si se borra un usuario, se borran sus pedidos
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
