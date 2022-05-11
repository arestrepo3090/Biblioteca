<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Referencia a libreria para envío de mensajes
use Flash;

//Referencia al modelo de Usuario
use App\Models\Usuario;
use DataTables;

class UsuarioController extends Controller
{
      //Creamos los métodos de la clase
      public function index()
      {
          return view('usuario.index');
      }

      //Método para consultar los datos y retornarlos al datatable
    public function listar(Request $request)
    {
        //Consulto todos los Usuarios
        $usuarios = Usuario::all();

        //Retornamos el datatable
        return DataTables::of($usuarios)
        ->editColumn("estado", function ($usuario)
        {
            return $usuario->estado==1 ? "Activo" : "Inactivo";
        })
        //Adicionamos una columna con la opción de editar
        ->addColumn("editar", function ($usuario)
        {
            return '<a class="btn btn-info btn-sm" href="/usuario/editar/'.$usuario->idUsuario.'">Editar</a>';
        })
        //Adicionamos una columna con la opción de inactivar o Activar para colocar dos botones
        ->addColumn("cambiar", function ($usuario)
        {
            if ($usuario->estado ==1)
            {
                return '<a class="btn btn-danger btn-sm" href="/usuario/cambiar/estado/'.$usuario->idUsuario.'/0">Inactivar</a>';
            }
            else
            {
                return '<a class="btn btn-success btn-sm" href="/usuario/cambiar/estado/'.$usuario->idUsuario.'/1">Activar</a>';
            }
        })
        //Utilizamos rawcolumns para representar el contenido HTML
        ->rawcolumns(['editar','cambiar'])
        ->make(true);
    }

    //Método para crear
    public function create()
    {
        return view('usuario.create');
    }

    //Método para guardar
    public function save(Request $request)
    {
        //validamos
        $request->validate(Usuario::$rules);

        //tomamos todos los valores que vienen de los campos
        $input = $request->all();
        try
        {
            //Guardamos los valores que vienen de los campos html o de valores asignados
            Usuario::create([
                "documento" => $input["documento"],
                "nombre" => $input["nombre"],
                "apellido" => $input["apellido"],
                "direccion" => $input["direccion"],
                "telefono" => $input["telefono"],
                "estado" => 1,
            ]);

            //Mensaje al registrar el Usuario
            Flash::success("Se registro el usuario");

            //Retorno a la vista
            return redirect('/usuario');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //Retornamos a la vista de crear
            return redirect('/usuario/crear');
        }
    }

    //Método para editar
    public function edit($idUsuario)
    {
        //realizar la búsqueda a través del idUsuario
        $usuario = Usuario::find($idUsuario);

        //Evaluamos si no lo encuentra
        if($usuario==null)
        {
            //generamos un mensaje si no se encuentra
            Flash::error('Usuario no encontrado');

            //Retornamos a la vista de usuario
            return redirect('/usuario');
        }
        //Retorno a la vista con un array de variables
        return view("usuario.edit", compact("usuario"));
    }

    //Método para actualizar
    public function update(Request $request)
    {
        //Validamos
        $request->validate(Usuario::$rules);

        //tomamos todos los valores que vienen de los campos
        $input = $request->all();
        try
        {
            //Realiza la búsqueda a través del idUsuario
            $usuario = Usuario::find($input['idUsuario']);

            //Evaluamos si no los encuentra
            if ($usuario==null)
            {
                //generamos un mensaje si no se encuentra
                Flash::error('Usuario no encontrado');

                //retornamos a la vista de usuario
                return redirect('/usuario');
            }
            //guardamos los valores que vienen de los campos html o de valores asignados
            $usuario->update([
                "documento" => $input["documento"],
                "nombre" => $input["nombre"],
                "apellido" => $input["apellido"],
                "direccion" => $input["direccion"],
                "telefono" => $input["telefono"],
            ]);
            //Mensaje al modificar el Usuario
            Flash::success('Se modificó el usuario');
            //retorno a la vista
            return redirect('/usuario');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //retornamos a la vista de crear
            return redirect('/usuario/crear');
        }
    }

    //creamos otro método para cambiar el estado
    public function updateState($idUsuario, $estado)
    {
        //realiza la búsqueda a través del idUsuario
        $usuario = Usuario::find($idUsuario);
        //Evaluamos si no lo encuentra
        if ($usuario==null)
        {
            //generamos un mensaje si no lo encuentra
            Flash::error('Usuario no encontrado');
            //retornamos a la vista del usuario
            return redirect('/usuario');
        }
        try
        {
            //actualizamos el estado
            $usuario->update(["estado" => $estado]);

            //generamos un mensaje de actualización
            Flash::error('Se modificó el estado del usuario');
            //retornamos a la vista del usuario
            return redirect('/usuario');
        }
        catch (\Exception $e)
        {
            //Si hay error guardamos el mensaje de error de la excepción
            Flash::error($e->getMessage());
            //retornamos a la vista de crear
            return redirect('/usuario/crear');
        }
    }
}
