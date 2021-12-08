<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_grado',
        'nombre',
        'numero_identidad',
        'numero_cuenta',
        'telefono',
        'estado'
    ];
    
    public function grado(){
        return $this->belongsTo(Grado::class, 'id_grado');
    }

    public function scopeFilter($query, $busqueda)
    {
        return $query->where("nombre", 'like', "%{$busqueda}%");
    }
}
