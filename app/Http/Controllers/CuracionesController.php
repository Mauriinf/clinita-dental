<?php

namespace App\Http\Controllers;

use App\Models\Curaciones;
use Illuminate\Http\Request;

class CuracionesController extends Controller
{
    public function index()
    {
        $consultas=Curaciones::consultas();
        return view('curaciones.index',compact('consultas'));
    }
    public function nuevo()
    {
        return view('curaciones.create',);
    }
}
