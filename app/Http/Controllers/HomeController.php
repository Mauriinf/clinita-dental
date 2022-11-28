<?php

namespace App\Http\Controllers;

use App\Models\Curaciones;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $generos=Curaciones::hombres_mujeres_atendidos();
        $hombres = ((float)$generos[0]->Masculinos * 100) / $generos[0]->total; // Regla de tres
        $hombres = round($hombres, 0);  // Quitar los decimales
        $mujeres = ((float)$generos[0]->Femeninos * 100) / $generos[0]->total; // Regla de tres
        $mujeres = round($mujeres, 0);  // Quitar los decimales
        $cantmayores= Curaciones::Mayores_de_edad();
        $mayores=0;
        $menores=0;
        if(count($cantmayores)>0)
        $mayores=$cantmayores[0]->mayores_edad;
        $cantmenores= Curaciones::Menores_de_edad();
        if(count($cantmenores)>0)
        $menores=$cantmenores[0]->menores_edad;
        $porcentajeMayores = ((float)$mayores * 100) / ($mayores+$menores); // Regla de tres
        $porcentajeMayores = round($porcentajeMayores, 0);  // Quitar los decimales
        $porcentajeMenores = ((float)$menores * 100) / ($mayores+$menores); // Regla de tres
        $porcentajeMenores = round($porcentajeMenores, 0);  // Quitar los decimales
        return view('home')->with('generos',$generos)->with('hombres',$hombres)->with('mujeres',$mujeres)->with('mayores',$mayores)->with('menores',$menores)->with('porcentajeMayores',$porcentajeMayores)->with('porcentajeMenores',$porcentajeMenores);
    }
}
