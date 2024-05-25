<?php

namespace App\Http\Controllers;

use App\Models\migration;
use Illuminate\Http\Request;

class migracionController extends Controller
{
    //
    public function Listar(){
        $migraciones = migration::all();
        return View('migracion.list')->with('migraciones', $migraciones)->with('tabla','Migraciones');
    }

}
