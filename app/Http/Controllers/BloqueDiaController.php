<?php

namespace App\Http\Controllers;

use App\Models\Bloque;
use App\Models\BloqueDia;
use App\Models\Dia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloqueDiaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:configuracion-horario', ['only' => ['index','config_agenda','generar_agenda']]);
    }
    public function index()
    {
        $b_usuario = BloqueDia::where('id_usuario', Auth::user()->id)->count();
        $bdu_existe = ( $b_usuario > 0 ) ? false : true;
        $dias = Dia::all();
        $bloques = Bloque::all();
        foreach($bloques as $bloque){
            $bloque->b_dia = (object)BloqueDia::get_agenda($bloque->id,Auth::user()->id);
        }
        return view('admin.bloque_dia.index', compact('bloques', 'bdu_existe'));
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
        $bloque_dia->estado = ($bloque_dia->estado == 'ACTIVO') ? 'INACTIVO' : 'ACTIVO';
        $bloque_dia->save();

        return $bloque_dia->estado;
    }

    public function generar_agenda(){
        $b_usuario = BloqueDia::where('id_usuario', Auth::user()->id)->count();
        if($b_usuario === 0){
            $dias = Dia::all();
            $bloques = Bloque::all();

            foreach($dias as $dia)
            {
                foreach($bloques as $bloque){
                    BloqueDia::create([
                        'id_usuario' => Auth::user()->id,
                        'estado' => 'INACTIVO',
                        'id_dia' => $dia->id,
                        'id_bloque' => $bloque->id,
                    ]);
                }
            }
        }
        return redirect()->route('bloque-dia.index');
    }
}
