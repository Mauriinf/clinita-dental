<?php

namespace App\Http\Controllers;

use App\Models\Diente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class OdontogramaController extends Controller
{
    public function odontograma(){
        $tipos_tratamiento=Tratamiento::select()->where('estado','=','ACTIVO')->get();
        $dientes=Diente::all();
        return view('odontograma.index',compact('dientes','tipos_tratamiento'));
    }
}
