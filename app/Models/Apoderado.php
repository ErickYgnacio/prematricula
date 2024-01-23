<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    use HasFactory;
    protected $table = 'apoderados';

    protected $fillable = [
        'ape_materno',
        'ape_paterno',
        'correo',
        'direccion',
        'dni',
        'fecha_nacimiento',
        'movil',
        'nombres',
        'telefono',
        'departamento',
        'distrito',
        'distrito_de_domicilio',
        'provincia',
        'estudiante_id',
    ];
}
