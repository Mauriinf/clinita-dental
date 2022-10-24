<?php

namespace App\Http\Controllers;

use App\Models\Bloque;
use App\Models\BloqueDia;
use App\Models\Dia;
use Illuminate\Http\Request;

class BloqueDiaController extends Controller
{
    public function index()
    {
        //$bloque_dia = (object)BloqueDia::get_agenda();

        $semana[1] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 1)
                        ->get('id_bloque');
        
        $semana[2] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 2)
                        ->get('id_bloque');

        $semana[3] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 3)
                        ->get('id_bloque');
        
        $semana[4] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 4)
                        ->get('id_bloque');

        $semana[5] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 5)
                        ->get('id_bloque');

        $semana[6] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 6)
                        ->get('id_bloque');
        
        $semana[7] = BloqueDia::where('id_usuario', 1)
                        ->where('id_dia', 7)
                        ->get('id_bloque');

        dd($semana);

        $dias = Dia::all();
        $bloques = Bloque::all();

        return view('admin.bloque_dia.index', compact('bloque_dia', 'dias', 'bloques'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function config_agenda($dia, $bloque)
    {
        $bloque_dia = BloqueDia::where('id_dia', $dia)
                                ->where('id_bloque', $bloque)
                                ->first();
        $bloque_dia->estado = ($bloque_dia->estado == 'activo') ? 'inactivo' : 'activo';
        $bloque_dia->save();
    }
}
