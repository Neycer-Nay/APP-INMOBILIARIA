<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{

    protected $table = 'agentes';
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'ciudad',
        'pais',
        'fotoPerfil',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function casas()
    {
        return $this->hasMany(Casa::class); // un agente puede tener muchas casas
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
