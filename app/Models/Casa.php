<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected $fillable = [
        'codigo',
        'tipo',
        'zona',
        'categoria',
        'superficieTerreno',
        'superficieConstruida',
        'precio',
        'direccion',
        'ciudad',
        'descripcion',
        'habitaciones',
        'banos',
        'garajes',
        'plantas',
        'estado',
        'caracteristicas'
    ];

    protected $casts = [
        'caracteristicas' => 'array',
    ];

    public function fotos()
    {
        return $this->hasMany(FotoCasa::class, 'casa_id');
    }
}
