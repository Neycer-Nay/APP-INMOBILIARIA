<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('rols')->upsert([
            [
                'nombre' => 'superadministrador',
                'descripcion' => 'Acceso total al sistema',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'agente',
                'descripcion' => 'Agente inmobiliario, registra propiedades',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
        ], ['nombre_rol'], ['descripcion', 'updated_at']);
    }
}
