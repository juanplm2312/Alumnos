<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $fillable = [
        'nombre',
        'correo',
        'codigo',
        'fecha_nacimiento',
        'sexo',
        'carrera'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];
}

