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
            $table->foreignId('propietario_id')->constrained('propietarios');
            $table->foreignId('agente_id')->constrained('agentes'); 
            $table->string('codigo')->unique();
            $table->string('titulo');
            $table->enum('tipo', ['venta', 'alquiler', 'anticretico', 'traspaso']);
            $table->enum('zona', ['norte', 'sur', 'este', 'oeste', 'centro']);
            $table->enum('categoria', ['casa', 'departamento', 'casa_comercial', 'quinta', 'terreno']);
            $table->float('superficieTerreno');
            $table->float('superficieConstruida');
            $table->decimal('precio', 12, 2);
            $table->decimal('precioAnterior', 12, 2)->nullable();
            $table->string('direccion');
            $table->string('ciudad');
            $table->text('descripcion');
            $table->integer('tiendas')->default(0);
            $table->integer('habitaciones')->default(0);
            $table->integer('banos')->default(0);
            $table->integer('garajes')->default(0);
            $table->integer('plantas')->default(1);
            $table->enum('estado', ['disponible', 'vendido', 'alquilado', 'entregado'])->default('disponible');
            $table->json('caracteristicas')->nullable();
            $table->json('caracteristicasExternas')->nullable();
            $table->json('caracteristicasServicios')->nullable();
            $table->string('videoUrl')->nullable();
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
