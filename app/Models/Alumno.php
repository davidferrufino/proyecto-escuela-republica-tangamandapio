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
        'telefono',
        'estado'
    ];
    
    public function grado(){
        return $this->belongsTo(Grado::class, 'id_grado');
    }
}
