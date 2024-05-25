<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Clase;
use App\Models\Imparte;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class imparteController extends Controller
{
    //

    public function Listar()
    {

        $impartes = Imparte::with('profesor', 'aula', 'clase')->get();
        return View('imparte.list')->with('impartes', $impartes)->with('tabla', 'Imparticiones');
    }

    public function crear()
    {
        //$impartes = Imparte::with('profesor', 'aula', 'clase')->get();
        $aulas = Aula::all();
        $profesores = Profesor::all();
        $clases = Clase::all();
        $info = [
            'aulas' => $aulas,
            'clases' => $clases,
            'profesores' => $profesores
        ];
        return View('imparte.formulario')->with('tabla', 'Formulario Para Nueva registro de imparte')->with('info', $info);
    }

    public function insertar(Request $request)
    {
        if($this->keyAlreadyExists($request) == true){
            return  View('keyDuplicated')->with('tabla',null);
        }
        $newImparte = new Imparte();
        $newImparte->c_codclase = $request->input('clase');
        $newImparte->p_idprofesor = $request->input('profesor');
        $newImparte->a_idaula = $request->input('aula');
        $newImparte->save();
        return redirect()->to('listarImparticiones');
    }

    public function editar($codclase, $idaula, $idprofresor)
    {
        //$impartes = Imparte::with('profesor', 'aula', 'clase')->get();
        $aulas = Aula::all();
        $profesores = Profesor::all();
        $clases = Clase::all();
        $info = [
            'aulas' => $aulas,
            'clases' => $clases,
            'profesores' => $profesores
        ];
        $imparteActual = Imparte::where('c_codclase', $codclase)
        ->where('a_idaula', $idaula,)
        ->where('p_idprofesor', $idprofresor)
        ->first();
        return View('imparte.editar')->with('tabla', 'Formulario Para Editar Imparte')->with("info", $info)->with('imparteActual', $imparteActual);
    }

    public function actualizar(Request $request)
    {
        if($this->keyAlreadyExists($request)){
            return  View('keyDuplicated')->with('tabla',null);
        }
        $newValues = [
            'c_codclase'=> $request->input('clase'),
            'a_idaula' => $request->input('aula'),
            'p_idprofesor' => $request->input('profesor')
        ];


        DB::table('imparte')
            ->where('a_idaula', $request->input('a_idaula'))
            ->where('c_codclase', $request->input('c_codclase'))
            ->where('p_idprofesor',$request->input('p_idprofesor') )
            ->update($newValues);
        return redirect()->to('listarImparticiones');
    }

    public function keyAlreadyExists(Request $request){
        $imparteActual = Imparte::where('c_codclase',$request->input('clase'))
        ->where('a_idaula', $request->input('aula'))
        ->where('p_idprofesor',$request->input('profesor'))
        ->first();

        
        if($imparteActual) return true;
        else return false;
    }




    public function eliminar($codclase, $idaula, $idprofresor)
    {
        Imparte::where('c_codclase', $codclase)
            ->where('a_idaula', $idaula,)
            ->where('p_idprofesor', $idprofresor)
            ->delete();
        return redirect()->to('listarImparticiones');
    }
}
