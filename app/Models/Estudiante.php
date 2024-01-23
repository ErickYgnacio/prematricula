<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';

    protected $fillable = [
        'ape_materno',
        'ape_paterno',
        'correo',
        'direccion',
        'dni',
        'enfermedades',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'medicinas',
        'movil',
        'nombres',
        'numero_carnet',
        'sexo',
        'telefono',
        'sanguineo_id',
        'seguro_id',
        'departamento',
        'distrito',
        'distrito_de_domicilio',
        'provincia',
        'apoderado_id',
    ];
}
