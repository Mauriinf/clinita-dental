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

        $dias = Dia::all();
        $bloques = Bloque::all();

        foreach($bloques as $bloque){
            $bloque->b_dia = (object)BloqueDia::get_agenda($bloque->id);
        }

        return view('admin.bloque_dia.index', compact('bloques'));
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

    public function config_agenda($bdia)
    {
        $bloque_dia = BloqueDia::find($bdia);
        $bloque_dia->estado = ($bloque_dia->estado == 'activo') ? 'inactivo' : 'activo';
        $bloque_dia->save();

        return $bloque_dia->estado;
    }
}
