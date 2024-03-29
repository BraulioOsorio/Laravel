<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->float('precio',10,2) -> default("0");
            $table->enum('tipo_pedido', ['ENSITIO', 'DOMICILIO'])->default('ENSITIO');
            $table->unsignedBigInteger('cupon_id')->nullable();
            $table->text('descripcion');
            $table->time('hora');
            $table->tinyInteger('status')->default(1);
            $table->foreign('cupon_id')->references('id')->on('cupons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
