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
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->integer('idCliente');
            $table->decimal('totalLiquido',7,2)->nullable;
            $table->decimal('iva',7,2)->nullable;
            $table->decimal('total',7,2)->nullable;
            $table->timestamps();

            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faturas');
    }
};
