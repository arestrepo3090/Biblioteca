<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Autor extends Model
{
    use HasFactory;
    //Definimos la tabla
    public $table="autor";

    public $timestamps = false;

    protected $primaryKey = 'idAutor';

    //Definimos los campos
    public $fillable = [
        'nombre',
        'nacionalidad',
    ];

    //Establecemos las reglas de validación
    public static $rules = [
        'nombre'=>'required|string|min:2',
        'nacionalidad'=>'string',
    ];

}
