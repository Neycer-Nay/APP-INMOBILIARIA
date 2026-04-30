<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'agente_id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'ciudad',
    ];

    public function agente()
    {
        return $this->belongsTo(Agente::class);
    }
}
