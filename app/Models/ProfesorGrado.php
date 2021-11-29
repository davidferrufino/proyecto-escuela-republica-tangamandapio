<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProfesorGrado extends Pivot
{
    use HasFactory;

    protected $table = 'profesores_grados';
    public $incrementing = true;
}
