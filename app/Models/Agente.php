<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{

    protected $table = 'agentes';
    protected $fillable = [
        'user_id',
        'telefono',
        'comision_predeterminada',
        'foto',
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

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
