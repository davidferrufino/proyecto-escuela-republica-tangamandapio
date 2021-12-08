<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo'
    ];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'id_grado');
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'profesores_grados', 'id_grado', 'id_profesor',)
            ->as('profesores');
    }

    public function scopeFilter($query, $busqueda)
    {
        return $query->where("nombre", 'like', "%{$busqueda}%");
    }
    
}
