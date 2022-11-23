<?php

namespace App\Http\Controllers;

use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function historia_clinica(Request $request){
        $usuario = User::find($request->id_paciente);
        $pdf = PDF::loadView('reportes.historia_clinica', compact('usuario'));
        return $pdf->stream('invoice.pdf', $usuario);
    }
    public function reporte_fechas(Request $request){
        $inicio=substr($request->fecha, 0, 10);
        $fin=substr($request->fecha, 14, 24);
        $tipo=$request->tipo;
        $pdf = PDF::loadView('reportes.cobros');
        return $pdf->download('ejemplo.pdf');
    }
}
