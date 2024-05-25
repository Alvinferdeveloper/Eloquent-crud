<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class profesorController extends Controller
{
    //
    public function Listar(){
        $profesores = Profesor::all();
        return View('profesor.list')->with('profesores', $profesores)->with('tabla','Profesores');
    }

    public function crear(){
        return View('profesor.formulario')->with('tabla','Formulario Para Nuevo Profesor');
    }

    public function insertar(Request $request){
        if($this->keyAlreadyExists($request->input('codigo'))){
            return View('keyDuplicated')->with('tabla',null);
        }
        $newProfesor = new Profesor();
        $newProfesor->id = $request->input('codigo');
        $newProfesor->nombre = $request->input('nombre');
        $newProfesor->apellidos = $request->input('apellidos');
        $newProfesor->titulo = $request->input('titulo');
        $newProfesor->save();
        return redirect()->to('listarProfesores');
    }

    public function keyAlreadyExists($key){
        $profesores = Profesor::all();
        foreach($profesores as $profesor){
            if($profesor->id == $key){
                return true;
            }
        }

        return false;

     }

    public function editar($id){
        $profesor = Profesor::find($id);
        return View('profesor.editar')->with('tabla','Formulario Para Editar Profesor')->with("profesor",$profesor);

    }

    public function actualizar(Request $request){
        $id = $request->input('codigo');
        
        $profesor = Profesor::find($id);
        $profesor->nombre = $request->input('nombre');
        $profesor->apellidos = $request->input('apellidos');
        $profesor->titulo = $request->input('titulo');
        $profesor->save();
        return redirect()->to('listarProfesores');


    }

    public function eliminar($id){
        Profesor::destroy($id);
        return redirect()->to('listarProfesores');
      }
}
