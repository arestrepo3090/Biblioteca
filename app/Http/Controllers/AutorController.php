<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Referencia a libreria para envío de mensajes
use Flash;

//Referencia al modelo de Autor
use App\Models\Autor;
use DataTables;
use PDF;

class AutorController extends Controller
{
    //Creamos los métodos de la clase
    public function index()
    {
        return view('autor.index');
    }

    //Método para consultar los datos y retornarlos al datatable
    public function listar(Request $request)
    {
        //Consulto todos los autores
        $autores = Autor::all();

        //Retornamos el datatable
        return DataTables::of($autores)
        //Adicionamos una columna con la opción de editar
        ->addColumn("editar", function ($autor)
        {
            return '<a class="btn btn-info btn-sm" href="/autor/editar/'.$autor->idAutor.'">Editar</a>';
        })
        //Utilizamos rawcolumns para representar el contenido HTML
        ->rawcolumns(['editar'])
        ->make(true);
    }

    //Método para crear
    public function create()
    {
        return view('autor.create');
    }

    //Método para guardar
    public function save(Request $request)
    {
        //validamos
        $request->validate(Autor::$rules);

        //tomamos todos los valores que vienen de los campos
        $input = $request->all();
        try
        {
            //Guardamos los valores que vienen de los campos html o de valores asignados
            Autor::create([
                "nombre" => $input["nombre"],
                "nacionalidad" => $input["nacionalidad"],
            ]);

            //Mensaje al registrar el autor
            Flash::success("Se registro el autor");

            //Retorno a la vista
            return redirect('/autor');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //Retornamos a la vista de crear
            return redirect('/autor/crear');
        }
    }

    //Método para editar
    public function edit($idAutor)
    {
        //realizar la búsqueda a través del idAutor
        $autor = Autor::find($idAutor);

        //Evaluamos si no lo encuentra
        if($autor==null)
        {
            //generamos un mensaje si no se encuentra
            Flash::error('Autor no encontrado');

            //Retornamos a la vista de Autor
            return redirect('/autor');
        }
        //Retorno a la vista con un array de variables
        return view("autor.edit", compact("autor"));
    }

    //Método para actualizar
    public function update(Request $request)
    {
        //Validamos
        $request->validate(Autor::$rules);

        //tomamos todos los valores que vienen de los campos
        $input = $request->all();
        try
        {
            //Realiza la búsqueda a través del idAutor
            $autor = Autor::find($input['idAutor']);

            //Evaluamos si no los encuentra
            if ($autor==null)
            {
                //generamos un mensaje si no se encuentra
                Flash::error('Autor no encontrado');

                //retornamos a la vista de Autor
                return redirect('/autor');
            }
            //guardamos los valores que vienen de los campos html o de valores asignados
            $autor->update([
                "nombre" => $input["nombre"],
                "nacionalidad" => $input["nacionalidad"],
            ]);
            //Mensaje al modificar el Autor
            Flash::success('Se modificó el autor');
            //retorno a la vista
            return redirect('/autor');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //retornamos a la vista de crear
            return redirect('/autor/crear');
        }
    }

        //Método para realizar la descarga del reporte
        public function download(Request $request)
        {
            $input = $request->all();

            $autores = Autor::all();

            if (count($autores)>0)
            {
                $pdf = \PDF::loadView('pdf.autores', compact("autores","input"));
                return $pdf->download('Autores.pdf');
            }
            else
            {
                return redirect('/autor/index');
            }
        }
}
