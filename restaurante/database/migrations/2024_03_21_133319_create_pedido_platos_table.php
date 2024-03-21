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
        Schema::create('pedido_platos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plato_id');
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('plato_id')->references('id')->on('platos')->onDelete('cascade');
            $table->foreign('pedido_id')->references('id')->on('domicilios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_platos');
    }
};
