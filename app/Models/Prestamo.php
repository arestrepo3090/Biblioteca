<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    //Definimos la tabla
    public $table="prestamo";

    public $timestamps = false;

    protected $primaryKey = 'idPrestamo';

    //Definimos los campos
    public $fillable = [
        'idLibro',
        'idUsuario',
        'fecPrestamo',
        'fecDevolucion',
        'estado',
    ];

    //Establecemos las reglas de validación
    public static $rules = [
        'idLibro'=>'required|exists:libro, idLibro',
        'idUsuario'=>'required|exists:usuario, idUsuario',
        'fecPrestamo'=>'required',
        'fecDevolucion'=>'required',
        'estado'=>'in:1,0',
    ];
}
