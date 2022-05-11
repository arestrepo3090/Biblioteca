<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Referencia a libreria para envío de mensajes
use Flash;

//Referencia a los modelos
use App\Models\Autor;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Usuario;

use DataTables;
use DB;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    //Creamos los métodos de la clase
    public function index(){

        return view("prestamo.index");
    }

    //Método para consultar los datos y retornarlos al datatable
    public function listar(Request $request)
    {
        //Consulto el usuario, los libros y el nombre del autor a través de un join
        $prestamos = Prestamo::select("prestamo.*", "libro.titulo", "libro.isbn",
        "usuario.documento", "usuario.nombre", "usuario.apellido")
        ->join("libro", "libro.idLibro","=", "prestamo.idLibro")
        ->join("usuario", "usuario.idUsuario","=", "prestamo.idUsuario")
        //Obtenemos los datos
        ->get();

        //Retornamos el datatable
        return DataTables::of($prestamos)
        ->editColumn("estado", function ($prestamo)
        {
            return $prestamo->estado==1 ? "Activo" : "Finalizado";
        })
        //Adicionamos una columna con la opción de inactivar o Activar para colocar dos botones
        ->addColumn("cambiar", function ($prestamo)
        {
            if ($prestamo->estado ==1)
            {
                return '<a class="btn btn-secondary btn-sm" href="/prestamo/cambiar/estado/'.$prestamo->idPrestamo.'/0">Finalizar</a>';
            }
            else
            {
                return '<a class="btn btn-success btn-sm" href="/prestamo/cambiar/estado/'.$prestamo->idPrestamo.'/1">Activar</a>';
            }
        })
        //Utilizamos rawcolumns para representar el contenido HTML
        ->rawcolumns(['editar','cambiar'])
        ->make(true);
    }

    //Método para crear
    public function create()
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        //Retornamos utilizando compact, para retornar un array de variables con sus valores
        return view('prestamo.create', compact("usuarios", "libros"));
    }

    //Método para guardar
    public function save(Request $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            foreach($input["libro_id"] as $key => $value){
                Prestamo::create([
                    "idLibro"=> $value,
                    "idUsuario"=> $input["documentos"],
                    "fecPrestamo"=> Carbon::now(),
                    "fecDevolucion"=> Carbon::now()->addMonth(),
                    "estado" => 1,
                ]);
            }
            DB::commit();

            //Mensaje al registrar el Libro
            Flash::success("Se registro el libro");

            //Retorno a la vista
            return redirect("/prestamo");

        } catch (\Exception $e) {
            DB::rollBack();
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //Retornamos a la vista de crear
            return redirect("/prestamo");
        }
    }

    //creamos otro método para cambiar el estado
    public function updateState($idPrestamo, $estado)
    {
        //realiza la búsqueda a través del idPrestamo
        $prestamo = Prestamo::find($idPrestamo);
        //Evaluamos si no lo encuentra
        if ($prestamo==null)
        {
            //generamos un mensaje si no lo encuentra
            Flash::error('Préstamo no encontrado');
            //retornamos a la vista
            return redirect('/prestamo');
        }
        try
        {
            //actualizamos el estado
            $prestamo->update(["estado" => $estado]);

            //generamos un mensaje de actualización
            Flash::error('Se modificó el estado del préstamo');
            //retornamos a la vista del préstamo
            return redirect('/prestamo');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //retornamos a la vista de crear
            return redirect('/prestamo/crear');
        }
    }

}
