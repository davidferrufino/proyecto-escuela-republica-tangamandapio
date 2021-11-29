<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'id_grado');
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'profesores_grados', 'id_grado', 'id_profesor',)
            ->as('profesores');
    }
}
