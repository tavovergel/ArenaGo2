<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{
    protected $primaryKey = 'id_escenario';
    protected $fillable = [
        'nombre_escenario','descripcion', 'direccion', 'latitud', 'longitud', 'municipio', 
        'deporte', 'estado', 'horarios', 'iluminacion', 'suelo', 'capacidad','banos','imagen','user_id'
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
