<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'nombre',
        'correo',
        'codigo',
        'fecha_nacimiento',
        'sexo',
        'carrera'
    ];

    protected $cast =[
        'fecha-nacimiento' => 'date',
    ];
}   

