<?php

namespace App\Http\Controllers;

use App\Models\Curaciones;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuracionesController extends Controller
{
    public function index()
    {
        $consultas=Curaciones::consultas();
        return view('curaciones.index',compact('consultas'));
    }
    public function nuevo()
    {
        $tipos_tratamiento=Tratamiento::select()->where('estado','=','ACTIVO')->get();
        $tratamientos=$tipos_tratamiento;
        return view('curaciones.create',compact('tratamientos'));
    }
    public function buscar_paciente(Request $request){
        $usuario = User::where('ci', $request->ci)->first();
        return response()->json($usuario);
    }
    public function guardar_consulta(Request $request){
        Curaciones::create([
            'id_cliente'  => $request->paciente,
            'id_doctor' => Auth::user()->id,
            'motivo' => $request->motivo,
            'diagnostico' => $request->diagnostico,
            'medicamentos' => $request->medicamentos,
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fecha_inicio' => $request->f_inicio,
            'fecha_final' => $request->f_fin,
            'alergias' => $request->alergias,
            'enfermedades' => $request->enfermedades,
            'estado' => 'ACTIVO',
            'otros' => $request->otro,
            'costo_total' => $request->costo
        ]);
    }
}
