<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    //Definimos la tabla
    public $table="usuario";

    public $timestamps = false;

    protected $primaryKey = 'idUsuario';

    //Definimos los campos
    public $fillable = [
        'documento',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'estado',
    ];

    //Establecemos las reglas de validación
    public static $rules = [
        'documento'=>'required|numeric|min:0',
        'nombre'=>'required|string|min:2',
        'apellido'=>'required|string|min:2',
        'direccion'=>'string|string|min:2',
        'telefono'=>'string',
        'estado'=>'in:1,0',
    ];
}
