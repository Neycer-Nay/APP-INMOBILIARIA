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
        Schema::table('casas', function (Blueprint $table) {
            $table->decimal('precioAnterior', 12, 2)->nullable()->after('precio'); // Precio anterior
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('casas', function (Blueprint $table) {
            $table->dropColumn('precioAnterior');
        });
    }
};
