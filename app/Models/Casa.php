<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{

    protected $table = 'casas';
    protected $fillable = [
        'propietario_id',
        'agente_id',
        'codigo',
        'titulo',
        'tipo',
        'zona',
        'categoria',
        'superficieTerreno',
        'superficieConstruida',
        'precioAnterior',
        'precio',
        'direccion',
        'ciudad',
        'descripcion',
        'tiendas',
        'habitaciones',
        'banos',
        'garajes',
        'plantas',
        'estado',
        'caracteristicas',
        'caracteristicasExternas',
        'caracteristicasServicios',
        'videoUrl',
        
    ];

    protected $casts = [
        'caracteristicas' => 'array',
        'caracteristicasExternas' => 'array',
        'caracteristicasServicios' => 'array',
    ];


    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

    public function agente()
    {
        return $this->belongsTo(Agente::class);
    }

    public function fotos()
    {
        return $this->hasMany(FotoCasa::class);
    }

    public function venta()
    {
        return $this->hasOne(Venta::class); // una casa solo se vende una vez
    }
   
}
