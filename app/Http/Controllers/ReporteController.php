<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Curaciones;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function historia_clinica(Request $request){
        $usuario = User::find($request->id_paciente);

        $nacimiento = date_create($usuario->fec_nac);
        $ahora = date_create(date("Y-m-d"));
        $edad = $ahora->diff($nacimiento);
        $usuario->edad = $edad->format("%y");

        $usuario->numero = substr_replace('00000', $usuario->id, -strlen($usuario->id), 5);

        $consulta = Consulta::where('id_cliente', $request->id_paciente)->first();

        $d_tratamientos = Consulta::d_tratamientos();
        
        $pdf = PDF::loadView('reportes.historia_clinica', compact('usuario', 'consulta', 'd_tratamientos'));
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
            }else{
                if($tipo==='CITAS'){
                    $citas=Cita::citas_entre_fechas($inicio,$fin);
                    $pdf = PDF::loadView('reportes.citas', compact('citas','inicio','fin'));
                    return $pdf->stream('citas.pdf');
                }else{
                    if($tipo==='HOMBRESMUJERES'){
                        $generos=Curaciones::hombres_mujeres_atendidos($inicio,$fin);
                        $pdf = PDF::loadView('reportes.generos', compact('generos','inicio','fin'));
                        return $pdf->stream('HombresyMujeres.pdf');
                    }
                }
            }
        }

    }
    public function reporte_pacientes(Request $request){
        $usuarios= User::role('Paciente')->get();
        $pdf = PDF::loadView('reportes.pacientes', compact('usuarios'));
        return $pdf->stream('pacientes.pdf');
    }
}
