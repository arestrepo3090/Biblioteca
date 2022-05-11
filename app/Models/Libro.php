<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    //Definimos la tabla
    public $table="libro";

    public $timestamps = false;

    protected $primaryKey = 'idLibro';

    //Definimos los campos
    public $fillable = [
        'codigo',
        'titulo',
        'isbn',
        'editorial',
        'numPags',
        'estado',
    ];

    //Establecemos las reglas de validación
    public static $rules = [
        'codigo'=>'required|numeric|min:0',
        'titulo'=>'required|string|min:2',
        'isbn'=>'required|string|min:2',
        'editorial'=>'required|string|min:2',
        'numPags'=>'numeric|min:0',
        'estado'=>'in:1,0',
    ];
}
