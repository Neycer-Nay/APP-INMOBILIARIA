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
            $table->string('codigo')->unique();
            $table->enum('tipo', ['venta', 'alquiler', 'anticretico', 'traspaso']);
            $table->enum('zona', ['norte', 'sur', 'este', 'oeste', 'centro']);
            $table->enum('categoria', ['casa', 'departamento', 'casa_comercial', 'quinta', 'terreno']);
            $table->float('superficieTerreno');
            $table->float('superficieConstruida');
            $table->decimal('precio', 12, 2);
            $table->string('direccion');
            $table->string('ciudad');
            $table->text('descripcion');
            //Caracteristicas Principales
            $table->integer('tiendas')->default(0);
            $table->integer('habitaciones')->default(0);
            $table->integer('banos')->default(0);
            $table->integer('garajes')->default(0);
            $table->integer('plantas')->default(1);

            $table->string('estado')->default('disponible'); // disponible, vendido, alquilado, etc.
            $table->json('caracteristicas')->nullable(); // piscina, jardin, seguridad, etc.
            $table->json('caracteristicasExternas')->nullable(); // colegios, parques, mercados, transporte, etc.
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
