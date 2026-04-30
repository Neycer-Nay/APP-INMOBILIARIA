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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('casa_id')->constrained()->onDelete('restrict');
            $table->foreignId('cliente_id')->nullable()->constrained();
            $table->foreignId('agente_id')->nullable()->constrained(); // agente que vendió
            $table->date('fecha_venta');
            $table->decimal('precio_venta', 12, 2);
            $table->decimal('comision_agente', 8, 2)->nullable(); // monto o porcentaje
            $table->string('forma_pago')->nullable(); // contado, crédito, etc.
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
