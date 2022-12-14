<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Curaciones;
use App\Models\Odontograma;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function historia_clinica(Request $request){
        $consulta = Consulta::find($request->id);
        $usuario = User::find($consulta->id_cliente);

        $nacimiento = date_create($usuario->fec_nac);
        $ahora = date_create(date("Y-m-d"));
        $edad = $ahora->diff($nacimiento);
        $usuario->edad = $edad->format("%y");

        $usuario->numero = substr_replace('00000', $usuario->id, -strlen($usuario->id), 5);

        $d_tratamientos = Consulta::d_tratamientos($request->id);

        $pdf = PDF::loadView('reportes.historia_clinica', compact('usuario', 'consulta', 'd_tratamientos'));
        return $pdf->stream('invoice.pdf', $usuario);
    }
    public function reporte_fechas(Request $request){
        $inicio=substr($request->fecha, 0, 10);
        $fin=substr($request->fecha, 14, 24);
        if($fin=="")
        $fin=$inicio;
        $tipo=$request->tipo;
        $user= Auth::user();
        if($tipo==='ATEDIDOS'){
            if($user->hasRole('Doctor')){//REPORTE DE UN DOCTOR ESPECIFICO
                $usuarios=Curaciones::atendidos_entre_fechas_doctor($inicio,$fin,$user->id);
                $pdf = PDF::loadView('reportes.atendidos_doctor', compact('usuarios','inicio','fin','user'));
                return $pdf->stream('atendidos.pdf');
            }
            else{
                $usuarios=Curaciones::atendidos_entre_fechas($inicio,$fin);
                $pdf = PDF::loadView('reportes.atendidos', compact('usuarios','inicio','fin'));
                return $pdf->stream('atendidos.pdf');
            }
        }else{
            if($tipo==='GANANCIA'){
                if($user->hasRole('Doctor')){//REPORTE DE UN DOCTOR ESPECIFICO
                    $pagos=Curaciones::cobros_entre_fechas_doctor($inicio,$fin,$user->id);
                    $pdf = PDF::loadView('reportes.cobros_doctor', compact('pagos','inicio','fin','user'));
                    return $pdf->stream('pagos.pdf');
                }
                else{
                    $pagos=Curaciones::cobros_entre_fechas($inicio,$fin);
                    $pdf = PDF::loadView('reportes.cobros', compact('pagos','inicio','fin'));
                    return $pdf->stream('pagos.pdf');
                }
            }else{
                if($tipo==='CITAS'){
                    if($user->hasRole('Doctor')){//REPORTE DE UN DOCTOR ESPECIFICO
                        $citas=Cita::citas_entre_fechas_doctor($inicio,$fin,$user->id);
                        $pdf = PDF::loadView('reportes.citas_doctor', compact('citas','inicio','fin','user'));
                        return $pdf->stream('citas.pdf');
                    }
                    else{
                        $citas=Cita::citas_entre_fechas($inicio,$fin);
                        $pdf = PDF::loadView('reportes.citas', compact('citas','inicio','fin'));
                        return $pdf->stream('citas.pdf');
                    }
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
    public function consulta_cobros(Request $request){
        $id=$request->id;
        $consulta=Curaciones::consulta_det($id);
        $cobros=Odontograma::consulta_cobros($id);
        $consulta=$consulta[0];
        $fecha=date('d-m-Y');
        $pdf = PDF::loadView('reportes.cobros_consulta', compact('consulta','cobros','fecha'));
        return $pdf->stream('cobros.pdf');
    }
}
