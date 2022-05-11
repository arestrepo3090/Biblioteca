<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Referencia a libreria para envío de mensajes
use Flash;

//Referencia al modelo de Libro
use App\Models\Libro;
use App\Models\Autor;
use DataTables;
use PDF;

class LibroController extends Controller
{
    //Creamos los métodos de la clase
    public function index()
    {
        return view('libro.index');
    }

    //Método para consultar los datos y retornarlos al datatable
    public function listar(Request $request)
    {
        //Consulto todos los libros y el nombre del autor a través de un join
        //$libros = libro::all();
        $libros = Libro::select("libro.*", "autor.nombre")
        ->join("autor", "libro.codigo","=", "autor.idAutor")
        //Obtenemos los datos
        ->get();

        //Retornamos el datatable
        return DataTables::of($libros)
        ->editColumn("estado", function ($libro)
        {
            return $libro->estado==1 ? "Activo" : "Inactivo";
        })
        //Adicionamos una columna con la opción de editar
        ->addColumn("editar", function ($libro)
        {
            return '<a class="btn btn-info btn-sm" href="/libro/editar/'.$libro->idLibro.'">Editar</a>';
        })
        //Adicionamos una columna con la opción de inactivar o Activar para colocar dos botones
        ->addColumn("cambiar", function ($libro)
        {
            if ($libro->estado ==1)
            {
                return '<a class="btn btn-danger btn-sm" href="/libro/cambiar/estado/'.$libro->idLibro.'/0">Inactivar</a>';
            }
            else
            {
                return '<a class="btn btn-success btn-sm" href="/libro/cambiar/estado/'.$libro->idLibro.'/1">Activar</a>';
            }
        })
        //Utilizamos rawcolumns para representar el contenido HTML
        ->rawcolumns(['editar','cambiar'])
        ->make(true);
    }

    //Método para crear
    public function create()
    {
        $autores = autor::all();
        return view('libro.create', compact("autores"));
    }

    //Método para guardar
    public function save(Request $request)
    {
        //validamos
        $request->validate(Libro::$rules);

        //tomamos todos los valores que vienen de los campos
        $input = $request->all();
        try
        {
            //Guardamos los valores que vienen de los campos html o de valores asignados
            Libro::create([
                "codigo" => $input["codigo"],
                "titulo" => $input["titulo"],
                "isbn" => $input["isbn"],
                "editorial" => $input["editorial"],
                "numPags" => $input["numPags"],
                "estado" => 1,
            ]);

            //Mensaje al registrar el Libro
            Flash::success("Se registro el libro");

            //Retorno a la vista
            return redirect('/libro');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //Retornamos a la vista de crear
            return redirect('/libro/crear');
        }
    }

    //Método para editar
    public function edit($idLibro)
    {
        //realizar la búsqueda a través del idLibro
        $libro = Libro::find($idLibro);

        //cargamos todos los autores
        $autores = Autor::all();

        //Evaluamos si no lo encuentra
        if($libro==null)
        {
            //generamos un mensaje si no se encuentra
            Flash::error('Libro no encontrado');

            //Retornamos a la vista de libro
            return redirect('/libro');
        }
        //Retorno a la vista con un array de variables
        return view("libro.edit", compact("libro","autores"));
    }

    //Método para actualizar
    public function update(Request $request)
    {
        //Validamos
        $request->validate(Libro::$rules);

        //tomamos todos los valores que vienen de los campos
        $input = $request->all();
        try
        {
            //Realiza la búsqueda a través del idLibro
            $libro = Libro::find($input['idLibro']);

            //Evaluamos si no los encuentra
            if ($libro==null)
            {
                //generamos un mensaje si no se encuentra
                Flash::error('Libro no encontrado');

                //retornamos a la vista de libro
                return redirect('/libro');
            }
            //guardamos los valores que vienen de los campos html o de valores asignados
            $libro->update([
                "codigo" => $input["codigo"],
                "titulo" => $input["titulo"],
                "isbn" => $input["isbn"],
                "editorial" => $input["editorial"],
                "numPags" => $input["numPags"],
            ]);
            //Mensaje al modificar el Libro
            Flash::success('Se modificó el libro');
            //retorno a la vista
            return redirect('/libro');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //retornamos a la vista de crear
            return redirect('/libro/crear');
        }
    }

    //creamos otro método para cambiar el estado
    public function updateState($idLibro, $estado)
    {
        //realiza la búsqueda a través del idLibro
        $libro = Libro::find($idLibro);
        //Evaluamos si no lo encuentra
        if ($libro==null)
        {
            //generamos un mensaje si no lo encuentra
            Flash::error('Libro no encontrado');
            //retornamos a la vista del libro
            return redirect('/libro');
        }
        try
        {
            //actualizamos el estado
            $libro->update(["estado" => $estado]);

            //generamos un mensaje de actualización
            Flash::error('Se modificó el estado del libro');
            //retornamos a la vista del libro
            return redirect('/libro');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //retornamos a la vista de crear
            return redirect('/libro/crear');
        }
    }

    //Método para realizar la descarga del reporte
    public function download(Request $request)
    {
        $input = $request->all();

        $libros = Libro::select("libro.*", "autor.nombre")
        ->join("autor", "libro.codigo","=", "autor.idAutor")
        ->get();

        if (count($libros)>0)
        {
            $pdf = PDF::loadView('pdf.libros', compact("libros","input"));
	        return $pdf->stream('Libros.pdf');
        }
        else
        {
            return redirect('/libro/index');
        }
    }

}
