<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class claseController extends Controller
{
    //

    public function Listar(){
        $clases = Clase::all();
        return View('clase.list')->with('clases', $clases)->with('tabla','Clases');
    }

    public function crear(){
        return View('clase.formulario')->with('tabla','Formulario Para Nueva Clase');
    }

    public function insertar(Request $request){
        if($this->keyAlreadyExists($request->input('codigo'))){
            return View('keyDuplicated')->with('tabla',null);
        }
        $newClase = new Clase();
        $newClase->codclase = $request->input('codigo');
        $newClase->nombre = $request->input('nombre');
        $newClase->credito = $request->input('credito');
        $newClase->save();
        return redirect()->to('listarClases');
    }

    public function editar($codigo){
        $clase = Clase::find($codigo);
        return View('clase.editar')->with('tabla','Formulario Para Editar Clase')->with("clase",$clase);

    }
     public function keyAlreadyExists($key){
        $clases = Clase::all();
        foreach($clases as $clase){
            if($clase->codclase == $key){
                return true;
            }
        }

        return false;

     }

    public function actualizar(Request $request){
        $codigo = $request->input('codigo');
        
        $clase = Clase::find($codigo);
        $clase->nombre = $request->input('nombre');
        $clase->credito = $request->input('credito');
        $clase->save();
        return redirect()->to('listarClases');


    }

    public function eliminar($codigo){
        Clase::destroy($codigo);
        return redirect()->to('listarClases');
      }
}
