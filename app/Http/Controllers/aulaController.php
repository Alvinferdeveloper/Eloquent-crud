<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class aulaController extends Controller
{
    //
    public function Listar(){
        $aulas = Aula::all();
        return View('aula.list')->with('aulas', $aulas)->with('tabla','Aulas');
    }

    public function crear(){
        return View('aula.formulario')->with('tabla','Formulario Para Nueva Aula');
    }

    public function insertar(Request $request){
        $newAula = new Aula();
        $newAula->nombre = $request->input('nombre');
        $newAula->ubicacion = $request->input('ubicacion');
        $newAula->save();
        return redirect()->to('listarAulas');
    }

    public function editar($id){
        $aula = Aula::find($id);
        return View('aula.editar')->with('tabla','Formulario Para Editar Aula')->with("aula",$aula);
    }

    public function actualizar(Request $request){
        $id = $request->input('id');
    
        $aula = Aula::find($id);
        $aula->nombre = $request->input('nombre');
        $aula->ubicacion = $request->input('ubicacion');
        $aula->save();
        return redirect()->to('listarAulas');


    }


    

    public function eliminar($id){
        Aula::destroy($id);
        return redirect()->to('listarAulas');
      }

}
