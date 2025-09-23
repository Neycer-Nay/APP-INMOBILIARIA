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
        Schema::create('casas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            $table->enum('tipo', ['venta', 'alquiler', 'anticretico', 'traspaso']);
            $table->enum('zona', ['norte', 'sur', 'este', 'oeste', 'centro']);
            $table->float('superficie');
            $table->decimal('precio', 12, 2);
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casas');
    }
};
