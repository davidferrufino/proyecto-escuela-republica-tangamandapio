<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';

    public function grados()
    {
        return $this->belongsToMany(Grado::class, 'profesores_grados', 'id_profesor', 'id_grado')
            ->as('grados');
    }
}
