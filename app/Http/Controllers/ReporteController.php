<?php

namespace App\Http\Controllers;

use App\Models\Curaciones;
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
        if($tipo==='ATEDIDOS'){
            $usuarios=Curaciones::atendidos_entre_fechas($inicio,$fin);
            $pdf = PDF::loadView('reportes.atendidos', compact('usuarios','inicio','fin'));
            return $pdf->stream('atendidos.pdf');
        }else{
            if($tipo==='GANANCIA'){
                $pagos=Curaciones::cobros_entre_fechas($inicio,$fin);
                $pdf = PDF::loadView('reportes.cobros', compact('pagos','inicio','fin'));
                return $pdf->stream('pagos.pdf');
            }
        }

    }
}
